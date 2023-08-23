<?php

namespace App\Http\Controllers\LandingPayment;

use App\Http\Controllers\Controller;
use App\Models\Domain;
use App\Models\Package;
use App\Models\PaymentGateway;
use Cartalyst\Stripe\Laravel\Facades\Stripe;
use Exception;
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
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:4|confirmed',
            'domain' => 'regex:/^[a-zA-Z0-9]+$/u|required',
        ]);


        $main_domain = env('MAIN_DOMAIN');
        $domain = $request->domain;
        $final = $domain . '.' . $main_domain;
        $domain_exists = Domain::where('domain', $final)->first();
        if ($domain_exists) {
            return back()->with('error', __('Domain already exists.'));
        }

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
                        $subscription = createStore($request->all(), $charge['balance_transaction'], 'stripe',1);
                        
                        if ($subscription) {
                            return redirect()->route('landing.login')->with('success', __('Registration successful. Please login to continue.'));
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
