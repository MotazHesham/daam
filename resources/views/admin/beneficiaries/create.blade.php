@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.beneficiary.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.beneficiaries.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">{{ trans('cruds.beneficiary.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}">
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.beneficiary.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="phone">{{ trans('cruds.beneficiary.fields.phone') }}</label>
                <input class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}" type="text" name="phone" id="phone" value="{{ old('phone', '') }}">
                @if($errors->has('phone'))
                    <div class="invalid-feedback">
                        {{ $errors->first('phone') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.beneficiary.fields.phone_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="address">{{ trans('cruds.beneficiary.fields.address') }}</label>
                <input class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}" type="text" name="address" id="address" value="{{ old('address', '') }}">
                @if($errors->has('address'))
                    <div class="invalid-feedback">
                        {{ $errors->first('address') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.beneficiary.fields.address_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="identity_num">{{ trans('cruds.beneficiary.fields.identity_num') }}</label>
                <input class="form-control {{ $errors->has('identity_num') ? 'is-invalid' : '' }}" type="text" name="identity_num" id="identity_num" value="{{ old('identity_num', '') }}">
                @if($errors->has('identity_num'))
                    <div class="invalid-feedback">
                        {{ $errors->first('identity_num') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.beneficiary.fields.identity_num_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.beneficiary.fields.marrige_status') }}</label>
                <select class="form-control {{ $errors->has('marrige_status') ? 'is-invalid' : '' }}" name="marrige_status" id="marrige_status">
                    <option value disabled {{ old('marrige_status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Beneficiary::MARRIGE_STATUS_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('marrige_status', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('marrige_status'))
                    <div class="invalid-feedback">
                        {{ $errors->first('marrige_status') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.beneficiary.fields.marrige_status_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="needs_title">{{ trans('cruds.beneficiary.fields.needs_title') }}</label>
                <input class="form-control {{ $errors->has('needs_title') ? 'is-invalid' : '' }}" type="text" name="needs_title" id="needs_title" value="{{ old('needs_title', '') }}">
                @if($errors->has('needs_title'))
                    <div class="invalid-feedback">
                        {{ $errors->first('needs_title') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.beneficiary.fields.needs_title_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="needs">{{ trans('cruds.beneficiary.fields.needs') }}</label>
                <textarea class="form-control {{ $errors->has('needs') ? 'is-invalid' : '' }}" name="needs" id="needs">{{ old('needs') }}</textarea>
                @if($errors->has('needs'))
                    <div class="invalid-feedback">
                        {{ $errors->first('needs') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.beneficiary.fields.needs_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="age">{{ trans('cruds.beneficiary.fields.age') }}</label>
                <input class="form-control {{ $errors->has('age') ? 'is-invalid' : '' }}" type="number" name="age" id="age" value="{{ old('age', '') }}" step="1">
                @if($errors->has('age'))
                    <div class="invalid-feedback">
                        {{ $errors->first('age') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.beneficiary.fields.age_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.beneficiary.fields.status') }}</label>
                <select class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}" name="status" id="status">
                    <option value disabled {{ old('status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Beneficiary::STATUS_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('status', 'specialist') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('status'))
                    <div class="invalid-feedback">
                        {{ $errors->first('status') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.beneficiary.fields.status_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="user_id">{{ trans('cruds.beneficiary.fields.user') }}</label>
                <select class="form-control select2 {{ $errors->has('user') ? 'is-invalid' : '' }}" name="user_id" id="user_id">
                    @foreach($users as $id => $entry)
                        <option value="{{ $id }}" {{ old('user_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('user'))
                    <div class="invalid-feedback">
                        {{ $errors->first('user') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.beneficiary.fields.user_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="date">{{ trans('cruds.beneficiary.fields.date') }}</label>
                <input class="form-control date {{ $errors->has('date') ? 'is-invalid' : '' }}" type="text" name="date" id="date" value="{{ old('date') }}">
                @if($errors->has('date'))
                    <div class="invalid-feedback">
                        {{ $errors->first('date') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.beneficiary.fields.date_helper') }}</span>
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