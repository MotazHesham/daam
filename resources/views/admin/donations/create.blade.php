@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.donation.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.donations.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="company_name">{{ trans('cruds.donation.fields.company_name') }}</label>
                <input class="form-control {{ $errors->has('company_name') ? 'is-invalid' : '' }}" type="text" name="company_name" id="company_name" value="{{ old('company_name', '') }}">
                @if($errors->has('company_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('company_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.donation.fields.company_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="date">{{ trans('cruds.donation.fields.date') }}</label>
                <input class="form-control date {{ $errors->has('date') ? 'is-invalid' : '' }}" type="text" name="date" id="date" value="{{ old('date') }}">
                @if($errors->has('date'))
                    <div class="invalid-feedback">
                        {{ $errors->first('date') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.donation.fields.date_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="amount">{{ trans('cruds.donation.fields.amount') }}</label>
                <input class="form-control {{ $errors->has('amount') ? 'is-invalid' : '' }}" type="number" name="amount" id="amount" value="{{ old('amount', '') }}" step="0.01">
                @if($errors->has('amount'))
                    <div class="invalid-feedback">
                        {{ $errors->first('amount') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.donation.fields.amount_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="expenses">{{ trans('cruds.donation.fields.expenses') }}</label>
                <input class="form-control {{ $errors->has('expenses') ? 'is-invalid' : '' }}" type="number" name="expenses" id="expenses" value="{{ old('expenses', '') }}" step="0.01">
                @if($errors->has('expenses'))
                    <div class="invalid-feedback">
                        {{ $errors->first('expenses') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.donation.fields.expenses_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.donation.fields.expenses_type') }}</label>
                <select class="form-control {{ $errors->has('expenses_type') ? 'is-invalid' : '' }}" name="expenses_type" id="expenses_type">
                    <option value disabled {{ old('expenses_type', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Donation::EXPENSES_TYPE_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('expenses_type', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('expenses_type'))
                    <div class="invalid-feedback">
                        {{ $errors->first('expenses_type') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.donation.fields.expenses_type_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.donation.fields.type') }}</label>
                <select class="form-control {{ $errors->has('type') ? 'is-invalid' : '' }}" name="type" id="type">
                    <option value disabled {{ old('type', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Donation::TYPE_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('type', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('type'))
                    <div class="invalid-feedback">
                        {{ $errors->first('type') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.donation.fields.type_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="exchange_period">{{ trans('cruds.donation.fields.exchange_period') }}</label>
                <textarea class="form-control {{ $errors->has('exchange_period') ? 'is-invalid' : '' }}" name="exchange_period" id="exchange_period">{{ old('exchange_period') }}</textarea>
                @if($errors->has('exchange_period'))
                    <div class="invalid-feedback">
                        {{ $errors->first('exchange_period') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.donation.fields.exchange_period_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.donation.fields.target') }}</label>
                <select class="form-control {{ $errors->has('target') ? 'is-invalid' : '' }}" name="target" id="target">
                    <option value disabled {{ old('target', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Donation::TARGET_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('target', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('target'))
                    <div class="invalid-feedback">
                        {{ $errors->first('target') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.donation.fields.target_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="notes">{{ trans('cruds.donation.fields.notes') }}</label>
                <textarea class="form-control {{ $errors->has('notes') ? 'is-invalid' : '' }}" name="notes" id="notes">{{ old('notes') }}</textarea>
                @if($errors->has('notes'))
                    <div class="invalid-feedback">
                        {{ $errors->first('notes') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.donation.fields.notes_helper') }}</span>
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