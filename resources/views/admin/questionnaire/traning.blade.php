@extends('layouts.admin')
@section('content') 
    <div class="row"> 
        <div class="{{ $chart6->options['column_class'] }} mb-5">
            <h5>{!! $chart6->options['chart_title'] !!}</h5>
            {!! $chart6->renderHtml() !!}
        </div>
        <div class="{{ $chart7->options['column_class'] }} mb-5">
            <h5>{!! $chart7->options['chart_title'] !!}</h5>
            {!! $chart7->renderHtml() !!}
        </div>
        <div class="{{ $chart8->options['column_class'] }} mb-5">
            <h5>{!! $chart8->options['chart_title'] !!}</h5>
            {!! $chart8->renderHtml() !!}
        </div>
        <div class="{{ $chart9->options['column_class'] }} mb-5">
            <h5>{!! $chart9->options['chart_title'] !!}</h5>
            {!! $chart9->renderHtml() !!}
        </div>
        <div class="{{ $chart10->options['column_class'] }} mb-5">
            <h5>{!! $chart10->options['chart_title'] !!}</h5>
            {!! $chart10->renderHtml() !!}
        </div>
        <div class="{{ $chart11->options['column_class'] }} mb-5">
            <h5>{!! $chart11->options['chart_title'] !!}</h5>
            {!! $chart11->renderHtml() !!}
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            قياس أثر التدريب للموظف
        </div>

        <div class="card-body">
            <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-traning">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            id
                        </th>
                        <th>
                            اسم المتدربة
                        </th>
                        <th>
                            المسمي الوظيفي
                        </th>
                        <th>
                            مكان العمل
                        </th>
                        <th>
                            مسمي البرنامج
                        </th>
                        <th>
                            تاريخ الاتحاقق بابرنامج التدريبي
                        </th>
                        <th>
                            مقترح
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>{!! $chart6->renderJs() !!}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>{!! $chart7->renderJs() !!}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>{!! $chart8->renderJs() !!}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>{!! $chart9->renderJs() !!}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>{!! $chart10->renderJs() !!}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>{!! $chart11->renderJs() !!}
    
    <script>
        $(function() {
            let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons) 

            let dtOverrideGlobals = {
                buttons: dtButtons,
                processing: true,
                serverSide: true,
                retrieve: true,
                aaSorting: [],
                ajax: "{{ route('admin.questionnaire.traning') }}",
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
                        data: 'job',
                        name: 'job'
                    },
                    {
                        data: 'job_address',
                        name: 'job_address'
                    },
                    {
                        data: 'program_name',
                        name: 'program_name'
                    }, 
                    {
                        data: 'date_joinned',
                        name: 'date_joinned'
                    },
                    {
                        data: 'suggestion',
                        name: 'suggestion'
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
            let table = $('.datatable-traning').DataTable(dtOverrideGlobals);
            $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e) {
                $($.fn.dataTable.tables(true)).DataTable()
                    .columns.adjust();
            });

        });
    </script>
@endsection