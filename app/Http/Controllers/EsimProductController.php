<?php

namespace App\Http\Controllers;

use App\Models\Esim;
use App\Models\User;
use App\Models\EsimOrders;
use Illuminate\Http\Request;
use App\Services\EsimService;
use App\Services\MailService;
use App\Services\EsimPlanService;
use App\Services\ESimProductService;
use App\Services\EsimPlanTypeService;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;
use App\Enums\TransactionStatus;
use App\Payments\PaymentProcessor;
use App\Http\Requests\StoreEsimBuyerRequest;
use App\Http\Controllers\QrCodeController;
use SimpleSoftwareIO\QrCode\Facades\QrCode;


class EsimProductController extends Controller
{
    private $esimProduct;
    private $delimiter;
    private $paymentProcessor;
    private $mailService;
    private $esimService;
    private $esimPlan;
    private $esimPlanType;
    private $qrCode;
    private $manager;
    private $products;
    private $countries;

    public function __construct(EsimPlanTypeService $esimPlanType, EsimPlanService $esimPlan, ESimProductService $esimProduct, PaymentProcessor $paymentProcessor, MailService $mailService, EsimService $esimService, QrCodeController $qrcode) {
        $this->esimProduct = $esimProduct;
        $this->esimService = $esimService;
        $this->delimiter ='-';
        $this->paymentProcessor = $paymentProcessor;
        $this->mailService = $mailService;
        $this->qrCode = $qrcode;
        $this->esimPlan = $esimPlan;
        $this->esimPlanType = $esimPlanType;
        $this->products = collect($this->getProducts());
        $this->countries = collect($this->getAllCountries());
    }
    
    public function getProducts(){
        return collect($this->readApi("data/products.json"));
    }

    public function getAllCountries(){
        return collect($this->readApi("data/countries.json"));
     }


    public function getPageCountries()
    {
        $cacheKey = 'page_countries';
        $countries = Cache::remember($cacheKey, now()->addHours(1), function () {
            return $this->countries->take(50)->toArray();
        });
        return response()->json($countries);
    }

    public function index(){
        $countries = $this->countries;
        return view('pages/index',compact('countries'));
    }

    public function readApi($filepath){
        $jsonString = file_get_contents($filepath, true);
        return  collect(json_decode($jsonString, true));
    }

    public function getCountries(){
        $countries = $this->countries;
        return view('pages/countries', compact('countries'));
    }

    public function showCountries(Request $request){
        return redirect()->to($request['country']);
    }

    public function getRegionProducts($region){
        $countries = $this->countries;
        $country = $this->countries->where('country_iso3', $region)->first();
        $fiveDaysProduct = $this->getProductDays($this->products, $country['country_name'], "- 5 days");
        $tenDaysProduct = $this->getProductDays($this->products, $country['country_name'], "- 10 days");
        $fifteenDaysProduct = $this->getProductDays($this->products, $country['country_name'], "- 15 days");
        $thirtyDaysProduct = $this->getProductDays($this->products, $country['country_name'], "- 30 days");
        $unlimitedLiteDaysProduct = $this->getProductDays($this->products, $country['country_name'], "- 5 days", true, 'Unlimited LITE');
        $unlimitedStandardDaysProduct = $this->getProductDays($this->products, $country['country_name'], "- 5 days", true, 'Unlimited STANDARD');
        $unlimitedMaxDaysProduct = $this->getProductDays($this->products, $country['country_name'], "- 5 days", true, 'Unlimited MA');
        return view('pages.regions', compact('country', 'countries', 'fiveDaysProduct', 'tenDaysProduct', 'fifteenDaysProduct', 'thirtyDaysProduct', 'unlimitedLiteDaysProduct', 'unlimitedStandardDaysProduct', 'unlimitedMaxDaysProduct'));
    }

    public function getProductDays($products, $country, $days="- 5 days", $unlimited = false, $unlimitedPlan='Unlimited LITE'){
        return $products->filter(function ($product) use ($country, $unlimited, $days, $unlimitedPlan) {
            if ($product['country_name'] === $country) {
                $productName = $product['name'];
                if($unlimited){
                    return strpos($productName, $unlimitedPlan) !== false && stripos($productName, $days) !== false;
                }
                return strpos($productName, 'Unlimited') === false && stripos($productName, $days) !== false;
            }
        })->sortBy('data_gb')->values()->all();
    }

