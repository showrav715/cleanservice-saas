<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>{{ $gs->title }}</title>

    <link rel="stylesheet" href="{{ asset('assets/landing') }}/css/bootstrap.min.css" />
    <link rel="stylesheet" href="{{ asset('assets/landing') }}/css/animate.css" />
    <link rel="stylesheet" href="{{ asset('assets/landing') }}/css/all.min.css" />
    <link rel="stylesheet" href="{{ asset('assets/landing') }}/css/lightbox.min.css" />
    <link rel="stylesheet" href="{{ asset('assets/landing') }}/css/odometer.css" />
    <link rel="stylesheet" href="{{ asset('assets/landing') }}/css/owl.min.css" />
    <link rel="stylesheet" href="{{ asset('assets/landing') }}/css/owl.theme.default.min.css" />
    <link rel="stylesheet" href="{{ asset('assets/landing') }}/css/main.css" />
    <link rel="shortcut icon" href="{{ getPhoto($gs->favicon) }}" type="image/x-icon" />
</head>

<body>
    <!-- Overlayer -->
    <div class="overlayer"></div>
    <div class="loader">
        <div class="loader-item">
            <span class="loader-block"></span>
            <span class="loader-block"></span>
            <span class="loader-block"></span>
            <span class="loader-block"></span>
            <span class="loader-block"></span>
            <span class="loader-block"></span>
            <span class="loader-block"></span>
            <span class="loader-block"></span>
            <span class="loader-block"></span>
        </div>
    </div>
    <!-- Overlayer -->

    <!-- Header -->
    <div class="navbar-bottom">
        <div class="container">
            <div class="navbar-wrapper">
                <div class="logo">
                    <a href="{{ route('landing.index') }}">
                        <img src="{{ getPhoto($gs->header_logo) }}" alt="logo" />
                    </a>
                </div>
                <div class="nav-toggle d-lg-none">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
                <div class="nav-menu-area">
                    <div class="menu-close text--danger d-lg-none">
                        <i class="fas fa-times"></i>
                    </div>
                    <ul class="nav-menu">
                        <li>
                            <a href="{{ route('landing.index') }}">Home</a>
                        </li>
                        <li>
                            <a href="{{ route('landing.pricing') }}">Pricing</a>
                        </li>
                        <li>
                            <a href="{{ route('landing.blogs') }}">Blogs</a>
                        </li>
                        <li>
                            <a href="#0">Pages</a>
                            <ul class="sub-nav">
                                @foreach (DB::table('pages')->get() as $page)
                                    <li>
                                        <a href="{{ route('landing.page', $page->slug) }}">{{ $page->title }}</a>
                                    </li>
                                @endforeach

                            </ul>
                        </li>
                        <li>
                            <a href="{{ route('landing.contact') }}">Contact</a>
                        </li>

                        <li>
                            <div class="btn__grp ms-lg-3">
                                <form id="currency_submit" action="{{ route('landing.currency.store') }}"
                                    method="GET">
                                    <select name="currency_id" class="form-control" id="currency_id">
                                        @php
                                            if (Session::has('landing_currency')) {
                                                $currency_id = Session::get('landing_currency');
                                            } else {
                                                $currency_id = App\Models\Currency::where('default', 1)->first()->id;
                                            }
                                        @endphp
                                        @foreach (DB::table('currencies')->whereStatus(1)->get() as $currency)
                                            <option value="{{ $currency->id }}"
                                                {{ $currency_id == $currency->id ? 'selected' : '' }}>
                                                {{ $currency->code }}</option>
                                        @endforeach
                                    </select>
                                </form>
                            </div>
                        </li>
                        <li>
                            <div class="btn__grp  ms-lg-3">
                                <a href="{{ route('landing.login') }}" class="cmn--btn">Login Now</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Header -->

    @yield('content')
    <!-- Footer -->
    <footer class="footer-section position-relative overflow-hidden">
        <div class="footer-top">
            <div class="container">
                <div class="footer-wrapper">
                    <div class="footer-widget">
                        <div class="f-logo">
                            <img src="{{ getPhoto($gs->header_logo) }}" alt="f-logo">
                        </div>
                        <p class="text-white">{{ $gs->footer_text }}</p>
                        <div class="footer-info">
                            <div class="info-items">
                                <span>
                                    <i class="fas fa-phone"></i>
                                </span>
                                <a href="#0">
                                    {{ $gs->phone }}
                                </a>
                            </div>
                            <div class="info-items">
                                <span>
                                    <i class="fas fa-envelope"></i>
                                </span>
                                <a href="#0">
                                    {{ $gs->email }}
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="footer-widget">
                        <h5 class="footer-title">Quick Links</h5>
                        <ul>
                            <li>
                                <a href="{{ route('landing.index') }}">Home</a>
                            </li>
                            <li>
                                <a href="{{ route('landing.pricing') }}">Pricing</a>
                            </li>
                            <li>
                                <a href="{{ route('landing.blogs') }}">Blog</a>
                            </li>
                            <li>
                                <a href="{{ route('landing.contact') }}">Company</a>
                            </li>

                        </ul>
                    </div>

                    <div class="footer-widget">
                        <h5 class="footer-title">Recent Post</h5>
                        <div class="recent-post">
                            @foreach (DB::table('blogs')->orderby('id', 'desc')->take(2)->get() as $blog)
                                <a href="{{ route('landing.blog.show', $blog->slug) }}" class="recent-items">
                                    <div class="thumb">
                                        <img src="{{ getPhoto($blog->photo) }}" width="100" height="80"
                                            alt="thumb-img">
                                    </div>
                                    <div class="content">
                                        <span class="title">
                                            {{ Str::limit($blog->title, 20) }}
                                        </span>
                                        <span>{{ dateFormat($blog->created_at) }}</span>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @if (isset($visited))
            @if ($gs->is_cookie == 1)
                <div class="cookie-bar-wrap show">
                    <div class="container d-flex justify-content-center">
                        <div class="col-xl-10 col-lg-12">
                            <div class="row justify-content-center">
                                <div class="cookie-bar">
                                    <div class="cookie-bar-text">
                                        {{ $gs->cookie_text }}
                                    </div>
                                    <div class="cookie-bar-action">
                                        <button class="btn btn-primary btn-accept">
                                            {{ $gs->cookie_btn_text }}
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        @endif
        <div class="footer-copyright">
            <p>{{ $gs->copyright_text }}</p>
        </div>
        <span class="banner-elem elem3">&nbsp;</span>
        <span class="banner-elem elem5">&nbsp;</span>
        <span class="banner-elem elem6">&nbsp;</span>
        <span class="banner-elem elem8">&nbsp;</span>
    </footer>
    <!-- Footer -->


    <script src="{{ asset('assets/landing') }}/js/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('assets/landing') }}/js/bootstrap.min.js"></script>
    <script src="{{ asset('assets/landing') }}/js/viewport.jquery.js"></script>
    <script src="{{ asset('assets/landing') }}/js/odometer.min.js"></script>
    <script src="{{ asset('assets/landing') }}/js/lightbox.min.js"></script>
    <script src="{{ asset('assets/landing') }}/js/owl.min.js"></script>
    <script src="{{ asset('assets/landing') }}/js/tilt.js"></script>
    <script src="{{ asset('assets/landing') }}/js/main.js"></script>
    @include('notify.alert')

    @stack('script')
    <script>
        'use strict'
        $(document).ready(function() {
            $('#currency_id').on('change', function() {
                $('#currency_submit').submit();
            })
        })
    </script>
</body>

</html>
