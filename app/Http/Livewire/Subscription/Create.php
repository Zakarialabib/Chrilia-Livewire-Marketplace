<?php

namespace App\Http\Livewire\Subscription;

use App\Models\Role;
use App\Models\Subscription;
use Livewire\Component;

class Create extends Component
{
    public Subscription $subscription;
   
    protected $listeners = [
        'submit',
    ];

    public function mount(Subscription $subscription)
    {
        $this->subscription = $subscription;
    }

    public function render()
    {
        return view('livewire.subscription.create');
    }

    public function submit()
    {
        $this->validate();

        $this->subscription->save();

        $vendors = Role::find(2)->users;
        $clients = Role::find(3)->users;
        
        foreach ($vendors as $vendor) {
            $vendor->subscriptions()->attach($this->subscription->id);
        }

        foreach ($clients as $client) {
            $client->subscriptions()->attach($this->subscription->id);
        }

        $this->alert('success', __('Subscription created and attached to users successfully!') );

        return redirect()->route('admin.subscriptions.index');
    }

    protected function rules(): array
    {
        return [
            'subscription.name' => [
                'string',
                'required',
            ],
            'subscription.details' => [
                'string',
                'required',
            ],
        ];
    }
}

