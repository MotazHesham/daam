@extends('layouts.admin')
@section('content')  
<div class="row"> 
    <div class="{{ $chart1->options['column_class'] }} mb-5">
        <b>{!! $chart1->options['chart_title'] !!}</b>
        {!! $chart1->renderHtml() !!}
    </div>
    <div class="{{ $chart2->options['column_class'] }} mb-5">
        <b>{!! $chart2->options['chart_title'] !!}</b>
        {!! $chart2->renderHtml() !!}
    </div>
    <div class="{{ $chart3->options['column_class'] }} mb-5">
        <b>{!! $chart3->options['chart_title'] !!}</b>
        {!! $chart3->renderHtml() !!}
    </div>
    <div class="{{ $chart4->options['column_class'] }} mb-5">
        <b>{!! $chart4->options['chart_title'] !!}</b>
        {!! $chart4->renderHtml() !!}
    </div>
    <div class="{{ $chart5->options['column_class'] }} mb-5">
        <b>{!! $chart5->options['chart_title'] !!}</b>
        {!! $chart5->renderHtml() !!}
    </div>
    <div class="{{ $chart6->options['column_class'] }} mb-5">
        <b>{!! $chart6->options['chart_title'] !!}</b>
        {!! $chart6->renderHtml() !!}
    </div>
    <div class="{{ $chart7->options['column_class'] }} mb-5">
        <b>{!! $chart7->options['chart_title'] !!}</b>
        {!! $chart7->renderHtml() !!}
    </div>
</div> 
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="#" onclick="copyToClipboard('{{ route('frontend.questionnaire','members') }}')">
                رابط الاستبيان
            </a>
        </div>
    </div> 
    <div class="card">
        <div class="card-header">
            استبيان قياس رأي أعضاء الجمعية العمومية       
        </div>

        <div class="card-body">
            <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-courses">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            id
                        </th>
                        <th>
                            اسم الجهة
                        </th>
                        <th>
                            الاسم
                        </th>
                        <th>
                            الجوال
                        </th>
                        <th>
                            البريد الالكتروني
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/emn178/chartjs-plugin-labels/src/chartjs-plugin-labels.js"></script>
    {!! $chart1->renderJs() !!}
    {!! $chart2->renderJs() !!}
    {!! $chart3->renderJs() !!}
    {!! $chart4->renderJs() !!}
    {!! $chart5->renderJs() !!}
    {!! $chart6->renderJs() !!}
    {!! $chart7->renderJs() !!} 
    <script> 
        $(function() {
            let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons) 

            let dtOverrideGlobals = {
                buttons: dtButtons,
                processing: true,
                serverSide: true,
                retrieve: true,
                aaSorting: [],
                ajax: "{{ route('admin.questionnaire.members') }}",
                columns: [{
                        data: 'placeholder',
                        name: 'placeholder'
                    },
                    {
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'company_name',
                        name: 'company_name'
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
                        data: 'email',
                        name: 'email'
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
            let table = $('.datatable-courses').DataTable(dtOverrideGlobals);
            $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e) {
                $($.fn.dataTable.tables(true)).DataTable()
                    .columns.adjust();
            });

        });
    </script>
@endsection
