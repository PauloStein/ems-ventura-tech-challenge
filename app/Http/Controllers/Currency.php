<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;

class Currency extends Controller
{
    public function currency()
    {
        $client = new Client(); //GuzzleHttp\Client
        $url = "https://economia.awesomeapi.com.br/json/all";


        $response = $client->request('GET', $url, [
            'verify'  => false,
        ]);

        $responseBody = json_decode($response->getBody());

        return view('projects.currency', compact('responseBody'));
    }
}