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

Route::resource('/recipes','App\Http\Controllers\RecipeController');

Route::post('/register','App\Http\Controllers\API\AuthController@register');
Route::post('/login','App\Http\Controllers\API\AuthController@login');



Route::group(['middleware'=>['auth:sanctum']], function(){
    Route::get('/profile', function(Request $request){
        return auth()->user();
    });

    Route::resource('/recipe', \App\Http\Controllers\RecipeController::class)->only(['store','destroy']);
    Route::post('/logout','App\Http\Controllers\API\AuthController@logout');


});

Route::resource('recipes', \App\Http\RecipeController::class)->only(['index']);