<?php

namespace App\Http\Livewire\Vendor\Order;

use App\Models\Order;
use App\Models\Subscription;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Create extends Component
{
    public Order $order;
    public $subscriptions = [];
    public $amount = 0;
    public $selectedSubscriptionId;
    

    public function mount()
    {
        $this->order = new Order();
        // convert collection to array in order to bypass livewire bug with pivot table
        $this->subscriptions = Auth::user()->subscriptions->toArray();
    }

    public function render()
    {
        return view('livewire.vendor.order.create');
    }

    public function submit()
    {
        $this->validate();

        $this->order->route()->associate(Route::find($this->selectedSubscriptionId));
        $this->order = Auth::user()->orders()->save($this->order);
        return redirect()->route('vendor.orders.index');
    }

    public function updatedselectedSubscriptionId($subscriptionId)
    {
        $selectedSubscription = Auth::user()->subscriptions()->find($subscriptionId);
        $this->order->price = $this->amount + $selectedSubscription->pivot->price;
    }

    public function updatedAmount($amount)
    {
        $selectedSubscription = Auth::user()->subscriptions()->find($this->selectedSubscriptionId);

        if($selectedSubscription)
            $this->order->price = $amount + $selectedSubscription->pivot->price;
        else
            $this->order->price = $amount;
    }

    protected function rules(): array
    {
        return [
            'order.code' => [
                'string',
                'required',
            ],
            'order.receiver_name' => [
                'string',
                'required',
            ],
            'order.receiver_address' => [
                'string',
                'required',
            ],
            'order.receiver_phone' => [
                'string',
                'required',
            ],
            'order.product_name' => [
                'string',
                'required',
            ],
            'selectedSubscriptionId' => [
                'numeric',
                'required',
            ],
            'order.price' => [
                'numeric',
                'required',
            ],
        ];
    }
}
