@extends('layouts.frontend')
@section('styles')
    <style>
        .options,
        .opti {
            margin-left: 5px;
            margin-top: 15px;
            margin-bottom: 15px;
        }

        .theme-color {
            color: #ba9a56;
        }
    </style>
@endsection
@section('styles') 
    <script src="https://www.google.com/recaptcha/enterprise.js?render=6Ldk2VgoAAAAAOGVP5p3dduJoaAHwp1nF3YH6Muq"></script>
@endsection
@section('content')
    <!-- main-area -->
    <main> 
        <!-- breadcrumb-area -->
        <section class="breadcrumb-area breadcrumb-bg" data-background="{{ asset('frontend/img/bg/breadcrumb_bg.jpg') }}">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <div class="breadcrumb-content text-center">
                            <h2 class="title"> الاشتراك في الدورة التدريبية</h2>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('home') }}">الرئيسية</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">الاشتراك في الدورة التدريبية</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- breadcrumb-area-end -->

        <div class="contact-area pt-130">
            <div class="container">
                <div class="row"> 
                    <h2 style="text-align: center;  color: #000;">نموذج تسجيل في دورة {{ $course->title }}</h2>

                    <div class="col-lg-12">
                        <div class="contact-form-wrap">
                            @if ($errors->count() > 0)
                                <div class="alert alert-danger">
                                    <ul class="list-unstyled">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <form action="{{ route('frontend.course.storeStudent') }}" method="post">
                                @csrf
                                <div class="row">
                                    <input type="hidden" value="{{ $course->id }}" name="course_id">
                                    <div class="form-grp">
                                        <input type="text" required placeholder="الاسم بالكامل" name="name" required>
                                    </div>
                                    <div class="form-grp">
                                        <input type="text" required placeholder="البريد الإلكتروني" name="email" required>
                                    </div>

                                    <div class="row ">
                                        <div class="form-grp col-md-6">
                                            <input type="text" required placeholder=" رقم الهوية" maxlength="10" name="identity_num" required>
                                        </div> 
                                        <div class="form-grp col-md-6">
                                            <input type="text" required placeholder="رقم الجوال " maxlength="10" name="phone_number" required>
                                        </div>
                                    </div>

                                    {{-- <div class="row ">
                                        <div class="form-grp col-md-6">
                                            <input type="text" class="date_frontend" placeholder=" تاريخ الميلاد" required name="date_of_birth">
                                        </div> 
                                    </div> --}}
                                    <div class="row ">
                                        <div class="  col-md-6">
                                            <span class="theme-color"> 
                                                مسجل في الجمعية؟ *
                                            </span>
                                            <a target="_blank" id="register" href="https://charities-sys.com/web/index.aspx" style="color: red;">اضغط هنا للتسجيل</a>
                                            <br />
                                            <input class="opti" id="hideRegister" type="Radio" name="registered"  Value="yes">نعم
                                            <input type="Radio" id="showRegister" class="opti" name="registered" Value="no" checked>لا 
                                        </div>
                                        <div class="form-grp col-md-6" id="relevance-div">
                                            <input type="text"   placeholder="صلة القرابة بمستفيدة الجمعية" name="relevance">
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="  col-md-12">
                                            <span class="theme-color"> هل سبق لك حضور دورة/دورات نفس المجال ؟ *</span> 
                                            <br />
                                            <input class="opti" type="Radio" Name="attend_course" Value="yes" checked required>نعم
                                            <input type="Radio" required class="opti" class="opti" Name="attend_course" Value="no" >لا
                                        </div>
                                        <div class="form-grp col-md-6 attend-courses-before">
                                            <input type="text"   placeholder="اسم الدورة" name="course_name">
                                        </div>
                                        <div class="form-grp col-md-6 attend-courses-before">
                                            <input type="text"   placeholder="اسم المدرب/ه" name="course_trainer">
                                        </div> 
                                    </div>

                                    <div class="row">
                                        <div class="  col-md-4">
                                            <span class="theme-color"> هل تريد الحصول علي شهادة ؟ *</span> 
                                            <br />
                                            <input class="opti" type="Radio" Name="certificate" Value="yes" required>نعم
                                            <input type="Radio" required class="opti" class="opti" Name="certificate" Value="no" checked>لا
                                        </div>
                                        <div class="  col-md-4">
                                            <span class="theme-color"> هل لديك مواصلات ؟ *</span> 
                                            <br />
                                            <input class="opti" type="Radio" Name="transportaion" Value="yes" required>نعم
                                            <input type="Radio" required class="opti" class="opti" Name="transportaion" Value="no" checked>لا
                                        </div>
                                        <div class="  col-md-4">
                                            <span class="theme-color"> هل لديك خبرة او معرفة سابقة في مجال الدورة ؟ *</span> 
                                            <br />
                                            <input class="opti" type="Radio" Name="prev_exper" Value="yes" required>نعم
                                            <input type="Radio" required class="opti" class="opti" Name="prev_exper" Value="no" checked>لا
                                        </div>
                                    </div>
                                    <div class="row ">
                                        <div class="form-grp col-md-12">
                                            <input type="text" required placeholder=" عنوان الحي السكني"  maxlength="10" name="address" required>
                                        </div>  
                                    </div>
                                    <div class="form-grp">
                                        <span class="theme-color"> كيف ممكن تسفيدي من البرنامج بعد انتهاء فترة التدريب ؟ * </span>
                                        <br /> 
                                        <textarea type="text" placeholder=" " name="description" required></textarea>
                                    </div>

                                    @include('partials.recaptcha')

                                    <div class="submit-btn text-center">
                                        <button type="submit" class="btn">اشترك الآن</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </main>
    <!-- main-area-end -->
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            $("#hideRegister").click(function() {

                $("#register").hide();
            });
            $("#showRegister").click(function() {

                $("#register").show();
            });
        });
        $('input[type=radio][name=registered]').change(function() {
            if (this.value == 'yes') {
                $('#relevance-div').css('display','none');
            }
            else if (this.value == 'no') {
                $('#relevance-div').css('display','block');
            }
        });
        $('input[type=radio][name=attend_course]').change(function() {
            if (this.value == 'yes') {
                $('.attend-courses-before').css('display','block');
            }
            else if (this.value == 'no') {
                $('.attend-courses-before').css('display','none');
            }
        });
    </script>
@endsection
