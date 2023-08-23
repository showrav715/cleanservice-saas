<?php

namespace App\Models;

use App\Traits\SellerCheck;
use Illuminate\Database\Eloquent\Model;

class UserContactPage extends Model
{
    use SellerCheck;
    public $timestamps = false;
    protected $fillable = [
        "user_id","email1","email2","phone1","phone2","address",'photo','title','map_link'
    ];
}
