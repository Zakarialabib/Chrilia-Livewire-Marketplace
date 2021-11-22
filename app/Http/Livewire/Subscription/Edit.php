<?php

namespace App\Http\Livewire\Subscription;

use App\Models\Subscription;
use Livewire\Component;

class Edit extends Component
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

        $this->alert('success', __('Subscription updated successfully!') );

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

