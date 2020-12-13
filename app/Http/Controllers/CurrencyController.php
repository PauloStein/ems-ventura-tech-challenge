<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Support\Facades\Cache;

class CurrencyController extends Controller
{
    public function show()
    {
        $client = new Client(); //GuzzleHttp\Client

        $codeCurrency = isset($_GET['currency']) ? htmlspecialchars($_GET['currency']) : "USD-BRL";
        $daysChart = isset($_GET['days']) ? htmlspecialchars($_GET['days']) : "5";

        $specificCurrencyUrl = "https://economia.awesomeapi.com.br/json/daily/" . $codeCurrency . "/" . $daysChart;
        $allCurrenciesUrl = "https://economia.awesomeapi.com.br/json/all";
        try {
            if (!Cache::has('allCurrencies')) {
                $allCurrenciesResponse = $client->request('GET', $allCurrenciesUrl, [
                    'verify'  => false,
                ]);
                Cache::put('key', json_decode($allCurrenciesResponse->getBody()), 3600);
            }
            $allCurrenciesResponseBody = Cache::get('key');

            $keySelectedCurrency = $codeCurrency . $daysChart;

            if (!Cache::has($keySelectedCurrency)) {
                $specificCurrencyResponse = $client->request('GET', $specificCurrencyUrl, [
                    'verify'  => false,
                ]);
                Cache::put($keySelectedCurrency, json_decode($specificCurrencyResponse->getBody()), 3600);
            }
            $specificCurrencyResponseBody = Cache::get($keySelectedCurrency);

            return view('currency-code', compact('specificCurrencyResponseBody', 'codeCurrency', 'allCurrenciesResponseBody'));
        } catch (RequestException $e) {
            echo Psr7\Message::toString($e->getRequest());
            if ($e->hasResponse()) {
                echo Psr7\Message::toString($e->getResponse());
            }
        }
    }
}
