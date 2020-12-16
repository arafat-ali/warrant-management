<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\CrimeCategory;
use App\Models\CrimeSubCategory;

class CrimeCategoryController extends Controller
{
    public function getAllCrimeCategories(){
    	$crimeCategories = CrimeCategory::all();
    	return response()->json([
            'message' => sizeof($crimeCategories) == 0 ? 'Not Found' : 'Data Retrieved' ,
            'data' => sizeof($crimeCategories) == 0 ? null : $crimeCategories,
        ]);
    }


    public function getCrimeSubCategoriesById($id){
    	$crimeSubCategories = DB::table('crime_sub_categories')->where('category_id','=',$id)->get();
    	return response()->json([
            'success' => true,
            'CrimeSubCategories' => $crimeSubCategories
        ]);
    }

    public function getCrimeSubCategories(){
    	$crimeSubCategories = CrimeSubCategory::all();
    	return response()->json([
            'success' => true,
            'CrimeSubCategories' => $crimeSubCategories
        ]);
    }
}
