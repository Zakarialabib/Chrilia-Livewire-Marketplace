<?php

namespace App\Http\Livewire\Vendor\Product;

use App\Models\Product;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    public Product $product;    
    
    protected $listeners = [
        'submit',
    ];

    public function mount()
    {
        $this->product = new Product();
    }

    public function render()
    {
        return view('livewire.vendor.product.create');
    }

    public function submit()
    {
        $this->validate();

        $this->product = Auth::user()->products()->save($this->product);
        
        $this->alert('success', __('Product created successfully!') );

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
            ],
            'product.price' => [
                'numeric',
                'required',
            ],
            'product.wholesale_price' => [
                'numeric',
                'required',
            ],
        ];
    }
}
