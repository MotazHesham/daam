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
                                    <li class="breadcrumb-item active" aria-current="page">كلمة رئيس مجلس الأدارة</li>
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
                            <img src="{{ $site_settings->chairman_image ? $site_settings->chairman_image->getUrl() : ''}}" alt="">
                        </div>
                    </div>
                    
                    <div class="col-lg-6">
                        <div class="about-content-three">
                            <div class="section-title mb-30">
                                <span class="sub-title">-- كلمة رئيس مجلس الأدارة</span> 
                            </div>
                            <p>{!! $site_settings->chairman_description !!}</p>

                            <div class="business-logo">
                                <img src="{{ asset('frontend/img/images/web_logo.png') }}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- about-area-end --> 
    </main>
@endsection
