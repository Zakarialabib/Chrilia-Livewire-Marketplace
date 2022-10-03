<?php

namespace App\Http\Livewire\Admin\About;

use Str;
use App\Models\About;
use Livewire\Component;
use App\Models\Language;
use Livewire\WithFileUploads;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Create extends Component
{
    use LivewireAlert;
    use WithFileUploads;

    public About $about;
    
    public $image, $icon,$inputs;

    protected $listeners = [
        'submit',
    ];
    
    protected $rules = [    
        'about.language_id' => 'required',
        'about.status' => 'required',
        'about.image' => 'nullable',
        'about.title' => 'required|unique:abouts,title|max:191',
        'about.content' => 'required',
    ]; 

    public function mount(About $about)
    {
        $this->about = $about;
        
        $this->fill([
            'inputs' => collect([['block_content' => '']]),
        ]);
    }

    public function render()
    {
        return view('livewire.admin.about.create');
    }

    public function submit()
    {
        $this->validate();
        
        $this->about->slug = Str::slug($this->about->title);
        
        if($this->image){
            $imageName = Str::slug($this->about->title).'.'.$this->image->extension();
            $this->image->storeAs('abouts',$imageName);
            $this->about->image = $imageName;
        }
        foreach($this->inputs as $key => $input){
            $this->about->block_title = json_encode($input['block_title']);
        }

        $this->about->save();

        $this->alert('success', __('About created successfully!') );

        return redirect()->route('admin.about.index');
    }

    public function addInput()
    {
        $this->inputs->push(['block_content' => '']);
    }

    public function removeInput($key)
    {
        $this->inputs->pull($key);
    }
  
}
