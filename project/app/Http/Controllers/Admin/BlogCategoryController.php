<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\BlogCategoryRequest;
use App\Http\Resources\BlogCategoryResource;
use App\Models\BlogCategory;
use Datatables;
use Illuminate\Http\Request;

class BlogCategoryController extends Controller
{

 

  
    public function index()
    {
        $categories = BlogCategory::latest('id')->paginate(15);
        return view('admin.cblog.index',compact('categories'));
    }

   
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:blog_categories,name'
        ]);
        $this->resource->store($request->only('name','status'));
        return back()->with('success',__('Category added successfully'));
    }

    
    public function update(Request $request,$id)
    {
        $bcategory = BlogCategory::findOrFail($id);
        $request->validate([
            'name' => 'required|string|max:255|unique:blog_categories,name,'.$bcategory->id
        ]);
        $this->resource->update($request->only('id','name','status'),$bcategory);
        return back()->with('success',__('Category updated successfully'));
    }

    function destroy(Request $request)
    {
        $bcategory = BlogCategory::findOrFail($request->id);
        $this->resource->destroy($bcategory);
        return back()->with('success',__('Category deleted successfully'));
    }
}
