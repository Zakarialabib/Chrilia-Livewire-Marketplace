<?php

namespace App\Http\Livewire\User;

use App\Models\Role;
use App\Models\User;
use App\Models\Subscription;
use Livewire\Component;
use Livewire\WithPagination;

class Edit extends Component
{
    use WithPagination;

    public int $perPage;

    public array $paginationOptions;

    public User $user;

    public array $roles = [];

    public array $subscriptions = [];

    public $price = "10";

    public string $password = '';

    public array $listsForFields = [];
   
    protected $listeners = [
        'submit',
    ];

    protected function initListsForFields(): void
    {
        $this->listsForFields['roles'] = Role::pluck('title', 'id')->toArray();
    }

    public function mount(User $user)
    {
        $this->user  = $user;
        $this->perPage           = 5;
        $this->paginationOptions = config('project.pagination.options');

        $this->roles = $this->user->roles->pluck('id')->toArray();

        $this->subscriptions = $this->user->subscriptions->toArray();

        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.user.edit');
    }

    public function submit()
    {
        $this->validate();
        
        if($this->password !== '')
        $this->user->password = bcrypt($this->password);
    
        $this->user->update();

        $this->user->roles()->sync($this->roles);
        
        foreach ($this->subscriptions as $key => $subscription) {
            $this->user->subscriptions()
                        ->updateExistingPivot(
                        $subscription['id'], 
                        ['price' => $subscription['pivot']['price'],]
                    );
        }

        $this->alert('success', __('User updated successfully!') );

        return redirect()->route('admin.users.index');
    }

    public function updateSubscriptions()
    {
        $subscriptionIds = Subscription::pluck('id');
        $this->user->subscriptions()->sync($subscriptionIds);
        $this->alert('success', __('Subscription updated successfully!') );
    }

    public function removeSubscription($subscriptionId, $userId)
    {
        $user = User::find($userId);    
        $user->subscriptions()->detach($subscriptionId);
        $this->subscriptions = $user->subscriptions()->get()->toArray();
        $this->alert('success', __('Subscription removed successfully!') );
    }

    protected function rules(): array
    {
        return [
            'user.name' => [
                'string',
                'required',
            ],
            'user.email' => [
                'email:rfc',
                'required',
                'unique:users,email,' . $this->user->id,
            ],
            'user.phone' => [
                'numeric',
                'required',
            ],
            'user.company_name' => [
                'string',
            ],
            'user.address' => [
                'string',
            ],
            'user.bank_name' => [
                'string',
            ],
            'user.rib_number' => [
                'string',
                'numeric',
                'min:5|max:24'
            ],
            'password' => [
                'string',
            ],
            'roles' => [
                'required',
                'array',
            ],
            'roles.*.id' => [
                'integer',
                'exists:roles,id',
            ],
        ];
    }

   
}
