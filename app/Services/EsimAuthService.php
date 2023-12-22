<?php
namespace App\Services;

use Illuminate\Support\Facades\Http;
use App\Traits\CurlableTrait;

class ESimAuthService
{
    use CurlableTrait;
    private $expiry;

    public function __construct() {
        
    }
    public function getHeader(){
        return array(
            'Accept: application/json',
            'Content-Type: application/json',
            'Authorization: Basic '.$this->getToken()
        );
    }

    public function getToken(){
        return  base64_encode(config('esim.maya-api.apiKey') . ':' .config('esim.maya-api.apiSecret'));
    }
    
}