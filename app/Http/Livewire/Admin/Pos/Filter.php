<?php

namespace App\Http\Livewire\Admin\Pos;

use Livewire\Component;

class Filter extends Component
{
    public $categories;
    public $category;
    public $showCount;

    public function mount($categories) {
        $this->categories = $categories;
    }

    public function render() {
        return view('livewire.admin.pos.filter');
    }

    public function updatedCategory() {
        $this->emitUp('selectedCategory', $this->category);
    }

    public function updatedShowCount() {
        $this->emitUp('showCount', $this->category);
    }
}
