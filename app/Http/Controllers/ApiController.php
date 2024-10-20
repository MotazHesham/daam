<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ApiController extends Controller
{
    public function searchBeneficires(){ 
        $response = Http::get('https://apimob.charities-sys.com/MobileApi/GetBeneficiariesList?filter='.request('search'));
        // Check if the request was successful (status code 200)
        if ($response->successful()) {
            // Get the response body as an array
            $result = $response->json(); 
    
            // Return or manipulate the data
            return view('admin.volunteerTasks.search-result',compact('result'));
        }
    
        // Handle errors
        if ($response->failed()) {
            return response()->json([
                'error' => 'API call failed',
                'message' => $response->body(),
            ], $response->status());
        }
    }
}
