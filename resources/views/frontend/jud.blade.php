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
                            <h2 class="title">عن الجمعية</h2>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('home') }}">الرئيسية</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">عن الجمعية</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- breadcrumb-area-end -->

        <!-- about-area -->
        <section class="about-area-three pt-100 pb-100">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-lg-3 col-md-10">
                        <div class="about-img-three">
                            <img src="{{ asset('frontend/img/jood-icon.png')}}" alt="">
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="about-content-three">
                            <div class="section-title mb-30">
                                <h2 class="title"> ماهو جود الإسكان: </h2>
                            </div>
                            <p>هي إحدى مبادرات مؤسسة الإسكان التنموي الأهلية والتي تهدف إلى إشراك المجتمع أفرادا ومنظمات في
                                العطاء الخيري السكني من خلال منصة إلكترونية تحقق الشفافية والدقة والاحترافية في تقديم
                                المساهمة الخيرية .</p>


                            <h4>شروط القبول لرفع الحالات المستحقة على منصة جود ( تسديد الايجار) :</h4>
                            <ol>- ان تكون مستحقة للدعم السكني من خلال التسجيل في بوابة الإسكان التنموي</ol>
                            <ol>- أن تكون الحالة من مستفيدات الضمان الاجتماعي</ol>
                            <ol>- ان يكون هناك ملف خاص بالمستفيدة بالجمعية (دراسة حالة – مستندات ثبوتية)</ol>
                            <ol>- ان يكون عدد أفراد الاسرة 5 أفراد فأكثر</ol>
                            <ol>- ان يكون دخل الاسرة فقط الضمان الاجتماعي</ol>
                            <ol>- ان لا تملك الحالة مسكن خلال الخمس السنوات السابقة</ol>
                            <ol>- ان يكون على المستفيدة وقف خدمات</ol>

                            <h4>المستندات المطلوبة ::</h4>
                            <ol>- توفر العقد الالكتروني للسكن</ol>
                            <ol>- احضار ايبان المؤجر ( صاحب العقار ) لتحويل المبلغ عليه</ol>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- about-area-end -->
    </main>
    <!-- main-area-end -->
@endsection
