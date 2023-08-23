<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Http\Helpers\MediaHelper;
use App\Models\UserBlog;
use App\Models\UserBlogCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BlogController extends Controller
{

    public function index()
    {
        $blogs = UserBlog::with('category')->latest()->paginate(15);
        return view('seller.blog.index', compact('blogs'));
    }

    public function create()
    {
        $categories = UserBlogCategory::where('user_id', auth()->id())->where('status', 1)->get();
        return view('seller.blog.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $this->storeData($request, new UserBlog());
        return back()->with('success', 'New blog has been created');
    }

    public function edit($id)
    {
        $categories = UserBlogCategory::where('user_id', auth()->id())->where('status', 1)->get();
        $blog = UserBlog::findOrFail($id);
        return view('seller.blog.edit', compact('blog', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $data = UserBlog::findOrFail($id);
        $this->storeData($request, $data, $id);

        return back()->with('success', 'Blog has been updated');
    }

    public function destroy($id)
    {
        $blog = UserBlog::findOrFail($id);
        MediaHelper::sellerhandleDeleteImage($blog->photo);
        $blog->delete();
        return back()->with('success', 'Blog has been deleted');
    }

    public function storeData($request, $data, $id = null)
    {
        $required = $id ? '' : 'required';
        $id = $id ? ',' . $id : '';
        $request->validate([
            'photo' => $required . '|image|mimes:jpeg,jpg,png,svg',
            'title' => 'required|max:255|unique:blogs,title' . $id,
            'category_id' => 'required',
            'description' => 'required|min:15',
        ]);

        $data->title = $request->title;
        $data->user_id = auth()->id();
        $data->slug = Str::slug($request->title);
        $data->category_id = $request->category_id;
        $data->description = $request->description;
        $data->status = $request->status;
        if ($request['photo']) {
            $status = MediaHelper::ExtensionValidation($request['photo']);
            if (!$status) {
                return ['errors' => [0 => 'file format not supported']];
            }
            if ($id) {
                $data->photo = MediaHelper::sellerHandleUpdateImage($request['photo'], $data->photo);
            } else {
                $data->photo = MediaHelper::sellerHandleMakeImage($request['photo']);
            }
        }
        $data->save();
    }
}
