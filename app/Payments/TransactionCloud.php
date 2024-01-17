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
        $url = "https://sandbox-api.transaction.cloud/v1/customize-product/TC-PR_1W33lq1";
        $curl = curl_init();

            curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => '{
                "prices": [{"currency": "USD", "value": ' . $body["amount"] . '.00}],
                "description": "' . $body["description"] . '",
                "payload": "payload example",
                "transactionIdToMigrate": "TC-TR_XXXYYZZ",
                "expiresIn": 3600,
                "userFirstName": "' . $body["firstName"] . '",
                "userLastName": "' . $body["lastName"] . '",
                "userMail": "' . $body["email"] . '"
            }'
            ,
            CURLOPT_HTTPHEADER => array(
                'Authorization: API_Z2GZL8U43NPQ3R4RRD:M9GTRYG70EHR72ECAZ',
                'Content-Type: application/json',
                'Cache-Control: no-cache'
            ),
            ));

            $response = curl_exec($curl);

            curl_close($curl);
            return json_decode($response, true)['link'];

    }

}
