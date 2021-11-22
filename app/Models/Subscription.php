<?php

namespace App\Models;

use App\Support\HasAdvancedFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;
    use HasAdvancedFilter;

    public $table = 'subscriptions';

    public $orderable = [
        'id',
        'name',
        'details',
    ];

    public $filterable = [
        'id',
        'name',
        'details',
    ];

    protected $fillable = [
        'name',
        'details',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    public function users()
    {
        return $this->BelongsToMany(User::class, 'subscription_user', 'subscription_id','user_id')->withPivot('price');
    }
}
