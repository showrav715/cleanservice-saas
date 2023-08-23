<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Currency;
use App\Models\Package;
use Illuminate\Http\Request;

class PackageController extends Controller
{

    public function index()
    {
        $packages = Package::orderby('id', 'desc')->paginate(15);
        return view('admin.package.index', compact('packages'));
    }

    public function create()
    {
        return view('admin.package.create');
    }

    public function store(Request $request)
    {
        $this->validation($request);
        $package = new Package();
        $this->saveData($package, $request);
        return back()->with('success', __('Package added successfully'));
    }

    public function edit($id)
    {   
        $curr = Currency::where('default', 1)->first();
        $data = Package::findOrFail($id);
        return view('admin.package.edit', compact('data','curr'));
    }

    public function update(Request $request, $id)
    {
        $this->validation($request, $id);
        $package = Package::findOrFail($id);
        $this->saveData($package, $request);
        return back()->with('success', __('Package updated successfully'));
    }

    public function destory(Request $request)
    {
        $package = Package::findOrFail($request->id);
        $package->delete();
        return back()->with('success', __('Package deleted successfully'));
    }

    // both validation
    public function validation($request, $id = null)
    {
        return $request->validate([
            'name' => 'required|string|max:255|unique:packages,name,' . $id,
            'description' => 'required',
            'price' => 'required',
            'days' => 'required',
            'service_limit' => 'required',
            'blog_limit' => 'required',
            'project_limit' => 'required',
            'team_limit' => 'required',
            'custom_domain' => 'required',
            'support' => 'required',
            'qr_code' => 'required',
            'multiple_theme' => 'required',
            'facebook_pixel' => 'required',
            'google_analytics' => 'required',
            'is_featured' => 'required',
            'status' => 'required',
        ]);
    }

    public function saveData($package, $request)
    {
        $curr = Currency::where('default', 1)->first();
        $package->name = $request->name;
        $package->description = $request->description;
        $package->price = $request->price / $curr->value;
        $package->days = $request->days;
        $package->service_limit = $request->service_limit;
        $package->blog_limit = $request->blog_limit;
        $package->project_limit = $request->project_limit;
        $package->team_limit = $request->team_limit;
        $package->custom_domain = $request->custom_domain;
        $package->multiple_theme = $request->multiple_theme;
        $package->support = $request->support;
        $package->qr_code = $request->qr_code;
        $package->facebook_pixel = $request->facebook_pixel;
        $package->google_analytics = $request->google_analytics;
        $package->is_featured = $request->is_featured;
        $package->status = $request->status;
        $package->save();
    }

}
