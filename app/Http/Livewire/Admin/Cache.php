<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Illuminate\Support\Facades\Artisan;

class Cache extends Component
{
    protected $listeners = ['onClearCache'];

    public function render()
    {
        return view('livewire.admin.cache');
    }

    public function onClearCache()
    {
        Artisan::call('config:clear');
        Artisan::call('cache:clear');
        Artisan::call('route:clear');

        $this->alert('success', __('All caches have been cleared!') );

    }
}
