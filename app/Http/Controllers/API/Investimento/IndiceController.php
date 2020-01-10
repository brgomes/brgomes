<?php

namespace App\Http\Controllers\API\Investimento;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Investimento\Indice;
use App\Http\Requests\IndiceValidationRequest;

class IndiceController extends Controller
{
	public function index()
	{
		return Indice::all();
	}

    public function store(IndiceValidationRequest $request)
    {
        try {
        	$indice = Indice::create($request->all());

            return response()->json(['indice' => $indice], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 422);
        }
    }

    public function show($id)
    {
        return Indice::find($id);
    }

    public function update(IndiceValidationRequest $request, $id)
    {
        try {
            $indice = Indice::find($id);

            if (!$indice) {
                return response()->json(['message' => 'O índice não foi encontrado.'], 404);
            }

            $indice->update($request->all());

            return response()->json(['indice' => $indice], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 422);
        }
    }

    public function destroy($id)
    {
        try {
            $indice = Indice::find($id);

            if (!$indice) {
                return response()->json(['message' => 'O índice não foi encontrado.'], 404);
            }

            $indice->delete();

            return response()->json(['message' => 'O índice foi excluído com sucesso.'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 422);
        }
    }
}
