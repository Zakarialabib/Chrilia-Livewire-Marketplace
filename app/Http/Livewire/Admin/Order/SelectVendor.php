<?php

namespace App\Http\Livewire\Admin\Order;

use Auth;
use App\Models\Role;
use App\Models\User;
use App\Models\Notification;
use Livewire\Component;
use Illuminate\Database\Eloquent\Model;
use App\Notifications\DataChangeNotification;

class SelectVendor extends Component
{
    public Model $model;
    
    public $field, $vendor_id, $uniqueId;
    public $couriers = [];

    public function mount()
    {
        $this->clients = Role::find(3)->users;
        $this->client_id = $this->model->getAttribute($this->field);
        $this->uniqueId = uniqid();
    }

    public function updating($field, $value)
    {
        $this->model->admin()->associate(Auth::user());
        $this->model->client()->associate(User::find($value));
        $this->model->save();

        $order = $this->model;

        $user = Notification::find($this->client_id)->pluck('notifiable_id');
        dd($this->client_id);
        $code =  $this->model->code;
        $status =  $this->model->status;
        
        $user->notify(new DataChangeNotification($user, $order,$status,$code));

        $this->alert('success', 'Data Change Notification');

    }

    public function render()
    {
        return view('livewire.admin.order.select-courier');
    }
}
