@extends('adminlte::page')

@section('content_header')
    <h1>Strava</h1>
@stop

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-body">
                    <a href="<?php echo $url; ?>" class="btn btn-success"><i class="fas fa-sync-alt"></i> Sincronizar</a>
                    <a href="" class="btn btn-primary"><i class="fas fa-redo-alt"></i> Atualizar</a>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="box <?php echo $corrida['estatisticas']['bg']; ?>">
                <div class="box-header with-border">
                    <h4 class="box-title"><i class="fas fa-walking"></i> Corridas</h4>
                </div>
                <div class="box-body">
                    <i class="fas fa-flag-checkered"></i>
                    <?php echo number_format($corrida['executado']['distancia'], $digitos, ',', '.'); ?> km
                    em <?php echo $corrida['executado']['qtde']; ?> corridas
                    <br />

                    <i class="fas fa-bullseye"></i>
                    Meta: <?php echo number_format($corrida['planejado']['distancia'], $digitos, ',', '.'); ?> km
                    (<?php echo number_format($corrida['estatisticas']['saldo_meta'], $digitos, ',', '.'); ?> km)

                    <br />

                    <i class="far fa-calendar-alt"></i>
                    Hoje: <?php echo number_format($corrida['planejado']['parcial'], $digitos, ',', '.'); ?> km

                    <?php if ($corrida['estatisticas']['saldo'] < 0): ?>
                        <span class="badge bg-red">
                            <i class="fas fa-long-arrow-alt-down"></i>
                            <?php echo number_format(($corrida['estatisticas']['saldo'] * (-1)), $digitos, ',', '.'); ?> km
                        </span>
                    <?php elseif ($corrida['estatisticas']['saldo'] > 0): ?>
                        <span class="badge bg-green">
                            <i class="fas fa-long-arrow-alt-up"></i>
                            <?php echo number_format($corrida['estatisticas']['saldo'], $digitos, ',', '.'); ?> km
                        </span>
                    <?php else: ?>
                        <span class="badge bg-green">
                            <i class="fas fa-equals"></i>
                        </span>
                    <?php endif; ?>

                    <br />
                    <i class="fas fa-chart-area"></i>
                    Média para meta: <?php echo number_format($corrida['estatisticas']['media_ideal'], 2, ',', '.'); ?> km/sem

                    <br /><br />

                    <div class="progress" style="height:1px; margin-bottom:0">
                        <div class="progress-bar bg-black" role="progressbar" style="width: <?php echo $corrida['planejado']['percentual']; ?>%" aria-valuenow="<?php echo $corrida['planejado']['percentual']; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <div class="progress">
                        <div class="progress-bar <?php echo $corrida['estatisticas']['progress']; ?>" role="progressbar" style="width: <?php echo $corrida['executado']['percentual']; ?>%;" aria-valuenow="<?php echo $corrida['executado']['percentual']; ?>" aria-valuemin="0" aria-valuemax="100">
                            <?php echo $corrida['executado']['percentual']; ?>%
                        </div>
                    </div>

                    <br />
                    <div id="chart-corrida" class="donut-size">
                        <div class="pie-wrapper">
                            <span class="label">
                                <span class="num">0</span><span class="smaller">km</span>
                            </span>
                            <div class="pie">
                                <div class="left-side half-circle"></div>
                                <div class="right-side half-circle"></div>
                            </div>
                            <div class="shadow"></div>
                        </div>
                    </div>
                    <input type="hidden" id="total-corrida-semana" value="<?php echo $corrida['estatisticas']['total_semana']; ?>" />
                    <input type="hidden" id="percentual-corrida-semana" value="<?php echo $corrida['estatisticas']['percentual_semana']; ?>" />
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="box <?php echo $pedal['estatisticas']['bg']; ?>">
                <div class="box-header with-border">
                    <h4 class="box-title"><i class="fas fa-bicycle"></i> Pedais</h4>
                </div>
                <div class="box-body">
                    <i class="fas fa-flag-checkered"></i>
                    <?php echo number_format($pedal['executado']['distancia'], $digitos, ',', '.'); ?> km
                    em <?php echo $pedal['executado']['qtde']; ?> pedaladas
                    <br />
                    <i class="fas fa-bullseye"></i>
                    Meta: <?php echo number_format($pedal['planejado']['distancia'], $digitos, ',', '.'); ?> km
                    (<?php echo number_format($pedal['estatisticas']['saldo_meta'], $digitos, ',', '.'); ?> km)

                    <br />
                    <i class="far fa-calendar-alt"></i>
                    Hoje: <?php echo number_format($pedal['planejado']['parcial'], $digitos, ',', '.'); ?> km

                    <?php if ($pedal['estatisticas']['saldo'] < 0): ?>
                        <span class="badge bg-red">
                            <i class="fas fa-long-arrow-alt-down"></i>
                            <?php echo number_format(($pedal['estatisticas']['saldo'] * (-1)), $digitos, ',', '.'); ?> km
                        </span>
                    <?php elseif ($pedal['estatisticas']['saldo'] > 0): ?>
                        <span class="badge bg-green">
                            <i class="fas fa-long-arrow-alt-up"></i>
                            <?php echo number_format($pedal['estatisticas']['saldo'], $digitos, ',', '.'); ?> km
                        </span>
                    <?php else: ?>
                        <span class="badge bg-green">
                            <i class="fas fa-equals"></i>
                        </span>
                    <?php endif; ?>

                    <br />
                    <i class="fas fa-chart-area"></i>
                    Média para meta: <?php echo number_format($pedal['estatisticas']['media_ideal'], 2, ',', '.'); ?> km/sem

                    <br /><br />

                    <div class="progress" style="height:1px; margin-bottom:0">
                        <div class="progress-bar bg-black" role="progressbar" style="width: <?php echo $pedal['planejado']['percentual']; ?>%" aria-valuenow="<?php echo $pedal['planejado']['percentual']; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <div class="progress">
                        <div class="progress-bar <?php echo $pedal['estatisticas']['progress']; ?>" role="progressbar" style="width: <?php echo $pedal['executado']['percentual']; ?>%" aria-valuenow="<?php echo $pedal['executado']['percentual']; ?>" aria-valuemin="0" aria-valuemax="100">
                            <?php echo $pedal['executado']['percentual']; ?>%
                        </div>
                    </div>

                    <br />
                    <div id="chart-pedal" class="donut-size">
                        <div class="pie-wrapper">
                            <span class="label">
                                <span class="num">0</span><span class="smaller">km</span>
                            </span>
                            <div class="pie">
                                <div class="left-side half-circle"></div>
                                <div class="right-side half-circle"></div>
                            </div>
                            <div class="shadow"></div>
                        </div>
                    </div>
                    <input type="hidden" id="total-pedal-semana" value="<?php echo $pedal['estatisticas']['total_semana']; ?>" />
                    <input type="hidden" id="percentual-pedal-semana" value="<?php echo $pedal['estatisticas']['percentual_semana']; ?>" />
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="box box-default">
                <div class="box-header with-border">
                    <h4 class="box-title"><i class="fas fa-info"></i> Informações</h4>
                </div>
                <div class="box-body">
                    <strong>Data de referência:</strong> <?php echo $fim->format('d/m/Y'); ?>
                    <br />
                    <strong>Início semana:</strong> <?php echo $dataInicioSemana->format('d/m/Y'); ?> (Domingo)
                    <br />
                    <strong>Término semana:</strong> <?php echo $dataTerminoSemana->format('d/m/Y'); ?> (Sábado)
                    <br />
                    <strong>Semanas para o fim do ano:</strong> <?php echo $semanas; ?>
                    <br />
                    <strong>Total de atividades:</strong> <?php echo (count($corridas) + count($pedaladas)); ?>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="{{ asset('css/graph.css') }}">
