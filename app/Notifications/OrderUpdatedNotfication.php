<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class OrderUpdatedNotfication extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($user, $order)
    {

        $this->user = $user;
        $this->order = $order;

        // $this->admin_id = $this->order->admin_id;
        // $user = $this->admin_id;

        $this->code = $this->order->code;
        $this->status = $this->order->status;

    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
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
        ->subject(__('You Recieved This Order #').$this->order->code.' ' )
        ->greeting(__('Hi ').$this->user->name.",")
        ->line(__('Your order #').$this->order->code. __(' has been received.'))
        ->line(__('We will process your delivery and get back to you with an update.'))
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
        'message'=> __('New order N#') .$this->order->code. __(' has been received.')
        ];
    }
}