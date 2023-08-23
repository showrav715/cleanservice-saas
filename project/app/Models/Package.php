<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'name',
        'description',
        'price',
        'days',
        'category_limit',
        'product_limit',
        'customer_limit',
        'brand_limit',
        'variant_limit',
        'custom_domain',
        'customer_panel_access',
        'whatsapp_modules',
        'support',
        'qr_code',
        'facebook_pixel',
        'google_analytics',
        'is_featured',
        'status',
    ];


    

}
