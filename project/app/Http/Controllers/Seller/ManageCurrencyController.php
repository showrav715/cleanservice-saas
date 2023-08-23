<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Models\UserCurrency;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class ManageCurrencyController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;
        $currencies = UserCurrency::whereUserId(Auth::id())->get();
        return view('seller.currency.index', compact('currencies', 'search'));
    }

    public function addCurrency()
    {
        return view('admin.currency.create');
    }

    public function store(Request $request)
    {
        
        $request->validate([
            'code' => 'required|max:4',
            'symbol' => ['required',
                function ($attribute, $value, $fail) {
                    if (UserCurrency::whereUserId(Auth::id())->whereSymbol($value)->first()) {
                        $fail('The symbol has already been taken.');
                    }
                },
            ],
            'value' => 'required|gt:0',
            'status' => 'required|in:1,0',
        ]);

        $currency = new UserCurrency();
        $currency->code = $request->code;
        $currency->symbol = $request->symbol;
        $currency->value = $request->value;
        $currency->status = $request->status;
        $currency->user_id = Auth::id();
        $currency->save();
        Cache::forget('globalcurrency' . Auth::id());

        return back()->with('success', 'New currency has been added');
    }

    public function editCurrency($id)
    {
        $currency = UserCurrency::findOrFail($id);
        return view('admin.currency.edit', compact('currency'));
    }

    public function updateCurrency(Request $request, $id)
    {
        $request->validate([
            'code' => 'required|max:4',
            'symbol' => 'required',
            'value' => 'required|gt:0',
            'default' => 'in:1,0',
            'status' => 'required|in:1,0',
        ]);

        $curr = UserCurrency::findOrFail($id);
        $curr->code = $request->code;
        $curr->symbol = $request->symbol;
        $curr->value = $request->value;
        $curr->status = $request->status;
        $curr->save();
        Cache::forget('globalcurrency' . Auth::id());

        return back()->with('success', 'Currency has been updated');
    }

    public function deleteCurrency(Request $request)
    {
        $curr = UserCurrency::whereUserId(Auth::id())->whereId($request->id)->first();
        if ($curr->default == 1) {
            return back()->with('error', 'Default currency can not be deleted');
        }
        $curr->delete();
        return back()->with('success', 'Currency has been deleted');
    }

    public function setDefault($id)
    {
        $curr = UserCurrency::findOrFail($id);
        if ($curr->status == 0) {
            return back()->with('error', 'Please active currency first');
        }
        $curr->default = 1;
        $curr->save();
        $currencies = UserCurrency::whereUserId(Auth::id())->where('id', '!=', $id)->get();
        foreach ($currencies as $currency) {
            $currency->default = 0;
            $currency->save();
        }
        return back()->with('success', 'Default currency has been updated');
    }

}
