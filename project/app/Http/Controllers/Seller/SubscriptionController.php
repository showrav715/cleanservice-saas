<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Models\Package;
use App\Models\PaymentGateway;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
class SubscriptionController extends Controller
{
    public function index()
    {
        $datas = Package::whereStatus(1)->orderby('id','desc')->get();
        $orders = Auth::user()->package_orders;
        
        return view('seller.subscription.index',compact('datas','orders'));
    }


    public function details($id)
    {
        $gatewayes = PaymentGateway::whereStatus(1)->whereType('automatic')->get();
        $package = Package::find($id);
        $gatewaye = PaymentGateway::where('keyword','paystack')->first();
        $paystackData = json_decode($gatewaye->information,true);
        return view('seller.subscription.details',compact('package','gatewayes','paystackData'));
    }

    public function getForm($keyword)
    {
        $gateway = PaymentGateway::where('keyword',$keyword)->first();
        $paydata = $gateway->convertAutoData();
        return view('seller.partials.payment_form',compact('gateway','paydata'));
    }


    public function order_details($id)
    {
        $order = Auth::user()->package_orders()->where('id',$id)->first();
        $package = $order->package_info;
        return view('seller.subscription.details_order',compact('order','package'));
    }


    public function freeSubscription(Request $request)
    {
        $subscription = subscriptionStore($request->all(), $request->package_id,  Str::random(9),[ 'payment_method' => '--','payment_status' => 1]);
        
        if($subscription){
            return redirect()->route('seller.dashboard')->with('success', __('Subscription Successfully.'));
        }else{
             return back()->with('error', __('Something is wrong.'));
        }
    }
  
}
