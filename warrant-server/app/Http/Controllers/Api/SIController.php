<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Warrant;
use App\Models\AssignedWarrant;
use App\Models\Activity;
use Auth;
use DB;
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


	
	//-------------Susmoy-------------//
	public function getAssignedWarrant()
	{	
		$userId = Auth::user()->id;
		// $userId = 6;
		$warrants = DB::table('assigned_warrants')
			->join('warrants', 'assigned_warrants.warrant_id', '=', 'warrants.id')
			->where('assigned_warrants.assigned_to', $userId)->where('assigned_warrants.is_completed', 0)
            // ->join('orders', 'users.id', '=', 'orders.user_id')
			->select('assigned_warrants.*', 'warrants.*')
			->orderBy('assigned_warrants.created_at', 'DESC')
            ->get();


		return response()->json([
				'message'=> sizeof($warrants) == 0 ?  'Not Found' : 'Data Retrieved' ,
            	'data' => sizeof($warrants) == 0 ?  null : $warrants
	        ]);
	}

	public function getCompletedWarrant()
	{	
		// $warrants = AssignedWarrant::where('assigned_to', $userId)->where('is_completed', 1)->orderBy('created_at', 'DESC')->get();
		$userId = Auth::user()->id;
		$warrants = DB::table('assigned_warrants')
			->join('warrants', 'assigned_warrants.warrant_id', '=', 'warrants.id')
			->where('assigned_warrants.assigned_to', $userId)->where('assigned_warrants.is_completed', 1)
            // ->join('orders', 'users.id', '=', 'orders.user_id')
			->select('assigned_warrants.*', 'warrants.*')
			->orderBy('assigned_warrants.created_at', 'DESC')
            ->get();
		return response()->json([
				'message'=> sizeof($warrants) == 0 ?  'Not Found' : 'Data Retrieved' ,
            	'data' => sizeof($warrants) == 0 ?  null : $warrants
	        ]);
	}

	public function storeActivity(Request $request)
	{
		$activity = new Actvity();
		$activity->warrant_id = $request->warrantId;
		$activity->activist_id = $request->activistId;
		$activity->lattitude = $request->lattitude;
		$activity->longitude = $request->longitude;
		if($activity->save())
		{
			return response()->json([
				'message'=> sizeof($activity) == 0 ?  'Error' : 'Saved' ,
            	'data' => sizeof($activity) == 0 ?  null : $activity
	        ]);
		}
	}

	public function storeActivityDetails(Request $request)
	{
		$activityDetails = new Actvity();
		$activityDetails->warrant_id = $request->warrantId;
		$activityDetails->assigned_to = $request->assignedTo;
		$activityDetails->relative_name = $request->relativeName;
		$activityDetails->relative_address = $request->relativeAddress;
		$activityDetails->relative_contact_no = $request->relativeContact_no;
		$activityDetails->description = $request->description;
		if($activityDetails->save())
		{
			return response()->json([
				'message'=> sizeof($activityDetails) == 0 ?  'Error' : 'Saved' ,
            	'data' => sizeof($activityDetails) == 0 ?  null : $activityDetails
	        ]);
		}
	}

	public function getSiAsiTotalWarrant($userId){

		$today = date('Y-m-d');
		$yesterday = date('Y-m-d', mktime(0, 0, 0, date("m")  , date("d")-1, date("Y")));

		$totalWarrant = AssignedWarrant::where('assigned_to',$userId)->count('id');
		$totalPendingWarrant = AssignedWarrant::where('assigned_to',$userId)->where('is_completed',0)->count('id');
		$totalCompletedWarrant = $totalWarrant - $totalPendingWarrant;
		$totalNewWarrant = AssignedWarrant::where('assigned_to',$userId)->whereBetween('created_at',[$yesterday,$today])->count();
		$totalTodayCompletedWarrant = 0;
		$data = array(
			'totalWarrant' =>$totalWarrant, 
			'totalPendingWarrant' => $totalPendingWarrant, 
			'totalCompletedWarrant' => $totalCompletedWarrant, 
			'totalNewWarrant' => $totalNewWarrant,
			'totalTodayCompletedWarrant' => $totalTodayCompletedWarrant
		);
		
		return response()->json([
				'message' => sizeof($data) == 5 ? 'Data Retrieved' : 'Not Found' ,
				'data' => sizeof($data) == 5 ? $data : null,
	        ]);
	}


}
