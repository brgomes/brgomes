<?php

namespace App\Http\Controllers\Importacao;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Importacao\Livro as Livro2;
use App\Models\Importacao\Strava as Strava2;
use App\Models\Outros\Livro;
use App\Models\Outros\Strava;

class IndexController extends Controller
{
    public function index()
    {
    	$livros1 = Livro::all();
    	$livros2 = Livro2::all();
    	$strava1 = Strava::all();
    	$strava2 = Strava2::all();

    	$itens = [
    		[
    			'chave'		=> 'livros',
    			'nome'		=> 'Livros',
	    		'atualizar'	=> ($livros1->count() != $livros2->count()),
	    	],
	    	[
    			'chave'		=> 'strava',
    			'nome'		=> 'Strava',
	    		'atualizar'	=> ($strava1->count() != $strava2->count()),
	    	],
    	];

    	return view('importacao.index', compact('itens'));
    }

    public function executar($chave)
    {
    	if ($chave == 'livros') {
    		$livros2 = Livro2::all();

    		foreach ($livros2 as $livro) {
    			apiRequest('POST', 'livros', ['form_params' => $livro->toArray()]);
    		}
    	} elseif ($chave == 'strava') {
    		$strava2 = Strava2::all();

    		foreach ($strava2 as $strava) {
    			$result = apiRequest('POST', 'strava', ['form_params' => $strava->toArray()]);

                if ($result->statusCode != '200') {
                    dd($result);
                }
    		}
    	}

    	return redirect()->route('importacao.index');
    }
}
