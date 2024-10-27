<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

    Route::post('login', 'App\Http\Controllers\AuthController@login');
    Route::post('logout', 'App\Http\Controllers\AuthController@logout');
    Route::post('refresh', 'App\Http\Controllers\AuthController@refresh');
    Route::post('me', 'App\Http\Controllers\AuthController@me');

});

Route::get('index', 'App\Http\Controllers\MainController@index')->name('index');

Route::group(['middleware' => 'check.guest'], function(){
    Route::post('reg', 'App\Http\Controllers\RegistrationController@reg');
});



Route::group(['middleware'=>['jwt.auth']], function(){
    Route::get('user/edit', 'App\Http\Controllers\UserController@edit');
    Route::patch('user/update', 'App\Http\Controllers\UserController@update');
    Route::get('user/reviews', 'App\Http\Controllers\ReviewController@userReviews');
    Route::delete('user/delete', 'App\Http\Controllers\UserController@delete');

    Route::get('review/create', 'App\Http\Controllers\ReviewController@create');
    Route::post('review/store', 'App\Http\Controllers\ReviewController@store');
    Route::patch('review/update/{review}', 'App\Http\Controllers\ReviewController@update');
    Route::delete('review/delete/{review}', 'App\Http\Controllers\ReviewController@delete');


});
