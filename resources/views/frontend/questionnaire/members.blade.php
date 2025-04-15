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
                                <h2 class="title">الاستبيانات</h2>  
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('home') }}">الرئيسية</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ $title }}</li>
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
                            @if ($errors->count() > 0)
                                <div class="alert alert-danger">
                                    <ul class="list-unstyled">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <h3 class="mb-4">{{ $title }}</h3>
                            <form action="{{ route('frontend.questionnaire.store') }}" method="POST">
                                @csrf
                                <input type="hidden" name="type" value="{{$type}}" id="">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-grp">
                                            <input type="text" placeholder="اسم الجهة" required name="company_name">
                                        </div>
                                    </div> 
                                    <div class="col-md-6">
                                        <div class="form-grp">
                                            <input type="text" placeholder="الاسم" required name="name">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-grp">
                                            <input type="text" placeholder="الجوال" required name="phone">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-grp">
                                            <input type="email" placeholder="البريد الألكتروني" required name="email">
                                        </div>
                                    </div> 
                                    <div class="col-md-12">
                                        <div style="overflow-x: scroll;">
                                            <table class="table table-responsive" style="background: white">
                                                <thead>
                                                    <th></th>
                                                    <th>غير راضي</th> 
                                                    <th class="text-center">1</th> 
                                                    <th class="text-center">2</th> 
                                                    <th class="text-center">3</th> 
                                                    <th class="text-center">4</th> 
                                                    <th class="text-center">5</th> 
                                                    <th>راضي جدا</th>
                                                </thead>
                                                <tbody>
                                                    @foreach(\App\Models\QuestionnaireMember::Q_SELECT as $key => $lable)
                                                        <tr class="text-center">
                                                            <td>{{ $lable }}</td>
                                                            <td></td>
                                                            <td  >
                                                                <input type="radio" style="height: 20px;width:30px" name="{{ $key }}" value="1">
                                                            </td>
                                                            <td>
                                                                <input type="radio" style="height: 20px;width:30px" name="{{ $key }}" value="2">
                                                            </td>
                                                            <td>
                                                                <input type="radio" style="height: 20px;width:30px" checked name="{{ $key }}" value="3">
                                                            </td>
                                                            <td>
                                                                <input type="radio" style="height: 20px;width:30px" name="{{ $key }}" value="4">
                                                            </td>
                                                            <td>
                                                                <input type="radio" style="height: 20px;width:30px" name="{{ $key }}" value="5">
                                                            </td>
                                                            <td></td>
                                                        </tr> 
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>  
                                    <div class="col-md-12">
                                        <div class="form-grp"> 
                                            <textarea name="suggestion" id="" cols="30" rows="10" placeholder="المقترحات"></textarea>
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
@section('scripts')

<script
    src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
    integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
    crossorigin="anonymous"
></script>
<script
    src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
    crossorigin="anonymous"
></script>
<script
    src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
    integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
    crossorigin="anonymous"
></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment-with-locales.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/moment-hijri@2.1.2/moment-hijri.min.js"></script>
<script src="{{ asset('hijri-date-picker-bootstrap/dist/js/bootstrap-hijri-datetimepicker.js?v2') }}"></script> 

<script type="text/javascript">
    $(function () {
        initHijrDatePicker();

        initHijrDatePickerDefault();

        $(".disable-date").hijriDatePicker({
            minDate: "2020-01-01",
            maxDate: "2021-01-01",
            viewMode: "years",
            hijri: true,
            debug: true,
        });
    });

    function initHijrDatePicker() {
        $(".hijri-date-input").hijriDatePicker({
            locale: "ar-sa",
            format: "DD-MM-YYYY",
            hijriFormat: "iDD/iMM/iYYYY",
            dayViewHeaderFormat: "MMMM YYYY",
            hijriDayViewHeaderFormat: "iMMMM iYYYY",
            showSwitcher: false,
            allowInputToggle: true,
            showTodayButton: false,
            useCurrent: true,
            isRTL: false,
            viewMode: "months",
            keepOpen: false,
            hijri: true,
            debug: true,
            showClear: true,
            showTodayButton: true,
            showClose: true,
        });
    }

    function initHijrDatePickerDefault() {
        $(".hijri-date-default").hijriDatePicker();
    } 
</script>

@endsection