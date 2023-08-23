<?php

namespace App\Http\Controllers\SellerPayment;

use App\Http\{
    Traits\Paytm,
	
};
use App\Http\Controllers\Controller;
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
        $data = PaymentGateway::whereKeyword('paytm')->first();
        $support_currencies = $data->currency_id ?? [];
        if (landingCheckCurrency($support_currencies) == false) {
            return back()->with('error', __('This gateway does not support your currency.'));
        }

        $package = Package::findOrFail($request->package_id);
	    $data_for_request = $this->handlePaytmRequest( Str::random(9), landingShowAmount($package->price,true), 'package','admin' );
	    $paytm_txn_url = 'https://securegw-stage.paytm.in/theia/processTransaction';
	    $paramList = $data_for_request['paramList'];
	    $checkSum = $data_for_request['checkSum'];
        Session::put('package_id', $package->id);
	    return view( 'sellerFront.paytm-merchant-form', compact( 'paytm_txn_url', 'paramList', 'checkSum' ) );
    }


	public function paytmCallback( Request $request ) {

        $package_id = Session::get('package_id');
      
		if ('TXN_SUCCESS' === $request['STATUS'] ) {
			$transaction_id = $request['TXNID'];
            $subscription = subscriptionStore($request->all(), $package_id,  $transaction_id,[ 'payment_method' => 'Paytm','payment_status' => 1]);
            if($subscription){
                return redirect()->route('seller.dashboard')->with('success', __('Payment Successfully.'));
            }else{
                 return back()->with('error', __('Something is wrong.'));
            }

		} else if( 'TXN_FAILURE' === $request['STATUS'] ){
            
		}
    }
}