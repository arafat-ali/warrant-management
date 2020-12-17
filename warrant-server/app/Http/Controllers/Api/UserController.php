<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;
class UserController extends Controller
{
    public function store(Request $request){
        $thana_id = Auth::user()->thana;
        // $id = Auth::User()->id; 
        // return response()->json([
        //         'success' => true,
        //         'Message' => $thana_id,
        //         'Id' => $id
        //     ]);
        if($request->thana != null){
            $thana_id = $request->thana;
        }
        $user = new user();
        $user->name = $request->name;
        $user->name_bangla = $request->name_bangla;
    	$user->email = $request->email;
    	$user->password = bcrypt($request->password);
    	$user->bp = $request->bp;
    	$user->mobile = $request->mobile;
    	$user->gender = $request->gender;
    	$user->district = $request->district;
    	$user->thana = $thana_id;
    	//$user->outpost = $request->outpost;
        $user->role_id = $request->role_id;
        if($user->save()){
    		return response()->json([
	            'success' => true,
	            'Message' => 'Successfully added'
	        ]);
    	}
    	else{
    		return response()->json([
	            'success' => false,
	            'Message' => 'Failed to add'
	        ]);

    	}
    }


    public function getAllSIByThanaid($thana_id){
        $users = User::where('role_id',5)->where('thana',$thana_id)->get();
        return response()->json([
            'success' => false,
            'data' => $users
        ]);
    }


}
