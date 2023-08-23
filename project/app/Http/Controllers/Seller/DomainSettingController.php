<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Models\DomainRequest;
use Illuminate\Http\Request;

class DomainSettingController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $request_domains = $user->requestDomain;
        return view('seller.domain.index',compact('request_domains'));
    }


    public function sendRequest(Request $request)
    {
  
        $request->validate([
            'domain' => 'required',
            'domain_type' => 'required',
        ]);

        $status = checkValidateDomain($request->domain);
        if($status == 0){
            return redirect()->back()->with('error','already used this domain');
        }

        $user = auth()->user();
        $user->requestDomain()->create([
            'domain' => $request->domain,
            'domain_type' => $request->domain_type,
        ]);
        return redirect()->back()->with('success','Request Send Successfully');
    }


    public function updateRequest(Request $request,$id)
    {
        $request->validate([
            'domain' => 'required',
            'domain_type' => 'required',
        ]);

        $status = checkValidateDomain($request->domain);

        if($status == 0){
            return redirect()->back()->with('error','already used this domain');
        }
       
        $requestDomain = DomainRequest::find($id);
        $requestDomain->update([
            'domain' => $request->domain,
            'domain_type' => $request->domain_type,
        ]);

        return redirect()->back()->with('success','Request Update Successfully');
    }
    
    public function destroy(Request $request)
    {
        $requestDomain = DomainRequest::find($request->id);
        if($requestDomain->status == 1){
            return redirect()->back()->with('error','Request Already Approved');
        }
        $requestDomain->delete();
        return redirect()->back()->with('success','Request Delete Successfully');

    }
}
