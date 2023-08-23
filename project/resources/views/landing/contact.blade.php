@extends('layouts.front')

@section('content')
    <section class="hero-section">
        <div class="container">
            <div class="hero-content">
                <h2 class="hero-title">@lang('Contact Us')</h2>
                <ul class="breadcrumb">
                    <li>
                        <a href="{{ route('landing.index') }}">Home</a>
                    </li>
                    <li>
                        @lang('Contact Us')
                    </li>
                </ul>
            </div>
        </div>
    </section>

    <section class="contact-section pt-100 pb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 pe-xl-5">
                    <form class="contact-form row g-4">
                        <form class="row g-4">
                            <div class="col-sm-6 form-group">
                                <label class="form--label" for="name">@lang('Your Name')</label>
                                <input type="text" class="form-control form--control bg--section" id="name"
                                    placeholder="@lang('Your Name')">
                            </div>
                            <div class="col-sm-6 form-group">
                                <label class="form--label" for="email">@lang('Your Email Address')</label>
                                <input type="text" class="form-control form--control bg--section" id="email"
                                    placeholder="@lang('Your Email Address')">
                            </div>
                            <div class="col-sm-12 form-group">
                                <label class="form--label" for="message">@lang('Your Message')</label>
                                <textarea id="message" class="form-control form--control bg--section" placeholder="@lang('Your Message')"></textarea>
                            </div>
                            <div class="col-xl-12 form-group">
                                <button type="submit" class="cmn--btn">@lang('Send Message')</button>
                            </div>
                        </form>
                    </form>
                </div>
                <div class="col-lg-6">
                    <div class="section-title mb-4 pb-3">
                        <h6 class="subtitle text--base">@lang('Contact Us')</h6>
                        <h2 class="title">{{ $gs->contact_page_title }}</h2>
                        <p>
                            {{ $gs->contact_page_text }}
                        </p>
                    </div>
                    <div class="contact-content">
                        <div class="contact__item">
                            <div class="contact__item-icon">
                                <i class="fas fa-phone-alt"></i>
                            </div>
                            <div class="contact__item-cont">
                                <h5 class="contact__item-title">@lang('Phone')</h5>
                                <a href="Tel:{{ $gs->phone }}">{{ $gs->phone }}</a>
                            </div>
                        </div>
                        <div class="contact__item">
                            <div class="contact__item-icon">
                                <i class="far fa-envelope"></i>
                            </div>
                            <div class="contact__item-cont">
                                <h5 class="contact__item-title">@lang('Email')</h5>
                                <a href="Mailto:{{ $gs->email }}">{{ $gs->email }}</a>
                            </div>
                        </div>
                        <div class="contact__item">
                            <div class="contact__item-icon">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <div class="contact__item-cont">
                                <h5 class="contact__item-title">@lang('Address')</h5>
                                <span class="text--base">{{ $gs->address }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
