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
    return [
        'Authorization: Basic ' . $this->getToken(),
        'Content-Type: application/json', // Set the content type based on your API requirements
    ];
 }

    public function getToken(){
        return  base64_encode(config('esim.maya-api.apiKey') . ':' .config('esim.maya-api.apiSecret'));
    }
    
}