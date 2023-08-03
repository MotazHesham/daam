<div class="row"> 
    <div class="form-group col-md-4">
        <label for="description">{{ trans('cruds.setting.fields.description') }}</label>
        <textarea class="form-control ckeditor {{ $errors->has('description') ? 'is-invalid' : '' }}"
            name="description" id="description">{!! old('description', $setting->description) !!}</textarea>
        @if ($errors->has('description'))
            <div class="invalid-feedback">
                {{ $errors->first('description') }}
            </div>
        @endif
        <span class="help-block">{{ trans('cruds.setting.fields.description_helper') }}</span>
    </div>
    <div class="form-group col-md-4">
        <label class="required" for="vision">{{ trans('cruds.setting.fields.vision') }}</label>
        <textarea class="form-control {{ $errors->has('vision') ? 'is-invalid' : '' }}" name="vision" id="vision"
            required>{{ old('vision', $setting->vision) }}</textarea>
        @if ($errors->has('vision'))
            <div class="invalid-feedback">
                {{ $errors->first('vision') }}
            </div>
        @endif
        <span class="help-block">{{ trans('cruds.setting.fields.vision_helper') }}</span>
    </div>
    <div class="form-group col-md-4">
        <label class="required" for="mission">{{ trans('cruds.setting.fields.mission') }}</label>
        <textarea class="form-control {{ $errors->has('mission') ? 'is-invalid' : '' }}" name="mission" id="mission"
            required>{{ old('mission', $setting->mission) }}</textarea>
        @if ($errors->has('mission'))
            <div class="invalid-feedback">
                {{ $errors->first('mission') }}
            </div>
        @endif
        <span class="help-block">{{ trans('cruds.setting.fields.mission_helper') }}</span>
    </div>
    <div class="form-group col-md-4">
        <label for="about_image">{{ trans('cruds.setting.fields.about_image') }}</label>
        <div class="needsclick dropzone {{ $errors->has('about_image') ? 'is-invalid' : '' }}" id="about_image-dropzone">
        </div>
        @if ($errors->has('about_image'))
            <div class="invalid-feedback">
                {{ $errors->first('about_image') }}
            </div>
        @endif
        <span class="help-block">{{ trans('cruds.setting.fields.about_image_helper') }}</span>
    </div>
    <div class="form-group col-md-4">
        <label for="vision_image">{{ trans('cruds.setting.fields.vision_image') }}</label>
        <div class="needsclick dropzone {{ $errors->has('vision_image') ? 'is-invalid' : '' }}"
            id="vision_image-dropzone">
        </div>
        @if ($errors->has('vision_image'))
            <div class="invalid-feedback">
                {{ $errors->first('vision_image') }}
            </div>
        @endif
        <span class="help-block">{{ trans('cruds.setting.fields.vision_image_helper') }}</span>
    </div>
    <div class="form-group col-md-4">
        <label for="mission_image">{{ trans('cruds.setting.fields.mission_image') }}</label>
        <div class="needsclick dropzone {{ $errors->has('mission_image') ? 'is-invalid' : '' }}"
            id="mission_image-dropzone">
        </div>
        @if ($errors->has('mission_image'))
            <div class="invalid-feedback">
                {{ $errors->first('mission_image') }}
            </div>
        @endif
        <span class="help-block">{{ trans('cruds.setting.fields.mission_image_helper') }}</span>
    </div>
</div>
