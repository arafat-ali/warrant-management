<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Image;
use App\Models\Warrant;

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

    	
        $warrant->process_number = $req->process_number;
        $warrant->gr_number = $req->gr_number;
    	$warrant->other_number = $req->other_number;
    	$warrant->send_date = $req->send_date;
    	$warrant->warrant_type = $req->warrant_type;
    	$warrant->thana_id = $req->thana_id;
    	$warrant->crime_category_id = $req->crime_category_id;
    	//$warrant->crime_subcategory_id = $req->crime_subcategory_id;
    	$warrant->court_id = $req->court_id;
    	$warrant->case_hint = $req->case_hint;
    	$warrant->arrest_criminal_to_court = $req->arrest_criminal_to_court;
    	$warrant->arrest_warrant_to_thana = $req->arrest_warrant_to_thana;
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

    public function getAllWarrantInfo(){
        $warrants = Warrant::orderBy('created_at', 'desc')->get();
        return response()->json([
            'success' => true,
            'Warrants' => $warrants
        ]);
    }


}
