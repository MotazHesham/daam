@extends('layouts.admin')
@section('content')
    @can('slider_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.sliders.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.slider.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="card">
        <div class="card-header">
            {{ trans('cruds.slider.title_singular') }} {{ trans('global.list') }}
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-Slider">
                    <thead>
                        <tr>
                            <th width="10">

                            </th>
                            <th>
                                {{ trans('cruds.slider.fields.id') }}
                            </th>
                            <th>
                                {{ trans('cruds.slider.fields.text_1') }}
                            </th>
                            <th>
                                {{ trans('cruds.slider.fields.text_2') }}
                            </th>
                            <th>
                                {{ trans('cruds.slider.fields.image') }}
                            </th>
                            <th>
                                {{ trans('cruds.slider.fields.published') }}
                            </th>
                            <th>
                                {{ trans('cruds.slider.fields.link') }}
                            </th>
                            <th>
                                &nbsp;
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sliders as $key => $slider)
                            <tr data-entry-id="{{ $slider->id }}">
                                <td>

                                </td>
                                <td>
                                    {{ $slider->id ?? '' }}
                                </td>
                                <td>
                                    {{ $slider->text_1 ?? '' }}
                                </td>
                                <td>
                                    {{ $slider->text_2 ?? '' }}
                                </td>
                                <td>
                                    @if ($slider->image)
                                        <a href="{{ $slider->image->getUrl() }}" target="_blank"
                                            style="display: inline-block">
                                            <img src="{{ $slider->image->getUrl('thumb') }}">
                                        </a>
                                    @endif
                                </td>
                                <td>
                                    <label class="c-switch c-switch-pill c-switch-success">
                                        <input onchange="update_statuses(this,'published')" value="{{ $slider->id }}"
                                            type="checkbox" class="c-switch-input"
                                            {{ $slider->published ? 'checked' : null }}>
                                        <span class="c-switch-slider"></span>
                                    </label>
                                </td>
                                <td>
                                    {{ $slider->link ?? '' }}
                                </td>
                                <td>
                                    @can('slider_show')
                                        <a class="btn btn-xs btn-primary"
                                            href="{{ route('admin.sliders.show', $slider->id) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan

                                    @can('slider_edit')
                                        <a class="btn btn-xs btn-info" href="{{ route('admin.sliders.edit', $slider->id) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan

                                    @can('slider_delete')
                                        <form action="{{ route('admin.sliders.destroy', $slider->id) }}" method="POST"
                                            onsubmit="return confirm('{{ trans('global.areYouSure') }}');"
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
        
        function update_statuses(el,type){
            if(el.checked){
                var status = 1;
            }
            else{
                var status = 0;
            }
            $.post('{{ route('admin.sliders.update_statuses') }}', {_token:'{{ csrf_token() }}', id:el.value, status:status, type:type}, function(data){
                if(data == 1){
                    showAlert('success', 'Success', '');
                }else{
                    showAlert('danger', 'Something went wrong', '');
                }
            });
        }

        $(function() {
            let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
            @can('slider_delete')
                let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
                let deleteButton = {
                    text: deleteButtonTrans,
                    url: "{{ route('admin.sliders.massDestroy') }}",
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
            let table = $('.datatable-Slider:not(.ajaxTable)').DataTable({
                buttons: dtButtons
            })
            $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e) {
                $($.fn.dataTable.tables(true)).DataTable()
                    .columns.adjust();
            });

        })
    </script>
@endsection