<?php
namespace App\Services;

use Illuminate\Support\Facades\Http;
use App\Traits\CurlableTrait;
use App\Services\EsimService;
use App\Services\ESimAuthService;

class EsimService
{
    use CurlableTrait;

    protected $url;
    protected $token;
    protected $header;
    protected $params;

    public function __construct(EsimAuthService $esimAuth) {
        $this->token = $esimAuth->getToken();
        $this->header = $esimAuth->getHeader();
        $this->params = [];
    }

    public function createEsim($request)
    {
       $this->params = [
            'tag'=> "",
            'region'=>$request //should be an ISO country code or "europe, apac or latam"
        ];
        $this->url = config('esim.maya-api.apiTestUrl')."/connectivity-api/207131856/connectivity/v1/esim";
        return $this->curl($this->header, $this->url, $this->params);
    }
    /**
     * Display a listing of the resource.
     */
    public function getAllProducts($country=null, $region=null)
    {
        $this->params = http_build_query(['country'=>$country, 'region'=>$region]);
        $this->url = config('esim.maya-api.apiLiveUrl')."/partners/v1/products?$this->params";
        return $this->curl($this->header, $this->url);
    }

    public function getAProduct(string $id)
    {
        $this->params = http_build_query(['id'=>$id]);
        $this->url = config('esim.maya-api.apiLiveUrl')."/partners/v1/product?$this->params";
        return $this->curl($this->header, $this->url);
    }
}