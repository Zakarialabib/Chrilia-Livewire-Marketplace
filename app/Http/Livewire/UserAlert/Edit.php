<?php

namespace App\Http\Livewire\UserAlert;

use App\Models\User;
use App\Models\UserAlert;
use Livewire\Component;

class Edit extends Component
{
    public array $users = [];

    public UserAlert $userAlert;

    public array $listsForFields = [];
  
    protected $listeners = [
        'submit',
    ];

    public function mount(UserAlert $userAlert)
    {
        $this->userAlert = $userAlert;
        $this->users     = $this->userAlert->users()->pluck('id')->toArray();
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.user-alert.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->userAlert->save();
        $this->userAlert->users()->sync($this->users);

        $this->alert('success', __('User Alert updated successfully!') );

        return redirect()->route('admin.user-alerts.index');
    }

    protected function rules(): array
    {
        return [
            'userAlert.message' => [
                'string',
                'required',
            ],
            'users' => [
                'required',
                'array',
            ],
            'users.*.id' => [
                'integer',
                'exists:users,id',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['users'] = User::pluck('name', 'id')->toArray();
    }
}