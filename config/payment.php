<?php
return[
    "paystack"=>[
        "paystack_secret_key" => env('PAYSTACK_TEST_SK', null),
    ],
    "transaction-cloud"=>[
        "apiLogin" => env('TRANSACTION_CLOUD_API_LOGIN', null),
        "apiPassword" => env('TRANSACTION_CLOUD_API_PASSWORD', null),
    ]
];