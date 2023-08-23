<?php

namespace App\Http\Controllers\SellerPayment;

use App\Http\Controllers\Controller;
use App\Models\PaymentGateway;
use Illuminate\Http\Request;

class PaystackController extends Controller
{

    public function store(Request $request)
    {
        $data = PaymentGateway::whereKeyword('paystack')->first();
        $support_currencies = $data->currency_id ?? [];
        if (landingCheckCurrency($support_currencies) == false) {
            return back()->with('error', __('This gateway does not support your currency.'));
        }

        if($request->ref_id == null){
            return redirect()->back()->with('error', 'Payment failed');
        }

        $subscription = subscriptionStore($request->all(), $request->package_id,  $request->ref_id,[ 'payment_method' => 'Paystack','payment_status' => 1]);
        if($subscription){
            return redirect()->route('seller.dashboard')->with('success', __('Payment Successfully.'));
        }else{
             return back()->with('error', __('Something is wrong.'));
        }

    }

}