    public function getCountryProducts($country){
       $countries = $this->countries;
       $country = $this->countries->where('country_name', $country)->first();
       $fiveDaysProduct = $this->getProductDays($this->products, $country['country_name'], "- 5 days");
       $tenDaysProduct = $this->getProductDays($this->products, $country['country_name'], "- 10 days");
       $fifteenDaysProduct = $this->getProductDays($this->products, $country['country_name'], "- 15 days");
       $thirtyDaysProduct = $this->getProductDays($this->products, $country['country_name'], "- 30 days");
       $unlimitedLiteDaysProduct = $this->getProductDays($this->products, $country['country_name'], "- 5 days", true, 'Unlimited LITE');
       $unlimitedStandardDaysProduct = $this->getProductDays($this->products, $country['country_name'], "- 5 days", true, 'Unlimited STANDARD');
       $unlimitedMaxDaysProduct = $this->getProductDays($this->products, $country['country_name'], "- 5 days", true, 'Unlimited MA');
    
       return view('pages.country', compact('country', 'countries', 'fiveDaysProduct', 'tenDaysProduct', 'fifteenDaysProduct', 'thirtyDaysProduct', 'unlimitedLiteDaysProduct', 'unlimitedStandardDaysProduct', 'unlimitedMaxDaysProduct'));
    }

    /**
     * Display the specified resource.
     */
    public function show($esimProduct)
    {
        return $this->esimProduct->getAProduct($esimProduct);
    }
    public function showCart(){
        $cart = session()->get('cart');
        if(is_null($cart)){
            $cart['products']= [];
        }
        //display cart on view
        $totalPrice = $this->cartTotal($cart);
        return view('pages/cart', compact('cart','totalPrice'));
    }
    public function removeFromCart($request){
        $cart = session()->get('cart');
        $cart['products'] = collect($cart['products'])->filter(function ($product) use ($request) {
            return $product[0]['id'] !== $request;
        })->values()->all();
        session()->put('cart', $cart);
        $totalPrice = $this->cartTotal($cart);
        //display cart on view
        return view('pages/cart', compact('cart', 'totalPrice'));
    }

    public function removeFromCartIcon($request){
        $cart = session()->get('cart');
        $cart['products'] = collect($cart['products'])->filter(function ($product) use ($request) {
            return $product[0]['id'] !== $request;
        })->values()->all();
        session()->put('cart', $cart);
        $totalPrice = $this->cartTotal($cart);
        //display cart on view
        return back();
    }

    public function addToCart($country, $esimProduct){
        $cart = session()->get('cart', ['products' => []]);
        $cart['products'][]= $this->show($esimProduct)['product'];
        session()->put('cart', $cart);
        $totalPrice = $this->cartTotal($cart);
        //display cart on view
        return view('pages/cart', compact('cart','totalPrice'));
    }

    //function to calculate total of products in cart
    public function cartTotal($cart){
        $totalPrice = 0;
        if(is_null($cart)){
            return $totalPrice;
        }
        foreach ($cart['products'] as $product) {
            $totalPrice += $product[0]['price_usd'];
        }
        return $totalPrice;
    }
    
    public function checkout(){
        $cart = session()->get('cart', ['products' => []]);
        $totalPrice = $this->cartTotal($cart);
        return view('pages/checkout', compact('cart', 'totalPrice'));
    }

