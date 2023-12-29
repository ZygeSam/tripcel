<?php
namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
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
    public function getAllProducts($country=null)
    {
        $this->params = http_build_query(['country'=>$country]);
        $this->url = config('esim.maya-api.apiLiveUrl')."/partners/v1/products?$this->params";
        // Attempt to retrieve products from cache first
        $cacheKey = 'esim_products_' . md5($this->url);
        $cachedProducts = Cache::remember($cacheKey, now()->addHours(1), function () {
            // Fetch products from API if not found in cache
            return $this->curl($this->header, $this->url);
        });

        return $cachedProducts;
    }

    public function getAllRegionProducts($region=null)
    {
        $this->params = http_build_query(['region'=>$region]);
        $this->url = config('esim.maya-api.apiLiveUrl')."/partners/v1/products?$this->params";
        // Attempt to retrieve products from cache first
        $cacheKey = 'esim_products_' . md5($this->url);
        $cachedProducts = Cache::remember($cacheKey, now()->addHours(1), function () {
            // Fetch products from API if not found in cache
            return $this->curl($this->header, $this->url);
        });

        return $cachedProducts;
        // return $this->curl($this->header, $this->url);
    }

    public function getAProduct(string $id)
    {
        $this->params = http_build_query(['id'=>$id]);
        $this->url = config('esim.maya-api.apiLiveUrl')."/partners/v1/product?$this->params";
        return $this->curl($this->header, $this->url);
    }
}