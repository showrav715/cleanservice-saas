<?php

namespace App\Models;

use App\Traits\SellerCheck;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
   use SellerCheck;
    public $timestamps = false;
}
