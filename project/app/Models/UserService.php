<?php

namespace App\Models;

use App\Traits\SellerCheck;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserService extends Model
{
    use SellerCheck;
    use HasFactory;
    public $timestamps = false;
  
   


    public function faqs()
    {
        return $this->hasMany(ServiceFaq::class,'service_id');
    }
}
