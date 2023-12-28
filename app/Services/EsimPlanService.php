<?php
namespace App\Services;

use Illuminate\Support\Facades\Http;
use App\Traits\CurlableTrait;
use App\Services\EsimService;
use App\Services\ESimAuthService;

class EsimPlanService
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

    public function createEsimPlan(string $esim, string $planType)
    {
       $esim = "8920400000006221468";
       $planType = "Gk3G2dyeaLTV";
       $this->params=['planType' => $planType];
       // $this->url = config('esim.maya-api.apiLiveUrl')."/connectivity/v1/esim/$esim/plan/$planType";
       $this->url = config('esim.maya-api.apiTestUrl')."/connectivity-api/207131856/connectivity/v1/esim/$esim/plan/$planType";
       return $this->curl($this->header, $this->url, $this->params);
    }

    public function refreshEsimPlan(string $esim, string $planType) //curl put method
    {
        $this->params = [];
        $this->url = config('esim.maya-api.apiTestUrl')."/connectivity-api/207131856/connectivity/v1/esim/$esim/plan/$planType";
        // $this->url = config('esim.maya-api.apiLiveUrl')."/connectivity/v1/esim/$esim/plan/$planType";
        return $this->curl($this->header, $this->url, $this->params);
    }

    public function getEsimPlan(string $esim, string $planType)
    {
        $this->url = config('esim.maya-api.apiTestUrl')."/connectivity-api/207131856/connectivity/v1/esim/$esim/plan/$planType";
        // $this->url = config('esim.maya-api.apiLiveUrl')."/connectivity/v1/esim/$esim/plan/$planType";
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