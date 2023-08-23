<?php

namespace App\Models;

use App\Traits\SellerCheck;
use Illuminate\Database\Eloquent\Model;

class Pcategory extends Model
{
    //timestamps
    public $timestamps = false;
    use SellerCheck;
    public function projects()
    {
        return $this->hasMany(Project::class, 'category_id', 'id');
    }
}
