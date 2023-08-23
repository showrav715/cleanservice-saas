<?php

use App\Http\Controllers\SellerPayment\AuthorizeController;
use App\Http\Controllers\SellerPayment\MercadopagoController;
use App\Http\Controllers\SellerPayment\PaypalController;
use App\Http\Controllers\SellerPayment\PaystackController;
use App\Http\Controllers\SellerPayment\PaytmController;
use App\Http\Controllers\SellerPayment\RazorpayController;
use App\Http\Controllers\SellerPayment\StripeController;
use App\Http\Controllers\Seller\AboutController;
use App\Http\Controllers\Seller\BlogCategoryController;
use App\Http\Controllers\Seller\BlogController;
use App\Http\Controllers\Seller\BrandController;
use App\Http\Controllers\Seller\ContactController;
use App\Http\Controllers\Seller\CounterController;
use App\Http\Controllers\Seller\DomainSettingController;
use App\Http\Controllers\Seller\FaqController;
use App\Http\Controllers\Seller\GeneralSettingController;
use App\Http\Controllers\Seller\LanguageController;
use App\Http\Controllers\Seller\LoginController;
use App\Http\Controllers\Seller\ManageServiceController;
use App\Http\Controllers\Seller\ManageTestimonialController;
use App\Http\Controllers\Seller\PageController;
use App\Http\Controllers\Seller\PcategoryController;
use App\Http\Controllers\Seller\ProjectController;
use App\Http\Controllers\Seller\SellerController;
use App\Http\Controllers\Seller\SliderController;
use App\Http\Controllers\Seller\SocialController;
use App\Http\Controllers\Seller\SubscriptionController;
use App\Http\Controllers\Seller\TeamController;
use Illuminate\Support\Facades\Route;

