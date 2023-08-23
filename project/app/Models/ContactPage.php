<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactPage extends Model
{
    // timestamp
    public $timestamps = false;
    protected $fillable = [
        "user_id","email","phone","address","title","map_link"
    ];
}
