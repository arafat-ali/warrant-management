<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Image;
use DB;
use Auth;
use App\Models\Warrant;
use App\Models\AssignedWarrant;

class WarrantController extends Controller
{
    public function addWarrantInfo(Request $req){

    	$warrant = new Warrant();
    	if($req->hasfile('arrest_warrant_picture_one')){
    		$originalImageOne= $req->file('arrest_warrant_picture_one');
	        $thumbnailImageOne = Image::make($originalImageOne);
	        $thumbnailPathOne = public_path().'/uploads/thumbnail/';
	        $originalPathOne = public_path().'/uploads/images/';
	        $thumbnailImageOne->save($originalPathOne.time().$originalImageOne->getClientOriginalName());
	        $thumbnailImageOne->resize(150,150);
	        $thumbnailImageOne->save($thumbnailPathOne.time().$originalImageOne->getClientOriginalName());

	        $warrant->arrest_warrant_picture_one = time().$originalImageOne->getClientOriginalName();
    	}
    	if($req->hasfile('arrest_warrant_picture_two')){
    		$originalImageTwo= $req->file('arrest_warrant_picture_two');
	        $thumbnailImageTwo = Image::make($originalImageTwo);
	        $thumbnailPathTwo = public_path().'/uploads/thumbnail/';
	        $originalPathTwo = public_path().'/uploads/images/';
	        $thumbnailImageTwo->save($originalPathTwo.time().$originalImageTwo->getClientOriginalName());
	        $thumbnailImageTwo->resize(150,150);
	        $thumbnailImageTwo->save($thumbnailPathTwo.time().$originalImageTwo->getClientOriginalName());

	        $warrant->arrest_warrant_picture_two = time().$originalImageTwo->getClientOriginalName();
    	}

    	$warrant->zilla_name = $req->zilla_name;
        $warrant->other_thana = $req->other_thana;
        $warrant->process_number = $req->process_number;
        $warrant->case_section_and_date = $req->case_section_and_date;
        $warrant->gr_number = $req->gr_number;
    	$warrant->other_number = $req->other_number;
    	$warrant->send_date = $req->send_date;
    	$warrant->warrant_type = $req->warrant_type;
    	$warrant->thana_name = $req->thana_id;
    	$warrant->crime_category_id = $req->crime_category_id;
    	//$warrant->crime_subcategory_id = $req->crime_subcategory_id;
    	$warrant->court_name = $req->court_id;
    	$warrant->arrest_criminal_to_court = $req->arrest_criminal_to_court;
    	$warrant->arrest_warrant_to_thana = $req->arrest_warrant_to_thana;
        $warrant->arrest_warrant_received_to_thana = $req->arrest_warrant_received_to_thana;
		$warrant->criminal_name = $req->criminal_name;
    	$warrant->criminal_father_name = $req->criminal_father_name;
    	$warrant->criminal_address = $req->criminal_address;
    	$warrant->criminal_mobile_no = $req->criminal_mobile_no;
        $warrant->criminal_NID = $req->criminal_NID;
        $warrant->criminal_passport = $req->criminal_passport;
        $warrant->birth_cirtificate = $req->birth_cirtificate;
    	if($warrant->save()){
    		return response()->json([
	            'success' => true,
	            'Message' => 'Successfully Uploaded'
	        ]);
    	}
    	else{
    		return response()->json([
	            'success' => false,
	            'Message' => 'Faile to Upload'
	        ]);

    	}


    }

    public function getCourtWarrantInfo(){
        $warrants = Warrant::orderBy('created_at', 'desc')
                        ->where('process_number','!=',null)
                        ->where('is_recalled', 0)
                        ->get();
        return response()->json([
            'success' => true,
            'Warrants' => $warrants
        ]);
    }
    public function getThanaWarrantInfo(){
        $warrants = Warrant::orderBy('created_at', 'desc')
                        ->get();
        return response()->json([
            'success' => true,
            'Warrants' => $warrants
        ]);
    }

    public function getNonAssingedThanaWarrantInfo(){
        $warrants = DB::table('warrants')
                        ->where('is_assigned','=',null)
                        ->get();
        return response()->json([
            'success' => true,
            'Warrants' => $warrants
        ]);
    }

    public function getAssingedThanaWarrantInfo(){
        $userId = Auth::user()->id;
        $warrants = DB::table('assigned_warrants')
                    ->join('warrants','assigned_warrants.warrant_id','=','warrants.id')
                    ->join('users','users.id','=','assigned_warrants.assigned_to')
                    ->where('assigned_warrants.assigned_by','=',$userId)
                    ->select('assigned_warrants.*','users.name_bangla','warrants.process_number','warrants.case_section_and_date','warrants.criminal_name','criminal_father_name','criminal_address','warrant_type','arrest_warrant_to_thana')
                    ->orderBy('warrants.created_at', 'desc')
                    ->get();
        // $warrants = Warrant::orderBy('created_at', 'desc')
        //                 ->where('is_assigned','!=',null)
        //                 ->get();
        return response()->json([
            'success' => true,
            'Warrants' => $warrants
        ]);
    }

