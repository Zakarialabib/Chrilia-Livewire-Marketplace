<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Support\HasAdvancedFilter;

class Page extends Model
{
    use HasFactory;
    use HasAdvancedFilter;
    
    protected $table = 'pages';
    
    public $orderable = [
        'id',
        'title',
        'active'
    ];

    public $filterable = [
        'id',
        'title',
        'active'
    ];

    protected $fillable = [ 
    'title', 'content', 'image', 'slug',
    'active','seo_title','seo_desc'
    ];
    
    protected $dates = [
        'created_at',
        'updated_at',
    ];

}
