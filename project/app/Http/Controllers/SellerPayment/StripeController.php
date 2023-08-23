<?php

namespace App\Http\Controllers\SellerPayment;

use App\Http\Controllers\Controller;
use App\Models\Package;
use App\Models\PaymentGateway;
use Cartalyst\Stripe\Laravel\Facades\Stripe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Validator;

class StripeController extends Controller
{
    public $seller;
    public $support_currencies;
    public function __construct()
    {
        $this->seller = getUser('user_id');
        $data = PaymentGateway::whereKeyword('stripe')->first();
        $this->support_currencies = $data->currency_id ?? [];
        $paydata = $data->convertAutoData();
        Config::set('services.stripe.key', $paydata['key']);
        Config::set('services.stripe.secret', $paydata['secret']);
    }

    public function store(Request $request)
    {
        
        if (landingCheckCurrency($this->support_currencies) == false) {
            return back()->with('error', __('This gateway does not support your currency.'));
        }


        $package = Package::findOrFail($request->package_id);

        $validator = Validator::make($request->all(), [
            'card' => 'required',
            'month' => 'required',
            'year' => 'required',
            'cvc' => 'required',
        ]);

        if ($validator->passes()) {
            $stripe = Stripe::make(Config::get('services.stripe.secret'));
            try {
                $input = $request->all();
                $token = $stripe->tokens()->create([
                    'card' => [
                        'number' => $input['card'],
                        'exp_month' => $input['month'],
                        'exp_year' => $input['year'],
                        'cvc' => $input['cvc'],
                    ],
                ]);

                if (!isset($token['id'])) {
                    return back()->with('error', __('Token Problem With Your Token.'));
                }

                $charge = $stripe->charges()->create([
                    'card' => $token['id'],
                    'currency' => landingCurrency()->code,
                    'amount' => landingShowAmount($package->price,true),
                    'description' => $package->name,
                ]);

                if ($charge['status'] == 'succeeded') {
                    try {
                        $subscription = subscriptionStore($request->all(), $package->id, $charge['balance_transaction'], ['payment_method' => 'Stripe', 'payment_status' => 1]);
                        if ($subscription) {
                            return redirect()->route('seller.dashboard')->with('success', __('Payment Successfully.'));
                        } else {
                            return back()->with('error', __('Something is wrong.'));
                        }

                    } catch (Exception $e) {
                        return back()->with('error', $e->getMessage());
                    }
                }

            } catch (Exception $e) {
                return back()->with('error', $e->getMessage());
            } catch (\Cartalyst\Stripe\Exception\CardErrorException $e) {
                return back()->with('error', $e->getMessage());
            } catch (\Cartalyst\Stripe\Exception\MissingParameterException $e) {
                return back()->with('error', $e->getMessage());
            }
        } else {
            return back()->with('error', $validator->errors()->all()[0]);
        }

    }
}
