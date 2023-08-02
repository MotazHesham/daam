@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.courseStudent.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.course-students.update", [$courseStudent->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.courseStudent.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $courseStudent->name) }}" required>
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.courseStudent.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="email">{{ trans('cruds.courseStudent.fields.email') }}</label>
                <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="email" name="email" id="email" value="{{ old('email', $courseStudent->email) }}">
                @if($errors->has('email'))
                    <div class="invalid-feedback">
                        {{ $errors->first('email') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.courseStudent.fields.email_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="identity_num">{{ trans('cruds.courseStudent.fields.identity_num') }}</label>
                <input class="form-control {{ $errors->has('identity_num') ? 'is-invalid' : '' }}" type="text" name="identity_num" id="identity_num" value="{{ old('identity_num', $courseStudent->identity_num) }}">
                @if($errors->has('identity_num'))
                    <div class="invalid-feedback">
                        {{ $errors->first('identity_num') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.courseStudent.fields.identity_num_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="phone_number">{{ trans('cruds.courseStudent.fields.phone_number') }}</label>
                <input class="form-control {{ $errors->has('phone_number') ? 'is-invalid' : '' }}" type="text" name="phone_number" id="phone_number" value="{{ old('phone_number', $courseStudent->phone_number) }}">
                @if($errors->has('phone_number'))
                    <div class="invalid-feedback">
                        {{ $errors->first('phone_number') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.courseStudent.fields.phone_number_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="date_of_birth">{{ trans('cruds.courseStudent.fields.date_of_birth') }}</label>
                <input class="form-control date {{ $errors->has('date_of_birth') ? 'is-invalid' : '' }}" type="text" name="date_of_birth" id="date_of_birth" value="{{ old('date_of_birth', $courseStudent->date_of_birth) }}">
                @if($errors->has('date_of_birth'))
                    <div class="invalid-feedback">
                        {{ $errors->first('date_of_birth') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.courseStudent.fields.date_of_birth_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.courseStudent.fields.registered') }}</label>
                @foreach(App\Models\CourseStudent::REGISTERED_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('registered') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="registered_{{ $key }}" name="registered" value="{{ $key }}" {{ old('registered', $courseStudent->registered) === (string) $key ? 'checked' : '' }}>
                        <label class="form-check-label" for="registered_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('registered'))
                    <div class="invalid-feedback">
                        {{ $errors->first('registered') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.courseStudent.fields.registered_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.courseStudent.fields.certificate') }}</label>
                @foreach(App\Models\CourseStudent::CERTIFICATE_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('certificate') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="certificate_{{ $key }}" name="certificate" value="{{ $key }}" {{ old('certificate', $courseStudent->certificate) === (string) $key ? 'checked' : '' }}>
                        <label class="form-check-label" for="certificate_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('certificate'))
                    <div class="invalid-feedback">
                        {{ $errors->first('certificate') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.courseStudent.fields.certificate_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="description">{{ trans('cruds.courseStudent.fields.description') }}</label>
                <textarea class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" name="description" id="description">{{ old('description', $courseStudent->description) }}</textarea>
                @if($errors->has('description'))
                    <div class="invalid-feedback">
                        {{ $errors->first('description') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.courseStudent.fields.description_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="course_id">{{ trans('cruds.courseStudent.fields.course') }}</label>
                <select class="form-control select2 {{ $errors->has('course') ? 'is-invalid' : '' }}" name="course_id" id="course_id" required>
                    @foreach($courses as $id => $entry)
                        <option value="{{ $id }}" {{ (old('course_id') ? old('course_id') : $courseStudent->course->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('course'))
                    <div class="invalid-feedback">
                        {{ $errors->first('course') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.courseStudent.fields.course_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection