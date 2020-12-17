<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AssignedWarrant;
use App\Models\Warrant;
use App\Models\Thana;
use Auth;
use DB;

class DashboardController extends Controller
{
    // method for CI
    public function getCiDashboardData($userId){

		$today = date('Y-m-d');
		$yesterday = date('Y-m-d', mktime(0, 0, 0, date("m")  , date("d")-1, date("Y")));

        $totalWarrant = Warrant::count();
        $totalCompletedWarrant = AssignedWarrant::where('is_completed',1)->where('status',0)->count('id');

		$totalPendingWarrant =  $totalWarrant - $totalCompletedWarrant;
		// $totalCompletedWarrant = $totalWarrant - $totalcompletedAssignedWarrant;
		// $totalNewWarrant = AssignedWarrant::where('assigned_to',$userId)->whereBetween('created_at',[$yesterday,$today])->count();
		// $totalTodayCompletedWarrant = 0; // Need query for today's completed data
        
        $data = array(
			'totalWarrant' =>$totalWarrant, 
			'totalPendingWarrant' => $totalPendingWarrant, 
			'totalCompletedWarrant' => $totalCompletedWarrant, 
			// 'totalNewWarrant' => $totalNewWarrant,
			// 'totalTodayCompletedWarrant' => $totalTodayCompletedWarrant
		);
		
		return response()->json([
				'message' => sizeof($data) == 3 ? 'Data Retrieved' : 'Not Found' ,
				'data' => sizeof($data) == 3 ? $data : null,
	        ]);
    }


     // methods for Police Super
    public function getSpDashboardData($userId){

		$todayStart = date('Y-m-d', mktime(0, 0, 0, date("m")  , date("d"), date("Y"))) . " 00:00:00";
        $todayEnd = date('Y-m-d h:i:s');   
		$yesterdayStart = date('Y-m-d', mktime(0, 0, 0, date("m")  , date("d")-1, date("Y"))) . " 00:00:00";
		$yesterdayEnd = date('Y-m-d', mktime(0, 0, 0, date("m")  , date("d")-1, date("Y"))) . " 23:59:59";

        $totalWarrant = Warrant::count();
        $totalCompletedWarrant = AssignedWarrant::where('is_completed',1)->where('status',0)->count();
		$totalPendingWarrant =  $totalWarrant - $totalCompletedWarrant;

		$totalNewWarrant = Warrant::where('is_executed',0)->whereBetween('created_at',[$yesterdayStart, $yesterdayEnd])->count();
		$totalTodayCompletedWarrant = AssignedWarrant::where('is_completed', 1)->whereBetween('created_at',[$todayStart, $todayEnd])->count(); 
        
        $data = array(
			'totalWarrant' =>$totalWarrant, 
			'totalPendingWarrant' => $totalPendingWarrant, 
			'totalCompletedWarrant' => $totalCompletedWarrant, 
            'totalNewWarrant' => $totalNewWarrant,
			'totalTodayCompletedWarrant' => $totalTodayCompletedWarrant
		);
		
		return response()->json([
				'message' => 'Data Retrieved' ,
				'data' => $data,
	        ]);
    }
    public function getSpDashboardDataByThana($thana_name){

		$todayStart = date('Y-m-d', mktime(0, 0, 0, date("m")  , date("d"), date("Y"))) . " 00:00:00";
        $todayEnd = date('Y-m-d h:i:s');   
		$yesterdayStart = date('Y-m-d', mktime(0, 0, 0, date("m")  , date("d")-1, date("Y"))) . " 00:00:00";
		$yesterdayEnd = date('Y-m-d', mktime(0, 0, 0, date("m")  , date("d")-1, date("Y"))) . " 23:59:59";

        $totalWarrant = Warrant::where('thana_name', $thana_name)->count();
        $totalCompletedWarrant =  DB::table('warrants')
            ->join('assigned_warrants', 'assigned_warrants.warrant_id', '=', 'warrants.id')
            ->select('warrants.thana_name', 'assigned_warrants.is_completed')->get()
            ->where('thana_name', $thana_name)->where('is_completed', 1)->count();
		$totalPendingWarrant = $totalWarrant - $totalCompletedWarrant;

		$totalNewWarrant = Warrant::where('thana_name', $thana_name)->where('is_executed',0)->whereBetween('created_at',[$yesterdayStart, $yesterdayEnd])->count();
		$totalTodayCompletedWarrant = DB::table('warrants')
            ->join('assigned_warrants', 'assigned_warrants.warrant_id', '=', 'warrants.id')
            ->select('warrants.thana_name', 'assigned_warrants.is_completed', 'assigned_warrants.created_at')->get()
            ->where('thana_name', $thana_name)
            ->where('is_completed', 1)
            ->whereBetween('created_at',[$todayStart, $todayEnd])->count(); 
        
        $data = array(
			'totalWarrant' =>$totalWarrant, 
			'totalPendingWarrant' => $totalPendingWarrant, 
			'totalCompletedWarrant' => $totalCompletedWarrant, 
            'totalNewWarrant' => $totalNewWarrant,
			'totalTodayCompletedWarrant' => $totalTodayCompletedWarrant
		);
		
		return response()->json([
				'message' => 'Data Retrieved' ,
				'data' => $data,
	        ]);
    }


