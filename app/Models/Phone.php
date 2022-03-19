<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{ 
    protected $cast = [];
    
    protected $table = 'phones';

    protected $fillable = [
        'brand',
        'title',
        'phone_name',
        'slug',
        'image'
    ];

}