<?php

namespace App\Http\Livewire\Vendor\Order;

use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Response;
use App\Http\Livewire\WithConfirmation;
use App\Http\Livewire\WithSorting;
use Livewire\WithPagination;
use App\Imports\OrdersImport;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Maatwebsite\Excel\Facades\Excel;

class Index extends Component
{
    use WithPagination, WithSorting,  WithConfirmation;

    public int $perPage;

    public array $orderable;

    public string $search = '';

    public array $selected = [];

    public array $paginationOptions;

    public $file;

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

    public function importFile()
    {
        Excel::import(new OrdersImport, $this->file->path());
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
        $query = Auth::user()->orders()->advancedFilter([
            's'               => $this->search ?: null,
            'order_column'    => $this->sortBy,
            'order_direction' => $this->sortDirection,
        ]);

        $orders = $query->paginate($this->perPage);

        return view('livewire.vendor.order.index', compact('orders'));
    }

    public function deleteSelected()
    {
        abort_if(Gate::denies('vendor_order_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        Order::whereIn('id', $this->selected)->delete();

        $this->resetSelected();
    }

    public function delete(Order $order)
    {
        abort_if(Gate::denies('vendor_order_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $order->delete();
    }
}
