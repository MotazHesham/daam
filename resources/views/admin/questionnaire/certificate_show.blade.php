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
                            الاسم
                        </th>
                        <td>
                            {{ $raw->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            رقم الهاتف
                        </th>
                        <td>
                            {{ $raw->phone }}
                        </td>
                    </tr>  
                </tbody>
            </table> 
        </div>
    </div>
</div>



@endsection