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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('createNewPlayer', 'API\PlayerController@createNewPlayer');
Route::post('getPlayerName/{id}', 'API\PlayerController@getPlayerName');
Route::post('updatePlayerName/{id}', 'API\PlayerController@updatePlayerName');
Route::post('isRegistered/{id}', 'API\PlayerController@isRegistered');
Route::post('increaseScore/{id}', 'API\PlayerController@increaseScore');
Route::post('getPlayerScore/{id}', 'API\PlayerController@getPlayerScore');
Route::post('getLeaderboard', 'API\PlayerController@getLeaderboard');

Route::post('createPlayerAccount/{id}', 'API\PlayerAccountController@createPlayerAccount');
