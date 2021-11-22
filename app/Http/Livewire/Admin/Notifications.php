<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Notification;
use App\Http\Livewire\WithSorting;
use Livewire\WithPagination;
use App\Http\Livewire\WithConfirmation;

class Notifications extends Component
{
    use WithPagination, WithSorting, WithConfirmation;

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
        $this->orderable         = (new Notification())->orderable;
    }

    public function render()
    {
        $query = Notification::advancedFilter([
            's'               => $this->search ?: null,
            'order_column'    => $this->sortBy,
            'order_direction' => $this->sortDirection,
        ]);

        $notifications = $query->paginate($this->perPage);

        return view('livewire.admin.notifications' , compact('notifications'));
    }


    public function deleteSelected()
    {

        Notification::whereIn('id', $this->selected)->delete();

        $this->showDeleteModal = false;

        $this->resetSelected();

        $this->reRenderParent();

    }
    
    public function delete(Notification $notification)
    {
        $notification->delete();

        $this->alert('warning', __('Notification deleted successfully!') );

        $this->reRenderParent();
    }

}