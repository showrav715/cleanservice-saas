@extends(theme() . '.layout')

@section('content')
    <!-- breadcrumb-area -->
    <section class="breadcrumb-area breadcrumb-bg" data-background="{{ showPhoto($gs->breadcumb) }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-content">
                        <h2 class="title">@lang('Projects Details')</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('front.index') }}">@lang('Home')</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{ $project->title }}</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb-area-end -->

    <!-- project-details-area -->
    <section class="project-details-area pt-130 pb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="project-details-wrap">
                        <div class="project-details-thumb">
                            <img src="{{ showPhoto($project->photo) }}" alt="">
                            <div class="project-info-wrap">
                                <div class="project-info-item">
                                    <span>@lang('Clients'):</span>
                                    <h5 class="title">{{ $project->client }}</h5>
                                </div>
                                <div class="project-info-item">
                                    <span>@lang('Category'):</span>
                                    <h5 class="title">{{ $project->category->slug }}</h5>
                                </div>
                                <div class="project-info-item">
                                    <span>@lang('Date'):</span>
                                    <h5 class="title">{{ dateFormat($project->date) }}</h5>
                                </div>
                                <div class="team-details-social">
                                    <ul class="list-wrap">
                                        @if ($project->facebook)
                                            <li><a href="{{ $project->facebook }}"><i class="fab fa-facebook-f"></i></a></li>
                                            
                                        @endif
                                        @if ($project->twitter)
                                            <li><a href="{{ $project->twitter }}"><i class="fab fa-twitter"></i></a></li>
                                        @endif
                                        @if ($project->linkedin)
                                            <li><a href="{{ $project->linkedin }}"><i class="fab fa-linkedin-in"></i></a></li>
                                        @endif
                                        @if ($project->instagram)
                                            <li><a href="{{ $project->instagram }}"><i class="fab fa-instagram"></i></a></li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="project-details-content">
                            <h2 class="title">{{ $project->title }}</h2>
                            <span class="sub-title">{{ $project->category->slug }}</span>
                            <p>
                                @php
                                    echo $project->details
                                @endphp
                            </p>

                        </div>
                    </div>
                </div>
            </div>
            <div class="more-project-wrap">
                <h2 class="title">@lang('See More Projects')</h2>
                <div class="row justify-content-center">
                    @foreach ($recent_project as $rproject)
                    <div class="col-lg-4 col-md-6">
                        <div class="project-item-three">
                            <div class="project-thumb-three">
                                <a href="{{route('front.project.details',$rproject->slug)}}"><img src="{{showPhoto($rproject->photo)}}"
                                        alt=""></a>
                            </div>
                            <div class="project-content-three">
                                <h2 class="title"><a href="{{route('front.project.details',$rproject->slug)}}">{{$rproject->title}}</a></h2>
                                <span>{{$rproject->category->name}}</span>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection
