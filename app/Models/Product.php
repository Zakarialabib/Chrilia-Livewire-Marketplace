<?php

namespace App\Models;

use App\Support\HasAdvancedFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Support\Helper;

class Product extends Model
{
    use HasFactory;
    use HasAdvancedFilter;

    public $table = 'products';

    public function __construct(array $attributes = array())
    {
        $this->setRawAttributes(array(
            'code' => Helper::genCode()
        ), true);
        parent::__construct($attributes);
    }

    const STOCK_ACITVE = 1;
    const STOCK_INACTIVE = 0;

    public $orderable = [
        'created_at',
        'id',
        'code',
        'status',
        'name',
        'price',
    ];

    public $filterable = [
        'created_at',
        'id',
        'code',
        'status',
        'name',
        'price'
    ];
    protected $fillable = [
        'code',
        'id',
        'name',
        'price',
        'image',
        'client_id',
        'description',
        'quantity' , // will be add
        'category', // not required 
        'fees', // on category
    ];
    protected $dates = [
        'created_at',
        'updated_at',
    ];

    public function client()
    {
        return $this->belongsTo(User::class, 'client_id', 'id');
    }

    public function stock()
    {
        return $this->hasMany(Stock::class);
    }

}
