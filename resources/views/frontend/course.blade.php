@extends('layouts.frontend')

@section('content')
    <!-- main-area -->
    <main>


        <!-- breadcrumb-area -->
        <section class="breadcrumb-area breadcrumb-bg" data-background="{{ asset('img/bg/breadcrumb_bg.jpg') }}">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <div class="breadcrumb-content text-center">
                            <h2 class="title">{{ $course->title }}</h2>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('home') }}">الرئيسية</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ $course->title }}</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- breadcrumb-area-end -->

        <!-- shop-details-area -->

        <section class="blog-home sec-padding blog-page blog-details mt-5 mb-5">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 pull-left">
                        <div class="single-blog-post">
                            <div class="img-box">
                                <img src="{{ $course->photo ? $course->photo->getUrl() : '' }}" alt="">
                            </div><br>
                            <a href="#">
                                <h2>{{ $course->title }}</h2>
                            </a>

                            <div class="content-box">
                                <div class="date-box">
                                    <div class="inner">
                                        <div class="date">
                                            <li><i class="fas fa-calendar-alt"></i> {{ $course->start_at }} - {{ $course->end_at }}</li> 
                                        </div> 
                                    </div>
                                </div>
                                <div class="content">
                                    <h5>{!! $course->description !!}</h5> <br> 
                                    <ol>
                                        <li style="color: #BA9A56;">المدربة : {{ $course->trainer }}</li>
                                        <li style="color: #BA9A56;">{{ $course->attend_type ? \App\Models\Course::ATTEND_TYPE_SELECT[$course->attend_type] : '' }}</li>
                                        <li style="color: #BA9A56;">{{ $course->certificate ? \App\Models\Course::CERTIFICATE_SELECT[$course->certificate] : '' }}</li> 
                                    </ol> 
                                    <br> 
                                    <a href="#"> 
                                        <a href="{{ route('frontend.course.subscribe', $course->id) }}" class="btn"> اشترك الان </a>
                                    </a>
                                </div>
                            </div>
                        </div>

                    </div>

                </div> 
            </div>
        </section>
        <!-- shop-details-area-end -->





    </main>
    <!-- main-area-end -->
@endsection
