<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Http\Helpers\MediaHelper;
use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $about = About::first();
        return view('seller.about.index', compact('about'));
    }

    public function update(Request $request)
    {
        $about = About::first();

        if (isset($request['photo'])) {
            $status = MediaHelper::ExtensionValidation($request['photo']);
            if (!$status) {
                return back()->with('error', 'Please upload a valid image');
            }
            $about->photo = MediaHelper::sellerHandleUpdateImage($request['photo'], $about->photo);
        }

        $about->header_title = $request->header_title;
        $about->title = $request->title;
        $about->number = $request->number;
        $about->experience = $request->experience;
        $about->description = $request->description;
        $about->save();
        return back()->with('success', 'About has been updated');

    }

}
