<?php

namespace App\Http\Services;

use GuzzleHttp\Client;

class RequestService 
{
    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function get(string $url, array $options = [ 'verify'  => false, ]) {
        $response = $this->client->request('GET', $url, $options);

        return $response;
    }
}