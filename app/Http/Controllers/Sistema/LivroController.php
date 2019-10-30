<?php

namespace App\Http\Controllers\Sistema;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Outros\Livro;

class LivroController extends Controller
{
	protected $livro;

	public function __construct(Livro $livro)
	{
		$this->livro = $livro;
	}

    public function index(Request $request)
    {
    	$params = ['query' => ['pg' => '10']];
    	$result	= apiRequest('GET', 'livros', $params);

    	return view('sistema.outros.livros', compact('result'));
    }
}
