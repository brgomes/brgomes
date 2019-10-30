@extends('adminlte::page')

@section('content_header')
    <h1>Livros</h1>
@stop

@section('content')

    <div class="row">
        <div class="col-lg-3 col-xs-6">
            <div class="small-box bg-aqua">
                <div class="inner">
                    <h3>{{ count($result->livros) }}</h3>

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
                    <h3>{{ number_format($result->percentuallido, 0) }}<sup style="font-size: 20px">%</sup></h3>

                    <p>{{ $result->paginaslidas }} de {{ number_format($result->totalpaginas, 0, '', '.') }} páginas lidas</p>
                </div>
                <div class="icon">
                    <i class="fa fa-check"></i>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-xs-6">
            <div class="small-box bg-yellow">
                <div class="inner">
                    <h3>{{ $result->paginaspordia }}</h3>

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
                    <h3>{{ datetime($result->previsaotermino, 'd/m/y') }}</h3>

                    <p>{{ number_format($result->diasrestantes, 0, '', '.') }} dias restantes</p>
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
                <table class="table table-bordered table-striped table-hover">
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
                        @foreach ($result->livros as $livro)
                            <tr>
                                <td>{{ $livro->ordem }}</td>
                                <td>
                                    <a href="#" data-toggle="modal" data-target="#modalEditarLivro{{ $livro->id }}">{{ $livro->nome }}</a>
                                </td>
                                <td>{{ datetime($livro->dataaquisicao, 'd/m/Y') }}</td>
                                <td>{{ datetime($livro->previsaotermino, 'd/m/Y') }}</td>
                                <td>{{ $livro->totalpaginas }}</td>
                                <td>{{ $livro->paginaslidas }}</td>
                                <td>
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width:{{ number_format($livro->percentuallido, 0) }}%">
                                            {{ number_format($livro->percentuallido, 0) }}%
                                        </div>
                                    </div>

                                    @include('sistema.livros._edit', ['livro' => $livro, 'name' => 'modalEditarLivro'])
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <button class="btn btn-success" data-toggle="modal" data-target="#modalInserirLivro"><span class="fa fa-plus"></span> Novo livro</button>

                @include('sistema.livros._create')
            </div>
        </div>
    </div>
@stop
