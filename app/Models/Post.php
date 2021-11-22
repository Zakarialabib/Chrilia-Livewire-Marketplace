<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Support\HasAdvancedFilter;


class Post extends Model
{
    use HasAdvancedFilter;
    use HasFactory;

    // Post Status

    const POST_ACITVE = 1;
    const POST_INACTIVE = 0;

    public $table = 'posts';

    public $orderable = [
        'id',
        'title',
        'created_at',
        'updated_at',
        'status',
    ];

    public $filterable = [
        'id',
        'title',
        'created_at',
        'updated_at',
        'status',
    ];

    protected $fillable = [
        'title', 'body','slug', 'image', 
        'seo_title', 'seo_desc', 'status','featured'
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id');
    }
}
