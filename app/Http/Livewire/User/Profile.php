<?php

namespace App\Http\Livewire\User;

use App\Models\Role;
use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Profile extends Component
{
    // public User $user;

    public string $password = '';
    public $user;
    public $name;
    public $address;
    public $phone;
    public $email;
    public $company_name;
    public $bank_name;
    public $rib_number;
   
    protected $listeners = [
        'submit',
    ];

    public function mount()
    {
        $user =   User::find(Auth::user()->id);
        $this->name      = $user->name;
        $this->address       = $user->address;
        $this->phone         = $user->phone;
        $this->email         = $user->email;
        $this->company_name       = $user->company_name;
        $this->bank_name         = $user->bank_name;
        $this->rib_number         = $user->rib_number;

    }

    public function render()
    {
        return view('livewire.user.profile');
    }

    public function submit()
    {
        try{
            $this->user =   User::find(Auth::user()->id);

            $validatedDate = $this->validate([
                'email'          => 'email',
                'name'        => 'string',
                'address'       => 'max:255',
                'phone'       => 'required|numeric|max:1O',
                'company_name'       => 'max:255',
                'bank_name'       => 'string',
                'rib_number'       => 'min:5|max:24',
            ]);

            if($this->password !== '')
                $this->user->password = bcrypt($this->password);
            $this->user->update($validatedDate);

            $this->alert('success', __('Profil updated successfully!') );

        }catch(Exception $e){
            $this->alert('error', __('Unable to update informations!') );

        }

    }


}
