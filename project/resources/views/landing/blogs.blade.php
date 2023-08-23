@extends('layouts.front')

@section('content')
     <!-- Hero -->
     <section class="hero-section">
        <div class="container">
            <div class="hero-content">
                <h2 class="hero-title">@lang('Blogs')</h2>
                <ul class="breadcrumb">
                    <li>
                        <a href="{{route('landing.index')}}">@lang('Home')</a>
                    </li>
                    <li>
                        @lang('Blogs')
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
            <div class="row g-4 g-lg-3 g-xl-4 justify-content-center">
                @foreach ($blogs as $blog)
                <div class="col-lg-4 col-md-6 col-sm-10">
                    <div class="blog__item">
                        <a href="{{route('landing.blog.show',$blog->slug)}}" class="blog-link">&nbsp;</a>
                        <div class="blog__item-img">
                            <img src="{{getPhoto($blog->photo)}}" alt="blog">
                            <span class="date">
                                <span>{{$blog->category->name}}</span>
                            </span>
                        </div>
                        <div class="blog__item-cont">
                            <div class="blog-date">
                                <span><i class="fas fa-clock"></i></span>
                                <span>{{dateFormat($blog->created_at)}}</span>
                            </div>
                            <h5 class="blog__item-cont-title line--2">
                                {{Str::limit($blog->title, 50)}}
                            </h5>
                            <div class="blog__author">
                                <span class="read--more">@lang('Read More')</span>
                            </div>
                        </div>
                    </div>
                </div>  
                @endforeach
            </div>
        </div>
    </section>
    <!-- Blog -->

@endsection