<?php

namespace App\Http\Livewire\Admin\Page;

use App\Models\Page;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Illuminate\Validation\Rule;
use App\Support\Helper;

class Edit extends Component
{
    use WithFileUploads;

    public Page $page;

    public $content, $title, $slug, $image, $seo_title, $seo_desc;

    protected $listeners = [
        'submit',
    ];

    public function rules()
    {
        return [
        'page.title' => 'required|min:|max:191',
        'page.content' => 'required',
        'page.seo_title' => 'nullable',
        'page.seo_desc' => 'nullable',
        ];
    }
    public function mount(Page $page)
    {
        $this->page = $page;
        $this->title = $page->title;
        $this->content = $page->content;
        $this->slug = $page->slug;
        $this->image = $page->image;
        $this->seo_title = $page->seo_title;
        $this->seo_desc = $page->seo_desc;
    }  

    public function render()
    {
        return view('livewire.admin.page.edit');
    }


    public function submit()
    {
        $this->validate();

        if ($filename = null) {
            $filename = $this->image->store('/');
        }

        $this->page->slug = Str::slug($this->page->title);
        $this->page->image = $filename;
        
        $this->page->update();
        
        $this->alert('success', __('Page updated successfully!') );
       
        return redirect()->route('admin.pages.index');

    }
}
