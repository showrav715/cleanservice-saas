<?php
namespace App\Traits;

trait SellerCheck
{
    protected static function boot()
    {
        parent::boot();
        static::addGlobalScope('user_id', function (\Illuminate\Database\Eloquent\Builder $builder) {
           return $builder->where('user_id', sellerId());
        }); 
    }
}