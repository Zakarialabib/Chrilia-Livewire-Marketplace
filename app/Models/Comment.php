<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    const STATUS_CLOSED = 1;
    const STATUS_OPEN = 0;

    protected $fillable = [
        'message',
        'order_id',
        'user_id',
        'status'
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
  
}