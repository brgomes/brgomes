@extends('adminlte::page')

@section('content_header')
    <h1>Livros</h1>
@stop

@section('content')

    <div class="row">
        <div class="col-lg-3 col-xs-6">
            <div class="small-box bg-aqua">
                <div class="inner">
                    <h3>{{ $livros->count() }}</h3>

                    <p>Livros na fila</p>
                </div>
                <div class="icon">
                    <i class="fa fa-book"></i>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-xs-6">
            <div class="small-box bg-green">
                <div class="inner">
                    <h3>{{ $percentuallido }}<sup style="font-size: 20px">%</sup></h3>

                    <p>{{ $paginaslidas }} de {{ number_format($totalpaginas, 0, '', '.') }} páginas lidas</p>
                </div>
                <div class="icon">
                    <i class="fa fa-check"></i>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-xs-6">
            <div class="small-box bg-yellow">
                <div class="inner">
                    <h3>{{ $paginaspordia }}</h3>

                    <p>Páginas por dia</p>
                </div>
                <div class="icon">
                    <i class="fa fa-bullseye"></i>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-red">
                <div class="inner">
                    <h3>{{ $datareferencia->format('d/m/Y') }}</h3>

                    <p>{{ number_format($diasrestantes, 0, '', '.') }} dias restantes</p>
                </div>
                <div class="icon">
                    <i class="fa fa-calendar-alt"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="box">
        <div class="box-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Ordem</th>
                            <th>Livro</th>
                            <th>Aquisição</th>
                            <th>Término</th>
                            <th>Páginas</th>
                            <th>Lidas</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($livros as $livro)
                            <tr>
                                <td>{{ $livro->ordem }}</td>
                                <td>{{ $livro->nome }}</td>
                                <td>{{ datetime($livro->dataaquisicao, 'd/m/Y') }}</td>
                                <td>{{ datetime($livro->previsaotermino, 'd/m/Y') }}</td>
                                <td>{{ $livro->totalpaginas }}</td>
                                <td>{{ $livro->paginaslidas }}</td>
                                <td>
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width:{{ $livro->percentuallido }}%">
                                            {{ $livro->percentuallido }}%
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@stop
