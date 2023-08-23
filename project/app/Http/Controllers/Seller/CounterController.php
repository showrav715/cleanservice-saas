<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Models\Counter;
use Illuminate\Http\Request;

class CounterController extends Controller
{

    public function index()
    {
        $counters = Counter::orderby('id', 'desc')->paginate(15);
        return view('seller.counter.index', compact('counters'));
    }

    public function store(Request $request)
    {

        $this->storeData($request, new Counter());
        return back()->with('success', __('Counter added successfully'));
    }

    public function update(Request $request, $id)
    {
        $counter = Counter::findOrFail($id);
        $this->storeData($request, $counter, $id);
        return back()->with('success', __('Counter updated successfully'));
    }

    public function destroy(Request $request)
    {
        $counter = Counter::findOrFail($request->id);
        $counter->delete();
        return back()->with('success', __('Counter deleted successfully'));
    }

    public function storeData($request, $counter, $id = null)
    {
        $request->validate([
            'title' => 'required|string',
            'counter_number' => 'required',
            'icon' => 'required',
        ]);

        $counter->title = $request->title;
        $counter->counter_number = $request->counter_number;
        $counter->icon = $request->icon;
        $counter->save();
    }
}
