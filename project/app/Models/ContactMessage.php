<?php

namespace App\Models;

use App\Traits\SellerCheck;
use Illuminate\Database\Eloquent\Model;

class ContactMessage extends Model
{
    use SellerCheck;
    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
