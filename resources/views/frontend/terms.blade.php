@extends('layouts.frontend')
@section('content')
    <main>
        <!-- breadcrumb-area -->
        <section class="breadcrumb-area breadcrumb-bg" data-background="{{ asset('frontend/img/bg/breadcrumb_bg.jpg') }}">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <div class="breadcrumb-content text-center">
                            <h2 class="title">شروط التسجيل</h2>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('home') }}">الرئيسية</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">
                                        وحدة الاسكان التنموي
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- breadcrumb-area-end -->

        <section class="mt-5 mb-5">
            <div class="container">
                <p>
                    {!! $site_settings->iskan_terms !!}
                </p>
            </div>
        </section>

    </main>
@endsection
