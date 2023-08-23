@extends('layouts.front')

@section('content')
   <!-- Hero -->
   <section class="hero-section">
    <div class="container">
        <div class="hero-content">
            <h2 class="hero-title">@lang('Blog Details')</h2>
            <ul class="breadcrumb">
                <li>
                    <a href="{{route('landing.index')}}">@lang('Home')</a>
                </li>
                <li>
                    {{Str::limit($blog->title,50)}}
                </li>
            </ul>
        </div>
    </div>
    <span class="banner-elem elem1">&nbsp;</span>
    <span class="banner-elem elem3">&nbsp;</span>
    <span class="banner-elem elem7">&nbsp;</span>
</section>
<!-- Hero -->

<!-- Blog -->
<section class="blog-section pt-100 pb-100">
    <div class="container">
        <div class="row gy-5">
            <div class="col-lg-8">
                <div class="blog__item blog__item-details">
                    <div class="blog__item-img">
                        <img src="{{getPhoto($blog->photo)}}" alt="blog">
                    </div>
                    <div class="blog__item-content mt-4">
                        <div class="d-flex flex-wrap mb-3 justify-content-between meta-post">
                            <span><i class="far fa-user"></i> Admin</span>
                            <span><i class="fas fa-calendar-minus"></i> {{dateFormat($blog->created_at)}}</span>
                        </div>
                        <h5 class="blog__item-content-title">
                            {{$blog->title}}
                        </h5>
                    </div>
                    <div class="blog__details">
                      {!! $blog->description !!}
                    </div>
                </div>
            </div>
            <div class="col-xl-4">
                <aside class="blog-sidebar ps-xxl-5">
                    <div class="widget">
                        <div class="widget-header text-center">
                            <h5 class="m-0 text-white">@lang('Latest Blog Posts')</h5>
                        </div>
                        <div class="widget-body">
                            <ul class="latest-posts">
                                @foreach ($latetes as $latest)
                                <li>
                                    <a href="{{route('landing.blog.show',$latest->slug)}}">
                                        <div class="img">
                                            <img src="{{getPhoto($latest->photo)}}" alt="blog">
                                        </div>
                                        <div class="cont">
                                            <h5 class="subtitle">{{Str::limit($latest->title,50)}}</h5>
                                            <span class="date">{{dateFormat($latest->created_at)}}</span>
                                        </div>
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="widget">
                        <div class="widget-header text-center">
                            <h5 class="m-0 text-white">@lang('Category')</h5>
                        </div>
                        <div class="widget-body">
                            <ul class="archive-links">
                                @foreach ($categories as $category)
                                <li>
                                    <a href="{{route('landing.blogs').'?category='.$category->slug}}">
                                        <span>{{$category->name}}</span>
                                        <span>({{$category->blogs_count}})</span>
                                    </a>
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
<!-- Blog -->

@endsection