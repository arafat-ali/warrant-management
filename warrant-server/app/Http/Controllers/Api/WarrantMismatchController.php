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
}
