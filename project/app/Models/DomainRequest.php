<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DomainRequest extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'domain',
        'status',
        'domain_type',
        'message',
    ];

    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
