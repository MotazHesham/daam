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
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('home') }}">الرئيسية</a></li>
                                    <li class="breadcrumb-item active" aria-current="page"> تقييم المستفيدين </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- breadcrumb-area-end -->

        <!-- contact-area -->
        <div class="contact-area pt-50">
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
                            <form action="{{ route('frontend.reviews.store') }}" method="POST">
                                @csrf 
                                <div class="row">
                                    <div class="col-md-12"> 
                                        <div class="form-grp">
                                            <lable>الإدارات</lable>
                                            <select class="form-control select2 {{ $errors->has('role') ? 'is-invalid' : '' }}" name="role_id" id="role_id" required>
                                                @foreach($roles as $role)
                                                    <option value="{{ $role->id }}" {{ old('role_id') == $role->id ? 'selected' : '' }}>{{ $role->title }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-grp">
                                            <input type="text" placeholder="رقم الهوية او الجوال" value="{{ old('identity_number') }}" required name="identity_number">
                                        </div>
                                    </div>  
                                    <div class="col-md-12 mb-4">
                                        <div style="display:flex;justify-content: space-evenly;">
                                            @foreach(App\Models\Review::REVIEW_RADIO as $key => $label)
                                                <div >
                                                    <div class="form-check {{ $errors->has('review') ? 'is-invalid' : '' }}">
                                                        <input onclick="on_change_review()" class="form-check-input" style="width: 1.3em;height:1.3em;margin-left:-3.5em" type="radio" id="review_{{ $key }}" name="review" required value="{{ $key }}" {{ old('review', '') === (string) $key ? 'checked' : '' }}>
                                                        <label class="form-check-label" for="review_{{ $key }}" style="font-size: x-large">{{ $label }}</label>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>  
                                    <div class="col-md-12 mt-3" id="reason-div" style="display: none">
                                        <div class="form-grp">
                                            <textarea name="reason" id="reason"  rows="3" class="form-control" placeholder="أكتب سبب عدم رضاك"></textarea>
                                        </div>
                                    </div>  
                                    <div class="col-md-12 mt-3">
                                        @include('partials.recaptcha')
                                    </div>  
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
    @parent 
    <script>
        function on_change_review(){
            if($("#review_not_good").prop("checked")){
                $('#reason-div').css('display','block');
            }else{
                $('#reason-div').css('display','none');
            }
        }
    </script>
@endsection
