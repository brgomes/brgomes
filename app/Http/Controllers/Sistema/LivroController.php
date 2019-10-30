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

    public function index()
    {
    	$livros 		= $this->livro->orderBy('dataaquisicao')->get();
    	$totalpaginas 	= 0;
    	$paginaslidas 	= 0;
    	$paginaspordia  = 10;
    	$percentuallido = 0;
    	$hoje 			= new \Datetime();
		$datareferencia = new \Datetime();

    	if ($livros->count() > 0) {
    		foreach ($livros as $livro) {
    			$totalpaginas += $livro->totalpaginas;
    			$paginaslidas += $livro->paginaslidas;

    			$paginasrestantes 	= $livro->totalpaginas - $livro->paginaslidas;
        		$percentuallido 	= round(($livro->paginaslidas * 100) / $livro->totalpaginas, 0);
    			$diasrestantes 		= round(($paginasrestantes / $paginaspordia), 0);
    			$previsaotermino 	= $datareferencia->add(new \DateInterval('P' . $diasrestantes . 'D'));

    			$livro->paginasrestantes 	= $paginasrestantes;
    			$livro->percentuallido 		= $percentuallido;
    			$livro->diasrestantes		= $diasrestantes;
    			$livro->previsaotermino 	= $previsaotermino->format('Y-m-d');
    		}
    	}

    	$percentuallido = round(($paginaslidas * 100) / $totalpaginas, 0);
    	$diasrestantes 	= $hoje->diff($datareferencia)->format('%a');

    	return view('sistema.outros.livros', compact('livros', 'totalpaginas', 'paginaslidas', 'percentuallido', 'paginaspordia', 'datareferencia', 'diasrestantes'));
    }
}
