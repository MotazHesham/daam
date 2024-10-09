@extends('layouts.frontend')

@section('styles')

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css?family=Montserrat:400,500,600,700&display=swap');

        #faq__accordian-main-wrapper {
            max-width: 1140px;
            margin: 0 auto;
            padding: 20px;
            font-family: 'Montserrat', sans-serif;
            line-height: 1.6;
        }

        .faq__accordion-content p {
            margin: 0;
        }

        .faq__accordian-heading {
            background-color: #eeeeee;
            padding: 10px 30px 10px 45px;
            display: block;
            margin-bottom: 15px;
            position: relative;
            font-weight: 500;
            text-decoration: navajowhite;
            color: #000000;
        }

        .faq__accordian-heading::before {
            content: "\f1c1";
            color: #ba9a56;
            font-family: fontawesome;
            position: absolute;
            left: 20px;
            top: 50%;
            -webkit-transition: 0.3s linear all;
            -moz-transition: 0.3s linear all;
            -ms-transition: 0.3s linear all;
            -o-transition: 0.3s linear all;
            transition: 0.3s linear all;
            -webkit-transform: translateY(-50%) rotate(0deg);
            -moz-transform: translateY(-50%) rotate(0deg);
            -ms-transform: translateY(-50%) rotate(0deg);
            -o-transform: translateY(-50%) rotate(0deg);
            transform: translateY(-50%) rotate(0deg);
        }

        .faq__accordian-heading.active {
            background-color: #ba9a56;
            color: #ffffff;
        }

        .faq__accordian-heading.active::before {
            -webkit-transition: 0.3s linear all;
            -moz-transition: 0.3s linear all;
            -ms-transition: 0.3s linear all;
            -o-transition: 0.3s linear all;
            transition: 0.3s linear all;
            -webkit-transform: translateY(-50%) rotate(360deg);
            -moz-transform: translateY(-50%) rotate(360deg);
            -ms-transform: translateY(-50%) rotate(360deg);
            -o-transform: translateY(-50%) rotate(360deg);
            transform: translateY(-50%) rotate(360deg);
        }

        .faq__accordian-heading.active::before {
            color: #ffffff;
        }

        .faq__accordion-content {
            display: none;
            padding: 10px 20px;
        }

        .quarter {
            width: 90%;
        }

        .quarter ul {
            margin-left: -40px;
        }

        .quarter li {
            background: #d1b463;
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;

        }

        .quarter li a {
            color: #fff;
        }
    </style>
    
@endsection

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
                                @foreach ($reportCategories as $category)
                                    <button class="nav-link @if ($loop->first) active @endif"
                                        id="nav-{{ $category->id }}-tab" data-bs-toggle="tab"
                                        data-bs-target="#nav-{{ $category->id }}" type="button" role="tab"
                                        aria-controls="nav-{{ $category->id }}"
                                        aria-selected="true">{{ $category->name }}</button>
                                @endforeach
                                @if ($type == 'تقارير مالية')
                                    <button class="nav-link" id="nav-money-temp-tab" data-bs-toggle="tab"
                                        data-bs-target="#nav-money-temp" type="button" role="tab"
                                        aria-controls="nav-money-temp" aria-selected="true">التقارير الربعية</button>
                                @endif
                            </div>
                        </nav>
                        <div class="tab-content" id="nav-tabContent">
                            @foreach ($reportCategories as $category)
                                <div class="tab-pane fade @if ($loop->first) show active @endif"
                                    id="nav-{{ $category->id }}" role="tabpanel"
                                    aria-labelledby="nav-{{ $category->id }}-tab">
                                    <div class="row">
                                        @foreach ($category->reports->where('published', 1) as $report)
                                            <div class="col-md-4">
                                                <a href="{{ $report->file ? $report->file->getUrl() : '' }}"
                                                    class="category-item"><img
                                                        src="{{ $report->image ? $report->image->getUrl() : asset('img/logo.png') }}"
                                                        alt=""><span> {{ $report->name }} </span></a>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endforeach
                            @if ($type == 'تقارير مالية')
                                <div class="tab-pane fade" id="nav-money-temp" role="tabpanel"
                                    aria-labelledby="nav-money-temp-tab">
                                    <div class="faq__accordian-main-wrapper" id="faq__accordian-main-wrapper"> 
                                        @foreach($reportMoneys as $year => $reports)
                                            <div class="faq__accordion-wrapper">
                                                <a class="faq__accordian-heading" href="#">تقرير {{ $year }}</a>
                                                <div class="faq__accordion-content" style="display: none;">
                                                    <div class="quarter">
                                                        <ul>
                                                            @foreach($reports->sortBy('part') as $report)
                                                                <li><a href="{{ $report->file ? $report->file->getUrl() : '' }}">{{ $report->part ? \App\Models\ReportMoney::PART_SELECT[$report->part] : '' }}</a></li>
                                                            @endforeach 
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div> 
                                        @endforeach
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- category-area-end -->
    </main>
@endsection

@section('scripts')
    <script id="rendered-js">
        jQuery('.faq__accordian-heading').click(function(e) {
            e.preventDefault();
            if (!jQuery(this).hasClass('active')) {
                jQuery('.faq__accordian-heading').removeClass('active');
                jQuery('.faq__accordion-content').slideUp(500);
                jQuery(this).addClass('active');
                jQuery(this).next('.faq__accordion-content').slideDown(500);
            } else
            if (jQuery(this).hasClass('active')) {
                jQuery(this).removeClass('active');
                jQuery(this).next('.faq__accordion-content').slideUp(500);
            }
        });
        //# sourceURL=pen.js
    </script>
@endsection
