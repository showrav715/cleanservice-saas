<?php

namespace App\Models;

use App\Traits\SellerCheck;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    // timestamps
    use SellerCheck;
    public $timestamps = false;
}
