<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Helpers\MediaHelper;
use App\Models\Generalsetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;

class GeneralSettingController extends Controller
{


    public function update(Request $request)
    {
        
      

       $gs     = Generalsetting::first();
       if($request->basic){
        $request->validate([
            'title' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'address' => 'required',
            'footer_text' => 'required',
            'copyright_text' => 'required',
            'contact_page_title' => 'required',
            'contact_page_text' => 'required',
        ]);
        
            $gs->title         = $request->title;
            $gs->phone    = $request->phone;
            $gs->email    = $request->email;
            $gs->address    = $request->address;
            $gs->footer_text    = $request->footer_text;
            $gs->copyright_text    = $request->copyright_text;
            $gs->contact_page_title    = $request->contact_page_title;
            $gs->contact_page_text    = $request->contact_page_text;
       }

    //    if($request->switch){

    //         $gs->is_maintenance = $request->is_maintenance ? 1 : 0;
    //         $gs->is_verify      = $request->is_verify      ? 1 : 0;
    //         $gs->registration   = $request->registration   ? 1 : 0;
    //         $gs->email_notify   = $request->email_notify   ? 1 : 0;
    //         $gs->sms_notify     = $request->sms_notify     ? 1 : 0;
    //         $gs->debug_mode     = $request->debug_mode     ? 1 : 0;
           
    //    }

       if($request->extension){

            $gs->is_tawk          = $request->is_tawk;
            $gs->tawk_id          = $request->tawk_id;
            $gs->recaptcha        = $request->recaptcha;
            $gs->recaptcha_key    = $request->recaptcha_key ;
            $gs->recaptcha_secret = $request->recaptcha_secret;

       }

       
       $images = ['header_logo','favicon'];
       foreach($images as $image){
           if(isset($request[$image])){
              $gs[$image] = MediaHelper::handleUpdateImage($request[$image],$gs[$image]);
           }
       }


        $gs->update();


       setEnv('NOCAPTCHA_SECRET', $request->recaptcha_secret);
       setEnv('NOCAPTCHA_SITEKEY',$request->recaptcha_key);
       $this->emailConfig($request->all());
       if($gs->debug_mode == 1) setEnv('APP_DEBUG','true','false');
       else  setEnv('APP_DEBUG','false','true');
      
       Cache::forget('generalsettings');
       return redirect()->back()->with('success','Data updated successfully');
    }

    
   public function emailConfig($input)
   {
        try {
            $this->setEnv('MAIL_HOST',$input['smtp_host']);
            $this->setEnv('MAIL_PORT',$input['smtp_port']);
            $this->setEnv('MAIL_USERNAME',$input['smtp_user']);
            $this->setEnv('MAIL_PASSWORD',$input['smtp_pass']);
            $this->setEnv('MAIL_ENCRYPTION',$input['mail_encryption']);
           
        } catch (\Throwable $e) {
           
        }
   }

    public function logo()
    {
        return view('admin.generalsetting.logo');
    }

    public function favicon()
    {
        return view('admin.generalsetting.favicon');
    }

    public function loader()
    {
        return view('admin.generalsetting.loader');
    }

    public function cookie()
    {
        return view('admin.generalsetting.cookie');
    }
    public function menu()
    {
        return view('admin.generalsetting.menu_section');
    }
  
    public function maintenance()
    {
        return view('admin.generalsetting.maintenance');
    }
    public function siteSettings()
    {
        return view('admin.generalsetting.settings');
    }

    public function banner_section()
    {
         return view('admin.generalsetting.banner_section');
    }

    public function banner_section_update(Request $request)
    {
        $request->validate([
            'banner_photo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'banner_title' => 'required',
            'banner_text' => 'required',
        ]);
        

        $gs = Generalsetting::first();
        
        if($request->banner_photo){
            $gs->banner_photo = MediaHelper::handleUpdateImage($request->banner_photo,$gs->banner_photo);
        }
        
        $gs->banner_title = $request->banner_title;
        $gs->banner_text = $request->banner_text;
        $gs->banner_video = $request->banner_video;
        $gs->update();
        return redirect()->back()->with('success','Data updated successfully');

    }
 
}
