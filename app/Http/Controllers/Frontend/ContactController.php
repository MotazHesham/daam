<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreContactRequest;
use App\Models\Contact;
use App\Models\Setting;
use Illuminate\Http\Request;

class ContactController extends Controller
{ 
    public function contacts($type){
        $site_settings = Setting::first(); 
        if(!in_array($type,array_keys(Contact::TYPE_SELECT))){
            return redirect()->route('home');
        }  
        return view('frontend.contact',compact('type','site_settings'));
    }
    
    public function store(StoreContactRequest $request)
    {
        $contact = Contact::create($request->all());

        alert('تم أرسال طلبك بنجاح','','success');
        return redirect()->route('frontend.contacts',$request->type);
    }
}
