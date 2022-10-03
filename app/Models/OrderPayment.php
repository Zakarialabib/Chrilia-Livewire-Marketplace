<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Carbon;

class OrderPayment extends Model
{

    use HasFactory;

    protected $guarded = [];

    public function order() {
        return $this->belongsTo(Order::class, 'order_id', 'id');
    }

    public function setAmountAttribute($value) {
        $this->attributes['amount'] = $value * 100;
    }

    public function getAmountAttribute($value) {
        return $value / 100;
    }

    public function getDateAttribute($value) {
        return Carbon::parse($value)->format('d M, Y');
    }

    public function scopeByOrder($query) {
        return $query->where('order_id', request()->route('order_id'));
    }
}
