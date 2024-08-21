<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCourseStudentRequest;
use App\Models\Course;
use App\Models\CourseStudent;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function courses(){
        $courses = Course::where('published',1)->orderBy('created_at','desc')->paginate(15);
        return view('frontend.courses',compact('courses'));
    }

    public function course($id){
        $course = Course::findOrFail($id);
        return view('frontend.course',compact('course'));
    }

    public function subscribe($id){
        $course = Course::findOrFail($id);
        return view('frontend.courseStudent',compact('course')); 
    }
    

    public function storeStudent(StoreCourseStudentRequest $request)
    { 
        $courseStudent = CourseStudent::create($request->all());

        alert('تم أرسال طلبك بنجاح','','success');
        return redirect()->route('home');
    }
}
