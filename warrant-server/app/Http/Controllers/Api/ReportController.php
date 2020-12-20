<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Warrant;
use DB;
use Carbon\Carbon;

class ReportController extends Controller
{
    public function showReport(Request $req){
    	// $fromDate = Carbon::now()->startOfMonth()->toDateTimeString();
    	// $toDate = Carbon::now()->toDateTimeString();
        $zilla_name = $req->districtId;
        $thanaId = $req->thanaId;
        $crime_id = $req->crimeId;
        $warrant_type = $req->warrant_type;
        $fromDate = $req->start_date;
        $toDate = Carbon::parse($req->end_date)->addDay();
    	$total_warrant = Warrant::where('warrant_type',$warrant_type)
                                    ->where('crime_category_name',$crime_id)
                                    ->where('thana_name',$thanaId)
    								->whereBetween('created_at',[$fromDate,$toDate])
    								->count();
        $total_executed_warrant = Warrant::where('warrant_type',$warrant_type)
                                    ->where('crime_category_name',$crime_id)
                                    ->where('thana_name',$thanaId)
                                    ->whereBetween('created_at',[$fromDate,$toDate])
                                    ->where('is_executed',1)
                                    ->count();
        $total_unexecuted_warrant = Warrant::where('warrant_type',$warrant_type)
                                    ->where('crime_category_name',$crime_id)
                                    ->where('thana_name',$thanaId)
                                    ->whereBetween('created_at',[$fromDate,$toDate])
                                    ->where('is_executed',0)
                                    ->count();
    	
        $thanaNotRecieveMismatch = DB::table('warrants')->where('created_by',1)
                                        ->where('warrant_type',$warrant_type)
                                        ->where('arrest_warrant_received_to_thana',null)
                                        ->where('crime_category_name',$crime_id)
                                        ->where('thana_name',$thanaId)
                                        ->whereBetween('created_at',[$fromDate,$toDate])
                                        ->count();

        $processNumberNotFoundMismatch = DB::table('warrants')
                                        ->where('warrant_type',$warrant_type)
                                        ->where('arrest_warrant_received_to_thana',null)
                                        ->where('crime_category_name',$crime_id)
                                        ->where('thana_name',$thanaId)
                                        ->where('process_number',null)
                                        ->whereBetween('created_at',[$fromDate,$toDate])
                                        ->count();

        $findRecalledMismatch = DB::table('warrants')
                                ->where('is_recalled',1)
                                ->where('is_executed',0)
                                ->where('warrant_type',$warrant_type)
                                ->where('arrest_warrant_received_to_thana',null)
                                ->where('crime_category_name',$crime_id)
                                ->where('thana_name',$thanaId)
                                ->where('process_number',null)
                                ->whereBetween('created_at',[$fromDate,$toDate])
                                ->count();


        $str = '';
        $is_filter = 0;
        if($req->thanaId) $str = 'AND thana_name = ' . '\'' . $req->thanaId . '\'';
        if($req->warrant_type) $str = $str . ' AND warrant_type = '. '\'' .$req->warrant_type.'\'';
        if($fromDate && $toDate){
            $str = $str . ' AND created_at BETWEEN '. '\'' .$fromDate.'\' AND '. '\''. $toDate.'\'';
        }
        if($fromDate && !$toDate){
            $str = $str . ' AND created_at > '. '\'' .$fromDate.'\'';
        }
        if(!$fromDate && $toDate){
            $str = $str . ' AND created_at < '. '\'' .$toDate.'\'';
        }
        if($req->thanaId || $req->warrant_type || ($fromDate && $todate) || ($fromDate && !$toDate)|| (!$fromDate && $toDate)) $is_filter = 1;


        if($is_filter == 0){
            $findProcessNoMismatch = DB::select('SELECT * FROM warrants WHERE (thana_name, criminal_name, criminal_father_name) IN (SELECT thana_name, criminal_name, criminal_father_name FROM warrants WHERE created_by=4) AND created_by=1');
        }
        else{
            $findProcessNoMismatch = DB::select('SELECT * FROM warrants WHERE (thana_name, criminal_name, criminal_father_name) IN (SELECT thana_name, criminal_name, criminal_father_name FROM warrants WHERE created_by=4) AND created_by=1 '.$str);
        }
        

        $findProcessNoMismatch = sizeOf($findProcessNoMismatch);
        $total_mismatch = $findProcessNoMismatch+$findRecalledMismatch+$processNumberNotFoundMismatch+ $thanaNotRecieveMismatch;

    	$data = array(
			'Total_warrant' => $total_warrant,
            'Total_executed_warrant'=> $total_executed_warrant,
            'Total_unexecuted_warrant'=> $total_unexecuted_warrant,
            'ThanaNotRecieveMismatch' => $thanaNotRecieveMismatch,
            'ProcessNumberNotFoundMismatch'=> $processNumberNotFoundMismatch,
            'FindRecalledMismatch'=> $findRecalledMismatch,
            'FindProcessNoMismatch' => $findProcessNoMismatch,
            'Total_mismatch'=>$total_mismatch
		);

    	return response()->json([
            'success' => true,
            'data' => $data
            
        ]);

    }
}
