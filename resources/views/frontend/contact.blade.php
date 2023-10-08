@extends('layouts.frontend')
@section('styles') 
    <script src="https://www.google.com/recaptcha/enterprise.js?render=6Ldk2VgoAAAAAOGVP5p3dduJoaAHwp1nF3YH6Muq"></script>
@endsection
@section('content')
    <main>


        <!-- breadcrumb-area -->
        <section class="breadcrumb-area breadcrumb-bg" data-background="{{ asset('frontend/img/bg/breadcrumb_bg.jpg') }}">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <div class="breadcrumb-content text-center">
                            @if($type == 'contact') 
                                <h2 class="title"> تواصل معنا </h2>
                            @elseif($type == 'suggest' || $type == 'complaint')
                                <h2 class="title">الشكاوي والمقترحات </h2>
                            @endif
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('home') }}">الرئيسية</a></li>
                                    @if($type == 'contact') 
                                        <li class="breadcrumb-item active" aria-current="page">تواصل معنا </li>
                                    @elseif($type == 'suggest' || $type == 'complaint')
                                        <li class="breadcrumb-item active" aria-current="page">الشكاوي والمقترحات </li>
                                    @endif
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- breadcrumb-area-end -->

        <!-- contact-area -->
        <div class="contact-area pt-130">
            <div class="container">
                <div class="row">
                    <div class="contact-info-wrap">
                        <div class="row justify-content-center">
                            <div class="col-lg-4 col-md-6">
                                <div class="contact-info-item">
                                    <div class="contact-info-icon">
                                        <img src="{{ asset('frontend/img/icon/contact_info_icon01.png') }}" alt="">
                                        <span><i class="far fa-check"></i></span>
                                    </div>
                                    <div class="contact-info-content">
                                        <h2 class="title">العنوان</h2>
                                        <p>{{ $site_settings->address }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="contact-info-item">
                                    <div class="contact-info-icon">
                                        <img src="{{ asset('frontend/img/icon/contact_info_icon02.png') }}" alt="">
                                        <span><i class="far fa-check"></i></span>
                                    </div>
                                    <div class="contact-info-content">
                                        <h2 class="title">الرقم الموحد</h2>
                                        <p>{{ $site_settings->phone_number }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="contact-info-item">
                                    <div class="contact-info-icon">
                                        <img src="{{ asset('frontend/img/icon/contact_info_icon03.png') }}" alt="">
                                        <span><i class="far fa-check"></i></span>
                                    </div>
                                    <div class="contact-info-content">
                                        <h2 class="title">البريد الإلكتروني </h2>
                                        <p>{{ $site_settings->email }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="contact-form-wrap">
                            <form action="{{ route('frontend.contacts.store') }}" method="POST">
                                @csrf
                                <div class="row">   
                                    @if($type == 'contact')
                                        <input type="hidden" name="type" value="contact">
                                    @elseif($type == 'suggest' || $type == 'complaint')
                                        <div class="col-md-12">
                                            <div class="form-grp"> 
                                                <select class="form-control" name="type" id="" required>
                                                    <option value="suggest">مقترحات</option>
                                                    <option value="complaint">شكاوي</option>
                                                </select>
                                            </div>
                                        </div>
                                    @endif
                                    <div class="col-md-6">
                                        <div class="form-grp">
                                            <i class="far fa-user"></i>
                                            <input type="text" placeholder="الاسم" required name="name">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-grp">
                                            <i class="far fa-user"></i>
                                            <input type="text" placeholder="الوظيفة" required name="job">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-grp">
                                            <i class="far fa-envelope"></i>
                                            <input type="email" placeholder="البريد الالكترونى" required name="email">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-grp">
                                            <i class="far fa-phone"></i>
                                            <input type="text" placeholder="رقم الجوال" required name="phone_number">
                                        </div>
                                    </div> 
                                    <div class="col-md-12">
                                        <div class="form-grp">
                                            <i class="far fa-pen"></i>
                                            <textarea name="message" placeholder="رسالتك"  required></textarea>
                                        </div>
                                        @include('partials.recaptcha')
                                    </div>
                                    <div class="submit-btn text-center">
                                        <button type="submit" class="btn">ارسال الان</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- contact-area-end -->  
    </main>
@endsection 
