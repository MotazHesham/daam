<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\QuestionnaireCertificate;
use App\Models\QuestionnaireCourse;
use App\Models\QuestionnaireMember;
use App\Models\QuestionnaireSpecialNeed;
use App\Models\QuestionnaireTraning;
use App\Models\QuestionnaireVolunteer;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;
use Yajra\DataTables\Facades\DataTables;

class QuestionnaireController extends Controller
{
    public function traning(Request $request)
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
        $settings6 = [
            'chart_title'           => QuestionnaireTraning::Q_SELECT['question_6'],
            'chart_type'            => 'doughnut',
            'report_type'           => 'group_by_string',
            'model'                 => 'App\Models\QuestionnaireTraning',
            'group_by_field'        => 'question_6', 
            'aggregate_function'    => 'count', 
            'filter_field'          => 'created_at',
            'range_date_start'      => $startDate,
            'range_date_end'        => $endDate,
            'group_by_field_format' => 'd/m/Y H:i:s',
            'column_class'          => 'col-md-3',
            'entries_number'        => '5',
            'translation_key'       => 'questionnaireTraning',
        ];

        $chart6 = new LaravelChart($settings6);

        $settings7 = [
            'chart_title'           => QuestionnaireTraning::Q_SELECT['question_7'],
            'chart_type'            => 'doughnut',
            'report_type'           => 'group_by_string',
            'model'                 => 'App\Models\QuestionnaireTraning',
            'group_by_field'        => 'question_7', 
            'aggregate_function'    => 'count', 
            'filter_field'          => 'created_at',
            'range_date_start'      => $startDate,
            'range_date_end'        => $endDate,
            'group_by_field_format' => 'd/m/Y H:i:s',
            'column_class'          => 'col-md-3',
            'entries_number'        => '5',
            'translation_key'       => 'questionnaireTraning',
        ];

        $chart7 = new LaravelChart($settings7);

        $settings8 = [
            'chart_title'           => QuestionnaireTraning::Q_SELECT['question_8'],
            'chart_type'            => 'doughnut',
            'report_type'           => 'group_by_string',
            'model'                 => 'App\Models\QuestionnaireTraning',
            'group_by_field'        => 'question_8', 
            'aggregate_function'    => 'count', 
            'filter_field'          => 'created_at',
            'range_date_start'      => $startDate,
            'range_date_end'        => $endDate,
            'group_by_field_format' => 'd/m/Y H:i:s',
            'column_class'          => 'col-md-3',
            'entries_number'        => '5',
            'translation_key'       => 'questionnaireTraning',
        ];

        $chart8 = new LaravelChart($settings8);

        $settings9 = [
            'chart_title'           => QuestionnaireTraning::Q_SELECT['question_9'],
            'chart_type'            => 'doughnut',
            'report_type'           => 'group_by_string',
            'model'                 => 'App\Models\QuestionnaireTraning',
            'group_by_field'        => 'question_9', 
            'aggregate_function'    => 'count', 
            'filter_field'          => 'created_at',
            'range_date_start'      => $startDate,
            'range_date_end'        => $endDate,
            'group_by_field_format' => 'd/m/Y H:i:s',
            'column_class'          => 'col-md-3',
            'entries_number'        => '5',
            'translation_key'       => 'questionnaireTraning',
        ];

        $chart9 = new LaravelChart($settings9);

        $settings10 = [
            'chart_title'           => QuestionnaireTraning::Q_SELECT['question_10'],
            'chart_type'            => 'doughnut',
            'report_type'           => 'group_by_string',
            'model'                 => 'App\Models\QuestionnaireTraning',
            'group_by_field'        => 'question_10', 
            'aggregate_function'    => 'count', 
            'filter_field'          => 'created_at',
            'range_date_start'      => $startDate,
            'range_date_end'        => $endDate,
            'group_by_field_format' => 'd/m/Y H:i:s',
            'column_class'          => 'col-md-3',
            'entries_number'        => '5',
            'translation_key'       => 'questionnaireTraning',
        ];

        $chart10 = new LaravelChart($settings10);

        $settings11 = [
            'chart_title'           => 'معوقات تنفيذ ماتم تعلمه خلال البرنامج التدريبي',
            'chart_type'            => 'doughnut',
            'report_type'           => 'group_by_string',
            'model'                 => 'App\Models\QuestionnaireTraning',
            'group_by_field'        => 'question_11', 
            'aggregate_function'    => 'count', 
            'filter_field'          => 'created_at',
            'range_date_start'      => $startDate,
            'range_date_end'        => $endDate,
            'group_by_field_format' => 'd/m/Y H:i:s',
            'column_class'          => 'col-md-3',
            'entries_number'        => '5',
            'translation_key'       => 'questionnaireTraning',
        ];

        $chart11 = new LaravelChart($settings11);
        
        if ($request->ajax()) {
            $query = QuestionnaireTraning::query()->select(sprintf('%s.*', (new QuestionnaireTraning)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) { 

                return '<a class="btn btn-xs btn-primary" href="' . route('admin.questionnaire.traning.show', $row->id) .'">
                            '. trans('global.view') .'
                        </a>';
            }); 

            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }

