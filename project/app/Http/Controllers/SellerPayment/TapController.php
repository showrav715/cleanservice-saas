<?php

namespace App\Http\Controllers\SellerPayment;

use App\Http\Controllers\Controller;
use App\Models\Package;
use App\Models\PaymentGateway;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class TapController extends Controller
{

    public function store(Request $request)
    {

        $data = PaymentGateway::whereKeyword('tap')->first();
        $paydata = $data->convertAutoData();
        $support_currencies = $data->currency_id ?? [];
        if (sellerCheckCurrency($support_currencies) == false) {
            return back()->with('error', __('This gateway does not support your currency.'));
        }

        $package = Package::findOrFail($request->package_id);
        Session::put('input_data', $request->all());
        Session::put('package_id', $request->package_id);

        $previous = url()->previous();
        $currency = sellerCurrencyCode();
        $price = landingShowAmount($package->price, true);
        $information = [
            'name' => Auth::user()->name,
            'email' => Auth::user()->email,
        ];

        Session::put('previous', $previous);
        $redirect_url = route('seller.tap.payment.notify');
        return view('front.tab', compact('currency', 'price', 'information', 'paydata', 'previous', 'redirect_url'));

    }

    public function notify(Request $request)
    {
        if ($request->tap_id) {
            $inputData = Session::get('input_data');
            $subscription = subscriptionStore($inputData, $inputData['package_id'], $request->tap_id, ['payment_method' => 'Tap', 'payment_status' => 1]);
            if ($subscription) {
                return redirect()->route('seller.dashboard')->with('success', __('Payment Successfully.'));
            } else {
                return back()->with('error', __('Something is wrong.'));
            }
        } else {
            return redirect(Session::get('previous'))->with('error', __('Something is wrong.'));
        }

    }

}
