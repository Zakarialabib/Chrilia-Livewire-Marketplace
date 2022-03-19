<?php

namespace App\Http\Livewire\Client;

use App\Http\Livewire\WithConfirmation;
use Illuminate\Support\Facades\Auth;
use App\Http\Livewire\WithSorting;
use Livewire\WithPagination;
use Livewire\Component;
use App\Models\Order;

class Orders extends Component
{
    use WithPagination, WithSorting,  WithConfirmation;

    public int $perPage;
    
    public array $orderable;

    public string $search = '';

    public array $selected = [];

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

        return view('livewire.client.orders', compact('orders'));
    }
  
}
