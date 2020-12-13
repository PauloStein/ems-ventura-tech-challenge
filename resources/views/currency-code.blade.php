<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>
    @section('scripts')        
    <script type="text/javascript" src="js/chart.js"></script>
    <script>
        var response = {!! json_encode($specificCurrencyResponseBody) !!};
        chart(response)        
    </script>
    @endsection
    <link href="css/style.css" rel="stylesheet" >
</head>
<body>
    @foreach ($specificCurrencyResponseBody as $response)
        @if ($response->code ?? null)
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
    @endforeach
    <div>
        <form action="{{ route('currency.show') }}" method="GET">
            <label for="currency">Selecione a moeda</label>   
            <select name="currency">
                @foreach ($allCurrenciesResponseBody as $response)
                    <option value= "{{ $response->code }}-{{ $response->codein }}">
                        <h6> {{ $response->name }} </h6>        
                    </option>
                @endforeach
            </select>
            <label for="days">Selecione o numero de dias</label> 
            <select name="days" type="number">                   
                <option>5</option>
                <option>15</option>                    
                <option>30</option>
            </select>
            <input type="submit" value="Filtrar">
        </form>
    </div>
    <div class="chart">
        <canvas id="myChart" width="400" height="400"></canvas>
        @yield('scripts')
    </div>
</body>
</html>
