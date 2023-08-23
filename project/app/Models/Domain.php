<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Domain extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'package_order_id',
        'domain',
        'status',
        'will_expire',
        'data',
        'is_trial',
        'user_id',
    ];

   
}
