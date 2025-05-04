@extends('layouts.admin')
@section('content')

<div class="card"> 
    <div class="card-header">
        <button class="btn btn-info" onClick="printdiv('printable_div_id');">طباعة</button>
    </div>
    <div class="card-body">
        <div class="form-group" id="printable_div_id"> 
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
                            الحالة الاجتماعية
                        </th>
                        <td>
                            {{ \App\Models\QuestionnaireSpecialNeed::MARIGE_STATUS_SELECT[$raw->marige_status] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            العلاقة
                        </th>
                        <td>
                            {{ \App\Models\QuestionnaireSpecialNeed::RELATION_SELECT[$raw->relation] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            لديه احتياجات خاصة
                        </th>
                        <td>
                            {{ $raw->has_special_needs ? 'نعم' : 'لا' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            الفئة العمرية
                        </th>
                        <td>
                            {{ \App\Models\QuestionnaireSpecialNeed::AGE_RANGE_SELECT[$raw->age_range] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            التعليم
                        </th>
                        <td>
                            {{ \App\Models\QuestionnaireSpecialNeed::SPECIAL_NEED_EDUCATION_SELECT[$raw->special_need_education] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            نوع الاحتياج الخاص
                        </th>
                        <td>
                            {{ $raw->special_need_type ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table> 
        </div>
    </div>
</div>



@endsection 