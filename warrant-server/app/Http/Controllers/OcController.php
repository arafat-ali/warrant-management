<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OcController extends Controller
{
    public function assignSItoWarrant($warrant_id, $oc_id, $si_id){
    	$warrant = Warrant::where('id','=', $id)->first();
    	$warrant->is_assigned = $si_id;
    	if($warrant->save()){
    		return response()->json([
	            'success' => true,
	            'Message' => 'Successfully updated'
	        ]);
    	}	
	}
}
