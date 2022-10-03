<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Support\HasAdvancedFilter;

class Section extends Model
{
    use HasAdvancedFilter;

    public $table = 'sections';
 
    const HOME_PAGE    = 1;
    const ABOUT_PAGE    = 2;
    const PARTNERS_PAGE    = 3;
    const BLOG_PAGE = 4;
    const SERVICE_PAGE  = 5;
    const BRANDS_PAGE  = 6;
    const CONTACT_PAGE  = 7;
    const PRODUCT_PAGE  = 8;

    public $orderable = [
        'id',
        'language_id',
        'page',
        'title',
        'custom_col',
        'custom_html_1',
        'custom_html_2',
        'custom_html_3',
        'content',
        'video',
        'image',
        'status',
    ];

    public $filterable = [
        'id',
        'language_id',
        'page',
        'title',
        'custom_col',
        'custom_html_1',
        'custom_html_2',
        'custom_html_3',
        'content',
        'video',
        'image',
        'status',
    ];

    protected $fillable = [
        'language_id',
        'page',
        'title',
        'custom_col',
        'custom_html_1',
        'custom_html_2',
        'custom_html_3',
        'content',
        'video',
        'image',
        'status',
    ];

    
    protected $dates = [
        'created_at',
        'updated_at',
    ];
    
    
    public function language() {
        return $this->belongsTo('App\Models\Language');
    }
    
}
