<?php

namespace App\Http\Livewire\Client;

use App\Http\Livewire\WithConfirmation;
use Illuminate\Support\Facades\Auth;
use App\Http\Livewire\WithSorting;
use Livewire\WithPagination;
use Livewire\Component;
use App\Models\Product;
use App\Models\Role;
use Carbon\Carbon;

class Products extends Component
{
    use WithPagination, WithSorting,  WithConfirmation;

    public int $perPage;

    public $vendors, $vendor_id,$category,$newest,$oldest;

    public array $listsForFields = [];

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
        $this->orderable         = (new Product())->orderable;
        $this->category = '';
        $this->vendor_id = '';
        $this->initListsForFields();
    }

    public function render()
    { 
        $query = Product::when($this->category, function ($query) {
            return $query->where('category', $this->category);
        })->when($this->vendor_id, function ($query) {
           return $query->where('vendor_id', $this->vendor_id);})
                        ->advancedFilter([
                            's'               => $this->search ?: null,
                            'order_column'    => $this->sortBy,
                            'order_direction' => $this->sortDirection,
                        ]);

        $products = $query->paginate($this->perPage);

        return view('livewire.client.products', compact('products'));
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['vendors'] = Role::find(2)->users->pluck('name','id');
    }
}
