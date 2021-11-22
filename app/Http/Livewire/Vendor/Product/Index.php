<?php

namespace App\Http\Livewire\Vendor\Product;

use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Response;
use App\Http\Livewire\WithConfirmation;
use App\Http\Livewire\WithSorting;
use App\Imports\ProductsImport;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Maatwebsite\Excel\Facades\Excel;

class Index extends Component
{
    use WithPagination;
    use WithSorting;
    use WithConfirmation;
    use WithFileUploads;

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
        Excel::import(new ProductsImport, $this->file->path());
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
        $this->orderable         = (new Product())->orderable;
    }

    public function render()
    {
        $query = Auth::user()->products()->advancedFilter([
            's'               => $this->search ?: null,
            'order_column'    => $this->sortBy,
            'order_direction' => $this->sortDirection,
        ]);

        $products = $query->paginate($this->perPage);

        return view('livewire.vendor.product.index', compact('products'));
    }

    public function deleteSelected()
    {
        abort_if(Gate::denies('client_product_management'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        Product::whereIn('id', $this->selected)->delete();

        $this->resetSelected();
    }

    public function delete(Product $product)
    {
        abort_if(Gate::denies('client_product_management'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $product->delete();
    }
}
