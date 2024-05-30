<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>نموذج طلب انضمام الجمعية العمومية</title>

    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/css/bootstrap.min.css'> 
    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.min.css') }}" /> 
    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap-a.min.css') }}" />
</head>
<body > 

    <div class="text-center">
        <img src="{{ asset('frontend/img/icon/daam.jpg') }}"  height="200" alt="">
        <h3 style="font-weight: bolder">
            نموذج طلب انضمام الجمعية العمومية
        </h3>
    </div>
    
    <div class="m-5 p-4" style="background: #fef8bb; border-radius: 13px;">
        <h5 class="mb-4">برجاء مراجعة شروط الأنضمام للعضوية</h5>
        <p>1- ان يكون سعودي الجنسية</p>
        <p>2- أن يكون قد أتم الخامسة عشر من عمره</p>
        <p>3- أن يكون غير محكوم عليه بإدانة في جريمة مخلة بالشرف أو الأمانة مالم يكن قد رد إليه اعتباره</p>
        <p>4- أن يكون قد تم سداد الاشتراك السنوي للعضوية العادية (300) ريال وللعضو المنتسب (100) ريال ولعضوية الطلاب (50) ريال , عضوية الشركات (10.000) ريال</p>
        <p>5- العضوية الداعمة تمنح للعضو الذي يتم سداد (100.000) ريال خلال دورة مجلس الادارة</p>
    </div> 

    <div class="m-5 p-4">
        <h5>مميزات العضوية:</h5>
        <p>1- الأجر والمثوبة من الله سبحانه وتعالى</p>
        <p>2- حضور اجتماعات الجمعية العمومية وانتخاب أعضاء مجلس الإدارة</p>
        <p>3- مناقشة الميزانية والحسابات الختامية</p>
        <p>4- تزويد العضو بكافة المعلومات عن الأنشطة التي تنفذهاالجمعية الدعوة لحضورها</p>
    </div>

    <form action="{{ route('frontend.joining_form_2') }}">

        <div style="display: flex;justify-content: space-evenly;align-items: center;">
            <div>
                <input type="checkbox" name="accept" id="" required>
                <label for="">أوافق بتوافر شروط الأنضمام</label>
            </div>

            <div>
                <button class="btn btn-dark btn-lg ps-5 pe-5">الخطوة التالية</button>
            </div>
        </div>
        
    </form> 

    <script src="{{ asset('frontend/js/vendor/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>  
    <script src='https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.1/js/bootstrap.min.js'></script>
</body>
</html>