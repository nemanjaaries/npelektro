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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group([
    'middleware' => 'throttle:20,5',
    'prefix' => '/auth'
], function () {
    Route::post('/register', 'Auth\RegisterController@register');    
    Route::post('/login', 'Auth\LoginController@login');  
});

Route::group([
    'middleware' => 'auth.role:admin,manager,user',    
], function () {
    Route::get('/me', 'MeController@index');
    Route::get('/auth/logout', 'MeController@logout');

    Route::get('/users', 'UserController@index');
    Route::get('/users/{id}', 'UserController@show');
    Route::post('/users', 'UserController@store');
    Route::put('/users/{id}', 'UserController@update');
    Route::delete('/users/{id}', 'UserController@destroy');
});