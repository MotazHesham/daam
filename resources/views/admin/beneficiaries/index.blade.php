@extends('layouts.admin')
@section('styles')
<style>
    .progressbar {
        display: flex;
        justify-content: space-between;
        position: relative;
        margin-bottom: 20px;
    }
    .progressbar::before {
        content: '';
        position: absolute;
        top: 50%;
        left: 0;
        width: 100%;
        height: 2px;
        background-color: #ddd;
        z-index: 0;
    }
    .progress-step {
        z-index: 1;
        display: flex;
        flex-direction: column;
        align-items: center;
        width: 100%;
        position: relative;
    }
    .progress-step .step-circle {
        width: 30px;
        height: 30px;
        border-radius: 50%;
        background-color: #ddd;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .progress-step .step-title {
        margin-top: 10px;
        font-size: 14px;
    }
    .progress-step.active .step-circle {
        background-color: #0d6efd;
        color: #fff;
    }
    .progress-step.error .step-circle {
        background-color: red;
        color: #fff;
    }
    .progress-step.warning .step-circle {
        background-color: yellow;
        color: #fff;
    }
    .progress-step.completed .step-circle {
        background-color: green;
        color: #fff;
    }
</style> 
@endsection
@section('content')
    @can('beneficiary_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.beneficiaries.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.beneficiary.title_singular') }}
                </a>
                <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                    {{ trans('global.app_csvImport') }}
                </button>
                @include('csvImport.modal', [
                    'model' => 'Beneficiary',
                    'route' => 'admin.beneficiaries.parseCsvImport',
                ])
            </div>
        </div>
    @endcan
    
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">صرف الطلب</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route("admin.beneficiaries.status2") }}" enctype="multipart/form-data"> 
                        @csrf 
                        <input type="hidden" name="id" id="beneficiary_id">
                        <input type="hidden" name="status" value="done">
                        <div class="form-group">
                            <label class="required" for="donation_id">المتبرع</label>
                            <select class="form-control select2 {{ $errors->has('category') ? 'is-invalid' : '' }}" name="donation_id" id="donation_id" required>
                                @foreach($donations as $id => $entry)
                                    <option value="{{ $id }}" {{ old('donation_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('donation'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('donation') }}
                                </div>
                            @endif 
                        </div>
                        <div class="form-group">
                            <label for="amount">{{ trans('cruds.beneficiary.fields.amount') }}</label>
                            <input class="form-control {{ $errors->has('amount') ? 'is-invalid' : '' }}" type="number" name="amount" id="amount" value="{{ old('amount') }}" step="0.01">
                            @if($errors->has('amount'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('amount') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.beneficiary.fields.amount_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="attachments">{{ trans('cruds.beneficiary.fields.attachments') }}</label>
                            <div class="needsclick dropzone {{ $errors->has('attachments') ? 'is-invalid' : '' }}" id="attachments-dropzone">
                            </div>
                            @if($errors->has('attachments'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('attachments') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.beneficiary.fields.attachments_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="notes">{{ trans('cruds.beneficiary.fields.notes') }}</label>
                            <textarea class="form-control {{ $errors->has('notes') ? 'is-invalid' : '' }}" name="notes" id="notes">{{ old('notes') }}</textarea>
                            @if($errors->has('notes'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('notes') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.beneficiary.fields.notes_helper') }}</span>
                        </div> 
                        <div class="form-group">
                            <button class="btn btn-danger" type="submit">
                                {{ trans('global.save') }}
                            </button>
                        </div>
                    </form>
                </div> 
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">الغاء الطلب</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route("admin.beneficiaries.status2") }}" enctype="multipart/form-data"> 
                        @csrf 
                        <input type="hidden" name="id" id="beneficiary_id2">
                        <input type="hidden" name="status" value="cancel"> 
                        <div class="form-group">
                            <label for="cancel_reason">{{ trans('cruds.beneficiary.fields.cancel_reason') }}</label>
                            <textarea class="form-control {{ $errors->has('cancel_reason') ? 'is-invalid' : '' }}" name="cancel_reason"
                                id="cancel_reason">{{ old('cancel_reason') }}</textarea>
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
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            {{ trans('cruds.beneficiary.title_singular') }} {{ trans('global.list') }}
        </div>

        <div class="card-body">
            <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-Beneficiary">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.beneficiary.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.beneficiary.fields.name') }}
                        </th>
                        <th>
                            {{ trans('cruds.beneficiary.fields.phone') }}
                        </th>
                        <th>
                            {{ trans('cruds.beneficiary.fields.marrige_status') }}
                        </th>
                        <th>
                            {{ trans('cruds.beneficiary.fields.user') }}
                        </th> 
                        <th>
                            {{ trans('cruds.beneficiary.fields.status') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
@endsection
@section('scripts')
    @parent
    <script>
        $(function() {
            let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons) 

            let dtOverrideGlobals = {
                buttons: dtButtons,
                processing: true,
                serverSide: true,
                retrieve: true,
                aaSorting: [],
                ajax: "{{ route('admin.beneficiaries.index') }}",
                columns: [{
                        data: 'placeholder',
                        name: 'placeholder'
                    },
                    {
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'phone',
                        name: 'phone'
                    },
                    {
                        data: 'marrige_status',
                        name: 'marrige_status'
                    },
                    {
                        data: 'user_name',
                        name: 'user.name'
                    }, 
                    {
                        data: 'status',
                        name: 'status'
                    },
                    {
                        data: 'actions',
                        name: '{{ trans('global.actions') }}'
                    }
                ],
                orderCellsTop: true,
                order: [
                    [1, 'desc']
                ],
                pageLength: 25,
            };
            let table = $('.datatable-Beneficiary').DataTable(dtOverrideGlobals);
            $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e) {
                $($.fn.dataTable.tables(true)).DataTable()
                    .columns.adjust();
            });

        });
    </script>
    
    <script>
        function changeBenificiaryId(id){
            $('#beneficiary_id').val(id);
            $('#beneficiary_id2').val(id);
        }
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
