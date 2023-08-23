<?php

use App\Http\Helpers\EmailHelper;
use App\Models\Currency;
use App\Models\Domain;
use App\Models\Package;
use App\Models\PackageOrder;
use App\Models\User;
use App\Models\UserContactPage;
use App\Models\UserGeneralsetting;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use PHPMailer\PHPMailer\PHPMailer;

function sysVersion()
{
    return '1.0';
}

function getPhoto($filename, $string = null)
{
    if ($filename) {
        if (file_exists('assets/images' . '/' . $filename)) {
            return asset('assets/images/' . $filename);
        } else {
            if ($string) {
                return Avatar::create($string)->toBase64();
            } else {
                return asset('assets/images/default.png');
            }
        }
    } else {
        if ($string) {
            return Avatar::create($string)->toBase64();
        } else {
            return asset('assets/images/default.png');
        }

    }
}

// for owner
function showPhoto($filename, $string = null)
{

    $seller_id = sellerId();
    if ($filename) {
        if (file_exists('assets/images/' . $seller_id . '/' . $filename)) {
            return asset('assets/images/' . $seller_id . '/' . $filename);
        } else {
            if ($string) {
                return Avatar::create($string)->toBase64();
            } else {
                return asset('assets/images/default.png');
            }
        }
    } else {
        if ($string) {
            return Avatar::create($string)->toBase64();
        } else {
            return asset('assets/images/default.png');
        }

    }
}

function admin()
{
    return auth()->guard('admin')->user();
}

function theme()
{
    $gs = UserGeneralsetting::first();
    return $gs->theme . '.';
}

function adminpath()
{
    $location = asset('assets/images/');
    if (!file_exists($location)) {
        mkdir($location, 0777, true);
    }
    return $location;
}

function sellerpath()
{
    $location = asset('assets/images/' . auth()->user()->id);
    if (!file_exists($location)) {
        mkdir($location, 0777, true);
    }
    return $location;
}

function menu($route, $attr = 'active')
{
    if (is_array($route)) {
        foreach ($route as $value) {
            if (request()->routeIs($value)) {
                return $attr;
            }
        }
    } elseif (request()->routeIs($route)) {
        return $attr;
    }
}

if (!function_exists('getPackage')) {
    function getPackage($type = null)
    {
        $url = Request::getHost();
        $url = str_replace('www.', '', $url);

        Cache::forget($url);
        // cache domain store
        $data = Cache::remember($url, 70000, function () use ($url) {
            return Domain::whereDomain($url)->first();
        });

        if (!$data) {
            return 'not found';
        }

        $data = json_decode($data->data);

        if ($type == 'category_limit') {
            return $data->category_limit;
        }

        if ($type == 'product_limit') {
            return $data->product_limit;
        }

        if ($type == 'customer_limit') {
            return $data->customer_limit;
        }
        if ($type == 'brand_limit') {
            return $data->brand_limit;
        }
        if ($type == 'variant_limit') {
            return $data->variant_limit;
        }
        if ($type == 'custom_domain') {
            return $data->custom_domain;
        }
        if ($type == 'customer_panel_access') {
            return $data->customer_panel_access;
        }
        if ($type == 'support') {
            return $data->support;
        }
        if ($type == 'qr_code') {
            return $data->qr_code;
        }
        if ($type == 'facebook_pixel') {
            return $data->facebook_pixel;
        }
        if ($type == 'google_analytics') {
            return $data->google_analytics;
        }

    }
}

function checkSellerEndData()
{
    $user = User::find(sellerId());
    $domain = $user->domain;
    $expire_date = Carbon::parse($domain->will_expire)->format('Y-m-d');
    $today = Carbon::now()->format('Y-m-d');

    if ($expire_date < $today) {
        return true;
    }
    return false;
}

function tagFormat($tag)
{
    $common_rep = ["value", "{", "}", "[", "]", ":", "\""];
    $tag = str_replace($common_rep, '', $tag);
    if (!empty($tag)) {
        return $tag;
    } else {
        return null;
    }

}

function numFormat($amount, $length = 0)
{
    if (0 < $length) {
        return number_format($amount + 0, $length);
    }

    return $amount + 0;
}

function dateFormat($date, $format = 'd M Y -- h:i a')
{
    return Carbon::parse($date)->format($format);
}

