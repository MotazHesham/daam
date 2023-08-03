<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMemberRequest;
use App\Models\Member;
use Illuminate\Http\Request;

class MemberController extends Controller
{ 
    public function members($type){
        if(!in_array($type,array_keys(Member::TYPE_SELECT))){
            return redirect()->route('home');
        }  
        return view('frontend.member',compact('type'));
    }

    
    public function store(StoreMemberRequest $request)
    {
        $member = Member::create($request->all());
        
        alert('تم أرسال طلبك بنجاح','','success');
        return redirect()->route('frontend.members',$request->type);
    }
}
