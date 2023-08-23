<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogCategory extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'name',
        'slug',
        'status'
    ];

    public function blogs()
    {
        return $this->hasMany(Blog::class, 'category_id', 'id');
    }
}
