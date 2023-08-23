<?php

namespace App\Models;

use App\Traits\SellerCheck;
use Illuminate\Database\Eloquent\Model;

class Counter extends Model
{
    // time stamp
    use SellerCheck;
    public $timestamps = false;
}
