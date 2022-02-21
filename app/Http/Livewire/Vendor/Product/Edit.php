<?php

namespace App\Http\Livewire\Vendor\Product;

use Livewire\Component;
use App\Models\Product;
use Livewire\WithFileUploads;

class Edit extends Component
{
    use WithFileUploads;

    public Product $product;

    // public $image ;
    
    protected $listeners = [
        'submit',
    ];

    public function mount(Product $product)
    {
        $this->product = $product;
        $this->image = $product->image;

    }

    public function render()
    {
        return view('livewire.vendor.product.edit');
    }
    protected $rules = [
    'product.code'          => 'required',
    'product.name'        => 'required',
    'product.description'       => 'nullable',
    'product.category'      => 'nullable',
    'product.price'       => 'required|numeric',
    'product.wholesale_price'       => 'numeric',
    // 'product.image' => 'nullable',
    'product.embed_video' => 'nullable',
    ];

    public function submit()
    {
        $this->validate();

        // if (isset($this->image) && $this->image != null){
        // $filename = $filename->getRealPath();
        // }

        // if( $this->image ){

        //     $this->product->clearMediaCollection("products");
        //     // dd($this->image);
        //     $this->product->addMedia( $this->image )->toMediaCollection("products");
        //     $this->image = null;

        // }
                
        $this->product->update();

        $this->alert('success', __('Product updated successfully!') );

        return redirect()->route('vendor.products.index');
 
    }
}