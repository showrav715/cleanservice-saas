@extends('layouts.front')

@section('content')
    <!-- Hero -->
    <section class="hero-section">
        <div class="container">
            <div class="hero-content">
                <h2 class="hero-title">@lang('Sign In')</h2>
                <ul class="breadcrumb">
                    <li>
                        <a href="{{ route('landing.index') }}">@lang('Home')</a>
                    </li>
                    <li>
                        @lang('Sign In')
                    </li>
                </ul>
            </div>
        </div>
        <span class="banner-elem elem1">&nbsp;</span>
        <span class="banner-elem elem3">&nbsp;</span>
        <span class="banner-elem elem7">&nbsp;</span>
    </section>
    <!-- Hero -->

    <!-- Account -->
    <section class="account-section">
        <div class="container">
            <div class="account-wrapper login-wrapper">
                <div class="account-left">
                    <div class="account-thumb">
                        <img src="{{ asset('assets/front') }}/img/account.png" alt="images">
                    </div>
                </div>
                <div class="account-right border">
                    <div class="w-100">
                        <div class="section-title">
                            <h6 class="subtitle text--base">@lang('Login')</h6>
                        </div>
                        <form class="row g-4" action="{{ route('landing.login.submit') }}" method="POST">
                            @csrf
                            <div class="col-sm-12 form-group">
                                <label class="form--label" for="email">@lang('Your Email Address')</label>
                                <input type="text" class="form-control form--control bg--section" name="email"
                                    id="email" placeholder="@lang('Your Email Address')">
                            </div>
                            <div class="col-sm-12 form-group">
                                <label class="form--label" for="password">@lang('Password')</label>
                                <input type="password" class="form-control form--control bg--section" name="password"
                                    id="password" placeholder="@lang('Password')">
                            </div>

                            <div class="col-xl-12 form-group">
                                <button type="submit" class="cmn--btn">@lang('Login Now')</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
