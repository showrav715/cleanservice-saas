<?php

namespace App\Http\Controllers\Seller;

use App\Models\UserPage;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class PageController extends Controller
{

   
    public function index()
    {
        $pages = UserPage::get();
        return view('seller.page.index',compact('pages'));
    }

    public function create()
    {
        return view('seller.page.create');
    }

    public function store(Request $request)
    {
        $this->storeData($request,new UserPage());
        return back()->with('success',__('Page created successfully'));
    }

  
    public function edit($id)
    {
        $page = UserPage::findOrFail($id);
        return view('seller.page.edit',compact('page'));
    }

    
    public function update(Request $request,$id)
    {
        $page = UserPage::findOrFail($id);
        $this->storeData($request,$page,$id);
        return back()->with('success',__('Page updated successfully'));
    }

    public function destroy(Request $request)
    {
        UserPage::findOrFail($request->id)->delete();
        return back()->with('success',__('Page deleted successfully'));
    }

    public function storeData($request,$data,$id=NULL)
    {
        $id = $id ? ','. $id : '';
        $request->validate([
                'title' => 'required|max:255|unique:pages,title'.$id,
                'details' => 'required',
            
        ]);

        $data->title = $request->title;
        $data->user_id = auth()->user()->id;
        $data->slug = Str::slug($request->title);
        $data->details = clean($request->details);
        $data->user_id = auth()->user()->id;
        $data->save();
    }
}