    public function addWarrantInfoByThana(Request $req){

        $warrant = new Warrant();

        if($req->hasfile('arrest_warrant_picture_one')){
            $originalImageOne= $req->file('arrest_warrant_picture_one');
            $thumbnailImageOne = Image::make($originalImageOne);
            $thumbnailPathOne = public_path().'/uploads/thumbnail/';
            $originalPathOne = public_path().'/uploads/images/';
            $thumbnailImageOne->save($originalPathOne.time().$originalImageOne->getClientOriginalName());
            $thumbnailImageOne->resize(150,150);
            $thumbnailImageOne->save($thumbnailPathOne.time().$originalImageOne->getClientOriginalName());

            $warrant->arrest_warrant_picture_one = time().$originalImageOne->getClientOriginalName();
        }
        if($req->hasfile('arrest_warrant_picture_two')){
            $originalImageTwo= $req->file('arrest_warrant_picture_two');
            $thumbnailImageTwo = Image::make($originalImageTwo);
            $thumbnailPathTwo = public_path().'/uploads/thumbnail/';
            $originalPathTwo = public_path().'/uploads/images/';
            $thumbnailImageTwo->save($originalPathTwo.time().$originalImageTwo->getClientOriginalName());
            $thumbnailImageTwo->resize(150,150);
            $thumbnailImageTwo->save($thumbnailPathTwo.time().$originalImageTwo->getClientOriginalName());

            $warrant->arrest_warrant_picture_two = time().$originalImageTwo->getClientOriginalName();
        }

        
        $warrant->process_number = $req->process_number;
        $warrant->gr_number = $req->gr_number;
        $warrant->other_number = $req->other_number;
        $warrant->send_date = $req->send_date;
        $warrant->warrant_type = $req->warrant_type;
        $warrant->thana_name = $req->thana_id;
        $warrant->crime_category_id = $req->crime_category_id;
        //$warrant->crime_subcategory_id = $req->crime_subcategory_id;
        $warrant->court_id = $req->court_id;
        $warrant->case_hint = $req->case_hint;
        $warrant->arrest_criminal_to_court = $req->arrest_criminal_to_court;
        $warrant->arrest_warrant_to_thana = $req->arrest_warrant_to_thana;
        $warrant->arrest_warrant_received_to_thana = $req->arrest_warrant_received_to_thana;
        $warrant->criminal_name = $req->criminal_name;
        $warrant->criminal_father_name = $req->criminal_father_name;
        $warrant->criminal_address = $req->criminal_address;
        $warrant->criminal_mobile_no = $req->criminal_mobile_no;
        $warrant->criminal_NID = $req->criminal_NID;
        $warrant->criminal_passport = $req->criminal_passport;
        $warrant->birth_cirtificate = $req->birth_cirtificate;
        if($warrant->save()){
            return response()->json([
                'success' => true,
                'Message' => 'Successfully Uploaded'
            ]);
        }
        else{
            return response()->json([
                'success' => false,
                'Message' => 'Faile to Upload'
            ]);

        }


    }

    public function getThanaDataByDate($name, $startDate, $endDate){
        $warrants = DB::select("select * from warrants where is_executed = 0 and
              ".$name." between '". $startDate ."' and '". $endDate ."' ");
            
            //   $a = "select * from warrants where
            //   ".$name." between '". $startDate ."' and '". $endDate ."' ";

            //   echo $a;
              
        return response()->json([
            'name' => $name,
            'startDate' => $startDate,
            'endDate' => $endDate,
            'success' => true,
            'warrants' => $warrants
            // 'Warrants' => $warrants
        ]);
    }

    public function getThanaDataByDateExecuted($name, $startDate, $endDate){
        $warrants = DB::select("select * from warrants where is_executed = 1 and
              ".$name." between '". $startDate ."' and '". $endDate ."' ");
              
        return response()->json([
            'name' => $name,
            'startDate' => $startDate,
            'endDate' => $endDate,
            'success' => true,
            'warrants' => $warrants
            // 'Warrants' => $warrants
        ]);
    }


    public function unAssignedWarrant($assigned_id, $warrant_id){
        AssignedWarrant::where('id',$assigned_id)->delete();
        $warrant = Warrant::where('id',$warrant_id)->first();
        $warrant->is_assigned = null;
        if($warrant->save()){
            return response()->json([
                'success' => true,
                'Message' => 'Successfully updated'
            ]);
        }

    }

}
