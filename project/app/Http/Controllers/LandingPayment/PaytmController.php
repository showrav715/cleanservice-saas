<?php

namespace App\Http\Controllers\LandingPayment;

use App\Http\{
    Traits\Paytm,
	
};
use App\Http\Controllers\Controller;
use App\Models\Domain;
use App\Models\Package;
use App\Models\PaymentGateway;
use Illuminate\{
	Http\Request,
};
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class PaytmController extends Controller
{

    use Paytm;
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


        $data = PaymentGateway::whereKeyword('paytm')->first();
        $support_currencies = $data->currency_id ?? [];
        if (landingCheckCurrency($support_currencies) == false) {
            return back()->with('error', __('This gateway does not support your currency.'));
        }

        $package = Package::findOrFail($request->package_id);
	    $data_for_request = $this->handlePaytmRequest( Str::random(9), landingShowAmount($package->price,true), 'landing','admin' );
	    $paytm_txn_url = 'https://securegw-stage.paytm.in/theia/processTransaction';
	    $paramList = $data_for_request['paramList'];
	    $checkSum = $data_for_request['checkSum'];
        Session::put('package_id', $package->id);
        Session::put('input_data', $request->all());
	    return view( 'landing.paytm-merchant-form', compact( 'paytm_txn_url', 'paramList', 'checkSum' ) );
    }


	public function paytmCallback( Request $request ) {

        
        $inputData = Session::get('input_data');

		if ('TXN_SUCCESS' === $request['STATUS'] ) {
			$transaction_id = $request['TXNID'];
            $subscription = createStore($inputData, $transaction_id, 'Paytm',1);
            if($subscription){
                return redirect()->route('landing.login')->with('success', __('Registration successful. Please login to continue.'));
            }else{
                 return back()->with('error', __('Something is wrong.'));
            }

		} else if( 'TXN_FAILURE' === $request['STATUS'] ){
            return back()->with('error', __('Something is wrong.'));
		}
    }
}