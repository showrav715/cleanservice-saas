@extends(theme() . '.layout')

@section('content')
    <!-- breadcrumb-area -->
    <section class="breadcrumb-area breadcrumb-bg" data-background="{{ showPhoto($gs->breadcumb) }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-content">
                        <h2 class="title">{{ __('Services') }}</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('front.index') }}">{{ __('Home') }}</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{ $service->title }}</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb-area-end -->

    <!-- services-details-area -->
    <section class="services-deatails-area pt-130 pb-130">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 order-0 order-lg-2">
                    <div class="services-details-wrap">
                        <div class="services-details-thumb">
                            <img src="{{ showPhoto($service->photo) }}" alt="">
                        </div>
                        <div class="services-details-content">
                            <h2 class="title">{{ $service->title }}</h2>
                            
                            <p>
                                @php
                                    echo  $service->description 
                                @endphp
                            </p>

                            <div class="service-quality-wrap">
                                <h4 class="title">{{ __('Service Quality') }}</h4>
                                <p>{{ $service->service_quality_text }}</p>
                                <div id="slider1" class="beer-slider" data-start="50">
                                    <img src="{{ showPhoto($service->service_quality_photo) }}" alt="">
                                    <div class="beer-reveal">
                                        <img src="{{ showPhoto($service->service_quality_before_photo) }}" alt="">
                                    </div>
                                </div>
                            </div>

                            @if ($service->faqs->count() > 0)
                                <div class="services-faq faq-content">
                                    <div class="accordion" id="accordionExample">
                                        @foreach ($service->faqs as $faq)
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="heading{{ $loop->index }}">
                                                    <button class="accordion-button {{ $loop->first ? '' : 'collapsed' }}" type="button"
                                                        data-bs-toggle="collapse"
                                                        data-bs-target="#collapse{{ $loop->index }}" aria-expanded="true"
                                                        aria-controls="collapse{{ $loop->index }}">
                                                        {{ $faq->title }}
                                                    </button>
                                                </h2>
                                                <div id="collapse{{ $loop->index }}"
                                                    class="accordion-collapse collapse {{ $loop->first ? 'show' : '' }}"
                                                    aria-labelledby="heading{{ $loop->index }}"
                                                    data-bs-parent="#accordionExample">
                                                    <div class="accordion-body">
                                                        <p>
                                                            {{ $faq->content }}
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endif

                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-8">
                    <aside class="services-sidebar">
                        <div class="widget">
                            <div class="services-cat-list">
                                <h4 class="title">{{__('All Services')}}</h4>
                                <ul class="list-wrap">
                                    @foreach ($services as $sservice)
                                        <li><a
                                                href="{{ route('front.service', $sservice->slug) }}">{{ $sservice->title }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                    </aside>
                </div>
            </div>
        </div>
    </section>
    <!-- services-details-area-end -->
@endsection
