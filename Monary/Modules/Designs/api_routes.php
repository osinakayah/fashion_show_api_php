<?php
/**
 * Created by PhpStorm.
 * User: osinakayah
 * Date: 10/28/18
 * Time: 3:40 PM
 */

Route::group(['prefix' => 'designs'], function (){
    Route::get('/', '\Monary\Modules\Designs\Controllers\DesignController@index');
});