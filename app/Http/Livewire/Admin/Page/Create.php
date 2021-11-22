<?php

namespace App\Http\Livewire\Admin\Page;

use App\Models\Page;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Illuminate\Validation\Rule;

class Create extends Component
{
    use WithFileUploads;

    public Page $page;

    public $content, $title, $slug, $image, $seo_title, $seo_desc;

    protected $listeners = [
        'submit',
    ];

    protected $rules = [    
            'page.title' => 'required|min:|max:191',
            'page.content' => 'required',
            'page.image' => 'nullable',
            'page.seo_title' => 'nullable',
            'page.seo_desc' => 'nullable',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'slug' => 'nullable'
        ];


    public function mount(Page $page)
    {
        $this->page = $page;
    }  

    public function render()
    {
        return view('livewire.admin.page.create');
    }

    public function submit()
    {
        $this->validate();

        if(!empty($this->image)){

        $filename = $this->image->store("/");
        }
        
        $this->page->slug = Str::slug($this->page->title);
        $this->page->image = $filename;

        $this->page->save();

        $this->alert('success', __('Page created successfully!') );

        return redirect()->route('admin.pages.index');
    }


}
