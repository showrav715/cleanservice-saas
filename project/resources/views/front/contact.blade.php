@extends(theme() . '.layout')
@section('content')
    <!-- breadcrumb-area -->
    <section class="breadcrumb-area breadcrumb-bg" data-background="{{ showPhoto($gs->breadcumb) }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-content">
                        <h2 class="title">@lang('Contact Page')</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('front.index') }}">@lang('Home')</a></li>
                                <li class="breadcrumb-item active" aria-current="page">@lang('Contact Page')</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb-area-end -->

    <!-- contact-area -->
    <section class="contact-area pt-130 pb-130">
        <div class="container">
            <div class="inner-contact-info-wrap">
                <div class="row justify-content-center">
                    <div class="col-lg-4 col-md-6 col-sm-10">
                        <div class="inner-contact-info-item">
                            <div class="icon">
                                <i class="fas fa-phone-volume"></i>
                            </div>
                            <div class="content">
                                <a href="tel:{{ $contact->phone1 }}">{{ $contact->phone1 }}</a>
                                @if ($contact->phone2)
                                    <a href="tel:{{ $contact->phone2 }}">{{ $contact->phone2 }}</a>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-10">
                        <div class="inner-contact-info-item">
                            <div class="icon">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <div class="content">
                                <a href="mailto:{{ $contact->email1 }}">{{ $contact->email1 }}</a>
                                @if ($contact->email2)
                                    <a href="mailto:{{ $contact->email2 }}">{{ $contact->email2 }}</a>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-10">
                        <div class="inner-contact-info-item">
                            <div class="icon">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <div class="content">
                                <p>{{ $contact->address }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="contact-form-area">
                <div class="row align-items-center g-0">
                    <div class="col-lg-6">
                        <div class="contact-img">
                            <img src="{{ showPhoto($contact->photo) }}" alt="">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="contact-content">
                            <h2 class="title">{{ $contact->title }}</h2>
                            <form action="{{ route('front.contact.submit') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-grp">
                                            <input type="text" name="name" placeholder="{{ __('Your Name') }}">
                                            @error('name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-grp">
                                            <input type="email" name="email" value=""
                                                placeholder="{{ __('Email address') }}">
                                            @error('email')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-grp">
                                            <input type="text" name="phone" placeholder="{{ __('Phone number') }}">
                                            @error('phone')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-grp">
                                            <input type="text" name="subject" placeholder="{{ __('Subject') }}">
                                            @error('subject')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-grp">
                                    <textarea name="message" name="message" placeholder="{{__('Write message')}}"></textarea>
                                    @error('message')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <button type="submit" class="btn">@lang('Send a message')</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- contact-area-end -->
    @if ($contact->map_link)
        <div id="contact-map">
            <iframe src="{{ $contact->map_link }}" allowfullscreen loading="lazy"></iframe>
        </div>
    @endif
@endsection