@stop

@section('js')
    <script>
        window.onload = function() {
            function updateDonutChart(el, percent, text, donut) {
                percent = Math.round(percent);

                if (percent > 100) {
                    percent = 100;
                } else if (percent < 0) {
                    percent = 0;
                }

                var deg = Math.round(360 * (percent / 100));

                if (percent > 50) {
                    $(el + ' .pie').css('clip', 'rect(auto, auto, auto, auto)');
                    $(el + ' .right-side').css('transform', 'rotate(180deg)');
                } else {
                    $(el + ' .pie').css('clip', 'rect(0, 1em, 1em, 0.5em)');
                    $(el + ' .right-side').css('transform', 'rotate(0deg)');
                }

                if (percent < 100) {
                    $(el + ' .half-circle').css('border', '0.1em solid #DC3545');
                } else {
                    $(el + ' .half-circle').css('border', '0.1em solid #28A745');
                }

                if (donut) {
                    $(el + ' .right-side').css('border-width', '0.1em');
                    $(el + ' .left-side').css('border-width', '0.1em');
                    $(el + ' .shadow').css('border-width', '0.1em');
                } else {
                    $(el + ' .right-side').css('border-width', '0.5em');
                    $(el + ' .left-side').css('border-width', '0.5em');
                    $(el + ' .shadow').css('border-width', '0.5em');
                }
                $(el + ' .num').text(text);
                $(el + ' .left-side').css('transform', 'rotate(' + deg + 'deg)');
            }

            updateDonutChart('#chart-corrida', $('#percentual-corrida-semana').val(), $('#total-corrida-semana').val(), true);
            updateDonutChart('#chart-pedal', $('#percentual-pedal-semana').val(), $('#total-pedal-semana').val(), true);
        }
    </script>
@stop
