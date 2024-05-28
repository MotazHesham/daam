@extends('layouts.admin')
@section('content')

<div class="card"> 
    <div class="card-body">
        <div class="form-group"> 
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            id
                        </th>
                        <td>
                            {{ $raw->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            اسم المتدربة
                        </th>
                        <td>
                            {{ $raw->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            المسمي الوظيفي
                        </th>
                        <td>
                            {{ $raw->job }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            مكان العمل
                        </th>
                        <td>
                            {{ $raw->job_address }}
                        </td>
                    </tr> 
                    <tr>
                        <th>
                            مسمي البرنامج
                        </th>
                        <td>
                            {{ $raw->program_name }}
                        </td>
                    </tr> 
                    <tr>
                        <th>
                            تاريخ الاتحاقق بابرنامج التدريبي
                        </th>
                        <td>
                            {{ $raw->date_joinned }}
                        </td>
                    </tr> 
                    @foreach(\App\Models\QuestionnaireTraning::Q_SELECT as $key => $lable)
                        <tr>
                            <th>
                                {{ $lable }}
                            </th>
                            <td>
                                {{ App\Models\QuestionnaireTraning::ANSWER_SELECT[$raw->$key] ?? '' }}
                            </td>
                        </tr> 
                    @endforeach
                    <tr>
                        <th>
                            معوقات تنفيذ ماتم تعلمه خلال البرنامج التدريبي
                        </th>
                        <td>
                            {{ App\Models\QuestionnaireTraning::Q_11_SELECT[$raw->question_11] ?? '' }} 
                    </tr> 
                    <tr>
                        <th>
                            مقترحات
                        </th>
                        <td>
                            {{ $raw->suggestion ?? '' }} 
                    </tr> 
                </tbody>
            </table> 
        </div>
    </div>
</div>



@endsection