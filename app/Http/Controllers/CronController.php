<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\EsimPlanTypeService;

class CronController extends Controller
{
    protected $esimPlanType;

    public function __construct(EsimPlanTypeService $esimPlanType) {
        $this->esimPlanType = $esimPlanType;
    }

    public function getEsimPlans(){
        return $this->esimPlanType->getEsimPlanTypes();
    }
}
