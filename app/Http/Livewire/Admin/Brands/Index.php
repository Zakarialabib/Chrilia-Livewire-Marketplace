<?php

namespace App\Http\Livewire\Admin\Brands;

use Livewire\Component;
use App\Models\Brand; 
use Illuminate\Support\Facades\Http;
use App\Http\Livewire\WithConfirmation;

class Index extends Component
{
    use WithConfirmation;

    public Brand $brand;
    
    public $name ,$device_count, $brand_name, $brand_slug;

    protected $listeners = ['reRenderParent'];
    
    public $showDeleteModal = false;
    
    public function reRenderParent()
    {
        $this->mount();
        $this->render();
    }

    public function mount()
    {
       
    }

    public function save()
	{
        $data = Http::get('https://api-mobilespecs.azharimm.site/v2/brands')->json();
        
        foreach ($data['data'] as $item){
            $brand_name = $item['brand_name'];
            $device_count = $item['device_count'];
            $brand_slug = $item['brand_slug'];
        
            $brand = Brand::create([
                    'name' => $brand_name,
                    'device_count'=> $device_count,
                    'brand_slug'=> $brand_slug,
                    ], $data); 
            $brand->save();
        
         }

        $this->brand = Brand::save($brand);

	}

    public function render()
    {
        // $data = Http::get('https://api-mobilespecs.azharimm.site/v2/brands')->json();

        $brands = Brand::all();
        return view('livewire.admin.brands.index',compact( 'brands'));
    }

    public function delete(Brand $brand)
    {
        // TODO: add specific permission

        $brand->delete();

        $this->alert('warning', __('Brand deleted successfully!') );

        $this->reRenderParent();

    }
}
