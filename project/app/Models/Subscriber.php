<?php

namespace App\Models;

use App\Traits\SellerCheck;
use Illuminate\Database\Eloquent\Model;

class Subscriber extends Model
{
    use SellerCheck;
    // timestamp
    public $timestamps = false;
}
