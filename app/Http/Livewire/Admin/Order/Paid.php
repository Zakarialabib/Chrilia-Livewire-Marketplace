<?php

namespace App\Http\Livewire\Admin\Order;

use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Response;
use App\Http\Livewire\WithConfirmation;
use App\Http\Livewire\WithSorting;
use Livewire\WithPagination;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Exports\OrdersExport;
use App\Imports\OrdersImport;
use Maatwebsite\Excel\Facades\Excel;
use Request;
use Livewire\WithFileUploads;

class Paid extends Component
{

    use WithPagination, WithSorting, WithConfirmation, WithFileUploads;
    
    public int $perPage;
    
    public $file;

    public array $orderable;
    
    public string $search = '';
    
    public array $selected = [];

    public $showDeleteModal = false;

    public $selectAll = false;

    public array $paginationOptions;

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

    public function updatingPerPage()
    {
        $this->resetPage();
    }

    public function resetSelected()
    {
        $this->selected = [];
        $this->selectAll = false;
    }

    public function mount()
    {
        $this->sortBy            = 'id';
        $this->sortDirection     = 'desc';
        $this->perPage           = 100;
        $this->paginationOptions = config('project.pagination.options');
        $this->orderable         = (new Order())->orderable;
    }

    public function render()
    {
        $query = Order::where('payment_status', 1)->advancedFilter([
            's'               => $this->search ?: null,
            'order_column'    => $this->sortBy,
            'order_direction' => $this->sortDirection,
        ]);

        $orders = $query->paginate($this->perPage);

        return view('livewire.admin.order.paid', compact('orders'));
    }

   

     public function export()
     {
         return(new OrdersExport($this->selected))->download('orders.xls');
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

        $this->alert('warning', __('Data deleted successfully!') );

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


}
