<!DOCTYPE html>
<html class="no-js" lang="">

@php
    $site_settings = \App\Models\Setting::first();
@endphp

<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>{{ $site_settings->website_name ?? '' }}</title>
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('frontend/img/favicon.png') }}" />

    <!-- CSS here -->
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/css/bootstrap.min.css'>
    
    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/css/animate.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/css/magnific-popup.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/css/fontawesome-all.min.css') }}" /> 
    <link rel="stylesheet" href="{{ asset('frontend/css/jquery-ui.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/css/flaticon.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/css/odometer.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/css/slick.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/css/default.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/css/responsive.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap-a.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/css/style-ar.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/css/edits.css') }}" />
    <link rel="stylesheet" href="{{ asset('dashboard_offline/css/bootstrap-datetimepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dashboard_offline/css/dropzone.min.css') }}"> 
    @yield('styles')
</head>

<body>
    <!-- preloader -->
    <div id="preloader">
        <div id="loading-center">
            <div class="loader">
                <div class="loader-outter"></div>
                <div class="loader-inner"></div>
            </div>
        </div>
    </div>
    <!-- preloader-end -->

    <!-- Scroll-top -->
    <button class="scroll-top scroll-to-target" data-target="html">
        <i class="fas fa-angle-up"></i>
    </button>
    <!-- Scroll-top-end-->

    <!-- header-area -->
    <header class="transparent-header header-style-one">
        <div class="header-top-wrap">
            <div class="container custom-container">
                <div class="row align-items-center">
                    <div class="col-lg-4 col-sm-6 d-none d-sm-block">
                        <div class="header-top-left navbar-wrap">
                            <ul> 
                                <li class="dropdown e-services">
                                    <div class="btn">الخدمات الإلكترونية <img src="http://design.daam.org.sa/public/frontend/img/people.png" /></div>
                                    <ul class="submenu">
                                        <li><a href="{{ route('login') }}">تسجيل الدخول</a></li>
                                        <li><a
                                                href="https://charities-sys.com/index.aspx?Ref=up5813ujajmpkrte4hyyaftdethvkihzozxdnz2r">دخول
                                                المستفيدات</a></li>
                                        <li><a href="https://charities-sys.com/charity/Login.aspx">دخول الادارة</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 d-none d-lg-block">
                        <div class="logo text-center">
                            <a href="{{ route('home') }}"><img
                                    src="{{ $site_settings->logo ? $site_settings->logo->getUrl() : '' }}"
                                    alt="" /></a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <div class="header-top-right">
                            <div class="login dropdown" onmouseover="toggleDropdown(true)"
                                onmouseout="toggleDropdown(false)">
                                <a href="#">
                                    <img src="img/online-learning.png" alt=""> المشاركات  
                                </a>
                                <ul id="dropdownList" class="hidden" onmouseover="cancelHide()"
                                    onmouseout="hideDropdown()">
                                    <li><a href="{{ route('frontend.courses') }}"> الدورات</a></li>
                                    <li><a href="{{ route('frontend.posts', 'events') }}"> الفعاليات والانشطة</a></li> 
                                    <!-- Add more list items as needed -->
                                </ul>
                            </div>

                            <div class="login">
                                <a href="https://daamj.sa" target="_blanc"><img src="{{ asset('frontend/img/shopping-cart.png') }}"
                                        alt="" /></a>
                            </div>
                            <div class="login"> 
                                <a href="{{ route('frontend.reviews') }}">
                                    <div class="btn"> تقييم المستفيدين</div> 
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="main-header menu-area">
            <div class="container custom-container">
                <div class="row">
                    <div class="col-12">
                        <div class="mobile-nav-toggler"><i class="fas fa-bars"></i></div>
                        <div class="menu-wrap">
                            <nav class="menu-nav show">
                                <div class="logo d-none">
                                    <a href="{{ route('home') }}"><img
                                            src="{{ asset('frontend/img/logo/w_logo.png') }}" alt="Logo" /></a>
                                </div>
                                <div class="navbar-wrap main-menu d-none d-lg-flex">
                                    <ul class="navigation">
                                        <li class="@if(request()->is("/")) active @endif"><a href="{{ route('home') }}">الرئيسية</a></li>
                                        <li class="dropdown @if(request()->is("about") || request()->is("chairman")) active @endif">
                                            <a href="#">عن الجمعية</a>
                                            <ul class="submenu">
                                                <li><a href="{{ route('frontend.about') }}"> عن دعم</a></li>
                                                <li><a href="{{ route('frontend.chairman') }}"> كلمة رئيس مجلس
                                                        الأدارة</a></li>
                                                <li><a href="{{ route('frontend.identity') }}"> الملف التعريفي</a></li>
                                            </ul>
                                        </li>
                                        <li class="dropdown @if(request()->is("hawkma/*")) active @endif">
                                            <a href="#">الحوكمة</a>
                                            <ul class="submenu">
                                                @foreach (\App\Models\HawkamCategory::all() as $category)
                                                    <li><a
                                                            href="{{ route('frontend.hawkma', $category->id) }}">{{ $category->name }}</a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </li>
                                        <li class="dropdown @if(request()->is("reports/*")) active @endif">
                                            <a href="#">التقارير</a>
                                            <ul class="submenu">
                                                @foreach (\App\Models\Report::TYPE_SELECT as $key => $label)
                                                    <li><a
                                                            href="{{ route('frontend.reports', $key) }}">{{ $label }}</a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </li>
                                        <li class="dropdown  @if(request()->is("terms")) active @endif">
                                            <a href="#">وحدة الأسكان التنموي</a>
                                            <ul class="submenu">
                                                <li><a
                                                        href="{{ $site_settings->iskan_info ? $site_settings->iskan_info->getUrl() : '' }}">
                                                        عن وحدة الأسكان التنموي </a></li>
                                                <li><a
                                                        href="{{ route('frontend.jood') }}">
                                                        ماهو جود الأسكان</a></li>
                                                <li><a
                                                        href="{{ route('frontend.video') }}">
                                                        طريقة التقديم </a></li>
                                                <li><a href="{{ route('frontend.terms') }}"> شروط التسجيل </a></li>
                                            </ul>
                                        </li>
                                        <li class="dropdown @if(request()->is("volunteer-guide") || request()->is("volunteer")) active @endif">
                                            <a href="#">وحدة التطوع</a>
                                            <ul class="submenu">
                                                <li><a href="{{ route('frontend.volunteer_guide') }}"> أدلة التطوع</a>
                                                </li>
                                                <li><a href="{{ route('frontend.volunteer') }}">انضم كمتطوع</a></li>
                                            </ul>
                                        </li>

                                        <li class="dropdown @if(request()->is("posts/news") || request()->is("posts/tkremat") || request()->is("posts/projects") || request()->is("posts/studies") || request()->is("post/*")) active @endif">
                                            <a href="#">المركز الإعلامي</a>
                                            <ul class="submenu">
                                                <li><a href="{{ route('frontend.posts', 'news') }}"> الأخبار </a></li>
                                                <li><a href="{{ route('frontend.posts', 'tkremat') }}"> التكريمات </a>
                                                </li>
                                                <li><a href="{{ route('frontend.posts', 'studies') }}">  
                                                        الدراسات والأصدارات</a></li> 
                                                <li><a href="{{ route('frontend.projects') }}">  
                                                    مشاريع دعم</a></li>
                                            </ul>
                                        </li>

                                        <li class="dropdown @if(request()->is("members/active") || request()->is("members/associate")) active @endif">
                                            <a href="#">  انضم ألينا</a>
                                            <ul class="submenu">
                                                <li><a href="{{ route('frontend.members', 'active') }}"> عضو عامل </a>
                                                </li>
                                                <li><a href="{{ route('frontend.members', 'associate') }}"> عضو منتسب
                                                    </a></li>
                                            </ul>
                                        </li>
                                        <li href="#">   <a href="{{ route('frontend.posts', 'blog') }}">المدونة</a></li>
                                        <li class="dropdown @if(request()->is("contacts/contact") || request()->is("contacts/suggest") || request()->is("contacts/complaints")) active @endif">
                                            <a href="#"> صوتك مسموع</a>
                                            <ul class="submenu">
                                                <li><a href="{{ route('frontend.contacts','contact') }}"> تواصل معنا </a></li>
                                                <li><a href="{{ route('frontend.contacts','suggest') }}"> الشكاوى والمقترحات</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </nav>
                        </div>
                        <!-- Mobile Menu  -->
                        <div class="mobile-menu">
                            <div class="menu-backdrop"></div>
                            <div class="close-btn"><i class="far fa-times"></i></div>

                            <nav class="menu-box">
                                <div class="nav-logo">
                                    <a href="{{ route('home') }}"><img
                                            src="{{ $site_settings->logo ? $site_settings->logo->getUrl() : '' }}"
                                            alt="" title="" /></a>
                                </div>
                                <div class="menu-outer">
                                    <!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header-->
                                </div>
                                <div class="social-links">
                                    <ul class="clearfix">
                                        @if ($site_settings->twitter)
                                            <li>
                                                <a href="{{ $site_settings->twitter }}"><i
                                                        class="fab fa-twitter"></i></a>
                                            </li>
                                        @endif
                                        @if ($site_settings->facebook)
                                            <li>
                                                <a href="{{ $site_settings->facebook }}"><i
                                                        class="fab fa-facebook"></i></a>
                                            </li>
                                        @endif
                                        @if ($site_settings->instagram)
                                            <li>
                                                <a href="{{ $site_settings->instagram }}"><i
                                                        class="fab fa-instagram"></i></a>
                                            </li>
                                        @endif
                                        @if ($site_settings->whatsapp)
                                            <li>
                                                <a href="{{ $site_settings->whatsapp }}"><i
                                                        class="fab fa-whatsapp"></i></a>
                                            </li>
                                        @endif
                                    </ul>
                                </div>
                            </nav>
                        </div>
                        <!-- End Mobile Menu -->
                    </div>
                </div>
            </div>
            @isset($headline)
                @php 
                    $headline_items = headline_items();
                @endphp
                <div class="scrolling-container">
                    <div class="scrolling-content">
                        <div class="container">
                            <div class="holder">
                                @foreach($headline_items as $item)
                                    <a href="{{ $item->route }}" class="text-white d-inline mx-5" style="display: inline; color: #000000"> 
                                        {{  $item->title }}
                                    </a> 
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            @endisset
        </div> 
    </header>
    <!-- header-area-end -->

    <!-- main-area -->
    @yield('content')
    <!-- main-area-end -->

    <!-- footer-area -->

    <section class="newsletter-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="newsletter-wrap">
                        <div class="newsletter-content">
                            <div class="section-title">
                                <span class="sub-title">القائمه البريدية</span>
                                <h2 class="title">اشترك ليصلك جديدنا</h2>
                            </div>
                        </div>
                        <div class="newsletter-form">
                            <form action="{{ route('frontend.subscribe') }}" method="POST">
                                @csrf
                                <input type="email" name="email" placeholder="ضع ايميلك هنا" />
                                <button type="submit">
                                    <i class="far fa-envelope"></i> اشترك الان
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <footer>
        <div class="footer-area">
            <div class="footer-top footer-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4 col-md-5">
                            <div class="footer-widget wow fadeInUp" data-wow-delay=".2s">
                                <div class="fw-logo mb-30">
                                    <a href="{{ route('home') }}"><img
                                            src="{{ $site_settings->logo ? $site_settings->logo->getUrl() : '' }}"
                                            alt="" /></a>
                                </div>
                                <div class="footer-contact-list mb-30">
                                    <ul>
                                        <li>
                                            <div class="icon">
                                                <img src="{{ asset('frontend/img/icon/f_contact_icon01.png') }}"
                                                    alt="" />
                                            </div>
                                            <div class="content">
                                                <span>رقم الجوال</span>
                                                <a
                                                    href="tel:{{ $site_settings->phone_number }}">{{ $site_settings->phone_number }}</a>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="icon">
                                                <img src="{{ asset('frontend/img/icon/f_contact_icon02.png') }}"
                                                    alt="" />
                                            </div>
                                            <div class="content">
                                                <span>البريد الالكترونى</span>
                                                <a href="mailto:info@webmail.com">
                                                    {{ $site_settings->email }}</a>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="icon">
                                                <img src="{{ asset('frontend/img/icon/f_contact_icon03.png') }}"
                                                    alt="" />
                                            </div>
                                            <div class="content">
                                                <span>{{ $site_settings->address }}</span>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="footer-social">
                                    <ul>
                                        @if ($site_settings->twitter)
                                            <li>
                                                <a href="{{ $site_settings->twitter }}"><i
                                                        class="fab fa-twitter"></i></a>
                                            </li>
                                        @endif
                                        @if ($site_settings->facebook)
                                            <li>
                                                <a href="{{ $site_settings->facebook }}"><i
                                                        class="fab fa-facebook"></i></a>
                                            </li>
                                        @endif
                                        @if ($site_settings->instagram)
                                            <li>
                                                <a href="{{ $site_settings->instagram }}"><i
                                                        class="fab fa-instagram"></i></a>
                                            </li>
                                        @endif
                                        @if ($site_settings->whatsapp)
                                            <li>
                                                <a href="{{ $site_settings->whatsapp }}"><i
                                                        class="fab fa-whatsapp"></i></a>
                                            </li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-7">
                            <div class="footer-widget wow fadeInUp" data-wow-delay=".4s">
                                <h4 class="fw-title">روابط سريعة<span>.</span></h4>
                                <div class="footer-link">
                                    <ul>
                                        <li><a href="{{ route('frontend.about') }}">عن الجمعيه</a></li> 
                                        <li><a href="{{ route('frontend.projects') }}">مشاريعنا</a></li>
                                        <li><a href="{{ route('frontend.contacts','contact') }}">تواصل معنا</a></li> 
                                        <li><a href="{{ route('frontend.posts','events') }}"> الفعاليات والانشطة</a></li> 
                                        <li><a href="{{ route('frontend.members','active') }}">الخدمات الالكترونية</a></li>
                                        <li><a href="{{ route('frontend.contacts','suggest') }}">صوتك مسموع</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="footer-widget wow fadeInUp" data-wow-delay=".6s">
                                <h4 class="fw-title">أحدث الاخبار<span>.</span></h4>
                                <div class="footer-blog">
                                    <ul>
                                        @foreach(\App\Models\Post::where('published',1)->where('featured',1)->orderBy('created_at','desc')->take(3)->get() as $post)
                                            <li>
                                                <div class="thumb">
                                                    <a href="{{ route('frontend.post',$post->id) }}"><img src="{{ $post->photo ? $post->photo->getUrl('thumb') : '' }}" alt="" /></a>
                                                </div>
                                                <div class="content">
                                                    <span><i class="fas fa-calendar-alt"></i>
                                                        {{ $post->date }}</span>
                                                    <h2 class="title">
                                                        <a href="{{ route('frontend.post',$post->id) }}">انطلاق برنامج بوابات سوق العمل</a>
                                                    </h2>
                                                </div>
                                            </li> 
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-6 col-md-6">
                            <div class="copyright-text">
                                <p>جميع الحقوق محفوظة 2023</p>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="footer-bottom-right">
                                <ul>
                                    <li>تصميم وبرمجة<a href="#"> تكامل الرؤى</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- footer-area-end -->

    @include('sweetalert::alert')

    <!-- JS here -->
    <script src="{{ asset('frontend/js/vendor/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('frontend/js/bootstrap.min.js') }}"></script> 
    <script src="{{ asset('frontend/js/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('frontend/js/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.odometer.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.easypiechart.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.inview.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.appear.js') }}"></script>
    <script src="{{ asset('frontend/js/slick.min.js') }}"></script>
    <script src="{{ asset('frontend/js/wow.min.js') }}"></script>
    <script src="{{ asset('frontend/js/main.js') }}"></script>
    <script src="{{ asset('dashboard_offline/js/moment.min.js') }}"></script>
    <script src="{{ asset('dashboard_offline/js/bootstrap-datetimepicker.min.js') }}"></script>
    <script src="{{ asset('dashboard_offline/js/dropzone.min.js') }}"></script>
    

    <script src='https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.1/js/bootstrap.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js'></script>
    <script id="rendered-js">
        const multipleItemCarousel = document.querySelector("#carouselExampleControls");

        if (window.matchMedia("(min-width:576px)").matches) {
            const carousel = new bootstrap.Carousel(multipleItemCarousel, {
                interval: false
            });


            var carouselWidth = $(".carousel-inner")[0].scrollWidth;
            var cardWidth = $(".carousel-item").width();

            var scrollPosition = 0;

            $(".carousel-control-next").on("click", function () {
                if (scrollPosition < carouselWidth - cardWidth * 4) {
                    scrollPosition = scrollPosition + cardWidth;
                    $(".carousel-inner").animate({ scrollLeft: scrollPosition }, 600);
                }
            });
            $(".carousel-control-prev").on("click", function () {
                if (scrollPosition > 0) {
                    scrollPosition = scrollPosition - cardWidth;
                    $(".carousel-inner").animate({ scrollLeft: scrollPosition }, 600);
                }
            });
        } else {
            $(multipleItemCarousel).addClass("slide");
        }
        //# sourceURL=pen.js
    </script>

    <script>
        $(document).ready(function() {
            window._token = $('meta[name="csrf-token"]').attr('content')

            moment.updateLocale('en', {
                week: {
                    dow: 1
                } // Monday is the first day of the week
            })

            $('.date_frontend').datetimepicker({
                format: 'DD/MM/YYYY',
                locale: 'en',
                icons: {
                    up: 'fas fa-chevron-up',
                    down: 'fas fa-chevron-down',
                    previous: 'fas fa-chevron-left',
                    next: 'fas fa-chevron-right'
                }
            })

            $('.datetime_frontend').datetimepicker({
                format: 'DD/MM/YYYY HH:mm:ss',
                locale: 'en',
                sideBySide: true,
                icons: {
                    up: 'fas fa-chevron-up',
                    down: 'fas fa-chevron-down',
                    previous: 'fas fa-chevron-left',
                    next: 'fas fa-chevron-right'
                }
            })

            $('.timepicker_frontend').datetimepicker({
                format: 'HH:mm:ss',
                icons: {
                    up: 'fas fa-chevron-up',
                    down: 'fas fa-chevron-down',
                    previous: 'fas fa-chevron-left',
                    next: 'fas fa-chevron-right'
                }
            }) 

        })
    </script>
    <script>
        let hoverTimeout; // Variable to track hover timeout
        let isDropdownOpen = false; // Flag to check if dropdown is open

        function toggleDropdown(show) {
            const dropdown = document.getElementById("dropdownList");

            if (show) {
                dropdown.classList.remove("hidden");
                isDropdownOpen = true;
            } else {
                dropdownTimeout = setTimeout(() => {
                    if (!isDropdownOpen) {
                        dropdown.classList.add("hidden");
                    }
                }, 300); // Adjust the delay (in milliseconds) as needed
            }
        }

        function cancelHide() {
            clearTimeout(dropdownTimeout);
        }

        function hideDropdown() {
            isDropdownOpen = false;
            toggleDropdown(false);
        }
    </script>
    @yield('scripts')
</body>

</html>
