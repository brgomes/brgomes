<?php

use GuzzleHttp\Client;

Route::group([], function() {
	Route::get('/', 'HomeController@index')->name('home');
	Route::post('/enviar', 'HomeController@enviarEmail')->name('enviar');
});

Route::get('/sistema/usuario', function() {
	$client = new Client();

	$options = [
		'verify'	=> false,
		'headers'	=> [
			'Authorization' => 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjdhNWY3NmU5OTJkNGY4ZTViYjFmNzI5MjZjMDE3M2FmMzk4YTNiYTVlMDA4MDlhMDJmNDI2ZDc0ZDIxMTQ3YjM3YWIxYzFkMTlkNDg2MGQzIn0.eyJhdWQiOiIxIiwianRpIjoiN2E1Zjc2ZTk5MmQ0ZjhlNWJiMWY3MjkyNmMwMTczYWYzOThhM2JhNWUwMDgwOWEwMmY0MjZkNzRkMjExNDdiMzdhYjFjMWQxOWQ0ODYwZDMiLCJpYXQiOjE1NzIyOTMwMzgsIm5iZiI6MTU3MjI5MzAzOCwiZXhwIjoxNjAzOTE1NDM4LCJzdWIiOiIxIiwic2NvcGVzIjpbXX0.gAqjRw17scKE_PXSyOrYYjfzkiIJDMc2SOh21f7W-ULqVzH-FRQAI9svpwr3e6V4dxP6BMwmZqszap6Dk2sgjM0548bYIVBCFpIud8aPeoU5FPvfDJjrhh4pcxrtH6Skvp0V7f9qn5zXxgW8bRaLXRmmRaahso6DA0abHnRjpafh3jBFPQo0bd1D9KMzPoB1h9kb2z-kjfhmfcePwyZOUn6d0BJy_L7v6Ed9T4lNoWxMPQQy0RWLAy4OUurGaYSfO3-Xqi5Ua-PUV1LoBkHhVjD2gIOrDfmwq2iVNeasXUmgzkohXfFeQjbq14Su4fVjiLwJOjmx23Ea9Mkp23Hg3qGtYrB-yDOi2AW9X4RgdS7HLt7OisDX7MWHxGNuozN0AW-kVA7z_OQN7okY1IwqJMnbM8WC0B0cswIr_dm_bgssKTxsZbkQSl1wY1s-qhW0ruyEeqxrH3kH2E_nLkJWx_4K8EzTlfz0tPDj55Dk4X4RS7rRoDOK1bXE-sDdkwHa7R1lWOg_WjzcEIScvj7BdFAVqWvc8zFdaOk0ojHxFiuvVmSENtmRil0iWUHU7tA6aXlHHssz_2BE87aIA2bR0gwMrOSYp7KrEXRvWdhRNfzsjaMkCGs2NcoGLA43hL0Xx4esC0fcKuUUmRmk4-p7wFAxfN2nxISXyGR5qELb8oE',
			'Content-Type'	=> 'application/x-www-form-urlencoded',
			'Accept'		=> 'application/json',
			'verify'		=> false,
		],
	];

	$response 	= $client->request('POST', 'https://dev.brgomes2/api/details', $options);
	$statusCode = $response->getStatusCode();
	$body 		= $response->getBody()->getContents();

	//dd($body->success->primeironome);

	return $body;
});

Route::group(['middleware' => 'auth', 'prefix' => 'sistema'], function() {
//Route::group(['prefix' => 'sistema'], function() {
	Route::get('/', 'Sistema\IndexController@index')->name('sistema.index');
});

Auth::routes();