    public function buyProduct(StoreEsimBuyerRequest $request){
        $request->validated();
        if(auth()->user()){
            $user = auth()->user();
        }else{
            $user = User::where('email', $request['email'])->first();
            if(!$user){
                $user =  User::create($request->all());
            }
        }
        $data = $user;
        //set request parameters
        $data['amount'] =$this->cartTotal(session()->get('cart'));
        $data['currency'] ="NGN";
        $data['transaction_id'] ="TRC".strtotime('now');
        $data['description'] = "Purchase Esim";
        $data['redirect_url'] = route('confirmPayment', ['transactionId'=> $data['transaction_id'], 'gateway' => $request['payment_gateway'], 'email'=>$user['email']]);
    
        // save transaction to database
        $response = $this->paymentProcessor->checkHandler($request['payment_gateway'])->initialize($data);
        return redirect()->to($response);

    }
    public function confirmPayment($gateway, $transactionId, $email){
        $cartedProducts = session()->get('cart');
        $user = User::where('email', $email)->first();
        $products = $this->products;
        $countries = $this->countries;
        $totalPrice = $this->cartTotal($cartedProducts);
        $response = $this->paymentProcessor->checkHandler($gateway)->verify_transaction();
        if($response['status'] == true){
                $createdProfile=[];
                $esims = [];
                $eSimOrders = [];
                $createdSimPlans = [];
                foreach($cartedProducts['products'] as $key=> $prod){
                    // save esim to esim database for user
                   $createdSim = $this->esimService->createEsim($prod[0]['country_iso2']);
                   $createdSimPlan = $this->esimPlan->createEsimPlan($createdSim['esim']['iccid'], $prod[0]['id']);
                   $esims[] = [
                    'eSimCountryIso2' => $prod[0]['country_iso2'],
                    'eSimCountryIso3' => $prod[0]['country_iso3'],
                    'eSimCountryName' => $prod[0]['country_name'],
                    'esimIccid' => $createdSim['esim']['iccid'],
                    "eSimState" => $createdSim['esim']['state'],
                    "eSimManualCode" => $createdSim['esim']['manual_code'],
                    "eSimDateAssigned" => $createdSim['esim']['date_assigned'],
                    "eSimNetworkStatus" => $createdSim['esim']['network_status'],
                    "eSimActivationCode" => $createdSim['esim']['activation_code'],
                    "user_id" => $user['id'],
                ];
                
                    $eSimOrders[] = [
                        'transactionId' => $transactionId,
                        'user_id' => $user['id'],
                        'eSimIccId' => $createdSim['esim']['iccid'],
                        'eSimProductId' => $prod[0]['id'],
                        'eSimPlanName' => $prod[0]['name'],
                        'unlimitedData' => $prod[0]['unlimited_data'],
                        'planType' => $prod[0]['plan_type'],
                        'price' => $prod[0]['price'],
                        'currrency' => $prod[0]['currency'],
                        'countries_enabled'=>implode(',', $createdSimPlan['plan']['countries_enabled']),
                        'planId' => $createdSimPlan['plan']['id'],
                        'purchasedData' => $createdSimPlan['plan']['data_quota_bytes'],
                        'dataStartTime' => $createdSimPlan['plan']['start_time'],
                        'dataEndTime'=>$createdSimPlan['plan']['end_time'],
                        'network_status' => $createdSimPlan['plan']['network_status'],
                        'paymentChannel' => $gateway,
                    ];
                    $createdSimPlan['country'] = $prod[0]['country_name'];
                    $createdSimPlans[] = $createdSimPlan;
                    // generate qrCode file name
                   $qrFIleName =  $user['firstName']. $user['lastName'].$key;

                    // generate the qrCodes
                   $createdProfile[] = $this->generateCodeMessage(
                        $this->qrCode->generateCode(
                            $createdSim['esim']['activation_code']), $qrFIleName);
                }
                // Bulk insert into the database
                Esim::insert($esims);
                EsimOrders::insert($eSimOrders);
                    // mail tthe qr codes
                if($this->mailService->sendPurchaseInfo( $user, 'Thank you for your Purchase, Activate Your ESim', $createdProfile)){
                    $sentMail = $this->mailService->sendDataPurchaseInfo( $user['email'], 'Thank you for your Purchase', $createdSimPlans);
                    if($sentMail){
                        $message = "Payment Success";
                    }
                }
        }else{
            $message = "Payment Failed";
        }
        return view('pages/confirmPayment', compact('message', 'countries', 'products', 'totalPrice'));
        
    }

    public function generateCodeMessage($qrCode, $qrFIleName){
            $file_path = "public/img/$qrFIleName.png";
            
            $filePath = Storage::put($file_path, $qrCode);
            $qrCodePath = Storage::url($file_path);
            return $qrCodePath;
    }
    
    

}
