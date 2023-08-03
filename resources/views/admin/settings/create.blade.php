@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.setting.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.settings.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="website_name">{{ trans('cruds.setting.fields.website_name') }}</label>
                <input class="form-control {{ $errors->has('website_name') ? 'is-invalid' : '' }}" type="text" name="website_name" id="website_name" value="{{ old('website_name', '') }}" required>
                @if($errors->has('website_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('website_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.setting.fields.website_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="email">{{ trans('cruds.setting.fields.email') }}</label>
                <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="email" name="email" id="email" value="{{ old('email') }}" required>
                @if($errors->has('email'))
                    <div class="invalid-feedback">
                        {{ $errors->first('email') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.setting.fields.email_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="phone_number">{{ trans('cruds.setting.fields.phone_number') }}</label>
                <input class="form-control {{ $errors->has('phone_number') ? 'is-invalid' : '' }}" type="text" name="phone_number" id="phone_number" value="{{ old('phone_number', '') }}" required>
                @if($errors->has('phone_number'))
                    <div class="invalid-feedback">
                        {{ $errors->first('phone_number') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.setting.fields.phone_number_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="facebook">{{ trans('cruds.setting.fields.facebook') }}</label>
                <input class="form-control {{ $errors->has('facebook') ? 'is-invalid' : '' }}" type="text" name="facebook" id="facebook" value="{{ old('facebook', '') }}" required>
                @if($errors->has('facebook'))
                    <div class="invalid-feedback">
                        {{ $errors->first('facebook') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.setting.fields.facebook_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="instagram">{{ trans('cruds.setting.fields.instagram') }}</label>
                <input class="form-control {{ $errors->has('instagram') ? 'is-invalid' : '' }}" type="text" name="instagram" id="instagram" value="{{ old('instagram', '') }}" required>
                @if($errors->has('instagram'))
                    <div class="invalid-feedback">
                        {{ $errors->first('instagram') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.setting.fields.instagram_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="logo">{{ trans('cruds.setting.fields.logo') }}</label>
                <div class="needsclick dropzone {{ $errors->has('logo') ? 'is-invalid' : '' }}" id="logo-dropzone">
                </div>
                @if($errors->has('logo'))
                    <div class="invalid-feedback">
                        {{ $errors->first('logo') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.setting.fields.logo_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="address">{{ trans('cruds.setting.fields.address') }}</label>
                <textarea class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}" name="address" id="address" required>{{ old('address') }}</textarea>
                @if($errors->has('address'))
                    <div class="invalid-feedback">
                        {{ $errors->first('address') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.setting.fields.address_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="tiktok">{{ trans('cruds.setting.fields.tiktok') }}</label>
                <input class="form-control {{ $errors->has('tiktok') ? 'is-invalid' : '' }}" type="text" name="tiktok" id="tiktok" value="{{ old('tiktok', '') }}" required>
                @if($errors->has('tiktok'))
                    <div class="invalid-feedback">
                        {{ $errors->first('tiktok') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.setting.fields.tiktok_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="youtube">{{ trans('cruds.setting.fields.youtube') }}</label>
                <input class="form-control {{ $errors->has('youtube') ? 'is-invalid' : '' }}" type="text" name="youtube" id="youtube" value="{{ old('youtube', '') }}" required>
                @if($errors->has('youtube'))
                    <div class="invalid-feedback">
                        {{ $errors->first('youtube') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.setting.fields.youtube_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="divorced_count">{{ trans('cruds.setting.fields.divorced_count') }}</label>
                <input class="form-control {{ $errors->has('divorced_count') ? 'is-invalid' : '' }}" type="text" name="divorced_count" id="divorced_count" value="{{ old('divorced_count', '') }}">
                @if($errors->has('divorced_count'))
                    <div class="invalid-feedback">
                        {{ $errors->first('divorced_count') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.setting.fields.divorced_count_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="widow_count">{{ trans('cruds.setting.fields.widow_count') }}</label>
                <input class="form-control {{ $errors->has('widow_count') ? 'is-invalid' : '' }}" type="text" name="widow_count" id="widow_count" value="{{ old('widow_count', '') }}">
                @if($errors->has('widow_count'))
                    <div class="invalid-feedback">
                        {{ $errors->first('widow_count') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.setting.fields.widow_count_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="child_count">{{ trans('cruds.setting.fields.child_count') }}</label>
                <input class="form-control {{ $errors->has('child_count') ? 'is-invalid' : '' }}" type="text" name="child_count" id="child_count" value="{{ old('child_count', '') }}">
                @if($errors->has('child_count'))
                    <div class="invalid-feedback">
                        {{ $errors->first('child_count') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.setting.fields.child_count_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="unit_count">{{ trans('cruds.setting.fields.unit_count') }}</label>
                <input class="form-control {{ $errors->has('unit_count') ? 'is-invalid' : '' }}" type="text" name="unit_count" id="unit_count" value="{{ old('unit_count', '') }}">
                @if($errors->has('unit_count'))
                    <div class="invalid-feedback">
                        {{ $errors->first('unit_count') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.setting.fields.unit_count_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="building_count">{{ trans('cruds.setting.fields.building_count') }}</label>
                <input class="form-control {{ $errors->has('building_count') ? 'is-invalid' : '' }}" type="text" name="building_count" id="building_count" value="{{ old('building_count', '') }}">
                @if($errors->has('building_count'))
                    <div class="invalid-feedback">
                        {{ $errors->first('building_count') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.setting.fields.building_count_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="beneficiary_count">{{ trans('cruds.setting.fields.beneficiary_count') }}</label>
                <input class="form-control {{ $errors->has('beneficiary_count') ? 'is-invalid' : '' }}" type="text" name="beneficiary_count" id="beneficiary_count" value="{{ old('beneficiary_count', '') }}">
                @if($errors->has('beneficiary_count'))
                    <div class="invalid-feedback">
                        {{ $errors->first('beneficiary_count') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.setting.fields.beneficiary_count_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="chairman_description">{{ trans('cruds.setting.fields.chairman_description') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('chairman_description') ? 'is-invalid' : '' }}" name="chairman_description" id="chairman_description">{!! old('chairman_description') !!}</textarea>
                @if($errors->has('chairman_description'))
                    <div class="invalid-feedback">
                        {{ $errors->first('chairman_description') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.setting.fields.chairman_description_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="chairman_image">{{ trans('cruds.setting.fields.chairman_image') }}</label>
                <div class="needsclick dropzone {{ $errors->has('chairman_image') ? 'is-invalid' : '' }}" id="chairman_image-dropzone">
                </div>
                @if($errors->has('chairman_image'))
                    <div class="invalid-feedback">
                        {{ $errors->first('chairman_image') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.setting.fields.chairman_image_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="about_image">{{ trans('cruds.setting.fields.about_image') }}</label>
                <div class="needsclick dropzone {{ $errors->has('about_image') ? 'is-invalid' : '' }}" id="about_image-dropzone">
                </div>
                @if($errors->has('about_image'))
                    <div class="invalid-feedback">
                        {{ $errors->first('about_image') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.setting.fields.about_image_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="vision_image">{{ trans('cruds.setting.fields.vision_image') }}</label>
                <div class="needsclick dropzone {{ $errors->has('vision_image') ? 'is-invalid' : '' }}" id="vision_image-dropzone">
                </div>
                @if($errors->has('vision_image'))
                    <div class="invalid-feedback">
                        {{ $errors->first('vision_image') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.setting.fields.vision_image_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="mission_image">{{ trans('cruds.setting.fields.mission_image') }}</label>
                <div class="needsclick dropzone {{ $errors->has('mission_image') ? 'is-invalid' : '' }}" id="mission_image-dropzone">
                </div>
                @if($errors->has('mission_image'))
                    <div class="invalid-feedback">
                        {{ $errors->first('mission_image') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.setting.fields.mission_image_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="profile">{{ trans('cruds.setting.fields.profile') }}</label>
                <div class="needsclick dropzone {{ $errors->has('profile') ? 'is-invalid' : '' }}" id="profile-dropzone">
                </div>
                @if($errors->has('profile'))
                    <div class="invalid-feedback">
                        {{ $errors->first('profile') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.setting.fields.profile_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="iskan_description">{{ trans('cruds.setting.fields.iskan_description') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('iskan_description') ? 'is-invalid' : '' }}" name="iskan_description" id="iskan_description">{!! old('iskan_description') !!}</textarea>
                @if($errors->has('iskan_description'))
                    <div class="invalid-feedback">
                        {{ $errors->first('iskan_description') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.setting.fields.iskan_description_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="iskan_terms">{{ trans('cruds.setting.fields.iskan_terms') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('iskan_terms') ? 'is-invalid' : '' }}" name="iskan_terms" id="iskan_terms">{!! old('iskan_terms') !!}</textarea>
                @if($errors->has('iskan_terms'))
                    <div class="invalid-feedback">
                        {{ $errors->first('iskan_terms') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.setting.fields.iskan_terms_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="iskan_info">{{ trans('cruds.setting.fields.iskan_info') }}</label>
                <div class="needsclick dropzone {{ $errors->has('iskan_info') ? 'is-invalid' : '' }}" id="iskan_info-dropzone">
                </div>
                @if($errors->has('iskan_info'))
                    <div class="invalid-feedback">
                        {{ $errors->first('iskan_info') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.setting.fields.iskan_info_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="iskan_tutorial">{{ trans('cruds.setting.fields.iskan_tutorial') }}</label>
                <div class="needsclick dropzone {{ $errors->has('iskan_tutorial') ? 'is-invalid' : '' }}" id="iskan_tutorial-dropzone">
                </div>
                @if($errors->has('iskan_tutorial'))
                    <div class="invalid-feedback">
                        {{ $errors->first('iskan_tutorial') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.setting.fields.iskan_tutorial_helper') }}</span>
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

@section('scripts')
<script>
    Dropzone.options.logoDropzone = {
    url: '{{ route('admin.settings.storeMedia') }}',
    maxFilesize: 4, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 4,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').find('input[name="logo"]').remove()
      $('form').append('<input type="hidden" name="logo" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="logo"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($setting) && $setting->logo)
      var file = {!! json_encode($setting->logo) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="logo" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
@endif
    },
    error: function (file, response) {
        if ($.type(response) === 'string') {
            var message = response //dropzone sends it's own error messages in string
        } else {
            var message = response.errors.file
        }
        file.previewElement.classList.add('dz-error')
        _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
        _results = []
        for (_i = 0, _len = _ref.length; _i < _len; _i++) {
            node = _ref[_i]
            _results.push(node.textContent = message)
        }

        return _results
    }
}

</script>
<script>
    $(document).ready(function () {
  function SimpleUploadAdapter(editor) {
    editor.plugins.get('FileRepository').createUploadAdapter = function(loader) {
      return {
        upload: function() {
          return loader.file
            .then(function (file) {
              return new Promise(function(resolve, reject) {
                // Init request
                var xhr = new XMLHttpRequest();
                xhr.open('POST', '{{ route('admin.settings.storeCKEditorImages') }}', true);
                xhr.setRequestHeader('x-csrf-token', window._token);
                xhr.setRequestHeader('Accept', 'application/json');
                xhr.responseType = 'json';

                // Init listeners
                var genericErrorText = `Couldn't upload file: ${ file.name }.`;
                xhr.addEventListener('error', function() { reject(genericErrorText) });
                xhr.addEventListener('abort', function() { reject() });
                xhr.addEventListener('load', function() {
                  var response = xhr.response;

                  if (!response || xhr.status !== 201) {
                    return reject(response && response.message ? `${genericErrorText}\n${xhr.status} ${response.message}` : `${genericErrorText}\n ${xhr.status} ${xhr.statusText}`);
                  }

                  $('form').append('<input type="hidden" name="ck-media[]" value="' + response.id + '">');

                  resolve({ default: response.url });
                });

                if (xhr.upload) {
                  xhr.upload.addEventListener('progress', function(e) {
                    if (e.lengthComputable) {
                      loader.uploadTotal = e.total;
                      loader.uploaded = e.loaded;
                    }
                  });
                }

                // Send request
                var data = new FormData();
                data.append('upload', file);
                data.append('crud_id', '{{ $setting->id ?? 0 }}');
                xhr.send(data);
              });
            })
        }
      };
    }
  }

  var allEditors = document.querySelectorAll('.ckeditor');
  for (var i = 0; i < allEditors.length; ++i) {
    ClassicEditor.create(
      allEditors[i], {
        extraPlugins: [SimpleUploadAdapter]
      }
    );
  }
});
</script>

<script>
    Dropzone.options.chairmanImageDropzone = {
    url: '{{ route('admin.settings.storeMedia') }}',
    maxFilesize: 2, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').find('input[name="chairman_image"]').remove()
      $('form').append('<input type="hidden" name="chairman_image" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="chairman_image"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($setting) && $setting->chairman_image)
      var file = {!! json_encode($setting->chairman_image) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="chairman_image" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
@endif
    },
    error: function (file, response) {
        if ($.type(response) === 'string') {
            var message = response //dropzone sends it's own error messages in string
        } else {
            var message = response.errors.file
        }
        file.previewElement.classList.add('dz-error')
        _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
        _results = []
        for (_i = 0, _len = _ref.length; _i < _len; _i++) {
            node = _ref[_i]
            _results.push(node.textContent = message)
        }

        return _results
    }
}

</script>
<script>
    Dropzone.options.aboutImageDropzone = {
    url: '{{ route('admin.settings.storeMedia') }}',
    maxFilesize: 2, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').find('input[name="about_image"]').remove()
      $('form').append('<input type="hidden" name="about_image" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="about_image"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($setting) && $setting->about_image)
      var file = {!! json_encode($setting->about_image) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="about_image" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
@endif
    },
    error: function (file, response) {
        if ($.type(response) === 'string') {
            var message = response //dropzone sends it's own error messages in string
        } else {
            var message = response.errors.file
        }
        file.previewElement.classList.add('dz-error')
        _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
        _results = []
        for (_i = 0, _len = _ref.length; _i < _len; _i++) {
            node = _ref[_i]
            _results.push(node.textContent = message)
        }

        return _results
    }
}

</script>
<script>
    Dropzone.options.visionImageDropzone = {
    url: '{{ route('admin.settings.storeMedia') }}',
    maxFilesize: 2, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').find('input[name="vision_image"]').remove()
      $('form').append('<input type="hidden" name="vision_image" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="vision_image"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($setting) && $setting->vision_image)
      var file = {!! json_encode($setting->vision_image) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="vision_image" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
@endif
    },
    error: function (file, response) {
        if ($.type(response) === 'string') {
            var message = response //dropzone sends it's own error messages in string
        } else {
            var message = response.errors.file
        }
        file.previewElement.classList.add('dz-error')
        _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
        _results = []
        for (_i = 0, _len = _ref.length; _i < _len; _i++) {
            node = _ref[_i]
            _results.push(node.textContent = message)
        }

        return _results
    }
}

</script>
<script>
    Dropzone.options.missionImageDropzone = {
    url: '{{ route('admin.settings.storeMedia') }}',
    maxFilesize: 2, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').find('input[name="mission_image"]').remove()
      $('form').append('<input type="hidden" name="mission_image" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="mission_image"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($setting) && $setting->mission_image)
      var file = {!! json_encode($setting->mission_image) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="mission_image" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
@endif
    },
    error: function (file, response) {
        if ($.type(response) === 'string') {
            var message = response //dropzone sends it's own error messages in string
        } else {
            var message = response.errors.file
        }
        file.previewElement.classList.add('dz-error')
        _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
        _results = []
        for (_i = 0, _len = _ref.length; _i < _len; _i++) {
            node = _ref[_i]
            _results.push(node.textContent = message)
        }

        return _results
    }
}

</script>
<script>
    Dropzone.options.profileDropzone = {
    url: '{{ route('admin.settings.storeMedia') }}',
    maxFilesize: 10, // MB
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 10
    },
    success: function (file, response) {
      $('form').find('input[name="profile"]').remove()
      $('form').append('<input type="hidden" name="profile" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="profile"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($setting) && $setting->profile)
      var file = {!! json_encode($setting->profile) !!}
          this.options.addedfile.call(this, file)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="profile" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
@endif
    },
     error: function (file, response) {
         if ($.type(response) === 'string') {
             var message = response //dropzone sends it's own error messages in string
         } else {
             var message = response.errors.file
         }
         file.previewElement.classList.add('dz-error')
         _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
         _results = []
         for (_i = 0, _len = _ref.length; _i < _len; _i++) {
             node = _ref[_i]
             _results.push(node.textContent = message)
         }

         return _results
     }
}
</script>
<script>
    Dropzone.options.iskanInfoDropzone = {
    url: '{{ route('admin.settings.storeMedia') }}',
    maxFilesize: 5, // MB
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 5
    },
    success: function (file, response) {
      $('form').find('input[name="iskan_info"]').remove()
      $('form').append('<input type="hidden" name="iskan_info" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="iskan_info"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($setting) && $setting->iskan_info)
      var file = {!! json_encode($setting->iskan_info) !!}
          this.options.addedfile.call(this, file)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="iskan_info" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
@endif
    },
     error: function (file, response) {
         if ($.type(response) === 'string') {
             var message = response //dropzone sends it's own error messages in string
         } else {
             var message = response.errors.file
         }
         file.previewElement.classList.add('dz-error')
         _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
         _results = []
         for (_i = 0, _len = _ref.length; _i < _len; _i++) {
             node = _ref[_i]
             _results.push(node.textContent = message)
         }

         return _results
     }
}
</script>
<script>
    Dropzone.options.iskanTutorialDropzone = {
    url: '{{ route('admin.settings.storeMedia') }}',
    maxFilesize: 50, // MB
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 50
    },
    success: function (file, response) {
      $('form').find('input[name="iskan_tutorial"]').remove()
      $('form').append('<input type="hidden" name="iskan_tutorial" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="iskan_tutorial"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($setting) && $setting->iskan_tutorial)
      var file = {!! json_encode($setting->iskan_tutorial) !!}
          this.options.addedfile.call(this, file)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="iskan_tutorial" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
@endif
    },
     error: function (file, response) {
         if ($.type(response) === 'string') {
             var message = response //dropzone sends it's own error messages in string
         } else {
             var message = response.errors.file
         }
         file.previewElement.classList.add('dz-error')
         _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
         _results = []
         for (_i = 0, _len = _ref.length; _i < _len; _i++) {
             node = _ref[_i]
             _results.push(node.textContent = message)
         }

         return _results
     }
}
</script>
@endsection