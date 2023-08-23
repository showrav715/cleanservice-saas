<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Http\Helpers\MediaHelper;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{

    public function index()
    {
        $brands = Brand::orderby('id', 'desc')->paginate(15);
        return view('seller.brand.index', compact('brands'));
    }

    public function create()
    {
        return view('seller.brand.create');
    }

    public function store(Request $request)
    {
        $this->storeData($request, null);
        return back()->with('success', 'New Brand has been created');
    }

    public function edit($id)
    {
        $brand = Brand::findOrFail($id);
        return view('seller.brand.edit', compact('brand'));
    }

    public function update(Request $request, $id)
    {
        $this->storeData($request, $id);
        return back()->with('success', 'Brand has been updated');
    }

    public function destroy(Request $request)
    {
        $brand = Brand::findOrFail($request->id);
        MediaHelper::sellerhandleDeleteImage($brand->photo);
        $brand->delete();

        return back()->with('success', 'Brand has been deleted');
    }

    public function storeData($request, $id)
    {
        $request->validate([
            'title' => 'required',
            'photo' => $id ? '' : 'required|' . 'image|mimes:jpeg,png,jpg,svg|max:2048',
        ]);

        if ($id) {
            $brand = Brand::findOrFail($id);
        } else {
            $brand = new Brand();
        }
        if (isset($request['photo'])) {
            $status = MediaHelper::ExtensionValidation($request['photo']);
            if (!$status) {
                return ['errors' => [0 => 'file format not supported']];
            }
            if ($id) {
                $brand->photo = MediaHelper::handleUpdateImage($request['photo'], $brand->photo);
            } else {
                $brand->photo = MediaHelper::handleMakeImage($request['photo']);
            }
        }

        $brand->title = $request->title;
        $brand->user_id = auth()->user()->id;
        $brand->save();
    }
}
