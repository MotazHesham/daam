@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.review.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.reviews.update", [$review->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="role_id">{{ trans('cruds.review.fields.role') }}</label>
                <select class="form-control select2 {{ $errors->has('role') ? 'is-invalid' : '' }}" name="role_id" id="role_id" required>
                    @foreach($roles as $id => $entry)
                        <option value="{{ $id }}" {{ (old('role_id') ? old('role_id') : $review->role->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('role'))
                    <div class="invalid-feedback">
                        {{ $errors->first('role') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.review.fields.role_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="identity_number">{{ trans('cruds.review.fields.identity_number') }}</label>
                <input class="form-control {{ $errors->has('identity_number') ? 'is-invalid' : '' }}" type="text" name="identity_number" id="identity_number" value="{{ old('identity_number', $review->identity_number) }}">
                @if($errors->has('identity_number'))
                    <div class="invalid-feedback">
                        {{ $errors->first('identity_number') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.review.fields.identity_number_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="phone_number">{{ trans('cruds.review.fields.phone_number') }}</label>
                <input class="form-control {{ $errors->has('phone_number') ? 'is-invalid' : '' }}" type="text" name="phone_number" id="phone_number" value="{{ old('phone_number', $review->phone_number) }}">
                @if($errors->has('phone_number'))
                    <div class="invalid-feedback">
                        {{ $errors->first('phone_number') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.review.fields.phone_number_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.review.fields.review') }}</label>
                @foreach(App\Models\Review::REVIEW_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('review') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="review_{{ $key }}" name="review" value="{{ $key }}" {{ old('review', $review->review) === (string) $key ? 'checked' : '' }}>
                        <label class="form-check-label" for="review_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('review'))
                    <div class="invalid-feedback">
                        {{ $errors->first('review') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.review.fields.review_helper') }}</span>
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