<?php

namespace App\Http\Livewire\Admin\Section;

use App\Models\Section;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Illuminate\Validation\Rule;

class Create extends Component
{
    use WithFileUploads;
    
    public Section $section;
    
    public $title, $image, $featured_title, $postion,$bg_color,
    $label, $link, $description, $status;

    protected $listeners = [
        'submit',
    ];

    protected $rules = [    
            'section.title' => 'required|min:|max:191',
            'section.featured_title' => 'nullable',
            'section.position' => 'required|in:1,2,3,4',   
            'section.description' => 'nullable',
            'section.bg_color' => 'nullable',
            'section.label' => 'nullable',
            'section.link' =>'nullable',
        ];


    public function mount(Section $section)
    {
        $this->section = $section;
    }  

    public function render()
    {
        return view('livewire.admin.section.create');
    }

    public function submit()
    {
        $this->validate();

        if(!empty($this->image)){
            $filename = $this->image->store("/");
            $this->section->image = $filename;
        }
            

        $this->section->save();

        $this->alert('success', __('Section created successfully!') );

        return redirect()->route('admin.sections.index');
    }
}
