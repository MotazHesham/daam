@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.slider.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.sliders.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="text_1">{{ trans('cruds.slider.fields.text_1') }}</label>
                <input class="form-control {{ $errors->has('text_1') ? 'is-invalid' : '' }}" type="text" name="text_1" id="text_1" value="{{ old('text_1', '') }}">
                @if($errors->has('text_1'))
                    <div class="invalid-feedback">
                        {{ $errors->first('text_1') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.slider.fields.text_1_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="text_2">{{ trans('cruds.slider.fields.text_2') }}</label>
                <input class="form-control {{ $errors->has('text_2') ? 'is-invalid' : '' }}" type="text" name="text_2" id="text_2" value="{{ old('text_2', '') }}">
                @if($errors->has('text_2'))
                    <div class="invalid-feedback">
                        {{ $errors->first('text_2') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.slider.fields.text_2_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="image">{{ trans('cruds.slider.fields.image') }}</label>
                <div class="needsclick dropzone {{ $errors->has('image') ? 'is-invalid' : '' }}" id="image-dropzone">
                </div>
                @if($errors->has('image'))
                    <div class="invalid-feedback">
                        {{ $errors->first('image') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.slider.fields.image_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="button_name">{{ trans('cruds.slider.fields.button_name') }}</label>
                <input class="form-control {{ $errors->has('button_name') ? 'is-invalid' : '' }}" type="text" name="button_name" id="button_name" value="{{ old('button_name', '') }}" required>
                @if($errors->has('button_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('button_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.slider.fields.button_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="link">{{ trans('cruds.slider.fields.link') }}</label>
                <input class="form-control {{ $errors->has('link') ? 'is-invalid' : '' }}" type="text" name="link" id="link" value="{{ old('link', '') }}">
                @if($errors->has('link'))
                    <div class="invalid-feedback">
                        {{ $errors->first('link') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.slider.fields.link_helper') }}</span>
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
    Dropzone.options.imageDropzone = {
    url: '{{ route('admin.sliders.storeMedia') }}',
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
      $('form').find('input[name="image"]').remove()
      $('form').append('<input type="hidden" name="image" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="image"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($slider) && $slider->image)
      var file = {!! json_encode($slider->image) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="image" value="' + file.file_name + '">')
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