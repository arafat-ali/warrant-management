<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware(['auth:api'])->group(function () {
    Route::get('/user', function (Request $request) {
        return auth()->user();
    });

    Route::get('/thanas','App\Http\Controllers\Api\ThanaController@getAllThanas');

    Route::get('/courts','App\Http\Controllers\Api\CourtController@getAllCourt');

    Route::get('/crime-categories','App\Http\Controllers\Api\CrimeCategoryController@getAllCrimeCategories');


	Route::get('/crime-subcategories/{id}','App\Http\Controllers\Api\CrimeCategoryController@getCrimeSubCategoriesById');
	Route::get('/crime-subcategories','App\Http\Controllers\Api\CrimeCategoryController@getCrimeSubCategories'); 
	

    Route::post('/add-warrant','App\Http\Controllers\Api\WarrantController@addWarrantInfo'); 
	Route::get('/warrants','App\Http\Controllers\Api\WarrantController@getAllWarrantInfo');

    Route::post('/import-from-CI','App\Http\Controllers\Api\importExcelFileController@importFromCI');


});