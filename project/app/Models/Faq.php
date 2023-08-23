<?php

namespace App\Models;

use App\Traits\SellerCheck;
use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    // TIME STAMPS
    use SellerCheck;
    public $timestamps = false;
}
