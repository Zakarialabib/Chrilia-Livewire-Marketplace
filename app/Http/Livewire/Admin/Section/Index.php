<?php

namespace App\Http\Livewire\Admin\Section;

use App\Models\Section;
use Livewire\Component;
use Illuminate\Support\Str;
use App\Http\Livewire\WithConfirmation;
use App\Http\Livewire\WithSorting;
use Livewire\WithPagination;

class Index extends Component
{
    public $section;

    use WithPagination, WithSorting, WithConfirmation;
    
    public int $perPage;

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
        $this->perPage           = 10;
        $this->paginationOptions = config('project.pagination.options');
        $this->orderable         = (new Section())->orderable;
    }

    public function render()
    {
        $query = Section::advancedFilter([
            's'               => $this->search ?: null,
            'order_column'    => $this->sortBy,
            'order_direction' => $this->sortDirection,
        ]);

        $sections = $query->paginate($this->perPage);

        return view('livewire.admin.section.index', compact('sections'));
    }

    public function deleteSelected()
    {
        Section::whereIn('id', $this->selected)->delete();
        
        $this->showDeleteModal = false;

        $this->resetSelected();

        $this->reRenderParent();
    }

    public function delete(Section $section)
    {
        $section->delete();

        $this->alert('warning', __('Section deleted successfully!') );

        $this->reRenderParent();
    }
}
