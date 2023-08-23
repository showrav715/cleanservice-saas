<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PackageOrder extends Model
{
    use HasFactory;
    protected $fillable = [ 'order_no','amount','txn','will_expire','user_id','package_id','method','status','payment_status'];

    public function package_info()
    {
    	return $this->belongsTo(Package::class,'package_id','id')->withDefault(
            [
                'name' => 'Package Deleted',
                'price' => 0,
                'days' => 0,
                'description' => 'Package Deleted',
                'status' => 0,
            ]
            );
      
    }

    public function user(){
      return $this->belongsTo(User::class,'user_id','id');                      
    }
  
}
