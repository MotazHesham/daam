<!DOCTYPE html>
<html lang="en" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>نموذج طلب انضمام الجمعية العمومية</title>

    <link rel="stylesheet" href="{{ asset('dashboard_offline/css/bootstrap.min.css') }}">
    <link
        href="https://www.jqueryscript.net/css/jquerysctipttop.css"
        rel="stylesheet"
        type="text/css"
    />
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/4.3.1/flatly/bootstrap.min.css"
    />
    <link href="{{ asset('hijri-date-picker-bootstrap/dist/css/bootstrap-datetimepicker.css?v2') }}" rel="stylesheet" />
    <style>
        .form-control{
            padding: 1.9rem !important;
            border: 0px solid #ced4da !important;
        }
        ::placeholder {
            color: black !important;
            opacity: 1; /* Firefox */
        }
    </style>
</head>
<body> 

    <div class="text-center">
        <img src="{{ asset('frontend/img/icon/daam.jpg') }}"  height="200" alt="">
        <h3 style="font-weight: bolder">
            نموذج طلب انضمام الجمعية العمومية
        </h3>
    </div>
    
    <div class="m-5 p-4" >
        <form method="POST" action="{{ route("frontend.memperships.store") }}" enctype="multipart/form-data" class="p-4" style=" background: #f6f6f6;">
            @csrf
            <div class="row">
                <div class="col-md-3 form-group">  
                    <input class="form-control" type="text" name="first_name" id="first_name" placeholder=" الاسم الأول" value="{{ old('first_name', '') }}"> 
                </div>
                <div class="col-md-3 form-group">  
                    <input class="form-control" type="text" name="second_name" id="second_name" placeholder="اسم الاب" value="{{ old('second_name', '') }}"> 
                </div>
                <div class="col-md-3 form-group">  
                    <input class="form-control" type="text" name="third_name" id="third_name" placeholder="اسم الجد" value="{{ old('third_name', '') }}"> 
                </div>
                <div class="col-md-3 form-group">  
                    <input class="form-control" type="text" name="last_name" id="last_name" placeholder="اللقب" value="{{ old('last_name', '') }}"> 
                </div>
                <div class="col-md-6 form-group">  
                    <input class="form-control" type="text" name="birth_place" id="birth_place" placeholder="مكان الميلاد" value="{{ old('birth_place', '') }}"> 
                </div>
                <div class="col-md-6 form-group">  
                    <input class="form-control hijri-date-input" type="text" name="birth_date" id="birth_date" placeholder="تاريخ الميلاد هجريا" value="{{ old('birth_date', '') }}"> 
                </div>
                <div class="col-md-3 form-group">  
                    <input class="form-control" type="text" name="identity_num" id="identity_num" placeholder="رقم الهوية" value="{{ old('identity_num', '') }}"> 
                </div>
                <div class="col-md-3 form-group">  
                    <input class="form-control" type="text" name="identity_from" id="identity_from" placeholder="مصدرها" value="{{ old('identity_from', '') }}"> 
                </div>
                <div class="col-md-2 form-group">  
                    <input class="form-control hijri-date-input" type="text" name="identity_date" id="identity_date" placeholder="تاريخ اصدارها هجريا" value="{{ old('identity_date', '') }}"> 
                </div>
                <div class="col-md-4 form-group" style=" border: 0px solid #ced4da;">  
                    <div style=" display: flex; justify-content: space-around; align-items: baseline;background:white;overflow: auto;">
                        <span>ارفاق صورة الهوية</span>
                        <label for="identity_photo">
                            <img src="{{ asset('upload.jpg') }}" height="50" width="80" alt="">
                            <span style="color:green" id="uploaded-file-name">انقر هنا لرفع الملف</span>
                        </label> 
                        <input class="form-control d-none" type="file" name="identity_photo" id="identity_photo" > 
                    </div>
                </div>
                <div class="col-md-3 form-group">  
                    <input class="form-control" type="text" name="city" id="city" placeholder="المدينة" value="{{ old('city', '') }}"> 
                </div>
                <div class="col-md-3 form-group">  
                    <input class="form-control" type="text" name="district" id="district" placeholder="الحي" value="{{ old('district', '') }}"> 
                </div>
                <div class="col-md-3 form-group">  
                    <input class="form-control" type="text" name="street" id="street" placeholder="الشارع" value="{{ old('street', '') }}"> 
                </div>
                <div class="col-md-12 form-group">  
                    <input class="form-control" type="text" name="address" id="address" placeholder="عنوان السكن بالتفصيل" value="{{ old('address', '') }}"> 
                </div>
                <div class="col-md-6 form-group">  
                    <input class="form-control" type="text" name="qualification" id="qualification" placeholder="المؤهل العلمي" value="{{ old('qualification', '') }}"> 
                </div>
                <div class="col-md-6 form-group">  
                    <input class="form-control" type="text" name="job" id="job" placeholder="الوظيفة" value="{{ old('job', '') }}"> 
                </div>
                <div class="col-md-6 form-group">  
                    <input class="form-control" type="text" name="job_company" id="job_company" placeholder="جهة العمل" value="{{ old('job_company', '') }}"> 
                </div>
                <div class="col-md-6 form-group">  
                    <input class="form-control" type="text" name="other_jobs" id="other_jobs" placeholder="أعمال اخري" value="{{ old('other_jobs', '') }}"> 
                </div>
                <div class="col-md-6 form-group">  
                    <input class="form-control" type="text" name="phone" id="phone" placeholder="رقم الهاتف" value="{{ old('phone', '') }}"> 
                </div>
                <div class="col-md-6 form-group">  
                    <input class="form-control" type="text" name="phone_2" id="phone_2" placeholder="رقم هاتف أخر" value="{{ old('phone_2', '') }}"> 
                </div>
                <div class="col-md-5 form-group">  
                    <input class="form-control" type="text" name="postal_box" id="postal_box" placeholder="الصندوق البريدي" value="{{ old('postal_box', '') }}"> 
                </div>
                <div class="col-md-5 form-group">  
                    <input class="form-control" type="text" name="postal_code" id="postal_code" placeholder="الرمز البريدي" value="{{ old('postal_code', '') }}"> 
                </div>
                <div class="col-md-4 form-group">  
                    <input class="form-control" type="email" name="email" id="email" placeholder="البريد الألكتروني" value="{{ old('email', '') }}"> 
                </div>
            </div>

            <div style="text-align: right" class="p-4">
                <h4>قيمة العضوية : (300) ريال</h4> 
                <p>
                    - برجاء إيداع قيمة الأشتراك:
                    <br>
                    &nbsp; &nbsp;
                    بنك الجزيرة بالحساب التالي <b style="text-decoration: underline">SA7060100010495007604001</b>
                    <br>
                    &nbsp; &nbsp;
                    <br>
                    <b>وارفاق سند التحويل</b>
                </p>
                
                <div class="row">
                    <div class="col-md-4">
                        <div style=" display: flex; justify-content: space-around; align-items: baseline;background:white;overflow: auto;"> 
                            <label for="receipt_photo">
                                <img src="{{ asset('upload.jpg') }}" height="50" width="80" alt="">
                                <span style="color:green" id="uploaded-file-name2">انقر هنا لرفع الملف</span>
                            </label> 
                            <input class="form-control d-none" type="file" name="receipt_photo" id="receipt_photo" > 
                        </div> 
                    </div>
                    <div class="col-md-4"></div>
                    <div class="col-md-4"> 
                        <button class="btn btn-dark btn-lg btn-block ps-5 pe-5 text-center" style="background: #001922;">الانتهاء</button>
                    </div>
                </div>
            </div>
        </form>
    </div>    
    

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

        $('#identity_photo').on('change',function(){
            var file = this.files[0]; 
            $('#uploaded-file-name').html(file['name']);
        })

        $('#receipt_photo').on('change',function(){
            var file = this.files[0]; 
            $('#uploaded-file-name2').html(file['name']);
        })
    </script>
    
</body>
</html>