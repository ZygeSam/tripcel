<?php

namespace App\Payments;



class PaymentProcessor
{
    public ?string $handler;

    public function checkHandler($handler)
    {
        $this->handler = $handler;

        switch ($handler) {
            case "Paystack":
                return $this->paystack();
        case "TransactionCloud":
                return $this->transactionCloud();
            default:
                # code...
                break;
        }
    }

    /**
     * Make the cURL call for Payment Gateways
     * @param $url
     * @param bool $param
     * @return mixed
     */
    protected function curl($headers, $url,  $param = false)
    {
        $header = $headers;
        $curl = curl_init($url);

        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $header);

        //Turn off SSL Checker
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, config('custom.curl.ssl'));
        
        if ($param) {
            curl_setopt($curl, CURLOPT_POST, true);
            curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($param));
        }

        $curl_response = curl_exec($curl);
        curl_close($curl);
        $response = json_decode($curl_response, true);

        return $response;
    }

    public function paystack()
    {
        return new Paystack();
    }

    public function transactionCloud()
    {
        return new TransactionCloud();
    }
}
