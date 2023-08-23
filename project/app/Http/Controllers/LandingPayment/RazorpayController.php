<?php

namespace App\Http\Controllers\LandingPayment;

use App\Http\Controllers\Controller;
use App\Models\Domain;
use App\Models\Package;
use App\Models\PaymentGateway;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Razorpay\Api\Api;

class RazorpayController extends Controller
{
    public $keyId;
    public $keySecret;
    public $displayCurrency;
    public $api;
    public function __construct()
    {
        $data = PaymentGateway::whereKeyword('razorpay')->first();
        $paydata = $data->convertAutoData();
        $this->keyId = $paydata['key'];
        $this->keySecret = $paydata['secret'];
        $this->displayCurrency = 'INR';
        $this->api = new Api($this->keyId, $this->keySecret);
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



        $package  = Package::findOrFail($request->package_id);  
        $data = PaymentGateway::whereKeyword('razorpay')->first();
        $support_currencies = $data->currency_id ?? [];
        if (landingCheckCurrency($support_currencies) == false) {
            return back()->with('error', __('This gateway does not support your currency.'));
        }

 
        $this->displayCurrency = '' . 'INR' . '';

        $item_name = $package->name;
        $item_number = Str::random(4) . time();

        $notify_url = route('landing.razorpay.notify');

        $orderData = [
            'receipt' => $item_number,
            'amount' => landingShowAmount($package->price,true) * 100, // 2000 rupees in paise
            'currency' => 'INR',
            'payment_capture' => 1, // auto capture
        ];

        $razorpayOrder = $this->api->order->create($orderData);
        $razorpayOrderId = $razorpayOrder['id'];
        session(['razorpay_order_id' => $razorpayOrderId]);
        $displayAmount = $amount = $orderData['amount'];

        if ($this->displayCurrency !== 'INR') {
            $url = "https://api.fixer.io/latest?symbols=$this->displayCurrency&base=INR";
            $exchange = json_decode(file_get_contents($url), true);

            $displayAmount = $exchange['rates'][$this->displayCurrency] * $amount / 100;
        }

        $data = [
            "key" => $this->keyId,
            "amount" => $amount,
            "name" => $item_name,
            "description" => $item_name,
            "prefill" => [
                "name" => $request->name,
                "email" => $request->email,
                "contact" => '',
            ],
            "notes" => [
                "address" =>'',
                "merchant_order_id" => $item_number,
            ],
            "theme" => [
                "color" => "#F37254",
            ],
            "order_id" => $razorpayOrderId,
        ];

        if ($this->displayCurrency !== 'INR') {
            $data['display_currency'] = $this->displayCurrency;
            $data['display_amount'] = $displayAmount;
        }
        Session::put('input_data', $request->all());
        $json = json_encode($data);
        $displayCurrency = $this->displayCurrency;
        Session::put('package_id', $request->package_id);
        return view('landing.razorpay-merchant', compact('data', 'displayCurrency', 'json', 'notify_url'));

    }

    public function razorCallback (Request $request)
    {
        $inputData = Session::get('input_data');
        $package_id = Session::get('package_id');
        $success = true;
        if (empty($_POST['razorpay_payment_id']) === false) {
            try
            {
                $attributes = array(
                    'razorpay_order_id' => session('razorpay_order_id'),
                    'razorpay_payment_id' => $_POST['razorpay_payment_id'],
                    'razorpay_signature' => $_POST['razorpay_signature'],
                );
                $this->api->utility->verifyPaymentSignature($attributes);
            } catch (SignatureVerificationError $e) {
                $success = false;
            }
        }

        if ($success === true) {
            $transaction_id = $_POST['razorpay_payment_id'];
            $subscription = createStore($inputData, $transaction_id, 'Razorpay',1);
            if($subscription){
                return redirect()->route('landing.login')->with('success', __('Registration successful. Please login to continue.'));
            }else{
                 return back()->with('error', __('Something is wrong.'));
            }
        }
    }
}
