<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Support\HasAdvancedFilter;

class Partner extends Model
{
    use HasAdvancedFilter;
    
    public $table = 'partners';

    public $orderable = [
        'id',
        'name',
        'image',
        'link',
        'content',
        'status',
        'language_id'
    ];
    
    public $filterable = [
        'id',
        'name',
        'image',
        'link',
        'content',
        'status',
        'language_id'
    ];
    
    protected $fillable = [
        'id',
        'name',
        'image',
        'link',
        'content',
        'status',
        'language_id'
    ];

    public function language() {
        return $this->belongsTo('App\Models\Language');
    }
}
