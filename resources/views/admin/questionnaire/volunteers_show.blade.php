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
                    @foreach(\App\Models\QuestionnaireVolunteer::Q_SELECT as $key => $lable)
                        <tr>
                            <th>
                                {{ $lable }}
                            </th>
                            <td>
                                {{ App\Models\QuestionnaireVolunteer::ANSWER_SELECT[$raw->$key] ?? '' }}
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