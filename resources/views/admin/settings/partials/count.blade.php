<div class="row">
    <div class="form-group col-md-3">
        <label for="divorced_count">{{ trans('cruds.setting.fields.divorced_count') }}</label>
        <input class="form-control {{ $errors->has('divorced_count') ? 'is-invalid' : '' }}" type="text"
            name="divorced_count" id="divorced_count" value="{{ old('divorced_count', $setting->divorced_count) }}">
        @if ($errors->has('divorced_count'))
            <div class="invalid-feedback">
                {{ $errors->first('divorced_count') }}
            </div>
        @endif
        <span class="help-block">{{ trans('cruds.setting.fields.divorced_count_helper') }}</span>
    </div>
    <div class="form-group col-md-3">
        <label for="widow_count">{{ trans('cruds.setting.fields.widow_count') }}</label>
        <input class="form-control {{ $errors->has('widow_count') ? 'is-invalid' : '' }}" type="text"
            name="widow_count" id="widow_count" value="{{ old('widow_count', $setting->widow_count) }}">
        @if ($errors->has('widow_count'))
            <div class="invalid-feedback">
                {{ $errors->first('widow_count') }}
            </div>
        @endif
        <span class="help-block">{{ trans('cruds.setting.fields.widow_count_helper') }}</span>
    </div>
    <div class="form-group col-md-3">
        <label for="child_count">{{ trans('cruds.setting.fields.child_count') }}</label>
        <input class="form-control {{ $errors->has('child_count') ? 'is-invalid' : '' }}" type="text"
            name="child_count" id="child_count" value="{{ old('child_count', $setting->child_count) }}">
        @if ($errors->has('child_count'))
            <div class="invalid-feedback">
                {{ $errors->first('child_count') }}
            </div>
        @endif
        <span class="help-block">{{ trans('cruds.setting.fields.child_count_helper') }}</span>
    </div>
    <div class="form-group col-md-3">
        <label for="unit_count">{{ trans('cruds.setting.fields.unit_count') }}</label>
        <input class="form-control {{ $errors->has('unit_count') ? 'is-invalid' : '' }}" type="text"
            name="unit_count" id="unit_count" value="{{ old('unit_count', $setting->unit_count) }}">
        @if ($errors->has('unit_count'))
            <div class="invalid-feedback">
                {{ $errors->first('unit_count') }}
            </div>
        @endif
        <span class="help-block">{{ trans('cruds.setting.fields.unit_count_helper') }}</span>
    </div>
    <div class="form-group col-md-3">
        <label for="building_count">{{ trans('cruds.setting.fields.building_count') }}</label>
        <input class="form-control {{ $errors->has('building_count') ? 'is-invalid' : '' }}" type="text"
            name="building_count" id="building_count" value="{{ old('building_count', $setting->building_count) }}">
        @if ($errors->has('building_count'))
            <div class="invalid-feedback">
                {{ $errors->first('building_count') }}
            </div>
        @endif
        <span class="help-block">{{ trans('cruds.setting.fields.building_count_helper') }}</span>
    </div>
    <div class="form-group col-md-3">
        <label for="beneficiary_count">{{ trans('cruds.setting.fields.beneficiary_count') }}</label>
        <input class="form-control {{ $errors->has('beneficiary_count') ? 'is-invalid' : '' }}" type="text"
            name="beneficiary_count" id="beneficiary_count"
            value="{{ old('beneficiary_count', $setting->beneficiary_count) }}">
        @if ($errors->has('beneficiary_count'))
            <div class="invalid-feedback">
                {{ $errors->first('beneficiary_count') }}
            </div>
        @endif
        <span class="help-block">{{ trans('cruds.setting.fields.beneficiary_count_helper') }}</span>
    </div>
    <div class="form-group col-md-3">
        <label for="volunteer_count">{{ trans('cruds.setting.fields.volunteer_count') }}</label>
        <input class="form-control {{ $errors->has('volunteer_count') ? 'is-invalid' : '' }}" type="text"
            name="volunteer_count" id="volunteer_count"
            value="{{ old('volunteer_count', $setting->volunteer_count) }}">
        @if ($errors->has('volunteer_count'))
            <div class="invalid-feedback">
                {{ $errors->first('volunteer_count') }}
            </div>
        @endif
        <span class="help-block">{{ trans('cruds.setting.fields.beneficiary_count_helper') }}</span>
    </div>
    <div class="form-group col-md-3">
        <label for="hours_count">{{ trans('cruds.setting.fields.hours_count') }}</label>
        <input class="form-control {{ $errors->has('hours_count') ? 'is-invalid' : '' }}" type="text"
            name="hours_count" id="hours_count"
            value="{{ old('hours_count', $setting->hours_count) }}">
        @if ($errors->has('hours_count'))
            <div class="invalid-feedback">
                {{ $errors->first('hours_count') }}
            </div>
        @endif
        <span class="help-block">{{ trans('cruds.setting.fields.hours_count_helper') }}</span>
    </div>
</div>
