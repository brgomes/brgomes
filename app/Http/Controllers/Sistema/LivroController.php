<?php

namespace App\Http\Controllers\Sistema;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Outros\Livro;

class LivroController extends Controller
{
	public function index(Request $request)
    {
    	$result	= apiRequest('GET', 'livros', ['query' => ['pg' => auth()->user()->paginaspordia]]);

    	if ($result->statusCode == 200) {
			return view('sistema.livros.index', compact('result'));
		}

		error($result->error);
    }

    public function store(Request $request)
    {
    	$result = apiRequest('POST', 'livros', ['form_params' => $request->all()]);

    	if ($result->statusCode == 200) {
    		return redirect()->route('sistema.livros.index');
    	}

    	return redirect()->back()->with('api_errors', $result->errors)->withInput();
    }
}
