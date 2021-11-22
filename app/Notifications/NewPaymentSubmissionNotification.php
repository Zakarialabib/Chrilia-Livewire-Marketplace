<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewPaymentSubmissionNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($admin, $payment)
    {
        //
        $this->user = $admin;
        $this->payment = $payment;
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
        ->subject(__('Payment submitted'))
        ->greeting(__('Hi ') .$this->user->name.",")
        ->line(__('Your payment receipt for #') .$this->payment->code.' has been received.')
        ->line(__('We will process your payment and get back to you with an update.'))
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
            'message'=> __('Payment submitted N#') .$this->payment->code. __(' please check payments page.')
        ];
    }
}   