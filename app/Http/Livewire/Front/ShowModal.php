<?php

namespace App\Http\Livewire\Front;

use Livewire\Component;
use App\Http\Livewire\Modal;
use App\Models\Product;

class ShowModal extends Modal
{
    public Product $product;  

    public $show;

    public function mount(Product $product)
    {
        $this->product = $product;
        
        $this->emitTo('show-modal', 'show');
    }

    public function render()
    {
        return view('livewire.front.show-modal');
    }
}
