<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>
    @section('scripts')        
    <script type="text/javascript" src="js/graphic.js"></script>
    <script>
        var Response = {!! json_encode($responseBody) !!};
        graphic(Response)        
    </script>
    @endsection
    <link href="css/style.css" rel="stylesheet" >
    

</head>
<body>
    @foreach ($responseBody as $response)

        @if ($response->code ?? null)       
        @if ($response->code == $codeCurrency)
        <div>
            1 {{$response->name}} igual a
        </div>
        <div>
            {{$response->bid}} Real Brasileiro
        </div>
        <div>
            {{$response->create_date}}
        </div>
        <div>
            Dados de cambio disponibilizados pela <a href="https://docs.awesomeapi.com.br/api-de-moedas">AwesomeAPI</a>
        </div>
        @endif
        @endif
    @endforeach
    <div class="graphic">
        <canvas id="myChart" width="400" height="400"></canvas>
        @yield('scripts')
    </div>
</body>
</html>