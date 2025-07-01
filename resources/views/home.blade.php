@extends('layouts.admin')
@section('content')
<style>
    .filter-section {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border-radius: 15px;
        padding: 20px;
        margin-bottom: 30px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    }
    
    .filter-section .card-header {
        background: transparent;
        border: none;
        padding: 0 0 15px 0;
    }
    
    .filter-section .h3 {
        color: white;
        font-weight: 600;
        margin: 0;
        text-shadow: 0 2px 4px rgba(0,0,0,0.2);
    }
    
    .filter-form {
        background: rgba(255,255,255,0.95);
        border-radius: 10px;
        padding: 20px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        backdrop-filter: blur(10px);
    }
    
    .filter-form .d-flex {
        gap: 20px;
    }
    
    .filter-form .form-group {
        margin-bottom: 0;
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        min-width: 140px;
    }
    
    .filter-form .form-group:last-child {
        min-width: auto;
    }
    
    .filter-form label {
        font-weight: 600;
        color: #333;
        margin-bottom: 8px;
        display: block;
        font-size: 14px;
    }
    
    .filter-form select {
        border: 2px solid #e9ecef;
        border-radius: 8px; 
        font-size: 14px;
        transition: all 0.3s ease;
        min-width: 140px;
        background: white;
        color: #333;
        cursor: pointer;
        appearance: none;
        -webkit-appearance: none;
        -moz-appearance: none;
        background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3e%3cpolyline points='6,9 12,15 18,9'%3e%3c/polyline%3e%3c/svg%3e");
        background-repeat: no-repeat;
        background-position: right 10px center;
        background-size: 16px;
        padding-right: 40px;
    }
    
    .filter-form select:focus {
        border-color: #667eea;
        box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.25);
        outline: none;
        background-color: #fff;
    }
    
    .filter-form select:hover {
        border-color: #667eea;
        background-color: #f8f9fa;
    }
    
    .filter-form select option {
        background: white;
        color: #333;
        padding: 10px;
    }
    
    .filter-form .btn-primary {
        background: linear-gradient(45deg, #667eea, #764ba2);
        border: none;
        border-radius: 8px;
        padding: 12px 24px;
        font-weight: 600;
        transition: all 0.3s ease;
        box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);
        margin-top: 24px;
        min-width: 120px;
    }
    
    .filter-form .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(102, 126, 234, 0.4);
    }
    
    .stats-cards {
        margin-top: 20px;
    }
    
    .stats-cards .card {
        border-radius: 12px;
        border: none;
        box-shadow: 0 5px 15px rgba(0,0,0,0.08);
        transition: all 0.3s ease;
        margin-bottom: 20px;
    }
    
    .stats-cards .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0,0,0,0.15);
    }
    
    .stats-cards .text-value {
        font-size: 2.5rem;
        font-weight: 700;
        margin-bottom: 5px;
    }
    
    .stats-cards .card-body {
        padding: 25px;
    }
    
    .chart-section {
        background: white;
        border-radius: 12px;
        padding: 20px;
        margin-bottom: 20px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.08);
    }
    
    .chart-section h3 {
        color: #333;
        font-weight: 600;
        margin-bottom: 20px;
        padding-bottom: 10px;
        border-bottom: 2px solid #f8f9fa;
    }
    
    .table-section {
        background: white;
        border-radius: 12px;
        padding: 20px;
        margin-bottom: 20px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.08);
    }
    
    .table-section h3 {
        color: #333;
        font-weight: 600;
        margin-bottom: 20px;
        padding-bottom: 10px;
        border-bottom: 2px solid #f8f9fa;
    }
    
    .table-section .table {
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 2px 10px rgba(0,0,0,0.05);
    }
    
    .table-section .table thead th {
        background: linear-gradient(45deg, #667eea, #764ba2);
        color: white;
        border: none;
        font-weight: 600;
        padding: 15px;
    }
    
    .table-section .table tbody td {
        padding: 12px 15px;
        border-color: #f8f9fa;
    }
    
    .table-section .table tbody tr:hover {
        background-color: #f8f9fa;
    }
    
    @media (max-width: 768px) {
        .filter-form {
            flex-direction: column;
        }
        
        .filter-form .form-group {
            margin-bottom: 15px;
        }
        
        .filter-form select {
            width: 100%;
        }
    }
</style>

<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="card filter-section">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="h3">
                            الإحصائيات
                        </span>
                        <div class="d-flex justify-content-end align-items-center">
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
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-body">
                @if(session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                <div class="row stats-cards">
                    <div class="{{ $settings1['column_class'] }}">
                        <div class="card text-white bg-info">
                            <div class="card-body pb-0">
                                <div class="text-value">{{ number_format($settings1['total_number']) }}</div>
                                <div>{{ $settings1['chart_title'] }}</div>
                                <br />
                            </div>
                        </div>
                    </div>
                    <div class="{{ $settings2['column_class'] }}">
                        <div class="card text-white bg-success">
                            <div class="card-body pb-0">
                                <div class="text-value">{{ number_format($settings2['total_number']) }}</div>
                                <div>{{ $settings2['chart_title'] }}</div>
                                <br />
                            </div>
                        </div>
                    </div>
                    <div class="{{ $settings3['column_class'] }}">
                        <div class="card text-white bg-danger">
                            <div class="card-body pb-0">
                                <div class="text-value">{{ number_format($settings3['total_number']) }}</div>
                                <div>{{ $settings3['chart_title'] }}</div>
                                <br />
                            </div>
                        </div>
                    </div>
                    <div class="{{ $settings6['column_class'] }}">
                        <div class="card text-white bg-primary">
                            <div class="card-body pb-0">
                                <div class="text-value">{{ number_format($settings6['total_number']) }}</div>
                                <div>{{ $settings6['chart_title'] }}</div>
                                <br />
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    {{-- Widget - latest entries --}}
                    <div class="{{ $settings4['column_class'] }}">
                        <div class="table-section">
                            <h3>{{ $settings4['chart_title'] }}</h3>
                            <div style="overflow-x: auto;">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            @foreach($settings4['fields'] as $key => $value)
                                                <th>
                                                    {{ trans(sprintf('cruds.%s.fields.%s', $settings4['translation_key'] ?? 'pleaseUpdateWidget', $key)) }}
                                                </th>
                                            @endforeach
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($settings4['data'] as $entry)
                                            <tr>
                                                @foreach($settings4['fields'] as $key => $value)
                                                    <td>
                                                        @if($value === '')
                                                            {{ $entry->{$key} }}
                                                        @elseif(is_iterable($entry->{$key}))
                                                            @foreach($entry->{$key} as $subEentry)
                                                                <span class="label label-info">{{ $subEentry->{$value} }}</span>
                                                            @endforeach
                                                        @else
                                                            {{ data_get($entry, $key . '.' . $value) }}
                                                        @endif
                                                    </td>
                                                @endforeach
                                            </tr>
                                            @empty
                                            <tr>
                                                <td colspan="{{ count($settings4['fields']) }}">{{ __('No entries found') }}</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    {{-- Widget - latest entries --}}
                    <div class="{{ $settings5['column_class'] }}">
                        <div class="table-section">
                            <h3>{{ $settings5['chart_title'] }}</h3>
                            <div style="overflow-x: auto;">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            @foreach($settings5['fields'] as $key => $value)
                                                <th>
                                                    {{ trans(sprintf('cruds.%s.fields.%s', $settings5['translation_key'] ?? 'pleaseUpdateWidget', $key)) }}
                                                </th>
                                            @endforeach
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($settings5['data'] as $entry)
                                            <tr>
                                                @foreach($settings5['fields'] as $key => $value)
                                                    <td>
                                                        @if($value === '')
                                                            {{ $entry->{$key} }}
                                                        @elseif(is_iterable($entry->{$key}))
                                                            @foreach($entry->{$key} as $subEentry)
                                                                <span class="label label-info">{{ $subEentry->{$value} }}</span>
                                                            @endforeach
                                                        @else
                                                            {{ data_get($entry, $key . '.' . $value) }}
                                                        @endif
                                                    </td>
                                                @endforeach
                                            </tr>
                                            @empty
                                            <tr>
                                                <td colspan="{{ count($settings5['fields']) }}">{{ __('No entries found') }}</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="{{ $chart5->options['column_class'] }}">
                        <div class="chart-section">
                            <h3>{!! $chart5->options['chart_title'] !!}</h3>
                            {!! $chart5->renderHtml() !!}
                        </div>
                    </div>
                    
                    {{-- Widget - latest entries --}}
                    <div class="{{ $settings7['column_class'] }}">
                        <div class="table-section">
                            <h3>{{ $settings7['chart_title'] }}</h3>
                            <div style="overflow-x: auto;">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            @foreach($settings7['fields'] as $key => $value)
                                                <th>
                                                    {{ trans(sprintf('cruds.%s.fields.%s', $settings7['translation_key'] ?? 'pleaseUpdateWidget', $key)) }}
                                                </th>
                                            @endforeach
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($settings7['data'] as $entry)
                                            <tr>
                                                @foreach($settings7['fields'] as $key => $value)
                                                    <td>
                                                        @if($value === '')
                                                            {{ $entry->{$key} }}
                                                        @elseif(is_iterable($entry->{$key}))
                                                            @foreach($entry->{$key} as $subEentry)
                                                                <span class="label label-info">{{ $subEentry->{$value} }}</span>
                                                            @endforeach
                                                        @else
                                                            {{ data_get($entry, $key . '.' . $value) }}
                                                        @endif
                                                    </td>
                                                @endforeach
                                            </tr>
                                            @empty
                                            <tr>
                                                <td colspan="{{ count($settings7['fields']) }}">{{ __('No entries found') }}</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="{{ $chart8->options['column_class'] }}">
                        <div class="chart-section">
                            <h3>{!! $chart8->options['chart_title'] !!}</h3>
                            {!! $chart8->renderHtml() !!}
                        </div>
                    </div>
                    <div class="{{ $chart9->options['column_class'] }}">
                        <div class="chart-section">
                            <h3>{!! $chart9->options['chart_title'] !!}</h3>
                            {!! $chart9->renderHtml() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')  
@parent
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>{!! $chart5->renderJs() !!}{!! $chart8->renderJs() !!}{!! $chart9->renderJs() !!}
@endsection