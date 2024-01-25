<?php

namespace App\Geolocation;

class Geolocation
{
    private $cn;
    private $url;
    private $params;

    public function __construct()
    {
        $this->cn = array(
            "Content-Type: application/json"
        );
    }

    protected function curl($header, $url,  $param = false)
    {
        $curl = curl_init($url);

        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $header);

        //Turn off SSL Checker
        // curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, config('custom.curl.ssl'));

        if ($param) {
            curl_setopt($curl, CURLOPT_POST, true);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $param);
        }

        $curl_response = curl_exec($curl);
        curl_close($curl);
        $response = json_decode($curl_response, true);

        return $response;
    }

    /**
     * Gets Ip
     * @return string
     */
    public function getIP(): string
    {
        $ipaddress = '';
        if (getenv('HTTP_CLIENT_IP'))
            $ipaddress = getenv('HTTP_CLIENT_IP');
        else if (getenv('HTTP_X_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
        else if (getenv('HTTP_X_FORWARDED'))
            $ipaddress = getenv('HTTP_X_FORWARDED');
        else if (getenv('HTTP_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_FORWARDED_FOR');
        else if (getenv('HTTP_FORWARDED'))
            $ipaddress = getenv('HTTP_FORWARDED');
        else if (getenv('REMOTE_ADDR'))
            $ipaddress = getenv('REMOTE_ADDR');
        else
            $ipaddress = 'UNKNOWN';
        return $ipaddress;
    }

    /**
     * Gets airlines
     * @return mixed
     */
    public function getlocation(): object|array|string
    {
        // return $ip = ["ip" => "129.205.124.247", "city" => "Lagos", "region" => "Lagos", "country" => "NG", "loc" => "6.4541,3.3947", "org" => "AS328309 Globacom Limited", "timezone" => "Africa\/Lagos"];
        $this->url = config('geolocation.location.ip_info_url') . "/103.134.112.33?token=" . config('geolocation.location.ip_info_token');
        return $this->curl($this->cn, $this->url);
    }
}
