<?php

namespace App\Http\Livewire\Admin\Order;

use Livewire\Component;
use App\Models\Order;
use App\Models\Subscription;
use App\Models\Product;

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
        $allProducts = Product::where('status', '=', 1)->get();
        
        return view('livewire.admin.order.edit',compact('allProducts'));
    }

    public function submit()
    {
        $this->validate();

        $this->order->save();

        $this->alert('success', __('Order updated successfully!') );

        return redirect()->route('admin.orders.index');
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
            ],
            'order.route_id' => [
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
