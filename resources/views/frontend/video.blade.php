@extends('layouts.frontend')
@section('content')
    <!-- main-area -->
    <main>
        <!-- breadcrumb-area -->
        <section class="breadcrumb-area breadcrumb-bg" data-background="{{ asset('frontend/img/bg/breadcrumb_bg.jpg') }}">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <div class="breadcrumb-content text-center">
                            <h2 class="title">وحدة الإسكان التنموي</h2>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="{{ route('home') }}">الرئيسية</a>
                                    </li>
                                    <li class="breadcrumb-item" aria-current="page">
                                        طريقة التقديم
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- breadcrumb-area-end -->

        <!-- video-area -->
        <section class="about-area-three pt-100 pb-100">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="video-wrapper">
                        <video width="560" height="315" controls>
                            <source src="{{ asset('frontend/img/Daam_video.mp4') }}" type="video/mp4" />
                            Your browser does not support the video tag.
                        </video>
                    </div>
                </div>
            </div>
        </section>
        <!-- about-area-end --> 
    </main>
    <!-- main-area-end -->
@endsection
