<?php

namespace App\Http\Controllers\LandingPayment;

use App\Http\Controllers\Controller;
use App\Models\Domain;
use App\Models\PaymentGateway;
use Illuminate\Http\Request;

class PaystackController extends Controller
{

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
            'domain' => 'regex:/^[a-zA-Z0-9]+$/u|required',
        ]);

        $main_domain = env('MAIN_DOMAIN');
        $domain = $request->domain;
        $final = $domain . '.' . $main_domain;
        $domain_exists = Domain::where('domain', $final)->first();
        if ($domain_exists) {
            return back()->with('error', __('Domain already exists.'));
        }

        $data = PaymentGateway::whereKeyword('paystack')->first();
        $support_currencies = $data->currency_id ?? [];
        if (landingCheckCurrency($support_currencies) == false) {
            return back()->with('error', __('This gateway does not support your currency.'));
        }

        if($request->ref_id == null){
            return redirect()->back()->with('error', 'Payment failed');
        }
        $subscription = createStore($request->all(), $request->ref_id, 'Paystack',1);
        
        if($subscription){
            return redirect()->route('landing.login')->with('success', __('Registration successful. Please login to continue.'));
        }else{
             return back()->with('error', __('Something is wrong.'));
        }

    }

}
