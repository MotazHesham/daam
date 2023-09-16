<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Review;
use App\Models\Role;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function reviews(){
        $roles = Role::where('featured',1)->get();
        return view('frontend.reviews',compact('roles'));
    }

    public function store(Request $request){
        $review = Review::create($request->all()); 
        alert('تم أرسال تقييمك بنجاح','','success');
        return redirect()->route('frontend.reviews');
    }
}
