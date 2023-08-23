<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Http\Helpers\MediaHelper;
use App\Models\UserGeneralsetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class GeneralSettingController extends Controller
{

    public function update(Request $request)
    {
        Cache::forget('seller' . getUser('domain') . getUser('user_id'));
        $gs = UserGeneralsetting::first();
       
        
        if ($request->basic) {
            $request->validate([
                'title' => 'required',
                'phone' => 'required',
                'email' => 'required',
                'address' => 'required',
                'working_hour' => 'required',
                'copyright_text' => 'required',

            ]);

            $gs->title = $request->title;
            $gs->phone = $request->phone;
            $gs->email = $request->email;
            $gs->address = $request->address;
            $gs->header_text = $request->header_text;
            $gs->working_hour = $request->working_hour;
            $gs->copyright_text = $request->copyright_text;

        }

        if ($request->type == 'contact_section') {
            $gs->contact_section_header_title = $request->contact_section_header_title;
            $gs->contact_section_title = $request->contact_section_title;
        }

        if ($request->type == 'theme') {
            $gs->theme = $request->theme;
        }

        if ($request->plugin) {
            $gs->is_tawk = $request->is_tawk;
            $gs->tawk_id = $request->tawk_id;
            $gs->is_disqus = $request->is_disqus;
            $gs->disqus = $request->disqus;
        }

        if ($request->maintenance) {
            $gs->is_maintenance = $request->is_maintenance;
            $gs->maintenance = $request->maintenance_message;
        }

        $images = ['header_logo', 'footer_logo', 'favicon', 'maintenance_photo', 'contact_section_photo', 'breadcumb', 'faq_photo', 'counter_photo'];
        foreach ($images as $image) {
            if (isset($request[$image])) {
                $gs[$image] = MediaHelper::sellerHandleUpdateImage($request[$image], $gs[$image]);
            }
        }

        Cache::forget('seller' . getUser('domain') . getUser('user_id'));

        $gs->update();
      
        return redirect()->back()->with('success', 'Data updated successfully');
    }

    public function emailConfig($input)
    {
        try {
            $this->setEnv('MAIL_HOST', $input['smtp_host']);
            $this->setEnv('MAIL_PORT', $input['smtp_port']);
            $this->setEnv('MAIL_USERNAME', $input['smtp_user']);
            $this->setEnv('MAIL_PASSWORD', $input['smtp_pass']);
            $this->setEnv('MAIL_ENCRYPTION', $input['mail_encryption']);

        } catch (\Throwable$e) {

        }
    }

    public function logo()
    {
        return view('seller.generalsetting.logo');
    }
    public function breadcumb()
    {
        return view('seller.generalsetting.breadcumb');
    }

    public function favicon()
    {
        return view('seller.generalsetting.favicon');
    }

    public function loader()
    {
        return view('seller.generalsetting.loader');
    }

    public function contact_section()
    {
        return view('seller.generalsetting.contact_section');
    }

    public function cookie()
    {
        return view('seller.generalsetting.cookie');
    }
    public function menu()
    {
        return view('seller.generalsetting.menu_section');
    }

    public function maintenance()
    {
        return view('seller.generalsetting.maintenance');
    }
    public function siteSettings()
    {
        return view('seller.generalsetting.settings');
    }
    public function pluginSettings()
    {
        return view('seller.generalsetting.plugin');
    }

    public function banner_section()
    {
        return view('seller.generalsetting.banner_section');
    }

    public function themeSettings()
    {
        return view('seller.generalsetting.theme');
    }

    public function banner_section_update(Request $request)
    {
        $request->validate([
            'banner_photo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'banner_title' => 'required',
            'banner_text' => 'required',
        ]);

        $gs = UserGeneralsetting::first();
        if ($request->banner_photo) {
            $gs->banner_photo = MediaHelper::sellerHandleUpdateImage($request->banner_photo, $gs->banner_photo);
        }

        $gs->banner_title = $request->banner_title;
        $gs->banner_text = $request->banner_text;
        $gs->banner_video = $request->banner_video;
        $gs->update();
        return redirect()->back()->with('success', 'Data updated successfully');

    }

    public function maintainance()
    {
        return view('seller.generalsetting.maintainance');
    }

}
