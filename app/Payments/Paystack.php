<?php

namespace App\Payments;

use Illuminate\Support\Facades\Redirect;

class Paystack
{

    private $sk_paystack;
    private $header;

    public function __construct()
    {
        $this->sk_paystack = config('payment.paystack.paystack_secret_key');
        $this->header = array(
            "Authorization: Bearer " . $this->sk_paystack,
            "Content-type: application/json",
            "Cache-control: no-cache"
        );
    }

    protected function curl($header, $url,  $param = false)
    {
        $header = $this->header;
        $curl = curl_init($url);

        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $header);

        //Turn off SSL Checker
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, config('custom.curl.ssl'));

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
     * Initialize the paystack API
     * @param $body (array required: first_name, last_name, reference, email, amount, callback_url) Amount should be kobo
     * @return string
     */
    public function initialize($body)
    {
        $url = "https://api.paystack.co/transaction/initialize";
        $data = [
            "email" => $body['email'],
            "amount" => $body['amount'] * 100,
            "currency" => $body['currency'],
            "ref" => $body['transaction_id'],
            "callback_url" => $body['redirect_url'],
        ];

        if ($response = $this->curl($this->header, $url, json_encode($data))) {
            if ($response['status'] = "true") {
                return $response['data']['authorization_url'];
            } else {
                http_response_code(400);
                return response()->json(
                    [
                        'status' => false,
                        'statusCode' => http_response_code(400),
                        'message' => 'Cannot process transaction',
                        'data' => []
                    ]
                );
            }
        } else {
            http_response_code(400);
            return response()->json(
                [
                    'status' => false,
                    'statusCode' => http_response_code(400),
                    'message' => "Operation failed",
                    'data' => null
                ]
            );
        }
    }


    public function verify_transaction()
    {
        $ref =  $_GET['reference'];
        $url = "https://api.paystack.co/transaction/verify/" . rawurlencode($ref);
        return $response = $this->curl($this->header,  $url);
    }

    public function resolve_account_number($body)
    {
        $account_number = $body['account_number'];
        $account_bank = $body['bank_code'];

        $url = "https://api.paystack.co/bank/resolve?account_number=$account_number&bank_code=$account_bank";

        $response = $this->curl($this->header, $url);

        if ($response['status'] == true) {
            return $response['data']['account_name'];
        } else {
            http_response_code(400);
            return response()->json([
                'status' => false,
                'statusCode' => http_response_code(400),
                'message' => "Could not verify bank account",
                'data' => []
            ]);;
        }
    }

    /**
     * Get details of the supplied bank verification number, BVN
     * @param $ref
     * @return bool|mixed
     */
    public function resolve_bvn($ref)
    {
        $url = "https://api.paystack.co/bank/resolve_bvn/" . rawurlencode($ref);
        $response = $this->curl($this->header, $this->sk_paystack, $url);

        if ($response['status'] == true) {
            return $response;
        } else {
            return false;
        }
    }
}
