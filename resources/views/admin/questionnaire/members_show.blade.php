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
                            اسم الجهة
                        </th>
                        <td>
                            {{ $raw->company_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            الاسم
                        </th>
                        <td>
                            {{ $raw->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            الجوال
                        </th> 
                        <td>
                            {{ $raw->phone }}
                        </td>
                    </tr> 
                    <tr>
                        <th>
                            البريد الالكتروني
                        </th>
                        <td>
                            {{ $raw->email }}
                        </td>
                    </tr>  
                    @foreach(\App\Models\QuestionnaireMember::Q_SELECT as $key => $lable)
                        <tr>
                            <th>
                                {{ $lable }}
                            </th>
                            <td>
                                {{ App\Models\QuestionnaireMember::ANSWER_SELECT[$raw->$key] ?? '' }}
                            </td>
                        </tr> 
                    @endforeach 
                    <tr>
                        <th>
                            مقترحات
                        </th>
                        <td>
                            {{ $raw->suggestion ?? '' }} 
                        </td>
                    </tr> 
                </tbody>
            </table> 
        </div>
    </div>
</div>



@endsection