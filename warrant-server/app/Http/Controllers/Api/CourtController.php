<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\Court;

class CourtController extends Controller
{
    public function getAllCourt(){
    	$courts = Court::all();
    	return response()->json([
            'success' => true,
            'Court' => $courts
        ]);
    }
}
