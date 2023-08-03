@extends('layouts.frontend')
@section('content')
    <main> 
        <!-- breadcrumb-area -->
        <section class="breadcrumb-area breadcrumb-bg" data-background="{{ asset('frontend/img/bg/breadcrumb_bg.jpg') }}">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <div class="breadcrumb-content text-center">
                            <h2 class="title"> مشاريع دعم</h2>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('home') }}">الرئيسية</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">مشاريع دعم</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- breadcrumb-area-end -->

        <!-- project-area -->
        <section class="project-area pt-100 pb-100">
            <div class="container">

                <div class="row justify-content-center">
                    @foreach($projects as $project)
                        <div class="col-lg-4 col-md-6 col-sm-10">
                            <div class="project-item mb-30">
                                <div class="project-thumb">
                                    <a href="#">
                                        <img src="{{ $project->image ? $project->image->getUrl('preview2') : '' }}"
                                            alt="" />
                                    </a>
                                    {{-- <a href="#" class="tag">الهدف ريال</a> --}}
                                </div>
                                <div class="project-content">
                                    <h2 class="title">
                                        <a href="#"> {{ $project->title }} </a>
                                    </h2>
                                    <p>{{ $project->short_description }}</p>
                                    <div class="progress-bar-details">
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar"
                                                style="width: {{ $project->percentage() }}%"
                                                aria-valuenow="{{ $project->percentage() }}" aria-valuemin="0"
                                                aria-valuemax="100"></div>
                                        </div>
                                        <div class="cause-amounts row">
                                            <div class="col-6">
                                                <p>المستهدف</p>
                                                <span>{{ $project->goal }} ريال</span>
                                            </div>
                                            <div class="col-6">
                                                <p>تم جمع</p>
                                                <span>{{ $project->collected }} ريال</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="project-meta">
                                        <ul>
                                            <li>
                                                <a href="{{ route('frontend.project',$project->id) }}"><i class="far fa-arrow-left"></i> المزيد</a>
                                            </li>
                                            <li>
                                                <a href="https://daam-donation.org"><i class="far fa-hands"></i> تبرع
                                                    الان</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div> 
                    @endforeach
                </div> 
                {{ $projects->links(); }}
            </div>
        </section>
        <!-- project-area-end -->  

    </main>
@endsection
