<?php

namespace App\Http\Controllers\LandingPayment;

use App\Http\Controllers\Controller;
use App\Models\Domain;
use App\Models\Package;
use App\Models\PaymentGateway;
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

        if (landingCheckCurrency($this->support_currencies) == false) {
            return back()->with('error', __('This gateway does not support your currency.'));
        }

        $notify_url = route('landing.paypal.notify');
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
            $subscription = createStore($inputData, $response->getData()['transactions'][0]['related_resources'][0]['sale']['id'], 'Paypal', 1);
            if ($subscription) {
                return redirect()->route('landing.login')->with('success', __('Registration successful. Please login to continue.'));
            } else {
                return back()->with('error', __('Something is wrong.'));
            }
        } else {
            return redirect()->back()->with('error', __('Payment failed'));
        }

    }
}
