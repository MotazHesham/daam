@extends('layouts.frontend')
@section('content')
    <main>


        <!-- breadcrumb-area -->
        <section class="breadcrumb-area breadcrumb-bg" data-background="{{ asset('frontend/img/bg/breadcrumb_bg.jpg') }}">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <div class="breadcrumb-content text-center">
                            <h2 class="title">{{ $post->title  }}</h2>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('home') }}">الرئيسية</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ $post->title  }} </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- breadcrumb-area-end -->

        <!-- shop-details-area -->
        <section class="shop-details-area pt-130 pb-100">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-5 col-md-9">
                        <div class="shop-details-img-wrap">
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane show active" id="item-one" role="tabpanel"
                                    aria-labelledby="item-one-tab">
                                    <div class="shop-details-img">
                                        <img src="{{ $post->photo ? $post->photo->getUrl() : '' }}" alt="">
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="shop-details-content">
                            <p>{{ $post->date }}</p>
                            @if($post->type == 'blog')
                                <strong>{{$post->writer}}</strong>
                            @endif
                            <p>
                                {!! $post->description !!}
                            </p> 
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- shop-details-area-end --> 


    </main>
@endsection
