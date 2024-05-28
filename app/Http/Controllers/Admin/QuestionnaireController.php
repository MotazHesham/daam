<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\QuestionnaireCourse;
use App\Models\QuestionnaireTraning;
use App\Models\QuestionnaireVolunteer;
use Illuminate\Http\Request;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;
use Yajra\DataTables\Facades\DataTables;

class QuestionnaireController extends Controller
{
    public function traning(Request $request)
    {

        $settings6 = [
            'chart_title'           => QuestionnaireTraning::Q_SELECT['question_6'],
            'chart_type'            => 'doughnut',
            'report_type'           => 'group_by_string',
            'model'                 => 'App\Models\QuestionnaireTraning',
            'group_by_field'        => 'question_6', 
            'aggregate_function'    => 'count', 
            'filter_field'          => 'created_at',
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

        return view('admin.questionnaire.traning',compact('chart6','chart7','chart8','chart9','chart10','chart11'));
    }

    public function traning_show($id){

        $raw = QuestionnaireTraning::findOrfail($id);

        return view('admin.questionnaire.traning_show',compact('raw'));
    }
    public function volunteers(Request $request)
    {


        $settings1 = [
            'chart_title'           => QuestionnaireVolunteer::Q_SELECT['question_1'],
            'chart_type'            => 'doughnut',
            'report_type'           => 'group_by_string',
            'model'                 => 'App\Models\QuestionnaireVolunteer',
            'group_by_field'        => 'question_1', 
            'aggregate_function'    => 'count', 
            'filter_field'          => 'created_at',
            'group_by_field_format' => 'd/m/Y H:i:s',
            'column_class'          => 'col-md-2',
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
            'group_by_field_format' => 'd/m/Y H:i:s',
            'column_class'          => 'col-md-2',
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
            'group_by_field_format' => 'd/m/Y H:i:s',
            'column_class'          => 'col-md-2',
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
            'group_by_field_format' => 'd/m/Y H:i:s',
            'column_class'          => 'col-md-2',
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
            'group_by_field_format' => 'd/m/Y H:i:s',
            'column_class'          => 'col-md-2',
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
            'group_by_field_format' => 'd/m/Y H:i:s',
            'column_class'          => 'col-md-2',
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
            'group_by_field_format' => 'd/m/Y H:i:s',
            'column_class'          => 'col-md-2',
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
            'group_by_field_format' => 'd/m/Y H:i:s',
            'column_class'          => 'col-md-2',
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
            'group_by_field_format' => 'd/m/Y H:i:s',
            'column_class'          => 'col-md-2',
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

        return view('admin.questionnaire.volunteers',compact('chart1','chart2','chart3','chart4','chart5','chart6','chart7','chart8','chart9'));
    }
    public function volunteers_show($id){

        $raw = QuestionnaireVolunteer::findOrfail($id);

        return view('admin.questionnaire.volunteers_show',compact('raw'));
    }
    public function courses(Request $request)
    {

        $settings1 = [
            'chart_title'           => QuestionnaireCourse::Q_SELECT['question_1'],
            'chart_type'            => 'doughnut',
            'report_type'           => 'group_by_string',
            'model'                 => 'App\Models\QuestionnaireCourse',
            'group_by_field'        => 'question_1', 
            'aggregate_function'    => 'count', 
            'filter_field'          => 'created_at',
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
            'group_by_field_format' => 'd/m/Y H:i:s',
            'column_class'          => 'col-md-2',
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
            'group_by_field_format' => 'd/m/Y H:i:s',
            'column_class'          => 'col-md-2',
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
            'group_by_field_format' => 'd/m/Y H:i:s',
            'column_class'          => 'col-md-2',
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
            'group_by_field_format' => 'd/m/Y H:i:s',
            'column_class'          => 'col-md-2',
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
            'group_by_field_format' => 'd/m/Y H:i:s',
            'column_class'          => 'col-md-2',
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
            'group_by_field_format' => 'd/m/Y H:i:s',
            'column_class'          => 'col-md-2',
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
            'group_by_field_format' => 'd/m/Y H:i:s',
            'column_class'          => 'col-md-2',
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
            'group_by_field_format' => 'd/m/Y H:i:s',
            'column_class'          => 'col-md-2',
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
            'group_by_field_format' => 'd/m/Y H:i:s',
            'column_class'          => 'col-md-2',
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
            'group_by_field_format' => 'd/m/Y H:i:s',
            'column_class'          => 'col-md-2',
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
            'group_by_field_format' => 'd/m/Y H:i:s',
            'column_class'          => 'col-md-2',
            'entries_number'        => '5',
            'translation_key'       => 'QuestionnaireCourse',
        ];

        $chart17 = new LaravelChart($settings17);


        if ($request->ajax()) {
            $query = QuestionnaireCourse::query()->select(sprintf('%s.*', (new QuestionnaireCourse)->table));
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
        ,'chart11','chart12','chart13','chart14','chart15','chart16','chart17'));
    }
    public function courses_show($id){

        $raw = QuestionnaireCourse::findOrfail($id);

        return view('admin.questionnaire.courses_show',compact('raw'));
    }
}