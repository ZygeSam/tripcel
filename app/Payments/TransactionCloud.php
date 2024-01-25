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

    public function webhook($body){
        if ($body->getMethod() !== 'POST' ) {
            abort(403, 'Invalid request');
        }
        // Expected IP address
        $expectedIp = '127.0.0.1';
        
        // Webhook Security Tag
        $expectedSecurityTag = '3EH3DD2RIBGXS3BFKY';
        
        // Verify the IP address
        $clientIp = $_SERVER['REMOTE_ADDR'];
        if ($clientIp !== $expectedIp) {
            http_response_code(401);
            die('Unauthorized - Invalid IP');
        }
       
        // Verify the Webhook Security Tag
        // $securityTag = isset($_SERVER['HTTP_X_TC_SECURITY_TAG']) ? $_SERVER['HTTP_X_TC_SECURITY_TAG'] : null;
        // if ($securityTag !== $expectedSecurityTag) {
        //     http_response_code(401);
        //     die('Unauthorized - Invalid Security Tag');
        // }
        
        // Retrieve the webhook payload
        $requestBody = file_get_contents('php://input');
        $payload = json_decode($requestBody, true);
        
        // Check if the required fields are present in the payload
        if (
            !isset($payload['webhookId']) ||
            !isset($payload['webhookType']) ||
            !isset($payload['transactionId']) ||
            !isset($payload['transactionType']) ||
            !isset($payload['createDate']) ||
            !isset($payload['productId']) ||
            !isset($payload['productName']) ||
            !isset($payload['firstName']) ||
            !isset($payload['lastName']) ||
            !isset($payload['email']) ||
            !isset($payload['country']) ||
            !isset($payload['eventId']) ||
            !isset($payload['currency']) ||
            !isset($payload['amountTotal']) ||
            !isset($payload['taxAmount']) ||
            !isset($payload['income']) ||
            !isset($payload['taxRate']) ||
            !isset($payload['affiliateCommission']) ||
            !isset($payload['affiliateCommissionCurrency'])
        ) {
            http_response_code(400);
            die('Invalid payload');
        }
        
        // Now you can proceed to handle the webhook payload
        // ...
        
        // Respond with a success message if needed
        echo 'Webhook received successfully';
        
    }

}
