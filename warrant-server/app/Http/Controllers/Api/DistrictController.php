<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\District;
use Illuminate\Http\Request;


class DistrictController extends Controller
{
    public function getAllDistrict()
    {
        $districts = District::all();
        return response()->json([
            'message' => $districts ? 'Data Retrived' : 'Not Found',
            'data' => $districts ? $districts : null
        ]);
    }
}
