<?php

namespace App\Http\Controllers\SellerPayment;

use App\Http\Controllers\Controller;
use App\Models\Package;
use App\Models\PaymentGateway;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Omnipay\Omnipay;

class PaypalController extends Controller
{

    public $_api_context;
    public $support_currencies;
    public $gateway;
    public function __construct()
    {
        $data = PaymentGateway::whereKeyword('paypal')->first();
        $this->support_currencies = $data->currency_id ?? [];
        $paydata = $data->convertAutoData();

        $this->gateway = Omnipay::create('PayPal_Rest');
        $this->gateway->setClientId($paydata['client_id']);
        $this->gateway->setSecret($paydata['client_secret']);
        $this->gateway->setTestMode(true);
    }

    public function store(Request $request)
    {
        if (landingCheckCurrency($this->support_currencies) == false) {
            return back()->with('error', __('This gateway does not support your currency.'));
        }
        $notify_url = route('seller.paypal.notify');
        $cancel_url = url()->previous();
        $package = Package::findOrFail($request->package_id);

        try {
            $response = $this->gateway->purchase(array(
                'amount' => landingShowAmount($package->price, true),
                'currency' => landingCurrency()->code,
                'returnUrl' => $notify_url,
                'cancelUrl' => $cancel_url,
            ))->send();

            if ($response->isRedirect()) {

                Session::put('input_data', $request->all());
                if ($response->redirect()) {
                    /** redirect to paypal **/
                    return redirect($response->redirect());

                }
            } else {
                return redirect()->back()->with('unsuccess', $response->getMessage());

            }
        } catch (\Throwable$th) {

            return redirect()->back()->with('unsuccess', $response->getMessage());
        }
    }

    public function notify(Request $request)
    {
 
        $responseData = $request->all();
        $inputData = Session::get('input_data');

        if (empty($responseData['PayerID']) || empty($responseData['token'])) {
            return [
                'status' => false,
                'message' => __('Unknown error occurred'),
            ];
        }
        $transaction = $this->gateway->completePurchase(array(
            'payer_id' => $responseData['PayerID'],
            'transactionReference' => $responseData['paymentId'],
        ));

        $response = $transaction->send();
        
        if ($response->isSuccessful()) {
            $subscription = subscriptionStore($inputData, $inputData['package_id'],  $response->getData()['transactions'][0]['related_resources'][0]['sale']['id'],[ 'payment_method' => 'Paypal','payment_status' => 1]);
            if ($subscription) {
                return redirect()->route('seller.dashboard')->with('success', __('Payment Successfully.'));
            } else {
                return back()->with('error', __('Something is wrong.'));
            }
        } else {
            return redirect()->back()->with('error', __('Payment failed'));
        }
    }
}
