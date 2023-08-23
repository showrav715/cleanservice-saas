@extends(theme(). '.layout')

@section('content')
    <!-- breadcrumb-area -->
    <section class="breadcrumb-area breadcrumb-bg" data-background="{{showPhoto($gs->breadcumb)}}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-content">
                        <h2 class="title">{{$page->title}}</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('front.index')}}">@lang('Home')</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{$page->title}}</li>
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
                       
                        <div class="project-details-content">
                            <h2 class="title">{{$page->title}}</h2>
                            <p>
                                @php
                                    echo $page->details;
                                @endphp
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection