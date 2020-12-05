<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Excel;
use App\Models\Warrant;
use Auth;

class importExcelFileController extends Controller
{
    public function importFromCI(Request $req){
    	$my_id = Auth::user()->id;
    	if($req->hasfile('csv')){
    		$path = $req->file('csv')->getRealPath();
    		//$data = Excel::import(new Warrant,$req->file('csv'));
    		$data = Excel::toCollection(new Warrant, $req->file('csv'));
    		$data = $data[0];
    		// return response()->json([
	     //        'success' => true,
	     //        'message' => 'Info added successfully!',
	     //        'Data' => $data
	     //    ]);
    		 for($i=1; $i<sizeof($data); $i++){
    		 	if($data[$i][0]==null)break;
    			$warrant = new Warrant;
    			$warrant->created_by = $my_id;
    			$warrant->thana_name = $data[$i][1];
    			$warrant->process_number = $data[$i][2];
    			$warrant->warrant_type = $data[$i][3];
    			$warrant->case_section_and_date = $data[$i][4];
    			$warrant->gr_number = $data[$i][5];
    			$warrant->other_number = $data[$i][6];
    			$warrant->criminal_name = $data[$i][7];
    			$warrant->criminal_father_name = $data[$i][8];
    			$warrant->criminal_address = $data[$i][9];
    			$warrant->criminal_NID = $data[$i][11];
    			$warrant->arrest_warrant_to_thana = $data[$i][12];
    			$warrant->arrest_criminal_to_court = $data[$i][13];
    			$warrant->arrest_criminal_to_court = $data[$i][13];
    			$warrant->save();
    		}
    		return response()->json([
	            'success' => true,
	            'message' => 'Info added successfully!',

	        ]);
    	}
    }
}
