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
                            @if($type == 'active')
                                <h2 class="title"> تسجيل عضو عامل </h2>
                            @elseif($type == 'associate')
                                <h2 class="title"> تسجيل عضو منتسب </h2>
                            @endif
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('home') }}">الرئيسية</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">تسجيل عضو عامل </li>
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
                    <div class="col-lg-12">
                        <div class="contact-form-wrap">
                            @if($type == 'active')
                                <h6 style="font-size:16px; color: #000;">رسوم العضو العامل: (300) ريال فأكثر سنوياً</h6>
                                <h5 style="font-size:16px; color: #000; margin-bottom: 30px;">عندما تكون عضواً (عاملاً) يمكنك
                                    -إضافة إلى مزايا العضو المنتسب- الترشيح لعضوية مجلس الادارة</h5>
                            @elseif($type == 'associate')
                                <h6 style="font-size:16px; color: #000;">رسوم عضو  منتسب: (100) ريال فأكثر سنوياً</h6>
                                <h5 style="font-size:16px; color: #000; margin-bottom: 30px;">عندما تكون عضواً (عاملاً) يمكنك
                                    -إضافة إلى مزايا العضو المنتسب- الترشيح لعضوية مجلس الادارة</h5>
                            @endif
                            @if ($errors->count() > 0)
                                <div class="alert alert-danger">
                                    <ul class="list-unstyled">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <form action="{{ route('frontend.members.store') }}" method="POST">
                                @csrf
                                <input type="hidden" name="type" value="{{$type}}" id="">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-grp">
                                            <input type="text" placeholder="الاسم بالكامل" required name="name">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-grp">
                                            <input type="text" placeholder=" رقم السجل المدني" required name="civial_registry">
                                        </div>
                                    </div> 
                                    <div class="col-md-6">
                                        <div class="form-grp">
                                            <input type="text" placeholder="المؤهل" required name="qualification">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-grp">
                                            <input type="text" placeholder="الوظيفة" required name="job">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-grp">
                                            <input type="text" placeholder=" الجنسية" required name="nationality">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-grp">
                                            <input type="text" placeholder=" رقم الجوال " required name="phone_number">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-grp">
                                            <input type="text" class="date_frontend" placeholder=" تاريخ الميلاد" required name="date_of_birth">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-grp">
                                            <input type="email" placeholder=" البريد الإلكتروني" required name="email">
                                        </div>
                                    </div>

                                    @include('partials.recaptcha')
                                    
                                    <div class="submit-btn text-center">
                                        <button type="submit" class="btn">أرسال</button>
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
