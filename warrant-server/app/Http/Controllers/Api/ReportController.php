<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Warrant;

class ReportController extends Controller
{
    public function showReport(){
    	$fromDate = Carbon::now()->startOfMonth()->toDateTimeString();
    	$toDate = Carbon::now()->toDateTimeString();

    	$gr_saja_total_warrant = Warrant::where('warrant_type','জিআর সাজা')
    								->whereBetween('created_at',[$fromDate,$toDate])
    								->count();
    	$gr_saja_executed_warrant = Warrant::where('warrant_type','জিআর সাজা')
    								->whereBetween('created_at',[$fromDate,$toDate])
    								->where('is_executed',0)
    								->count();
    	$gr_saja_unexecuted_warrant = Warrant::where('warrant_type','জিআর সাজা')
    								->whereBetween('created_at',[$fromDate,$toDate])
    								->where('is_executed',1)
    								->count();
    	$gr_greftar_total_warrant = Warrant::where('warrant_type','জিআর গ্রেফতার')
    								->whereBetween('created_at',[$fromDate,$toDate])
    								->count();
    	$gr_greftar_executed_warrant = Warrant::where('warrant_type','জিআর গ্রেফতার')
    								->whereBetween('created_at',[$fromDate,$toDate])
    								->where('is_executed',0)
    								->count();
    	$gr_greftar_unexecuted_warrant = Warrant::where('warrant_type','জিআর গ্রেফতার')
    								->whereBetween('created_at',[$fromDate,$toDate])
    								->where('is_executed',1)
    								->count();
    	$cr_saja_total_warrant = Warrant::where('warrant_type','সিআর সাজা')
    								->whereBetween('created_at',[$fromDate,$toDate])
    								->count();
    	$cr_saja_executed_warrant = Warrant::where('warrant_type','সিআর সাজা')
    								->whereBetween('created_at',[$fromDate,$toDate])
    								->where('is_executed',0)
    								->count();
    	$cr_saja_unexecuted_warrant = Warrant::where('warrant_type','সিআর সাজা')
    								->whereBetween('created_at',[$fromDate,$toDate])
    								->where('is_executed',1)
    								->count();
    	$cr_greftar_total_warrant = Warrant::where('warrant_type','সিআর গ্রেফতার')
    								->whereBetween('created_at',[$fromDate,$toDate])
    								->count();
    	$cr_greftar_executed_warrant = Warrant::where('warrant_type','সিআর গ্রেফতার')
    								->whereBetween('created_at',[$fromDate,$toDate])
    								->where('is_executed',0)
    								->count();
    	$cr_greftar_unexecuted_warrant = Warrant::where('warrant_type','সিআর গ্রেফতার')
    								->whereBetween('created_at',[$fromDate,$toDate])
    								->where('is_executed',1)
    								->count();

    	$data = array(
			'GR_Saja_Total' => $gr_saja_total_warrant,
            'GR_Saja_executed'=> $gr_saja_executed_warrant,
            'GR_Saja_unexecuted'=> $gr_saja_unexecuted_warrant,
            'GR_Greftar_Total' => $gr_greftar_total_warrant,
            'GR_Greftar_executed'=> $gr_greftar_executed_warrant,
            'GR_Greftar_unexecuted'=> $gr_greftar_unexecuted_warrant,
            'CR_Saja_Total' => $cr_saja_total_warrant,
            'CR_Saja_executed'=> $cr_saja_executed_warrant,
            'CR_Saja_unexecuted'=> $cr_saja_unexecuted_warrant,
            'CR_Greftar_Total' => $cr_greftar_total_warrant,
            'CR_Greftar_executed'=> $cr_greftar_executed_warrant,
            'CR_Greftar_unexecuted'=> $cr_greftar_unexecuted_warrant,
		);

    	return response()->json([
            'success' => true,
            'data' => $data
            

        ]);

    }
}
