<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Support\HasAdvancedFilter;

class Service extends Model
{
    use HasAdvancedFilter;

    public $orderable = [
        'id',
        'title',
        'image',
        'content',
        'language_id',
        'status'
    ];

    public $filterable = [
        'id',
        'title',
        'image',
        'content',
        'language_id',
        'status'
    ];

    protected $fillable = [
        'title',
        'image',
        'content',
        'language_id',
        'slug',
        'status'
    ];

    public function language() {
        return $this->belongsTo('App\Models\Language');
    }
}
