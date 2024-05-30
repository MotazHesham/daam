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
                                <input type="hidden" name="type" value="{{ $type }}" id="">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div style="overflow-x: scroll;">
                                            <table class="table table-responsive" style="background: white">
                                                <thead>
                                                    <th></th>
                                                    <th>راضي</th>
                                                    <th>محايد</th>
                                                    <th>غير راضي</th>
                                                </thead>
                                                <tbody>
                                                    @foreach (\App\Models\QuestionnaireVolunteer::Q_SELECT as $key => $lable)
                                                        <tr>
                                                            <td>{{ $lable }}</td>
                                                            <td>
                                                                <input type="radio" style="height: 20px;width:30px"
                                                                    name="{{ $key }}" value="3">
                                                            </td>
                                                            <td>
                                                                <input type="radio" style="height: 20px;width:30px"
                                                                    checked name="{{ $key }}" value="2">
                                                            </td>
                                                            <td>
                                                                <input type="radio" style="height: 20px;width:30px"
                                                                    name="{{ $key }}" value="1">
                                                            </td>
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
