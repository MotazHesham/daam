@extends('layouts.admin')
@section('content') 
<form method="GET" action="" class="filter-form">
    <div class="d-flex align-items-end gap-3">
        <div class="form-group">
            <label for="month">الشهر</label>
            <select name="month" id="month" class="form-control">
                <option value="all" @if(empty($selectedMonth) || $selectedMonth == 'all') selected @endif>كل الشهور</option>
                @foreach(get_months() as $num => $name)
                    <option value="{{ $num }}" @if($selectedMonth == $num) selected @endif>{{ $name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="year">السنة</label>
            <select name="year" id="year" class="form-control">
                <option value="all" @if(empty($selectedYear) || $selectedYear == 'all') selected @endif>كل السنوات</option>
                @foreach(get_years() as $year)
                    <option value="{{ $year }}" @if($selectedYear == $year) selected @endif>{{ $year }}</option>
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
    <div class="{{ $chart8->options['column_class'] }} mb-5">
        <b>{!! $chart8->options['chart_title'] !!}</b>
        {!! $chart8->renderHtml() !!}
    </div>
    <div class="{{ $chart9->options['column_class'] }} mb-5">
        <b>{!! $chart9->options['chart_title'] !!}</b>
        {!! $chart9->renderHtml() !!}
    </div> 
</div>
<div style="margin-bottom: 10px;" class="row">
    <div class="col-lg-12">
        <a class="btn btn-success" href="#" onclick="copyToClipboard('{{ route('frontend.questionnaire','volunteers') }}')">
            رابط الاستبيان
        </a>
    </div>
</div> 
    <div class="card">
        <div class="card-header">
            قياس رضا المتطوعين
        </div>

        <div class="card-body">
            <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-volunteers">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            id
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
    
    <script>
        $(function() {
            let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons) 

            let dtOverrideGlobals = {
                buttons: dtButtons,
                processing: true,
                serverSide: true,
                retrieve: true,
                aaSorting: [],
                ajax: "{{ route('admin.questionnaire.volunteers') }}",
                columns: [{
                        data: 'placeholder',
                        name: 'placeholder'
                    },
                    {
                        data: 'id',
                        name: 'id'
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
            let table = $('.datatable-volunteers').DataTable(dtOverrideGlobals);
            $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e) {
                $($.fn.dataTable.tables(true)).DataTable()
                    .columns.adjust();
            });

        });
    </script>
@endsection
