@extends(theme(). 'layout')

@section('content')
     <!-- breadcrumb-area -->
     <section class="breadcrumb-area breadcrumb-bg" data-background="{{showPhoto($gs->breadcumb)}}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-content">
                        <h2 class="title">{{__('Blog Details')}}</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('front.index')}}">{{__('Home')}}</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{$blog->title}}</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb-area-end -->

    <!-- blog-area -->
    <section class="blog-details-area pt-130 pb-130">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="blog-details-wrap">
                        <div class="blog-item-two inner-blog-item">
                            <div class="blog-thumb-two blog-details-thumb">
                                <img src="{{showPhoto($blog->photo)}}" alt="">
                            </div>
                            <div class="blog-content-two blog-details-content">
                                <a href="javascript:;" class="tag">{{$blog->category->name}}</a>
                                <div class="blog-meta">
                                    <ul class="list-wrap">
                                        <li><i class="fas fa-calendar-alt"></i>{{dateFormat($blog->created_at)}}</li>
                                        <li><i class="far fa-user"></i><a href="javascript:;">{{__('Admin')}}</a></li>
                                    </ul>
                                </div>
                                <h2 class="title">{{$blog->title}}</h2>
                                @php
                                    echo $blog->description
                                @endphp
                            </div>
                        </div>
                        @if($gs->is_disqus == 1)
                        <div class="comments-wrap">
                            <div class="comments">
                                <div id="disqus_thread">
                                   <script>
                                      (function() {
                                      var d = document, s = d.createElement('script');
                                      s.src = 'https://{{ $gs->disqus }}.disqus.com/embed.js';
                                      s.setAttribute('data-timestamp', +new Date());
                                      (d.head || d.body).appendChild(s);
                                      })();
                                   </script>
                                   <noscript>{{ __('Please enable JavaScript to view the') }} <a href="https://disqus.com/?ref_noscript">{{ __('comments powered by Disqus.') }}</a></noscript>
                                </div>
                             </div>
                        </div>
                        @endif
                    </div>
                </div>
                   <div class="col-lg-4 col-md-8">
                    <aside class="blog-sidebar">
                        <div class="widget">
                            <div class="sidebar-search">
                                <form action="{{route('front.blog')}}">
                                    <input type="text" name="search" placeholder="{{__('Search')}}...">
                                    <button type="submit"><i class="fas fa-search"></i></button>
                                </form>
                            </div>
                        </div>
                        
                        <div class="widget">
                            <h4 class="widget-title">{{__('Categories')}}</h4>
                            <div class="cat-list-wrap">
                                <ul class="list-wrap">
                                    @foreach ($categories as $category)
                                    <li><a href="{{route('front.blog').'?category='.$category->slug}}">{{$category->name}}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="widget">
                            <h4 class="widget-title">{{__('Recent post')}}</h4>
                            <div class="rc-post-list">
                                @foreach ($recent_blogs as $recent)
                                <div class="rc-post-item">
                                    <div class="thumb">
                                        <a href="{{route('front.blog.details',$recent->slug)}}"><img src="{{showPhoto($recent->photo)}}" alt=""></a>
                                    </div>
                                    <div class="content">
                                        <span class="date"><i class="far fa-calendar-alt"></i>{{dateFormat($recent->created_at)}}</span>
                                        <h5 class="title"><a href="{{route('front.blog.details',$recent->slug)}}">{{$recent->title}}</a></h5>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                     
                    </aside>
                </div>
            </div>
        </div>
    </section>
    <!-- blog-area-end -->
@endsection