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
                        <h2 class="title"> {{ $title }}</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">الرئيسية</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{ $title }}</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb-area-end -->

    <section class="blog-area">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6">
                    <div class="section-title title-style-two mb-50">
                        <div class="overlay-title">دعم</div>
                        <span class="sub-title">دعم</span>
                        <h2 class="title">{{ $title }}</h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                @foreach($posts as $raw)
                    <div class="col-xl-4 col-lg-6 col-md-8 col-sm-10">
                        <div class="blog-item mb-30  wow fadeInUp" data-wow-delay=".2s">
                            <div class="blog-thumb">
                                <a href="{{route('frontend.post',$raw->id)}}">
                                    <img src="{{ $raw->photo ? $raw->photo->getUrl('preview2') : ''}}" alt=""></a>
                            </div>
                            <div class="blog-content">
                                <div class="blog-meta">
                                    <ul> 
                                        <li><i class="fas fa-calendar-alt"></i> {{$raw->date}}</li>
                                    </ul>
                                </div>
                                <h2 class="title">
                                    <a href="{{route('frontend.post',$raw->id)}}">
                                        {{$raw->title}}
                                    </a>
                                </h2>
                                <a href="{{route('frontend.post',$raw->id)}}" class="read-more">المزيد</a>
                            </div> 
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </section>


</main>
<!-- main-area-end -->
@endsection

