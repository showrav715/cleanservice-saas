<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Models\Pcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PcategoryController extends Controller
{

    public function index()
    {
        $categories = Pcategory::orderby('id', 'desc')->paginate(15);
        return view('seller.pcategory.index', compact('categories'));
    }

    public function store(Request $request)
    {
        $this->storeData($request, new Pcategory());
        return back()->with('success', __('Category added successfully'));
    }

    public function update(Request $request, $id)
    {
        $category = Pcategory::findOrFail($id);
        $this->storeData($request, $category, $id);
        return back()->with('success', __('Category updated successfully'));
    }

    public function destory(Request $request)
    {
        $category = Pcategory::findOrFail($request->id);
        $category->delete();
        return back()->with('success', __('Category deleted successfully'));
    }

    public function storeData($request, $category, $id = null)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:pcategories,name' . ($id ? ',' . $id : ''),
            'status' => 'required|boolean',
        ]);

        $category->name = $request->name;
        $category->slug = Str::slug($request->name);
        $category->status = $request->status;
        $category->user_id = auth()->id();
        $category->save();
    }
}
