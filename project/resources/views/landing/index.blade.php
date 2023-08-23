@extends('layouts.front')

@php
    $cookie = $gs->cookie;
@endphp

@section('content')

    <section class="banner-section">
        <div class="container">
            <div class="banner__wrapper">
                <div class="banner__wrapper-content">
                    <h6 class="subtitle text--base">@lang('Welcome To') {{ $gs->title }}</h6>
                    <h1 class="title">
                        {{ $gs->banner_title }}
                    </h1>
                    <p>
                        {{ $gs->banner_text }}
                    </p>
                    <div class="btn__grp mt-4">
                        <a href="{{ route('landing.contact') }}" class="cmn--btn">@lang('Contact US') <i
                                class="fas fa-arrow-right"></i></a>
                        <a href="{{ $gs->banner_video }}" class="cmn--video" data-lightbox>
                            <i class="fas fa-solid fa-play"></i>
                            <span>@lang('Watch The Video')</span>
                        </a>
                    </div>
                </div>
                <div class="banner__wrapper-thumb">
                    <img src="{{ getPhoto($gs->banner_photo) }}" alt="banner" />
                </div>
            </div>
        </div>
        <span class="banner-elem elem1">&nbsp;</span>
        <span class="banner-elem elem2">&nbsp;</span>
        <span class="banner-elem elem3">&nbsp;</span>
        <span class="banner-elem elem4">&nbsp;</span>
        <span class="banner-elem elem5">&nbsp;</span>
        <span class="banner-elem elem6">&nbsp;</span>
        <span class="banner-elem elem7">&nbsp;</span>
        <span class="banner-elem elem8">&nbsp;</span>
        <span class="banner-elem elem9">&nbsp;</span>
    </section>

    <section class="service-section pt-100 pb-50 position-relative overflow-hidden">
        <div class="container position-relative">
            <div class="section-title text-center">
                <h6 class="subtitle text--base">@lang('Services')</h6>
                <h2 class="title">@lang('What We Serve to You')</h2>

            </div>
            <div class="row g-4 justify-content-center">
                @foreach ($services as $service)
                    <div class="col-lg-4 col-sm-6">
                        <div class="service-item">
                            <div class="service-icon">
                                <img src="{{ getPhoto($service->photo) }}" alt="">
                            </div>
                            <div class="feature-content">
                                <h5 class="title">
                                    <a href="javascript:;">{{ $service->title }}</a>
                                </h5>
                                <p>
                                    {{ $service->text }}
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach


            </div>
        </div>
        <span class="banner-elem elem3">&nbsp;</span>
        <span class="banner-elem elem7">&nbsp;</span>
        <span class="banner-elem elem2">&nbsp;</span>
        <span class="banner-elem elem5">&nbsp;</span>
        <span class="banner-elem elem8">&nbsp;</span>
    </section>

    <section class="testimonial-section bg--section pt-100 pb-100 overflow-hidden position-relative">
        <div class="container">
            <div class="section-title text-center">
                <h6 class="subtitle text--base">@lang('Testimonials')</h6>
                <h2 class="title">@lang('What our students say')</h2>

            </div>
            <div class="testimonial-slider owl-carousel owl-theme">
                @foreach ($testimonails as $testimonial)
                    <div class="testimonial-item">
                        <div class="icon">
                            <i class="fas fa-quote-left"></i>
                        </div>
                        <div class="all-wrapper">
                            <div class="testimonial-content">
                                <p>
                                    {{ $testimonial->message }}
                                </p>
                            </div>
                            <div class="testimonial-header">
                                <div class="thumb">
                                    <img src="{{ getPhoto($testimonial->photo) }}" alt="testimonial">
                                </div>
                                <div class="cont">
                                    <h5 class="name">{{ $testimonial->name }}</h5>
                                    <span>{{ $testimonial->designation }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach


            </div>
        </div>
        <span class="banner-elem elem2">&nbsp;</span>
    </section>
 
    <section class="pricing-plan pt-100">
        <div class="container">
            <div class="section-title text-center">
                <h6 class="subtitle text--base">@lang('Pricing')</h6>
                <h2 class="title">@lang('Choose your plan')</h2>

            </div>
            <div class="row g-4 justify-content-center">
                @foreach ($packages as $package)
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
                                    <div class="pricing-btn">
                                        <a href="{{ route('landing.package.order', $package->id) }}" class="cmn--btn">
                                            @lang('Purchase now')
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="blog-section pt-100 pb-100">
        <div class="container">
            <div class="section-title text-center">
                <h6 class="subtitle text--base">@lang('Blog Posts')</h6>
                <h2 class="title">@lang('Our Latest News & Tips')</h2>
            </div>
            <div class="row g-4 g-lg-3 g-xl-4 justify-content-center">
                @foreach ($blogs as $blog)
                    <div class="col-lg-4 col-md-6 col-sm-10">
                        <div class="blog__item">
                            <a href="{{ route('landing.blog.show', $blog->slug) }}" class="blog-link">&nbsp;</a>
                            <div class="blog__item-img">
                                <img src="{{ getPhoto($blog->photo) }}" alt="blog">
                                <span class="date">
                                    <span>{{ $blog->category->name }}</span>
                                </span>
                            </div>
                            <div class="blog__item-cont">
                                <div class="blog-date">
                                    <span><i class="fas fa-clock"></i></span>
                                    <span>{{ dateFormat($blog->createda_at) }}</span>
                                </div>
                                <h5 class="blog__item-cont-title line--2">
                                    {{ Str::limit($blog->title, 50) }}
                                </h5>
                                <div class="blog__author">
                                    <span class="read--more">@lang('Read More')</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
