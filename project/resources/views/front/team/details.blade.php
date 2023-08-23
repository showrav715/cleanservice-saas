@extends(theme() . 'layout')

@section('content')
    <!-- breadcrumb-area -->
    <section class="breadcrumb-area breadcrumb-bg" data-background="{{ showPhoto($gs->breadcumb) }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-content">
                        <h2 class="title">@lang('Team Details')</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('front.index') }}">@lang('Home')</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{ $team->name }}</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb-area-end -->

    <!-- team-details-area -->
    <section class="team-details-area pt-130 pb-100">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-8">
                    <div class="team-details-img">
                        <img src="{{ showPhoto($team->photo) }}" alt="">
                        <div class="team-details-info">
                            <h2 class="title">{{ $team->name }}</h2>
                            <span>{{ $team->designation }}</span>
                            <div class="team-details-social">
                                <ul class="list-wrap">
                                    @if ($team->facebook)
                                        <li><a href="{{ $team->facebook }}"><i class="fab fa-facebook-f"></i></a>
                                        </li>
                                    @endif
                                    @if ($team->twitter)
                                        <li><a href="{{ $team->twitter }}"><i class="fab fa-twitter"></i></a></li>
                                    @endif
                                    @if ($team->linkedin)
                                        <li><a href="{{ $team->linkedin }}"><i class="fab fa-linkedin-in"></i></a>
                                        </li>
                                    @endif
                                    @if ($team->instagram)
                                        <li><a href="{{ $team->instagram }}"><i class="fab fa-instagram"></i></a>
                                        </li>
                                    @endif
                                </ul>
                            </div>
                            <div class="info-list">
                                <ul class="list-wrap">
                                    @if ($team->website)
                                        <li>@lang('Website') : <a href="{{ $team->website }}">{{ $team->website }}</a>
                                        </li>
                                    @endif

                                    <li>@lang('Phone') : <a href="tel:{{ $team->phone }}">{{ $team->phone }}</a></li>
                                    <li>@lang('Email') : <a href="mailto:{{ $team->email }}">{{ $team->email }}</a>
                                    </li>
                                    <li>@lang('Address') : <span>{{ $team->address }}</span></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="team-details-content">
                        <p>
                            @php
                                echo $team->bio;
                            @endphp
                        </p>

                        <div class="progress-wrap">
                            @if ($team->progress)
                                @foreach (json_decode($team->progress) as $title => $progress)
                                    <div class="progress-item">
                                        <h5 class="title">{{ $title }}</h5>
                                        <div class="progress">
                                            <div class="progress-bar wow slideInLeft" data-wow-delay=".2s"
                                                role="progressbar" style="width: {{ $progress }}%;"
                                                aria-valuenow="{{ $progress }}" aria-valuemin="0" aria-valuemax="100">
                                                @if ($progress > 40)
                                                    <span>{{ $progress }}%</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                        <div class="team-details-form">
                            <h2 class="title">@lang('Feel Free to Write Our') <br> @lang('Cleaning Experts')</h2>
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
    <!-- team-details-area-end -->
@endsection
