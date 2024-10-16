<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSubscribeRequest;
use App\Models\HawkamCategory;
use App\Models\Hawkma;
use App\Models\HumanitarianAid;
use App\Models\Mempership;
use App\Models\Partner;
use App\Models\Post;
use App\Models\Project;
use App\Models\QuestionnaireCertificate;
use App\Models\QuestionnaireCourse;
use App\Models\QuestionnaireMember;
use App\Models\QuestionnaireTraning;
use App\Models\QuestionnaireVolunteer;
use App\Models\Report;
use App\Models\ReportCategory;
use App\Models\ReportMoney;
use App\Models\SaidAboutUs;
use App\Models\Setting;
use App\Models\Slider;
use App\Models\Subscribe;
use App\Models\Volunteer;
use App\Models\VolunteerGuide;
use App\Models\VolunteerTask;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class HomeController extends Controller
{
    public function home()
    {
        $headline = true;
        $site_settings = Setting::first();
        $Aids = HumanitarianAid::get();
        $sliders = Slider::where('published', 1)->orderBy('updated_at', 'desc')->get();
        $projects = Project::where('published', 1)->where('featured', 1)->orderBy('date', 'desc')->take(10)->get();
        $news = Post::where('type', 'news')->where('published', 1)->where('featured', 1)->orderBy('date', 'desc')->take(10)->get();
        $reviews = SaidAboutUs::orderBy('created_at', 'desc')->take(10)->get();
        $partners = Partner::orderBy('created_at', 'desc')->get();
        return view('frontend.home', compact('sliders','Aids', 'site_settings', 'projects', 'news', 'reviews', 'partners', 'headline'));
    }

    public function volunteer_qr($id){
        $task = VolunteerTask::findOrFail(decrypt($id));
        $volunteer = Volunteer::findOrFail($task->volunteer_id);
        return view('frontend.volunteer_qr', compact('volunteer','task'));
    }

    public function about()
    {
        $site_settings = Setting::first();
        return view('frontend.about', compact('site_settings'));
    }

    public function chairman()
    {
        $site_settings = Setting::first();
        return view('frontend.chairman', compact('site_settings'));
    }

    public function hawkma($id)
    {
        $category = HawkamCategory::findOrFail($id);
        $hawkma = Hawkma::where('category_id', $id)->where('published', 1)->orderBy('created_at', 'desc')->paginate(15);
        return view('frontend.hawkma', compact('hawkma', 'category'));
    }

    public function reports($type)
    {
        $reportMoneys = [];
        if($type == 'money'){
            $reportMoneys = ReportMoney::orderBy('year','desc')->get()->groupBy('year');
        }
        $reportCategories = ReportCategory::with('reports')->where('type', $type)->where('published', 1)->orderBy('created_at', 'asc')->paginate(15);
        $type = Report::TYPE_SELECT[$type];
        return view('frontend.reports', compact('reportCategories', 'type','reportMoneys'));
    }

    public function terms()
    {
        $site_settings = Setting::first();
        return view('frontend.terms', compact('site_settings'));
    }

    public function joining_form_1(){
        $site_settings = Setting::first();
        return view('joining_form.step1',compact('site_settings'));
    }
    public function joining_form_2(){
        $site_settings = Setting::first();
        return view('joining_form.step2',compact('site_settings'));
    }

    
    public function store_mempership(Request $request)
    {
        $mempership = Mempership::create($request->all());

        if ($request->has('identity_photo')) {
            $mempership->addMedia($request->identity_photo)->toMediaCollection('identity_photo');
        }

        if ($request->has('receipt_photo') ){
            $mempership->addMedia($request->receipt_photo)->toMediaCollection('receipt_photo');
        } 

        alert('تم أرسال طلب أنضمامك بنجاح', '', 'success');
        return redirect()->route('home');
    } 

    public function questionnaire($type)
    {
        $title = 'قياس أثر التدريب للموظف';
        $view = 'traning';
        if($type == 'traning'){
            $title = 'قياس أثر التدريب للموظف';
            $view = 'traning';
        }elseif($type == 'volunteers'){
            $title = 'قياس رضا المتطوعين';
            $view = 'volunteers';
        }elseif($type == 'courses'){ 
            $title = 'تقييم دورة تدريبية بمكتب التطوير المؤسسي';
            $view = 'courses';
        }elseif($type == 'courses_2'){ 
            $title = 'تقييم دورة تدريبية بمكتب التطوير المؤسسي (قسم الجودة)';
            $view = 'courses_2';
        }elseif($type == 'members'){ 
            $title = 'استبيان قياس رأي أعضاء الجمعية العمومية';
            $view = 'members';
        }else{
            abort(404);
        }
        return view('frontend.questionnaire.'.$view,compact('type','title'));
    }

    public function questionnaire_store(Request $request){
        $request->validate([
            'type' => 'in:traning,volunteers,courses,members,courses_2'
        ]);

        if($request->type == 'traning'){
            QuestionnaireTraning::create($request->all());
        }elseif($request->type == 'volunteers'){
            QuestionnaireVolunteer::create($request->all());
        }elseif($request->type == 'courses'){
            QuestionnaireCourse::create($request->all());
        }elseif($request->type == 'courses_2'){
            QuestionnaireCourse::create($request->all());
        }elseif($request->type == 'members'){
            QuestionnaireMember::create($request->all());
        }
        
        alert('تم أرسال التقييم بنجاح', '', 'success');
        return redirect()->back();
    }
    public function video()
    {
        return view('frontend.video');
    }
    public function identity()
    {
        return view('frontend.identity');
    }

    public function jood()
    {
        return view('frontend.jud');
    }

    public function volunteer_guide()
    {
        $guides = VolunteerGuide::where('published', 1)->orderBy('created_at', 'desc')->paginate(15);
        return view('frontend.volunteerGuide', compact('guides'));
    }

    public function projects()
    {
        $projects = Project::where('published', 1)->orderBy('date', 'desc')->paginate(15);
        return view('frontend.projects', compact('projects'));
    }

    public function project($id)
    {
        $project = Project::findOrFail($id);
        return view('frontend.project', compact('project'));
    }

    public function posts($type)
    {
        if (!in_array($type, array_keys(Post::TYPE_SELECT))) {
            return redirect()->route('home');
        }
        $posts = Post::where('type', $type)->where('published', 1)->orderBy('date', 'desc')->paginate(15);
        $title = Post::TYPE_SELECT[$type];
        return view('frontend.posts', compact('posts', 'title'));
    }

    public function post($id)
    {
        $post = Post::findOrfail($id);
        return view('frontend.post', compact('post'));
    }


    public function subscribe(StoreSubscribeRequest $request)
    {
        $subscribe = Subscribe::where('email', $request->email)->first();
        if ($subscribe) {
            alert('Already Subscribed', '', 'warning');
            return redirect()->route('home');
        } else {
            $subscribe = Subscribe::create($request->all());
            alert('Successfully Subscribed', '', 'success');
            return redirect()->route('home');
        }
    }
}
