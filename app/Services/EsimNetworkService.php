<?php
namespace App\Services;

use Illuminate\Support\Facades\Http;
use App\Traits\CurlableTrait;
use App\Services\EsimService;
use App\Services\ESimAuthService;

class EsimNetworkService
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

    public function getEsimNetworkList() //curl put method
    {
        $this->params = [];
        $this->url = config('esim.maya-api.apiTestUrl')."/connectivity-api/207131856/connectivity/v1/account/networks";
        // $this->url = config('esim.maya-api.apiLiveUrl')."/connectivity/v1/account/networks";
        return $this->curl($this->header, $this->url);
    }

    public function getEsimPricingList()
    {
        $this->url = config('esim.maya-api.apiTestUrl')."/connectivity-api/207131856/connectivity/v1/account/pricing";
        // $this->url = config('esim.maya-api.apiLiveUrl')."/connectivity/v1/account/pricing";
        return $this->curl($this->header, $this->url);
    }

    public function deleteEsim(string $esim, string $planType) //curl delete method
    {
        $this->params = http_build_query(['esimPlanType'=>$esimPlanType]);
        $this->url = config('esim.maya-api.apiTestUrl')."/connectivity-api/207131856/connectivity/v1/esim/$esim/plan/$planType";
        // $this->url = config('esim.maya-api.apiLiveUrl')."/connectivity/v1/esim/$esim/plan/$planType";
        return $this->curl($this->header, $this->url);
    }
}