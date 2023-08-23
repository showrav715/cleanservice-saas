<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Helpers\MediaHelper;
use App\Models\Service;
use Illuminate\Http\Request;

class ManageServiceController extends Controller
{

    public function index()
    {
        $services = Service::orderby('id', 'desc')->paginate(15);
        return view('admin.service.index', compact('services'));
    }

    public function store(Request $request)
    {
       
        $this->storeData($request, new Service());
        return back()->with('success', __('Service added successfully'));
    }

    public function update(Request $request, $id)
    {
        $service = Service::findOrFail($id);
        $this->storeData($request, $service, $id);
        return back()->with('success', __('Service updated successfully'));
    }

    public function destroy(Request $request)
    {
        $service = Service::findOrFail($request->id);
        MediaHelper::handleDeleteImage($service->photo);
        $service->delete();
        return back()->with('success', __('Service deleted successfully'));
    }

    public function storeData($request, $data, $id = null)
    {
        $request->validate([
            'title' => 'required|string|max:255|unique:services,title' . ($id ? ',' . $id : ''),
            'text' => 'required|string',
            'status' => 'required|boolean',
            'photo' =>  $id ? '' : 'required|' . 'image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if(isset($request['photo'])){
            $status = MediaHelper::ExtensionValidation($request['photo']);
            if(!$status){
                return ['errors' => [0=>'file format not supported']];
            }
            if($id){
                $data->photo = MediaHelper::handleUpdateImage($request['photo'],$data->photo);
            }else{
                $data->photo = MediaHelper::handleMakeImage($request['photo']);
            }
            
        }

        $data->title = $request->title;
        $data->text = $request->text;
        $data->status = $request->status;
        $data->save();

    }
}
