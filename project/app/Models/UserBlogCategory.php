<?php

namespace App\Models;

use App\Traits\SellerCheck;
use Illuminate\Database\Eloquent\Model;

class UserBlogCategory extends Model
{
    use SellerCheck;
    public $timestamps = false;
    protected $fillable = [
        'name',
        'slug',
        'status'
    ];

    public function blogs()
    {
        return $this->hasMany(UserBlog::class,'category_id');
    }
}
