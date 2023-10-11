<div class="row">
    <div class="form-group col-md-3">
        <label class="required" for="website_name">{{ trans('cruds.setting.fields.website_name') }}</label>
        <input class="form-control {{ $errors->has('website_name') ? 'is-invalid' : '' }}" type="text"
            name="website_name" id="website_name" value="{{ old('website_name', $setting->website_name) }}" required>
        @if ($errors->has('website_name'))
            <div class="invalid-feedback">
                {{ $errors->first('website_name') }}
            </div>
        @endif
        <span class="help-block">{{ trans('cruds.setting.fields.website_name_helper') }}</span>
    </div>
    <div class="form-group col-md-3">
        <label class="required" for="email">{{ trans('cruds.setting.fields.email') }}</label>
        <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="email" name="email"
            id="email" value="{{ old('email', $setting->email) }}" required>
        @if ($errors->has('email'))
            <div class="invalid-feedback">
                {{ $errors->first('email') }}
            </div>
        @endif
        <span class="help-block">{{ trans('cruds.setting.fields.email_helper') }}</span>
    </div>
    <div class="form-group col-md-3">
        <label class="required" for="phone_number">{{ trans('cruds.setting.fields.phone_number') }}</label>
        <input class="form-control {{ $errors->has('phone_number') ? 'is-invalid' : '' }}" type="text"
            name="phone_number" id="phone_number" value="{{ old('phone_number', $setting->phone_number) }}" required>
        @if ($errors->has('phone_number'))
            <div class="invalid-feedback">
                {{ $errors->first('phone_number') }}
            </div>
        @endif
        <span class="help-block">{{ trans('cruds.setting.fields.phone_number_helper') }}</span>
    </div>
    <div class="form-group col-md-3">
        <label class="" for="facebook">{{ trans('cruds.setting.fields.facebook') }}</label>
        <input class="form-control {{ $errors->has('facebook') ? 'is-invalid' : '' }}" type="text" name="facebook"
            id="facebook" value="{{ old('facebook', $setting->facebook) }}">
        @if ($errors->has('facebook'))
            <div class="invalid-feedback">
                {{ $errors->first('facebook') }}
            </div>
        @endif
        <span class="help-block">{{ trans('cruds.setting.fields.facebook_helper') }}</span>
    </div>
    <div class="form-group col-md-3">
        <label class="" for="instagram">{{ trans('cruds.setting.fields.instagram') }}</label>
        <input class="form-control {{ $errors->has('instagram') ? 'is-invalid' : '' }}" type="text" name="instagram"
            id="instagram" value="{{ old('instagram', $setting->instagram) }}" >
        @if ($errors->has('instagram'))
            <div class="invalid-feedback">
                {{ $errors->first('instagram') }}
            </div>
        @endif
        <span class="help-block">{{ trans('cruds.setting.fields.instagram_helper') }}</span>
    </div>
    <div class="form-group col-md-3">
        <label class="" for="whatsapp">{{ trans('cruds.setting.fields.whatsapp') }}</label>
        <input class="form-control {{ $errors->has('whatsapp') ? 'is-invalid' : '' }}" type="text" name="whatsapp"
            id="whatsapp" value="{{ old('whatsapp', $setting->whatsapp) }}" >
        @if ($errors->has('whatsapp'))
            <div class="invalid-feedback">
                {{ $errors->first('whatsapp') }}
            </div>
        @endif
        <span class="help-block">{{ trans('cruds.setting.fields.whatsapp_helper') }}</span>
    </div>
    <div class="form-group col-md-3">
        <label class="" for="twitter">{{ trans('cruds.setting.fields.twitter') }}</label>
        <input class="form-control {{ $errors->has('twitter') ? 'is-invalid' : '' }}" type="text" name="twitter"
            id="twitter" value="{{ old('twitter', $setting->twitter) }}" >
        @if ($errors->has('twitter'))
            <div class="invalid-feedback">
                {{ $errors->first('twitter') }}
            </div>
        @endif
        <span class="help-block">{{ trans('cruds.setting.fields.twitter_helper') }}</span>
    </div>
    <div class="form-group col-md-4">
        <label for="profile">{{ trans('cruds.setting.fields.profile') }}</label>
        <div class="needsclick dropzone {{ $errors->has('profile') ? 'is-invalid' : '' }}" id="profile-dropzone">
        </div>
        @if ($errors->has('profile'))
            <div class="invalid-feedback">
                {{ $errors->first('profile') }}
            </div>
        @endif
        <span class="help-block">{{ trans('cruds.setting.fields.profile_helper') }}</span>
    </div>
    <div class="form-group col-md-4">
        <label class="required" for="logo">{{ trans('cruds.setting.fields.logo') }}</label>
        <div class="needsclick dropzone {{ $errors->has('logo') ? 'is-invalid' : '' }}" id="logo-dropzone">
        </div>
        @if ($errors->has('logo'))
            <div class="invalid-feedback">
                {{ $errors->first('logo') }}
            </div>
        @endif
        <span class="help-block">{{ trans('cruds.setting.fields.logo_helper') }}</span>
    </div>
    <div class="form-group col-md-4">
        <label class="required" for="address">{{ trans('cruds.setting.fields.address') }}</label>
        <textarea class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}" name="address" id="address"
            required>{{ old('address', $setting->address) }}</textarea>
        @if ($errors->has('address'))
            <div class="invalid-feedback">
                {{ $errors->first('address') }}
            </div>
        @endif
        <span class="help-block">{{ trans('cruds.setting.fields.address_helper') }}</span>
    </div>
</div>
