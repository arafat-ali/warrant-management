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
    Route::post('/registration','App\Http\Controllers\Api\UserController@store');

    Route::get('/courts','App\Http\Controllers\Api\CourtController@getAllCourt');

    Route::get('/crime-categories','App\Http\Controllers\Api\CrimeCategoryController@getAllCrimeCategories');


	Route::get('/crime-subcategories/{id}','App\Http\Controllers\Api\CrimeCategoryController@getCrimeSubCategoriesById');
	Route::get('/crime-subcategories','App\Http\Controllers\Api\CrimeCategoryController@getCrimeSubCategories'); 
	
    Route::post('/add-warrant','App\Http\Controllers\Api\WarrantController@addWarrantInfo'); 
	Route::get('/warrants-court','App\Http\Controllers\Api\WarrantController@getCourtWarrantInfo');
    Route::get('/warrants-thana','App\Http\Controllers\Api\WarrantController@getThanaWarrantInfo');
    Route::post('/add-warrant-by-thana','App\Http\Controllers\Api\WarrantController@addWarrantInfoByThana'); 

    Route::post('/import-from-CI','App\Http\Controllers\Api\importExcelFileController@importFromCI');
    Route::post('/import-from-thana','App\Http\Controllers\Api\importExcelFileController@importFromThana');

    //Warrant Mismatch
    Route::get('/thana-not-recieve','App\Http\Controllers\Api\WarrantMismatchController@thanaNotRecieveMismatch');
    Route::get('/process-no-not-found','App\Http\Controllers\Api\WarrantMismatchController@processNumberNotFoundMismatch');
});