<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Http\Helpers\MediaHelper;
use App\Models\Service;
use App\Models\UserService;
use App\Models\ServiceFaq;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ManageServiceController extends Controller
{

    public function index()
    {
        $services = UserService::orderby('id', 'desc')->paginate(15);
        return view('seller.service.index', compact('services'));
    }

    public function create()
    {
        return view('seller.service.create');
    }

    public function store(Request $request)
    {
        if(Service::where('user_id',seller()->id)->count() >= getPackage('service_limit')){
            return back()->with('error', __('You have reached your service limit'));
        }

        $this->storeData($request, new UserService());
        return back()->with('success', __('Service added successfully'));
    }

    public function edit($id)
    {
        $service = UserService::findOrFail($id);
        return view('seller.service.edit', compact('service'));
    }

    public function update(Request $request, $id)
    {
        $service = UserService::findOrFail($id);
        $this->storeData($request, $service, $id);
        return back()->with('success', __('Service updated successfully'));
    }

    public function destroy(Request $request)
    {
        $service = UserService::findOrFail($request->id);
        $faqs = $service->faqs;
        foreach ($faqs as $faq) {
            $faq->delete();
        }
        MediaHelper::sellerhandleDeleteImage($service->photo);
        $service->delete();
        return back()->with('success', __('Service deleted successfully'));
    }

    public function storeData($request, $data, $id = null)
    {
        $request->validate([
            'title' => 'required|string|max:255|unique:user_services,title' . ($id ? ',' . $id : ''),
            'description' => 'required|string',
            'service_quality_text' => 'required|string',
            'sort_text' => 'required|string',
            'status' => 'required|boolean',
            'photo' => $id ? '' : 'required|' . 'image|mimes:jpeg,png,jpg|max:2048',
            'service_quality_photo' => $id ? '' : 'required|' . 'image|mimes:jpeg,png,jpg|max:2048',
            'service_quality_before_photo' => $id ? '' : 'required|' . 'image|mimes:jpeg,png,jpg|max:2048',
        ]);

        
        if (isset($request['photo'])) {
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


        if (isset($request['feature_icon'])) {
            $status = MediaHelper::ExtensionValidation($request['feature_icon']);
            if (!$status) {
                return ['errors' => [0 => 'file format not supported']];
            }
            if ($id) {
                $data->feature_icon = MediaHelper::sellerHandleUpdateImage($request['feature_icon'], $data->feature_icon);
            } else {
                $data->feature_icon = MediaHelper::sellerHandleMakeImage($request['feature_icon']);
            }
        }
        if (isset($request['service_quality_photo'])) {
            $status = MediaHelper::ExtensionValidation($request['service_quality_photo']);
            if (!$status) {
                return ['errors' => [0 => 'file format not supported']];
            }
            if ($id) {
                $data->service_quality_photo = MediaHelper::sellerHandleUpdateImage($request['service_quality_photo'], $data->service_quality_photo);
            } else {
                $data->service_quality_photo = MediaHelper::sellerHandleMakeImage($request['service_quality_photo']);
            }
        }
        if (isset($request['service_quality_before_photo'])) {
            $status = MediaHelper::ExtensionValidation($request['service_quality_before_photo']);
            if (!$status) {
                return ['errors' => [0 => 'file format not supported']];
            }
            if ($id) {
                $data->service_quality_before_photo = MediaHelper::sellerHandleUpdateImage($request['service_quality_before_photo'], $data->service_quality_before_photo);
            } else {
                $data->service_quality_before_photo = MediaHelper::sellerHandleMakeImage($request['service_quality_before_photo']);
            }
        }

        $data->title = $request->title;
        $data->slug = Str::slug($request->title);
        $data->sort_text = $request->sort_text;
        $data->category_id = $request->category_id;
        $data->description = clean($request->description);
        $data->service_quality_text = $request->service_quality_text;
        $data->is_feature = $request->is_feature;
        $data->status = $request->status;
        $data->user_id = auth()->user()->id;
        $data->save();

    }

    public function faq_index()
    {
        $services = UserService::orderby('id', 'desc')->get();
        $faqs = ServiceFaq::orderby('id', 'desc')->paginate(4);
        return view('seller.service.faq.index', compact('faqs', 'services'));
    }

    public function faq_store(Request $request)
    {
        $this->faqDataStore($request, new ServiceFaq());
        return back()->with('success', __('Faq added successfully'));
    }

    public function faq_update(Request $request, $id)
    {
        $faq = ServiceFaq::findOrFail($id);
        $this->faqDataStore($request, $faq, $id);
        return back()->with('success', __('Faq updated successfully'));
    }

    public function faqDataStore($request, $data, $id = null)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'service_id' => 'required',
        ]);

        $data->title = $request->title;
        $data->content = $request->content;
        $data->service_id = $request->service_id;
        $data->user_id = auth()->user()->id;
        $data->save();
    }

    public function faq_destroy(Request $request)
    {
        $faq = ServiceFaq::findOrFail($request->id);
        $faq->delete();
        return back()->with('success', __('Faq deleted successfully'));
    }
}
