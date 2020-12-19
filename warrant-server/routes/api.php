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



//search
Route::get('/get-thana-data-by-date/{name}/{start_date}/{end_date}','App\Http\Controllers\Api\WarrantController@getThanaDataByDate');
Route::get('/get-thana-data-by-date-executed/{name}/{start_date}/{end_date}','App\Http\Controllers\Api\WarrantController@getThanaDataByDateExecuted');




// Not in use
Route::get('/get-si-asi-warrants/{id}','App\Http\Controllers\Api\SIController@getSiAsiTotalWarrant'); 

Route::middleware(['auth:api'])->group(function () {
    Route::get('/user', function (Request $request) {
        return auth()->user();
    });
    Route::post('/registration','App\Http\Controllers\Api\UserController@store');

    Route::get('/SI-list/{thana_id}','App\Http\Controllers\Api\UserController@getAllSIByThanaid');

    Route::get('/districts','App\Http\Controllers\Api\DistrictController@getAllDistrict');

    Route::get('/thanas','App\Http\Controllers\Api\ThanaController@getAllThanas');
    Route::get('/thanas-by-district/{district}','App\Http\Controllers\Api\ThanaController@getThanasByDistrict');
    

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
    Route::get('/recalled-mismatch','App\Http\Controllers\Api\WarrantMismatchController@findRecalledMismatch');
    Route::get('/process-no-not-match','App\Http\Controllers\Api\WarrantMismatchController@findProcessNoMismatch');

    //SI List
    Route::get('/SI-list','App\Http\Controllers\Api\SIController@GetSIListByThana');
    Route::get('/assignSI/{warrant_id}/{si_id}','App\Http\Controllers\Api\SIController@assignSItoWarrant');

    //SI Warrants
    Route::get('/get-assigned-si-warrants','App\Http\Controllers\Api\SiController@getAssignedWarrant');
    Route::get('/get-completed-si-warrants','App\Http\Controllers\Api\SiController@getCompletedWarrant');



    // Dashboard APIs
    Route::get('/get-ci-dashboard-data/{id}','App\Http\Controllers\Api\DashboardController@getCiDashboardData');
    Route::get('/get-sp-dashboard-data/{id}','App\Http\Controllers\Api\DashboardController@getSpDashboardData');
    Route::get('/get-dig-dashboard-data/{id}','App\Http\Controllers\Api\DashboardController@getDigDashboardData');
    Route::get('/get-sp-dashboard-data-by-thana/{thana}','App\Http\Controllers\Api\DashboardController@getSpDashboardDataByThana');
    Route::get('/get-oc-dashboard-data/{id}','App\Http\Controllers\Api\DashboardController@getOcDashboardData');
    Route::get('/get-si-dashboard-data/{id}','App\Http\Controllers\Api\DashboardController@getSiDashboardData');

    Route::get('all-non-executed-oc','App\Http\Controllers\Api\DashboardController@getAllNonExecutedWarrants');
    Route::get('all-executed-oc','App\Http\Controllers\Api\DashboardController@getAllExecutedWarrants');
    Route::get('all-warrant-oc','App\Http\Controllers\Api\DashboardController@getAllWarrantsOC');

    Route::get('/get-ci-dashboard-data-today','App\Http\Controllers\Api\DashboardController@getCiDashboardDataToday');
    Route::get('/get-sp-dashboard-data-today','App\Http\Controllers\Api\DashboardController@getSpDashboardDataToday');
    Route::get('/get-dig-dashboard-data-today','App\Http\Controllers\Api\DashboardController@getDigDashboardDataToday');
    Route::get('/get-si-dashboard-data-today','App\Http\Controllers\Api\DashboardController@getSiDashboardDataToday');
    Route::get('/get-oc-dashboard-data-today','App\Http\Controllers\Api\DashboardController@getOcDashboardDataToday');



    //Activity
    Route::get('/save-execution/{id}/{msg}','App\Http\Controllers\Api\ActivityController@saveExecutionInfo');
    Route::post('/add-non-execution','App\Http\Controllers\Api\ActivityController@addNonExecutionInfo');

    Route::get('/view-activity/{id}','App\Http\Controllers\Api\ActivityController@viewSIActivity');

     //SI performence

    Route::get('get-si-performence-data/{si}/{start}/{end}','App\Http\Controllers\Api\SIController@getSiPerformenceData');

    //Unassigned warrants
    Route::get('unassigned-warrant/{assigned_id}/{warrant_id}','App\Http\Controllers\Api\WarrantController@unAssignedWarrant');

    //Recalled 
    Route::get('recall-from-CI/{id}','App\Http\Controllers\Api\RecalledController@recallWarrant');
    Route::get('recalled-warrant-oc','App\Http\Controllers\Api\RecalledController@recalledWarrantOC');
    Route::get('receive-recall/{id}','App\Http\Controllers\Api\RecalledController@receiveRecalledWarrantOC');

    Route::get('recalled-warrant-si','App\Http\Controllers\Api\RecalledController@recalledWarrantSI');
    Route::get('receive-recall-si/{id}','App\Http\Controllers\Api\RecalledController@receiveRecalledWarrantSI');
    //Thana
    Route::get('get-thana-data-not-recieved','App\Http\Controllers\Api\WarrantController@getNotRecievedThanaWarrant');
    Route::post('receieve-warrant','App\Http\Controllers\Api\WarrantController@ReceiveWarrant');

    //Report
    Route::get('show-report','App\Http\Controllers\Api\ReportController@showReport');

});

