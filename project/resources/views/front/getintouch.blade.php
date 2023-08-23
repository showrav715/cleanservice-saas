@extends(theme() . '.layout')
@section('content')
    <!-- breadcrumb-area -->
    <section class="breadcrumb-area breadcrumb-bg" data-background="{{ getPhoto($gs->breadcumb) }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-content">
                        <h2 class="title">@lang('Get in Touch')</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('front.index') }}">@lang('Home')</a></li>
                                <li class="breadcrumb-item active" aria-current="page">@lang('Get in Touch')</li>
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
            
            <div class="contact-form-area">
                <div class="row align-items-center g-0">
                    <div class="col-lg-12">
                        <div class="contact-content">
                            <h2 class="title">@lang('Get in Touch')</h2>
                            <form action="{{ route('front.gettuch.submit') }}" method="POST">
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
                                            <select name="service_id" class="">
                                                <option value="">@lang('Select Service')</option>
                                                @foreach (DB::table('services')->whereStatus(1)->get() as $cservice)
                                                    <option value="{{ $cservice->id }}">{{ $cservice->title }}</option>
                                                @endforeach
                                            </select>
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

@endsection
