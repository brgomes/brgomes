<?php

Route::group([], function() {
	Route::get('/', 'HomeController@index')->name('home');
	Route::post('/enviar', 'HomeController@enviarEmail')->name('enviar');
});

Route::group(['middleware' => 'auth', 'prefix' => 'sistema'], function() {
	Route::get('/', 'Sistema\IndexController@index')->name('sistema.index');
});

Auth::routes();
