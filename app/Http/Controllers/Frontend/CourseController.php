<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCourseStudentRequest;
use App\Models\Course;
use App\Models\CourseAttendance;
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
    public function course_attend($id){
        $course = Course::findOrFail(decrypt($id));
        return view('frontend.course_attend',compact('course'));
    }
    public function course_certificate($id){
        $course = Course::findOrFail(decrypt($id));
        return view('frontend.course_certificate',compact('course'));
    }

    public function attend_store(Request $request){
        $courseStudent = CourseStudent::where('course_id',$request->course_id)->where('identity_num',$request->identity_num)->first();
        if(!$courseStudent){
            return redirect()->back()->withErrors(['errors'=>[
                'رقم الهوية' => 'انت غير مسجل في هذه الدورة'
            ]]);
        }
        $courseAttendance = CourseAttendance::where('date',date('Y-m-d'))->where('course_id',$request->course_id)->where('course_student_id',$courseStudent->id)->first();
        if($courseAttendance){
            return redirect()->back()->withErrors(['errors'=>[
                'رقم الهوية ' => 'لقد قمت بتسجيل حضورك بالفعل في هذا اليوم لهذه الدورة'
            ]]);
        }else{
            $courseAttendance = new CourseAttendance();
            $courseAttendance->course_id = $request->course_id;
            $courseAttendance->course_student_id = $courseStudent->id;
            $courseAttendance->date = date('Y-m-d');
            $courseAttendance->save();
        }
        
        alert('تم تسجيل حضورك بنجاح','','success');
        return redirect()->back();
    }

    public function certificate_store(Request $request){
        $courseStudent = CourseStudent::where('course_id',$request->course_id)->where('identity_num',$request->identity_num)->first();
        if(!$courseStudent){
            return redirect()->back()->withErrors(['errors'=>[
                'رقم الهوية' => 'انت غير مسجل في هذه الدورة'
            ]]);
        }
        $courseStudent->update(['request_certificate' => 1,'email_certificate' => $request->email]);
        certificate_store($courseStudent->id);

        alert('تم طلب الشهادة بنجاح','وسيتم ارسالها في اقرب وقت','success');
        return redirect()->back();
    }
    public function subscribe($id){
        $course = Course::findOrFail($id);
        return view('frontend.courseStudent',compact('course')); 
    }
    

    public function storeStudent(StoreCourseStudentRequest $request)
    { 
        if(!CourseStudent::where('identity_num',$request->identity_num)->where('course_id',$request->course_id)->first()){ 
            $courseStudent = CourseStudent::create($request->all());
        }

        alert('تم أرسال طلبك بنجاح','','success');
        return redirect()->route('home');
    }
}
