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
    
    public $image ;
    
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
        
        if($this->image){
            $filename = $this->image->store("/");
        }
        $this->product->image = $filename;
        // dd($this->product);
        
        $this->product->status = 1;

        $this->product->stock = 1;
        
        $this->product = Auth::user()->products()->save($this->product);
        
        $this->alert('success', __('Product created successfully!') );

        return redirect()->route('vendor.products.index'); 
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
            'product.category' => [
                'nullable' 
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
