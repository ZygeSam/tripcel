<?php

namespace App\Traits;

trait FileGetContentWithHeadersTrait
{
    /**
     * Make the HTTP request using file_get_contents with headers
     *
     * @param string $url
     * @param array $headers
     * @return false|string
     */
    protected function fileGetContentWithHeaders($url, $headers)
    {
        // Create a stream context with custom headers
        $options = [
            'http' => [
                'header' => implode("\r\n", $headers),
            ],
        ];

        $context = stream_context_create($options);

        // Perform the HTTP request using file_get_contents
        $response = file_get_contents($url, false, $context);

        return json_decode($response, true);
    }
}