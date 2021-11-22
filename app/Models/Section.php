<?php

namespace App\Models;

use App\Support\HasAdvancedFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;
    use HasAdvancedFilter;

    const STATUS_ACITVE = 1;
    const STATUS_INACTIVE = 0;
    
    public $table = 'sections';

    public $orderable = [
        'id',
        'title',
        'status'
    ];

    public $filterable = [
        'id',
        'title',
        'status'
    ];

    protected $fillable = [
        'title','image', 'featured_title', 'label', 'position',
        'link', 'description','status','bg_color'
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    
}
