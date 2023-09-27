@extends('layouts.frontend')
@section('content')
    <main> 
        <!-- breadcrumb-area -->
        <section class="breadcrumb-area breadcrumb-bg" data-background="{{ asset('frontend/img/bg/breadcrumb_bg.jpg') }}">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <div class="breadcrumb-content text-center"> 
                            <h2 class="title">شاركنا بتقييم الخدمة في الجمعية </h2>  
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
                            <form action="{{ route('frontend.reviews.store') }}" method="POST">
                                @csrf 
                                <div class="row">
                                    <div class="col-md-12"> 
                                        <div class="form-grp">
                                            <select class="form-control select2 {{ $errors->has('role') ? 'is-invalid' : '' }}" name="role_id" id="role_id" required>
                                                @foreach($roles as $role)
                                                    <option value="{{ $role->id }}" {{ old('role_id') == $role->id ? 'selected' : '' }}>{{ $role->title }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-grp">
                                            <input type="text" placeholder="رقم الهوية" required name="identity_number">
                                        </div>
                                    </div> 
                                    <div class="col-md-6">
                                        <div class="form-grp">
                                            <input type="text" placeholder=" رقم الجوال " required name="phone_number">
                                        </div>
                                    </div>  
                                    <div class="col-md-4">
                                        <div class="row">
                                            @foreach(App\Models\Review::REVIEW_RADIO as $key => $label)
                                                <div class="col-md-6">
                                                    <div class="form-check {{ $errors->has('review') ? 'is-invalid' : '' }}">
                                                        <input class="form-check-input" type="radio" id="review_{{ $key }}" name="review" value="{{ $key }}" {{ old('review', '') === (string) $key ? 'checked' : '' }}>
                                                        <label class="form-check-label" for="review_{{ $key }}">{{ $label }}</label>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>  
                                    <div class="col-md-12">
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
