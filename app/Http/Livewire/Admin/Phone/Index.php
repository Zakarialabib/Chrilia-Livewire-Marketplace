<?php

namespace App\Http\Livewire\Admin\Phone;

use Livewire\Component;
use App\Models\Phone; 
use App\Models\Brand; 
use Illuminate\Support\Facades\Http;
use App\Http\Livewire\WithConfirmation;

class Index extends Component
{
    use WithConfirmation;

    public Phone $phone;
    
    public $brand, $title, $phone_name, $slug, $image, $brand_slug;
   
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
    public function render()
    {
        
        $data = Http::get("https://api-mobilespecs.azharimm.site/v2/brands/$brand_slug")->json();
        foreach ($data['data']['phones'] as $item){
            $brand = $item['brand'];
            $phone_name = $item['phone_name'];
            $slug = $item['slug'];
            $image = $item['image'];
            
            $phone = Phone::create([
                 'brand' => $brand ,
                'phone_name'=> $phone_name,
                'slug' => $slug ,
                 'image' => $image ,
                ], $data); 
            $phone->save();
        }


        $phones = Phone::all();
        // $phones = Phone::all();
        return view('livewire.admin.phone.index',compact( 'data', 'phones','brand_slug'));
    }


    public function save()
	{
        $data = Http::get("https://api-mobilespecs.azharimm.site/v2/brands/$this->slug")->json();
        
        foreach ($data['data']['phones'] as $item){
            $brand = $item['brand'];
            $title = $item['title'];
            $phone_name = $item['phone_name'];
            $slug = $item['slug'];
            $image = $item['image'];
        
           $phone = Phone::create([
             'brand' => $brand ,
            'phone_name'=> $phone_name,
            'slug' => $slug ,
             'image' => $image ,
            ], $data); 
        $phone->save();
        
         }

        $this->phone = Phone::save($phone);

	}

  


    public function delete(Phone $phone)
    {
        // TODO: add specific permission

        $phone->delete();

        $this->alert('warning', __('Phone deleted successfully!') );

        $this->reRenderParent();

    }
}
