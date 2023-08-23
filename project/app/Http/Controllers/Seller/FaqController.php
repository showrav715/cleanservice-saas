<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index()
    {
        $faqs = Faq::orderby('id', 'desc')->paginate(15);
        return view('seller.faq.index', compact('faqs'));
    }

    public function store(Request $request)
    {
        $this->storeData($request, new Faq());
        return back()->with('success', __('Faq added successfully'));
    }

    public function update(Request $request, $id)
    {
        $faq = Faq::findOrFail($id);
        $this->storeData($request, $faq, $id);
        return back()->with('success', __('Faq updated successfully'));
    }

    public function destory(Request $request)
    {
        $faq = Faq::findOrFail($request->id);
        $faq->delete();
        return back()->with('success', __('Faq deleted successfully'));
    }

    public function storeData($request, $faq, $id = null)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'details' => 'required|string',
        ]);

        $faq->title = $request->title;
        $faq->details = $request->details;
        $faq->user_id = auth()->user()->id;
        $faq->save();
    }
}
