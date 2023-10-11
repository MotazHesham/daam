@extends('layouts.frontend')

@section('content')
    <main>


        <!-- breadcrumb-area -->
        <section class="breadcrumb-area breadcrumb-bg" data-background="{{ asset('frontend/img/bg/breadcrumb_bg.jpg') }}">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <div class="breadcrumb-content text-center">
                            <h2 class="title">{{ $type }}</h2>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('home') }}">الرئيسية</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ $type }}</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- breadcrumb-area-end -->

        <!-- category-area -->
        <div class="product-description-wrap pt-100 pb-100">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <nav>
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                @foreach($reportCategories as $category)
                                    <button class="nav-link @if($loop->first) active @endif" id="nav-{{ $category->id }}-tab" data-bs-toggle="tab"
                                        data-bs-target="#nav-{{ $category->id }}" type="button" role="tab"
                                        aria-controls="nav-{{ $category->id }}" aria-selected="true">{{ $category->name }}</button>
                                @endforeach
                            </div>
                        </nav>
                        <div class="tab-content" id="nav-tabContent">
                            @foreach($reportCategories as $category)
                                <div class="tab-pane fade @if($loop->first) show active @endif" id="nav-{{ $category->id }}" role="tabpanel" aria-labelledby="nav-{{ $category->id }}-tab">
                                    <div class="row">
                                        @foreach($category->reports->where('published',1) as $report)
                                            <div class="col-md-4">
                                                <a href="{{ $report->file ? $report->file->getUrl() : '' }}" class="category-item"><img src="{{ $report->image ? $report->image->getUrl() : asset('img/logo.png') }}" alt=""><span> {{ $report->name }}  </span></a>
                                            </div> 
                                        @endforeach
                                    </div>
                                </div> 
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- category-area-end --> 
    </main>
@endsection
