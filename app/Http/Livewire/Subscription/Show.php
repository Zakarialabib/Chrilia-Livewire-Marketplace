<?php

namespace App\Http\Livewire\Subscription;

use Livewire\Component;
use App\Models\Subscription;
use App\Models\User;
use Livewire\WithPagination;

class Show extends Component
{
    use WithPagination;

    public User $user;

    public array $subscriptions = [];
    public int $perPage;
    public array $paginationOptions;

    protected $listeners = ['reRenderParent'];

    public function reRenderParent()
    {
        $this->mount();
        $this->render();
    }

    public function mount(User $user)
    {
        $this->perPage           = 100;
        $this->paginationOptions = config('project.pagination.options');
        $this->user  = $user;
    }

    public function updateSubscriptions()
    {
        $subscriptionIds = Subscription::pluck('id');
        $this->user->subscriptions()->sync($subscriptionIds);
        $this->alert('success', __('Subscription updated successfully!') );
    }

    public function removeSubscription($subscriptionId, $userId)
    {
        $user = User::find($userId);    
        $user->subscriptions()->detach($subscriptionId);
        $this->subscriptions = $user->subscriptions()->get()->toArray();
        $this->alert('success', __('Subscription removed successfully!') );
    }

    public function render()
    {   
        $this->subscriptions = $this->user->subscriptions->toArray();

        return view('livewire.subscription.show');
    }
}
