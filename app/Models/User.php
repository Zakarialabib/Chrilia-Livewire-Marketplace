<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use CyrildeWit\EloquentViewable\InteractsWithViews;
use CyrildeWit\EloquentViewable\Contracts\Viewable;
use Illuminate\Notifications\Notifiable;
use App\Support\HasAdvancedFilter;
use App\Models\UserAlert;

class User extends Authenticatable implements Viewable
{
    use InteractsWithViews;
    use HasFactory;
    use Notifiable;
    use HasAdvancedFilter;

    public $table = 'users';

    const STATUS_ACITVE = 1;
    const STATUS_INACTIVE = 0;

    public $orderable = [
        'id',
        'name',
        'email',
        'company_name',
        'status',
        'created_at',
        'email_verified_at',
    ];

    public $filterable = [
        'id',
        'name',
        'email',
        'email_verified_at',
        'roles.title',
    ];

    protected $hidden = [
        'remember_token',
        'password',
    ];

    protected $fillable = [
        'name',
        'email',
        'password',
        'company_name',
        'phone',
        'address',
        'status',
        'banner_image',
        'whatsapp_number', 
        'telegram_link',
    ];

    protected $dates = [
        'email_verified_at',
        'created_at',
        'updated_at',
    ];

    public function isAdmin() {
        return $this->roles->pluck('title')->contains(Role::ROLE_ADMIN);
    }
    
    public function isVendor() {
        return $this->roles->pluck('title')->contains(Role::ROLE_VENDOR);
    }

    public function isClient() {
        return $this->roles->pluck('title')->contains(Role::ROLE_CLIENT);
    }


    public function roles()
    {
        return $this->belongsToMany(Role::class, 'role_user', 'user_id', 'role_id');
    }

    public function subscriptions()
    {
        return $this->belongsToMany(Subscription::class, 'subscription_user', 'user_id', 'subscription_id')->withPivot('price');
    }

    public function orders()
    {
        if($this->isAdmin())
            return $this->hasMany(Order::class, 'admin_id', 'id');
        if($this->isClient())
            return $this->hasMany(Order::class, 'client_id', 'id');
        if($this->isVendor())
            return $this->hasMany(Order::class, 'vendor_id', 'id'); 
    }

    public function products()
    {
        return $this->hasMany(Product::class, 'vendor_id', 'id');
    }

    public function payments()
    {
        return $this->hasMany(Payment::class, 'client_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    
    public function alerts()
    {
        return $this->belongsToMany(UserAlert::class)->withPivot('seen_at');
    }

    public function orderTotal(){
        $orders = $this->orders()->sum('total');
        return $orders;
    }
    
    public function orderInPaidTotal(){
        $orders = $this->orders()->where('payment_status', '=', 0)->sum('total');
        return $orders;
    }

    public function orderPaidTotal(){
        $orders = $this->orders()->where('payment_status', '=', 1)->sum('total');
        return $orders;
    }

    public function paymentTotal(){
        $payments = $this->payments()->sum('amount_received');
        return $payments;
    }
    
}