Route::prefix('seller')->name('seller.')->group(function () {

    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);

    Route::get('/forgot-password', [LoginController::class, 'forgotPasswordForm'])->name('forgot.password');
    Route::post('/forgot-password', [LoginController::class, 'forgotPasswordSubmit']);
    Route::get('forgot-password/verify-code', [LoginController::class, 'verifyCode'])->name('verify.code');
    Route::post('forgot-password/verify-code', [LoginController::class, 'verifyCodeSubmit']);
    Route::get('reset-password', [LoginController::class, 'resetPassword'])->name('reset.password');
    Route::post('reset-password', [LoginController::class, 'resetPasswordSubmit']);

    Route::middleware(['auth:web', 'seller-end-date'])->group(function () {
        Route::get('/currency/setup', [SellerController::class, 'currencySetup'])->name('currency.store');
        Route::get('/logout', [LoginController::class, 'logout'])->name('logout')->withoutMiddleware(['seller-end-date']);
        Route::get('/', [SellerController::class, 'index'])->name('dashboard')->withoutMiddleware(['seller-end-date']);
        Route::get('/profile', [SellerController::class, 'profile'])->name('profile');
        Route::post('/profile/update', [SellerController::class, 'profileupdate'])->name('profile.update');
        Route::get('/password', [SellerController::class, 'passwordreset'])->name('password');
        Route::post('/password/update', [SellerController::class, 'changepass'])->name('password.update');

        // service
        Route::get('/manage-service', [ManageServiceController::class, 'index'])->name('service.index');
        Route::get('/create', [ManageServiceController::class, 'create'])->name('service.create');
        Route::post('/store', [ManageServiceController::class, 'store'])->name('service.store');
        Route::get('/edit/{id}', [ManageServiceController::class, 'edit'])->name('service.edit');
        Route::put('/update/{id}', [ManageServiceController::class, 'update'])->name('service.update');
        Route::delete('/delete-service', [ManageServiceController::class, 'destroy'])->name('service.destroy');

        Route::get('/service/faq', [ManageServiceController::class, 'faq_index'])->name('service.faq.index');
        Route::post('service/faq/store', [ManageServiceController::class, 'faq_store'])->name('service.faq.store');
        Route::put('/service/update/{id}', [ManageServiceController::class, 'faq_update'])->name('service.faq.update');
        Route::delete('/service/faq/delete-service', [ManageServiceController::class, 'faq_destroy'])->name('service.faq.destroy');

        //pages
        Route::get('page', [PageController::class, 'index'])->name('page.index');
        Route::get('page/create', [PageController::class, 'create'])->name('page.create');
        Route::post('page/store', [PageController::class, 'store'])->name('page.store');
        Route::get('page/edit/{page}', [PageController::class, 'edit'])->name('page.edit');
        Route::put('page/update/{page}', [PageController::class, 'update'])->name('page.update');
        Route::post('page/remove', [PageController::class, 'destroy'])->name('page.remove');

        //manage blogs
        Route::get('blog-category', [BlogCategoryController::class, 'index'])->name('bcategory.index');
        Route::post('blog-category/store', [BlogCategoryController::class, 'store'])->name('bcategory.store');
        Route::put('blog-category/update/{id}', [BlogCategoryController::class, 'update'])->name('bcategory.update');
        Route::delete('blog-category/destroy', [BlogCategoryController::class, 'destroy'])->name('bcategory.destroy');

        Route::get('blog', [BlogController::class, 'index'])->name('blog.index');
        Route::get('blog/create', [BlogController::class, 'create'])->name('blog.create');
        Route::post('blog/store', [BlogController::class, 'store'])->name('blog.store');
        Route::get('blog/edit/{blog}', [BlogController::class, 'edit'])->name('blog.edit');
        Route::put('blog/update/{blog}', [BlogController::class, 'update'])->name('blog.update');
        Route::delete('blog-delete/{blog}', [BlogController::class, 'destroy'])->name('blog.destroy');

        Route::get('/project-categories', [PcategoryController::class, 'index'])->name('pcategory.index');
        Route::post('/store-project-category', [PcategoryController::class, 'store'])->name('pcategory.store');
        Route::put('/update-project-category/{id}', [PcategoryController::class, 'update'])->name('pcategory.update');
        Route::delete('/delete-project-category', [PcategoryController::class, 'destory'])->name('pcategory.destroy');

        // project
        Route::get('/projects', [ProjectController::class, 'index'])->name('project.index');
        Route::get('/create-project', [ProjectController::class, 'create'])->name('project.create');
        Route::post('/store-project', [ProjectController::class, 'store'])->name('project.store');
        Route::get('/edit-project/{id}', [ProjectController::class, 'edit'])->name('project.edit');
        Route::put('/update-project/{id}', [ProjectController::class, 'update'])->name('project.update');
        Route::delete('/delete-project', [ProjectController::class, 'destroy'])->name('project.destroy');

        // manage team
        Route::get('/manage-team', [TeamController::class, 'index'])->name('team.index');
        Route::get('/create-team', [TeamController::class, 'create'])->name('team.create');
        Route::post('/store-team', [TeamController::class, 'store'])->name('team.store');
        Route::get('/edit-team/{id}', [TeamController::class, 'edit'])->name('team.edit');
        Route::put('/update-team/{id}', [TeamController::class, 'update'])->name('team.update');
        Route::delete('/delete-team', [TeamController::class, 'destroy'])->name('team.destroy');

        // FAQ
        Route::get('/faq', [FaqController::class, 'index'])->name('faq.index');
        Route::post('/faq/store', [FaqController::class, 'store'])->name('faq.store');
        Route::put('/faq/update/{id}', [FaqController::class, 'update'])->name('faq.update');
        Route::delete('/faq/destroy', [FaqController::class, 'destory'])->name('faq.destroy');

        // counter section
        Route::get('counter', [CounterController::class, 'index'])->name('counter.index');
        Route::post('counter/store', [CounterController::class, 'store'])->name('counter.store');
        Route::put('counter/update/{counter}', [CounterController::class, 'update'])->name('counter.update');
        Route::delete('counter-delete', [CounterController::class, 'destroy'])->name('counter.destroy');
        // Manage sliders
        Route::get('slider', [SliderController::class, 'index'])->name('slider.index');
        Route::get('slider/create', [SliderController::class, 'create'])->name('slider.create');
        Route::post('slider/store', [SliderController::class, 'store'])->name('slider.store');
        Route::get('slider/edit/{slider}', [SliderController::class, 'edit'])->name('slider.edit');
        Route::put('slider/update/{slider}', [SliderController::class, 'update'])->name('slider.update');
        Route::get('slider/status/{slider}/{status}', [SliderController::class, 'status'])->name('slider.status');
        Route::delete('slider-delete/{slider}', [SliderController::class, 'destroy'])->name('slider.destroy');
        // Brand section
        Route::get('brand', [BrandController::class, 'index'])->name('brand.index');
        Route::post('brand/store', [BrandController::class, 'store'])->name('brand.store');
        Route::put('brand/update/{brand}', [BrandController::class, 'update'])->name('brand.update');
        Route::delete('brand-delete', [BrandController::class, 'destroy'])->name('brand.destroy');
        // About section
        Route::get('about', [AboutController::class, 'index'])->name('about.index');
        Route::put('about/update', [AboutController::class, 'update'])->name('about.update');
        // Contact section
        Route::get('contact/section', [GeneralSettingController::class, 'contact_section'])->name('contact.section');
        // manage testimonail
        Route::get('/manage-testimonial', [ManageTestimonialController::class, 'index'])->name('testimonial.index');
        Route::post('/add-testimonial', [ManageTestimonialController::class, 'store'])->name('testimonial.store');
        Route::put('/update-testimonial/{id}', [ManageTestimonialController::class, 'update'])->name('testimonial.update');
        Route::delete('/delete-testimonial', [ManageTestimonialController::class, 'destroy'])->name('testimonial.destroy');

        //==================================== GENERAL SETTING SECTION ==============================================//

        Route::get('/general-settings', [GeneralSettingController::class, 'siteSettings'])->name('gs.site.settings');
        Route::get('/plugin-settings', [GeneralSettingController::class, 'pluginSettings'])->name('gs.plugin.settings');
        Route::get('/maintainance-settings', [GeneralSettingController::class, 'maintainance'])->name('gs.maintainance.settings');
        Route::post('/general-settings/update', [GeneralSettingController::class, 'update'])->name('gs.update');
        Route::get('/general-settings/logo-favicon', [GeneralSettingController::class, 'logo'])->name('gs.logo');
        Route::get('/general-settings/breadcumb', [GeneralSettingController::class, 'breadcumb'])->name('gs.breadcumb');
        Route::get('/general-settings/maintenance', [GeneralSettingController::class, 'maintenance'])->name('gs.maintenance');
        Route::get('/general-settings/status/update/{value}', [GeneralSettingController::class, 'StatusUpdate'])->name('gs.status');
        //cookie
        Route::get('/manage-cookie', [SellerController::class, 'cookie'])->name('cookie');
        Route::post('/manage-cookie', [SellerController::class, 'updateCookie'])->name('update.cookie');

        Route::get('social/link', [SocialController::class, 'index'])->name('social.manage');
        Route::post('add/social/link', [SocialController::class, 'store'])->name('social.store');
        Route::put('update/social/link/{id}', [SocialController::class, 'update'])->name('social.update');
        Route::delete('destroy/social/link', [SocialController::class, 'destroy'])->name('social.destroy');
        // theme
        Route::get('/theme-settings', [GeneralSettingController::class, 'themeSettings'])->name('gs.theme.settings');
        //==================================== GENERAL SETTING SECTION==============================================//

        // ==================================== ADMIN CONTACT SECTION ====================================//
        Route::get('/contact/page/setting', [ContactController::class, 'index'])->name('contact.setting.index');
        Route::put('/contact/page/setting/update', [ContactController::class, 'update'])->name('contact.setting.update');
        Route::get('/contact/message', [ContactController::class, 'contactMessage'])->name('contact.message');
        Route::get('/getintouch/message', [ContactController::class, 'getintouch'])->name('contact.getintouch.message');
        Route::delete('/contact/message/delete', [ContactController::class, 'contactMessageDelete'])->name('contact.message.delete');

        Route::get('manage/subscribers', [SellerController::class, 'subscribers'])->name('subscriber');
        Route::delete('/subscriber/delete', [SellerController::class, 'subscribersDelete'])->name('subscriber.destroy');

        // Domain Setting

        Route::get('/domain-setting', [DomainSettingController::class, 'index'])->name('domain.setting');
        Route::post('send/domain/request', [DomainSettingController::class, 'sendRequest'])->name('domain.request.send');
        Route::put('send/domain/update/{id}', [DomainSettingController::class, 'updateRequest'])->name('domain.request.update');
        Route::delete('send/domain/destroy', [DomainSettingController::class, 'destroy'])->name('domain.request.destroy');

        Route::resource('language', LanguageController::class);
        Route::post('add-translate/{id}', [LanguageController::class, 'storeTranslate'])->name('translate.store');
        Route::post('update-translate/{id}', [LanguageController::class, 'updateTranslate'])->name('translate.update');
        Route::post('remove-translate', [LanguageController::class, 'removeTranslate'])->name('translate.remove');
        Route::post('language/status-update', [LanguageController::class, 'statusUpdate'])->name('update-status.language');
        Route::post('language/remove', [LanguageController::class, 'destroy'])->name('remove.language');

        // support ticket
        Route::get('support/tickets', [SupportTicketController::class, 'index'])->name('ticket.index');
        Route::post('open/support/tickets', [SupportTicketController::class, 'openTicket'])->name('ticket.open');
        Route::post('reply/ticket/{ticket_num}', [SupportTicketController::class, 'replyTicket'])->name('ticket.reply');

        Route::post('/paypal/submit', [PaypalController::class, 'store'])->name('paypal.submit')->withoutMiddleware(['seller-end-date']);
        Route::get('/paypal/notify', [PaypalController::class, 'notify'])->name('paypal.notify')->withoutMiddleware(['seller-end-date']);
        Route::post('/stripe/submit', [StripeController::class, 'store'])->name('stripe.submit')->withoutMiddleware(['seller-end-date']);
        Route::post('/authorize/submit', [AuthorizeController::class, 'store'])->name('authorize.submit')->withoutMiddleware(['seller-end-date']);
        Route::post('/paytm-submit', [PaytmController::class, 'store'])->name('paytm.submit')->withoutMiddleware(['seller-end-date']);
        Route::post('/paytm/notify', [PaytmController::class, 'paytmCallback'])->name('paytm.notify')->withoutMiddleware(['seller-end-date']);
        Route::post('/razorpay/submit', [RazorpayController::class, 'store'])->name('razorpay.submit')->withoutMiddleware(['seller-end-date']);
        Route::post('/razorpay/notify', [RazorpayController::class, 'razorCallback'])->name('razorpay.notify')->withoutMiddleware(['seller-end-date']);
        Route::post('/paystack/submit', [PaystackController::class, 'store'])->name('paystack.submit')->withoutMiddleware(['seller-end-date']);

        Route::post('/mercadopago/submit', [MercadopagoController::class, 'store'])->name('mercadopago.submit')->withoutMiddleware(['seller-end-date']);

        // Subscription
        Route::get('/subscription', [SubscriptionController::class, 'index'])->name('subscription.index')->withoutMiddleware(['seller-end-date']);
        Route::get('/subscription/details/{id}', [SubscriptionController::class, 'details'])->name('subscription.details')->withoutMiddleware(['seller-end-date']);
        Route::get('/subscription/order/details/{id}', [SubscriptionController::class, 'order_details'])->name('subscription.order.details')->withoutMiddleware(['seller-end-date']);
        Route::get('subscription/get/form/{keyword}', [SubscriptionController::class, 'getForm'])->name('subscription.form.get')->withoutMiddleware(['seller-end-date']);
        Route::post('subscription/free/submit', [SubscriptionController::class, 'freeSubscription'])->name('subscription.free.submit')->withoutMiddleware(['seller-end-date']);

    });

});
