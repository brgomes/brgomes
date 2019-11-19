<?php

Route::group(['prefix' => parseLocale()], function() {
	Route::get('/', 'HomeController@index')->name('home');
	Route::post('/enviar', 'HomeController@enviarEmail')->name('enviar');
});

Route::group(['middleware' => 'auth', 'prefix' => 'sistema'], function() {
	Route::get('/', 'Sistema\IndexController@index')->name('sistema.index');

	Route::get('/importacao', 'Importacao\IndexController@index')->name('importacao.index');
	Route::get('/importacao/executar/{chave}', 'Importacao\IndexController@executar')->name('importacao.executar');

	//Route::get('/usuario', 'Sistema\IndexController@usuario')->name('sistema.usuario');

	Route::resource('livros', 'Sistema\LivroController', ['as' => 'sistema']);

	Route::get('strava', 'Sistema\StravaController@index')->name('sistema.strava.index');
	Route::get('strava/callback', 'Sistema\StravaController@callback');
});

Auth::routes();
