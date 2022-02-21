<?php

namespace App\Models;

use App\Support\Helper;
use App\Support\HasAdvancedFilter;
use Illuminate\Database\Eloquent\Model;
use CyrildeWit\EloquentViewable\InteractsWithViews;
use CyrildeWit\EloquentViewable\Contracts\Viewable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Product extends Model implements Viewable , HasMedia
{
    use InteractsWithViews, InteractsWithMedia, 
        HasFactory, HasAdvancedFilter;

    public $table = 'products';

    public function __construct(array $attributes = array())
    {
        $this->setRawAttributes(array(
            'code' => Helper::genCode()
        ), true);
        parent::__construct($attributes);
    }
    const STATUS_ACITVE = 1;
    const STATUS_INACTIVE = 0;

    const STOCK_ACITVE = 1;
    const STOCK_INACTIVE = 0;

    const CAT_NEW = 1;
    const CAT_HOT = 2;
    const CAT_SALE = 3;
    
    public $orderable = [
        'created_at',
        'updated_at',
        'id',
        'code',
        'status',
        'stock',
        'name',
        'price',
        'wholesale_price',
        ];

    public $filterable = [
        'created_at',
        'id',
        'code',
        'status',
        'stock',
        'name',
        'price',
        'wholesale_price',
    ];
    protected $fillable = [
        'code',
        'id',
        'name',
        'price',
        'stock',
        'status',
        'wholesale_price',
        'image',
        'embed_video',
        'vendor_id',
        'admin_id',
        'description',
        'category',
    ];
    protected $dates = [
        'created_at',
        'updated_at',
    ];

    public function vendor()
    {
        return $this->belongsTo(User::class, 'vendor_id', 'id');
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('products')
            ->singleFile()
            ->acceptsMimeTypes(['image/jpg', 'image/jpeg', 'image/png', 'image/gif']);
    }
}
