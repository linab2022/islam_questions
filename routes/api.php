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

Route::get('createNewPlayer', 'API\PlayerController@createNewPlayer');
Route::get('getPlayerName/{id}', 'API\PlayerController@getPlayerName');
Route::post('updatePlayerName/{id}', 'API\PlayerController@updatePlayerName');
Route::get('isRegistered/{id}', 'API\PlayerController@isRegistered');
Route::post('createNewPlayerWithAccount', 'API\PlayerController@createNewPlayerWithAccount');
Route::post('increaseScore/{id}', 'API\PlayerController@increaseScore');
Route::get('getPlayerScore/{id}', 'API\PlayerController@getPlayerScore');
Route::get('getLeaderboard', 'API\PlayerController@getLeaderboard');

Route::post('createPlayerAccount/{id}', 'API\PlayerAccountController@createPlayerAccount');


Route::post('store', 'API\QuestionController@store');
Route::get('getRandomQuestion', 'API\QuestionController@getRandomQuestion');

Route::post('register', 'API\AuthController@register');
Route::post('login', 'API\AuthController@login');