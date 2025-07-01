<?php

namespace App\Http\Controllers\Admin;

use LaravelDaily\LaravelCharts\Classes\LaravelChart;
use Illuminate\Http\Request;

class HomeController
{
    public function index(Request $request)
    {
        // Get filter parameters from request
        $selectedMonth = $request->get('month', 'all');
        $selectedYear = $request->get('year', 'all');
        
        if ($selectedYear && $selectedYear != 'all') {
            if ($selectedMonth && $selectedMonth != 'all') {
                // Filter by specific month in year
                $startDate = $selectedYear . '-' . $selectedMonth . '-01';
                $endDate = date('Y-m-t', strtotime($startDate));
            } else {
                // Filter by whole year
                $startDate = $selectedYear . '-01-01';
                $endDate = $selectedYear . '-12-31';
            }
        } else {
            // No date filtering - show all data
            $startDate = null;
            $endDate = null;
        }
        
        // Helper function to apply date filters
        $applyDateFilter = function($query, $filterField) use ($startDate, $endDate) {
            if ($startDate && $endDate) {
                return $query->whereBetween($filterField, [$startDate, $endDate]);
            }
            return $query;
        };

        $settings1 = [
            'chart_title'           => 'Posts',
            'chart_type'            => 'number_block',
            'report_type'           => 'group_by_date',
            'model'                 => 'App\Models\Post',
            'group_by_field'        => 'date',
            'group_by_period'       => 'day',
            'aggregate_function'    => 'count',
            'filter_field'          => 'created_at',
            'group_by_field_format' => 'd/m/Y',
            'column_class'          => 'col-md-3',
            'entries_number'        => '5',
            'translation_key'       => 'post',
        ];

        $settings1['total_number'] = 0;
        if (class_exists($settings1['model'])) {
            $settings1['total_number'] = $settings1['model']::when(isset($settings1['filter_field']), function ($query) use ($settings1, $applyDateFilter) {
                return $applyDateFilter($query, $settings1['filter_field']);
            })
                ->{$settings1['aggregate_function'] ?? 'count'}($settings1['aggregate_field'] ?? '*');
        }

        $settings2 = [
            'chart_title'           => 'Projects',
            'chart_type'            => 'number_block',
            'report_type'           => 'group_by_date',
            'model'                 => 'App\Models\Project',
            'group_by_field'        => 'date',
            'group_by_period'       => 'day',
            'aggregate_function'    => 'count',
            'filter_field'          => 'created_at',
            'group_by_field_format' => 'd/m/Y',
            'column_class'          => 'col-md-3',
            'entries_number'        => '5',
            'translation_key'       => 'project',
        ];

        $settings2['total_number'] = 0;
        if (class_exists($settings2['model'])) {
            $settings2['total_number'] = $settings2['model']::when(isset($settings2['filter_field']), function ($query) use ($settings2, $applyDateFilter) {
                return $applyDateFilter($query, $settings2['filter_field']);
            })
                ->{$settings2['aggregate_function'] ?? 'count'}($settings2['aggregate_field'] ?? '*');
        }

        $settings3 = [
            'chart_title'           => 'Members',
            'chart_type'            => 'number_block',
            'report_type'           => 'group_by_date',
            'model'                 => 'App\Models\Member',
            'group_by_field'        => 'date_of_birth',
            'group_by_period'       => 'day',
            'aggregate_function'    => 'count',
            'filter_field'          => 'created_at',
            'group_by_field_format' => 'd/m/Y',
            'column_class'          => 'col-md-3',
            'entries_number'        => '5',
            'translation_key'       => 'member',
        ];

        $settings3['total_number'] = 0;
        if (class_exists($settings3['model'])) {
            $settings3['total_number'] = $settings3['model']::when(isset($settings3['filter_field']), function ($query) use ($settings3, $applyDateFilter) {
                return $applyDateFilter($query, $settings3['filter_field']);
            })
                ->{$settings3['aggregate_function'] ?? 'count'}($settings3['aggregate_field'] ?? '*');
        }

        $settings4 = [
            'chart_title'           => 'Latest Members',
            'chart_type'            => 'latest_entries',
            'report_type'           => 'group_by_date',
            'model'                 => 'App\Models\Member',
            'group_by_field'        => 'date_of_birth',
            'group_by_period'       => 'day',
            'aggregate_function'    => 'count',
            'filter_field'          => 'created_at',
            'group_by_field_format' => 'd/m/Y',
            'column_class'          => 'col-md-6',
            'entries_number'        => '5',
            'fields'                => [
                'type'         => '',
                'name'         => '',
                'job'          => '',
                'phone_number' => '',
                'created_at'   => '',
            ],
            'translation_key' => 'member',
        ];

        $settings4['data'] = [];
        if (class_exists($settings4['model'])) {
            $settings4['data'] = $settings4['model']::when(isset($settings4['filter_field']), function ($query) use ($settings4, $applyDateFilter) {
                return $applyDateFilter($query, $settings4['filter_field']);
            })
                ->latest()
                ->take($settings4['entries_number'])
                ->get();
        }

        if (! array_key_exists('fields', $settings4)) {
            $settings4['fields'] = [];
        }

        $settings5 = [
            'chart_title'           => 'Latest Volunteers',
            'chart_type'            => 'latest_entries',
            'report_type'           => 'group_by_date',
            'model'                 => 'App\Models\Volunteer',
            'group_by_field'        => 'created_at',
            'group_by_period'       => 'day',
            'aggregate_function'    => 'count',
            'filter_field'          => 'created_at',
            'group_by_field_format' => 'd/m/Y H:i:s',
            'column_class'          => 'col-md-6',
            'entries_number'        => '5',
            'fields'                => [
                'name'            => '',
                'identity_num'    => '',
                'phone_number'    => '',
                'initiative_name' => '',
                'created_at'      => '',
            ],
            'translation_key' => 'volunteer',
        ];

        $settings5['data'] = [];
        if (class_exists($settings5['model'])) {
            $settings5['data'] = $settings5['model']::when(isset($settings5['filter_field']), function ($query) use ($settings5, $applyDateFilter) {
                return $applyDateFilter($query, $settings5['filter_field']);
            })
                ->latest()
                ->take($settings5['entries_number'])
                ->get();
        }

        if (! array_key_exists('fields', $settings5)) {
            $settings5['fields'] = [];
        }

        
        $settings50 = [
            'chart_title'        => 'التبرعات حسب الفئة',
            'chart_type'         => 'pie',
            'report_type'        => 'group_by_string',
            'model'              => 'App\\Models\\Donation',
            'group_by_field'     => 'target',
            'aggregate_function' => 'count',
            'filter_field'       => 'created_at',
            'column_class'       => 'col-md-4',
            'entries_number'     => '5',
            'translation_key'    => 'Donation',
            'range_date_start'          => $startDate,
            'range_date_end'            => $endDate,
        ];

        $chart5 = new LaravelChart($settings50);

        $settings6 = [
            'chart_title'           => 'مستفيدين التبرع',
            'chart_type'            => 'number_block',
            'report_type'           => 'group_by_date',
            'model'                 => 'App\Models\Beneficiary',
            'group_by_field'        => 'created_at',
            'group_by_period'       => 'day',
            'aggregate_function'    => 'count',
            'filter_field'          => 'created_at',
            'group_by_field_format' => 'd/m/Y H:i:s',
            'column_class'          => 'col-md-3',
            'entries_number'        => '5',
            'translation_key'       => 'beneficiary',
        ];

        $settings6['total_number'] = 0;
        if (class_exists($settings6['model'])) {
            $settings6['total_number'] = $settings6['model']::when(isset($settings6['filter_field']), function ($query) use ($settings6, $applyDateFilter) {
                return $applyDateFilter($query, $settings6['filter_field']);
            })
                ->{$settings6['aggregate_function'] ?? 'count'}($settings6['aggregate_field'] ?? '*');
        }

        $settings7 = [
            'chart_title'           => 'اخر التبرعات',
            'chart_type'            => 'latest_entries',
            'report_type'           => 'group_by_date',
            'model'                 => 'App\Models\Donation',
            'group_by_field'        => 'date',
            'group_by_period'       => 'day',
            'aggregate_function'    => 'count',
            'filter_field'          => 'created_at',
            'group_by_field_format' => 'd/m/Y',
            'column_class'          => 'col-md-8',
            'entries_number'        => '5',
            'fields'                => [
                'id'           => '',
                'company_name' => '',
                'amount'       => '',
                'created_at'   => '',
            ],
            'translation_key' => 'donation',
        ];

        $settings7['data'] = [];
        if (class_exists($settings7['model'])) {
            $settings7['data'] = $settings7['model']::when(isset($settings7['filter_field']), function ($query) use ($settings7, $applyDateFilter) {
                return $applyDateFilter($query, $settings7['filter_field']);
            })
                ->latest()
                ->take($settings7['entries_number'])
                ->get();
        }

        if (! array_key_exists('fields', $settings7)) {
            $settings7['fields'] = [];
        }

        $settings8 = [
            'chart_title'           => 'التبرعات',
            'chart_type'            => 'bar',
            'report_type'           => 'group_by_date',
            'model'                 => 'App\\Models\\Donation',
            'group_by_field'        => 'created_at',
            'group_by_period'       => 'day',
            'aggregate_function'    => 'sum',
            'aggregate_field'       => 'amount',
            'filter_field'          => 'created_at',
            'group_by_field_format' => 'd/m/Y H:i:s',
            'column_class'          => 'col-md-6',
            'entries_number'        => '5',
            'translation_key'       => 'donation',
            'range_date_start'             => $startDate,
            'range_date_end'               => $endDate,
        ];

        $chart8 = new LaravelChart($settings8);

        $settings9 = [
            'chart_title'           => 'التبرعات للمستفيدات',
            'chart_type'            => 'line',
            'report_type'           => 'group_by_date',
            'model'                 => 'App\\Models\\Beneficiary',
            'group_by_field'        => 'created_at',
            'group_by_period'       => 'day',
            'aggregate_function'    => 'sum',
            'aggregate_field'       => 'amount',
            'filter_field'          => 'created_at',
            'group_by_field_format' => 'd/m/Y H:i:s',
            'column_class'          => 'col-md-6',
            'entries_number'        => '5',
            'translation_key'       => 'beneficiary',
            'range_date_start'             => $startDate,
            'range_date_end'               => $endDate,
        ];

        $chart9 = new LaravelChart($settings9);

        return view('home', compact(
            'settings1', 'settings2', 'settings3', 'settings4', 'settings5',
            'chart5', 'settings6', 'settings7', 'chart8', 'chart9',
            'selectedMonth', 'selectedYear' 
        ));
    }
}