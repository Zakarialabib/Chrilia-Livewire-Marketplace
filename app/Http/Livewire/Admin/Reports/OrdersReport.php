<?php

namespace App\Http\Livewire\Admin\Reports;

use App\Http\Livewire\WithConfirmation;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use App\Exports\OrdersReportExport;
use App\Http\Livewire\WithSorting;
use Illuminate\Http\Response;
use Livewire\WithPagination;
use Livewire\Component;
use App\Models\Order;
use App\Models\Role;
use Request;

class OrdersReport extends Component
{
    use WithPagination, WithSorting, WithConfirmation;
    
    public $clients, $start_date, $end_date, $client_id,
    $status, $payment_status;
    
    public array $listsForFields = [];

    public int $perPage;

    public array $orderable;
    
    public array $selected = [];

    public $showDeleteModal = false;

    public array $paginationOptions;

    protected $queryString = [
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
        $this->client_id = '';
        $this->status = '';
        $this->payment_status = '';
        $this->initListsForFields();
    }

    public function render()
    {
        $query = Order::whereDate('created_at', '>=', $this->start_date)
                        ->whereDate('created_at', '<=', $this->end_date)
                        ->when($this->client_id, function ($query) {
                            return $query->where('client_id', $this->client_id);
                        })
                        ->when($this->status, function ($query) {
                            return $query->where('status', $this->status);
                        })
                        ->when($this->payment_status, function ($query) {
                            return $query->where('payment_status', $this->payment_status);
                        })->advancedFilter([
                            'order_column'    => $this->sortBy,
                            'order_direction' => $this->sortDirection,
                        ]);
        $total = $query->sum('total');
        $orders = $query->paginate($this->perPage);

        return view('livewire.admin.reports.orders-report', compact('orders','total'));
    }

    public function export()
    {
        return(new OrdersReportExport($this->selected))->download('orders.xls');
    }
    

    public function generateReport() {
        $this->validate();
        $this->render();
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['clients'] = Role::find(2)->users->pluck('name','id');
    }
   
}
