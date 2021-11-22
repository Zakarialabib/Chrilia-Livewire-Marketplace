<?php

namespace App\Http\Livewire\Admin\Payment;

use Illuminate\Database\Eloquent\Builder;
use App\Support\Helper;
use App\Models\Order;
use App\Models\Payment;
use App\Models\User;
use App\Models\Role;
use Livewire\Component;
use App\Notifications\PaymentAddedNotification;
use App\Notifications\NewPaymentSubmissionNotification;
use Auth;

class Create extends Component
{
    public Payment $payment;
    public $amount_received;
    public $code; 
    public $method;
    public $order_id = '';
    public $client_id = '' ;
    public $users;
    public $orders = [] ;
    public $orderId;
    public $order;

    protected $listeners = [
        'submit',
    ];
    
    public function mount(Payment $payment ,Order $order,$oid = null)
    {
        $this->payment = $payment;

        $this->client = Order::find($this->order);

        $this->orders = Order::where('client_id', $this->client_id)
                        ->where('payment_status', '=', 0)->get();    
  
        $this->code = Helper::genCode();
        
    }    

    public function submit()
    {
        try{
        
            $this->validate();
            
            $order = Order::find($this->order_id);

            $subscriptionId = $order->route->id;
                      
            $vendor_subscription = $order->client->subscriptions->filter(function($subscription) use($subscriptionId) {
                return $subscription->id === $subscriptionId;
            })->first();
            
            $client_subscription = $order->client->subscriptions->filter(function($subscription) use($subscriptionId) {
                return $subscription->id === $subscriptionId;
            })->first();

            $vendor_amount = $this->amount_received - $vendor_subscription->pivot->price ;
            $client_amount = $client_subscription->pivot->price;            
            
            // $vendor_amount = $this->amount_received - $vendor_subscription->pivot->price ;
    
            // $client_amount = $client_subscription->pivot->price;
    
            $admin_amount = $this->amount_received - $vendor_amount - $client_amount;

            $this->payment->create([
                'payment.code'  => Helper::genCode(),
                'method'    => $this->method,
                'amount_received'   => $this->amount_received,
                'status'    => 2,
                'order_id'    => $this->order_id,
                'client_id'    => $this->client_id,
                'vendor_amount'    =>  $vendor_amount ,
                'client_amount'    => $client_amount,
                'admin_amount'    =>   $admin_amount,
            ]);

            $payment = $this->payment->order()->associate($this->orderId);
            
            $this->updateOrder();
            
            $user = Auth::user();
            
            $user->notify(new PaymentAddedNotification($user, $payment));
            // $admin->notify(new NewPaymentSubmissionNotification($user, $payment));
            $this->alert('success', __('Payment created successfully!') );
            

        }catch(Exception $e){
            $this->alert('error', __('Unable to create new payment!') );
        }

        return redirect()->route('admin.payments.index');
    }

   
    public function updateOrder()
    {
        $order = Order::where('id', $this->order_id)->update([
            'payment_status' => 1,
            'status' => 8
        ]);   

    }

    public function clientChange($id){

        if($id){
            $this->client = User::findOrFail($id);
        }
    }

    public function orderChange(){

        $order = Order::findOrFail($this->order_id); 

        $this->amount_received = $order->price;
    }

    public function render()
    {
        $client = Role::find(2)->users;
        
        $this->orders = Order::where('client_id', $this->client_id)
                            ->where('payment_status', '=', 0)->get(); 

        return view('livewire.admin.payment.create', [
            'orders' => compact($this->orders),
            'client' => $client
        ]);
    }


    protected function rules(): array
    {
        return [
            'payment.client_id' => [
                'string',
            ],
            'payment.code' => [
                'string',
            ],
            'payment.method' => [
                'string',
            ],
            'payment.amount_received' => [
                'string',
            ],
            'payment.order_id' => [
                'string',
                'unique:orders',
            ],
        ];
    }

}
