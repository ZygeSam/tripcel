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
use Illuminate\Support\Facades\URL;
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
    private $pricing;

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
        $this->pricing = collect($this->getProductsPrice());
        $this->countries = collect($this->getAllCountries());
    }
    
    public function getProducts(){
        // return $this->esimPlanType->getEsimPlanTypes()['plan_types'];
        return $this->readApi("data/products.json");
    }

    public function getProductsPrice(){
        // return $this->esimPlanType->getEsimPlanTypes()['plan_types'];
        return $this->readApi("data/productsPrice.json");
    }

    public function getAllCountries(){
        $productsPrice =  collect($this->readApi("data/productsPrice.json"));
        return  $productsPrice ->map(function($item){
                return [
                    "country_iso2" => $item['ISO2'],
                    "country_iso3" => $item['ISO3'],
                    "country_name" => $item['Region'],
                ];
        })->unique()->values()->all();
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

    public function byte_format($bytes) {
        return ($bytes/1024);
    }
    
    public function getRegionProductDays($region, $days=5, $unlimited = false, $unlimitedPlan='Unlimited LITE'){
        $price = $this->pricing->filter(function($productPrice) use ($region){
            switch ($region) {
                case 'Asia':
                    return $productPrice['ISO3'] === "CHN";
                    break;

                case 'South America':
                    return $productPrice['ISO3'] === "BOL";
                    break;

                case 'Europe':
                    return $productPrice['ISO3'] === "AUT";
                    break;
                
                case 'Caribbean':
                    return $productPrice['ISO3'] === "JAM";
                    break;
                
                default:
                    # code...
                    break;
            }
        })->values()->all();

        return $this->products->filter(function($product) use ($region, $days){
            if($product['validity_days'] === $days){
                return strpos($product['name'], $region) !== false;
            }
            
        })->map(function($product) use($price){
            $product['price_usd'] = ceil(($price[0]['PricePerMB']*$product['data_quota_mb']) + ($product['validity_days']*$price[0]['CommPerDay']) + $price[0]['FlatComm']);
            $product['data_quota_mb']=ceil($product['data_quota_mb']/1024);
            return $product;
        })->unique('data_quota_mb')->sortBy('data_quota_mb')->values()->all();
    }
    public function getProductDays($country, $days=5, $unlimited = false, $unlimitedPlan='Unlimited LITE'){
        $price = $this->pricing->filter(function($productPrice) use ($country){
            return $productPrice['ISO3'] === $country;
        })->values()->all();
        
        return $this->products->filter(function ($product) use ($country, $unlimited, $days, $unlimitedPlan) {
            if($product['validity_days'] === $days){
                return in_array($country, $product['countries_enabled']);
            }
        })->map(function($product) use($price){
            $product['price_usd'] = ceil(($price[0]['PricePerMB']*$product['data_quota_mb']) + ($product['validity_days']*$price[0]['CommPerDay']) + $price[0]['FlatComm']);
            $product['data_quota_mb']=ceil($product['data_quota_mb']/1024);
            return $product;
        })->unique('data_quota_mb')->sortBy('data_quota_mb')->values()->all();
    }

    public function checkPrice($array, $price){
        $modifiedProducts = $array->map(function($product) use($price){
            $product['price_usd'] = ceil(($price[0]['PricePerMB']*$product['data_quota_mb']) + ($product['validity_days']*$price[0]['CommPerDay']) + $price[0]['FlatComm']);
            $product['data_quota_mb'] = ceil($product['data_quota_mb']/1024);
            return $product;
        })->unique('data_quota_mb')->sortBy('data_quota_mb')->values();
        return $modifiedProducts;
    }

    public function getRegionProducts($region){
        $countries = $this->countries;
        $fiveDaysProduct = $this->getRegionProductDays($region, 5);
        $tenDaysProduct = $this->getRegionProductDays($region, 10);
        $fifteenDaysProduct = $this->getRegionProductDays($region, 15);
        $thirtyDaysProduct = $this->getRegionProductDays($region, 30);
        $unlimitedLiteDaysProduct = $this->getRegionProductDays($region, 5, true, 'Unlimited LITE');
        $unlimitedStandardDaysProduct = $this->getRegionProductDays($region, 5, true, 'Unlimited STANDARD');
        $unlimitedMaxDaysProduct = $this->getRegionProductDays($region, 5, true, 'Unlimited MAX');
        return view('pages.regions', compact('region', 'countries', 'fiveDaysProduct', 'tenDaysProduct', 'fifteenDaysProduct', 'thirtyDaysProduct', 'unlimitedLiteDaysProduct', 'unlimitedStandardDaysProduct', 'unlimitedMaxDaysProduct'));
    }

    public function getCountryProducts($country){
       $countries = $this->countries;
       $country = $this->countries->where('country_name', $country)->first();
       $fiveDaysProduct = $this->getProductDays($country['country_iso3'], 5);
       $tenDaysProduct = $this->getProductDays($country['country_iso3'], 10);
       $fifteenDaysProduct = $this->getProductDays($country['country_iso3'], 15);
       $thirtyDaysProduct = $this->getProductDays($country['country_iso3'], 30);
       $unlimitedLiteDaysProduct = $this->getProductDays($country['country_iso3'], 5, true, 'Unlimited LITE');
       $unlimitedStandardDaysProduct = $this->getProductDays($country['country_iso3'], 5, true, 'Unlimited STANDARD');
       $unlimitedMaxDaysProduct = $this->getProductDays($country['country_iso3'], 5, true, 'Unlimited MAX');
    
       return view('pages.country', compact('country', 'countries', 'fiveDaysProduct', 'tenDaysProduct', 'fifteenDaysProduct', 'thirtyDaysProduct', 'unlimitedLiteDaysProduct', 'unlimitedStandardDaysProduct', 'unlimitedMaxDaysProduct'));
    }

    /**
     * Display the specified resource.
     */
    public function show($esimProduct)
    {
        return collect($this->products->filter(function($product) use ($esimProduct){
            return $product['id'] === $esimProduct;
        }))->values()->all();
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
        $cart['products'][]= $this->show($esimProduct);
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

    public function productDescription($cart){
        $description ="";
        if(is_null($cart)){
            return $description;
        }
        foreach ($cart['products'] as $product) {
            $description .= $product[0]['name'] ." \t";
        }
        return $description;
    }

    public function checkUser($request){
        $user = User::where('email', $request['email'])->exists();
        if ($user) {
            User::whereNotNull('email_verified_at');
        }else{
            $user =  User::create($request->all());
        }
    }

    public function makeTransaction($data){
        $data['amount'] = $this->cartTotal(session()->get('cart'));
        $data['currency'] = "USD";
        $data['transaction_id'] = "TRC".strtotime('now');
        $data['description'] = $this->productDescription(session()->get('cart'));
        $data['redirect_url'] = route('confirmPayment', ['transactionId'=> $data['transaction_id'], 'gateway' => $data['payment_gateway'], 'email'=>$data['email']]);
        return $response = $this->paymentProcessor->checkHandler($data['payment_gateway'])->initialize($data);
    }

    public function verifyEmail($email, $gateway){
        $user = User::where('email', $email)->update(['email_verified_at'=> now()]);
        $data =  User::where('email', $email)->first();
        $data['payment_gateway'] = $gateway;
        return redirect()->to($this->makeTransaction($data));
    }

    public function buyProduct(StoreEsimBuyerRequest $request){
        $request->validated();
        if(auth()->user()){
            $data = auth()->user();
            $data['payment_gateway'] = $request['payment_gateway'];
            return redirect()->to($this->makeTransaction($data));
        }

        $user_exists = User::where('email', $request['email'])->exists();
        if ($user_exists) {
            $data = User::where('email', $request['email'])->first();
            if( User::whereNotNull('email_verified_at')->exists() == false){
                $verifyEmailUrl = $this->emailVerificationLink($data->email, $request['payment_gateway']);
                $sentMail = $this->mailService->sendEmailVerification($data->email, $verifyEmailUrl);
                if($sentMail){
                    $message = "Kindly Check your inbox to verify your email and proceed to continue purchase";
                }
                return back()->with('message', $message);
            }else{
                $data['payment_gateway'] = $request['payment_gateway'];
                return redirect()->to($this->makeTransaction($data));
            }
        }else{
            $data =  User::create($request->all());
            $verifyEmailUrl = $this->emailVerificationLink($user->email, $request['payment_gateway']);
            $sentMail = $this->mailService->sendEmailVerification($data->email, $verifyEmailUrl);
            if($sentMail){
                $message = "Kindly Check your inbox to verify your email and proceed to continue purchase";
            }
            return back()->with('message', $message);
        }
    }

    public function emailVerificationLink($email,  $gateway){
        return  URL::temporarySignedRoute(
            'verifyEmailUrl', now()->addMinutes(10), ['email' => $email, 'gateway' => $gateway]
        );
    }


    public function confirmPayment($gateway, $transactionId=null, $email=null){
        $products = $this->products;
        $countries = $this->countries;
        $cartedProducts = session()->get('cart');
        $totalPrice = $this->cartTotal($cartedProducts);
        if($gateway == "TransactionCloud"){
            return view('pages/confirmPayment', compact('message', 'countries', 'products', 'totalPrice'));
        }
        $user = User::where('email', $email)->first();
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
