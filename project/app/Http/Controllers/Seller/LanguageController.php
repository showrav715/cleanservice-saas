<?php

namespace App\Http\Controllers\Seller;

use App\Models\UserLanguage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LanguageController extends Controller
{

    public function index()
    {
        $languages = UserLanguage::orderBy('is_default','DESC')->whereUserId(sellerId())->paginate(12);
        return view('seller.language.index',compact('languages'));
    }
   
    public function store(Request $request)
    {
        //user_id wise name and code unique check

        $request->validate([
            'name' => 'required|max:25|unique:user_languages,language,NULL,id,user_id,'.sellerId(),
            'code' => 'required|unique:user_languages,code,NULL,id,user_id,'.sellerId()

            // 'name' => 'required|max:25|unique:user_languages,language',
            // 'code' => 'required|unique:user_languages,code.'
        ]);

        $mydata = json_decode(json_encode(file_get_contents(resource_path ('/lang/default.json'))));
        $data = new UserLanguage();
        $data->language = $request->name;
        $data->code = $request->code;
        $data->file = sellerId().$request->code.'.json';
        $data->direction = $request->direction;
        $data->user_id = sellerId();
        $data->save();
        
        @file_put_contents(resource_path('/lang/'.$data->file),$mydata);  
        return back()->with('success','Language added successfully');
    }

    public function edit(UserLanguage $language)
    {
        $data_results = file_get_contents(resource_path('/lang/'.$language->file));
        $lang = json_decode($data_results, true);
        return view('seller.language.edit',compact('language','lang'));
    }


    public function update(Request $request, UserLanguage $language)
    {
        
        $request->validate([
            'name' => 'required|max:25|unique:user_languages,language,'.$language->id.',id,user_id,'.sellerId()
        ]);


        $language->language = $request->name;
        $language->direction = $request->direction;
        $language->save();
        return back()->with('success','Language updated successfully');
    }

    public function storeTranslate(Request $request,$id)
    {
        $request->validate([ 'key' => 'required', 'value' => 'required']);
        
        $lang = UserLanguage::findOrFail($id);
        $oldData = json_decode(file_get_contents(resource_path('lang/') . $lang->file),true);

        if (array_key_exists(trim($request->key),$oldData)) {
            return back()->with('error', trim($request->key)." already exist");
        }else {
            $newData[trim($request->key)] = trim($request->value);
            $mergeData  = array_merge($oldData, $newData);
            file_put_contents(resource_path('lang/') . $lang->file, json_encode($mergeData));
            return back()->with('success', "New translation has been added");
        }
    }

    public function updateTranslate(Request $request,$id)
    {
        $request->validate(['key' => 'required', 'value' => 'required']);
        $lang     = UserLanguage::findOrFail($id);
        $oldData  = json_decode(file_get_contents(resource_path('lang/') . $lang->file), true);
        $oldData[trim($request->key)] = $request->value;
        file_put_contents(resource_path('lang/'). $lang->file, json_encode($oldData));
        return back()->with('success', 'Translation updated successfully');
    }

    public function removeTranslate(Request $request)
    {
        $request->validate(['key' => 'required']);
        $lang = UserLanguage::findOrFail($request->language);
        $oldData = json_decode(file_get_contents(resource_path('lang/') . $lang->file),true);
        unset($oldData[trim($request->key)]);
        file_put_contents(resource_path('lang/'). $lang->code . '.json', json_encode($oldData));
        return back()->with('success', "Translation key has been removed");
    }

    public function statusUpdate(Request $request)
    {
        UserLanguage::where('is_default',1)->update(['is_default' => 0]); 
        $lang = UserLanguage::findOrFail($request->id);
        $lang->is_default = 1;
        $lang->update();
        return response()->json(['success' => __('Default language has been changed.')]);      
    }

    public function destroy(Request $request)
    {
        $lang = UserLanguage::findOrFail($request->id);
        $path = resource_path('lang/') . $lang->file;
        file_exists($path) && is_file($path) ? @unlink($path) : false;
        $lang->delete();
        return back()->with('success', 'Language deleted successfully');
    }
}
