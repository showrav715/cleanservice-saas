@extends(theme() . '.layout')

@section('content')
    <!-- slider-area -->
    <section class="slider-area">
        <div class="slider-active">
            @foreach ($sliders as $slider)
                <div class="single-slider slider-bg" data-background="{{ showPhoto($slider->photo) }}">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-7">
                                <div class="slider-content " data-animation="fadeInUp" data-delay=".2s">
                                    <h4 class="sub-title">
                                        <svg viewBox="0 0 41 44" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M35.2826 37.5886C36.6662 36.9737 38.8185 36.205 40.8939 36.205C38.8185 36.205 36.6662 35.4363 35.2826 34.8213C34.6676 33.4377 33.8989 31.2854 33.8989 29.21C33.8989 31.2854 33.1303 33.4377 32.5153 34.8213C31.1317 35.4363 28.9794 36.205 26.9039 36.205C28.9794 36.205 31.1317 36.9737 32.5153 37.5886C33.1303 38.9722 33.8989 41.1246 33.8989 43.2C33.8989 41.1246 34.6676 38.9722 35.2826 37.5886Z"
                                                fill="currentcolor" />
                                            <path
                                                d="M31.2085 13.5288C33.4377 12.5295 36.8968 11.2996 40.279 11.2996C36.8968 11.2996 33.4377 10.0698 31.2085 9.07046C30.2093 6.84128 28.9794 3.38221 28.9794 0C28.9794 3.38221 27.7495 6.84128 26.7502 9.07046C24.521 10.0698 21.0619 11.2996 17.6797 11.2996C21.0619 11.2996 24.521 12.5295 26.7502 13.5288C27.7495 15.758 28.9794 19.2171 28.9794 22.5993C28.9794 19.2171 30.2093 15.758 31.2085 13.5288Z"
                                                fill="currentcolor" />
                                            <path
                                                d="M16.6036 31.7467C19.2939 30.5936 23.5986 28.9794 27.6726 28.9794C23.5986 28.9794 19.2939 27.442 16.6036 26.2121C15.3737 23.5986 13.8363 19.294 13.8363 15.22C13.8363 19.294 12.2989 23.5986 11.069 26.289C8.37865 27.442 4.07402 29.0563 0 29.0563C4.07402 29.0563 8.37865 30.5936 11.069 31.8235C12.2989 34.4371 13.8363 38.7417 13.8363 42.8926C13.8363 38.7417 15.3737 34.4371 16.6036 31.7467Z"
                                                fill="currentcolor" />
                                        </svg>
                                        {{ $slider->subtitle }}
                                    </h4>
                                    <h2 class="title" data-animation="fadeInUp" data-delay=".4s"> {{ $slider->title }}</h2>
                                    <p class="wow text-white fadeInUp" data-wow-delay=".6s">
                                        {{$slider->text}}</p>
                                    <div class="slider-btn">
                                        <a href="{{ $slider->btn1_link }}" class="btn" data-animation="fadeInLeft"
                                            data-delay=".6s">{{ $slider->btn1_text }}</a>
                                        <a href="{{ $slider->btn2_link }}" class="btn btn-two" data-animation="fadeInRight"
                                            data-delay=".6s">{{ $slider->btn2_text }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
    <!-- slider-area-end -->


    <!-- about-area -->
    <section class="about-area has-animation pt-130 pb-130">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7 col-md-10">
                    <div class="about-img-wrap">
                        <img src="{{ showPhoto($about->photo) }}" class="wow fadeInLeft" data-wow-delay=".2s" alt="">
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="about-content">
                        <div class="section-title mb-75">
                            <span class="sub-title">
                                <svg viewBox="0 0 41 44" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M35.2826 37.5886C36.6662 36.9737 38.8185 36.205 40.8939 36.205C38.8185 36.205 36.6662 35.4363 35.2826 34.8213C34.6676 33.4377 33.8989 31.2854 33.8989 29.21C33.8989 31.2854 33.1303 33.4377 32.5153 34.8213C31.1317 35.4363 28.9794 36.205 26.9039 36.205C28.9794 36.205 31.1317 36.9737 32.5153 37.5886C33.1303 38.9722 33.8989 41.1246 33.8989 43.2C33.8989 41.1246 34.6676 38.9722 35.2826 37.5886Z"
                                        fill="currentcolor" />
                                    <path
                                        d="M31.2085 13.5288C33.4377 12.5295 36.8968 11.2996 40.279 11.2996C36.8968 11.2996 33.4377 10.0698 31.2085 9.07046C30.2093 6.84128 28.9794 3.38221 28.9794 0C28.9794 3.38221 27.7495 6.84128 26.7502 9.07046C24.521 10.0698 21.0619 11.2996 17.6797 11.2996C21.0619 11.2996 24.521 12.5295 26.7502 13.5288C27.7495 15.758 28.9794 19.2171 28.9794 22.5993C28.9794 19.2171 30.2093 15.758 31.2085 13.5288Z"
                                        fill="currentcolor" />
                                    <path
                                        d="M16.6036 31.7467C19.2939 30.5936 23.5986 28.9794 27.6726 28.9794C23.5986 28.9794 19.2939 27.442 16.6036 26.2121C15.3737 23.5986 13.8363 19.294 13.8363 15.22C13.8363 19.294 12.2989 23.5986 11.069 26.289C8.37865 27.442 4.07402 29.0563 0 29.0563C4.07402 29.0563 8.37865 30.5936 11.069 31.8235C12.2989 34.4371 13.8363 38.7417 13.8363 42.8926C13.8363 38.7417 15.3737 34.4371 16.6036 31.7467Z"
                                        fill="currentcolor" />
                                </svg>
                                {{ $about->header_title }}
                            </span>
                            @php
                                
                                $header_subtitle = explode(' ', $about->title);
                                $header_subtitle_1 = implode(' ', array_slice($header_subtitle, 0, 3));
                                $header_subtitle_2 = implode(' ', array_slice($header_subtitle, 3, -1));
                                $header_subtitle_3 = implode(' ', array_slice($header_subtitle, 4, 9999));
                                
                            @endphp
                            <h2 class="title">{{ $header_subtitle_1 }}
                                <span>
                                    {{ $header_subtitle_2 }}
                                    <svg viewBox="0 0 173 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M2 22.9998C8.5 14.2152 90 -14 172 14.2148" stroke-width="3" />
                                    </svg>
                                </span>
                                {{ $header_subtitle_3 }}
                            </h2>
                        </div>
                        <p class="text-justify">
                            {{ $about->description }}
                        </p>

                        <div class="contact">
                            <span class="icon"><i class="fas fa-phone-alt"></i></span>
                            <a href="tel:{{ $about->number }}">{{ $about->number }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- about-area-end -->

    <!-- services-area -->
    <section class="services-area has-animation">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-6">
                    <div class="section-title text-center mb-75">
                        <span class="sub-title">
                            <svg viewBox="0 0 41 44" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M35.2826 37.5886C36.6662 36.9737 38.8185 36.205 40.8939 36.205C38.8185 36.205 36.6662 35.4363 35.2826 34.8213C34.6676 33.4377 33.8989 31.2854 33.8989 29.21C33.8989 31.2854 33.1303 33.4377 32.5153 34.8213C31.1317 35.4363 28.9794 36.205 26.9039 36.205C28.9794 36.205 31.1317 36.9737 32.5153 37.5886C33.1303 38.9722 33.8989 41.1246 33.8989 43.2C33.8989 41.1246 34.6676 38.9722 35.2826 37.5886Z"
                                    fill="currentcolor" />
                                <path
                                    d="M31.2085 13.5288C33.4377 12.5295 36.8968 11.2996 40.279 11.2996C36.8968 11.2996 33.4377 10.0698 31.2085 9.07046C30.2093 6.84128 28.9794 3.38221 28.9794 0C28.9794 3.38221 27.7495 6.84128 26.7502 9.07046C24.521 10.0698 21.0619 11.2996 17.6797 11.2996C21.0619 11.2996 24.521 12.5295 26.7502 13.5288C27.7495 15.758 28.9794 19.2171 28.9794 22.5993C28.9794 19.2171 30.2093 15.758 31.2085 13.5288Z"
                                    fill="currentcolor" />
                                <path
                                    d="M16.6036 31.7467C19.2939 30.5936 23.5986 28.9794 27.6726 28.9794C23.5986 28.9794 19.2939 27.442 16.6036 26.2121C15.3737 23.5986 13.8363 19.294 13.8363 15.22C13.8363 19.294 12.2989 23.5986 11.069 26.289C8.37865 27.442 4.07402 29.0563 0 29.0563C4.07402 29.0563 8.37865 30.5936 11.069 31.8235C12.2989 34.4371 13.8363 38.7417 13.8363 42.8926C13.8363 38.7417 15.3737 34.4371 16.6036 31.7467Z"
                                    fill="currentcolor" />
                            </svg>
                            {{ __('Our Feature Services') }}
                        </span>
                        <h2 class="title">{{ __('Providing the Best Services for Our') }}
                            <span>{{ __('Customers') }}
                                <svg viewBox="0 0 173 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M2 22.9998C8.5 14.2152 90 -14 172 14.2148" stroke-width="3" />
                                </svg>
                            </span>
                        </h2>
                    </div>
                </div>
            </div>
            <div class="services-item-wrap">
                <div class="row">
                    @foreach ($feature_services as $service)
                        <div class="col-xl-4 col-md-6">
                            <div class="services-item">
                                <div class="services-bg-shape">
                                    <svg viewBox="0 0 375 240" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M16.1665 159.578C16.0105 165.687 11.1242 169.917 5.61408 171.118C8.2132 172.58 10.5004 174.512 12.4757 176.601C16.4784 180.987 17.9339 187.096 17.726 192.893C17.57 198.637 14.0352 205.007 9.77266 208.61C8.94095 209.289 8.10923 209.916 7.27752 210.438C7.48544 211.117 7.64139 211.796 7.74536 212.474C11.3321 215.085 13.4634 219.733 13.3594 224.119C13.3075 225.79 12.9436 227.304 12.2678 228.662C12.3718 228.714 12.4757 228.766 12.5797 228.819C13.5154 224.746 16.0105 220.725 19.0255 218.166C22.9762 214.824 27.7585 213.675 32.8008 213.675C37.947 213.675 42.7294 216.808 46.1083 220.464C49.5391 224.171 50.7347 229.393 50.5787 234.301C50.5787 234.301 50.5787 234.301 50.5787 234.354C51.6184 232.735 52.866 231.273 54.2175 230.124C58.0122 226.887 62.5866 225.79 67.473 225.79C71.5796 225.79 75.1663 227.409 77.9734 229.967C79.2729 227.879 80.8324 226.051 82.4958 224.641C87.1742 220.673 92.7363 219.367 98.7143 219.367C104.744 219.367 110.41 223.075 114.361 227.356C115.816 228.975 116.96 230.803 117.792 232.787C121.638 229.811 126.109 228.819 130.891 228.819C136.038 228.819 140.82 231.952 144.199 235.607C145.03 236.547 145.758 237.539 146.33 238.635C149.241 236.286 152.568 234.771 156.259 234.093C158.182 233.988 160.105 233.884 162.029 233.779C164.628 233.884 167.019 234.51 169.254 235.659C169.566 234.876 169.93 234.093 170.398 233.361C171.385 230.907 172.893 228.871 175.024 227.2C176.948 225.477 179.131 224.328 181.574 223.753C183.861 222.813 186.304 222.448 188.852 222.709H189.475C192.958 222.97 196.077 224.067 198.988 226.051C200.288 227.2 201.535 228.349 202.835 229.55C205.018 232.16 206.422 235.137 207.045 238.479C207.097 238.949 207.097 239.419 207.149 239.941C209.748 237.696 213.283 236.39 216.766 236.39C219.833 236.39 222.484 237.696 224.459 239.732C224.667 239.523 224.875 239.314 225.135 239.158C229.814 235.189 235.376 233.884 241.354 233.884C243.173 233.884 244.992 234.249 246.708 234.824C248.059 230.646 250.71 226.625 253.777 224.015C258.456 220.046 264.018 218.74 269.996 218.74C276.026 218.74 281.692 222.448 285.642 226.73C287.826 229.132 289.229 232.056 290.061 235.137C292.556 231.429 297.183 229.289 301.757 229.289C304.148 229.289 306.279 230.124 308.047 231.429C308.047 231.273 308.047 231.116 308.047 230.959C308.203 226.103 311.166 220.673 314.805 217.592C318.755 214.25 323.538 213.101 328.58 213.101C333.726 213.101 338.508 216.234 341.887 219.889C341.991 219.994 342.095 220.15 342.199 220.255C342.199 219.889 342.147 219.524 342.199 219.158C342.355 213.049 347.241 208.819 352.752 207.618C348.697 203.702 346.306 197.853 346.462 192.318C346.618 187.619 349.477 182.449 352.96 179.473C355.143 177.593 357.586 176.444 360.185 175.817C359.041 173.102 358.47 170.178 358.522 167.306C358.574 165.739 358.937 164.068 359.509 162.502C355.767 161.458 352.388 159.003 349.841 156.184C346.41 152.476 345.214 147.254 345.37 142.346C345.526 137.49 348.489 132.059 352.128 128.978C355.663 125.949 359.873 124.748 364.344 124.54C361.017 120.728 359.145 115.506 359.301 110.493C359.405 106.368 361.641 101.877 364.552 98.8484C360.133 98.2217 356.026 95.402 353.063 92.1645C349.633 88.457 348.437 83.2352 348.593 78.3268C348.749 73.4705 351.712 68.0398 355.351 64.959C359.301 61.617 364.084 60.4683 369.126 60.4683C370.01 60.4683 370.893 60.5727 371.725 60.7293C367.099 56.8652 364.396 50.5469 364.552 44.594C364.708 39.8944 367.567 34.7249 371.049 31.7484C372.297 30.7041 373.648 29.8686 375 29.242C373.233 27.6232 371.725 25.639 370.633 23.4458C370.01 23.498 369.386 23.498 368.762 23.498C363.616 23.498 358.834 20.365 355.455 16.7097C353.999 15.091 352.908 13.2111 352.18 11.1746C351.088 13.1067 349.633 14.8299 348.125 16.1353C344.33 19.3728 339.756 20.4694 334.87 20.4694C324.733 20.4694 317.768 10.4958 317.768 1.20101C315.74 6.10949 310.334 9.03368 304.98 9.03368C303.005 9.03368 301.185 8.45929 299.626 7.51937C298.43 10.2869 296.559 12.8456 294.479 14.621C290.685 17.8585 286.11 18.9551 281.224 18.9551C272.179 18.9551 265.681 10.9657 264.382 2.66311C262.874 3.39416 261.263 3.96855 259.547 4.28186C257.988 4.3863 256.428 4.43852 254.817 4.54295C254.401 4.54295 254.037 4.49073 253.621 4.43852C253.621 4.96069 253.621 5.48287 253.517 6.05727V6.68388C253.258 10.1825 252.166 13.3155 250.191 16.2397C249.047 17.5452 247.903 18.7984 246.708 20.1039C244.109 22.297 241.146 23.7069 237.819 24.3335C236.207 24.4379 234.544 24.5424 232.932 24.5946C230.333 24.4902 227.942 23.7591 225.759 22.4015C223.316 21.4093 221.288 19.895 219.625 17.7541C217.91 15.822 216.766 13.6289 216.194 11.1746C215.882 10.4436 215.674 9.76473 215.518 9.03368C210.06 8.72038 205.59 5.53509 202.731 1.14879C201.795 1.09657 200.859 1.09657 199.924 1.04436C199.664 1.09657 199.456 1.20101 199.196 1.25323C198 1.72319 196.805 2.08871 195.557 2.24537C195.557 2.29758 195.557 2.29758 195.557 2.3498C195.349 9.60808 188.592 14.2033 181.938 14.2033C175.7 14.2033 171.23 8.72038 170.294 3.02863C169.93 3.39416 169.566 3.70747 169.202 4.02077C165.408 7.25828 160.833 8.35485 155.947 8.35485C155.323 8.35485 154.699 8.30264 154.127 8.25042C152.672 11.1224 150.697 13.6811 148.461 15.5609C143.783 19.5295 138.221 20.8349 132.243 20.8349C126.213 20.8349 120.547 17.1274 116.596 12.8456C116.076 12.2712 115.609 11.6446 115.141 11.018C113.685 11.2791 112.178 11.3835 110.67 11.3835C106.408 11.3835 102.717 9.60808 99.8579 6.84054C99.8059 6.84054 99.7539 6.89275 99.65 6.89275C97.6747 7.72824 95.6473 7.98933 93.4641 7.78046H92.6843C89.7214 7.57159 87.0703 6.63166 84.6271 4.96069C84.3672 4.6996 84.0553 4.43852 83.7954 4.17743C80.4685 6.84054 76.5179 7.78046 72.3593 7.78046C71.1637 7.78046 69.9681 7.6238 68.8765 7.3105C67.7329 9.19034 66.3294 10.9135 64.8219 12.219C60.8712 15.5609 56.0889 16.7097 51.0466 16.7097C45.9003 16.7097 41.118 13.5766 37.7391 9.92139C35.296 7.04941 33.9964 3.55081 33.5286 0C31.1374 1.51432 28.2783 2.40202 25.4193 2.40202C23.7039 2.40202 22.0925 1.98428 20.637 1.25323C20.2211 6.7361 16.8423 12.6367 12.7357 16.1353C10.7083 17.8585 8.52509 19.0595 6.18589 19.895C9.30482 21.096 12.1638 23.2892 14.3991 25.6912C17.8299 29.3986 19.0255 34.6204 18.8696 39.5289C18.7136 44.3852 15.7506 49.8158 12.1119 52.8967C10.7083 54.0455 9.25284 54.9854 7.69337 55.6642C7.69337 55.7164 7.74536 55.7164 7.74536 55.7686C8.88897 57.0219 9.6687 58.484 10.0326 60.1027C10.6564 61.617 10.9163 63.2358 10.7083 64.9068V66.8388C10.5524 69.1364 9.82465 71.2251 8.52509 73.1572C8.36914 73.3661 8.16121 73.5749 8.00527 73.7316C9.35681 74.7237 10.6044 75.8725 11.696 77.2824C13.7233 79.5278 15.0749 82.0864 15.7506 85.0106C16.8942 87.726 17.3101 90.5979 16.9462 93.5744V94.3576C16.6343 98.4306 15.3348 102.19 13.0475 105.584C12.3198 106.368 11.644 107.151 10.9163 107.934C13.3594 110.597 14.763 114.357 14.659 117.908C14.503 123.443 10.5004 127.464 5.66607 129.03C5.87399 129.552 6.08192 130.075 6.18589 130.649C6.80967 132.163 7.06959 133.782 6.86166 135.453V136.08C6.70571 138.377 5.97796 140.466 4.6784 142.398L2.39118 144.957C1.61145 145.583 0.831716 146.105 0 146.575C1.40352 146.158 2.91101 145.897 4.41849 145.897C11.4881 145.897 16.3224 153.05 16.1665 159.578Z"
                                            fill="currentcolor" />
                                    </svg>
                                </div>
                                <div class="services-content">
                                    <div class="services-content-top">
                                        <div class="icon">
                                            <img data-src="{{ showPhoto($service->feature_icon) }}" width="40"
                                                class="lazy rounded-circle" alt="">
                                        </div>
                                        <h2 class="title"><a
                                                href="{{ route('front.service.details', $service->slug) }}">{{ $service->title }}</a>
                                        </h2>
                                    </div>
                                    <p>
                                       {{$service->sort_text}}
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach


                </div>
            </div>
        </div>
    </section>
    <!-- services-area-end -->

    <!-- team-area -->
    <section class="team-area has-animation pt-125 pb-100">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-8">
                    <div class="section-title mb-100">
                        <span class="sub-title">
                            <svg viewBox="0 0 41 44" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M35.2826 37.5886C36.6662 36.9737 38.8185 36.205 40.8939 36.205C38.8185 36.205 36.6662 35.4363 35.2826 34.8213C34.6676 33.4377 33.8989 31.2854 33.8989 29.21C33.8989 31.2854 33.1303 33.4377 32.5153 34.8213C31.1317 35.4363 28.9794 36.205 26.9039 36.205C28.9794 36.205 31.1317 36.9737 32.5153 37.5886C33.1303 38.9722 33.8989 41.1246 33.8989 43.2C33.8989 41.1246 34.6676 38.9722 35.2826 37.5886Z"
                                    fill="currentcolor" />
                                <path
                                    d="M31.2085 13.5288C33.4377 12.5295 36.8968 11.2996 40.279 11.2996C36.8968 11.2996 33.4377 10.0698 31.2085 9.07046C30.2093 6.84128 28.9794 3.38221 28.9794 0C28.9794 3.38221 27.7495 6.84128 26.7502 9.07046C24.521 10.0698 21.0619 11.2996 17.6797 11.2996C21.0619 11.2996 24.521 12.5295 26.7502 13.5288C27.7495 15.758 28.9794 19.2171 28.9794 22.5993C28.9794 19.2171 30.2093 15.758 31.2085 13.5288Z"
                                    fill="currentcolor" />
                                <path
                                    d="M16.6036 31.7467C19.2939 30.5936 23.5986 28.9794 27.6726 28.9794C23.5986 28.9794 19.2939 27.442 16.6036 26.2121C15.3737 23.5986 13.8363 19.294 13.8363 15.22C13.8363 19.294 12.2989 23.5986 11.069 26.289C8.37865 27.442 4.07402 29.0563 0 29.0563C4.07402 29.0563 8.37865 30.5936 11.069 31.8235C12.2989 34.4371 13.8363 38.7417 13.8363 42.8926C13.8363 38.7417 15.3737 34.4371 16.6036 31.7467Z"
                                    fill="currentcolor" />
                            </svg>
                            {{ __('We’ve Team Members') }}
                        </span>
                        <h2 class="title">{{ __('Meet Our Experienced &') }}
                            <span>{{ __('Professional') }}
                                <svg viewBox="0 0 173 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M2 22.9998C8.5 14.2152 90 -14 172 14.2148" stroke-width="3" />
                                </svg>
                            </span>
                            {{ __('Team') }}
                        </h2>
                    </div>
                </div>
                <div class="col-lg-6 col-md-4">
                    <div class="all-btn text-end mb-50">
                        <a href="{{route('front.team')}}" class="btn">{{ __('see all') }}</a>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                @foreach ($teams as $team)
                    <div class="col-lg-4 col-md-6 col-sm-9">
                        <div class="team-item">
                            <div class="team-thumb">
                                <a href="{{route('front.team.details',$team->slug)}}"><img class="lazy" data-src="{{ showPhoto($team->photo) }}" alt=""></a>
                            </div>
                            <div class="team-content">
                                <h3 class="title"><a href="{{route('front.team.details',$team->slug)}}">{{ $team->name }}</a></h3>
                                <span>{{ $team->designation }}</span>
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

    <!-- counter-area -->
    <section class="counter-area">
        <div class="container">
            <div class="counter-inner jarallax lazy" data-background="{{ showPhoto($gs->counter_photo) }}">
                <div class="row">
                    @foreach ($counters as $counter)
                        <div class="col-lg-3 col-sm-6">
                            <div class="counter-item">
                                <div class="icon">
                                    <i class="{{ $counter->icon }} fa-4x text-success"></i>
                                </div>
                                <div class="content">
                                    <h2 class="count"><span class="odometer"
                                            data-count="{{ $counter->counter_number }}"></span>+</h2>
                                    <p>{{ $counter->title }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- counter-area-end -->

    <!-- project-area -->
    <section class="project-area has-animation project-bg">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="section-title text-center white-title mb-75">
                        <span class="sub-title">
                            <svg viewBox="0 0 41 44" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M35.2826 37.5886C36.6662 36.9737 38.8185 36.205 40.8939 36.205C38.8185 36.205 36.6662 35.4363 35.2826 34.8213C34.6676 33.4377 33.8989 31.2854 33.8989 29.21C33.8989 31.2854 33.1303 33.4377 32.5153 34.8213C31.1317 35.4363 28.9794 36.205 26.9039 36.205C28.9794 36.205 31.1317 36.9737 32.5153 37.5886C33.1303 38.9722 33.8989 41.1246 33.8989 43.2C33.8989 41.1246 34.6676 38.9722 35.2826 37.5886Z"
                                    fill="currentcolor" />
                                <path
                                    d="M31.2085 13.5288C33.4377 12.5295 36.8968 11.2996 40.279 11.2996C36.8968 11.2996 33.4377 10.0698 31.2085 9.07046C30.2093 6.84128 28.9794 3.38221 28.9794 0C28.9794 3.38221 27.7495 6.84128 26.7502 9.07046C24.521 10.0698 21.0619 11.2996 17.6797 11.2996C21.0619 11.2996 24.521 12.5295 26.7502 13.5288C27.7495 15.758 28.9794 19.2171 28.9794 22.5993C28.9794 19.2171 30.2093 15.758 31.2085 13.5288Z"
                                    fill="currentcolor" />
                                <path
                                    d="M16.6036 31.7467C19.2939 30.5936 23.5986 28.9794 27.6726 28.9794C23.5986 28.9794 19.2939 27.442 16.6036 26.2121C15.3737 23.5986 13.8363 19.294 13.8363 15.22C13.8363 19.294 12.2989 23.5986 11.069 26.289C8.37865 27.442 4.07402 29.0563 0 29.0563C4.07402 29.0563 8.37865 30.5936 11.069 31.8235C12.2989 34.4371 13.8363 38.7417 13.8363 42.8926C13.8363 38.7417 15.3737 34.4371 16.6036 31.7467Z"
                                    fill="currentcolor" />
                            </svg>
                            {{ __('Our Successful Project') }}
                        </span>
                        <h2 class="title">{{ __('Keep your Vision to Our Latest') }}
                            <span>{{ __('Projects') }}
                                <svg viewBox="0 0 173 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M2 22.9998C8.5 14.2152 90 -14 172 14.2148" stroke-width="3" />
                                </svg>
                            </span>
                        </h2>
                    </div>
                </div>
            </div>
            <div class="project-item-wrap">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="swiper-container project-active">
                            <div class="swiper-wrapper">
                                @foreach ($projects as $project)
                                    <div class="swiper-slide">
                                        <div class="project-item">
                                            <div class="project-thumb">
                                                <a href="{{route('front.project.details',$project->slug)}}"><img class="lazy" data-src="{{ showPhoto($project->photo) }}"
                                                        alt=""></a>
                                            </div>
                                            <div class="project-content">
                                                <h2 class="title"><a
                                                        href="{{route('front.project.details',$project->slug)}}">{{ $project->title }}</a>
                                                </h2>
                                                <span>{{ $project->category->name }}</span>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="project-swiper-pagination"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- project-area-end -->

    <!-- testimonial-area -->
    <section class="testimonial-area has-animation pt-125 pb-100">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5 col-md-7">
                    <div class="section-title mb-85">
                        <span class="sub-title">
                            <svg viewBox="0 0 41 44" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M35.2826 37.5886C36.6662 36.9737 38.8185 36.205 40.8939 36.205C38.8185 36.205 36.6662 35.4363 35.2826 34.8213C34.6676 33.4377 33.8989 31.2854 33.8989 29.21C33.8989 31.2854 33.1303 33.4377 32.5153 34.8213C31.1317 35.4363 28.9794 36.205 26.9039 36.205C28.9794 36.205 31.1317 36.9737 32.5153 37.5886C33.1303 38.9722 33.8989 41.1246 33.8989 43.2C33.8989 41.1246 34.6676 38.9722 35.2826 37.5886Z"
                                    fill="currentcolor" />
                                <path
                                    d="M31.2085 13.5288C33.4377 12.5295 36.8968 11.2996 40.279 11.2996C36.8968 11.2996 33.4377 10.0698 31.2085 9.07046C30.2093 6.84128 28.9794 3.38221 28.9794 0C28.9794 3.38221 27.7495 6.84128 26.7502 9.07046C24.521 10.0698 21.0619 11.2996 17.6797 11.2996C21.0619 11.2996 24.521 12.5295 26.7502 13.5288C27.7495 15.758 28.9794 19.2171 28.9794 22.5993C28.9794 19.2171 30.2093 15.758 31.2085 13.5288Z"
                                    fill="currentcolor" />
                                <path
                                    d="M16.6036 31.7467C19.2939 30.5936 23.5986 28.9794 27.6726 28.9794C23.5986 28.9794 19.2939 27.442 16.6036 26.2121C15.3737 23.5986 13.8363 19.294 13.8363 15.22C13.8363 19.294 12.2989 23.5986 11.069 26.289C8.37865 27.442 4.07402 29.0563 0 29.0563C4.07402 29.0563 8.37865 30.5936 11.069 31.8235C12.2989 34.4371 13.8363 38.7417 13.8363 42.8926C13.8363 38.7417 15.3737 34.4371 16.6036 31.7467Z"
                                    fill="currentcolor" />
                            </svg>
                            {{ __('What They’re Saying') }}
                        </span>
                        <h2 class="title">{{ __('Some Feed backs from Our') }}
                            <span>{{ _('Customers') }}
                                <svg viewBox="0 0 173 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M2 22.9998C8.5 14.2152 90 -14 172 14.2148" stroke-width="3" />
                                </svg>
                            </span>
                        </h2>
                    </div>
                </div>
                <div class="col-lg-7 col-md-5">
                    <div class="testimonial-nav"></div>
                </div>
            </div>
            <div class="row testimonial-active">
                @foreach ($testimonials as $testimonial)
                    <div class="col-lg-6">
                        <div class="testimonial-item">
                            <div class="testimonial-icon">
                                <i class="fas fa-quote-right"></i>
                            </div>
                            <div class="testimonial-content">
                                <p>{{ $testimonial->message }}
                                </p>
                                <div class="testimonial-avatar-info">
                                    <div class="avatar-thumb">
                                        <img class="lazy" data-src="{{ showPhoto($testimonial->photo) }}" alt="">
                                    </div>
                                    <div class="avatar-content">
                                        <h2 class="title">{{ $testimonial->name }}</h2>
                                        <p>{{ $testimonial->designation }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- testimonial-area-end -->

    <!-- brand-area -->
    <div class="brand-area pb-130">
        <div class="container">
            <div class="row brand-active">
                @foreach ($brands as $brand)
                    <div class="col-12">
                        <div class="brand-item">
                            <img class="lazy" data-src="{{ showPhoto($brand->photo) }}" title="{{ $brand->title }}"
                                alt="{{ $brand->title }}">
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- brand-area-end -->

    <!-- contact-area -->
    <section class="contact-area contact-bg has-animation jarallax"
        style="background-image: url({{ showPhoto($gs->contact_section_photo) }})">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="contact-inner">
                        <div class="section-title mb-65">
                            <span class="sub-title">
                                <svg viewBox="0 0 41 44" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M35.2826 37.5886C36.6662 36.9737 38.8185 36.205 40.8939 36.205C38.8185 36.205 36.6662 35.4363 35.2826 34.8213C34.6676 33.4377 33.8989 31.2854 33.8989 29.21C33.8989 31.2854 33.1303 33.4377 32.5153 34.8213C31.1317 35.4363 28.9794 36.205 26.9039 36.205C28.9794 36.205 31.1317 36.9737 32.5153 37.5886C33.1303 38.9722 33.8989 41.1246 33.8989 43.2C33.8989 41.1246 34.6676 38.9722 35.2826 37.5886Z"
                                        fill="currentcolor" />
                                    <path
                                        d="M31.2085 13.5288C33.4377 12.5295 36.8968 11.2996 40.279 11.2996C36.8968 11.2996 33.4377 10.0698 31.2085 9.07046C30.2093 6.84128 28.9794 3.38221 28.9794 0C28.9794 3.38221 27.7495 6.84128 26.7502 9.07046C24.521 10.0698 21.0619 11.2996 17.6797 11.2996C21.0619 11.2996 24.521 12.5295 26.7502 13.5288C27.7495 15.758 28.9794 19.2171 28.9794 22.5993C28.9794 19.2171 30.2093 15.758 31.2085 13.5288Z"
                                        fill="currentcolor" />
                                    <path
                                        d="M16.6036 31.7467C19.2939 30.5936 23.5986 28.9794 27.6726 28.9794C23.5986 28.9794 19.2939 27.442 16.6036 26.2121C15.3737 23.5986 13.8363 19.294 13.8363 15.22C13.8363 19.294 12.2989 23.5986 11.069 26.289C8.37865 27.442 4.07402 29.0563 0 29.0563C4.07402 29.0563 8.37865 30.5936 11.069 31.8235C12.2989 34.4371 13.8363 38.7417 13.8363 42.8926C13.8363 38.7417 15.3737 34.4371 16.6036 31.7467Z"
                                        fill="currentcolor" />
                                </svg>
                                {{ $gs->contact_section_header_title }}
                            </span>
                            @php
                                $contact_section_title = explode(' ', $gs->contact_section_title);
                                $contact_section_title_last_word = array_slice($contact_section_title, count($contact_section_title) - 1, 1);
                                unset($contact_section_title[count($contact_section_title) - 1]);
                                $contact_section_title = implode(' ', $contact_section_title);
                                $last_word = implode(' ', $contact_section_title_last_word);
                            @endphp
                            <h2 class="title">{{ $contact_section_title }}
                                <span>{{ $last_word }}
                                    <svg viewBox="0 0 173 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M2 22.9998C8.5 14.2152 90 -14 172 14.2148" stroke-width="3" />
                                    </svg>
                                </span>
                            </h2>
                        </div>
                        <form action="{{ route('front.gettuch.submit') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-grp">
                                        <input type="text" name="name" placeholder="{{ __('Full name') }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-grp">
                                        <input type="email" name="email" placeholder="{{ __('Your email') }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-grp">
                                        <input type="text" name="phone" placeholder="{{ __('Phone number') }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-grp">
                                        <select id="shortBy" name="service_id" class="form-select">
                                            <option value="">@lang('Select Service')</option>
                                            @foreach (DB::table('services')->whereStatus(1)->get() as $cservice)
                                                <option value="{{ $cservice->id }}">{{ $cservice->title }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-grp">
                                <textarea name="message" placeholder="{{ __('Write a message') }}"></textarea>
                            </div>
                            <button type="submit" class="btn">{{ __('Send a message') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- contact-area-end -->

    <!-- blog-area -->
    <section class="blog-area has-animation pt-125 pb-95">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-5 col-lg-6">
                    <div class="section-title text-center mb-80">
                        <span class="sub-title">
                            <svg viewBox="0 0 41 44" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M35.2826 37.5886C36.6662 36.9737 38.8185 36.205 40.8939 36.205C38.8185 36.205 36.6662 35.4363 35.2826 34.8213C34.6676 33.4377 33.8989 31.2854 33.8989 29.21C33.8989 31.2854 33.1303 33.4377 32.5153 34.8213C31.1317 35.4363 28.9794 36.205 26.9039 36.205C28.9794 36.205 31.1317 36.9737 32.5153 37.5886C33.1303 38.9722 33.8989 41.1246 33.8989 43.2C33.8989 41.1246 34.6676 38.9722 35.2826 37.5886Z"
                                    fill="currentcolor" />
                                <path
                                    d="M31.2085 13.5288C33.4377 12.5295 36.8968 11.2996 40.279 11.2996C36.8968 11.2996 33.4377 10.0698 31.2085 9.07046C30.2093 6.84128 28.9794 3.38221 28.9794 0C28.9794 3.38221 27.7495 6.84128 26.7502 9.07046C24.521 10.0698 21.0619 11.2996 17.6797 11.2996C21.0619 11.2996 24.521 12.5295 26.7502 13.5288C27.7495 15.758 28.9794 19.2171 28.9794 22.5993C28.9794 19.2171 30.2093 15.758 31.2085 13.5288Z"
                                    fill="currentcolor" />
                                <path
                                    d="M16.6036 31.7467C19.2939 30.5936 23.5986 28.9794 27.6726 28.9794C23.5986 28.9794 19.2939 27.442 16.6036 26.2121C15.3737 23.5986 13.8363 19.294 13.8363 15.22C13.8363 19.294 12.2989 23.5986 11.069 26.289C8.37865 27.442 4.07402 29.0563 0 29.0563C4.07402 29.0563 8.37865 30.5936 11.069 31.8235C12.2989 34.4371 13.8363 38.7417 13.8363 42.8926C13.8363 38.7417 15.3737 34.4371 16.6036 31.7467Z"
                                    fill="currentcolor" />
                            </svg>
                            {{ __('Latest News & Articles') }}
                        </span>
                        <h2 class="title">{{ __('Learn More from Our') }}
                            <span>{{ __('Blog') }}
                                <svg viewBox="0 0 80 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M2 16C4.94412 10.1497 41.8588 -8.64057 79 10.1495" stroke-width="3" />
                                </svg>
                            </span>
                            {{ __('Posts') }}
                        </h2>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center">
                @foreach ($blogs as $blog)
                    <div class="col-lg-4 col-md-6">
                        <div class="blog-post-item">
                            <div class="blog-post-thumb">
                                <a href="{{route('front.blog.details',$blog->slug)}}"><img class="lazy" src="{{ showPhoto($blog->photo) }}" alt=""></a>
                                <a href="blog.html" class="tag">{{ $blog->category->name }}</a>
                            </div>
                            <div class="blog-post-content">
                                <div class="blog-meta">
                                    <ul class="list-wrap">
                                        <li><i class="fas fa-calendar-alt"></i>{{ dateFormat($blog->created_at) }}</li>
                                        <li><i class="far fa-user"></i><a href="blog.html">{{ __('Admin') }}</a></li>
                                    </ul>
                                </div>
                                <h2 class="title"><a href="{{route('front.blog.details',$blog->slug)}}">{{ $blog->title }} </a></h2>
                                <p>
                                    {{ Str::limit($blog->content, 100) }}
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- blog-area-end -->
@endsection
