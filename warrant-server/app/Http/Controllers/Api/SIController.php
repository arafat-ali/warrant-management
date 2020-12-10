<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Warrant;
use Auth;
class SIController extends Controller
{
    public function GetSIListByThana(){
    	$thana_id = Auth::user()->thana;
    	$SIList = User::where('thana','=', $thana_id)
    				->where('role_id','=' , '5')
    				->get();
    	return response()->json([
            'success' => true,
            'SIList' => $SIList
        ]);

    }

    public function assignSItoWarrant($id, $si_id){
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