function randNum($digits = 6)
{
    return rand(pow(10, $digits - 1), pow(10, $digits) - 1);
}

function str_rand($length = 12, $up = false)
{
    if ($up) {
        return Str::random($length);
    } else {
        return strtoupper(Str::random($length));
    }

}

function createStore($request, $txn_id, $method, $payment_status)
{
    DB::beginTransaction();
    try {

        // create a new user
        $user = new User();
        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->password = Hash::make($request['password']);
        $user->role = 'seller';
        $user->status = 1;
        $user->email_verified = 1;
        $user->save();

        // create a new general setting
        $preload_gs = UserGeneralsetting::where('id', 0)->first()->toArray();
        $preload_gs['user_id'] = $user->id;
        $gs = new UserGeneralsetting();
        $gs->fill($preload_gs)->save();

        // create a new contact page
        $preload_contact_pages = UserContactPage::where('id', 0)->first()->toArray();
        unset($preload_contact_pages['id']);
        $preload_contact_pages['user_id'] = $user->id;
        $contact_page = new UserContactPage();
        $contact_page->fill($preload_contact_pages)->save();

        $package = Package::find($request['package_id']);
        $exp_days = $package->days;
        $expiry_date = \Carbon\Carbon::now()->addDays(($exp_days))->format('Y-m-d');

        // create a new package order
        $order = new PackageOrder();
        $order->order_no = $user->id . 'ORD-' . time();
        $order->amount = $package->price / landingCurrency()->value;
        $order->txn = $txn_id;
        $order->will_expire = $expiry_date;
        $order->user_id = $user->id;
        $order->currency = json_encode(landingCurrency(), true);
        $order->package_id = $package->id;
        $order->method = $method;
        $order->status = 1;
        $order->payment_status = $payment_status;
        $order->save();

        // create a new Domain
        $main_domain = env('MAIN_DOMAIN');
        $domain = $request['domain'];
        $final = $domain . '.' . $main_domain;
        $dom = new Domain();
        $dom->domain = $final;
        $dom->status = 1;
        $dom->user_id = $user->id;
        $dom->is_trial = $package->price == 0 ? 1 : 0;
        $dom->data = json_encode($package, true);
        $dom->will_expire = $expiry_date;
        $dom->package_order_id = $order->id;
        $dom->save();

        // update domain id
        $user = User::find($user->id);
        $user->domain_id = $dom->id;
        $user->save();
        DB::commit();
        return 1;

    } catch (\Exception $e) {
        DB::rollback();
        dd($e->getMessage());
        return 0;
    }
}

function subscriptionStore($request, $package_id, $txn_id, array $array = null)
{

    DB::beginTransaction();
    try {

        $user = Auth::user();
        $package = Package::find($package_id);
        $exp_days = $package->days;

        $current_domain = $user->domain;
        $current_package = json_decode($current_domain->data, true)['id'];
        if ($package->id == $current_package) {
            $old_expire_date = $current_domain->will_expire;

            if ($old_expire_date < Carbon::now()->format('Y-m-d')) {
                $expiry_date = \Carbon\Carbon::now()->addDays(($exp_days))->format('Y-m-d');
            } else {
                $expiry_date = \Carbon\Carbon::parse($old_expire_date)->addDays(($exp_days))->format('Y-m-d');
            }
        } else {
            $expiry_date = \Carbon\Carbon::now()->addDays(($exp_days))->format('Y-m-d');
        }

        // create a new package order
        $order = new PackageOrder();
        $order->order_no = $user->id . 'ORD-' . time();
        $order->amount = $package->price;
        $order->txn = $txn_id;
        $order->will_expire = $expiry_date;
        $order->user_id = $user->id;
        $order->package_id = $package->id;
        $order->currency = landingCurrency();
        $order->method = $array['payment_method'];
        $order->status = 1;
        $order->payment_status = $array['payment_status'];
        $order->save();

        // update  Domain
        $dom = Domain::where('user_id', $user->id)->first();
        $dom->is_trial = $package->price == 0 ? 1 : 0;
        $dom->data = json_encode($package, true);
        $dom->will_expire = $expiry_date;
        $dom->package_order_id = $order->id;
        $dom->save();
        DB::commit();

        // send mail
        subMail($package, $user, $order);
        return true;

    } catch (\Throwable $th) {
        DB::rollback();
        //dd($th->getMessage());
        return false;
    }
}

