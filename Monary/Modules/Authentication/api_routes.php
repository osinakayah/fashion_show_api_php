<?php
/**
 * Created by PhpStorm.
 * User: osinakayah
 * Date: 10/28/18
 * Time: 3:40 PM
 */

Route::group(['prefix' => 'auth'], function (){
    Route::post('login', '\Monary\Modules\Authentication\Controllers\LoginController@login');
    Route::post('register', '\Monary\Modules\Authentication\Controllers\RegisterController@register');
    Route::get('verify/{token}', '\Monary\Modules\Authentication\Controllers\RegisterController@verify');
    Route::get('/', '\Monary\Modules\Designs\Controllers\DesignController@index');
});