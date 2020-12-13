<?php

namespace App\Http\Adapters\Request;

use GuzzleHttp\Client;

use App\Http\Protocols\Request;

class GuzzleRequestAdapter implements Request
{
    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function get(string $url, array $options =  [ 'verify'  => false, ]) {
        $response = $this->client->request('GET', $url, $options);

        return $response;
    }
}