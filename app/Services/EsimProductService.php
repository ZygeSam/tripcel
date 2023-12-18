<?php
namespace App\Services;

use Illuminate\Support\Facades\Http;
use App\Traits\CurlableTrait;
use App\Services\ESimAuthService;

class ESimProductService
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