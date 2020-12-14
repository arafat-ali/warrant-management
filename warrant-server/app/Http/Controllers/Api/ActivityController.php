<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AssignedWarrant;
use App\Models\Activity;
use Auth;

class ActivityController extends Controller
{
    public function saveExecutionInfo($id, $msg){
    	$user_id = Auth::user()->id;
    	$assign_warrants = AssignedWarrant::where('id',$id)->first();
    	$warrant_id = $assign_warrants->warrant_id;
    	$assign_warrants->is_completed = 1;
    	$assign_warrants->save();

    	$activity = new Activity();
    	$activity->execution_type = $msg;
    	$activity->warrant_id = $warrant_id;
    	$activity->created_by = $user_id;
    	if($activity->save()){
    		return response()->json([
	            'success' => true,
	            'Message' => 'Successfully saved'
	        ]);
    	}
    }

    public function addNonExecutionInfo(Request $req){
    	$user_id = Auth::user()->id;
    	$activity = new Activity();
    	$assigned_warrants_id = $req->assigned_warrants_id;
    	$assign_warrants = AssignedWarrant::where('id',$assigned_warrants_id)->first();
    	$warrant_id = $assign_warrants->warrant_id;
    	$activity = new Activity();
    	$activity->relative_name = $req->name;
    	$activity->relative_address = $req->address;
    	$activity->relative_contact_no = $req->contact_no;
    	$activity->description = $req->description;
    	$activity->warrant_id = $warrant_id;
    	$activity->created_by = $user_id;
    	if($activity->save()){
    		return response()->json([
	            'success' => true,
	            'Message' => 'Successfully saved'
	        ]);
    	}
    }


    public function viewSIActivity($id){
    	$activities = Activity::where('warrant_id',$id)->get();
    	return response()->json([
            'success' => true,
            'Activities' => $activities
        ]);

    }

}
