<?php

namespace App\Http\Livewire\Admin\Order;

use App\Http\Livewire\WithConfirmation;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade as PDF;
use App\Http\Livewire\WithSorting;
use App\Exports\OrdersExport;
use App\Imports\OrdersImport;
use Illuminate\Http\Response;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Livewire\Component;
use App\Models\Order;
use App\Models\Role;
use Request;

class Index extends Component
{
    use WithPagination, WithSorting, WithConfirmation, WithFileUploads;
    
    public int $perPage;
    
    public $file;

    public $clients, $start_date, $end_date, $vendor_id;

    public array $orderable;
    
    public string $search = '';
    
    public array $selected = [];

    public $showDeleteModal = false;

    public array $paginationOptions;

    public array $listsForFields = [];

    protected $queryString = [
        'search' => [
            'except' => '',
        ],
        'sortBy' => [
            'except' => 'id',
        ],
        'sortDirection' => [
            'except' => 'desc',
        ],
    ];

    protected $listeners = ['reRenderParent'];

    public function reRenderParent()
    {
        $this->mount();
        $this->render();
    }

    public function getSelectedCountProperty()
    {
        return count($this->selected);
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function filterDate() {
        $this->validate();
        $this->render();
    }

    public function updatingPerPage()
    {
        $this->resetPage();
    }

    public function resetSelected()
    {
        $this->selected = [];
    }

    protected $rules = [
        'start_date' => 'required|date|before:end_date',
        'end_date'   => 'required|date|after:start_date',
    ];

    public function mount()
    {
        $this->sortBy            = 'id';
        $this->sortDirection     = 'desc';
        $this->perPage           = 100;
        $this->paginationOptions = config('project.pagination.options');
        $this->orderable         = (new Order())->orderable;
        $this->start_date = today()->subDays(30)->format('Y-m-d');
        $this->end_date = today()->format('Y-m-d');
        $this->vendor_id = '';
        $this->initListsForFields();
    }

    public function render()
    {
        $query = Order::whereDate('created_at', '>=', $this->start_date)
                        ->whereDate('created_at', '<=', $this->end_date)
                        ->when($this->vendor_id, function ($query) {
                            return $query->where('vendor_id', $this->vendor_id);
                        })->advancedFilter([
                            's'               => $this->search ?: null,
                            'order_column'    => $this->sortBy,
                            'order_direction' => $this->sortDirection,
                        ]);
        $total = $query->sum('total');
        $orders = $query->paginate($this->perPage);

        return view('livewire.admin.order.index', compact('orders','total'));
    }

    public function update(Order $order)
    {
        $this->validate();
        $this->order->update();
    }

     public function export()
     {
         return(new OrdersExport($this->selected))->download('orders.xls');
     }
     
     public function exportInvoice()
     {
         $orders = Order::whereIn('id', $this->selected);
         $total = $orders->sum('total');
         $pdf = PDF::loadView('print.orders_invoice', compact('orders'));
         
          return $pdf->download('ordersInvoice.pdf');
     }

     public function import()
     {
        Excel::import(new OrdersImport, 'local', \Maatwebsite\Excel\Excel::XLSX);
        
        return redirect('/')->with('success', 'All good!');
    }
  
  /**
     * -------------------------------------------------------------------------------
     *  Delete Order
     * -------------------------------------------------------------------------------
    **/

    public function delete(Order $order)
    {
        abort_if(Gate::denies('admin_order_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        
        $order->delete();

        $this->alert('warning', __('Order deleted successfully!') );

        $this->reRenderParent();
    }

    public function deleteSelected()
    {
        abort_if(Gate::denies('admin_order_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        Order::whereIn('id', $this->selected)->delete();

        $this->showDeleteModal = false;

        $this->resetSelected();

        $this->reRenderParent();        
    }
    
    protected function initListsForFields(): void
    {
        $this->listsForFields['clients'] = Role::find(2)->users->pluck('name','id');
    }
}
