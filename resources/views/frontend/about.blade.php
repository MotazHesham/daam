@extends('layouts.frontend')
@section('content')
    <main> 
        <!-- breadcrumb-area -->
        <section class="breadcrumb-area breadcrumb-bg" data-background="{{ asset('frontend/img/bg/breadcrumb_bg.jpg') }}">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <div class="breadcrumb-content text-center">
                            <h2 class="title">عن الجمعية</h2>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('home') }}">الرئيسية</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">عن الجمعية</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- breadcrumb-area-end -->

        <!-- about-area -->
        <section class="about-area-three pt-100 pb-100">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-lg-6 col-md-10">
                        <div class="about-img-three">
                            <img src="{{ $site_settings->about_image ? $site_settings->about_image->getUrl() : ''}}" alt="">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="about-content-three">
                            <div class="section-title mb-30">
                                <span class="sub-title">-- عن الجمعية</span> 
                            </div>
                            <p>{!! $site_settings->description !!}</p>

                            <div class="business-logo">
                                <img src="{{ asset('frontend/img/images/web_logo.png') }}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- about-area-end -->


        <!-- counter-area -->
        <section class="counter-area">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="counter-item">
                            <div class="counter-img">
                                <img src="img/icon/counter_icon01.png" alt="">
                            </div>
                            <div class="counter-content">
                                <h2 class="count"><span class="odometer" data-count="{{ $site_settings->widow_count}}"></span></h2>
                                <p>أرملة</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="counter-item">
                            <div class="counter-img">
                                <img src="img/icon/counter_icon02.png" alt="">
                            </div>
                            <div class="counter-content">
                                <h2 class="count"><span class="odometer" data-count="{{ $site_settings->divorced_count}}"></span></h2>
                                <p>مطلقة</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="counter-item">
                            <div class="counter-img">
                                <img src="img/icon/counter_icon03.png" alt="">
                            </div>
                            <div class="counter-content">
                                <h2 class="count"><span class="odometer" data-count="{{ $site_settings->child_count}}"></span></h2>
                                <p>طفل</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="counter-item">
                            <div class="counter-img">
                                <img src="img/icon/counter_icon04.png" alt="">
                            </div>
                            <div class="counter-content">
                                <h2 class="count"><span class="odometer" data-count="{{ $site_settings->unit_count}}"></span></h2>
                                <p>وحدة سكنية </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- counter-area-end -->


        <!-- mission-area -->
        <section class="mission-area pt-140 pb-100">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-lg-6 col-md-10  order-0 order-lg-2">
                        <div class="mission-img">
                            <div class="row">
                                <div class="col-sm-6">
                                    <img src="{{ $site_settings->vision_image ? $site_settings->vision_image->getUrl() : '' }}" alt="" class="img-one">
                                </div>
                                <div class="col-sm-6">
                                    <img src="{{ $site_settings->mission_image ? $site_settings->mission_image->getUrl() : '' }}" alt="" class="img-two">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mission-content">
                            <div class="section-title mb-30">
                                <span class="sub-title">-- جمعيه دعم</span>
                                <h2 class="title">الرؤية و الرسالة</h2>
                            </div>
                            <p>{!! $site_settings->vision !!}</p>
                            <p>{!! $site_settings->mission !!}</p> 
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- mission-area-end --> 

    </main>
@endsection
