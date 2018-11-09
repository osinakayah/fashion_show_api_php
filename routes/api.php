<?php

use Illuminate\Http\Request;

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

Route::group(['prefix' => 'v1'], function (){

    require_once (generate_path_to_module_route('Authentication', 'api'));
    Route::middleware('auth:api')->group(function (){
        require_once (generate_path_to_module_route('Designs', 'api'));
    });
//    Route::middleware('auth:api')->get('/user', function (Request $request) {
//        return $request->user();
//    });
});

