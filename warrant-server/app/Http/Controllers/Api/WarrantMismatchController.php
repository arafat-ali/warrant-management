<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class WarrantMismatchController extends Controller
{
    public function thanaNotRecieveMismatch(){
        $thana_name = 'সাতকানিয়া থানা';
        
    	// $mismatch = DB:: select('SELECT * FROM warrants WHERE created_by=2 AND process_number NOT IN (SELECT process_number FROM warrants WHERE created_by=1)');
        $mismatch = DB::table('warrants')->where('created_by',1)
                                        ->where('arrest_warrant_received_to_thana',null)
                                        ->where('thana_name',$thana_name)
                                        ->get();
    	return response()->json([
            'success' => true,
            'Mismatch' => $mismatch

        ]);
    }

    public function processNumberNotFoundMismatch(){
        
        $thana_name = 'সাতকানিয়া থানা';
        
    	$mismatch = DB::select('SELECT * FROM warrants WHERE process_number IS NULL' );
    	return response()->json([
            'success' => true,
            'Mismatch' => $mismatch

        ]);
    }

    public function findRecalledMismatch(){
        $thana_name = 'সাতকানিয়া থানা';

        $mismatch = DB::table('warrants')
                    ->where('is_recalled',1)
                    ->where('is_executed',0)
                    ->where('thana_name',$thana_name)
                    ->get();
        return response()->json([
            'success' => true,
            'Mismatch' => $mismatch

        ]);
    }

    public function findProcessNoMismatch(){
        $thana_name = 'সাতকানিয়া থানা';
        $mismatch = DB::select('SELECT * FROM warrants WHERE (thana_name, criminal_name, criminal_father_name) IN (SELECT thana_name, criminal_name, criminal_father_name FROM warrants WHERE created_by=4) AND created_by=1');
        return response()->json([
            'success' => true,
            'Mismatch' => $mismatch

        ]);
    }


    public function thanaNotRecieveMismatchbyThana($thana){
        $thana_name = DB::table('thanas')->where('id',$thana)->first()->name;
          // $mismatch = DB:: select('SELECT * FROM warrants WHERE created_by=2 AND process_number NOT IN (SELECT process_number FROM warrants WHERE created_by=1)');
        $mismatch = DB::table('warrants')->where('created_by',1)
                                        ->where('arrest_warrant_received_to_thana',null)
                                        ->where('thana_name',$thana_name)
                                        ->get();
        return response()->json([
            'success' => true,
            'Mismatch' => $mismatch

        ]);
    }

    public function processNumberNotFoundMismatchbyThana($thana){   
    $thana_name = DB::table('thanas')->where('id',$thana)->first()->name;     
        $mismatch = DB::select('SELECT * FROM warrants WHERE process_number IS NULL AND thana_name = '.'"'.$thana_name .'"');
        return response()->json([
            'success' => true,
            'Mismatch' => $mismatch

        ]);
    }

    public function findRecalledMismatchbyThana($thana){
        $thana_name = DB::table('thanas')->where('id',$thana)->first()->name;
        $mismatch = DB::table('warrants')
                    ->where('is_recalled',1)
                    ->where('is_executed',0)
                    ->where('thana_name',$thana_name)
                    ->get();
        return response()->json([
            'success' => true,
            'Mismatch' => $mismatch

        ]);
    }

    public function findProcessNoMismatchbyThana($thana){
        $thana_name = DB::table('thanas')->where('id',$thana)->first()->name;
        $mismatch = DB::select('SELECT * FROM warrants WHERE (thana_name, criminal_name, criminal_father_name) IN (SELECT thana_name, criminal_name, criminal_father_name FROM warrants WHERE created_by=4) AND created_by=1 AND thana_name = '.'"'.$thana_name .'"');
        return response()->json([
            'success' => true,
            'Mismatch' => $mismatch

        ]);
    }


}
