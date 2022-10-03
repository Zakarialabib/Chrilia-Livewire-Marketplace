<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{

    protected $cast = [];
    
    protected $table = 'brands';

    protected $fillable = [
        'name',
        'device_count',
        'brand_slug'
    ];

}