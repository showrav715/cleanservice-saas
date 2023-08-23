<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use App\Models\PaymentGateway;

class PackageOrderController extends Controller
{
    public function getForm($keyword)
    {
        $gateway = PaymentGateway::where('keyword',$keyword)->first();
        $paydata = $gateway->convertAutoData();
        return view('landing.payment_form',compact('gateway','paydata'));
    }
}
