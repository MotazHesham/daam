@extends('layouts.frontend')

@section('content')
    <main>


        <!-- breadcrumb-area -->
        <section class="breadcrumb-area breadcrumb-bg" data-background="{{ asset('frontend/img/bg/breadcrumb_bg.jpg') }}">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <div class="breadcrumb-content text-center">
                            <h2 class="title">الملف التعريفي</h2>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('home') }}">الرئيسية</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">الملف التعريفي</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- breadcrumb-area-end -->

        <!-- category-area -->
        <div class="product-description-wrap pt-100 pb-100">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <nav>
                            <div class="nav nav-tabs" id="nav-tab" role="tablist"> 
                                <button class="nav-link active " id="nav-identity-1-tab" data-bs-toggle="tab"
                                    data-bs-target="#nav-identity-1" type="button" role="tab"
                                    aria-controls="nav-identity-1" aria-selected="true">أعضاء الجمعية العمومية</button> 
                                <button class="nav-link " id="nav-identity-2-tab" data-bs-toggle="tab"
                                    data-bs-target="#nav-identity-2" type="button" role="tab"
                                    aria-controls="nav-identity-2" aria-selected="true">محاضر أجتماع الجمعية العمومية</button> 
                                <button class="nav-link " id="nav-identity-3-tab" data-bs-toggle="tab"
                                    data-bs-target="#nav-identity-3" type="button" role="tab"
                                    aria-controls="nav-identity-3" aria-selected="true">أعضاء مجلس الأدارة والهيكل الأداري للجمعية</button> 
                                <button class="nav-link " id="nav-identity-4-tab" data-bs-toggle="tab"
                                    data-bs-target="#nav-identity-4" type="button" role="tab"
                                    aria-controls="nav-identity-4" aria-selected="true">    المدير التنفيذي</button> 
                                <button class="nav-link " id="nav-identity-5-tab" data-bs-toggle="tab"
                                    data-bs-target="#nav-identity-5" type="button" role="tab"
                                    aria-controls="nav-identity-5" aria-selected="true">    أهداف الجمعية</button> 
                            </div>
                        </nav>
                        <div class="tab-content" id="nav-tabContent"> 
                            <div class="tab-pane fade show active " id="nav-identity-1" role="tabpanel" aria-labelledby="nav-identity-1-tab"> 
                                <div class="col-4">
                                    <a href="{{ asset('frontend/identity/identity-1.pdf') }}" class="category-item"><img src="{{asset('frontend/img/logo.png')}}" alt=""><span>أعضاء الجمعية العمومية</span></a>
                                </div>  
                            </div>  
                            <div class="tab-pane fade" id="nav-identity-2" role="tabpanel" aria-labelledby="nav-identity-2-tab"> 
                                <div class="col-4">
                                    <a href="{{ asset('frontend/identity/identity-2-1.pdf') }}" class="category-item"><img src="{{asset('frontend/img/logo.png')}}" alt=""><span>محضر اجتماع الجمعية العمومية2-2022..</span></a>
                                </div>  
                                <div class="col-4">
                                    <a href="{{ asset('frontend/identity/identity-2-2.pdf') }}" class="category-item"><img src="{{asset('frontend/img/logo.png')}}" alt=""><span>محضر الجمعية العمومية العادي 2022</span></a>
                                </div>  
                                <div class="col-4">
                                    <a href="{{ asset('frontend/identity/identity-2-3.pdf') }}" class="category-item"><img src="{{asset('frontend/img/logo.png')}}" alt=""><span>محضر الجمعية العمومية العادي 2021</span></a>
                                </div>  
                                <div class="col-4">
                                    <a href="{{ asset('frontend/identity/identity-2-4.pdf') }}" class="category-item"><img src="{{asset('frontend/img/logo.png')}}" alt=""><span>محضر الجمعية العمومية العادي 2020</span></a>
                                </div>  
                                <div class="col-4">
                                    <a href="{{ asset('frontend/identity/identity-2-5.pdf') }}" class="category-item"><img src="{{asset('frontend/img/logo.png')}}" alt=""><span>محضر اجتماع الجمعية العمومية الغير عادية لعام 2018</span></a>
                                </div>  
                                <div class="col-4">
                                    <a href="{{ asset('frontend/identity/identity-2-6.pdf') }}" class="category-item"><img src="{{asset('frontend/img/logo.png')}}" alt=""><span>محضر الجمعية العمومية العادية عام 2018</span></a>
                                </div>  
                                <div class="col-4">
                                    <a href="{{ asset('frontend/identity/identity-2-7.pdf') }}" class="category-item"><img src="{{asset('frontend/img/logo.png')}}" alt=""><span>محضر الجمعية العمومية العادية عام 2019</span></a>
                                </div>  
                            </div>  
                            <div class="tab-pane fade" id="nav-identity-3" role="tabpanel" aria-labelledby="nav-identity-3-tab"> 
                                <div class="col-4">
                                    <a href="{{ asset('frontend/identity/identity-3.pdf') }}" class="category-item"><img src="{{asset('frontend/img/logo.png')}}" alt=""><span>أعضاء  مجلس الأدارة  والهيكل الأداري للجمعية</span></a>
                                </div>  
                            </div>  
                            <div class="tab-pane fade" id="nav-identity-4" role="tabpanel" aria-labelledby="nav-identity-4-tab"> 
                                <div class="col-4">
                                    <a href="{{ asset('frontend/identity/identity-4.pdf') }}" class="category-item"><img src="{{asset('frontend/img/logo.png')}}" alt=""><span>    المدير التنفيذي</span></a>
                                </div>  
                            </div>  
                            <div class="tab-pane fade" id="nav-identity-5" role="tabpanel" aria-labelledby="nav-identity-5-tab"> 
                                <div class="col-4">
                                    <a href="{{ asset('frontend/identity/identity-5.pdf') }}" class="category-item"><img src="{{asset('frontend/img/logo.png')}}" alt=""><span>    أهداف الجمعية</span></a>
                                </div>  
                            </div>  
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- category-area-end --> 
    </main>
@endsection
