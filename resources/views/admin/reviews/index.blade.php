@extends('layouts.admin')
@section('content')
    <form method="GET" action="" class="filter-form">
        <div class="d-flex align-items-end gap-3">
            <div class="form-group">
                <label for="month">الشهر</label>
                <select name="month" id="month" class="form-control">
                    <option value="all" @if (empty($selectedMonth) || $selectedMonth == 'all') selected @endif>كل الشهور</option>
                    @foreach (get_months() as $num => $name)
                        <option value="{{ $num }}" @if ($selectedMonth == $num) selected @endif>
                            {{ $name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="year">السنة</label>
                <select name="year" id="year" class="form-control">
                    <option value="all" @if (empty($selectedYear) || $selectedYear == 'all') selected @endif>كل السنوات</option>
                    @foreach (get_years() as $year)
                        <option value="{{ $year }}" @if ($selectedYear == $year) selected @endif>
                            {{ $year }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-filter mr-2"></i>تطبيق
                </button>
            </div>
        </div>
    </form>
    <div class="row">
        <div class="{{ $chart1->options['column_class'] }} mb-5">
            <b>{!! $chart1->options['chart_title'] !!}</b>
            {!! $chart1->renderHtml() !!}
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            {{ trans('cruds.review.title_singular') }} {{ trans('global.list') }}
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable ajaxTable datatable-Review">
                    <thead>
                        <tr>
                            <th width="10">

                            </th>
                            <th>
                                {{ trans('cruds.review.fields.id') }}
                            </th>
                            <th>
                                {{ trans('cruds.review.fields.identity_number') }}
                            </th>
                            <th>
                                {{ trans('cruds.review.fields.name') }}
                            </th>
                            <th>
                                {{ trans('cruds.review.fields.role') }}
                            </th>
                            <th>
                                {{ trans('cruds.review.fields.phone_number') }}
                            </th>
                            <th>
                                {{ trans('cruds.review.fields.review') }}
                            </th>
                            <th>
                                &nbsp;
                            </th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    @parent
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/emn178/chartjs-plugin-labels/src/chartjs-plugin-labels.js"></script>
    {!! $chart1->renderJs() !!}
    <script>
        $(function() {
            let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
            @can('review_delete')
                let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
                let deleteButton = {
                    text: deleteButtonTrans,
                    url: "{{ route('admin.reviews.massDestroy') }}",
                    className: 'btn-danger',
                    action: function(e, dt, node, config) {
                        var ids = $.map(dt.rows({
                            selected: true
                        }).nodes(), function(entry) {
                            return $(entry).data('entry-id')
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
                ajax: "{{ route('admin.reviews.index') }}",
                columns: [{
                        data: 'placeholder',
                        name: 'placeholder'
                    },
                    {
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'identity_number',
                        name: 'identity_number'
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'role.title',
                        name: 'role.title'
                    },
                    {
                        data: 'phone_number',
                        name: 'phone_number'
                    },
                    {
                        data: 'review',
                        name: 'review'
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
                pageLength: 10,
            };
            let table = $('.datatable-Review').DataTable(dtOverrideGlobals)
            $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e) {
                $($.fn.dataTable.tables(true)).DataTable()
                    .columns.adjust();
            });

        })
    </script>
@endsection
