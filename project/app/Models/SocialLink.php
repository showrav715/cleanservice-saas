<?php

namespace App\Models;

use App\Traits\SellerCheck;
use Illuminate\Database\Eloquent\Model;

class SocialLink extends Model
{
    // timestamps
    public $timestamps = false;
    use SellerCheck;
}
