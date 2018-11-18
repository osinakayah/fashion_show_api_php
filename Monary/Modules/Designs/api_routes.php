<?php
/**
 * Created by PhpStorm.
 * User: osinakayah
 * Date: 10/28/18
 * Time: 3:40 PM
 */

Route::group(['prefix' => 'designs'], function (){
    Route::get('/', '\Monary\Modules\Designs\Controllers\DesignController@index');
    Route::get('/{designerId}', '\Monary\Modules\Designs\Controllers\DesignController@show');
    Route::post('/', '\Monary\Modules\Designs\Controllers\DesignController@store');
    Route::put('/{designId}', '\Monary\Modules\Designs\Controllers\DesignController@update');
    Route::delete('/{designId}', '\Monary\Modules\Designs\Controllers\DesignController@destroy');
});