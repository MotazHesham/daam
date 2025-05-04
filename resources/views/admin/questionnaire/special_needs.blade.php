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
</div> 
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="#" onclick="copyToClipboard('{{ route('frontend.questionnaire','special_needs') }}')">
                رابط الاستبيان
            </a>
        </div>
    </div> 
    <div class="card">
        <div class="card-header">
            استبيان الاحتياجات الخاصة       
        </div>

        <div class="card-body">
            <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-special-needs">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            id
                        </th>
                        <th>
                            الاسم
                        </th>
                        <th>
                            الجوال
                        </th>
                        <th>
                            الحالة الاجتماعية
                        </th>
                        <th>
                            العلاقة
                        </th>
                        <th>
                            لديه احتياجات خاصة
                        </th>
                        <th>
                            التعليم
                        </th>
                        <th>
                            الفئة العمرية
                        </th>
                        <th>
                            نوع الاحتياج الخاص
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
    <script> 
        $(function() {
            let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons) 

            let dtOverrideGlobals = {
                buttons: dtButtons,
                processing: true,
                serverSide: true,
                retrieve: true,
                aaSorting: [],
                ajax: "{{ route('admin.questionnaire.specialneed') }}",
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
                        data: 'marige_status',
                        name: 'marige_status'
                    },
                    {
                        data: 'relation',
                        name: 'relation'
                    },
                    {
                        data: 'has_special_needs',
                        name: 'has_special_needs'
                    },
                    {
                        data: 'special_need_education',
                        name: 'special_need_education'
                    },
                    {
                        data: 'age_range',
                        name: 'age_range'
                    },
                    {
                        data: 'special_need_type',
                        name: 'special_need_type'
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
            let table = $('.datatable-special-needs').DataTable(dtOverrideGlobals);
            $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e) {
                $($.fn.dataTable.tables(true)).DataTable()
                    .columns.adjust();
            });

        });
    </script>
@endsection 