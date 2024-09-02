<?php

use App\Http\Resources\PostResource;
use App\Http\Resources\ProjectResource;
use App\Models\Course;
use App\Models\CourseStudent;
use App\Models\Post;
use App\Models\Project;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

if (! function_exists('headline_items')) {
    function headline_items(){ 
        $posts = Post::where('published',1)->where('head_line',1);
        $projects = Project::where('published',1)->where('head_line',1); 
        $posts_collection = collect(PostResource::collection($posts->get()));
        $projects_collection = collect(ProjectResource::collection($projects->get()));
        $merge = $posts_collection->merge($projects_collection);
        $items = collect($merge->sortBy('updated_at')->reverse()->values()->all()); 
        return json_decode($items);
    }
}


if (! function_exists('certificate_store')) {
    function certificate_store($courseStudentId){
        $courseStudent = CourseStudent::findOrFail($courseStudentId);
        $courseStudent->load('course');

        $path = 'public/courses/course_'.$courseStudent->id.'_'. $courseStudent->course_id .'.pdf';

        if (!Storage::exists($path)) {
            $day = date('D', strtotime(Carbon::createFromFormat(config('panel.date_format'), $courseStudent->course->start_at)->format('Y-m-d')));
            $days = [
                'Sun' => 'الأحد',
                'Mon' => 'الإثنين',
                'Tue' => 'الثلاثاء',
                'Wed' => 'الأربعاء',
                'Thu' => 'الخميس',
                'Fri' => 'الجمعة',
                'Sat' => 'السبت',
            ];

            $data = [
                'name' => $courseStudent->name ,
                'course_name' => $courseStudent->course->title ?? '' ,
                'day' => $days[$day],
                'trainer' => $courseStudent->course->trainer ?? '' ,
                'attend_type' => $courseStudent->course->attend_type ? Course::ATTEND_TYPE_SELECT[$courseStudent->course->attend_type] : '',
                'course_date' => $courseStudent->course->start_at ? Carbon::createFromFormat(config('panel.date_format'), $courseStudent->course->start_at)->format('Y / m / d')   : '' ,
            ];
            $html = view('admin.courses.certificate',$data)->toArabicHTML();
            $pdf = PDF::loadHTML($html)->output();

            Storage::put($path, $pdf);
        }
        return $path;
    }
}