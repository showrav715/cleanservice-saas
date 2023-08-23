<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Mews\Purifier\Casts\CleanHtml;

class Service extends Model
{
    use HasFactory;
    public $timestamps = false;
  
    public function faqs()
    {
        return $this->hasMany(ServiceFaq::class);
    }
}
