<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::any('/test/index', 'TestController@anyIndex');
Route::any('/reflection/index', 'SongluReflectionTestController@anyIndex');
Route::any('/strtolower/index', 'StrToLowerController@anyIndex');

Route::any('routepay/routenotify/pay-return', 'RoutePay\RouteNotifyController@anyPayReturn');
