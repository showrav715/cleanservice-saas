@extends('layouts.front')

@section('content')
     <section class="hero-section">
        <div class="container">
            <div class="hero-content">
                <h2 class="hero-title">{{$page->title}}</h2>
                <ul class="breadcrumb">
                    <li>
                        <a href="{{route('landing.index')}}">@lang('Home')</a>
                    </li>
                    <li>
                        {{$page->title}}
                    </li>
                </ul>
            </div>
        </div>
        <span class="banner-elem elem1">&nbsp;</span>
        <span class="banner-elem elem3">&nbsp;</span>
        <span class="banner-elem elem7">&nbsp;</span>
    </section>
 
    <section class="about-section pt-5 ">
        <div class="container">
            <div class="row justify-content-start">
                <div class="col-lg-12">
                    <div class="about-text-item mb-5">
                        <h4 class="title">
                            {{$page->title}}
                        </h4>
                        <p>
                            @php
                                echo $page->details;
                            @endphp
                        </p>
                    </div>
                 
                </div>
            </div>
        </div>
    </section>
@endsection