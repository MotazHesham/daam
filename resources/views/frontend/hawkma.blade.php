@extends('layouts.frontend')
@section('content')
    <main>
        <!-- breadcrumb-area -->
        <section class="breadcrumb-area breadcrumb-bg" data-background="{{ asset('frontend/img/bg/breadcrumb_bg.jpg') }}">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <div class="breadcrumb-content text-center">
                            <h2 class="title">الحوكمة</h2>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('home') }}">الرئيسية</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">
                                        {{ $category->name }}
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- breadcrumb-area-end -->

        <!-- category-area -->
        <div class="category-area gray-bg pt-130 pb-70">
            <div class="container">
                <div class="row justify-content-center">
                    @foreach($hawkma as $raw)
                        <div class="col-4">
                            <a href="{{ $raw->file ? $raw->file->getUrl() : '' }}" target="_blanc" class="category-item">
                                <img src="{{ $raw->icon ? $raw->icon->getUrl('preview') : asset('frontend/img/file_icon__.png') }}" alt="">
                                <span>{{ $raw->title }}</span>
                            </a>
                        </div> 
                    @endforeach
                </div>
                {{ $hawkma->links() }}
            </div>
        </div>
        <!-- category-area-end -->

    </main>
@endsection
