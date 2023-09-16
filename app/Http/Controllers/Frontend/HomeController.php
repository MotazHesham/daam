<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSubscribeRequest;
use App\Models\HawkamCategory;
use App\Models\Hawkma;
use App\Models\Partner;
use App\Models\Post;
use App\Models\Project;
use App\Models\Report;
use App\Models\ReportCategory;
use App\Models\SaidAboutUs;
use App\Models\Setting;
use App\Models\Slider;
use App\Models\Subscribe;
use App\Models\VolunteerGuide; 

class HomeController extends Controller
{
    public function home(){ 
        $headline = true;
        $site_settings = Setting::first();
        $sliders = Slider::where('published',1)->orderBy('updated_at','desc')->get();
        $projects = Project::where('published',1)->where('featured',1)->orderBy('date','desc')->take(10)->get(); 
        $news = Post::where('type','news')->where('published',1)->where('featured',1)->orderBy('date','desc')->take(10)->get(); 
        $reviews = SaidAboutUs::orderBy('created_at','desc')->take(10)->get(); 
        $partners = Partner::orderBy('created_at','desc')->get(); 
        return view('frontend.home',compact('sliders','site_settings','projects','news','reviews','partners','headline'));
    }

    public function about(){
        $site_settings = Setting::first(); 
        return view('frontend.about',compact('site_settings'));
    }

    public function chairman(){
        $site_settings = Setting::first(); 
        return view('frontend.chairman',compact('site_settings'));
    }

    public function hawkma($id){
        $category = HawkamCategory::findOrFail($id);
        $hawkma = Hawkma::where('category_id',$id)->where('published',1)->orderBy('created_at','desc')->paginate(15); 
        return view('frontend.hawkma',compact('hawkma','category'));
    }

    public function reports($type){ 
        $reportCategories = ReportCategory::with('reports')->where('type',$type)->where('published',1)->orderBy('created_at','desc')->paginate(15); 
        $type = Report::TYPE_SELECT[$type];
        return view('frontend.reports',compact('reportCategories','type'));
    }

    public function terms(){
        $site_settings = Setting::first(); 
        return view('frontend.terms',compact('site_settings'));
    }

    public function video(){ 
        return view('frontend.video');
    }
    public function identity(){ 
        return view('frontend.identity');
    }

    public function jood(){ 
        return view('frontend.jud');
    }

    public function volunteer_guide(){
        $guides = VolunteerGuide::where('published',1)->orderBy('created_at','desc')->paginate(15); 
        return view('frontend.volunteerGuide',compact('guides'));
    }

    public function projects(){
        $projects = Project::where('published',1)->orderBy('date','desc')->paginate(15); 
        return view('frontend.projects',compact('projects'));
    }

    public function project($id){
        $project = Project::findOrFail($id);
        return view('frontend.project',compact('project'));
    }

    public function posts($type){ 
        if(!in_array($type,array_keys(Post::TYPE_SELECT))){
            return redirect()->route('home');
        }
        $posts = Post::where('type',$type)->where('published',1)->orderBy('date','desc')->paginate(15); 
        $title = Post::TYPE_SELECT[$type];
        return view('frontend.posts',compact('posts','title'));
    }

    public function post($id){
        $post = Post::findOrfail($id);
        return view('frontend.post',compact('post'));
    }

    
    public function subscribe(StoreSubscribeRequest $request){
        $subscribe = Subscribe::where('email',$request->email)->first();
        if($subscribe){
            alert('Already Subscribed','','warning');
            return redirect()->route('home');
        }else{
            $subscribe = Subscribe::create($request->all());
            alert('Successfully Subscribed','','success');
            return redirect()->route('home');
        }
    }
}
