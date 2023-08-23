<?php

namespace App\Models;

use App\Traits\SellerCheck;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use SellerCheck;
    // timestamp
    public $timestamps = false;

    public function category()
    {
        return $this->belongsTo(Pcategory::class);
    }

}
