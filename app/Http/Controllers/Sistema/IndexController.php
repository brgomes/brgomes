<?php

namespace App\Http\Controllers\Sistema;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function index()
    {
    	return view('sistema.index');
    }

    public function usuario()
    {
    	$body = apiRequest('POST', 'details');

		//dd($body->success->primeironome);

		return (array) $body;
    }
}
