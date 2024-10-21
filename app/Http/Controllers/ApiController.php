<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ApiController extends Controller
{
    public function searchBeneficires(){ 
        $response = $this->GetBeneficiariesList(request('search'));
        // Check if the request was successful (status code 200)
        if ($response['success']) {
            // Get the response body as an array
            $result = $response['result']; 
    
            // Return or manipulate the data
            return view('admin.volunteerTasks.search-result',compact('result'));
        }else{
            return response()->json([
                'error' => 'API call failed',
                'message' => $response['result'],
            ], $response['status']);
        } 
    }

    public function GetBeneficiariesList($search){
        $response = Http::get('https://apimob.charities-sys.com/MobileApi/GetBeneficiariesList?filter='.$search);
        // Check if the request was successful (status code 200)
        if ($response->successful()) { 
            return [
                'result' => $response->json(),
                'success' => true,
                'status' => $response->status(),

            ];
        }
    
        // Handle errors
        if ($response->failed()) {
            return [
                'result' => $response->body(),
                'success' => false,
                'status' => $response->status(),

            ]; 
        }
    }
}
