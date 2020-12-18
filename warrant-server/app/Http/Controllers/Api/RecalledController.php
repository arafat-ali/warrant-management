<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Auth;
use App\Models\Thana;
use App\Models\Activity;
use App\Models\AssignedWarrant;

class RecalledController extends Controller
{
    public function recallWarrant($id){
    	$warrant = DB::table('warrants')->where('id',$id)->update(['is_recalled'=>1]);
    	return response()->json([
           	'message' => 'Successfully saved'
        ]);
    }

    public function recalledWarrantOC(){
    	$user_id = Auth::user()->id;
		$thana_id = Auth::user()->thana;
        $thana_name = Thana::where('id', $thana_id)->first()->name;

        $warrants = DB::table('warrants')
        			->where('thana_name',$thana_name)
        			->where('is_assigned',null)
        			->where('is_recalled',1)
        			->where('is_executed',0)
        			->get();
        return response()->json([
            'success' => true,
            'data' => $warrants
        ]);
    }

    public function receiveRecalledWarrantOC($id){
    	$warrant = DB::table('warrants')->where('id',$id)->update(['is_executed'=>1]);
    	return response()->json([
           	'message' => 'Successfully received'
        ]);

    }

    public function recalledWarrantSI(){
    	$user_id = Auth::user()->id;
		$thana_id = Auth::user()->thana;
        $thana_name = Thana::where('id', $thana_id)->first()->name;

        $warrants = DB::table('warrants')
        			->where('thana_name',$thana_name)
        			->where('is_assigned','!=',null)
        			->where('is_recalled',1)
        			->where('is_executed',0)
        			->get();
        return response()->json([
            'success' => true,
            'data' => $warrants
        ]);
    }

    public function receiveRecalledWarrantSI($id){
    	$user_id = Auth::user()->id;
    	$warrant = DB::table('warrants')->where('id',$id)->update(['is_executed'=>1]);
    	$assigned_warrants = AssignedWarrant::where('warrant_id',$id)->first();
    	$assigned_warrants->is_completed = 1;
    	$assigned_warrants->executed_at = date('Y-m-d');

    	$activity = new Activity();
    	$activity->execution_type = 'recall';
    	$activity->warrant_id = $id;
		$activity->created_by = $user_id;

    	if($assigned_warrants->save() && $activity->save()){
    		return response()->json([
	           	'message' => 'Successfully updated'
	        ]);
    	}
	    	

    }



}
