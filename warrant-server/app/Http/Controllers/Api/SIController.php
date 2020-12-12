<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Warrant;
use Auth;
use DB;
class SIController extends Controller
{
    public function GetSIListByThana(){
    	$thana_id = Auth::user()->thana;
    	$SIList = User::where('thana','=', $thana_id)
    				->where('role_id','=' , '5')
    				->get();
    	$siList2 = DB::table('users')
                    ->join('warrants','warrants.is_assigned','=','users.id')
                    ->where('thana','=', $thana_id)
    				->where('role_id','=','5')
    				->where('warrants.is_executed','=','0')
                    ->select(DB::raw('users.*, count(warrants.is_assigned) as total_unExecuted_warrants'))
                    ->groupBy('users.id','users.name','users.name_bangla','users.email','users.email_verified_at','users.password','users.bp','users.mobile','users.gender','users.district','users.thana','users.outpost','users.role_id','users.created_by','users.remember_token','users.created_at','users.updated_at')
                    ->get();
        for($i=0; $i<sizeof($SIList); $i++){
        	for($j=0; $j<sizeof($siList2); $j++){
        		if($SIList[$i]->id==$siList2[$j]->id){
        			$SIList[$i]->total_unExecuted_warrants = $siList2[$j]->total_unExecuted_warrants;
        			break;
        		}
        	}
        }
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
