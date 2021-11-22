<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Support\HasAdvancedFilter;

class Notification extends Model
{
    use HasFactory;
    use HasAdvancedFilter;

    public $table = 'notifications';
    
    protected $fillable = [
      'id','type', 'notifiable_type', 'notifiable_id', 'data', 'read_at'
    ];
 
    public $orderable = [
      'created_at', 'id','type', 'notifiable_type', 
     'data', 'read_at'
  ];

  public $filterable = [
    'id','type', 'notifiable_type', 'data', 'read_at'

  ];
  
    protected $dates = [
      'created_at',
      'updated_at',
  ];

}