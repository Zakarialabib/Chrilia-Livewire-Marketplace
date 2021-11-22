<?php

namespace App\Http\Livewire\Admin\Order;

use App\Notifications\DataChangeNotification;
use Illuminate\Database\Eloquent\Model;
use Livewire\Component;
use App\Models\Order;
use App\Models\User;
use Auth;

class SelectStatus extends Component
{
    public Order $order;

    public $status,$code, $admin_id, 
           $client_id, $vendor_id, $agent_id;


    public function mount()
    {
        $this->status = $this->order->getAttribute($this->status);

    }
    public function updating($order, $id)
    {
        $this->status = $this->order->status;

        $this->order->setAttribute($order, $id)->save();

        $user =   User::find(Auth::user()->id);

        $code =  $this->order->code;

        $status =  $this->order->status;

        $user->notify(new DataChangeNotification($user, $order,$status,$code));
     
        $this->alert('success', 'Data Change Notification');
    }

    public function render()
    {
        return view('livewire.admin.order.select-status');
    }

}
