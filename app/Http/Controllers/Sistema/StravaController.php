<?php

namespace App\Http\Controllers\Sistema;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Iamstuartwilson\StravaApi;
use App\Models\Outros\Strava;

class StravaController extends Controller
{
    public function index(Request $request)
    {
    	$user = auth()->user();

    	try {
		    $api = new StravaApi($user->strava_client_id, $user->strava_client_secret);
		    $url = $api->authenticationUrl('http://www.brgomes.com/sistema/strava/callback', 'auto', 'read,activity:read');
		} catch(Exception $e) {
		    print $e->getMessage();
		}

		if ($request->dia) {
			$fim = \DateTime::createFromFormat('d/m/Y', $request->dia);
		} else {
			$fim = new \DateTime(date('Y-m-d'));
		}

		$ano    = (int) $fim->format('Y');
		$inicio = new \DateTime($ano . '-01-01');

		if (((int) $ano % 4) === 0) {
		    $totalDias = 366;
		} else {
		    $totalDias = 365;
		}

		$metaCorrida = $user->strava_meta_corrida;
		$metaPedal   = $user->strava_meta_pedal;

		$corridas   = [];
		$pedaladas  = [];

		$totalCorrida       = 0;
		$totalPedal         = 0;
		$totalCorridaSemana = 0;
		$totalPedalSemana   = 0;
		$digitos            = 0;

		$week = (int) $fim->format('w');

		switch ($week) {
		    case 0:
		        $dataInicioSemana  = new \DateTime(date('Y-m-d', strtotime($fim->format('Y-m-d'))));
		        $dataTerminoSemana = new \DateTime(date('Y-m-d', strtotime($fim->format('Y-m-d') . ' +6 days')) . ' 23:59:59');
		        break;
		    case 1:
		        $dataInicioSemana  = new \DateTime(date('Y-m-d', strtotime($fim->format('Y-m-d') . ' -1 day')));
		        $dataTerminoSemana = new \DateTime(date('Y-m-d', strtotime($fim->format('Y-m-d') . ' +5 days')) . ' 23:59:59');
		        break;
		    case 2:
		        $dataInicioSemana  = new \DateTime(date('Y-m-d', strtotime($fim->format('Y-m-d') . ' -2 days')));
		        $dataTerminoSemana = new \DateTime(date('Y-m-d', strtotime($fim->format('Y-m-d') . ' +4 days')) . ' 23:59:59');
		        break;
		    case 3:
		        $dataInicioSemana  = new \DateTime(date('Y-m-d', strtotime($fim->format('Y-m-d') . ' -3 days')));
		        $dataTerminoSemana = new \DateTime(date('Y-m-d', strtotime($fim->format('Y-m-d') . ' +3 days')) . ' 23:59:59');
		        break;
		    case 4:
		        $dataInicioSemana  = new \DateTime(date('Y-m-d', strtotime($fim->format('Y-m-d') . ' -4 days')));
		        $dataTerminoSemana = new \DateTime(date('Y-m-d', strtotime($fim->format('Y-m-d') . ' +2 days')) . ' 23:59:59');
		        break;
		    case 5:
		        $dataInicioSemana  = new \DateTime(date('Y-m-d', strtotime($fim->format('Y-m-d') . ' -5 days')));
		        $dataTerminoSemana = new \DateTime(date('Y-m-d', strtotime($fim->format('Y-m-d') . ' +1 day')) . ' 23:59:59');
		        break;
		    case 6:
		        $dataInicioSemana  = new \DateTime(date('Y-m-d', strtotime($fim->format('Y-m-d') . ' -6 days')));
		        $dataTerminoSemana = new \DateTime(date('Y-m-d', strtotime($fim->format('Y-m-d'))) . ' 23:59:59');
		        break;
		}

		$atividades = Strava::whereBetween('start_date_local', [$inicio->format('Y-m-d') . ' 00:00:00', $fim->format('Y-m-d') . ' 23:59:59'])
							->orderBy('start_date_local')
							->get();

		if ($atividades->count() > 0) {
			foreach ($atividades as $atividade) {
			    $dataAtividade = new \DateTime($atividade->start_date_local);

			    if (($atividade->type == 'Run') || ($atividade->type == 'Walk')) {
			        $corridas[] = $atividade;

			        $totalCorrida += $atividade->distance;

			        if (($dataAtividade >= $dataInicioSemana) && ($dataAtividade <= $dataTerminoSemana)) {
			            $totalCorridaSemana += $atividade->distance;
			        }
			    } elseif ($atividade->type == 'Ride') {
			        $pedaladas[] = $pedaladas;

			        $totalPedal += $atividade->distance;

			        if (($dataAtividade >= $dataInicioSemana) && ($dataAtividade <= $dataTerminoSemana)) {
			            $totalPedalSemana += $atividade->distance;
			        }
			    }
			}
		}

		$totalCorrida       = round($totalCorrida / 1000, $digitos);
		$totalPedal         = round($totalPedal / 1000, $digitos);
		$totalCorridaSemana = round($totalCorridaSemana / 1000, 2);
		$totalPedalSemana   = round($totalPedalSemana / 1000, 2);
		$mediaCorrida       = null;
		$mediaPedal         = null;

		$diff     = $fim->diff($inicio);
		$fimDoAno = new \DateTime($ano . '-12-31');
		$semanas  = (int) ($fimDoAno->diff($fim)->days / 7);

		if ($semanas === 0) {
		    $semanas = 1;
		}

		$totalCorridaHoje = round((($metaCorrida / $totalDias) * $diff->days), $digitos);
		$totalPedalHoje   = round((($metaPedal / $totalDias) * $diff->days), $digitos);

		$saldoCorrida = ($totalCorrida - $totalCorridaHoje);
		$saldoPedal   = ($totalPedal - $totalPedalHoje);

		if ($saldoCorrida < 0) {
		    $progressCorrida 	= 'progress-bar-danger';
		    $bgCorrida 			= 'box-danger';
		} else {
		    $progressCorrida 	= 'progress-bar-success';
		    $bgCorrida 			= 'box-success';
		}

		if ($saldoPedal < 0) {
		    $progressPedal 	= 'progress-bar-danger';
		    $bgPedal 		= 'box-danger';
		} else {
		    $progressPedal 	= 'progress-bar-success';
		    $bgPedal 		= 'box-success';
		}

		$mediaCorrida = round((($metaCorrida - $totalCorrida) / $semanas), 2);
		$mediaPedal   = round((($metaPedal - $totalPedal) / $semanas), 2);

		$corrida = [
		    'planejado' => [
		        'distancia'  => $metaCorrida,
		        'parcial'    => $totalCorridaHoje,
		        'percentual' => round((($totalCorridaHoje * 100) / $metaCorrida), $digitos),
		    ],
		    'executado' => [
		        'qtde'       => count($corridas),
		        'distancia'  => $totalCorrida,
		        'percentual' => round((($totalCorrida * 100) / $metaCorrida), $digitos),
		    ],
		    'estatisticas' => [
		        'saldo'             => $saldoCorrida,
		        'saldo_meta'        => ($totalCorrida - $metaCorrida),
		        'media_ideal'       => $mediaCorrida,
		        'progress'          => $progressCorrida,
		        'bg'				=> $bgCorrida,
		        'total_semana'      => $totalCorridaSemana,
		        'percentual_semana' => ($mediaCorrida == 0) ? 0 : round((($totalCorridaSemana * 100) / $mediaCorrida), $digitos)
		    ]
		];

		$pedal = [
		    'planejado' => [
		        'distancia'  => $metaPedal,
		        'parcial'    => $totalPedalHoje,
		        'percentual' => round((($totalPedalHoje * 100) / $metaPedal), $digitos),
		    ],
		    'executado' => [
		        'qtde'       => count($pedaladas),
		        'distancia'  => $totalPedal,
		        'percentual' => round((($totalPedal * 100) / $metaPedal), $digitos),
		    ],
		    'estatisticas' => [
		        'saldo'        		=> $saldoPedal,
		        'saldo_meta'   		=> ($totalPedal - $metaPedal),
		        'media_ideal'  		=> $mediaPedal,
		        'progress'     		=> $progressPedal,
		        'bg'				=> $bgPedal,
		        'total_semana' 		=> $totalPedalSemana,
		        'percentual_semana' => ($mediaPedal == 0) ? 0 : round((($totalPedalSemana * 100) / $mediaPedal), $digitos)
		    ]
		];

		if ($corrida['executado']['percentual'] > 100) {
		    $corrida['executado']['percentual'] = 100;
		}

		if ($pedal['executado']['percentual'] > 100) {
		    $pedal['executado']['percentual'] = 100;
		}

		return view('sistema.strava.index', compact('url', 'digitos', 'fim', 'dataInicioSemana', 'dataTerminoSemana', 'semanas', 'corridas', 'pedaladas', 'corrida', 'pedal'));
    }
}
