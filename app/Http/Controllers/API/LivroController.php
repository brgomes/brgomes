<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Outros\Livro;
use App\Http\Requests\LivroValidationRequest;

class LivroController extends Controller
{
    public function index()
    {
        return Livro::all();
    }

    public function store(LivroValidationRequest $request)
    {
        if ($livro = Livro::create($request->all())) {
            return response(['status' => 'success', 'livro' => $livro], 200);
        }

        return response(['status' => 'error'], 500);
    }

    public function show($id)
    {
        return Livro::find($id);
    }

    public function update(LivroValidationRequest $request, $id)
    {
        $livro = Livro::find($id);

        return $livro->update($request->all());
    }

    public function destroy($id)
    {
        return $livro->delete($id);
    }
}
