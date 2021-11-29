<?php

namespace App\Http\Livewire\Vendor\Product;

use App\Http\Livewire\WithConfirmation;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use App\Http\Livewire\WithSorting;
use Illuminate\Http\Response;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Livewire\Component;
use App\Models\Product;

class Index extends Component
{
    use WithPagination, WithSorting, WithConfirmation, WithFileUploads;

    public int $perPage;

    public array $orderable;

    public string $search = '';

    public $showDeleteModal = false;

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
    }

    public function render()
    {
        $query = Auth::user()->products()
                            ->where('name', 'like', '%'.$this->search.'%')
                            ->where('code', 'like', '%'.$this->search.'%')
                            ->advancedFilter([
                                's'               => $this->search ?: null,
                                'order_column'    => $this->sortBy,
                                'order_direction' => $this->sortDirection,
                            ]);

        $products = $query->paginate($this->perPage);

        return view('livewire.vendor.product.index', compact('products'));
    }

    public function deleteSelected()
    {
        // abort_if(Gate::denies('vendor_product_management'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        Product::whereIn('id', $this->selected)->delete();
        
        $this->showDeleteModal = false;
        
        $this->resetSelected();
    }

    public function delete(Product $product)
    {
        // abort_if(Gate::denies('vendor_product_management'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $product->delete();
    }
}
