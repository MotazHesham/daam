@extends('layouts.admin')
@section('content') 
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="#" onclick="copyToClipboard()">
                رابط التسجيل
            </a>
        </div>
    </div> 
    <div class="card">
        <div class="card-header">
            {{ trans('cruds.mempership.title_singular') }} {{ trans('global.list') }}
        </div>

        <div class="card-body">
            <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-Mempership">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.mempership.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.mempership.fields.first_name') }}
                        </th>
                        <th>
                            {{ trans('cruds.mempership.fields.last_name') }}
                        </th>
                        <th>
                            {{ trans('cruds.mempership.fields.identity_num') }}
                        </th>
                        <th>
                            {{ trans('cruds.mempership.fields.city') }}
                        </th>
                        <th>
                            {{ trans('cruds.mempership.fields.job') }}
                        </th>
                        <th>
                            {{ trans('cruds.mempership.fields.phone') }}
                        </th>
                        <th>
                            {{ trans('cruds.mempership.fields.certificate_sent') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="AjaxModal" tabindex="-1" aria-labelledby="AjaxModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">أرسال الشهادة</b>
                    </h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">x</button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.memperships.update_certificate') }}" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="0" id="mempership_id">
                        <div class="row"> 
                            <div class="form-group col-md-6">
                                <label for="session_num">رقم الجلسة</label>
                                <input type="text" class="form-control" name="session_num" id="session_num" value="" required>
                            </div>
                            <div class="form-group col-md-6">
                                
                                <label for="session_date">تاريخ الجلسة</label>
                                <input type="text" class="form-control  hijri-date-input" name="session_date" id="session_date" value="" required>
                            </div>
                            <div class="form-group col-md-6">

                                <label for="accepted_from">تاريخ قبول العضوية</label>
                                <input type="text" class="form-control hijri-date-input" name="accepted_from" id="accepted_from" value="" required>
                            </div>
                            <div class="form-group col-md-6">

                                <label for="mempership_num">رقم العضوية</label>
                                <input type="text" class="form-control" name="mempership_num" id="mempership_num" value="" required>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-warning">حفظ الشهادة</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    @parent
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment-with-locales.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/moment-hijri@2.1.2/moment-hijri.min.js"></script>
    <script src="{{ asset('hijri-date-picker-bootstrap/dist/js/bootstrap-hijri-datetimepicker.js?v2') }}"></script> 
    <script>
        
        $(function () {
            initHijrDatePicker();

            initHijrDatePickerDefault();

            $(".disable-date").hijriDatePicker({
                minDate: "2020-01-01",
                maxDate: "2021-01-01",
                viewMode: "years",
                hijri: true,
                debug: true,
            });
        });

        function initHijrDatePicker() {
            $(".hijri-date-input").hijriDatePicker({
                locale: "ar-sa",
                format: "DD-MM-YYYY",
                hijriFormat: "iDD/iMM/iYYYY",
                dayViewHeaderFormat: "MMMM YYYY",
                hijriDayViewHeaderFormat: "iMMMM iYYYY",
                showSwitcher: false,
                allowInputToggle: true,
                showTodayButton: false,
                useCurrent: true,
                isRTL: false,
                viewMode: "months",
                keepOpen: false,
                hijri: true,
                debug: true,
                showClear: true,
                showTodayButton: true,
                showClose: true,
            });
        }

        function initHijrDatePickerDefault() {
            $(".hijri-date-default").hijriDatePicker();
        }
    </script>
    <script>
        
        function copyToClipboard() {
            // Get the text field
            var copyText = "{{ route('frontend.joining_form_1') }}"; 
            
            // Copy the text inside the text field
            navigator.clipboard.writeText(copyText);
            
            // Alert the copied text
            alert("Copied the text: " + copyText);
        }
        $(function() {
            let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
            @can('mempership_delete')
                let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
                let deleteButton = {
                    text: deleteButtonTrans,
                    url: "{{ route('admin.memperships.massDestroy') }}",
                    className: 'btn-danger',
                    action: function(e, dt, node, config) {
                        var ids = $.map(dt.rows({
                            selected: true
                        }).data(), function(entry) {
                            return entry.id
                        });

                        if (ids.length === 0) {
                            alert('{{ trans('global.datatables.zero_selected') }}')

                            return
                        }

                        if (confirm('{{ trans('global.areYouSure') }}')) {
                            $.ajax({
                                    headers: {
                                        'x-csrf-token': _token
                                    },
                                    method: 'POST',
                                    url: config.url,
                                    data: {
                                        ids: ids,
                                        _method: 'DELETE'
                                    }
                                })
                                .done(function() {
                                    location.reload()
                                })
                        }
                    }
                }
                dtButtons.push(deleteButton)
            @endcan

            let dtOverrideGlobals = {
                buttons: dtButtons,
                processing: true,
                serverSide: true,
                retrieve: true,
                aaSorting: [],
                ajax: "{{ route('admin.memperships.index') }}",
                columns: [{
                        data: 'placeholder',
                        name: 'placeholder'
                    },
                    {
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'first_name',
                        name: 'first_name'
                    },
                    {
                        data: 'last_name',
                        name: 'last_name'
                    },
                    {
                        data: 'identity_num',
                        name: 'identity_num'
                    },
                    {
                        data: 'city',
                        name: 'city'
                    },
                    {
                        data: 'job',
                        name: 'job'
                    },
                    {
                        data: 'phone',
                        name: 'phone'
                    },
                    {
                        data: 'certificate_sent',
                        name: 'certificate_sent'
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
            let table = $('.datatable-Mempership').DataTable(dtOverrideGlobals);
            $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e) {
                $($.fn.dataTable.tables(true)).DataTable()
                    .columns.adjust();
            });

        });

        function send_certificate(id) { 
            $('#AjaxModal').modal('show');
            $('#mempership_id').val(id);
        }
    </script>
@endsection
