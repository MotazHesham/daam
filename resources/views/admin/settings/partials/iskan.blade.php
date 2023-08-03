<div class="row">
    <div class="form-group col-md-6">
        <label for="iskan_description">{{ trans('cruds.setting.fields.iskan_description') }}</label>
        <textarea class="form-control ckeditor {{ $errors->has('iskan_description') ? 'is-invalid' : '' }}"
            name="iskan_description" id="iskan_description">{!! old('iskan_description', $setting->iskan_description) !!}</textarea>
        @if ($errors->has('iskan_description'))
            <div class="invalid-feedback">
                {{ $errors->first('iskan_description') }}
            </div>
        @endif
        <span class="help-block">{{ trans('cruds.setting.fields.iskan_description_helper') }}</span>
    </div>
    <div class="form-group col-md-6">
        <label for="iskan_terms">{{ trans('cruds.setting.fields.iskan_terms') }}</label>
        <textarea class="form-control ckeditor {{ $errors->has('iskan_terms') ? 'is-invalid' : '' }}" name="iskan_terms"
            id="iskan_terms">{!! old('iskan_terms', $setting->iskan_terms) !!}</textarea>
        @if ($errors->has('iskan_terms'))
            <div class="invalid-feedback">
                {{ $errors->first('iskan_terms') }}
            </div>
        @endif
        <span class="help-block">{{ trans('cruds.setting.fields.iskan_terms_helper') }}</span>
    </div>
    <div class="form-group col-md-6">
        <label for="iskan_info">{{ trans('cruds.setting.fields.iskan_info') }}</label>
        <div class="needsclick dropzone {{ $errors->has('iskan_info') ? 'is-invalid' : '' }}" id="iskan_info-dropzone">
        </div>
        @if ($errors->has('iskan_info'))
            <div class="invalid-feedback">
                {{ $errors->first('iskan_info') }}
            </div>
        @endif
        <span class="help-block">{{ trans('cruds.setting.fields.iskan_info_helper') }}</span>
    </div>
    <div class="form-group col-md-6">
        <label for="iskan_tutorial">{{ trans('cruds.setting.fields.iskan_tutorial') }}</label>
        <div class="needsclick dropzone {{ $errors->has('iskan_tutorial') ? 'is-invalid' : '' }}"
            id="iskan_tutorial-dropzone">
        </div>
        @if ($errors->has('iskan_tutorial'))
            <div class="invalid-feedback">
                {{ $errors->first('iskan_tutorial') }}
            </div>
        @endif
        <span class="help-block">{{ trans('cruds.setting.fields.iskan_tutorial_helper') }}</span>
    </div>
</div>
