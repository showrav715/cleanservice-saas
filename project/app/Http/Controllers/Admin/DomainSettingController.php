<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Domain;
use App\Models\DomainRequest;
use App\Models\User;

class DomainSettingController extends Controller
{
    public function setting()
    {
        $domain_requests = DomainRequest::with('user')->get();
        return view('admin.domain.index',compact('domain_requests'));
    }

    public function status($id,$status)
    {
        
        $domain_request = DomainRequest::findOrFail($id);
        $current_domain = Domain::where('user_id',$domain_request->user_id)->first();
        if($status == 1){
            cache()->forget($current_domain->domain.$domain_request->user_id);
            cache()->forget('slider'.$current_domain->domain);
            cache()->forget('feature_category'.$current_domain->domain);
            cache()->forget('banners'.$current_domain->domain);
            cache()->forget('services'.$current_domain->domain);
            cache()->forget('front_blogs'.$current_domain->domain);
            cache()->forget('new_products'.$current_domain->domain);
            cache()->forget('best_sellings'.$current_domain->domain);
            cache()->forget('blog_categories'.$current_domain->domain);
            cache()->forget('recent_blogs'.$current_domain->domain);
            cache()->forget('blog_categories'.$current_domain->domain);
            $current_domain->domain =  $domain_request->domain . '.' . env('MAIN_DOMAIN');
            $current_domain->save();
        }
        
        $domain_request->status = $status;
        $domain_request->save();
        return back();
    }
}
