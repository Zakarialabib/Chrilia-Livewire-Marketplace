<?php

namespace App\Http\Livewire\Vendor\Product;

use Livewire\Component;
use App\Models\Product;

class Edit extends Component
{
    public Product $product;
    
    protected $listeners = [
        'submit',
    ];

    public function mount(Product $product)
    {
        $this->product = $product;
    }

    public function render()
    {
        return view('livewire.vendor.product.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->order->save();

        $this->alert('success', __('Product updated successfully!') );

        return redirect()->back();   
    }

    protected function rules(): array
    {
        return [
            'product.code' => [
                'string',
                'required',
            ],
            'product.name' => [
                'string',
                'required',
            ],
            'product.image' => [
                'string',
                'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ],
            'product.description' => [
                'string',
                'required',
            ],
            'product.price' => [
                'numeric',
                'required',
            ],
            'product.category'  => [
                'in:default,sm,md,lg,xl',
            ],
            'product.fees' => [
                'string'
            ],
        ];
    }
}