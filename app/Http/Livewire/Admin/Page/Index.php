<?php

namespace App\Http\Livewire\Admin\Page;

use Livewire\Component;
use App\Models\Page;
use App\Http\Livewire\WithConfirmation;
use App\Http\Livewire\WithSorting;
use Livewire\WithPagination;

class Index extends Component
{
    // public $pages;

    use WithPagination, WithSorting, WithConfirmation;
    
    public int $perPage;
    
    public $file;

    public array $orderable;

    public $showDeleteModal = false;

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
    }

    public function mount()
    {
        $this->sortBy            = 'id';
        $this->sortDirection     = 'desc';
        $this->perPage           = 100;
        $this->paginationOptions = config('project.pagination.options');
        $this->orderable         = (new Page())->orderable;
    }

    public function render()
    {
        $query = Page::advancedFilter([
            's'               => $this->search ?: null,
            'order_column'    => $this->sortBy,
            'order_direction' => $this->sortDirection,
        ]);

        $pages = $query->paginate($this->perPage);

        return view('livewire.admin.page.index', compact('pages'));
    }


    public function delete(Page $page)
    {
        // TODO: add specific permission

        $page->delete();

        $this->alert('warning', __('Page deleted successfully!') );

        $this->reRenderParent();

    }

    public function deleteSelected()
    {
        // TODO: add specific permission

        Page::whereIn('id', $this->selected)->delete();

        $this->showDeleteModal = false;

        $this->resetSelected();

        $this->reRenderParent();
    }
    
   
}
