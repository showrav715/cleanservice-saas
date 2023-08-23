<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Http\Helpers\EmailHelper;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = User::withCount('orders')->where('owner_id', Auth::id())->get();
        return view('seller.customer.index', compact('customers'));
    }

    public function edit($id)
    {
        $customer = User::find($id);
        return view('seller.customer.edit', compact('customer'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'nullable|min:6',
        ]);

        $customer = User::find($id);
        $customer->name = $request->name;
        $customer->email = $request->email;
        if ($request->password) {
            $customer->password = bcrypt($request->password);
        }
        $customer->save();
        return redirect()->route('seller.customer.index')->with('success', 'Customer updated successfully');
    }


    public function details($id)
    {
        $customer = User::with('orders')->find($id);
        $total_order = $customer->orders->count();
        $process_order = $customer->orders->where('order_status',1)->count();
        $complete_order = $customer->orders->where('order_status',2)->count();
        $total_amount = $customer->orders->sum('order_total');
        return view('seller.customer.details', compact('customer','total_order','process_order','complete_order','total_amount'));
    }

    public function login($id)
    {
        $customer = User::find($id);
        Auth::login($customer);
        return redirect()->route('seller.user.dashboard');
    }


    public function mail($id)
    {
        $customer = User::find($id);
        return view('seller.customer.mail', compact('customer'));
    }

    public function mailSend(Request $request,$id)
    {
        $request->validate([
            'subject' => 'required',
            'body' => 'required',
        ]);

        $customer = User::find($id);
        $data = [
            'email' => $customer->email,
            'name' => $customer->name,
            'seller_id' => Auth::id(),
            'subject' => $request->subject,
            'body' => $request->body,
        ];

        $MAIL = new EmailHelper();
        $MAIL->sellerMail($data);
        
        return redirect()->route('seller.customer.index')->with('success', 'Mail sent successfully');
    }
}
