<?php

namespace App\Http\Controllers\SellerPayment;

use App\Http\Controllers\Controller;
use App\Models\Package;
use App\Models\PaymentGateway;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MercadopagoController extends Controller
{
    public function store(Request $request)
    {
        $data = PaymentGateway::whereKeyword('mercadopago')->first();
        $support_currencies = $data->currency_id ?? [];
        if (sellerCheckCurrency($support_currencies) == false) {
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
            "email" => Auth::user()->email,
        );
        $payment->save();

        if ($payment->status == 'approved') {
            try {
                $subscription = subscriptionStore($request->all(), $request->package_id, $payment->id, ['payment_method' => 'Mercadopago', 'payment_status' => 1]);
                if ($subscription) {
                    return redirect()->route('seller.dashboard')->with('success', __('Payment Successfully.'));
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
