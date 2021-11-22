<?php

namespace App\Http\Livewire\Admin\Posts;

use Livewire\Component;
use App\Models\Post;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;

class Create extends Component
{
    use WithFileUploads;

    public Post $post;

    public $body, $title, $slug, $image, $seo_title, $seo_desc;
    
    protected $listeners = [
        'submit',
    ];

    public function mount(Post $post)
    {
        $this->post = $post;
    }

    protected $rules = [    
        'post.title' => 'required|min:|max:191',
        'post.body' => 'required',
        'post.image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'post.seo_title' => 'nullable',
        'post.seo_desc' => 'nullable',
        'slug' => 'nullable'
    ];

    public function render()
    {
        return view('livewire.admin.posts.create');
    }
    
    public function submit()
    {
        $this->validate();
       
        if(!empty($this->image)){
        $filename = $this->image->store("/");
        $this->post->image = $filename;
        }
        $this->post->slug = Str::slug($this->post->title);

        $this->post->save();

        $this->alert('success', __('Post created successfully!') );

        return redirect()->route('admin.posts.index');

    }
    
 


}
