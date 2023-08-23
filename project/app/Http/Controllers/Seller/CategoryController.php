<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Http\Helpers\MediaHelper;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index()
    {
        $categories = Category::withCount('products')->orderby('id', 'desc')->paginate(15);
        return view('seller.products.category.index', compact('categories'));
    }

    public function store(Request $request)
    {
        if(Category::where('user_id',seller()->id)->count() >= getPackage('category_limit')){
            return back()->with('error', __('You have reached your category limit'));
        }
        
        $this->storeData($request, new Category());
        cacheRemove('categories');

        return back()->with('success', __('Category added successfully'));
    }

    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        $this->storeData($request, $category, $id);
        cacheRemove('categories');

        return back()->with('success', __('Category updated successfully'));
    }

    public function destory(Request $request)
    {
        $category = Category::findOrFail($request->id);
        MediaHelper::sellerhandleDeleteImage($category->photo);
        $category->delete();
        cacheRemove('categories');
        return back()->with('success', __('Category deleted successfully'));
    }

    public function storeData($request, $category, $id = null)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:categories,name' . ($id ? ',' . $id : ''),
            'slug' => 'required|string|max:255|unique:categories,slug' . ($id ? ',' . $id : ''),
            'status' => 'required|boolean',
            'photo' => ($id ? '' : 'required') . '|image|max:2048|mimes:jpeg,jpg,png',
        ]);

        $category->name = $request->name;
        $category->slug = $request->slug;
        $category->status = $request->status;
        $category->feature = $request->feature;
        $category->serial = $request->serial;
        $category->user_id = auth()->user()->id;
        if ($request['photo']) {
            $status = MediaHelper::ExtensionValidation($request['photo']);
            if (!$status) {
                return ['errors' => [0 => 'file format not supported']];
            }
            if ($id) {
                $category->photo = MediaHelper::sellerHandleUpdateImage($request['photo'], $category->photo);
            } else {
                $category->photo = MediaHelper::sellerHandleMakeImage($request['photo']);
            }
        }
        $category->save();
    }
}
