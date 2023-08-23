<?php

use App\Http\Controllers\Front\FrontendController;
use App\Http\Controllers\Landing\PackageOrderController;
use App\Http\Controllers\Landing\LandingController;
use App\Http\Controllers\LandingPayment\AuthorizeController;
use App\Http\Controllers\LandingPayment\MercadopagoController;
use App\Http\Controllers\LandingPayment\PaypalController;
use App\Http\Controllers\LandingPayment\PaystackController;
use App\Http\Controllers\LandingPayment\PaytmController;
use App\Http\Controllers\LandingPayment\RazorpayController;
use App\Http\Controllers\LandingPayment\StripeController;
use Illuminate\Support\Facades\Route;

// ************************** ADMIN SECTION START ***************************//


Route::view('error', 'errors.404')->name('error');

// get host 
$domain = env('MAIN_DOMAIN');

// if (substr($_SERVER['HTTP_HOST'], 0, 4) === 'www.') {
//     $domain = 'www.' . env('MAIN_DOMAIN');
// }

Route::group(['domain' => $domain],function () {

    Route::get('/', [LandingController::class, 'index'])->name('landing.index');
    Route::get('/packages', [LandingController::class, 'pricing'])->name('landing.pricing');
    Route::get('/package/order/{id}', [LandingController::class, 'pricing_order'])->name('landing.package.order');
    Route::get('/currency/setup', [LandingController::class, 'currencySetup'])->name('landing.currency.store');
    Route::get('/contact', [LandingController::class, 'contact'])->name('landing.contact');
    Route::get('/blogs', [LandingController::class, 'blogs'])->name('landing.blogs');
    // login
    Route::get('/login', [LandingController::class, 'login'])->name('landing.login');
    Route::post('/login/submit', [LandingController::class, 'loginSubmit'])->name('landing.login.submit');

    Route::get('blog/{slug}/', [LandingController::class, 'blogShow'])->name('landing.blog.show');

    Route::post('/paypal/submit', [PaypalController::class,'store'])->name('landing.paypal.submit');
    Route::get('/paypal/notify', [PaypalController::class,'notify'])->name('landing.paypal.notify');
    Route::post('/stripe/submit', [StripeController::class,'store'])->name('landing.stripe.submit');
    Route::post('/authorize/submit', [AuthorizeController::class,'store'])->name('landing.authorize.submit');
    Route::post('/paytm/submit', [PaytmController::class,'store'])->name('landing.paytm.submit');
    Route::post('/paytm/notify', [PaytmController::class,'paytmCallback'])->name('landing.paytm.notify');
    Route::post('/razorpay/submit', [RazorpayController::class,'store'])->name('landing.razorpay.submit');
    Route::post('/razorpay/notify', [RazorpayController::class,'razorCallback'])->name('landing.razorpay.notify');
    Route::post('/paystack/submit', [PaystackController::class,'store'])->name('landing.paystack.submit');
    Route::post('/mercadopago/submit', [MercadopagoController::class,'store'])->name('landing.mercadopago.submit');

    // package order 
    Route::get('package/get/form/{keyword}', [PackageOrderController::class, 'getForm'])->name('landing.form.get');
    Route::get('/{slug}', [LandingController::class, 'page'])->name('landing.page');
    
});





Route::middleware(['maintenance','seller-end-date'])->group(function () {
// =========================================== FRONTEND ROUTES ===========================================//
Route::get('/', [FrontendController::class, 'index'])->name('front.index');
Route::get('/contact', [FrontendController::class, 'contact'])->name('front.contact');
Route::post('/contact/submit', [FrontendController::class, 'contactSubmit'])->name('front.contact.submit');
Route::post('/subscriber/submit', [FrontendController::class, 'subscriber'])->name('front.subscriber.submit');

Route::get('/getin/touch', [FrontendController::class, 'getintuch'])->name('front.getintuch');
Route::post('/get/in/tuch/submit', [FrontendController::class, 'getInSubmit'])->name('front.gettuch.submit');
Route::get('/blog', [FrontendController::class, 'blog'])->name('front.blog');
Route::get('/blog/{slug}', [FrontendController::class, 'blog_details'])->name('front.blog.details');
Route::get('/team', [FrontendController::class, 'team'])->name('front.team');
Route::get('/team/{slug}', [FrontendController::class, 'team_details'])->name('front.team.details');
Route::get('/services', [FrontendController::class, 'service'])->name('front.service');
Route::get('/service/{slug}', [FrontendController::class, 'service_details'])->name('front.service.details');
Route::get('/projects', [FrontendController::class, 'project'])->name('front.project');
Route::get('/project/{slug}', [FrontendController::class, 'project_details'])->name('front.project.details');

Route::get('/{slug}', [FrontendController::class, 'page'])->name('front.page');
});