        return view('admin.questionnaire.traning',compact('chart6','chart7','chart8','chart9','chart10','chart11',
            'selectedMonth', 'selectedYear' ));
    }

    public function certificate_show($id){

        $raw = QuestionnaireCertificate::findOrfail($id);

        return view('admin.questionnaire.certificate_show',compact('raw'));
    }
    public function get_certificate($id){

        $raw = QuestionnaireCertificate::findOrfail($id); 

        $path = 'public/questionnaire/questionnaireCert_'.$id .'.pdf';

        if (!Storage::exists($path)) { 
            $data = [
                'name' => $raw->name ,
                'course_name' => $raw->course_name , 
            ]; 
            $pdf = PDF::loadHTML(view('admin.courses.certificate2', $data)->toArabicHTML())->output();

            Storage::put($path, $pdf);
        }
        return Storage::download($path); 
    }

    
    
    public function certificate(Request $request)
    { 
        
        if ($request->ajax()) {
            $query = QuestionnaireCertificate::query()->select(sprintf('%s.*', (new QuestionnaireCertificate)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : '';
            });
            $table->editColumn('name', function ($row) {
                return $row->name ? $row->name : '';
            });
            $table->editColumn('course_name', function ($row) {
                return $row->course_name ? $row->course_name : '';
            });
            $table->editColumn('phone', function ($row) {
                return $row->phone ? $row->phone : '';
            });
            $table->editColumn('actions', function ($row) { 

                return '<a class="btn btn-xs btn-primary" href="' . route('admin.questionnaire.certificate.show', $row->id) .'">
                            '. trans('global.view') .'
                        </a>' . ' &nbsp; ' . '<a class="btn btn-xs btn-success" href="' . route('admin.questionnaire.get_certificate', $row->id) .'">
                            طباعة الشهادة
                        </a>';
            }); 

            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }

        return view('admin.questionnaire.certificate');
    }

    public function traning_show($id){

        $raw = QuestionnaireTraning::findOrfail($id);

        return view('admin.questionnaire.traning_show',compact('raw'));
    }
    public function volunteers(Request $request)
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
        

        $settings1 = [
            'chart_title'           => QuestionnaireVolunteer::Q_SELECT['question_1'],
            'chart_type'            => 'doughnut',
            'report_type'           => 'group_by_string',
            'model'                 => 'App\Models\QuestionnaireVolunteer',
            'group_by_field'        => 'question_1', 
            'aggregate_function'    => 'count', 
            'filter_field'          => 'created_at',
            'range_date_start'      => $startDate,
            'range_date_end'        => $endDate,
            'group_by_field_format' => 'd/m/Y H:i:s',
            'column_class'          => 'col-md-3',
            'entries_number'        => '5',
            'translation_key'       => 'QuestionnaireVolunteer',
        ];

        $chart1 = new LaravelChart($settings1);

        $settings2 = [
            'chart_title'           => QuestionnaireVolunteer::Q_SELECT['question_2'],
            'chart_type'            => 'doughnut',
            'report_type'           => 'group_by_string',
            'model'                 => 'App\Models\QuestionnaireVolunteer',
            'group_by_field'        => 'question_2', 
            'aggregate_function'    => 'count', 
            'filter_field'          => 'created_at',
            'range_date_start'      => $startDate,
            'range_date_end'        => $endDate,
            'group_by_field_format' => 'd/m/Y H:i:s',
            'column_class'          => 'col-md-3',
            'entries_number'        => '5',
            'translation_key'       => 'QuestionnaireVolunteer',
        ];

        $chart2 = new LaravelChart($settings2);

        $settings3 = [
            'chart_title'           => QuestionnaireVolunteer::Q_SELECT['question_3'],
            'chart_type'            => 'doughnut',
            'report_type'           => 'group_by_string',
            'model'                 => 'App\Models\QuestionnaireVolunteer',
            'group_by_field'        => 'question_3', 
            'aggregate_function'    => 'count', 
            'filter_field'          => 'created_at',
            'range_date_start'      => $startDate,
            'range_date_end'        => $endDate,
            'group_by_field_format' => 'd/m/Y H:i:s',
            'column_class'          => 'col-md-3',
            'entries_number'        => '5',
            'translation_key'       => 'QuestionnaireVolunteer',
        ];

        $chart3 = new LaravelChart($settings3);

        $settings4 = [
            'chart_title'           => QuestionnaireVolunteer::Q_SELECT['question_4'],
            'chart_type'            => 'doughnut',
            'report_type'           => 'group_by_string',
            'model'                 => 'App\Models\QuestionnaireVolunteer',
            'group_by_field'        => 'question_4', 
            'aggregate_function'    => 'count', 
            'filter_field'          => 'created_at',
            'range_date_start'      => $startDate,
            'range_date_end'        => $endDate,
            'group_by_field_format' => 'd/m/Y H:i:s',
            'column_class'          => 'col-md-3',
            'entries_number'        => '5',
            'translation_key'       => 'QuestionnaireVolunteer',
        ];

        $chart4 = new LaravelChart($settings4);

        $settings5 = [
            'chart_title'           => QuestionnaireVolunteer::Q_SELECT['question_5'],
            'chart_type'            => 'doughnut',
            'report_type'           => 'group_by_string',
            'model'                 => 'App\Models\QuestionnaireVolunteer',
            'group_by_field'        => 'question_5', 
            'aggregate_function'    => 'count', 
            'filter_field'          => 'created_at',
            'range_date_start'      => $startDate,
            'range_date_end'        => $endDate,
            'group_by_field_format' => 'd/m/Y H:i:s',
            'column_class'          => 'col-md-3',
            'entries_number'        => '5',
            'translation_key'       => 'QuestionnaireVolunteer',
        ];

        $chart5 = new LaravelChart($settings5);

        $settings6 = [
            'chart_title'           => QuestionnaireVolunteer::Q_SELECT['question_6'],
            'chart_type'            => 'doughnut',
            'report_type'           => 'group_by_string',
            'model'                 => 'App\Models\QuestionnaireVolunteer',
            'group_by_field'        => 'question_6', 
            'aggregate_function'    => 'count', 
            'filter_field'          => 'created_at',
            'range_date_start'      => $startDate,
            'range_date_end'        => $endDate,
            'group_by_field_format' => 'd/m/Y H:i:s',
            'column_class'          => 'col-md-3',
            'entries_number'        => '5',
            'translation_key'       => 'QuestionnaireVolunteer',
        ];

        $chart6 = new LaravelChart($settings6);
        
        $settings7 = [
            'chart_title'           => QuestionnaireVolunteer::Q_SELECT['question_7'],
            'chart_type'            => 'doughnut',
            'report_type'           => 'group_by_string',
            'model'                 => 'App\Models\QuestionnaireVolunteer',
            'group_by_field'        => 'question_7', 
            'aggregate_function'    => 'count', 
            'filter_field'          => 'created_at',
            'range_date_start'      => $startDate,
            'range_date_end'        => $endDate,
            'group_by_field_format' => 'd/m/Y H:i:s',
            'column_class'          => 'col-md-3',
            'entries_number'        => '5',
            'translation_key'       => 'QuestionnaireVolunteer',
        ];

        $chart7 = new LaravelChart($settings7);

        $settings8 = [
            'chart_title'           => QuestionnaireVolunteer::Q_SELECT['question_8'],
            'chart_type'            => 'doughnut',
            'report_type'           => 'group_by_string',
            'model'                 => 'App\Models\QuestionnaireVolunteer',
            'group_by_field'        => 'question_8', 
            'aggregate_function'    => 'count', 
            'filter_field'          => 'created_at',
            'range_date_start'      => $startDate,
            'range_date_end'        => $endDate,
            'group_by_field_format' => 'd/m/Y H:i:s',
            'column_class'          => 'col-md-3',
            'entries_number'        => '5',
            'translation_key'       => 'QuestionnaireVolunteer',
        ];

        $chart8 = new LaravelChart($settings8);

        $settings9 = [
            'chart_title'           => QuestionnaireVolunteer::Q_SELECT['question_9'],
            'chart_type'            => 'doughnut',
            'report_type'           => 'group_by_string',
            'model'                 => 'App\Models\QuestionnaireVolunteer',
            'group_by_field'        => 'question_9', 
            'aggregate_function'    => 'count', 
            'filter_field'          => 'created_at',
            'range_date_start'      => $startDate,
            'range_date_end'        => $endDate,
            'group_by_field_format' => 'd/m/Y H:i:s',
            'column_class'          => 'col-md-3',
            'entries_number'        => '5',
            'translation_key'       => 'QuestionnaireVolunteer',
        ];

        $chart9 = new LaravelChart($settings9);

        if ($request->ajax()) {
            $query = QuestionnaireVolunteer::query()->select(sprintf('%s.*', (new QuestionnaireVolunteer)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) { 

                return '<a class="btn btn-xs btn-primary" href="' . route('admin.questionnaire.volunteers.show', $row->id) .'">
                    '. trans('global.view') .'
                </a>';
            }); 

            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }

        return view('admin.questionnaire.volunteers',compact('chart1','chart2','chart3','chart4','chart5','chart6','chart7','chart8','chart9',
            'selectedMonth', 'selectedYear' ));
    }
    public function volunteers_show($id){

        $raw = QuestionnaireVolunteer::findOrfail($id);

        return view('admin.questionnaire.volunteers_show',compact('raw'));
    }
    public function courses(Request $request)
    { 
        $course_type = request('course_type') ?? 1;

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

        $settings1 = [
            'chart_title'           => QuestionnaireCourse::Q_SELECT['question_1'],
            'chart_type'            => 'doughnut',
            'report_type'           => 'group_by_string',
            'model'                 => 'App\Models\QuestionnaireCourse',
            'group_by_field'        => 'question_1', 
            'aggregate_function'    => 'count', 
            'filter_field'          => 'created_at',
            'where_raw'             => 'course_type = ' . $course_type,
            'range_date_start'      => $startDate,
            'range_date_end'        => $endDate,
            'group_by_field_format' => 'd/m/Y H:i:s',
            'column_class'          => 'col-md-2',
            'entries_number'        => '5',
            'translation_key'       => 'QuestionnaireCourse',
        ];

        $chart1 = new LaravelChart($settings1);

        $settings2 = [
            'chart_title'           => QuestionnaireCourse::Q_SELECT['question_2'],
            'chart_type'            => 'doughnut',
            'report_type'           => 'group_by_string',
            'model'                 => 'App\Models\QuestionnaireCourse',
            'group_by_field'        => 'question_2', 
            'aggregate_function'    => 'count', 
            'filter_field'          => 'created_at',
            'where_raw'             => 'course_type = ' . $course_type,
            'range_date_start'      => $startDate,
            'range_date_end'        => $endDate,
            'group_by_field_format' => 'd/m/Y H:i:s',
            'column_class'          => 'col-md-2',
            'entries_number'        => '5',
            'translation_key'       => 'QuestionnaireCourse',
        ];

        $chart2 = new LaravelChart($settings2);

        $settings3 = [
            'chart_title'           => QuestionnaireCourse::Q_SELECT['question_3'],
            'chart_type'            => 'doughnut',
            'report_type'           => 'group_by_string',
            'model'                 => 'App\Models\QuestionnaireCourse',
            'group_by_field'        => 'question_3', 
            'aggregate_function'    => 'count', 
            'filter_field'          => 'created_at',
            'where_raw'             => 'course_type = ' . $course_type,
            'range_date_start'      => $startDate,
            'range_date_end'        => $endDate,
            'group_by_field_format' => 'd/m/Y H:i:s',
            'column_class'          => 'col-md-2',
            'entries_number'        => '5',
            'translation_key'       => 'QuestionnaireCourse',
        ];

        $chart3 = new LaravelChart($settings3);

        $settings4 = [
            'chart_title'           => QuestionnaireCourse::Q_SELECT['question_4'],
            'chart_type'            => 'doughnut',
            'report_type'           => 'group_by_string',
            'model'                 => 'App\Models\QuestionnaireCourse',
            'group_by_field'        => 'question_4', 
            'aggregate_function'    => 'count', 
            'filter_field'          => 'created_at',
            'where_raw'             => 'course_type = ' . $course_type,
            'range_date_start'      => $startDate,
            'range_date_end'        => $endDate,
            'group_by_field_format' => 'd/m/Y H:i:s',
            'column_class'          => 'col-md-2',
            'entries_number'        => '5',
            'translation_key'       => 'QuestionnaireCourse',
        ];

        $chart4 = new LaravelChart($settings4);

        $settings5 = [
            'chart_title'           => QuestionnaireCourse::Q_SELECT['question_5'],
            'chart_type'            => 'doughnut',
            'report_type'           => 'group_by_string',
            'model'                 => 'App\Models\QuestionnaireCourse',
            'group_by_field'        => 'question_5', 
            'aggregate_function'    => 'count', 
            'filter_field'          => 'created_at',
            'where_raw'             => 'course_type = ' . $course_type,
            'group_by_field_format' => 'd/m/Y H:i:s',
            'column_class'          => 'col-md-2',
            'entries_number'        => '5',
            'translation_key'       => 'QuestionnaireCourse',
        ];

        $chart5 = new LaravelChart($settings5);

        $settings6 = [
            'chart_title'           => QuestionnaireCourse::Q_SELECT['question_6'],
            'chart_type'            => 'doughnut',
            'report_type'           => 'group_by_string',
            'model'                 => 'App\Models\QuestionnaireCourse',
            'group_by_field'        => 'question_6', 
            'aggregate_function'    => 'count', 
            'filter_field'          => 'created_at',
            'where_raw'             => 'course_type = ' . $course_type,
            'range_date_start'      => $startDate,
            'range_date_end'        => $endDate,
            'group_by_field_format' => 'd/m/Y H:i:s',
            'column_class'          => 'col-md-2',
            'entries_number'        => '5',
            'translation_key'       => 'QuestionnaireCourse',
        ];

        $chart6 = new LaravelChart($settings6);
        
        $settings7 = [
            'chart_title'           => QuestionnaireCourse::Q_SELECT['question_7'],
            'chart_type'            => 'doughnut',
            'report_type'           => 'group_by_string',
            'model'                 => 'App\Models\QuestionnaireCourse',
            'group_by_field'        => 'question_7', 
            'aggregate_function'    => 'count', 
            'filter_field'          => 'created_at',
            'where_raw'             => 'course_type = ' . $course_type,
            'group_by_field_format' => 'd/m/Y H:i:s',
            'column_class'          => 'col-md-3',
            'entries_number'        => '5',
            'translation_key'       => 'QuestionnaireCourse',
        ];

        $chart7 = new LaravelChart($settings7);

        $settings8 = [
            'chart_title'           => QuestionnaireCourse::Q_SELECT['question_8'],
            'chart_type'            => 'doughnut',
            'report_type'           => 'group_by_string',
            'model'                 => 'App\Models\QuestionnaireCourse',
            'group_by_field'        => 'question_8', 
            'aggregate_function'    => 'count', 
            'filter_field'          => 'created_at',
            'where_raw'             => 'course_type = ' . $course_type,
            'range_date_start'      => $startDate,
            'range_date_end'        => $endDate,
            'group_by_field_format' => 'd/m/Y H:i:s',
            'column_class'          => 'col-md-3',
            'entries_number'        => '5',
            'translation_key'       => 'QuestionnaireCourse',
        ];

        $chart8 = new LaravelChart($settings8);

        $settings9 = [
            'chart_title'           => QuestionnaireCourse::Q_SELECT['question_9'],
            'chart_type'            => 'doughnut',
            'report_type'           => 'group_by_string',
            'model'                 => 'App\Models\QuestionnaireCourse',
            'group_by_field'        => 'question_9', 
            'aggregate_function'    => 'count', 
            'filter_field'          => 'created_at',
            'where_raw'             => 'course_type = ' . $course_type,
            'range_date_start'      => $startDate,
            'range_date_end'        => $endDate,
            'group_by_field_format' => 'd/m/Y H:i:s',
            'column_class'          => 'col-md-3',
            'entries_number'        => '5',
            'translation_key'       => 'QuestionnaireCourse',
        ];

        $chart9 = new LaravelChart($settings9);

        $settings10 = [
            'chart_title'           => QuestionnaireCourse::Q_SELECT['question_10'],
            'chart_type'            => 'doughnut',
            'report_type'           => 'group_by_string',
            'model'                 => 'App\Models\QuestionnaireCourse',
            'group_by_field'        => 'question_10', 
            'aggregate_function'    => 'count', 
            'filter_field'          => 'created_at',
            'where_raw'             => 'course_type = ' . $course_type,
            'range_date_start'      => $startDate,
            'range_date_end'        => $endDate,
            'group_by_field_format' => 'd/m/Y H:i:s',
            'column_class'          => 'col-md-3',  
            'entries_number'        => '5',
            'translation_key'       => 'QuestionnaireCourse',
        ];

        $chart10 = new LaravelChart($settings10);

        $settings11 = [
            'chart_title'           => QuestionnaireCourse::Q_SELECT['question_11'],
            'chart_type'            => 'doughnut',
            'report_type'           => 'group_by_string',
            'model'                 => 'App\Models\QuestionnaireCourse',
            'group_by_field'        => 'question_11', 
            'aggregate_function'    => 'count', 
            'filter_field'          => 'created_at',
            'where_raw'             => 'course_type = ' . $course_type,
            'range_date_start'      => $startDate,
            'range_date_end'        => $endDate,
            'group_by_field_format' => 'd/m/Y H:i:s',
            'column_class'          => 'col-md-3',
            'entries_number'        => '5',
            'translation_key'       => 'QuestionnaireCourse',
        ];

        $chart11 = new LaravelChart($settings11);

        $settings12 = [
            'chart_title'           => QuestionnaireCourse::Q_SELECT['question_12'],
            'chart_type'            => 'doughnut',
            'report_type'           => 'group_by_string',
            'model'                 => 'App\Models\QuestionnaireCourse',
            'group_by_field'        => 'question_12', 
            'aggregate_function'    => 'count', 
            'filter_field'          => 'created_at',
            'where_raw'             => 'course_type = ' . $course_type,
            'range_date_start'      => $startDate,
            'range_date_end'        => $endDate,
            'group_by_field_format' => 'd/m/Y H:i:s',
            'column_class'          => 'col-md-3',
            'entries_number'        => '5',
            'translation_key'       => 'QuestionnaireCourse',
        ];

        $chart12 = new LaravelChart($settings12);

        $settings13 = [
            'chart_title'           => QuestionnaireCourse::Q_SELECT['question_13'],
            'chart_type'            => 'doughnut',
            'report_type'           => 'group_by_string',
            'model'                 => 'App\Models\QuestionnaireCourse',
            'group_by_field'        => 'question_13', 
            'aggregate_function'    => 'count', 
            'filter_field'          => 'created_at',
            'where_raw'             => 'course_type = ' . $course_type,
            'range_date_start'      => $startDate,
            'range_date_end'        => $endDate,
            'group_by_field_format' => 'd/m/Y H:i:s',
            'column_class'          => 'col-md-3',
            'entries_number'        => '5',
            'translation_key'       => 'QuestionnaireCourse',
        ];

        $chart13 = new LaravelChart($settings13);

        $settings14 = [
            'chart_title'           => QuestionnaireCourse::Q_SELECT['question_14'],
            'chart_type'            => 'doughnut',
            'report_type'           => 'group_by_string',
            'model'                 => 'App\Models\QuestionnaireCourse',
            'group_by_field'        => 'question_14', 
            'aggregate_function'    => 'count', 
            'filter_field'          => 'created_at',
            'where_raw'             => 'course_type = ' . $course_type,
            'group_by_field_format' => 'd/m/Y H:i:s',
            'column_class'          => 'col-md-3',
            'entries_number'        => '5',
            'translation_key'       => 'QuestionnaireCourse',
        ];

        $chart14 = new LaravelChart($settings14);

        $settings15 = [
            'chart_title'           => QuestionnaireCourse::Q_SELECT['question_15'],
            'chart_type'            => 'doughnut',
            'report_type'           => 'group_by_string',
            'model'                 => 'App\Models\QuestionnaireCourse',
            'group_by_field'        => 'question_15', 
            'aggregate_function'    => 'count', 
            'filter_field'          => 'created_at',
            'where_raw'             => 'course_type = ' . $course_type,
            'range_date_start'      => $startDate,
            'range_date_end'        => $endDate,
            'group_by_field_format' => 'd/m/Y H:i:s',
            'column_class'          => 'col-md-3',
            'entries_number'        => '5',
            'translation_key'       => 'QuestionnaireCourse',
        ];

        $chart15 = new LaravelChart($settings15);

        $settings16 = [
            'chart_title'           => QuestionnaireCourse::Q_SELECT['question_16'],
            'chart_type'            => 'doughnut',
            'report_type'           => 'group_by_string',
            'model'                 => 'App\Models\QuestionnaireCourse',
            'group_by_field'        => 'question_16', 
            'aggregate_function'    => 'count', 
            'filter_field'          => 'created_at',
            'where_raw'             => 'course_type = ' . $course_type,
            'range_date_start'      => $startDate,
            'range_date_end'        => $endDate,
            'group_by_field_format' => 'd/m/Y H:i:s',
            'column_class'          => 'col-md-4',
            'entries_number'        => '5',
            'translation_key'       => 'QuestionnaireCourse',
        ];

        $chart16 = new LaravelChart($settings16);

        $settings17 = [
            'chart_title'           => QuestionnaireCourse::Q_SELECT['question_17'],
            'chart_type'            => 'doughnut',
            'report_type'           => 'group_by_string',
            'model'                 => 'App\Models\QuestionnaireCourse',
            'group_by_field'        => 'question_17', 
            'aggregate_function'    => 'count', 
            'filter_field'          => 'created_at',
            'where_raw'             => 'course_type = ' . $course_type,
            'range_date_start'      => $startDate,
            'range_date_end'        => $endDate,
            'group_by_field_format' => 'd/m/Y H:i:s',
            'column_class'          => 'col-md-4',
            'entries_number'        => '5',
            'translation_key'       => 'QuestionnaireCourse',
        ];

        $chart17 = new LaravelChart($settings17);


        if ($request->ajax()) {
            $query = QuestionnaireCourse::where('course_type',request('course_type') ?? 1)->select(sprintf('%s.*', (new QuestionnaireCourse)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) { 

                return '<a class="btn btn-xs btn-primary" href="' . route('admin.questionnaire.courses.show', $row->id) .'">
                            '. trans('global.view') .'
                        </a>';
            }); 

            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }
        return view('admin.questionnaire.courses',compact('chart1','chart2','chart3','chart4','chart5','chart6','chart7','chart8','chart9','chart10'
        ,'chart11','chart12','chart13','chart14','chart15','chart16','chart17','course_type','selectedMonth','selectedYear'));
    }
    public function courses_show($id){

        $raw = QuestionnaireCourse::findOrfail($id);

        return view('admin.questionnaire.courses_show',compact('raw'));
    } 

    
    public function members(Request $request)
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
        $settings1 = [
            'chart_title'           => QuestionnaireMember::Q_SELECT['question_1'],
            'chart_type'            => 'doughnut',
            'report_type'           => 'group_by_string',
            'model'                 => 'App\Models\QuestionnaireMember',
            'group_by_field'        => 'question_1', 
            'aggregate_function'    => 'count', 
            'filter_field'          => 'created_at',
            'range_date_start'      => $startDate,
            'range_date_end'        => $endDate,
            'group_by_field_format' => 'd/m/Y H:i:s',
            'column_class'          => 'col-md-3',
            'entries_number'        => '5',
            'translation_key'       => 'QuestionnaireMember',
        ];

        $chart1 = new LaravelChart($settings1);

        $settings2 = [
            'chart_title'           => QuestionnaireMember::Q_SELECT['question_2'],
            'chart_type'            => 'doughnut',
            'report_type'           => 'group_by_string',
            'model'                 => 'App\Models\QuestionnaireMember',
            'group_by_field'        => 'question_2', 
            'aggregate_function'    => 'count', 
            'filter_field'          => 'created_at',
            'range_date_start'      => $startDate,
            'range_date_end'        => $endDate,
            'group_by_field_format' => 'd/m/Y H:i:s',
            'column_class'          => 'col-md-3',
            'entries_number'        => '5',
            'translation_key'       => 'QuestionnaireMember',
        ];

        $chart2 = new LaravelChart($settings2);

        $settings3 = [
            'chart_title'           => QuestionnaireMember::Q_SELECT['question_3'],
            'chart_type'            => 'doughnut',
            'report_type'           => 'group_by_string',
            'model'                 => 'App\Models\QuestionnaireMember',
            'group_by_field'        => 'question_3', 
            'aggregate_function'    => 'count', 
            'filter_field'          => 'created_at',
            'range_date_start'      => $startDate,
            'range_date_end'        => $endDate,
            'group_by_field_format' => 'd/m/Y H:i:s',
            'column_class'          => 'col-md-3',
            'entries_number'        => '5',
            'translation_key'       => 'QuestionnaireMember',
        ];

        $chart3 = new LaravelChart($settings3);

        $settings4 = [
            'chart_title'           => QuestionnaireMember::Q_SELECT['question_4'],
            'chart_type'            => 'doughnut',
            'report_type'           => 'group_by_string',
            'model'                 => 'App\Models\QuestionnaireMember',
            'group_by_field'        => 'question_4', 
            'aggregate_function'    => 'count', 
            'filter_field'          => 'created_at',
            'range_date_start'      => $startDate,
            'range_date_end'        => $endDate,
            'group_by_field_format' => 'd/m/Y H:i:s',
            'column_class'          => 'col-md-3',
            'entries_number'        => '5',
            'translation_key'       => 'QuestionnaireMember',
        ];

        $chart4 = new LaravelChart($settings4);

        $settings5 = [
            'chart_title'           => QuestionnaireMember::Q_SELECT['question_5'],
            'chart_type'            => 'doughnut',
            'report_type'           => 'group_by_string',
            'model'                 => 'App\Models\QuestionnaireMember',
            'group_by_field'        => 'question_5', 
            'aggregate_function'    => 'count', 
            'filter_field'          => 'created_at',
            'range_date_start'      => $startDate,
            'range_date_end'        => $endDate,
            'group_by_field_format' => 'd/m/Y H:i:s',
            'column_class'          => 'col-md-3',
            'entries_number'        => '5',
            'translation_key'       => 'QuestionnaireMember',
        ];

        $chart5 = new LaravelChart($settings5);

        $settings6 = [
            'chart_title'           => QuestionnaireMember::Q_SELECT['question_6'],
            'chart_type'            => 'doughnut',
            'report_type'           => 'group_by_string',
            'model'                 => 'App\Models\QuestionnaireMember',
            'group_by_field'        => 'question_6', 
            'aggregate_function'    => 'count', 
            'filter_field'          => 'created_at',
            'range_date_start'      => $startDate,
            'range_date_end'        => $endDate,
            'group_by_field_format' => 'd/m/Y H:i:s',
            'column_class'          => 'col-md-3',
            'entries_number'        => '5',
            'translation_key'       => 'QuestionnaireMember',
        ];

        $chart6 = new LaravelChart($settings6);
        
        $settings7 = [
            'chart_title'           => QuestionnaireMember::Q_SELECT['question_7'],
            'chart_type'            => 'doughnut',
            'report_type'           => 'group_by_string',
            'model'                 => 'App\Models\QuestionnaireMember',
            'group_by_field'        => 'question_7', 
            'aggregate_function'    => 'count', 
            'filter_field'          => 'created_at',
            'range_date_start'      => $startDate,
            'range_date_end'        => $endDate,
            'group_by_field_format' => 'd/m/Y H:i:s',
            'column_class'          => 'col-md-3',
            'entries_number'        => '5',
            'translation_key'       => 'QuestionnaireMember',
        ];

        $chart7 = new LaravelChart($settings7); 

        if ($request->ajax()) {
            $query = QuestionnaireMember::query()->select(sprintf('%s.*', (new QuestionnaireMember)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) { 

                return '<a class="btn btn-xs btn-primary" href="' . route('admin.questionnaire.members.show', $row->id) .'">
                    '. trans('global.view') .'
                </a>';
            }); 

            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }

        return view('admin.questionnaire.members',compact('chart1','chart2','chart3','chart4','chart5','chart6','chart7',
            'selectedMonth', 'selectedYear'));
    }
    public function members_show($id){

        $raw = QuestionnaireMember::findOrfail($id);

        return view('admin.questionnaire.members_show',compact('raw'));
    }
    public function specialneed(Request $request)
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
        $settings1 = [
            'chart_title'           => 'الحالة الاجتماعية',
            'chart_type'            => 'pie',
            'report_type'           => 'group_by_string',
            'model'                 => 'App\Models\QuestionnaireSpecialNeed',
            'group_by_field'        => 'marige_status',
            'aggregate_function'    => 'count',
            'filter_field'          => 'created_at',
            'range_date_start'      => $startDate,
            'range_date_end'        => $endDate,
            'group_by_field_format' => 'd/m/Y H:i:s',
            'column_class'          => 'col-md-4',
            'entries_number'        => '5',
            'translation_key'       => 'QuestionnaireSpecialNeed',
            'group_by_field_special'=> 'MARIGE_STATUS_SELECT'
        ];

        $chart1 = new LaravelChart($settings1);

        $settings2 = [
            'chart_title'           => 'الفئة العمرية',
            'chart_type'            => 'bar',
            'report_type'           => 'group_by_string',
            'model'                 => 'App\Models\QuestionnaireSpecialNeed',
            'group_by_field'        => 'age_range',
            'aggregate_function'    => 'count',
            'filter_field'          => 'created_at',
            'range_date_start'      => $startDate,
            'range_date_end'        => $endDate,
            'group_by_field_format' => 'd/m/Y H:i:s', 
            'column_class'          => 'col-md-4',
            'entries_number'        => '5',
            'translation_key'       => 'QuestionnaireSpecialNeed',
            'group_by_field_special'=> 'AGE_RANGE_SELECT'
        ];

        $chart2 = new LaravelChart($settings2);

        $settings3 = [
            'chart_title'           => 'المستوى التعليمي',
            'chart_type'            => 'doughnut',
            'report_type'           => 'group_by_string',
            'model'                 => 'App\Models\QuestionnaireSpecialNeed', 
            'group_by_field'        => 'special_need_education',
            'aggregate_function'    => 'count',
            'filter_field'          => 'created_at',
            'range_date_start'      => $startDate,
            'range_date_end'        => $endDate,
            'group_by_field_format' => 'd/m/Y H:i:s',
            'column_class'          => 'col-md-4',
            'entries_number'        => '5',
            'translation_key'       => 'QuestionnaireSpecialNeed',
            'group_by_field_special'=> 'SPECIAL_NEED_EDUCATION_SELECT'
        ];

        $chart3 = new LaravelChart($settings3);

        $settings4 = [
            'chart_title'           => 'صلة القرابة',
            'chart_type'            => 'pie',
            'report_type'           => 'group_by_string',
            'model'                 => 'App\Models\QuestionnaireSpecialNeed',
            'group_by_field'        => 'relation',
            'aggregate_function'    => 'count',
            'filter_field'          => 'created_at',
            'range_date_start'      => $startDate,
            'range_date_end'        => $endDate,
            'group_by_field_format' => 'd/m/Y H:i:s', 
            'column_class'          => 'col-md-6',
            'entries_number'        => '5',
            'translation_key'       => 'QuestionnaireSpecialNeed',
            'group_by_field_special'=> 'RELATION_SELECT'
        ];

        $chart4 = new LaravelChart($settings4);

        $settings5 = [
            'chart_title'           => 'لديه احتياجات خاصة',
            'chart_type'            => 'pie',
            'report_type'           => 'group_by_string',
            'model'                 => 'App\Models\QuestionnaireSpecialNeed',
            'group_by_field'        => 'has_special_needs',
            'aggregate_function'    => 'count',
            'filter_field'          => 'created_at',
            'range_date_start'      => $startDate,
            'range_date_end'        => $endDate,
            'group_by_field_format' => 'd/m/Y H:i:s',
            'column_class'          => 'col-md-6',
            'entries_number'        => '5',
            'translation_key'       => 'QuestionnaireSpecialNeed',
            'group_by_field_special'=> 'HAS_SPECIAL_NEEDS_SELECT'
        ];
        
        $chart5 = new LaravelChart($settings5);

        if ($request->ajax()) {
            $query = QuestionnaireSpecialNeed::query()->select(sprintf('%s.*', (new QuestionnaireSpecialNeed)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) { 

                return '<a class="btn btn-xs btn-primary" href="' . route('admin.questionnaire.specialneed.show', $row->id) .'">
                    '. trans('global.view') .'
                </a>';
            }); 
            $table->editColumn('has_special_needs', function ($row) {
                return $row->has_special_needs ? 'نعم' : 'لا';
            });
            $table->editColumn('age_range', function ($row) {
                return QuestionnaireSpecialNeed::AGE_RANGE_SELECT[$row->age_range] ?? '';
            });
            $table->editColumn('special_need_education', function ($row) {
                return QuestionnaireSpecialNeed::SPECIAL_NEED_EDUCATION_SELECT[$row->special_need_education] ?? '';
            }); 
            $table->editColumn('marige_status', function ($row) {
                return QuestionnaireSpecialNeed::MARIGE_STATUS_SELECT[$row->marige_status] ?? '';
            });
            $table->editColumn('relation', function ($row) {
                return QuestionnaireSpecialNeed::RELATION_SELECT[$row->relation] ?? '';
            });  

            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }

        return view('admin.questionnaire.special_needs',compact('chart1','chart2','chart3','chart4','chart5',
            'selectedMonth', 'selectedYear'));
    }
    public function specialneed_show($id){

        $raw = QuestionnaireSpecialNeed::findOrfail($id);

        return view('admin.questionnaire.special_needs_show',compact('raw'));
    }
}