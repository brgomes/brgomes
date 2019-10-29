<?php

namespace App\Http\Controllers\Importacao;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Importacao\Livro as Livro2;
use App\Models\Outros\Livro;

class IndexController extends Controller
{
    public function index()
    {
    	$livros1 = Livro::all();
    	$livros2 = Livro2::all();

    	$itens = [
    		[
    			'chave'		=> 'livros',
    			'nome'		=> 'Livros',
	    		'atualizar'	=> ($livros1->count() != $livros2->count()),
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
    	}

    	return redirect()->route('importacao.index');
    }
}
