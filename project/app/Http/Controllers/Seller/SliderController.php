<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Http\Helpers\MediaHelper;
use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{

    public function index()
    {
        $sliders = Slider::orderby('id', 'desc')->paginate(15);
        return view('seller.slider.index', compact('sliders'));
    }

    public function create()
    {
        return view('seller.slider.create');
    }

    public function store(Request $request)
    {
        $this->storeData($request, null);
        return back()->with('success', 'New Slider has been created');
    }

    public function edit($id)
    {
        $slider = Slider::findOrFail($id);
        return view('seller.slider.edit', compact('slider'));
    }

    public function update(Request $request, $id)
    {
        $this->storeData($request, $id);
        return back()->with('success', 'Slider has been updated');
    }

    public function destroy($id)
    {
        $slider = Slider::findOrFail($id);
        MediaHelper::sellerhandleDeleteImage($slider->photo);
        $slider->delete();

        return back()->with('success', 'Slider has been deleted');
    }

    public function storeData($request, $id)
    {
        $request->validate([
            'title' => 'required',
            'subtitle' => 'required',
            'photo' => $id ? '' : 'required|' . 'image|mimes:jpeg,png,jpg,svg|max:2048',
        ]);

        if ($id) {
            $slider = Slider::findOrFail($id);
        } else {
            $slider = new Slider();
        }
        if (isset($request['photo'])) {
            $status = MediaHelper::ExtensionValidation($request['photo']);
            if (!$status) {
                return ['errors' => [0 => 'file format not supported']];
            }
            if ($id) {
                $slider->photo = MediaHelper::sellerHandleUpdateImage($request['photo'], $slider->photo);
            } else {
                $slider->photo = MediaHelper::sellerHandleMakeImage($request['photo']);
            }
        }

        $slider->title = $request->title;
        $slider->subtitle = $request->subtitle;
        $slider->btn1_text = $request->btn1_text;
        $slider->btn1_link = $request->btn1_link;
        $slider->btn2_text = $request->btn2_text;
        $slider->btn2_link = $request->btn2_link;
        $slider->text = $request->text;
        $slider->save();
    }

    public function status($id, $status)
    {
        // without id every status 0
        $slider = Slider::findOrFail($id);
        $slider->is_banner = $status;
        $slider->save();

        
        foreach (Slider::where('id', '!=', $id)->get() as $slider) {
            $slider->is_banner = 0;
            $slider->save();
        }

        

        return back()->with('success', 'Slider status has been updated');
    }
}
