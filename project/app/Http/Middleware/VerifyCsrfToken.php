<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array<int, string>
     */
    protected $except = [
        'paypal/notify',
        'seller/paypal/notify',
        'paytm/notify',
        'seller/paytm/notify',
        'razorpay/notify',
        'seller/razorpay/notify',
    ];
}
