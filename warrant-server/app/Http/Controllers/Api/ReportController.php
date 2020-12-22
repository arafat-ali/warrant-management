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
        $toDate = $req->end_date ? Carbon::parse($req->end_date)->addDay():'';

        $total_warrant=0;
        $total_executed_warrant = 0;
        $total_unexecuted_warrant = 0;
        $thanaNotRecieveMismatch = 0;
        $processNumberNotFoundMismatch = 0;
        $findRecalledMismatch = 0;

        if($thanaId && $crime_id && $warrant_type && $fromDate && $toDate){
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
        }

        if($thanaId=='' && $crime_id == '' && $warrant_type=='' && $fromDate=='' && $toDate==''){
            $total_warrant = Warrant::count();
            $total_executed_warrant = Warrant::where('is_executed',1)
                                        ->count();
            $total_unexecuted_warrant = Warrant::where('is_executed',0)
                                        ->count();
            
            $thanaNotRecieveMismatch = DB::table('warrants')->where('created_by',1)
                                            ->where('arrest_warrant_received_to_thana',null)
                                            ->count();

            $processNumberNotFoundMismatch = DB::table('warrants')
                                            ->where('arrest_warrant_received_to_thana',null)
                                            ->where('process_number',null)
                                            ->count();

            $findRecalledMismatch = DB::table('warrants')
                                    ->where('is_recalled',1)
                                    ->where('is_executed',0)
                                    ->where('arrest_warrant_received_to_thana',null)
                                    ->where('process_number',null)
                                    ->count();
        }


        if($thanaId && ($crime_id=='' && $warrant_type=='' && $fromDate=='' && $toDate=='')){
            $total_warrant = Warrant::where('thana_name',$thanaId)->count();
            $total_executed_warrant = Warrant::where('thana_name',$thanaId)
                                        ->where('is_executed',1)
                                        ->count();
            $total_unexecuted_warrant = Warrant::where('thana_name',$thanaId)
                                        ->where('is_executed',0)
                                        ->count();
            
            $thanaNotRecieveMismatch = DB::table('warrants')
                                            ->where('created_by',1)
                                            ->where('thana_name',$thanaId)
                                            ->count();

            $processNumberNotFoundMismatch = DB::table('warrants')
                                            ->where('thana_name',$thanaId)
                                            ->where('process_number',null)
                                            ->count();

            $findRecalledMismatch = DB::table('warrants')
                                    ->where('is_recalled',1)
                                    ->where('is_executed',0)
                                    ->where('arrest_warrant_received_to_thana',null)
                                    ->where('thana_name',$thanaId)
                                    ->where('process_number',null)
                                    ->count();
        }
        if(($thanaId && $crime_id) && ($warrant_type=='' && $fromDate=='' && $toDate=='')){
            $total_warrant = Warrant::where('thana_name',$thanaId)
                                        ->where('crime_category_name',$crime_id)
                                        ->count();
            $total_executed_warrant = Warrant::where('thana_name',$thanaId)
                                        ->where('crime_category_name',$crime_id)
                                        ->where('is_executed',1)
                                        ->count();
            $total_unexecuted_warrant = Warrant::where('thana_name',$thanaId)
                                        ->where('crime_category_name',$crime_id)
                                        ->where('is_executed',0)
                                        ->count();
            
            $thanaNotRecieveMismatch = DB::table('warrants')
                                            ->where('crime_category_name',$crime_id)
                                            ->where('created_by',1)
                                            ->where('thana_name',$thanaId)
                                            ->count();

            $processNumberNotFoundMismatch = DB::table('warrants')
                                            ->where('crime_category_name',$crime_id)
                                            ->where('thana_name',$thanaId)
                                            ->where('process_number',null)
                                            ->count();

            $findRecalledMismatch = DB::table('warrants')
                                    ->where('crime_category_name',$crime_id)
                                    ->where('is_recalled',1)
                                    ->where('is_executed',0)
                                    ->where('arrest_warrant_received_to_thana',null)
                                    ->where('thana_name',$thanaId)
                                    ->where('process_number',null)
                                    ->count();
        }
        if(($thanaId && $warrant_type ) && ($crime_id=='' && $fromDate=='' && $toDate=='')){
            $total_warrant = Warrant::where('thana_name',$thanaId)
                                        ->where('warrant_type',$warrant_type)
                                        ->count();
            $total_executed_warrant = Warrant::where('thana_name',$thanaId)
                                        ->where('warrant_type',$warrant_type)
                                        ->where('is_executed',1)
                                        ->count();
            $total_unexecuted_warrant = Warrant::where('thana_name',$thanaId)
                                        ->where('warrant_type',$warrant_type)
                                        ->where('is_executed',0)
                                        ->count();
            
            $thanaNotRecieveMismatch = DB::table('warrants')
                                            ->where('warrant_type',$warrant_type)
                                            ->where('created_by',1)
                                            ->where('thana_name',$thanaId)
                                            ->count();

            $processNumberNotFoundMismatch = DB::table('warrants')
                                            ->where('warrant_type',$warrant_type)
                                            ->where('thana_name',$thanaId)
                                            ->where('process_number',null)
                                            ->count();

            $findRecalledMismatch = DB::table('warrants')
                                    ->where('warrant_type',$warrant_type)
                                    ->where('is_recalled',1)
                                    ->where('is_executed',0)
                                    ->where('arrest_warrant_received_to_thana',null)
                                    ->where('thana_name',$thanaId)
                                    ->where('process_number',null)
                                    ->count();
        }

        if(($thanaId && $crime_id && $warrant_type) && ($fromDate=='' && $toDate=='')){
            $total_warrant = Warrant::where('thana_name',$thanaId)
                                        ->where('crime_category_name',$crime_id)
                                        ->where('warrant_type',$warrant_type)
                                        ->count();
            $total_executed_warrant = Warrant::where('thana_name',$thanaId)
                                        ->where('crime_category_name',$crime_id)
                                        ->where('warrant_type',$warrant_type)
                                        ->where('is_executed',1)
                                        ->count();
            $total_unexecuted_warrant = Warrant::where('thana_name',$thanaId)
                                        ->where('crime_category_name',$crime_id)
                                        ->where('warrant_type',$warrant_type)
                                        ->where('is_executed',0)
                                        ->count();
            
            $thanaNotRecieveMismatch = DB::table('warrants')
                                            ->where('crime_category_name',$crime_id)
                                            ->where('warrant_type',$warrant_type)
                                            ->where('created_by',1)
                                            ->where('thana_name',$thanaId)
                                            ->count();

            $processNumberNotFoundMismatch = DB::table('warrants')
                                            ->where('crime_category_name',$crime_id)
                                            ->where('warrant_type',$warrant_type)
                                            ->where('thana_name',$thanaId)
                                            ->where('process_number',null)
                                            ->count();

            $findRecalledMismatch = DB::table('warrants')
                                    ->where('crime_category_name',$crime_id)
                                    ->where('warrant_type',$warrant_type)
                                    ->where('is_recalled',1)
                                    ->where('is_executed',0)
                                    ->where('arrest_warrant_received_to_thana',null)
                                    ->where('thana_name',$thanaId)
                                    ->where('process_number',null)
                                    ->count();
        }

        if(($thanaId && $fromDate && $toDate) && ($crime_id=='' && $warrant_type=='')){
            $total_warrant = Warrant::where('thana_name',$thanaId)
                                        ->whereBetween('created_at',[$fromDate,$toDate])
                                        ->count();
            $total_executed_warrant = Warrant::where('thana_name',$thanaId)
                                        ->whereBetween('created_at',[$fromDate,$toDate])
                                        ->where('is_executed',1)
                                        ->count();
            $total_unexecuted_warrant = Warrant::where('thana_name',$thanaId)
                                        ->whereBetween('created_at',[$fromDate,$toDate])
                                        ->where('is_executed',0)
                                        ->count();
            
            $thanaNotRecieveMismatch = DB::table('warrants')
                                            ->whereBetween('created_at',[$fromDate,$toDate])
                                            ->where('created_by',1)
                                            ->where('thana_name',$thanaId)
                                            ->count();

            $processNumberNotFoundMismatch = DB::table('warrants')
                                            ->whereBetween('created_at',[$fromDate,$toDate])
                                            ->where('thana_name',$thanaId)
                                            ->where('process_number',null)
                                            ->count();

            $findRecalledMismatch = DB::table('warrants')
                                    ->whereBetween('created_at',[$fromDate,$toDate])
                                    ->where('is_recalled',1)
                                    ->where('is_executed',0)
                                    ->where('arrest_warrant_received_to_thana',null)
                                    ->where('thana_name',$thanaId)
                                    ->where('process_number',null)
                                    ->count();
        }

        if($crime_id && ($thanaId=='' && $warrant_type=='' && $fromDate=='' && $toDate=='')){
            $total_warrant = Warrant::where('crime_category_name',$crime_id)->count();
            $total_executed_warrant = Warrant::where('crime_category_name',$crime_id)
                                        ->where('is_executed',1)
                                        ->count();
            $total_unexecuted_warrant = Warrant::where('crime_category_name',$crime_id)
                                        ->where('is_executed',0)
                                        ->count();
            
            $thanaNotRecieveMismatch = DB::table('warrants')
                                            ->where('created_by',1)
                                            ->where('crime_category_name',$crime_id)
                                            ->count();

            $processNumberNotFoundMismatch = DB::table('warrants')
                                            ->where('crime_category_name',$crime_id)
                                            ->where('process_number',null)
                                            ->count();

            $findRecalledMismatch = DB::table('warrants')
                                    ->where('is_recalled',1)
                                    ->where('is_executed',0)
                                    ->where('arrest_warrant_received_to_thana',null)
                                    ->where('crime_category_name',$crime_id)
                                    ->where('process_number',null)
                                    ->count();
        }




        if(($crime_id && $fromDate && $toDate) && ($thanaId=='' && $warrant_type=='')){
            $total_warrant = Warrant::where('crime_category_name',$crime_id)
                                        ->whereBetween('created_at',[$fromDate,$toDate])
                                        ->count();
            $total_executed_warrant = Warrant::where('crime_category_name',$crime_id)
                                        ->whereBetween('created_at',[$fromDate,$toDate])
                                        ->where('is_executed',1)
                                        ->count();
            $total_unexecuted_warrant = Warrant::where('crime_category_name',$crime_id)
                                        ->whereBetween('created_at',[$fromDate,$toDate])
                                        ->where('is_executed',0)
                                        ->count();
            
            $thanaNotRecieveMismatch = DB::table('warrants')
                                            ->whereBetween('created_at',[$fromDate,$toDate])
                                            ->where('created_by',1)
                                            ->where('crime_category_name',$crime_id)
                                            ->count();

            $processNumberNotFoundMismatch = DB::table('warrants')
                                            ->whereBetween('created_at',[$fromDate,$toDate])
                                            ->where('thana_name',$thanaId)
                                            ->where('process_number',null)
                                            ->count();

            $findRecalledMismatch = DB::table('warrants')
                                    ->whereBetween('created_at',[$fromDate,$toDate])
                                    ->where('is_recalled',1)
                                    ->where('is_executed',0)
                                    ->where('arrest_warrant_received_to_thana',null)
                                    ->where('thana_name',$thanaId)
                                    ->where('process_number',null)
                                    ->count();
        }

        if(($crime_id && $fromDate && $toDate && $warrant_type) && ($thanaId=='')){
            $total_warrant = Warrant::where('crime_category_name',$crime_id)
                                        ->whereBetween('created_at',[$fromDate,$toDate])
                                        ->where('warrant_type',$warrant_type)
                                        ->count();
            $total_executed_warrant = Warrant::where('crime_category_name',$crime_id)
                                        ->whereBetween('created_at',[$fromDate,$toDate])
                                        ->where('warrant_type',$warrant_type)
                                        ->where('is_executed',1)
                                        ->count();
            $total_unexecuted_warrant = Warrant::where('crime_category_name',$crime_id)
                                        ->whereBetween('created_at',[$fromDate,$toDate])
                                        ->where('warrant_type',$warrant_type)
                                        ->where('is_executed',0)
                                        ->count();
            
            $thanaNotRecieveMismatch = DB::table('warrants')
                                            ->whereBetween('created_at',[$fromDate,$toDate])
                                            ->where('warrant_type',$warrant_type)
                                            ->where('created_by',1)
                                            ->where('crime_category_name',$crime_id)
                                            ->count();

            $processNumberNotFoundMismatch = DB::table('warrants')
                                            ->whereBetween('created_at',[$fromDate,$toDate])
                                            ->where('warrant_type',$warrant_type)
                                            ->where('crime_category_name',$crime_id)
                                            ->where('process_number',null)
                                            ->count();

            $findRecalledMismatch = DB::table('warrants')
                                    ->whereBetween('created_at',[$fromDate,$toDate])
                                    ->where('warrant_type',$warrant_type)
                                    ->where('is_recalled',1)
                                    ->where('is_executed',0)
                                    ->where('arrest_warrant_received_to_thana',null)
                                   ->where('crime_category_name',$crime_id)
                                    ->where('process_number',null)
                                    ->count();
        }

        if(($fromDate && $toDate) && ($warrant_type=='' && $crime_id=='' && $thanaId=='')){
            $total_warrant = Warrant::whereBetween('created_at',[$fromDate,$toDate])
                                        ->count();
            $total_executed_warrant = Warrant::whereBetween('created_at',[$fromDate,$toDate])
                                        ->where('is_executed',1)
                                        ->count();
            $total_unexecuted_warrant = Warrant::whereBetween('created_at',[$fromDate,$toDate])
                                        ->where('is_executed',0)
                                        ->count();
            
            $thanaNotRecieveMismatch = DB::table('warrants')
                                            ->whereBetween('created_at',[$fromDate,$toDate])
                                            ->where('created_by',1)
                                            ->count();

            $processNumberNotFoundMismatch = DB::table('warrants')
                                            ->whereBetween('created_at',[$fromDate,$toDate])
                                            ->where('process_number',null)
                                            ->count();

            $findRecalledMismatch = DB::table('warrants')
                                    ->whereBetween('created_at',[$fromDate,$toDate])
                                    ->where('is_recalled',1)
                                    ->where('is_executed',0)
                                    ->where('arrest_warrant_received_to_thana',null)
                                    ->where('process_number',null)
                                    ->count();
        }

        if(($fromDate && $toDate && $warrant_type) && ($crime_id=='' && $thanaId=='')){
            $total_warrant = Warrant::whereBetween('created_at',[$fromDate,$toDate])
                                        ->where('warrant_type',$warrant_type)
                                        ->count();
            $total_executed_warrant = Warrant::whereBetween('created_at',[$fromDate,$toDate])
                                        ->where('warrant_type',$warrant_type)
                                        ->where('is_executed',1)
                                        ->count();
            $total_unexecuted_warrant = Warrant::whereBetween('created_at',[$fromDate,$toDate])
                                        ->where('warrant_type',$warrant_type)
                                        ->where('is_executed',0)
                                        ->count();
            
            $thanaNotRecieveMismatch = DB::table('warrants')
                                            ->whereBetween('created_at',[$fromDate,$toDate])
                                            ->where('warrant_type',$warrant_type)
                                            ->where('created_by',1)
                                            ->count();

            $processNumberNotFoundMismatch = DB::table('warrants')
                                            ->whereBetween('created_at',[$fromDate,$toDate])
                                            ->where('warrant_type',$warrant_type)
                                            ->where('thana_name',$thanaId)
                                            ->where('process_number',null)
                                            ->count();

            $findRecalledMismatch = DB::table('warrants')
                                    ->whereBetween('created_at',[$fromDate,$toDate])
                                    ->where('warrant_type',$warrant_type)
                                    ->where('is_recalled',1)
                                    ->where('is_executed',0)
                                    ->where('arrest_warrant_received_to_thana',null)
                                    ->where('process_number',null)
                                    ->count();
        }

        if($warrant_type && ($crime_id=='' && $thanaId=='' && $fromDate=='' && $toDate=='')){
            $total_warrant = Warrant::where('warrant_type',$warrant_type)->count();
            $total_executed_warrant = Warrant::where('warrant_type',$warrant_type)
                                        ->where('is_executed',1)
                                        ->count();
            $total_unexecuted_warrant = Warrant::where('warrant_type',$warrant_type)
                                        ->where('is_executed',0)
                                        ->count();
            
            $thanaNotRecieveMismatch = DB::table('warrants')
                                            ->where('created_by',1)
                                            ->where('warrant_type',$warrant_type)
                                            ->count();

            $processNumberNotFoundMismatch = DB::table('warrants')
                                            ->where('warrant_type',$warrant_type)
                                            ->where('process_number',null)
                                            ->count();

            $findRecalledMismatch = DB::table('warrants')
                                    ->where('is_recalled',1)
                                    ->where('is_executed',0)
                                    ->where('arrest_warrant_received_to_thana',null)
                                    ->where('warrant_type',$warrant_type)
                                    ->where('process_number',null)
                                    ->count();
        }

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
        if($req->thanaId || $req->warrant_type || ($fromDate && $toDate) || ($fromDate && !$toDate)|| (!$fromDate && $toDate)) $is_filter = 1;


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
