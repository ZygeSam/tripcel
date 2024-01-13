<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\EsimNetworkService;

class NetworkController extends Controller
{
    private $esimNetwork;
    private $networks;
    private $countries;

    public function __construct(EsimNetworkService $esimNetwork) {
        $this->esimNetwork = $esimNetwork;
        $this->networks = $this->getNetwork();
        $this->countries = $this->getNetwork();
        $this->countries = $this->getAllCountries();
    }

    public function getNetwork(){
        return collect($this->readApi("data/networks.json")['networks']);
        // return $this->esimNetwork->getEsimNetworkList();
    }

    public function getAllCountries(){
        return collect($this->readApi("data/countries.json"));
     }
    
    public function getCountryNetwork(Request $request){
        return redirect()->to($request['country']);
    }

    public function getNetworkByCountry($country=null){
        $countries = $this->countries;
        if($country){
            $networks =  $this->networks->filter(function($network) use($country){
                return $network['country_name'] == $country;
            });
            return view('pages.networks', compact('countries', 'networks'));
        }
        return view('pages.networks', compact('countries'));
        
    }

    public function readApi($filepath){
        $jsonString = file_get_contents($filepath, true);
        return  collect(json_decode($jsonString, true));
    }
}
