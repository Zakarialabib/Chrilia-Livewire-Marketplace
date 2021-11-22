<?php

namespace App\Observers;

use App\Models\Order;
use App\Models\User;
use App\Notifications\DataChangeNotification;
use Notification;

class OrderObserver
{
    public function created(Order $order): void
    {
        $payload = [
            'action' => 'created',
            'model'  => sprintf('%s#%s', get_class($order), $order->id),
            'reason' => auth()->user(),
        ];

        $admins = User::isAdmin();

        Notification::send($admins, new DataChangeNotification($payload));
    }

    public function updated(Order $order): void
    {
        $payload = [
            'action' => 'updated',
            'model'  => sprintf('%s#%s', get_class($order), $order->id),
            'reason' => auth()->user(),
        ];

        $admins = User::isAdmin();

        Notification::send($admins, new DataChangeNotification($payload));
    }

    public function deleted(Order $order): void
    {
        $payload = [
            'action' => 'deleted',
            'model'  => sprintf('%s#%s', get_class($order), $order->id),
            'reason' => auth()->user(),
        ];

        $admins = User::isAdmin();

        Notification::send($admins, new DataChangeNotification($payload));
    }
  
    public function saving(Order $order)
    {
        $order->code = $order->receiver_name;
    }
}