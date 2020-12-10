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

Route::post('/registration','App\Http\Controllers\Api\UserController@store');
//search
Route::get('/get-thana-data-by-date/{name}/{start_date}/{end_date}','App\Http\Controllers\Api\WarrantController@getThanaDataByDate');
Route::get('/get-thana-data-by-date-executed/{name}/{start_date}/{end_date}','App\Http\Controllers\Api\WarrantController@getThanaDataByDateExecuted');


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
	Route::get('/warrants-court','App\Http\Controllers\Api\WarrantController@getCourtWarrantInfo');
    
    //Thana
    Route::post('/add-warrant-by-thana','App\Http\Controllers\Api\WarrantController@addWarrantInfoByThana'); 
    Route::get('/warrants-thana','App\Http\Controllers\Api\WarrantController@getThanaWarrantInfo');
    Route::get('/warrants-thana-assigned','App\Http\Controllers\Api\WarrantController@getAssingedThanaWarrantInfo');
    Route::get('/warrants-thana-non-assigned','App\Http\Controllers\Api\WarrantController@getNonAssingedThanaWarrantInfo');


    Route::post('/import-from-CI','App\Http\Controllers\Api\importExcelFileController@importFromCI');
    Route::post('/import-from-thana','App\Http\Controllers\Api\importExcelFileController@importFromThana');

    //Warrant Mismatch
    Route::get('/thana-not-recieve','App\Http\Controllers\Api\WarrantMismatchController@thanaNotRecieveMismatch');
    Route::get('/process-no-not-found','App\Http\Controllers\Api\WarrantMismatchController@processNumberNotFoundMismatch');

    //SI List
    Route::get('/SI-list','App\Http\Controllers\Api\SIController@GetSIListByThana');
    Route::get('/assignSI/{warrant_id}/{si_id}','App\Http\Controllers\Api\SIController@assignSItoWarrant');

    
});