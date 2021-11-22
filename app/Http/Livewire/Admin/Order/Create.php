<?php

namespace App\Http\Livewire\Admin\Order;

use Livewire\Component;
use App\Models\Order;
use App\Models\Subscription;
use App\Support\Helper;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Notifications\OrderUpdatedNotfication;
use DB;

class Create extends Component
{
    public Order $order;
    public $subscriptions = [];
    public $amount = 0;
    public $selectedSubscriptionId;
    public $vendors;
    public $vendor_id;

    protected $listeners = [
        'submit',
    ];

    public function mount(Order $order)
    {
        $this->order = $order;

        $this->order->code = Helper::genCode();
        
        $this->vendors = Role::find(2)->users;
    }

    public function vendorChange($vendor_id)
    {
        if($vendor_id){    
            $this->vendor_id = User::find($vendor_id);
            $this->subscriptions = $this->vendor_id->subscriptions->toArray();
        }
        
    }
  public function selectedSubscriptionId($subscriptionId)
    {               
        $selectedSubscription = $this->vendor_id->subscriptions()->find($subscriptionId);

        $this->order->price = $this->amount + $selectedSubscription->pivot->price;
    }

    public function updatedAmount($amount)
    {
        $selectedSubscription = $this->vendor_id->subscriptions()->find($this->selectedSubscriptionId);

        if($selectedSubscription)
            $this->order->price = $amount + $selectedSubscription->pivot->price;
        else
            $this->order->price = $amount;
    }

    public function render()
    {
        $subscriptions = Subscription::query();

        return view('livewire.admin.order.create',compact('subscriptions'));
    }

    public function submit()
    {
        $this->validate();

        $this->order->subscription()->associate(Subscription::find($this->selectedSubscriptionId));

        $this->vendor_id = User::find($this->vendor_id);

        $this->order = Auth::user()->orders()->save($this->order);
        
        $user = User::find(1);
        $order = $this->order;
        
        $user->notify(new OrderUpdatedNotfication($user, $order));
        
        $this->alert('success', __('Order created successfully!') );
    }

    protected function rules(): array
    {
        return [
            'order.vendor_id' => [
                'required',
            ],
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
                'numeric',
                'required',
            ],
            'order.product_name' => [
                'string',
            ],
            'selectedSubscriptionId' => [
                'required',
            ],
            'order.price' => [
                'numeric',
                'required',
            ],
        ];
    }
  
}
