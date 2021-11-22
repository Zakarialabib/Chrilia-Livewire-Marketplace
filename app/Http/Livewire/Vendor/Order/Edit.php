<?php

namespace App\Http\Livewire\Vendor\Order;

use Livewire\Component;
use App\Models\Order;
use App\Models\Subscription;

class Edit extends Component
{
    public Order $order;
    public $subscriptions;
    
    protected $listeners = [
        'submit',
    ];

    public function mount(Order $order)
    {
        $this->order = $order;
        $this->subscriptions = $this->subscriptions;
    }

    public function render()
    {
        return view('livewire.vendor.order.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->order->save();

        $this->alert('success', __('Order updated successfully!') );

        return redirect()->back();   
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
                'numeric',
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
            // 'order.box_open'=> [
           
            // ],
            // 'order.fees'=> [
             
            // ],
            // 'order.insurance'=> [
             
            // ],
        ];
    }
}