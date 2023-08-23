<?php

namespace App\Http\Controllers\LandingPayment;

use App\Http\Controllers\Controller;use App\Models\Domain;
use App\Models\Package;
use App\Models\PaymentGateway;
use Exception;
use Illuminate\Http\Request;

class MercadopagoController extends Controller
{

    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:4|confirmed',
            'domain' => 'regex:/^[a-zA-Z0-9]+$/u|required',
        ]);

        $main_domain = env('MAIN_DOMAIN');
        $domain = $request->domain;
        $final = $domain . '.' . $main_domain;
        $domain_exists = Domain::where('domain', $final)->first();
        if ($domain_exists) {
            return back()->with('error', __('Domain already exists.'));
        }
        $data = PaymentGateway::whereKeyword('mercadopago')->first();
        $support_currencies = $data->currency_id ?? [];

        if (landingCheckCurrency($support_currencies) == false) {
            return back()->with('error', __('This gateway does not support your currency.'));
        }

        $input = $request->all();
        $paydata = $data->convertAutoData();
        $package = Package::findOrFail($request->package_id);
        $item_name = $package->title . " Plan";

        \MercadoPago\SDK::setAccessToken($paydata['token']);
        $payment = new \MercadoPago\Payment();
        $payment->transaction_amount = (string) landingShowAmount($package->price, true);
        $payment->token = $input['token'];
        $payment->description = $item_name;
        $payment->installments = 1;
        $payment->payer = array(
            "email" => $request->email,
        );
        $payment->save();

        if ($payment->status == 'approved') {
            try {
                $subscription = createStore($request->all(), $payment->id, 'Mercadopago', 1);

                if ($subscription) {
                    return redirect()->route('landing.login')->with('success', __('Registration successful. Please login to continue.'));
                } else {
                    return back()->with('error', __('Something is wrong.'));
                }

            } catch (Exception $e) {
                return back()->with('error', $e->getMessage());
            }

        }

        return back()->with('error', __('Payment Failed.'));

    }
}
