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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('login', 'API\UsuarioController@login');

Route::group(['middleware' => 'auth:api'], function() {
	Route::get('logout', 'API\UsuarioController@logout');

	Route::resource('livros', 'API\LivroController');

	Route::get('strava', 'API\StravaController@index')->name('sistema.strava.index');
	Route::post('strava', 'API\StravaController@store')->name('sistema.strava.store');

	Route::post('details', 'API\UsuarioController@details');
});
