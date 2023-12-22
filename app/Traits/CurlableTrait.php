<?php

namespace App\Traits;

trait CurlableTrait
{
    /**
     * Make the cURL request
     * @param $url
     * @param bool $param
     * @return mixed
     */
    protected function curl($headers, $url,  $param = false)
    {
        $url = trim($url);
        $curl = curl_init($url);

        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

        //Turn off SSL Checker
        // curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, config('custom.curl.ssl'));

        if ($param) {
            curl_setopt($curl, CURLOPT_POST, true);
            curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($param));
        }

        $curl_response = curl_exec($curl);
        curl_close($curl);
        $response = json_decode($curl_response, true);

        return $response;

        //Implementation from postman
        // $url = trim($url);
        // $curl = curl_init();

        // curl_setopt_array($curl, array(
        // CURLOPT_URL => $url,
        // CURLOPT_RETURNTRANSFER => true,
        // CURLOPT_ENCODING => '',
        // CURLOPT_MAXREDIRS => 10,
        // CURLOPT_TIMEOUT => 0,
        // CURLOPT_FOLLOWLOCATION => true,
        // CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        // CURLOPT_CUSTOMREQUEST => 'GET',
        // CURLOPT_HTTPHEADER => $headers,
        // ));

        // $response = curl_exec($curl);

        // curl_close($curl);
        // return  json_decode($response);
    }
}
