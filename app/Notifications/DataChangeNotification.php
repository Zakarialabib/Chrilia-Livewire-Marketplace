<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Auth;

class DataChangeNotification extends Notification
{
    use Queueable;

     /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($user, $order, $status,$code)
    {
        
        $this->user = $user;
        $this->order = $order;
        $this->code = $code;
        $this->status = $status;

    }

    /**
     * Get the notification's delivery channels.
     *
     * @param mixed $notifiable
     */
    public function via($notifiable): array
    {
        // return ['database','mail'];
        return ['database'];
    }

   /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
        ->subject(__('New Data Change submitted'))
        ->greeting(__('Hi') .$this->user->name . ',' )
        ->line( __('New data change in Order N#').$this->code. ','  )
        ->line(__('We have a new change in this order Status :') .$this->status . ',' )
        // ->action(__('View Order'), url('/orders'))
        ->line(__('For updates or questions, email') .$this->user->email . ',' );
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
        'message'=> __('New change in order N# ') .$this->code. __(' to ') .$this->user->name. ' Order Status : ' .$this->status . ','
        ];
    }
}