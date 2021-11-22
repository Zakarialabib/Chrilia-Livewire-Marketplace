<?php

namespace App\Http\Livewire\Front;

use Livewire\Component;
use App\Models\Order; 

class TrackOrder extends Component
{
    public $code, $order;
    
    protected $listeners = [
        'submit',
    ];

    public function render()
    {
        return view('livewire.front.track-order');
    }

    public function submit(){
       
            $order = Order::where('code', $this->code)->first();

            if($order){

                if($order->status=="0"){
                $this->alert('success', __('Your delivery is pending. please wait.') );

                }
                elseif($order->status=="1"){

                    $this->alert('success', __('Your delivery is under processing please wait.') );

                }
                elseif($order->status=="2"){

                    $this->alert('success', __('Your delivery is collected please wait.') );
                   
                }
                elseif($order->status=="3"){

                    $this->alert('success', __('Your delivery is confirmed please wait.') );

                }
                elseif($order->status=="4"){

                    $this->alert('success', __('Your delivery is shipped please wait.') );

                }
                elseif($order->status=="5"){

                    $this->alert('error', __('Your delivery is cancled for some reason, please contact the administration.') );

                }
                elseif($order->status=="6"){

                    $this->alert('success', __('Your delivery is completed thank you for waiting.') );

                }
                elseif($order->status=="7"){

                    $this->alert('error', __('Your delivery is returned for some reason, please contact the administration.') );

                }
                else if($order->status=="8"){
                
                    $this->alert('success', __('Your delivery is paid, thank you for your corporation.') );
                }else{
                    $this->alert('error', __('Invalid delivery code please try again') );
                }
            }
            else{
                $this->alert('error', __('Invalid delivery code please try again') );
            }

    }
}
