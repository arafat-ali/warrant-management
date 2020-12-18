<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class WarrantMismatchController extends Controller
{
    public function thanaNotRecieveMismatch(){
    	$mismatch = DB:: select('SELECT * FROM warrants WHERE created_by=2 AND process_number NOT IN (SELECT process_number FROM warrants WHERE created_by=1)');
    	return response()->json([
            'success' => true,
            'Mismatch' => $mismatch

        ]);
    }

    public function processNumberNotFoundMismatch(){
    	$mismatch = DB:: select('SELECT * FROM warrants WHERE process_number IS NULL');
    	return response()->json([
            'success' => true,
            'Mismatch' => $mismatch

        ]);
    }

    public function findRecalledMismatch(){
        $mismatch = DB::table('warrants')
                    ->where('is_recalled',1)
                    ->where('is_executed',0)
                    ->get();
        return response()->json([
            'success' => true,
            'Mismatch' => $mismatch

        ]);
    }

    public function findProcessNoMismatch(){
        $mismatch = DB::select('SELECT * FROM warrants WHERE (criminal_name, criminal_father_name) IN (SELECT criminal_name, criminal_father_name FROM warrants WHERE created_by=4) AND created_by=1');
        return response()->json([
            'success' => true,
            'Mismatch' => $mismatch

        ]);
    }


}
