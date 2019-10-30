<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Outros\Livro;
use App\Http\Requests\LivroValidationRequest;

class LivroController extends Controller
{
    public function index(Request $request)
    {
        if ($request->pg) {
            $paginaspordia = (int) $request->pg;
        } else {
            $paginaspordia = 10;
        }

        $livros         = Livro::orderBy('ordem')->get();
        $totalpaginas   = 0;
        $paginaslidas   = 0;
        $percentuallido = 0;
        $hoje           = new \Datetime();
        $datareferencia = new \Datetime();

        if ($livros->count() > 0) {
            foreach ($livros as $livro) {
                $totalpaginas += $livro->totalpaginas;
                $paginaslidas += $livro->paginaslidas;

                $paginasrestantes   = $livro->totalpaginas - $livro->paginaslidas;
                $percentuallido     = round(($livro->paginaslidas * 100) / $livro->totalpaginas, 0);
                $diasrestantes      = round(($paginasrestantes / $paginaspordia), 0);
                $previsaotermino    = $datareferencia->add(new \DateInterval('P' . $diasrestantes . 'D'));

                $livro->paginasrestantes    = $paginasrestantes;
                $livro->percentuallido      = $percentuallido;
                $livro->diasrestantes       = $diasrestantes;
                $livro->previsaotermino     = $previsaotermino->format('Y-m-d');
            }
        }

        $percentuallido = round(($paginaslidas * 100) / $totalpaginas, 0);
        $diasrestantes  = $hoje->diff($datareferencia)->format('%a');

        return [
            'status'            => 'success',
            'paginaspordia'     => $paginaspordia,
            'livros'            => $livros,
            'totalpaginas'      => $totalpaginas,
            'paginaslidas'      => $paginaslidas,
            'percentuallido'    => $percentuallido,
            'diasrestantes'     => $diasrestantes,
            'previsaotermino'   => $datareferencia->format('Y-m-d'),
        ];
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
