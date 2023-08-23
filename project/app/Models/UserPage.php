<?php

namespace App\Models;

use App\Traits\SellerCheck;
use Illuminate\Database\Eloquent\Model;

class UserPage extends Model
{
    use SellerCheck;
    public $timestamps = false;
    protected $fillable = [
        'user_id',
        'title',
        'slug',
        'details',
        'meta_tag',
        'meta_description',
    ];
}
