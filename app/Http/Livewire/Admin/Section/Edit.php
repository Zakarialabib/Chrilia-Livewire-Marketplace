<?php

namespace App\Http\Livewire\Admin\Section;

use App\Models\Section;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Illuminate\Validation\Rule;

class Edit extends Component
{
    use WithFileUploads;

    public Section $section;

    public $title, $image, $featured_title, $position,$bg_color,
    $label, $link, $description, $status;

    protected $listeners = [
        'submit',
    ];

    protected $rules = [    
        'section.title' => 'required|min:|max:191',
        'section.featured_title' => 'nullable',
        'section.description' => 'nullable',
        'section.bg_color' => 'nullable',
        'section.label' => 'nullable',
        'section.link' =>'nullable',
    ];

    public function mount(Section $section)
    {
        $this->section = $section;
        $this->title = $section->title;
        $this->featured_title = $section->featured_title;
        $this->description = $section->description;
        $this->image = $section->image;
        $this->bg_color = $section->bg_color;
        $this->label = $section->label;
        $this->link = $section->link;
    }  

    public function render()
    {
        return view('livewire.admin.section.edit');
    }
    public function submit()
    {
        $this->validate();

        $filename = $this->image->store('/');

        $this->section->image = $filename;
        
        $this->section->update();
        
        $this->alert('success', __('Section updated successfully!') );
       
        return redirect()->route('admin.sections.index');

    }
}
