<div class="row">
    <div class="form-group col-md-6">
        <label for="chairman_description">{{ trans('cruds.setting.fields.chairman_description') }}</label>
        <textarea class="form-control ckeditor {{ $errors->has('chairman_description') ? 'is-invalid' : '' }}"
            name="chairman_description" id="chairman_description">{!! old('chairman_description', $setting->chairman_description) !!}</textarea>
        @if ($errors->has('chairman_description'))
            <div class="invalid-feedback">
                {{ $errors->first('chairman_description') }}
            </div>
        @endif
        <span class="help-block">{{ trans('cruds.setting.fields.chairman_description_helper') }}</span>
    </div>
    <div class="form-group col-md-6">
        <label for="chairman_image">{{ trans('cruds.setting.fields.chairman_image') }}</label>
        <div class="needsclick dropzone {{ $errors->has('chairman_image') ? 'is-invalid' : '' }}"
            id="chairman_image-dropzone">
        </div>
        @if ($errors->has('chairman_image'))
            <div class="invalid-feedback">
                {{ $errors->first('chairman_image') }}
            </div>
        @endif
        <span class="help-block">{{ trans('cruds.setting.fields.chairman_image_helper') }}</span>
    </div>
</div>
