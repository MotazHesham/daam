<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\ApiController;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreReviewRequest;
use App\Models\Review;
use App\Models\Role;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function reviews(){
        $roles = Role::where('featured',1)->get();
        return view('frontend.reviews',compact('roles'));
    }

    public function store(StoreReviewRequest $request){
        $ApiController = new ApiController;
        $response = $ApiController->GetBeneficiariesList($request->identity_number);
        
        if ($response['success']) {
            // Get the response body as an array
            $result = $response['result'];  
            if(!$result['data'] || empty($result['data']) ){
                alert('رقم الهوية أو الجوال خطأ','','error');
                return redirect()->route('frontend.reviews');
            }
    
            $review = Review::create([
                'role_id' => $request->role_id,
                'identity_number' => $result['data'][0]['nationalID'] ?? '',
                'phone_number' => $result['data'][0]['phoneNo'] ?? '',
                'name' => $result['data'][0]['fullName'] ?? '',
                'review' => $request->review,
                'reason' => $request->reason,
            ]); 
            alert('تم أرسال تقييمك بنجاح','','success');
            return redirect()->route('frontend.reviews');
        }else{
            alert('رقم الهوية أو الجوال خطأ','','error');
            return redirect()->route('frontend.reviews');
        } 
    }
}
