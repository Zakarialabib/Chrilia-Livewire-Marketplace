<?php

namespace App\Http\Livewire\Subscription;

use App\Models\Subscription;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;
use Livewire\Component;
use Livewire\WithPagination;
use App\Http\Livewire\WithConfirmation;
use App\Http\Livewire\WithSorting;

class Index extends Component
{
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
        $this->orderable         = (new Subscription())->orderable;
    }

    public function render()
    {
        $query = Subscription::advancedFilter([
            's'               => $this->search ?: null,
            'order_column'    => $this->sortBy,
            'order_direction' => $this->sortDirection,
        ]);

        $subscriptions = $query->paginate($this->perPage);

        return view('livewire.subscription.index', compact('subscriptions'));
    }

    public function deleteSelected()
    {
        abort_if(Gate::denies('subscription_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        Subscription::whereIn('id', $this->selected)->delete();

        $this->showDeleteModal = false;

        $this->resetSelected();
    }

    public function delete(Subscription $subscription)
    {
        abort_if(Gate::denies('subscription_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        
        $subscription->delete();

        $this->alert('warning', __('Subscription deleted successfully!') );

        $this->reRenderParent();
    }
}
