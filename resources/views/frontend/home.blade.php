@extends('layouts.frontend')

@section('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css">
    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>

    <style>
        .sample-slider {
            width: 45vw;
            height: 30vw;
        }

        .sample-slider .swiper-slide {
            height: calc((100% - 15px) / 2);
        }

        @media (min-width: 992px) and (max-width: 1200px) {
            .sample-slider {
                width: 39vw;
                height: 45vw;
            }
        }

        @media (min-width: 769px) and (max-width: 991px) {
            .sample-slider {
                width: 25vw;
                height: 30vw;
            }
        }

        @media (max-width: 768px) {
            .sample-slider {
                height: 70vw;
                width: 70vw;
            }
        }

        @media (max-width: 575.98px) {
            .max-width-50 {
                max-width: 35%;
            }
        }
    </style>
@endsection

@section('content')
    <main style="overflow: hidden;">
        <!-- slider-area -->
        <section class="slider-area">
            <div class="slider-active">
                @foreach ($sliders as $slider)
                    <div class="single-slider slider-bg"
                        data-background="{{ $slider->image ? $slider->image->getUrl() : '' }}">
                        <div class="container">
                            <div class="row">
                                <div class="">
                                    <div class="slider-content">
                                        @if ($slider->text_1)
                                            <h6 data-animation="fadeInUp" data-delay=".3s">
                                                <i class="fas fa-bookmark"></i>
                                                {{ $slider->text_1 }}
                                            </h6>
                                        @endif
                                        <h2 data-animation="fadeInUp" data-delay=".6s">
                                            {{ $slider->text_2 }}
                                        </h2>
                                        @if ($slider->button_name)
                                            <div class="slider-btn">
                                                <a href="{{ $slider->link }}" class="btn" data-animation="fadeInLeft"
                                                    data-delay=".9s">
                                                    {{ $slider->button_name }}
                                                </a>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
        <!-- slider-area-end -->

        <!-- iskan-area -->
        <section class="mt-5">
            <div class="row">
                <div class="col-md-2">
                    <img style="width: 280px;height: 200px;padding-left: 0px;"
                        src="{{ asset('frontend/img/icon/daam.jpg') }}" alt="">
                </div>
                <div class="col-md-8">
                    <div class="section-title text-center mb-55">
                        <div class="overlay-title">دعم</div>
                        <p>
                            <?php echo nl2br($site_settings->iskan_description); ?>
                        </p>
                    </div>
                </div>
                <div class="col-md-2">
                    <a href="{{ route('frontend.jood') }}">
                        <img style="width: 200px;height: 200px;" src="{{ asset('frontend/img/icon/eskan.jpg') }}"
                            alt="">
                    </a>
                </div>
            </div>
        </section>
        <!-- iskan-area-end -->

        <!-- counter-area -->
        <section class="counter-area">
            <div class="container">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-8">
                            <div class="counter-item" title="انجازات وحدة الاسكان">
                                <div class="counter-title">
                                    <h6 class="title m-3">انجازات وحدة الاسكان</h6>
                                </div>
                                <div class="row">
                                    @foreach ($Aids->where('type', 'انجازات وحدة الاسكان') as $aid)
                                        <div class="col-sm-4 col-md-4 col-lg-4">
                                            <div class="counter-img">
                                                <img src="{{ $aid->icon->getUrl() }}" alt=""
                                                    class="img-fluid mx-auto d-block max-width-50 black-icon" />
                                            </div>
                                            <div class="counter-content">
                                                <h4 class="count fs-5">
                                                    <span class="odometer" data-count="{{ $aid->aid_number }}"></span>
                                                </h4>
                                                <p class="m-2 text-black text-bold">{{ $aid->unit_of_aid }}</p>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    @foreach ($Aids->where('type', '!=', 'انجازات وحدة الاسكان') as $aid)
                        <div class="col-md-2 col-sm-3 col-lg-1 p-2 m-3">
                            <div class="counter-item " title="{{ $aid->type }}">
                                <div class="counter-title">
                                    <h6 class="title m-3">{{ $aid->type }}</h6>
                                </div>
                                <div class="counter-img">
                                    <img src="{{ $aid->icon->getUrl() }}" alt=""
                                        class="img-fluid mx-auto d-block max-width-50 " />
                                </div>
                                <div class="counter-content">
                                    <h4 class="count fs-5">
                                        <span class="odometer" data-count="{{ $aid->aid_number }}"></span>
                                    </h4>
                                    <p class=" m-2 text-black text-bold">{{ $aid->unit_of_aid }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>




            </div>
        </section>
        <!-- counter-area-end -->
        <!-- project-area -->
        <section class="project-area testimonial-area testimonial-style-three pt-100 pb-100">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-6 col-lg-8">
                        <div class="section-title text-center mb-55">
                            <div class="overlay-title">دعم</div>
                            <span class="sub-title">-- دعم --</span>
                            <h2 class="title">مشاريع دعم</h2>
                        </div>
                    </div>
                </div>
                <div class="row testimonial-active">
                    @foreach ($projects as $project)
                        <div class="col-lg-4 col-md-6 col-sm-10">
                            <div class="testimonial-item mb-30">
                                <div class="project-thumb">
                                    <a href="{{ route('frontend.project', $project->id) }}">
                                        <img src="{{ $project->image ? $project->image->getUrl('preview2') : '' }}"
                                            alt="" />
                                    </a>
                                    {{-- <a href="#" class="tag">الهدف ريال</a> --}}
                                </div>
                                <div class="project-content">
                                    <h2 class="title">
                                        <a href="{{ route('frontend.project', $project->id) }}"> {{ $project->title }}
                                        </a>
                                    </h2>
                                    <p>{{ $project->short_description }}</p>
                                    <div class="project-meta">
                                        <ul>
                                            <li>
                                                <a href="{{ $project->file ? $project->file->getUrl() : '' }}"
                                                    target="_blanc"><i class="far fa-arrow-left"></i> المزيد</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="more-project text-center mt-20">
                    <a href="{{ route('frontend.projects') }}" class="btn">المزيد<span>+</span></a>
                </div>
            </div>
        </section>
        <!-- project-area-end -->

        <section class="Volunteer-w-us  color-white">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-6 col-lg-8">
                        <div class="section-title text-center mb-30">
                            <h2 class="title"> التطوع</h2>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-8 col-md-2 col-sm-6">
                        <p>تسعى جمعية دعم أن تكون جمعية فاعلة في تحقيق إشراك مستدام للمتطوعين، ويجد المتطوعين فيها بيئة
                            جاذبة وتنمية لقدراتهم واشادة بجهودهم، وإسهاما لنهضة مجتمعهم.</p>

                    </div>

                </div>

                <div class="row justify-content-center">
                    <div class=" col-md-4">
                        <div class=" home_Volunteer ">
                            <div class="icon"><img src="{{ asset('frontend/img/volunteer.png') }}" /></div>
                            <h4>عدد المتطوعين : {{ $site_settings->volunteer_count ?? '' }} متطوع /ه</h4>
                        </div>
                    </div>

                    <div class=" col-md-4">
                        <div class=" home_Volunteer b-left">
                            <div class="icon"><img src="{{ asset('frontend/img/clock.png') }}" /></div>
                            <h4> عدد الساعات : {{ $site_settings->hours_count ?? '' }} </h4>
                        </div>
                    </div>

                </div>


                <div class="row">
                    <a class="submit-btn text-center" href="{{ route('frontend.volunteer') }}">
                        <button type="submit" class="btn btn-style-two"> تطوع معنا</button>
                    </a>
                </div>
        </section>
        <!-- news-area -->
        <section class="blog-area testimonial-area testimonial-style-three pt-100 pb-100">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-lg-6">
                        <div class="section-title title-style-two mb-50">
                            <div class="overlay-title">دعم</div>
                            <span class="sub-title">اخبار دعم</span>
                            <h2 class="title">الاخبار والاحداث</h2>
                        </div>
                    </div>
                </div>
                <div class="row testimonial-active">
                    @foreach ($news as $raw)
                        <div class="col-xl-4 col-lg-6 col-md-8 col-sm-10">
                            <div class="blog-item mb-30  testimonial-item" data-wow-delay=".2s">
                                <div class="blog-thumb">
                                    <a href="{{ route('frontend.post', $raw->id) }}">
                                        <img src="{{ $raw->photo ? $raw->photo->getUrl('preview2') : '' }}"
                                            alt="" />
                                    </a>
                                </div>
                                <div class="blog-content">
                                    <div class="blog-meta">
                                        <ul>
                                            <li><i class="fas fa-calendar-alt"></i>{{ $raw->date }}</li>
                                        </ul>
                                    </div>
                                    <h2 class="title">
                                        <a href="{{ route('frontend.post', $raw->id) }}">{{ $raw->title }}</a>
                                    </h2>
                                    <a href="{{ route('frontend.post', $raw->id) }}" class="read-more">المزيد</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="more-project text-center mt-20">
                    <a href="{{ route('frontend.posts', 'news') }}" class="btn">المزيد<span>+</span></a>
                </div>
            </div>
        </section>
        <!-- news-area-end -->

        <!-- testimonial-area -->
        <section class="testimonial-area testimonial-style-three pt-70 pb-100">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-6 col-lg-5">
                        <div class="section-title mb-50">
                            <div class="overlay-title"> دعم</div>
                            <span class="sub-title">-- قالوا عنا</span>
                            <h2 class="title"> قالوا عنا</h2>
                        </div>
                    </div>
                </div>
                <div class="row testimonial-active">
                    @foreach ($reviews as $review)
                        <div class="col-lg-4">
                            <div class="testimonial-item">
                                <div class="testimonial-content">
                                    <p>{{ $review->review }}</p>
                                </div>
                                <div class="testi-avatar-wrap">
                                    <div class="testi-avatar-info">

                                        <div class="testi-avatar-content">
                                            <div class="content">
                                                <h2 class="title">{{ $review->name }}</h2>
                                                <p>{{ $review->position }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="testi-icon">
                                        <i class="fas fa-star"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        <!-- testimonial-area-end -->

        <!-- partners-area -->
        <section class="blog-area">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-6 col-lg-8">
                        <div class="section-title text-center mb-55">
                            <div class="overlay-title"> دعم</div>
                            <span class="sub-title">-- دعم --</span>
                            <h2 class="title">شركاء النجاح </h2>
                        </div>
                    </div>
                </div>
                <section class="p_40" data-bg-color="#eee" style="height: auto">
                    <div class="swiper sample-slider">
                        <div class="swiper-wrapper">
                            @foreach ($partners as $partner)
                                <div class="swiper-slide">
                                    <img src="{{ $partner->image ? $partner->image->getUrl('preview') : '' }}">
                                </div>
                            @endforeach
                        </div>
                        <div class="swiper-pagination mt-5"></div>
                    </div>
                </section>
            </div>
        </section>
        <!-- partners-area-end -->

    </main>
@endsection

@section('scripts')
    <script>
        const swiper = new Swiper('.sample-slider', {
            slidesPerView: 4, //column count of shown slide
            spaceBetween: 10, //gap of slides
            grid: { //row count of shown slide
                rows: 2,
            },
            pagination: {
                el: '.swiper-pagination',
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            breakpoints: {
                // When the screen width is 768px or less (mobile screens)
                768: {
                    slidesPerView: 1, // Display only one slide per view
                    grid: {
                        rows: 1, // Show only one row
                    },
                },
                // When the screen width is 992px or more (larger screens)
                992: {
                    slidesPerView: 2, // Display two slides per view
                    grid: {
                        rows: 2,
                    },
                },
                1200: {
                    slidesPerView: 3, // Display three slides per view
                    grid: {
                        rows: 2,
                    },
                },
            },
        })
    </script>
@endsection
