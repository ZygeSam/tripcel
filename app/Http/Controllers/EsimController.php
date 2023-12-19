<?php

namespace App\Http\Controllers;
use App\Services\ESimAuthService;
use App\Services\EsimService;
use App\Traits\CurlableTrait;
use Illuminate\Http\Request;
use App\Http\Requests\StoreEsimRequest;
use App\Http\Requests\UpdateEsimRequest;
use App\Http\Requsts\SendEsimSmsRequest;

class EsimController extends Controller
{
    use CurlableTrait;

    protected $url;
    protected $token;
    protected $header;
    protected $params;

    public function __construct(EsimAuthService $esimAuth, EsimService $esimService) {
        $this->token = $esimAuth->getToken();
        $this->header = $esimAuth->getHeader();
        $this->params = [];
        $this->esimService = $esimService;
    }

    /**
     * Get eSim Plans.
     */
    public function index(string $esim)
    {
        $request->validated();
        $this->url = config('esim.maya-api.apiTestUrl')."/connectivity-api/207131856/connectivity/v1/esim/$esim/plans";
        return $this->curl($this->header, $this->url);
    }

    public function getEsimRegions(string $esim)
    {
        $request->validated();
        $this->url = config('esim.maya-api.apiTestUrl')."/connectivity-api/207131856/connectivity/v1/esim/$esim/regions";
        return $this->curl($this->header, $this->url);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Create ESim
     */
    public function store(StoreEsimRequest $request)
    {
        $request->validated();
        return $this->esimService->createEsim($request);
    }

    /**
     * Send ESim SMS
     */
    public function sendSMS(StoreEsimRequest $request)
    {
        $request->validated();
        $this->params = [
            "iccid"=> $request->input("iccid"),
            "message"=> $request->input("message"),
            "sender_msisdn"=> $request->input("sender_msisdn")
        ];
        $this->url = config('esim.maya-api.apiTestUrl')."/connectivity-api/207131856/connectivity/v1/sms";
        return $this->curl($this->header, $this->url, $this->params);
    }

    /**
     * Get current eSIM status
     */
    public function show(string $esim)
    {
        $request->validated();
        $this->url = config('esim.maya-api.apiTestUrl')."/connectivity-api/207131856/connectivity/v1/esim/$esim";
        return $this->curl($this->header, $this->url);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Change ESIm:
     * Suspend or activate the eSIM's network access.
     */
    public function update(Request $request, string $esim)
    {
        $request->validated();
        $this->params = [
            'network_status'=>$request->input('network_status'),
        ];
        $this->url = config('esim.maya-api.apiTestUrl')."/connectivity-api/207131856/connectivity/v1/esim/$esim";
        return $this->curl($this->header, $this->url, $this->params);
    }

    /**
     * Delete an eSIM from the distributor account. 
     * This will immediately terminate any Data Plans attached to the eSIM, 
     * and suspend network access.
     */
    public function destroy(string $id)
    {
        $request->validated();
        $this->url = config('esim.maya-api.apiTestUrl')."/connectivity-api/207131856/connectivity/v1/esim/$esim";
        return $this->curl($this->header, $this->url);
    }
}
