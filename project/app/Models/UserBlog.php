<?php

namespace App\Models;

use App\Traits\SellerCheck;
use Illuminate\Database\Eloquent\Model;

class UserBlog extends Model
{
    use SellerCheck;
    protected $fillable = ['title','category_id','photo','slug', 'description', 'source', 'views','updated_at', 'status','meta_tag','meta_description','tags'];

    public function category()
    {
        return $this->belongsTo(BlogCategory::class)->withDefault([
            'name' => 'Deleted',
        ]);
    }
}
