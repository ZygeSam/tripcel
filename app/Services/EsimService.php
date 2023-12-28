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
        // $this->url = config('esim.maya-api.apiLiveUrl')."/connectivity/v1/esim";
        $this->url = config('esim.maya-api.apiTestUrl')."/connectivity-api/207131856/connectivity/v1/esim";
        return $this->curl($this->header, $this->url, $this->params);
    }
    /**
     * Display a listing of the resource.
     */
    public function changeEsim(string  $esim) // curl update method
    {
        $this->params = http_build_query(['esim'=>$esim]);
        $this->url = config('esim.maya-api.apiTestUrl')."/connectivity-api/207131856/connectivity/v1/esim/$this->params";
        // $this->url = config('esim.maya-api.apiLiveUrl')."/connectivity/v1/esim/$this->params";
        return $this->curl($this->header, $this->url);
    }

    public function getEsim(string $esim)
    {
        $this->params = http_build_query(['esim'=>$esim]);
        $this->url = config('esim.maya-api.apiTestUrl')."/connectivity-api/207131856/connectivity/v1/esim/$this->params";
        // $this->url = config('esim.maya-api.apiLiveUrl')."/connectivity/v1/esim/$this->params";
        return $this->curl($this->header, $this->url);
    }

    public function getEsimPlans(string $esim)
    {
        // $esim ="8910300000004502204"; 
         $esim ="8910300000014471781";
         $esim = "8920400000006221468";
        $this->url = config('esim.maya-api.apiTestUrl')."/connectivity-api/207131856/connectivity/v1/esim/$esim/plans";
        // $this->url = config('esim.maya-api.apiLiveUrl')."/connectivity/v1/esim/$esim/plans";
        return $this->curl($this->header, $this->url);
    }

    public function getEsimRegions(string $esim)
    {
        $this->params = http_build_query(['esim'=>$esim]);
        $this->url = config('esim.maya-api.apiTestUrl')."/connectivity-api/207131856/connectivity/v1/esim/$this->params/regions";
        // $this->url = config('esim.maya-api.apiLiveUrl')."/connectivity/v1/esim/$this->params/regions";
        return $this->curl($this->header, $this->url);
    }

    public function deleteEsim(string $esim) //curl delete method
    {
        $this->params = http_build_query(['esim'=>$esim]);
        $this->url = config('esim.maya-api.apiTestUrl')."/connectivity-api/207131856/connectivity/v1/esim/$this->params";
        // $this->url = config('esim.maya-api.apiLiveUrl')."/connectivity/v1/esim/$this->params";
        return $this->curl($this->header, $this->url);
    }

    public function sendSms($request) //curl delete method
    {
        $this->params = [
            "iccid"=> $request['iccid'],
            "message"=> $request['message'],
            "sender_msisdn"=> $request['sender_msisdn']
        ];
        $this->url = config('esim.maya-api.apiTestUrl')."/connectivity-api/207131856/connectivity/v1/sms";
        // $this->url = config('esim.maya-api.apiLiveUrl')."/connectivity/v1/sms";
        return $this->curl($this->header, $this->url, $this->params);
    }
}