function subMail($package, $user, $order)
{
    $message = 'Your subscription has been successfully completed.Your subscription package is <b>' . $package->name . '</b>. and your subscription will expire on <b>' . $order->will_expire . '</b>. Thank you for choosing us.';
    $data = [
        'name' => $user->name,
        'email' => $user->email,
        'subject' => 'Subscription Completed',
        'body' => $message,
    ];
    $send = new EmailHelper();
    $send->customMail($data);
}

function filter($key, $value)
{
    $queries = request()->query();
    if (count($queries) > 0) {
        $delimeter = '&';
    } else {
        $delimeter = '?';
    }

    if (request()->has($key)) {
        $url = request()->getRequestUri();
        $pattern = "\?$key";
        $match = preg_match("/$pattern/", $url);
        if ($match != 0) {
            return preg_replace('~(\?|&)' . $key . '[^&]*~', "\?$key=$value", $url);
        }

        $filteredURL = preg_replace('~(\?|&)' . $key . '[^&]*~', '', $url);
        return $filteredURL . $delimeter . "$key=$value";
    }

    return request()->getRequestUri() . $delimeter . "$key=$value";
}

function setEnv($key, $value, $old = null)
{

    if ($old) {
        $keVal = $old;
    } else {
        $keVal = env($key);
    }

    file_put_contents(app()->environmentFilePath(), str_replace(
        $key . '=' . $keVal,
        $key . '=' . $value,
        file_get_contents(app()->environmentFilePath())
    ));
}

function access($value)
{

    $sections = json_decode(Auth::guard('admin')->user()->role_data->section, true);
    if (!$sections) {
        return false;
    }
    if (in_array($value, $sections)) {
        return true;
    } else {
        return false;
    }
}

function landingShowAmount($amount, $convert = null)
{

    if (Session::has('landing_currency')) {
        $currency = Currency::find(Session::get('landing_currency'));
        $total = $amount * $currency->value;
    } else {
        $currency = Currency::where('default', 1)->first();
        $total = $amount * $currency->value;
    }

    if ($convert) {
        return round($total, 2);
    }

    return $currency->symbol . round($total, 2);
}

function defaultCurr()
{
    return Currency::where('default', 1)->first();
}
function adminShowAmount($amount)
{
    $curr = Currency::where('default', 1)->first();
    $total = round($amount * $curr->value, 2);
    return $curr->symbol . $total;
}

function landingCheckCurrency(array $currencies)
{
    $landing_currency = landingCurrencyData();

    if (in_array($landing_currency->code, $currencies)) {
        return true;
    } else {
        return false;
    }
}

function adminCurrency()
{
    $curr = Currency::where('default', 1)->first();
    return $curr->symbol;
}

function landingCurrency()
{
    if (Session::has('landing_currency')) {
        $curr = Currency::where('id', Session::get('landing_currency'))->first();
    } else {
        $curr = Currency::where('default', 1)->first();
    }
    return $curr;
}

function landingCurrencyData()
{
    if (Session::has('landing_currency')) {
        $curr = Currency::where('id', Session::get('landing_currency'))->first();
    } else {
        $curr = Currency::where('default', 1)->first();
    }
    return $curr;
}

if (!function_exists('getUser')) {
    function getUser($type = null)
    {
        $url = Request::getHost();
        $url = str_replace('www.', '', $url);
        Cache::forget($url);
        $data = Cache::remember($url, 70000, function () use ($url) {
            return Domain::whereDomain($url)->first();
        });
  
        if ($data) {
            $data = $data->toArray();
        } else {
            return $type;
        }
        if ($type == 'user_id') {
            return $data['user_id'];
        }
        if ($type == 'domain') {
            return $data['domain'];
        }
        if ($type == 'status') {
            return $data['status'];
        }
        if ($type == 'is_trial') {
            return $data['is_trial'];
        }
        if ($type == 'will_expire') {
            return $data['will_expire'];
        }
        if ($type == 'plan') {
            return json_decode($data['data']);
        }
        return $data;
    }
}

function checkValidateDomain($domain)
{
    $domains = Domain::get();
    $status = 1;
    foreach ($domains as $dom) {
        if ($dom->domain == $domain) {
            $status = 0;
        }
    }
    return $status;
}

function seller()
{
    return auth()->guard('web')->user();
}

function sellerId()
{
    return getUser('user_id');
}
