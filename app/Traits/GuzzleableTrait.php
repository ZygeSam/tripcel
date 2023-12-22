<?php

namespace App\Traits;
// Import Guzzle namespace
use GuzzleHttp\Client;



trait GuzzleableTrait
{
    /**
     * Make the Guzzle request
     * @param $url
     * @param bool $param
     * @return mixed
     */
    protected function guzzle_get($headers, $url, $param = [])
    {
        $client = new Client();

        $options = [
            'headers' => $headers,
            'query'   => $param,
        ];

        return $response = $client->request('GET', $url, $options);

        return $response->getBody()->getContents();
    }
}

