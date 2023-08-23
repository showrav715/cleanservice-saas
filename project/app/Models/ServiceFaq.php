<?php

namespace App\Models;

use App\Traits\SellerCheck;
use Illuminate\Database\Eloquent\Model;

class ServiceFaq extends Model
{
    // timestamp
    public $timestamps = false;
    use SellerCheck;
    public function service()
    {
        return $this->belongsTo(UserService::class,'service_id')->withDefault();
    }
}
