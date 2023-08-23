@extends('layouts.front')

@section('content')
    <section class="hero-section">
        <div class="container">
            <div class="hero-content">
                <h2 class="hero-title">@lang('Package Order')</h2>
                <ul class="breadcrumb">
                    <li>
                        <a href="{{ route('landing.index') }}">@lang('Home')</a>
                    </li>
                    <li>
                        @lang('Package Order')
                    </li>
                </ul>
            </div>
        </div>
        <span class="banner-elem elem1">&nbsp;</span>
        <span class="banner-elem elem3">&nbsp;</span>
        <span class="banner-elem elem7">&nbsp;</span>
    </section>

    <section class="contact-section pt-5 pb-100">
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="pricing-items">
                        <div class="pricing-head">
                            <h4>
                                {{ $package->name }}
                            </h4>
                            @if ($package->days == 7)
                                <div class="pricing-detail text-white"><strong>@lang('Per Week')</strong></div>
                            @elseif($package->days == 30)
                                <div class="pricing-detail text-white"><strong>@lang('Per Month')</strong></div>
                            @elseif($package->days == 365)
                                <div class="pricing-detail text-white"><strong>@lang('Per Year')</strong></div>
                            @endif
                            <p class="p-2 m-2 mt-0"> {{ $package->description }}</p>
                        </div>
                        <div class="pricing-content">
                            <div class="content-body">

                                <ul class="pricing-list">
                                    <li>
                                        <span>@lang('Service Limit') {{ $package->service_limit }}</span>
                                    </li>
                                    <li>
                                        <span>@lang('Blog Limit') {{ $package->blog_limit }}</span>
                                    </li>
                                    <li>
                                        <span>@lang('Project Limit') {{ $package->project_limit }}</span>
                                    </li>
                                    <li>
                                        <span>@lang('Team Member Limit') {{ $package->team_limit }}</span>
                                    </li>


                                    @if ($package->custom_domain == 1)
                                        <li>
                                            <span><i class="fas fa-check"></i></span>
                                            <span>@lang('Custom Domain')</span>
                                        </li>
                                    @else
                                        <li>
                                            <span><i class="fas fa-times red"></i></span>
                                            <span>@lang('Custom Domain')</span>
                                        </li>
                                    @endif

                                    @if ($package->multiple_theme == 1)
                                        <li>
                                            <span><i class="fas fa-check"></i></span>
                                            <span>@lang('Multiple Theme')</span>
                                        </li>
                                    @else
                                        <li>
                                            <span><i class="fas fa-times red"></i></span>
                                            <span>@lang('Multiple Theme')</span>
                                        </li>
                                    @endif

                                    @if ($package->support == 1)
                                        <li>
                                            <span><i class="fas fa-check"></i></span>
                                            <span>@lang('Support Module')</span>
                                        </li>
                                    @else
                                        <li>
                                            <span><i class="fas fa-times red"></i></span>
                                            <span>@lang('Support Module')</span>
                                        </li>
                                    @endif

                                    @if ($package->qr_code == 1)
                                        <li>
                                            <span><i class="fas fa-check"></i></span>
                                            <span>@lang('QR Code')</span>
                                        </li>
                                    @else
                                        <li>
                                            <span><i class="fas fa-times red"></i></span>
                                            <span>@lang('QR Code')</span>
                                        </li>
                                    @endif

                                    @if ($package->facebook_pixel == 1)
                                        <li>
                                            <span><i class="fas fa-check"></i></span>
                                            <span>@lang('Facebook Pixel')</span>
                                        </li>
                                    @else
                                        <li>
                                            <span><i class="fas fa-times red"></i></span>
                                            <span>@lang('Facebook Pixel')</span>
                                        </li>
                                    @endif

                                    @if ($package->google_analytics == 1)
                                        <li>
                                            <span><i class="fas fa-check"></i></span>
                                            <span>@lang('Google Analytics')</span>
                                        </li>
                                    @else
                                        <li>
                                            <span><i class="fas fa-times red"></i></span>
                                            <span>@lang('Google Analytics')</span>
                                        </li>
                                    @endif
                                </ul>
                                <h2>
                                    {{ landingShowAmount($package->price) }}
                                </h2>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-8 col-lg-8 col-md-6 border p-5">
                    <form action="" id="payment-form" class="contact-form row g-4 landing_form" method="POST">
                        @csrf
                        <input type="hidden" name="ref_id" id="ref_id">
                        <input type="hidden" name="package_id" value="{{ $package->id }}">
                        <div class="col-sm-6 form-group">
                            <label class="form--label" for="name">@lang('Your Name')</label>
                            <input type="text" class="form-control  bg--section" name="name"
                                value="{{ old('name') }}" id="name" placeholder="@lang('Your Name')">
                        </div>
                        <div class="col-sm-6 form-group">
                            <label class="form--label" for="email">@lang('Your Email Address')</label>
                            <input type="text" class="form-control  bg--section" name="email"
                                value="{{ old('email') }}" id="email" placeholder="@lang('Your Email Address')">
                        </div>
                        <div class="col-sm-6 form-group">
                            <label class="form--label" for="password">@lang('Password')</label>
                            <input type="password" class="form-control bg--section" name="password"
                                value="{{ old('password') }}" id="password" placeholder="@lang('Password')">
                        </div>
                        <div class="col-sm-6 form-group">
                            <label class="form--label" for="password_confirmation">@lang('Confirm Password')</label>
                            <input type="password" name="password_confirmation" class="form-control bg--section"
                                value="{{ old('password_confirmation') }}" id="password_confirmation"
                                placeholder="@lang('Confirm Password')">
                        </div>

                        <div class="input-group">
                            <input type="text" class="form-control text-right" name="domain"
                                value="{{ old('domain') }}" placeholder="shop name">
                            <div class="input-group-append">
                                <div class="input-group-text">.{{ env('MAIN_DOMAIN') }}</div>
                            </div>
                        </div>
                        <code>Example: {shop_name}.{{ env('MAIN_DOMAIN') }} </code>

                        @if ($package->price > 0)
                            <div class="col-sm-6 form-group">
                                <label class="form--label" for="seller_payment_gateway_option">@lang('Payment Gateway')</label>
                                <select name="method" required class="form-control bg--section"
                                    id="seller_payment_gateway_option">
                                    <option value="">@lang('Select One')</option>
                                    @foreach ($gateways as $gateway)
                                        <option value="{{ $gateway->id }}" data-keyword="{{ $gateway->keyword }}"
                                            data-form="{{ $gateway->showForm() }}"
                                            data-href="{{ $gateway->showLandingLink() }}"
                                            form-get="{{ $gateway->landingformUrl() }}">{{ $gateway->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div id="showPayment"></div>
                        @endif
                        <input type="hidden" name="sub" id="sub" value="0">
                        <input type="hidden" name="transactionAmount" id="transactionAmount" value="">

                        <div class="col-xl-12 form-group">
                            <button type="submit" id="submit_btn" class="cmn--btn">@lang('Submit')</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </section>
@endsection

@push('script')
    <script src="https://js.paystack.co/v1/inline.js"></script>
    <script src="https://sdk.mercadopago.com/js/v2"></script>
    <script>
        $(document).on('change', '#seller_payment_gateway_option', function() {
            var form = $('option:selected', this).attr('data-form');
            var href = $('option:selected', this).attr('data-href');

            var formType = $('option:selected', this).attr('data-form');
            var keyword = $('option:selected', this).attr('data-keyword');
            $('.landing_form').attr('id', keyword)
            $('.landing_form').attr('action', href);
            if (formType == 'yes') {
                var formUrl = $('option:selected', this).attr('form-get');
                $('#showPayment').load(formUrl);
            } else {
                $('#showPayment').html('');
            }
        })

        $(document).on('submit', '#paystack', function() {
            var val = $('#sub').val();
            var total = '{{ landingShowAmount($package->price, true) }}';
            total = Math.round(total);
            if (val == 0) {
                var handler = PaystackPop.setup({
                    key: '{{ $paystackData['key'] }}',
                    email: $('#email').val(),
                    amount: total * 100,
                    currency: '{{ landingCurrency()->code }}',
                    ref: '' + Math.floor((Math.random() * 1000000000) + 1),
                    callback: function(response) {
                        $('#ref_id').val(response.reference);
                        $('#sub').val('1');
                        $('#form').attr('id', '');
                        $('#submit_btn').click();
                    },
                    onClose: function() {
                        window.location.reload();
                    }
                });
                handler.openIframe();
                return false;
            } else {

                return true;
            }
            return false
        });


        // $(document).on('submit', '#mercadopago', function(e) {
        //   e.preventDefault();
        //   getCardToken();
        // });
    </script>
@endpush
