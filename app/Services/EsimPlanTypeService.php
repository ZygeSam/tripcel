<?php
namespace App\Services;

use Illuminate\Support\Facades\Http;
use App\Traits\CurlableTrait;
use App\Services\EsimService;
use App\Services\ESimAuthService;

class EsimPlanTypeService
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

    public function createEsimPlanType($request)
    {
       $this->params = [
            'name'=> $request['name'],
            "policy_id"=> $request['policy_id'],
            "data_quota_mb"=> $request['data_quota_mb'],
            "validity_days"=> $request['validity_days'],
            "countries_enabled"=> $request['countries_enabled']
        ];
        // $this->url = config('esim.maya-api.apiLiveUrl')."/connectivity/v1/plan-type";
        $this->url = config('esim.maya-api.apiTestUrl')."/connectivity-api/207131856/connectivity/v1/plan-type";
        return $this->curl($this->header, $this->url, $this->params);
    }

    public function getEsimPlanType(string $esimPlanType)
    {
        $this->params = http_build_query(['esimPlanType'=>$esimPlanType]);
        $this->url = config('esim.maya-api.apiTestUrl')."/connectivity-api/207131856/connectivity/v1/plan-type/$this->params";
        // $this->url = config('esim.maya-api.apiLiveUrl')."/connectivity/v1/plan-type/$this->params";
        return $this->curl($this->header, $this->url);
    }

    public function getEsimPlanTypes()
    {
        // $this->url = config('esim.maya-api.apiTestUrl')."/connectivity-api/207131856/connectivity/v1/account/plan-types";
        $this->url = config('esim.maya-api.apiLiveUrl')."/connectivity/v1/account/plan-types";
        return $this->curl($this->header, $this->url);
    }

    public function getEsimRegions(string $esim) //curl delete method
    {
        $this->params = http_build_query(['esim'=>$esim]);
        $this->url = config('esim.maya-api.apiTestUrl')."/connectivity-api/207131856/connectivity/v1/plan-type/$this->params";
        // $this->url = config('esim.maya-api.apiLiveUrl')."/connectivity/v1/plan-type/$this->params";
        return $this->curl($this->header, $this->url);
    }

    public function deleteEsim(string $esimPlanType) //curl delete method
    {
        $this->params = http_build_query(['esimPlanType'=>$esimPlanType]);
        $this->url = config('esim.maya-api.apiTestUrl')."/connectivity-api/207131856/connectivity/v1/esim/$this->params";
        // $this->url = config('esim.maya-api.apiLiveUrl')."/connectivity/v1/esim/$this->params";
        return $this->curl($this->header, $this->url);
    }
}