    // method for DIG
    public function getDigDashboardData($userId){

		$todayStart = date('Y-m-d', mktime(0, 0, 0, date("m")  , date("d"), date("Y"))) . " 00:00:00";
        $todayEnd = date('Y-m-d h:i:s');   
		$yesterdayStart = date('Y-m-d', mktime(0, 0, 0, date("m")  , date("d")-1, date("Y"))) . " 00:00:00";
		$yesterdayEnd = date('Y-m-d', mktime(0, 0, 0, date("m")  , date("d")-1, date("Y"))) . " 23:59:59";

        $totalWarrant = Warrant::count();
        $totalCompletedWarrant = AssignedWarrant::where('is_completed',1)->where('status',0)->count();
		$totalPendingWarrant =  $totalWarrant - $totalCompletedWarrant;

		$totalNewWarrant = Warrant::where('is_executed',0)->whereBetween('created_at',[$yesterdayStart, $yesterdayEnd])->count();
		$totalTodayCompletedWarrant = AssignedWarrant::where('is_completed', 1)->whereBetween('created_at',[$todayStart, $todayEnd])->count(); 
        
        $data = array(
			'totalWarrant' =>$totalWarrant, 
			'totalPendingWarrant' => $totalPendingWarrant, 
			'totalCompletedWarrant' => $totalCompletedWarrant, 
            'totalNewWarrant' => $totalNewWarrant,
			'totalTodayCompletedWarrant' => $totalTodayCompletedWarrant
		);
		
		return response()->json([
				'message' => 'Data Retrieved' ,
				'data' => $data,
	        ]);
    }


    // method for OC
     public function getOcDashboardData($userId){

		$todayStart = date('Y-m-d', mktime(0, 0, 0, date("m")  , date("d"), date("Y"))) . " 00:00:00";
        $todayEnd = date('Y-m-d h:i:s');   
		$yesterdayStart = date('Y-m-d', mktime(0, 0, 0, date("m") , date("d")-1, date("Y"))) . " 00:00:00";
		$yesterdayEnd = date('Y-m-d', mktime(0, 0, 0, date("m") , date("d")-1, date("Y"))) . " 23:59:59";
        
        $thana_id = Auth::user()->thana;
        $thana_name = Thana::where('id', $thana_id)->first()->name . ' থানা';

		$totalWarrant = Warrant::where('thana_name',$thana_name)->count('id');
        $totalAssignedWarrant = DB::table('warrants')
        ->join('assigned_warrants', 'assigned_warrants.warrant_id','=','warrants.id')
        ->select('warrants.thana_name', 'assigned_warrants.is_assigned')
        ->get()->where('thana_name', $thana_name)->where('is_assigned', 1)->count();

        $totalPendingWarrant = DB::table('warrants')
            ->join('assigned_warrants', 'assigned_warrants.warrant_id', '=', 'warrants.id')
            ->select('warrants.thana_name', 'assigned_warrants.is_completed')->get()
            ->where('thana_name', $thana_name)->where('is_completed', 0)->count();

        $totalNotAssignedWarrant = $totalWarrant - $totalAssignedWarrant;
        $totalCompletedWarrant = $totalAssignedWarrant - $totalPendingWarrant;
        
		$totalNewWarrant = Warrant::where('thana_name',$thana_name)->whereBetween('created_at',[$yesterdayStart,$yesterdayEnd])->count();
		$totalTodayCompletedWarrant =  DB::table('warrants')
            ->join('assigned_warrants', 'assigned_warrants.warrant_id', '=', 'warrants.id')
            ->select('warrants.thana_name', 'assigned_warrants.is_completed', 'assigned_warrants.executed_at')->get()
            ->where('thana_name', $thana_name)
            ->where('is_completed', 1)
            ->whereBetween('executed_at',[$todayStart,$todayEnd])
            ->count();
        
        $data = array(
			'totalWarrant' =>$totalWarrant, 
			'totalAssignedWarrant' => $totalAssignedWarrant, 
            'totalNotAssignedWarrant' => $totalNotAssignedWarrant, 
            'totalPendingWarrant' => $totalPendingWarrant,
			'totalCompletedWarrant' => $totalCompletedWarrant, 
			'totalNewWarrant' => $totalNewWarrant,
            'totalTodayCompletedWarrant' => $totalTodayCompletedWarrant,
            
		);
		
		return response()->json([
				'message' => 'Data Retrieved',
				'data' => $data,
	        ]);
    }


