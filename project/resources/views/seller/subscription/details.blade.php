@extends('layouts.seller')
@section('breadcrumb')
    <section class="section">
        <div class="section-header">
            <h1>@lang('Subscriptions')</h1>
        </div>
    </section>
@endsection
@section('title')
    @lang('Subscriptions')
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-7 mx-auto">
            <div class="card">
                <div class="card-body">
                   
                    <form action="{{$package->price <= 0 ? route('seller.subscription.free.submit') : ''}}" class="subscription_form" method="POST">
                        @csrf
                        <input type="hidden" name="ref_id" id="ref_id">
                        <input type="hidden" name="sub" id="sub" value="0">

                        <input type="hidden" value="{{ $package->id }}" name="package_id">
                        @if ($package->price > 0)
                        <div class="form-group">
                            <label id="seller_payment_gateway_option">@lang('Status')</label>
                            <select name="payment_method" id="seller_payment_gateway_option" required class="form-control">
                                <option value="" selected>@lang('Select Paymetn Method')</option>
                                @foreach ($gatewayes as $gateway)
                                    <option value="{{ $gateway->id }}" data-keyword="{{ $gateway->keyword }}"
                                        data-form="{{ $gateway->showForm() }}"
                                        data-href="{{ $gateway->showSubscriptionLink() }}"
                                        form-get="{{ $gateway->formUrl() }}">{{ $gateway->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div id="showPayment"></div>
                        @endif
                       
                        <div class="form-group">
                            <label>@lang('Domain')</label>
                            <input class="form-control" readonly type="text" value="{{ getUser('domain') }}">
                        </div>
                        <button type="submit" id="subscription_btn" class="btn btn-primary">@lang('Submit')</button>
                    </form>
                </div>
                <div class="card-footer">
                    <table class="table table-hover table-borderlress col-12">
                        <tbody>
                            <tr>
                                <td>@lang('Plan Name')</td>
                                <td>{{ $package->name }}</td>
                            </tr>
                            <tr>
                                <td>@lang('Plan Price')</td>
                                
                                <td>
                                    {{ landingShowAmount($package->price) }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script src="https://js.paystack.co/v1/inline.js"></script>
    <script src="https://sdk.mercadopago.com/js/v2"></script>
    
    <script>
        'use strict'
        $(document).on('change', '#seller_payment_gateway_option', function() {
            var form = $('option:selected', this).attr('data-form');
            var href = $('option:selected', this).attr('data-href');
            var formType = $('option:selected', this).attr('data-form');
            var keyword = $('option:selected', this).attr('data-keyword');
            $('form').attr('id', keyword)
            $('.subscription_form').attr('action', href);
            if (formType == 'yes') {
                var formUrl = $('option:selected', this).attr('form-get');
                $('#showPayment').load(formUrl);
            }else{
                $('#showPayment').html('');
            }
        })

        $(document).on('submit', '#paystack', function(e) {
            e.preventDefault();
            var val = $('#sub').val();
            var total = '{{ landingShowAmount($package->price,true) }}';
            total = Math.round(total);
            if (val == 0) {
                var handler = PaystackPop.setup({
                    key: '{{ $paystackData['key'] }}',
                    email: '{{Auth::user()->email}}',
                    amount: total * 100,
                    currency: '{{landingCurrency()->code}}',
                    ref: '' + Math.floor((Math.random() * 1000000000) + 1),
                    callback: function(response) {
                        $('#ref_id').val(response.reference);
                        $('#sub').val('1');
                        $('form').attr('id','');
                        $('#subscription_btn').click();
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

       
    </script>
@endpush
