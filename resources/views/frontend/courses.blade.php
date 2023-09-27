@extends('layouts.frontend')

@section('content') 
    <main> 
        <!-- breadcrumb-area -->
        <section class="breadcrumb-area breadcrumb-bg" data-background="{{ asset('frontend/img/bg/breadcrumb_bg.jpg') }}">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <div class="breadcrumb-content text-center">
                            <h2 class="title"> الدورات التدريبية</h2>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('home') }}">الرئيسية</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">الدورات التدريبية</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </section><br><br><br><br><br>
        <!-- breadcrumb-area-end -->



        <section class="sec-padding meet-Volunteer pb_30">
            <div class="container">
                <div class="row">
                    @foreach ($courses as $key => $course)
                        <div class="col-md-4">
                            <div class="single-team-member mb_60">
                                <div class="img-box">
                                    <img src="{{ $course->photo ? $course->photo->getUrl('preview2') : '' }}" alt=""> 
                                </div>
                                <h3>{{ $course->title }}</h3>
                                <span>{{ $course->trainer }}</span>
                                <p>{!! $course->short_description !!}</p> 
                                <div class="row">
                                    <div class="col-6">
                                        <a href="{{ route('frontend.course', $course->id) }}" class="btn">المزيد</a>
                                    </div>
                                    @if($course->end_at >= date(config('panel.date_format')))
                                        <div class="col-6">
                                            <a href="{{ route('frontend.course.subscribe', $course->id) }}" class="btn"> اشترك الان </a>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="text-center mt-5 mb-5">
                    {{ $courses->links() }}
                </div>
            </div>
        </section>

    </main>
    <!-- main-area-end -->
@endsection
