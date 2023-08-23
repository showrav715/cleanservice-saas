<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Package;
use App\Models\PackageOrder;
use App\Models\PaymentGateway;
use Carbon\Carbon;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    public function index()
    {
        $orders = PackageOrder::with('package_info','user')->get();
        return view('admin.order.index', compact('orders'));
    }

    public function details($id)
    {
        $order = PackageOrder::with('package_info', 'user')->find($id);
        return view('admin.order.details', compact('order'));
    }

    public function edit($id)
    {
        $order = PackageOrder::with('package_info', 'user')->find($id);
        $gateweys = PaymentGateway::whereStatus(1)->get();
        $packages = Package::whereStatus(1)->get();
        return view('admin.order.edit', compact('order', 'gateweys', 'packages'));
    }

    public function update(Request $request, $id)
    {
        $package = Package::find($request->package_id);
        $order = PackageOrder::findOrfail($id);
        $order->order_no = $request->order_no;
        $order->package_id = $request->package_id;
        $order->txn = $request->txn;
        $order->method = $request->method;
        $order->amount = $request->amount;
        $order->payment_status = $request->payment_status;
        $exp_days = $package->days;
        $expiry_date = \Carbon\Carbon::now()->addDays(($exp_days))->format('Y-m-d');
        $order->will_expire = $expiry_date;
        $order->status = $request->order_status;
        $order->save();

        $user = $order->user;
        $domain = $user->domain;
        
        $domain->data = json_encode($package,true);
        $domain->will_expire = $expiry_date;
        $domain->save();

        $request->session()->flash('success', 'Order updated successfully!');
        return redirect()->route('admin.order.index');
        
    }

}
