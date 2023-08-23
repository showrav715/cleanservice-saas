<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Helpers\MediaHelper;
use App\Models\SeoSetting;
use Illuminate\Http\Request;

class SeoSettingController extends Controller
{
    public function index()
    {
        $seosetting = SeoSetting::first();
        return view('admin.seo.index', compact('seosetting'));
    }

    public function update(Request $request, SeoSetting $seoSetting)
    {
        $request->validate([
            'meta_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'title' => 'required|max:200',
            'meta_tag' => 'string',
            'meta_description' => 'string',
            'google_analytics' => 'string|max:250',
            'facebook_pixel' => 'string|max:250',
        ]);

        $input = $request->all();
        if ($request->hasFile('meta_image')) {
            $input['meta_image'] = MediaHelper::handleUpdateImage($request->file('meta_image'), 'seo');
        }
        $seoSetting->update($input);
        return redirect()->back()->with('success', 'Seo Setting Updated Successfully');
    }
}
