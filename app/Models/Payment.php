<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Support\HasAdvancedFilter;
use App\Support\Helper;
use Illuminate\Notifications\Notifiable;

class Payment extends Model
{
    use HasFactory;
    use HasAdvancedFilter;
    use Notifiable;

    const STATUS_PENDING    = 0;
    const STATUS_PROCESSING = 1;
    const STATUS_PAID = 2;
    const STATUS_RETURNED  = 3;

    const PAYMENT_BANK  = 0;
    const PAYMENT_CASH  = 1;

    public function __construct(array $attributes = array())
    {
        $this->setRawAttributes(array(
            'code' => Helper::genCode()
        ), true);
        parent::__construct($attributes);
    }

    public $orderable = [
        'created_at',
        'id',
        'code',
        'status',
        'order_id',
        'method',
    ];

    public $filterable = [
        'created_at',
        'id',
        'code',
        'status',
        'order_id',
        'method',
    ];

    protected $fillable = [
        'id',
        
        'order_id',
        'client_id',

        'code',
        'method',
        'amount_received',

        'admin_amount', // not required
        'vendor_amount', // not required
        'client_amount', // not required
        
        'status',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function client()
    {
        return $this->belongsTo(User::class);
    }
}
