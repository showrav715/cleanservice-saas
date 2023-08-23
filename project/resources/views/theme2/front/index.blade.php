@extends(theme() . '.layout')
@section('content')
    @php
        $banner = $sliders
            ->where('is_banner', 1)
            ->first()
            ->toArray();
    @endphp
    <!-- banner-area -->
    <section class="banner-area jarallax banner-bg" data-background="{{ showPhoto($banner['photo']) }}">
        <div class="container">
            <div class="row justify-content-end">
                <div class="col-lg-7">
                    <div class="banner-content">
                        <span class="sub-title wow fadeInUp" data-wow-delay=".2s">{{ $banner['subtitle'] }}</span>
                        <h2 class="title wow fadeInUp" data-wow-delay=".4s">{{ $banner['title'] }}</h2>
                        <p class="wow fadeInUp" data-wow-delay=".6s">{{ $banner['text'] }}</p>
                        <div class="banner-btn">
                            <a href="{{ $banner['btn1_link'] }}" class="btn wow fadeInLeft"
                                data-wow-delay=".8s">{{ $banner['btn1_text'] }}</a>
                            <a href="{{ $banner['btn2_link'] }}" class="btn btn-two wow fadeInRight"
                                data-wow-delay=".8s">{{ $banner['btn2_text'] }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- banner-area-end -->

    <!-- services-area -->
    <section class="services-area-two pt-100 pb-100">
        <div class="container">
            <div class="row justify-content-center">
                @foreach ($feature_services as $service)
                    <div class="col-lg-4 col-md-6">
                        <div class="services-item-two wow fadeInUp" data-wow-delay=".2s">
                            <div class="services-icon-two">
                                <img data-src="{{ showPhoto($service->feature_icon) }}" class="rounded-circle lazy"
                                    alt="">
                            </div>
                            <div class="services-content-two">
                                <h2 class="title"><a
                                        href="{{ route('front.service.details', $service->slug) }}">{{ $service->title }}</a>
                                </h2>
                                <p>{{$service->sort_text}}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- services-area-end -->

    <!-- introduction-area -->
    <section class="introduction-area pb-130">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-6 col-md-9">
                    <div class="introduction-img-wrap">
                        <img data-src="{{ showPhoto($about->photo) }}" class="lazy" data-aos="fade-right" alt="">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="introduction-content">
                        <div class="section-title-two mb-20 tg-heading-subheading animation-style2">
                            <span class="sub-title">{{ $about->header_title }}</span>
                            <h2 class="title tg-element-title">{{ $about->title }}</h2>
                        </div>
                        <p class="info-one">{{ $about->description }}</p>

                        <div class="introduction-bottom">

                            <span class="call-now"><i class="fas fa-phone-alt"></i><a
                                    href="tel:{{ $about->number }}">{{ $about->number }}</a></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- introduction-area-end -->

    <!-- services-area -->
    <section class="services-area-three pt-125">
        <div class="services-bg jarallax" data-background="{{ asset('assets/admin/services_bg.jpg') }}"></div>
        <div class="container custom-container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-7">
                    <div class="section-title-two white-title text-center mb-65 tg-heading-subheading animation-style2">
                        <span class="sub-title">@lang('What We’re Offering')</span>
                        <h2 class="title tg-element-title">@lang('Providing the Best Services') <br> @lang('for Our Customers') </h2>
                    </div>
                </div>
            </div>
            <div class="services-item-wrap-two">
                <div class="row services-active">
                    @foreach (App\Models\UserService::whereStatus(1)->orderby('id', 'desc')->get() as $service)
                        <div class="col-lg-3">
                            <div class="services-item-three">
                                <div class="services-thumb-three">
                                    <a href="{{ route('front.service.details', $service->slug) }}"><img class="lazy"
                                            data-src="{{ showPhoto($service->photo) }}" alt=""></a>
                                </div>
                                <div class="services-content-three">
                                    <h2 class="title"><a
                                            href="{{ route('front.service.details', $service->slug) }}">{{ $service->title }}</a>
                                    </h2>
                                    <p>{{$service->sort_text}}</p>
                                    <a href="{{ route('front.service.details', $service->slug) }}"
                                        class="btn btn-two">@lang('Read more')</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- services-area-end -->

    <!-- faq-area -->
    <section class="faq-area pt-90">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="faq-content">
                        <div class="section-title-two mb-40 tg-heading-subheading animation-style2">
                            <span class="sub-title">@lang('Our Company FAQs')</span>
                            <h2 class="title tg-element-title">@lang('Frequently Asked')<br> @lang('Question from Our Clients')</h2>
                        </div>
                        <div class="accordion" id="accordionExample">
                            @foreach (DB::table('faqs')->get() as $faq)
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="heading{{ $loop->index }}">
                                        <button class="accordion-button {{ $loop->first ? '' : 'collapsed' }}"
                                            type="button" data-bs-toggle="collapse"
                                            data-bs-target="#collapse{{ $loop->index }}"
                                            aria-expanded="{{ $loop->first ? 'true' : 'false' }}"
                                            aria-controls="collapse{{ $loop->index }}">
                                            {{ $faq->title }}
                                        </button>
                                    </h2>
                                    <div id="collapse{{ $loop->index }}"
                                        class="accordion-collapse collapse {{ $loop->first ? 'show' : '' }}"
                                        aria-labelledby="heading{{ $loop->index }}" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <p>{{ $faq->details }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
         
                <div class="col-lg-6 col-md-8">
                    <div class="faq-img">
                        <img class="lazy" data-src="{{ showPhoto($gs->faq_photo) }}" data-aos="fade-left"
                            alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- faq-area-end -->

    <!-- testimonial-area -->
    <section class="testimonial-area-two testimonial-bg"
        data-background="{{ asset('assets/admin/testimonial_bg.jpg') }}">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="section-title-two text-center mb-65 tg-heading-subheading animation-style2">
                        <span class="sub-title">@lang('What We’re Offering')</span>
                        <h2 class="title tg-element-title">@lang('Providing the Best Services for Our Customers')</h2>
                    </div>
                </div>
            </div>
            <div class="row testimonial-active-two">
                @foreach ($testimonials as $testimonial)
                    <div class="col-lg-4">
                        <div class="testimonial-item-two">
                            <div class="testimonial-icon-two">
                                <i class="fas fa-quote-right"></i>
                            </div>
                            <div class="testimonial-content-two">
                                <p>{{ $testimonial->message }}</p>
                                <div class="testimonial-avatar-info">
                                    <div class="avatar-thumb">
                                        <img class="lazy" data-src="{{ showPhoto($testimonial->photo) }}"
                                            alt="">
                                    </div>
                                    <div class="avatar-content">
                                        <h4 class="title">{{ $testimonial->name }}</h4>
                                        <p>{{ $testimonial->designation }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- testimonial-area-end -->

    <!-- project-area -->
    <section class="project-area-two pt-125 pb-100">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5">
                    <div class="section-title-two mb-60 tg-heading-subheading animation-style2">
                        <span class="sub-title">@lang('Complete Projects')</span>
                        <h2 class="title tg-element-title">@lang('Keep Eye on Our New Projects')</h2>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="project-nav-wrap mb-40">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" data-bs-toggle="tab" data-bs-target=".all-tab-pane"
                                    type="button" role="tab" aria-controls="all-tab-pane"
                                    aria-selected="true">@lang('All')</button>
                            </li>
                            @foreach (App\Models\Pcategory::with('projects')->whereStatus(1)->get() as $pcategory)
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" data-bs-toggle="tab"
                                        data-bs-target=".{{ $pcategory->slug }}" type="button" role="tab"
                                        aria-controls="all-tab-pane" aria-selected="true">{{ $pcategory->name }}</button>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane all-tab-pane fade show active" role="tabpanel" aria-labelledby="all-tab"
                            tabindex="0">
                            <div class="row">
                                @foreach (App\Models\Project::get() as $project)
                                    <div class="col-lg-6">
                                        <div class="project-item-two big-item">
                                            <div class="project-thumb-two">
                                                <a href="{{ route('front.project.details', $project->slug) }}"><img
                                                        class="lazy" data-src="{{ showPhoto($project->photo) }}"
                                                        height="300" alt=""></a>
                                            </div>
                                            <div class="project-content-two">
                                                <h2 class="title"><a
                                                        href="{{ route('front.project.details', $project->slug) }}">{{ $project->title }}</a>
                                                </h2>
                                                <p>
                                                    {{ Str::limit($project->description, 90) }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        @foreach (App\Models\Pcategory::with('projects')->whereStatus(1)->get() as $pcategory)
                            <div class="tab-pane {{ $pcategory->slug }} fade" role="tabpanel" aria-labelledby="all-tab"
                                tabindex="0">
                                <div class="row">
                                    @foreach ($pcategory->projects as $project)
                                        <div class="col-lg-6">
                                            <div class="project-item-two big-item">
                                                <div class="project-thumb-two">
                                                    <a href="{{ route('front.project.details', $project->slug) }}"><img
                                                            class="lazy" data-src="{{ showPhoto($project->photo) }}"
                                                            alt=""></a>
                                                </div>
                                                <div class="project-content-two">
                                                    <h2 class="title"><a
                                                            href="{{ route('front.project.details', $project->slug) }}">{{ $project->title }}</a>
                                                    </h2>
                                                    <p>
                                                        {{ Str::limit($project->description, 90) }}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- project-area-end -->

    <!-- counter-area -->
    <section class="counter-area-two counter-bg jarallax" data-background="{{ showPhoto($gs->counter_photo) }}">
        <div class="container">
            <div class="row">
                @foreach ($counters as $counter)
                    <div class="col-lg-3 col-sm-6">
                        <div class="counter-item">
                            <div class="icon">
                                <i class="{{ $counter->icon }} fa-4x text-success"></i>
                            </div>
                            <div class="content">
                                <h2 class="count"><span class="odometer" data-count="5245"></span>+</h2>
                                <p>{{ $counter->title }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- counter-area-end -->

    <!-- blog-area -->
    <section class="blog-area-two pt-125 pb-60">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="section-title-two text-center mb-60 tg-heading-subheading animation-style2">
                        <span class="sub-title">@lang('Latest News & Articles')</span>
                        <h2 class="title tg-element-title">@lang('Learn More from Our') <br> @lang('Blog Posts')</h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                @foreach ($blogs as $blog)
                    @if ($loop->index != 2)
                        <div class="col-lg-6 col-md-8">
                            <div class="blog-item-two">
                                <div class="blog-thumb-two">
                                    <a href="{{ route('front.blog.details', $blog->slug) }}"><img class="lazy"
                                            data-src="{{ showPhoto($blog->photo) }}" alt=""></a>
                                </div>
                                <div class="blog-content-two">
                                    <a href="blog.html" class="tag">{{ $blog->category->name }}</a>
                                    <div class="blog-meta">
                                        <ul class="list-wrap">
                                            <li><i class="fas fa-calendar-alt"></i>{{ dateFormat($blog->created_at) }}
                                            </li>
                                            <li><i class="far fa-user"></i><a href="blog.html">@lang('Admin')</a></li>
                                        </ul>
                                    </div>
                                    <h2 class="title"><a
                                            href="{{ route('front.blog.details', $blog->slug) }}">{{ $blog->title }}</a>
                                    </h2>
                                    <a href="{{ route('front.blog.details', $blog->slug) }}"
                                        class="btn btn-two">@lang('Read more')</a>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </section>
    <!-- blog-area-end -->

    <!-- brand-area -->
    <div class="brand-area pb-130">
        <div class="container">
            <div class="row brand-active">
                @foreach ($brands as $brand)
                    <div class="col-12">
                        <div class="brand-item">
                            <img data-src="{{ showPhoto($brand->photo) }}" class="lazy" title="{{ $brand->title }}"
                                alt="{{ $brand->title }}">
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- brand-area-end -->
@endsection
