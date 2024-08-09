@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            {{ trans('global.edit') }} {{ trans('cruds.beneficiary.title_singular') }}
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('admin.beneficiaries.update', [$beneficiary->id]) }}"
                enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label for="name">{{ trans('cruds.beneficiary.fields.name') }}</label>
                    <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name"
                        id="name" value="{{ old('name', $beneficiary->name) }}">
                    @if ($errors->has('name'))
                        <div class="invalid-feedback">
                            {{ $errors->first('name') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.beneficiary.fields.name_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="phone">{{ trans('cruds.beneficiary.fields.phone') }}</label>
                    <input class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}" type="text"
                        name="phone" id="phone" value="{{ old('phone', $beneficiary->phone) }}">
                    @if ($errors->has('phone'))
                        <div class="invalid-feedback">
                            {{ $errors->first('phone') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.beneficiary.fields.phone_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="address">{{ trans('cruds.beneficiary.fields.address') }}</label>
                    <input class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}" type="text"
                        name="address" id="address" value="{{ old('address', $beneficiary->address) }}">
                    @if ($errors->has('address'))
                        <div class="invalid-feedback">
                            {{ $errors->first('address') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.beneficiary.fields.address_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="identity_num">{{ trans('cruds.beneficiary.fields.identity_num') }}</label>
                    <input class="form-control {{ $errors->has('identity_num') ? 'is-invalid' : '' }}" type="text"
                        name="identity_num" id="identity_num"
                        value="{{ old('identity_num', $beneficiary->identity_num) }}">
                    @if ($errors->has('identity_num'))
                        <div class="invalid-feedback">
                            {{ $errors->first('identity_num') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.beneficiary.fields.identity_num_helper') }}</span>
                </div>
                <div class="form-group">
                    <label>{{ trans('cruds.beneficiary.fields.marrige_status') }}</label>
                    <select class="form-control {{ $errors->has('marrige_status') ? 'is-invalid' : '' }}"
                        name="marrige_status" id="marrige_status">
                        <option value disabled {{ old('marrige_status', null) === null ? 'selected' : '' }}>
                            {{ trans('global.pleaseSelect') }}</option>
                        @foreach (App\Models\Beneficiary::MARRIGE_STATUS_SELECT as $key => $label)
                            <option value="{{ $key }}"
                                {{ old('marrige_status', $beneficiary->marrige_status) === (string) $key ? 'selected' : '' }}>
                                {{ $label }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('marrige_status'))
                        <div class="invalid-feedback">
                            {{ $errors->first('marrige_status') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.beneficiary.fields.marrige_status_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="needs_title">{{ trans('cruds.beneficiary.fields.needs_title') }}</label>
                    <input class="form-control {{ $errors->has('needs_title') ? 'is-invalid' : '' }}" type="text"
                        name="needs_title" id="needs_title" value="{{ old('needs_title', $beneficiary->needs_title) }}">
                    @if ($errors->has('needs_title'))
                        <div class="invalid-feedback">
                            {{ $errors->first('needs_title') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.beneficiary.fields.needs_title_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="needs">{{ trans('cruds.beneficiary.fields.needs') }}</label>
                    <textarea class="form-control {{ $errors->has('needs') ? 'is-invalid' : '' }}" name="needs" id="needs">{{ old('needs', $beneficiary->needs) }}</textarea>
                    @if ($errors->has('needs'))
                        <div class="invalid-feedback">
                            {{ $errors->first('needs') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.beneficiary.fields.needs_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="age">{{ trans('cruds.beneficiary.fields.age') }}</label>
                    <input class="form-control {{ $errors->has('age') ? 'is-invalid' : '' }}" type="number" name="age"
                        id="age" value="{{ old('age', $beneficiary->age) }}" step="1">
                    @if ($errors->has('age'))
                        <div class="invalid-feedback">
                            {{ $errors->first('age') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.beneficiary.fields.age_helper') }}</span>
                </div>
                <div class="form-group">
                    <label>{{ trans('cruds.beneficiary.fields.status') }}</label>
                    <select class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}" name="status"
                        id="status">
                        <option value disabled {{ old('status', null) === null ? 'selected' : '' }}>
                            {{ trans('global.pleaseSelect') }}</option>
                        @foreach (App\Models\Beneficiary::STATUS_SELECT as $key => $label)
                            <option value="{{ $key }}"
                                {{ old('status', $beneficiary->status) === (string) $key ? 'selected' : '' }}>
                                {{ $label }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('status'))
                        <div class="invalid-feedback">
                            {{ $errors->first('status') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.beneficiary.fields.status_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="user_id">{{ trans('cruds.beneficiary.fields.user') }}</label>
                    <select class="form-control select2 {{ $errors->has('user') ? 'is-invalid' : '' }}" name="user_id"
                        id="user_id">
                        @foreach ($users as $id => $entry)
                            <option value="{{ $id }}"
                                {{ (old('user_id') ? old('user_id') : $beneficiary->user->id ?? '') == $id ? 'selected' : '' }}>
                                {{ $entry }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('user'))
                        <div class="invalid-feedback">
                            {{ $errors->first('user') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.beneficiary.fields.user_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="date">{{ trans('cruds.beneficiary.fields.date') }}</label>
                    <input class="form-control date {{ $errors->has('date') ? 'is-invalid' : '' }}" type="text"
                        name="date" id="date" value="{{ old('date', $beneficiary->date) }}">
                    @if ($errors->has('date'))
                        <div class="invalid-feedback">
                            {{ $errors->first('date') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.beneficiary.fields.date_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="amount">{{ trans('cruds.beneficiary.fields.amount') }}</label>
                    <input class="form-control {{ $errors->has('amount') ? 'is-invalid' : '' }}" type="number"
                        name="amount" id="amount" value="{{ old('amount', $beneficiary->amount) }}" step="0.01">
                    @if ($errors->has('amount'))
                        <div class="invalid-feedback">
                            {{ $errors->first('amount') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.beneficiary.fields.amount_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="attachments">{{ trans('cruds.beneficiary.fields.attachments') }}</label>
                    <div class="needsclick dropzone {{ $errors->has('attachments') ? 'is-invalid' : '' }}"
                        id="attachments-dropzone">
                    </div>
                    @if ($errors->has('attachments'))
                        <div class="invalid-feedback">
                            {{ $errors->first('attachments') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.beneficiary.fields.attachments_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="notes">{{ trans('cruds.beneficiary.fields.notes') }}</label>
                    <textarea class="form-control {{ $errors->has('notes') ? 'is-invalid' : '' }}" name="notes" id="notes">{{ old('notes', $beneficiary->notes) }}</textarea>
                    @if ($errors->has('notes'))
                        <div class="invalid-feedback">
                            {{ $errors->first('notes') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.beneficiary.fields.notes_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="cancel_reason">{{ trans('cruds.beneficiary.fields.cancel_reason') }}</label>
                    <textarea class="form-control {{ $errors->has('cancel_reason') ? 'is-invalid' : '' }}" name="cancel_reason"
                        id="cancel_reason">{{ old('cancel_reason', $beneficiary->cancel_reason) }}</textarea>
                    @if ($errors->has('cancel_reason'))
                        <div class="invalid-feedback">
                            {{ $errors->first('cancel_reason') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.beneficiary.fields.cancel_reason_helper') }}</span>
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
        var uploadedAttachmentsMap = {}
        Dropzone.options.attachmentsDropzone = {
            url: '{{ route('admin.beneficiaries.storeMedia') }}',
            maxFilesize: 4, // MB
            addRemoveLinks: true,
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            params: {
                size: 4
            },
            success: function(file, response) {
                $('form').append('<input type="hidden" name="attachments[]" value="' + response.name + '">')
                uploadedAttachmentsMap[file.name] = response.name
            },
            removedfile: function(file) {
                file.previewElement.remove()
                var name = ''
                if (typeof file.file_name !== 'undefined') {
                    name = file.file_name
                } else {
                    name = uploadedAttachmentsMap[file.name]
                }
                $('form').find('input[name="attachments[]"][value="' + name + '"]').remove()
            },
            init: function() {
                @if (isset($beneficiary) && $beneficiary->attachments)
                    var files =
                        {!! json_encode($beneficiary->attachments) !!}
                    for (var i in files) {
                        var file = files[i]
                        this.options.addedfile.call(this, file)
                        file.previewElement.classList.add('dz-complete')
                        $('form').append('<input type="hidden" name="attachments[]" value="' + file.file_name +
                            '">')
                    }
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
