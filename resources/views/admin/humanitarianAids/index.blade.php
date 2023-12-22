@extends('layouts.admin')
@section('content')
    @can('humanitarian_aid_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.humanitarian-aids.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.humanitarianAid.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="card">
        <div class="card-header">
            {{ trans('cruds.humanitarianAid.title_singular') }} {{ trans('global.list') }}
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-HumanitarianAid">
                    <thead>
                        <tr>
                            <th width="10">

                            </th>
                            <th>
                                {{ trans('cruds.humanitarianAid.fields.id') }}
                            </th>
                            <th>
                                {{ trans('cruds.humanitarianAid.fields.type') }}
                            </th>
                            <th>
                                {{ trans('cruds.humanitarianAid.fields.aid_number') }}
                            </th>
                            <th>
                                {{ trans('cruds.humanitarianAid.fields.unit_of_aid') }}
                            </th>
                            <th>
                                {{ trans('cruds.humanitarianAid.fields.icon') }}
                            </th>
                            <th>
                                &nbsp;
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($humanitarianAids as $key => $humanitarianAid)
                            <tr data-entry-id="{{ $humanitarianAid->id }}">
                                <td>

                                </td>
                                <td>
                                    {{ $humanitarianAid->id ?? '' }}
                                </td>
                                <td>
                                    {{ $humanitarianAid->type ?? '' }}
                                </td>
                                <td>
                                    {{ $humanitarianAid->aid_number ?? '' }}
                                </td>
                                <td>
                                    {{ $humanitarianAid->unit_of_aid ?? '' }}
                                </td>
                                <td>
                                    @if ($humanitarianAid->icon)
                                        <a href="{{ $humanitarianAid->icon->getUrl() }}" target="_blank"
                                            style="display: inline-block">
                                            <img src="{{ $humanitarianAid->icon->getUrl('thumb') }}">
                                        </a>
                                    @endif
                                </td>
                                <td>
                                    @can('humanitarian_aid_show')
                                        <a class="btn btn-xs btn-primary"
                                            href="{{ route('admin.humanitarian-aids.show', $humanitarianAid->id) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan

                                    @can('humanitarian_aid_edit')
                                        <a class="btn btn-xs btn-info"
                                            href="{{ route('admin.humanitarian-aids.edit', $humanitarianAid->id) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan

                                    @can('humanitarian_aid_delete')
                                        <form action="{{ route('admin.humanitarian-aids.destroy', $humanitarianAid->id) }}"
                                            method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');"
                                            style="display: inline-block;">
                                            <input type="hidden" name="_method" value="DELETE">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <input type="submit" class="btn btn-xs btn-danger"
                                                value="{{ trans('global.delete') }}">
                                        </form>
                                    @endcan

                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    @parent
    <script>
        $(function() {
            let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
            @can('humanitarian_aid_delete')
                let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
                let deleteButton = {
                    text: deleteButtonTrans,
                    url: "{{ route('admin.humanitarian-aids.massDestroy') }}",
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

            $.extend(true, $.fn.dataTable.defaults, {
                orderCellsTop: true,
                order: [
                    [1, 'desc']
                ],
                pageLength: 100,
            });
            let table = $('.datatable-HumanitarianAid:not(.ajaxTable)').DataTable({
                buttons: dtButtons
            })
            $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e) {
                $($.fn.dataTable.tables(true)).DataTable()
                    .columns.adjust();
            });

        })
    </script>
@endsection
