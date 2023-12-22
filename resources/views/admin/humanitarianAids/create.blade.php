@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            {{ trans('global.create') }} {{ trans('cruds.humanitarianAid.title_singular') }}
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('admin.humanitarian-aids.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label class="required" for="type">{{ trans('cruds.humanitarianAid.fields.type') }}</label>
                    <input class="form-control {{ $errors->has('type') ? 'is-invalid' : '' }}" type="text" name="type"
                        id="type" value="{{ old('type', '') }}" required>
                    @if ($errors->has('type'))
                        <div class="invalid-feedback">
                            {{ $errors->first('type') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.humanitarianAid.fields.type_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="aid_number">{{ trans('cruds.humanitarianAid.fields.aid_number') }}</label>
                    <input class="form-control {{ $errors->has('aid_number') ? 'is-invalid' : '' }}" type="number"
                        name="aid_number" id="aid_number" value="{{ old('aid_number', '') }}" step="1" required>
                    @if ($errors->has('aid_number'))
                        <div class="invalid-feedback">
                            {{ $errors->first('aid_number') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.humanitarianAid.fields.aid_number_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required"
                        for="unit_of_aid">{{ trans('cruds.humanitarianAid.fields.unit_of_aid') }}</label>
                    <input class="form-control {{ $errors->has('unit_of_aid') ? 'is-invalid' : '' }}" type="text"
                        name="unit_of_aid" id="unit_of_aid" value="{{ old('unit_of_aid', '') }}" required>
                    @if ($errors->has('unit_of_aid'))
                        <div class="invalid-feedback">
                            {{ $errors->first('unit_of_aid') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.humanitarianAid.fields.unit_of_aid_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="icon">{{ trans('cruds.humanitarianAid.fields.icon') }}</label>
                    <div class="needsclick dropzone {{ $errors->has('icon') ? 'is-invalid' : '' }}" id="icon-dropzone">
                    </div>
                    @if ($errors->has('icon'))
                        <div class="invalid-feedback">
                            {{ $errors->first('icon') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.humanitarianAid.fields.icon_helper') }}</span>
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
        Dropzone.options.iconDropzone = {
            url: '{{ route('admin.humanitarian-aids.storeMedia') }}',
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
            success: function(file, response) {
                $('form').find('input[name="icon"]').remove()
                $('form').append('<input type="hidden" name="icon" value="' + response.name + '">')
            },
            removedfile: function(file) {
                file.previewElement.remove()
                if (file.status !== 'error') {
                    $('form').find('input[name="icon"]').remove()
                    this.options.maxFiles = this.options.maxFiles + 1
                }
            },
            init: function() {
                @if (isset($humanitarianAid) && $humanitarianAid->icon)
                    var file = {!! json_encode($humanitarianAid->icon) !!}
                    this.options.addedfile.call(this, file)
                    this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
                    file.previewElement.classList.add('dz-complete')
                    $('form').append('<input type="hidden" name="icon" value="' + file.file_name + '">')
                    this.options.maxFiles = this.options.maxFiles - 1
                @endif
            },
            error: function(file, response) {
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
