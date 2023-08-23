@extends(theme() . 'layout')

@section('content')
    <!-- breadcrumb-area -->
    <section class="breadcrumb-area breadcrumb-bg" data-background="{{showPhoto($gs->breadcumb)}}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-content">
                        <h2 class="title">{{__('Blog List')}}</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('front.index')}}">{{__('Home')}}</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{__('Blog List')}}</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb-area-end -->

    <!-- blog-area -->
    <section class="inner-blog-area-two pt-130 pb-130">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="inner-blog-item-wrap">
                        @forelse ($blogs as $blog)
                            <div class="blog-item-two inner-blog-item">
                                <div class="blog-thumb-two">
                                    <a href="{{ route('front.blog.details', $blog->slug) }}"><img
                                            src="{{ showPhoto($blog->photo) }}" alt=""></a>
                                </div>
                                <div class="blog-content-two">
                                    <a href="blog.html" class="tag">{{ $blog->category->name }}</a>
                                    <div class="blog-meta">
                                        <ul class="list-wrap">
                                            <li><i class="fas fa-calendar-alt"></i>{{ dateFormat($blog->created_at) }}</li>
                                            <li><i class="far fa-user"></i><a href="blog.html">{{ __('Admin') }}</a></li>
                                        </ul>
                                    </div>
                                    <h2 class="title"><a
                                            href="{{ route('front.blog.details', $blog->slug) }}">{{ $blog->title }}</a>
                                    </h2>
                                    <a href="{{ route('front.blog.details', $blog->slug) }}" class="btn btn-two">
                                    @lang('Read more')</a>
                                </div>
                            </div>
                        @empty
                            <div class="col-lg-12 border p-3">
                                <div class="text-center">
                                    <h2 class="title">@lang('No Blog Found')</h2>
                                </div>
                            </div>
                        @endforelse
                    </div>

                </div>
                <div class="col-lg-4 col-md-8">
                    <aside class="blog-sidebar">
                        <div class="widget">
                            <div class="sidebar-search">
                                <form action="{{ route('front.blog') }}">
                                    <input type="text" name="search" placeholder="{{__('Search')}}...">
                                    <button type="submit"><i class="fas fa-search"></i></button>
                                </form>
                            </div>
                        </div>

                        <div class="widget">
                            <h4 class="widget-title">@lang('Categories')</h4>
                            <div class="cat-list-wrap">
                                <ul class="list-wrap">
                                    @foreach ($categories as $category)
                                        <li><a
                                                href="{{ route('front.blog') . '?category=' . $category->slug }}">{{ $category->name }}</a>
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
    <!-- blog-area-end -->
@endsection
