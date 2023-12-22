<?php

namespace App\Payments;

use Illuminate\Support\Facades\Redirect;
use App\Traits\CurlableTrait;

class TransactionCloud
{
    use CurlableTrait;

    private $apiLogin;
    private $apiPassword;
    private $header;

    public function __construct()
    {
        $this->apiLogin = config('payment.transaction-cloud.apiLogin');
        $this->apiPassword = config('payment.transaction-cloud.apiPassword');
        $this->header = array(
            "Authorization: $this->apiLogin:$this->apiPassword",
            "Content-type: application/json",
            "Cache-control: no-cache"
        );
    }


    /**
     * Initialize the paystack API
     * @param $body (array required: first_name, last_name, reference, email, amount, callback_url) Amount should be kobo
     * @return string
     */
    public function initialize($body)
    {
        $url = "https://sandbox-api.transaction.cloud/v1/customize-product/TC-PR_yyyyxxxx";
        $data = [
            "prices" => [
                [
                    "currency" => 'USD',
                    "value" => $body['amount'].'.00'
                ]
            ],
            "description" => "description of customized product",
            "payload" => "payload example",
            "transactionIdToMigrate" => $body['transaction_id'],
            "expiresIn" => 3600,
            "userFirstName" => $body["firstName"],
            "userLastName" => $body["lastName"],
            "userMail" => $body['email']
        ];

        // Make the cURL request
        return $this->curl($this->header, $url, $data);
        return redirect()->to($this->curl($this->header, $url));
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
