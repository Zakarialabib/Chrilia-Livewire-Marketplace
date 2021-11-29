<?php

namespace App\Http\Livewire\Front;

use Livewire\Component;
use App\Models\Product;
use App\Models\User;
use Livewire\WithPagination;
use App\Http\Livewire\WithSorting;

class Market extends Component
{
    use WithPagination, WithSorting;
    
    public int $perPage;

    public string $search = '';

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

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingPerPage()
    {
        $this->resetPage();
    }

    public function mount()
    {

        $this->sortBy            = 'id';
        $this->sortDirection     = 'desc';
        $this->perPage           = 10;
        $this->paginationOptions = config('project.pagination.options');
        $this->orderable         = (new Product())->orderable;

    }

    public function render()
    {

        $query = Product::where('name', 'like', '%'.$this->search.'%')
        ->advancedFilter([
            's'               => $this->search ?: null,
            'order_column'    => $this->sortBy,
            'order_direction' => $this->sortDirection,
        ]);

        $products = $query->paginate($this->perPage);
    
        return view('livewire.front.market', [
            'products' => $products,
        ]);

    }
}
