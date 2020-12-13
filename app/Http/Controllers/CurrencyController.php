<?php

namespace App\Http\Controllers;

use GuzzleHttp\Psr7;
use GuzzleHttp\Exception\RequestException;

use App\Http\Services\CurrencyService;

class CurrencyController extends Controller
{
    public function __construct(CurrencyService $currencyService)
    {
        $this->currencyService = $currencyService;
    }

    public function show()
    {
        try {
            $codeCurrency = isset($_GET['currency']) ? htmlspecialchars($_GET['currency']) : "USD-BRL";
            $daysChart = isset($_GET['days']) ? htmlspecialchars($_GET['days']) : "5";
            
            $allCurrenciesResponseBody = $this->currencyService->getCurrencies();
            $specificCurrencyResponseBody = $this->currencyService->getCurrencyChartData($codeCurrency, $daysChart);

            return view('currency-code', compact('specificCurrencyResponseBody', 'codeCurrency', 'allCurrenciesResponseBody'));
        } catch (RequestException $e) {
            echo Psr7\Message::toString($e->getRequest());
            if ($e->hasResponse()) {
                echo Psr7\Message::toString($e->getResponse());
            }
        }
    }
}