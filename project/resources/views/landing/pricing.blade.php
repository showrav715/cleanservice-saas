@extends('layouts.front')

@section('content')
     <section class="hero-section">
        <div class="container">
            <div class="hero-content">
                <h2 class="hero-title">@lang('Pricing Plan')</h2>
                <ul class="breadcrumb">
                    <li>
                        <a href="{{route('landing.index')}}">@lang('Home')</a>
                    </li>
                    <li>
                        @lang('Pricing Plan')
                    </li>
                </ul>
            </div>
        </div>
        <span class="banner-elem elem1">&nbsp;</span>
        <span class="banner-elem elem3">&nbsp;</span>
        <span class="banner-elem elem7">&nbsp;</span>
    </section>
 
    <section class="pricing-plan pt-5 pb-100">
        <div class="container">
            <div class="row g-4 justify-content-center">
                @foreach ($packages as $package)
                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="pricing-items">
                        <div class="pricing-head">
                            <h4>
                                {{$package->name}}
                            </h4>
                            @if ($package->days == 7)
                                <div class="pricing-detail text-white"><strong>@lang('Per Week')</strong></div>
                            @elseif($package->days == 30)
                                <div class="pricing-detail text-white"><strong>@lang('Per Month')</strong></div>
                            @elseif($package->days == 365)
                                <div class="pricing-detail text-white"><strong>@lang('Per Year')</strong></div>
                            @endif
                            <p class="px-2 m-2 mt-0"> {{ $package->description }}</p>
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
                                    {{landingShowAmount($package->price)}}
                                </h2>
                                <div class="pricing-btn">
                                    <a href="{{route('landing.package.order',$package->id)}}" class="cmn--btn">
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
@endsection