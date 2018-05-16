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

Route::get('/', "HomeController@getLeague");
Route::get('/play-all', "HomeController@play");
Route::get('/play-week/{week}', "HomeController@playWeek");
Route::get('/edit-strenght', "HomeController@editStrenght");
Route::prefix('api')->group(function () {
    Route::get('fixture', "HomeController@refreshFixture");
    Route::get('leauge', "HomeController@refreshLeauge");
    Route::get('reset', "HomeController@reset");
    Route::get('next-matches/{week}', "HomeController@nextMatches");
    Route::get('/play-weekly/{week}', "HomeController@playWeekly");
    Route::get('/predictions', "HomeController@predictions");
    Route::get('/update-match/{id}/{column}/{value}',"HomeController@updateMatch");
});