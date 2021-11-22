<?php

namespace App\Http\Livewire\Admin\Posts;

use App\Models\Post;
use Livewire\Component;
use Illuminate\Support\Str;
use App\Http\Livewire\WithConfirmation;
use App\Http\Livewire\WithSorting;
use Livewire\WithPagination;

class Index extends Component
{
    public $post;

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
        $this->orderable         = (new Post())->orderable;
    }

    public function render()
    {
        $query = Post::advancedFilter([
            's'               => $this->search ?: null,
            'order_column'    => $this->sortBy,
            'order_direction' => $this->sortDirection,
        ]);

        $posts = $query->paginate($this->perPage);

        return view('livewire.admin.posts.index', compact('posts'));
    }

    public function deleteSelected()
    {
        // TODO: add specific permission
       // abort_if(Gate::denies('client_order_management'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        Post::whereIn('id', $this->selected)->delete();
        
        $this->showDeleteModal = false;

        $this->resetSelected();

        $this->reRenderParent();
    }

    public function delete(Post $post)
    {
        $post->delete();

        $this->alert('warning', __('Post deleted successfully!') );

        $this->reRenderParent();
    }
}
