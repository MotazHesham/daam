@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.saidAboutUs.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.said-about-uss.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.saidAboutUs.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.saidAboutUs.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="position">{{ trans('cruds.saidAboutUs.fields.position') }}</label>
                <input class="form-control {{ $errors->has('position') ? 'is-invalid' : '' }}" type="text" name="position" id="position" value="{{ old('position', '') }}" required>
                @if($errors->has('position'))
                    <div class="invalid-feedback">
                        {{ $errors->first('position') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.saidAboutUs.fields.position_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="review">{{ trans('cruds.saidAboutUs.fields.review') }}</label>
                <input class="form-control {{ $errors->has('review') ? 'is-invalid' : '' }}" type="text" name="review" id="review" value="{{ old('review', '') }}" required>
                @if($errors->has('review'))
                    <div class="invalid-feedback">
                        {{ $errors->first('review') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.saidAboutUs.fields.review_helper') }}</span>
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