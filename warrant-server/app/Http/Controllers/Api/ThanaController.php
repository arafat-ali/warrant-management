<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\Thana;
use Auth;

class ThanaController extends Controller
{
    public function getAllThanas(){
    	$thanas = Thana::all();
    	return response()->json([
            'success' => true,
            'Thana' => $thanas
        ]);
    }

    public function getThanasByDistrict($district_id){
        $thanas = Thana::where('district_id', $district_id)->get();
        return response()->json([
            'message' => $thanas ? 'Data Retrived' : 'Not Found',
            'data' => $thanas ? $thanas : null
        ]);
    }
}
