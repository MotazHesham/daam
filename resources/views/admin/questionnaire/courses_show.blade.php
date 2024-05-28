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
                            اسم الدورة
                        </th>
                        <td>
                            {{ $raw->course_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            المدرب
                        </th>
                        <td>
                            {{ $raw->trainer }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            التاريخ
                        </th>
                        <td>
                            {{ $raw->date }}
                        </td>
                    </tr> 
                    <tr>
                        <th>
                            المهنة
                        </th>
                        <td>
                            {{ $raw->job }}
                        </td>
                    </tr>  
                    @foreach(\App\Models\QuestionnaireCourse::Q_SELECT as $key => $lable)
                        <tr>
                            <th>
                                {{ $lable }}
                            </th>
                            <td>
                                {{ App\Models\QuestionnaireCourse::ANSWER_SELECT[$raw->$key] ?? '' }}
                            </td>
                        </tr> 
                    @endforeach 
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