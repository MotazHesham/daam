@extends('layouts.admin')
@section('content') 
<h1>المدرب</h1>
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
</div>
<h1> المحتوي التدريبي</h1>
<div class="row"> 
    <div class="{{ $chart7->options['column_class'] }} mb-5">
        <b>{!! $chart7->options['chart_title'] !!}</b>
        {!! $chart7->renderHtml() !!}
    </div>
    <div class="{{ $chart8->options['column_class'] }} mb-5">
        <b>{!! $chart8->options['chart_title'] !!}</b>
        {!! $chart8->renderHtml() !!}
    </div>
    <div class="{{ $chart9->options['column_class'] }} mb-5">
        <b>{!! $chart9->options['chart_title'] !!}</b>
        {!! $chart9->renderHtml() !!}
    </div> 
    <div class="{{ $chart10->options['column_class'] }} mb-5">
        <b>{!! $chart10->options['chart_title'] !!}</b>
        {!! $chart10->renderHtml() !!}
    </div> 
</div> 
<h1>المتدربين</h1>
<div class="row"> 
    <div class="{{ $chart11->options['column_class'] }} mb-5">
        <b>{!! $chart11->options['chart_title'] !!}</b>
        {!! $chart11->renderHtml() !!}
    </div> 
    <div class="{{ $chart12->options['column_class'] }} mb-5">
        <b>{!! $chart12->options['chart_title'] !!}</b>
        {!! $chart12->renderHtml() !!}
    </div> 
</div> 
<h1>المناخ التدريبي</h1>
<div class="row"> 
    <div class="{{ $chart13->options['column_class'] }} mb-5">
        <b>{!! $chart13->options['chart_title'] !!}</b>
        {!! $chart13->renderHtml() !!}
    </div> 
    <div class="{{ $chart14->options['column_class'] }} mb-5">
        <b>{!! $chart14->options['chart_title'] !!}</b>
        {!! $chart14->renderHtml() !!}
    </div> 
    <div class="{{ $chart15->options['column_class'] }} mb-5">
        <b>{!! $chart15->options['chart_title'] !!}</b>
        {!! $chart15->renderHtml() !!}
    </div> 
</div> 
<h1>التقييم</h1>
<div class="row"> 
    <div class="{{ $chart16->options['column_class'] }} mb-5">
        <b>{!! $chart16->options['chart_title'] !!}</b>
        {!! $chart16->renderHtml() !!}
    </div> 
    <div class="{{ $chart17->options['column_class'] }} mb-5">
        <b>{!! $chart17->options['chart_title'] !!}</b>
        {!! $chart17->renderHtml() !!}
    </div> 
</div>
    <div class="card">
        <div class="card-header">
            تقييم دورة تدريبية بمكتب التطوير المؤسسي
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
                            اسم الدورة
                        </th>
                        <th>
                            المدرب
                        </th>
                        <th>
                            الترايخ
                        </th>
                        <th>
                            المهنة
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
    {!! $chart8->renderJs() !!}
    {!! $chart9->renderJs() !!} 
    {!! $chart10->renderJs() !!} 
    {!! $chart11->renderJs() !!} 
    {!! $chart12->renderJs() !!} 
    {!! $chart13->renderJs() !!} 
    {!! $chart14->renderJs() !!} 
    {!! $chart15->renderJs() !!} 
    {!! $chart16->renderJs() !!} 
    {!! $chart17->renderJs() !!} 
    <script>
        $(function() {
            let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons) 

            let dtOverrideGlobals = {
                buttons: dtButtons,
                processing: true,
                serverSide: true,
                retrieve: true,
                aaSorting: [],
                ajax: "{{ route('admin.questionnaire.courses') }}",
                columns: [{
                        data: 'placeholder',
                        name: 'placeholder'
                    },
                    {
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'course_name',
                        name: 'course_name'
                    },
                    {
                        data: 'trainer',
                        name: 'trainer'
                    },
                    {
                        data: 'date',
                        name: 'date'
                    },
                    {
                        data: 'job',
                        name: 'job'
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