    // method for SI
    public function getSiDashboardData($userId){

		$todayStart = date('Y-m-d', mktime(0, 0, 0, date("m")  , date("d"), date("Y"))) . " 00:00:00";
        $todayEnd = date('Y-m-d h:i:s');   
		$yesterdayStart = date('Y-m-d', mktime(0, 0, 0, date("m") , date("d")-1, date("Y"))) . " 00:00:00";
		$yesterdayEnd = date('Y-m-d', mktime(0, 0, 0, date("m") , date("d")-1, date("Y"))) . " 23:59:59";

		$totalWarrant = AssignedWarrant::where('assigned_to',$userId)->count('id');
		$totalPendingWarrant = AssignedWarrant::where('assigned_to',$userId)->where('is_completed',0)->count('id');
		$totalCompletedWarrant = $totalWarrant - $totalPendingWarrant;
		$totalNewWarrant = AssignedWarrant::where('assigned_to',$userId)->whereBetween('created_at',[$yesterdayStart,$yesterdayEnd])->count();
        $totalTodayCompletedWarrant = AssignedWarrant::where('assigned_to',$userId)
        ->where('is_completed', 1)
        ->whereBetween('executed_at',[$todayStart,$todayEnd])->count();
        
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

    public function getAllNonExecutedWarrants(){
    	$user_id = Auth::user()->id;
    	$warrants = DB::table('warrants')
    				->join('assigned_warrants','warrants.id','=','assigned_warrants.warrant_id')
    				->where('warrants.is_assigned','!=',null)
    				->where('warrants.created_by',$user_id)
    				->where('warrants.is_executed',0)
    				->select('assigned_warrants.*', 'warrants.process_number','gr_number','warrant_type','criminal_name','criminal_father_name','criminal_address','case_section_and_date')
    				->get();
    	return response()->json([
				'message' => 'Data Retrieved' ,
				'data' => $warrants
	        ]);

    }


    public function getAllExecutedWarrants(){
    	$userId = Auth::user()->id;
		$warrants = DB::table('assigned_warrants')
			->join('warrants', 'assigned_warrants.warrant_id', '=', 'warrants.id')
			->join('activities','activities.warrant_id','=','assigned_warrants.warrant_id')
			->where('assigned_warrants.assigned_by', $userId)
			->where('assigned_warrants.is_completed', 1)
            // ->join('orders', 'users.id', '=', 'orders.user_id')
			->select('assigned_warrants.created_at','case_section_and_date', 'warrants.process_number','gr_number','warrant_type','criminal_name','criminal_father_name','criminal_address','activities.execution_type','assigned_warrants.executed_at')
			->orderBy('assigned_warrants.created_at', 'DESC')
            ->get();

    	return response()->json([
				'message' => 'Data Retrieved' ,
				'data' => $warrants
	        ]);

    }

    public function getAllWarrantsOC(){
    	$user_id = Auth::user()->id;
		$thana_id = Auth::user()->thana;
        $thana_name = Thana::where('id', $thana_id)->first()->name . ' থানা';
    	$warrants = Warrant::where('thana_name', $thana_name)->get();
    	return response()->json([
				'message' => 'Data Retrieved' ,
				'data' => $warrants
	        ]);

    }



}
