@extends(theme() . '.layout')


@section('content')
    <!-- breadcrumb-area -->
    <section class="breadcrumb-area breadcrumb-bg" data-background="{{showPhoto($gs->breadcumb)}}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-content">
                        <h2 class="title">@lang('Projects List')</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('front.index')}}">@lang('Home')</a></li>
                                <li class="breadcrumb-item active" aria-current="page">@lang('Projects List')</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb-area-end -->

    <!-- project-area -->
    <section class="inner-project-area-two pt-130 pb-130">
        <div class="container">
            <div class="project-item-wrap">
                <div class="row justify-content-center">
                    @foreach ($projects as $project)
                        <div class="col-lg-4 col-md-6 col-sm-10">
                            <div class="project-item inner-project-item">
                                <div class="project-thumb">
                                    <a href="{{ route('front.project.details', $project->slug) }}"><img
                                            src="{{ showPhoto($project->photo) }}" alt="{{ $project->title }}"></a>
                                </div>
                                <div class="project-content">
                                    <h2 class="title"><a
                                            href="{{ route('front.project.details', $project->slug) }}">{{ $project->title }}</a>
                                    </h2>
                                    <span>{{ $project->category->name }}</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- project-area-end -->
@endsection
