<?php

namespace App\Http\Livewire\Front;

use Livewire\Component;
use Http;
use App\Models\Phone;

class Phonesearch extends Component
{
    public $brand, $phone_name;
    
    public $search = '';

    public function mount(){
        $this->search = request()->query('search', $this->search);
    }

    public function render()
    {
        $searchResults = [];

        if (strlen($this->search) >= 2) {
                
            $searchResults = Http::get('https://api-mobilespecs.azharimm.site/v2/search?query='.$this->search)->json();
            //  dd($data);
            foreach ($searchResults['data']['phones'] as $item){
                $phone_name = $item['phone_name'];
                $brand = $item['brand'];
                $slug = $item['slug'];
                $image = $item['image'];
                
                $phone = Phone::create([
                    'phone_name' => $phone_name,
                    'brand' => $brand,
                    'slug' => $slug,
                    'image'=> $image,
                    ], $searchResults); 
                $phone->save();
                
            }
        }
            
            
            return view('livewire.front.phonesearch', [
                'searchResults' => collect($searchResults)->take(2),
            ]);

    }

}
