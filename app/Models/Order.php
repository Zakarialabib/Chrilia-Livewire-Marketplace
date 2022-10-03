<?php

namespace App\Models;

use App\Support\HasAdvancedFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Support\Helper;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;

class Order extends Model
{
    use HasFactory;
    use HasAdvancedFilter;
    use Notifiable;

    // Order Status
    const STATUS_PENDING    = 0;
    const STATUS_PROCESSING = 1;
    const STATUS_COLLECTING = 2;
    const STATUS_CONFIRMED  = 3;
    const STATUS_SHIPPING   = 4; 
    const STATUS_CANCELED   = 5; 
    const STATUS_COMPLETED  = 6;
    const STATUS_RETURNED   = 7;
    const STATUS_PAID       = 8;

    // Payment Status
    const ORDER_INPAID    = 0; 
    const ORDER_PAID = 1;

    protected $attributes = [
        'total' => 0,
    ];

    public function __construct(array $attributes = array())
    {
        $this->setRawAttributes(array(
            'code' => Helper::genCode()
        ), true);
        parent::__construct($attributes);
    }

    public $table = 'orders';

    public $orderable = [
        'id',
        'code',
        'status',
        'description',
        'created_at',
        'total',
        'payment_status',
    ];

    public $filterable = [
        'id',
        'code',
        'status',
        'description',
        'created_at',
        'total'
    ];

    protected $fillable = [
        'id',
        'admin_id',
        'vendor_id',
        'client_id',
        'subscription_id',
        'code',
        'description',
        'status',
        'total',
        'payment_status',
        'shipping',
        'product_id',
        'shipping_status',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    public function details()
    {
        return $this->hasMany(OrderDetail::class);
    }

    public function payment()
    {
        return $this->hasOne(Payment::class, 'order_id', 'id');
    }

    public function admin()
    {
        return $this->belongsTo(User::class, 'admin_id', 'id');
    }

    public function vendor()
    {
        return $this->belongsTo(User::class, 'vendor_id', 'id');
    }
 
    public function client()
    {
        return $this->belongsTo(User::class, 'client_id', 'id');
    }

    public function subscription()
    {
        return $this->belongsTo(Route::class, 'subscription_id', 'id');
    }

    public function products()
    {
        return $this->hasMany(Product::class, 'product_id', 'id');
    }
   
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

}
