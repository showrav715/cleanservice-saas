<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Helpers\MediaHelper;
use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BlogController extends Controller
{

    public function index()
    {
        $blogs = Blog::with('category')->latest()->paginate(15);
        return view('admin.blog.index', compact('blogs'));
    }

    public function create()
    {
        $categories = BlogCategory::where('status', 1)->get();
        return view('admin.blog.create', compact('categories'));
    }

    public function store(Request $request)
    {

        $this->storeData($request, new Blog());
        return back()->with('success', 'New blog has been created');
    }

    public function edit(Blog $blog)
    {
        $categories = BlogCategory::where('status', 1)->get();
        return view('admin.blog.edit', compact('blog', 'categories'));
    }

    public function update(Request $request, Blog $blog)
    {
        $this->storeData($request, $blog, $blog->id);
        return back()->with('success', 'Blog has been updated');
    }

    public function destroy(Blog $blog)
    {
        MediaHelper::handleDeleteImage($blog->photo);
        $blog->delete();
        return back()->with('success', 'Blog has been deleted');
    }

    public function storeData($request, $data, $id = null)
    {

        $request->validate([
            'title' => 'required|unique:blogs,title' . ($id ? ',' . $id : ''),
            'category_id' => 'required',
            'status' => 'required',
            'photo' => $id ? '' : 'required|' . 'image|mimes:jpeg,png,jpg|max:2048',
            'description' => 'required',
        ]);

        if (isset($request['photo'])) {
            $status = MediaHelper::ExtensionValidation($request['photo']);
            if (!$status) {
                return ['errors' => [0 => 'file format not supported']];
            }
            if ($id) {
                $data->photo = MediaHelper::handleUpdateImage($request['photo'], $data->photo);
            } else {
                $data->photo = MediaHelper::handleMakeImage($request['photo']);
            }
        }
        $data->description = $request->description;
        $data->slug = Str::slug($request->title);
        $data->status = $request->status;
        $data->category_id = $request->category_id;
        $data->title = $request->title;
        $data->save();

    }
}
