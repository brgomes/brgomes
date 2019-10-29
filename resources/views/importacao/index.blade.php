@extends('adminlte::page')

@section('content_header')
    <h1>Importação de dados</h1>
@stop

@section('content')
    <div class="box">
        <div class="box-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>Dados</th>
                        <th>Atualizar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($itens as $item)
                        <tr @if ($item['atualizar']) class="danger" @else class="success" @endif>
                            <td>{{ $item['nome'] }}</td>
                            <td>
                                @if ($item['atualizar'])
                                    <a href="{{ route('importacao.executar', $item['chave']) }}">Executar</a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop
