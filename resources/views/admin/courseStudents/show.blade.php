@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.courseStudent.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.course-students.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.courseStudent.fields.id') }}
                        </th>
                        <td>
                            {{ $courseStudent->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.courseStudent.fields.name') }}
                        </th>
                        <td>
                            {{ $courseStudent->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.courseStudent.fields.email') }}
                        </th>
                        <td>
                            {{ $courseStudent->email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.courseStudent.fields.identity_num') }}
                        </th>
                        <td>
                            {{ $courseStudent->identity_num }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.courseStudent.fields.phone_number') }}
                        </th>
                        <td>
                            {{ $courseStudent->phone_number }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.courseStudent.fields.date_of_birth') }}
                        </th>
                        <td>
                            {{ $courseStudent->date_of_birth }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.courseStudent.fields.registered') }}
                        </th>
                        <td>
                            {{ App\Models\CourseStudent::REGISTERED_RADIO[$courseStudent->registered] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.courseStudent.fields.certificate') }}
                        </th>
                        <td>
                            {{ App\Models\CourseStudent::CERTIFICATE_RADIO[$courseStudent->certificate] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.courseStudent.fields.description') }}
                        </th>
                        <td>
                            {{ $courseStudent->description }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.courseStudent.fields.course') }}
                        </th>
                        <td>
                            {{ $courseStudent->course->title ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.courseStudent.fields.relevance') }}
                        </th>
                        <td>
                            {{ $courseStudent->relevance ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.courseStudent.fields.attend_course') }}
                        </th>
                        <td>
                            {{ $courseStudent->attend_course ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            الدورات السابقة
                        </th>
                        <td>
                            @if($courseStudent->courses_before)
                                <table class="table">
                                    <thead>
                                        <th>الدورة</th>
                                        <th>المدرب</th>
                                    </thead>
                                    <tbody>
                                        @foreach(json_decode($courseStudent->courses_before,true) as $raw)
                                            <tr>

                                                <td>{{ $raw['course_name'] }}</td>
                                                <td>{{ $raw['course_trainer'] }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @endif
                        </td>
                    </tr> 
                    <tr>
                        <th>
                            {{ trans('cruds.courseStudent.fields.transportaion') }}
                        </th>
                        <td>
                            {{ $courseStudent->transportaion ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.courseStudent.fields.prev_exper') }}
                        </th>
                        <td>
                            {{ $courseStudent->prev_exper ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.courseStudent.fields.address') }}
                        </th>
                        <td>
                            {{ $courseStudent->address ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.course-students.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection