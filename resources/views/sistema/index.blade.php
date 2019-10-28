@extends('adminlte::page')


@section('content')

    <div class="row">
        
    </div>
@stop


@section('css')
    <link rel="stylesheet" href="{{ asset('css/style_1.0.css') }}">
@stop

@section('js')
    <script type="text/javascript">
        FusionCharts.ready(function() {
            var chart1 = new FusionCharts({
                'type': 'line',
                'renderAt': 'lineChart1',
                'width': '100%',
                'height': '350',
                'dataFormat': 'jsonurl',
                'dataSource': '/graficos/juridico/andamentos-por-dia'
            }).render();

            var chart2 = new FusionCharts({
                'type': 'line',
                'renderAt': 'lineChart2',
                'width': '100%',
                'height': '350',
                'dataFormat': 'jsonurl',
                'dataSource': '/graficos/juridico/clientes-por-dia'
            }).render();

            var chart3 = new FusionCharts({
                'type': 'pie2d',
                'renderAt': 'pieChart1',
                'width': '100%',
                'height': '350',
                'dataFormat': 'jsonurl',
                'dataSource': '/graficos/bilhar/mesas'
            }).render();
        });
    </script>
@stop
