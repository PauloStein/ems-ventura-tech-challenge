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
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <script>
        var response = {!! json_encode($specificCurrencyResponseBody) !!};
        chart(response)        
    </script>
    @endsection
    <link href="css/style.css" rel="stylesheet" >
</head>
<body>
    <div class="card">
        <div class="card-info">
            *Dados de câmbio e de criptomoeda disponibilizados pela <a href="https://docs.awesomeapi.com.br/api-de-moedas">AwesomeAPI</a>            
        </div>
        <div class="currency-data">
            @foreach ($specificCurrencyResponseBody as $response)
                @if ($response->code ?? null)
                    <div>
                        1 {{$response->name}} igual a
                    </div>
                    <h1>
                        {{ number_format($response->bid, 2, ',', '.')}} Real <br> Brasileiro
                    </h1>
                    <div>
                        {{$response->create_date}}
                    </div>
                        <form action="{{ route('currency.show') }}" method="GET" class="currency-data-form">
                            <div>
                                <label for="currency">Selecione a moeda:</label>   
                                <select name="currency">
                                    @foreach ($allCurrenciesResponseBody as $response)
                                        <option value= "{{ $response->code }}-{{ $response->codein }}">
                                            <h6> {{ $response->name }} </h6>        
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <label for="days">Selecione o numero de dias:</label> 
                                <select name="days" type="number">                   
                                    <option>5</option>
                                    <option>15</option>                    
                                    <option>30</option>
                                    <option>45</option>
                                    <option>60</option>
                                </select>
                            </div>
                            <input type="submit" value="Filtrar" class="button">
                        </form>   
                @endif
            @endforeach
        </div>
        <div class="chart-style"> 
            <div class="chart">
                <canvas id="myChart" width="700" height="400"></canvas>
                @yield('scripts')
            </div>
        </div>
    </div>
</body>
</html>
