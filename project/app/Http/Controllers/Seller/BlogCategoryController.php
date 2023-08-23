<?php

namespace App\Http\Controllers\Seller;
use App\Http\Controllers\Controller;
use App\Models\UserBlogCategory;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BlogCategoryController extends Controller
{

    public function index()
    {
        $categories = UserBlogCategory::orderby('id','desc')->paginate(15);
        return view('seller.cblog.index',compact('categories'));
    }

   
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:blog_categories,name'
        ]);
        $data = new UserBlogCategory();
        $data->name = $request->name;
        $data->slug = Str::slug($request->name);
        $data->user_id = auth()->id();
        $data->save();
        return back()->with('success',__('Category added successfully'));
    }

    
    public function update(Request $request,$id)
    {
        $data = UserBlogCategory::findOrFail($id);
        $request->validate([
            'name' => 'required|string|max:255|unique:blog_categories,name,'.$data->id
        ]);
        $data->name = $request->name;
        $data->slug = Str::slug($request->name);
        $data->save();
        return back()->with('success',__('Category updated successfully'));
    }

    

    function destroy(Request $request)
    {
        $bcategory = UserBlogCategory::findOrFail($request->id);
        $bcategory->delete();
        return back()->with('success',__('Category deleted successfully'));
    }
}
