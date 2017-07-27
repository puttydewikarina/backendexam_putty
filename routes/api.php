<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'unit'], function() {
    
    Route::get('', function() {
        $unit = DB::table('unit_rumahs')->get();
        return response()->json($unit, 200);
    });


    Route::post('add', 'ProductController@createUnit');
    Route::post('delete', 'ProductController@deleteUnit');
});
