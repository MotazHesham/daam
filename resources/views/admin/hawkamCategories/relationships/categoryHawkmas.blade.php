@can('hawkma_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.hawkmas.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.hawkma.title_singular') }}
            </a>
        </div>
    </div>
@endcan

<div class="card">
    <div class="card-header">
        {{ trans('cruds.hawkma.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-categoryHawkmas">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.hawkma.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.hawkma.fields.title') }}
                        </th>
                        <th>
                            {{ trans('cruds.hawkma.fields.category') }}
                        </th>
                        <th>
                            {{ trans('cruds.hawkma.fields.file') }}
                        </th>
                        <th>
                            {{ trans('cruds.hawkma.fields.published') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($hawkmas as $key => $hawkma)
                        <tr data-entry-id="{{ $hawkma->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $hawkma->id ?? '' }}
                            </td>
                            <td>
                                {{ $hawkma->title ?? '' }}
                            </td>
                            <td>
                                {{ $hawkma->category->name ?? '' }}
                            </td>
                            <td>
                                @if($hawkma->file)
                                    <a href="{{ $hawkma->file->getUrl() }}" target="_blank">
                                        {{ trans('global.view_file') }}
                                    </a>
                                @endif
                            </td>
                            <td>
                                <span style="display:none">{{ $hawkma->published ?? '' }}</span>
                                <input type="checkbox" disabled="disabled" {{ $hawkma->published ? 'checked' : '' }}>
                            </td>
                            <td>
                                @can('hawkma_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.hawkmas.show', $hawkma->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('hawkma_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.hawkmas.edit', $hawkma->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('hawkma_delete')
                                    <form action="{{ route('admin.hawkmas.destroy', $hawkma->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
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

@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('hawkma_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.hawkmas.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 25,
  });
  let table = $('.datatable-categoryHawkmas:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection