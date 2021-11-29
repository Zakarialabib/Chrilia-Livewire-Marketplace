<?php

namespace App\Http\Livewire\Admin\Product;

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
use App\Models\Role;

class Index extends Component
{
    use WithPagination, WithSorting, WithConfirmation, WithFileUploads;

    public int $perPage;

    public array $orderable;

    public string $search = '';

    public array $selected = [];

    public array $paginationOptions;
    
    public $vendors, $vendor_id;

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
        $this->vendor_id = '';
        $this->initListsForFields();
    }

    public function render()
    {
        $query = Product::when($this->vendor_id, function ($query) {
            return $query->where('vendor_id', $this->vendor_id);
                        })->advancedFilter([
                            's'               => $this->search ?: null,
                            'order_column'    => $this->sortBy,
                            'order_direction' => $this->sortDirection,
                        ]);

        $products = $query->paginate($this->perPage);

        return view('livewire.admin.product.index', compact('products'));
    }

    public function deleteSelected()
    {
        // abort_if(Gate::denies('admin_product_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        Product::whereIn('id', $this->selected)->delete();

        $this->resetSelected();
    }

    public function delete(Product $product)
    {
        // abort_if(Gate::denies('admin_product_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $product->delete();
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['vendors'] = Role::find(2)->users->pluck('name','id');
    }
}
