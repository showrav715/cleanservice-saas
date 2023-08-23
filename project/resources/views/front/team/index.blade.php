@extends(theme() . 'layout')

@section('content')
    <!-- breadcrumb-area -->
    <section class="breadcrumb-area breadcrumb-bg" data-background="{{showPhoto($gs->breadcumb)}}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-content">
                        <h2 class="title">@lang('Team')</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('front.index')}}">@lang('Home')</a></li>
                                <li class="breadcrumb-item active" aria-current="page">@lang('Team')</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb-area-end -->

    <!-- team-area -->
    <section class="team-area inner-team-area pt-130 pb-100">
        <div class="container">
            <div class="row justify-content-center">
                @foreach ($teams as $team)
                    <div class="col-lg-4 col-md-6 col-sm-9">
                        <div class="team-item">
                            <div class="team-thumb">
                                <a href="{{route('front.team.details',$team->slug)}}"><img src="{{showPhoto($team->photo)}}" alt=""></a>
                            </div>
                            <div class="team-content">
                                <h3 class="title"><a href="{{route('front.team.details',$team->slug)}}">{{$team->name}}</a></h3>
                                <span>{{$team->designation}}</span>
                                <div class="team-social">
                                    <span class="social-toggle-icon"><i class="fas fa-share-alt"></i></span>
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
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>
    <!-- team-area-end -->
@endsection
