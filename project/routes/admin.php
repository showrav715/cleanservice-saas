<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BlogCategoryController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\DomainSettingController;
use App\Http\Controllers\Admin\EmailController;
use App\Http\Controllers\Admin\GeneralSettingController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\ManageCurrencyController;
use App\Http\Controllers\Admin\ManageRoleController;
use App\Http\Controllers\Admin\ManageServiceController;
use App\Http\Controllers\Admin\ManageStaffController;
use App\Http\Controllers\Admin\ManageTestimonialController;
use App\Http\Controllers\Admin\ManageTicketController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\PackageController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\PaymentGatewayController;
use App\Http\Controllers\Admin\SeoSettingController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

// ************************** ADMIN SECTION START ***************************//

Route::prefix('admin')->name('admin.')->group(function () {

    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);

    Route::get('/forgot-password', [LoginController::class, 'forgotPasswordForm'])->name('forgot.password');
    Route::post('/forgot-password', [LoginController::class, 'forgotPasswordSubmit']);
    Route::get('forgot-password/verify-code', [LoginController::class, 'verifyCode'])->name('verify.code');
    Route::post('forgot-password/verify-code', [LoginController::class, 'verifyCodeSubmit']);
    Route::get('reset-password', [LoginController::class, 'resetPassword'])->name('reset.password');
    Route::post('reset-password', [LoginController::class, 'resetPasswordSubmit']);

    Route::middleware('auth:admin')->group(function () {
        Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
        Route::get('/', [AdminController::class, 'index'])->name('dashboard');
        Route::get('/profile', [AdminController::class, 'profile'])->name('profile');
        Route::post('/profile/update', [AdminController::class, 'profileupdate'])->name('profile.update');
        Route::get('/password', [AdminController::class, 'passwordreset'])->name('password');
        Route::post('/password/update', [AdminController::class, 'changepass'])->name('password.update');

        Route::group(['middleware' => 'permission:Frontend Settings'], function () {
            //==================================== PAGE SECTION  ==============================================//
            Route::get('page', [PageController::class, 'index'])->name('page.index');
            Route::get('page/create', [PageController::class, 'create'])->name('page.create');
            Route::post('page/store', [PageController::class, 'store'])->name('page.store');
            Route::get('page/edit/{page}', [PageController::class, 'edit'])->name('page.edit');
            Route::put('page/update/{page}', [PageController::class, 'update'])->name('page.update');
            Route::post('page/remove', [PageController::class, 'destroy'])->name('page.remove');

            //==================================== PAGE SECTION END ==============================================//
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

            // manage service
            Route::get('/manage-service', [ManageServiceController::class, 'index'])->name('service.index');
            Route::post('/add-service', [ManageServiceController::class, 'store'])->name('service.store');
            Route::put('/update-service/{id}', [ManageServiceController::class, 'update'])->name('service.update');
            Route::delete('/delete-service', [ManageServiceController::class, 'destroy'])->name('service.destroy');

            Route::get('/hero-section', [GeneralSettingController::class, 'banner_section'])->name('gs.banner');
            Route::post('/hero-section/update', [GeneralSettingController::class, 'banner_section_update'])->name('gs.banner.update');

            // manage testimonial
            Route::get('/manage-testimonial', [ManageTestimonialController::class, 'index'])->name('testimonial.index');
            Route::post('/add-testimonial', [ManageTestimonialController::class, 'store'])->name('testimonial.store');
            Route::put('/update-testimonial/{id}', [ManageTestimonialController::class, 'update'])->name('testimonial.update');
            Route::delete('/delete-testimonial', [ManageTestimonialController::class, 'destroy'])->name('testimonial.destroy');
        });

        Route::group(['middleware' => 'permission:Package Management'], function () {
            // package
            Route::get('/packages', [PackageController::class, 'index'])->name('package.index');
            Route::get('/create-package', [PackageController::class, 'create'])->name('package.create');
            Route::post('/store-package', [PackageController::class, 'store'])->name('package.store');
            Route::get('/edit-package/{id}', [PackageController::class, 'edit'])->name('package.edit');
            Route::put('/update-package/{id}', [PackageController::class, 'update'])->name('package.update');
            Route::delete('/delete-package', [PackageController::class, 'destory'])->name('package.destroy');
        });

        Route::group(['middleware' => 'permission:Customers'], function () {
            // customer
            Route::get('/customers', [CustomerController::class, 'index'])->name('customer.index');
            Route::get('/customer/{id}', [CustomerController::class, 'show'])->name('customer.show');
            Route::get('create-customer', [CustomerController::class, 'create'])->name('customer.create');
            Route::post('store-customer', [CustomerController::class, 'store'])->name('customer.store');
            Route::get('/customer/{id}/edit', [CustomerController::class, 'edit'])->name('customer.edit');
            Route::get('/customer/{id}/view', [CustomerController::class, 'view'])->name('customer.view');
            Route::put('/customer/{id}/update', [CustomerController::class, 'update'])->name('customer.update');
            Route::delete('/customer/delete', [CustomerController::class, 'destroy'])->name('customer.destroy');
            Route::get('/customer/package/edit/{id}', [CustomerController::class, 'editPackage'])->name('customer.package.edit');
            Route::put('/customer/package/update/{id}', [CustomerController::class, 'updatePackage'])->name('customer.package.update');
            Route::post('/customer/send/mail/{id}', [CustomerController::class, 'sendMail'])->name('customer.send.mail');
        });

        Route::group(['middleware' => 'permission:Manage Domain'], function () {
            //==================================== DOMAIN SETTING SECTION ==============================================//
            Route::get('domains', [DomainSettingController::class, 'setting'])->name('domain.setting');
            Route::put('domain/setting/update', [DomainSettingController::class, 'domainUpdate'])->name('domain.request.update');
            Route::get('domain/setting/status/{id}/{status}', [DomainSettingController::class, 'status'])->name('domain.request.status');
        });

        Route::group(['middleware' => 'permission:General Settings'], function () {
            //==================================== GENERAL SETTING SECTION ==============================================//

            Route::get('/general-settings', [GeneralSettingController::class, 'siteSettings'])->name('gs.site.settings');
            Route::post('/general-settings/update', [GeneralSettingController::class, 'update'])->name('gs.update');
            Route::get('/general-settings/logo-favicon', [GeneralSettingController::class, 'logo'])->name('gs.logo');
            Route::get('/general-settings/maintenance', [GeneralSettingController::class, 'maintenance'])->name('gs.maintenance');
            Route::get('/general-settings/status/update/{value}', [GeneralSettingController::class, 'StatusUpdate'])->name('gs.status');
            //cookie
            Route::get('/manage-cookie', [AdminController::class, 'cookie'])->name('cookie');
            Route::post('/manage-cookie', [AdminController::class, 'updateCookie'])->name('update.cookie');

            //==================================== GENERAL SETTING SECTION ==============================================//
            //==================================== EMAIL SETTING SECTION ==============================================//

            Route::get('/email-templates', [EmailController::class, 'index'])->name('mail.index');
            Route::get('/email-templates/{id}', [EmailController::class, 'edit'])->name('mail.edit');
            Route::post('/email-templates/{id}', [EmailController::class, 'update'])->name('mail.update');
            Route::get('/email-config', [EmailController::class, 'config'])->name('mail.config');
            Route::post('/email-config', [EmailController::class, 'configUpdate']);

            //==================================== EMAIL SETTING SECTION END ==============================================//
        });

        Route::group(['middleware' => 'permission:Payment Gateway'], function () {
            //==================================== PAYMENTGATEWAY SETTING SECTION ==============================================//

            Route::get('/payment-gateways', [PaymentGatewayController::class, 'index'])->name('gateway');
            Route::get('add/payment-gateway', [PaymentGatewayController::class, 'create'])->name('gateway.create');
            Route::post('/store/payment-gateway', [PaymentGatewayController::class, 'store'])->name('gateway.store');
            Route::get('/payment-gateway/edit/{paymentgateway}', [PaymentGatewayController::class, 'edit'])->name('gateway.edit');
            Route::post('/payment-gateway/update/{gateway}', [PaymentGatewayController::class, 'update'])->name('gateway.update');

            //==================================== PAYMENTGATEWAY SETTING SECTION END ==============================================//

            // Currency
            Route::get('/manage-currency', [ManageCurrencyController::class, 'index'])->name('currency.index');
            Route::get('/add-currency', [ManageCurrencyController::class, 'addCurrency'])->name('currency.add');
            Route::post('/add/currency/store', [ManageCurrencyController::class, 'store'])->name('currency.store');
            Route::get('/edit-currency/{id}', [ManageCurrencyController::class, 'editCurrency'])->name('currency.edit');
            Route::put('/update-currency/{id}', [ManageCurrencyController::class, 'updateCurrency'])->name('currency.update');
            Route::get('/currency/set-default/{id}', [ManageCurrencyController::class, 'setDefault'])->name('currency.default');
            Route::delete('/delete-currency', [ManageCurrencyController::class, 'deleteCurrency'])->name('currency.delete');
        });

        //==================================== ADMIN SEO SETTINGS SECTION ====================================
        Route::resource('seo-setting', SeoSettingController::class);
        //==================================== ADMIN SEO SETTINGS SECTION ENDS ====================================

        Route::group(['middleware' => 'permission:Manage Orders'], function () {
            // ==================================== ADMIN ORDER SECTION ====================================
            Route::get('orders', [OrderController::class, 'index'])->name('order.index');
            Route::get('order/details/{id}', [OrderController::class, 'details'])->name('order.details');
            Route::get('order/edit/{id}', [OrderController::class, 'edit'])->name('order.edit');
            Route::put('order/update/{id}', [OrderController::class, 'update'])->name('order.update');
        });

        Route::group(['middleware' => 'permission:Manage Role'], function () {
            //role manage
            Route::get('/role', [ManageRoleController::class, 'index'])->name('role.index');
            Route::get('/role/create', [ManageRoleController::class, 'create'])->name('role.create');
            Route::post('/role/store', [ManageRoleController::class, 'store'])->name('role.store');
            Route::get('/role/edit/{id}', [ManageRoleController::class, 'edit'])->name('role.edit');
            Route::put('/role/update/{id}', [ManageRoleController::class, 'update'])->name('role.update');
            Route::delete('/role/delete', [ManageRoleController::class, 'destroy'])->name('role.destroy');
        });

        Route::group(['middleware' => 'permission:Manage Staff'], function () {
            //manage staff
            Route::get('manage/staff', [ManageStaffController::class, 'index'])->name('staff.manage');
            Route::post('add/staff', [ManageStaffController::class, 'addStaff'])->name('staff.add');
            Route::post('update/staff/{id}', [ManageStaffController::class, 'updateStaff'])->name('staff.update');
            Route::delete('destroy/staff', [ManageStaffController::class, 'destroy'])->name('staff.destroy');
        });

        Route::group(['middleware' => 'permission:Support Tickets'], function () {
            //support ticket
            Route::get('manage/tickets/{type}', [ManageTicketController::class, 'index'])->name('ticket.manage');
            Route::post('reply/ticket/{ticket_num}', [ManageTicketController::class, 'replyTicket'])->name('ticket.reply');
        });

        Route::get('/clear-cache', function () {
            Artisan::call('optimize:clear');
            return back()->with('success', 'Cache cleared successfully');
        })->name('clear.cache');

        Route::get('/activation', [AdminController::class, 'activation'])->name('admin-activation-form');
        Route::post('/activation', [AdminController::class, 'activation_submit'])->name('admin-activate-purchase');

    });

});
