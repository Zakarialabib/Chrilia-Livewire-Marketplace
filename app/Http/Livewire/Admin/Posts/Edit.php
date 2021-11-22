<?php

namespace App\Http\Livewire\Admin\Posts;

use App\Models\Post;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Illuminate\Validation\Rule;
use App\Support\Helper;

class Edit extends Component
{
    use WithFileUploads;

    public Post $post;

    public $body, $title, $slug, $image, $seo_title, $seo_desc;
    
    protected $listeners = [
        'submit',
    ];
    
    public function rules()
    {
        return [
        'post.title' => 'required|min:|max:191',
        'post.body' => 'required',
        'post.seo_title' => 'nullable',
        'post.seo_desc' => 'nullable',
        ];
    }
    public function mount(Post $post)
    {
        $this->post = $post;
        $this->title = $post->title;
        $this->body = $post->body;
        $this->slug = $post->slug;
        $this->image = $post->image;
        $this->seo_title = $post->seo_title;
        $this->seo_desc = $post->seo_desc;
    }  

    public function render()
    {
        return view('livewire.admin.posts.edit');
    }


    public function submit()
    {
        $this->validate();

        if ($filename = null) {
            $filename = $this->image->store('/');
        }

        $this->post->slug = Str::slug($this->post->title);
        $this->post->image = $filename;
        
        $this->post->update();
        
        $this->alert('success', __('Post updated successfully!') );
       
        return redirect()->route('admin.posts.index');

    }
}
