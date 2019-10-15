<?php

Auth::routes();

Route::group([], function() {
	Route::get('/', 'HomeController@index')->name('home');
	Route::post('/enviar', 'HomeController@enviarEmail')->name('enviar');
});

Route::group(['prefix' => 'sistema'], function() {
	Route::get('/', 'Sistema\IndexController@index')->name('sistema.index');
});
