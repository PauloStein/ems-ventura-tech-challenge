<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;

class CurrencyController extends Controller
{
    public function currency()
    {
        $client = new Client(); //GuzzleHttp\Client
        
        $url = "https://economia.awesomeapi.com.br/json/all";

        $response = $client->request('GET', $url, [
            'verify'  => false,
        ]);

        $responseBody = json_decode($response->getBody());

        return view('currency', compact('responseBody'));
    }

    public function show()
    {
        $client = new Client(); //GuzzleHttp\Client
        $codeCurrency = htmlspecialchars($_POST['currency']);
        $daysChart = htmlspecialchars($_POST['days']);

        $url = "https://economia.awesomeapi.com.br/json/daily/" . $codeCurrency . "-BRL/" . $daysChart;
        $url2 = "https://economia.awesomeapi.com.br/json/all";
        $response2 = $client->request('GET', $url2, [
            'verify'  => false,
        ]);
        $responseBody2 = json_decode($response2->getBody());

        $response = $client->request('GET', $url, [
            'verify'  => false,
        ]);

        $responseBody = json_decode($response->getBody());
        return view('currency-code', compact('responseBody', 'codeCurrency','responseBody2'));
    }
}