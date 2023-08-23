<?php

namespace App\Models;

use App\Traits\SellerCheck;
use Illuminate\Database\Eloquent\Model;

class UserGeneralsetting extends Model
{
    use SellerCheck;
    public $timestamps = false;
    protected $fillable = [
        "user_id","footer_logo","header_logo","favicon","title","theme_color","is_verify","contact_no","menu","currency_possition","support_number","currency_show","language_show","footer_text","copyright_text","copyright_show","order_prefix","email","facebook_pixel","google_analytics",'theme'
    ];


    
    
} 
