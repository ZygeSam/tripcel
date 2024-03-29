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
use App\Geolocation\Geolocation;
use App\Models\Rates;


class EsimProductController extends Controller
{
    private $geolocation;
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

    public function __construct(Geolocation $geolocation, EsimPlanTypeService $esimPlanType, EsimPlanService $esimPlan, ESimProductService $esimProduct, PaymentProcessor $paymentProcessor, MailService $mailService, EsimService $esimService, QrCodeController $qrcode) {
        $this->esimProduct = $esimProduct;
        $this->esimService = $esimService;
        $this->geolocation = $geolocation;
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
            $product['price_usd'] = round(($price[0]['PricePerMB']*$product['data_quota_mb']) + ($product['validity_days']*$price[0]['CommPerDay']) + $price[0]['FlatComm']);
            $product['data_quota_mb']=round($product['data_quota_mb']/1024);
            return $product;
        })->unique('data_quota_mb')->sortBy('data_quota_mb')->values()->all();
    }
    public function getProductDays($country, $days=5, $unlimited = false, $unlimitedPlan='Unlimited LITE'){
        $price = $this->pricing->firstWhere('ISO3', $country);
        
        return $this->products->filter(function ($product) use ($country, $unlimited, $days, $unlimitedPlan) {
            if($product['validity_days'] === $days){
                return in_array($country, $product['countries_enabled']);
            }
        })->map(function($product) use($price){
            $product['price_usd'] = round(($price['PricePerMB']*$product['data_quota_mb']) + ($product['validity_days']*$price['CommPerDay']) + $price['FlatComm']);
            $product['data_quota_mb']=round($product['data_quota_mb']/1024);
            return $product;
        })->unique('data_quota_mb')->sortBy('data_quota_mb')->values()->all();
    }

    public function checkPrice($array, $price, $country){
        return $array->map(function($product) use($price, $country){
            $product['country_name'] = $country['country_name'];
            $product['country_iso3'] = $country['country_iso3'];
            $product['country_iso2'] = $country['country_iso2'];
            $product['price_usd'] = round(($price['PricePerMB']*$product['data_quota_mb']) + ($product['validity_days']*$price['CommPerDay']) + $price['FlatComm']);
            $product['data_quota_mb'] = round($product['data_quota_mb']/1024);
            return $product;
        })->unique('data_quota_mb')->sortBy('data_quota_mb')->values()->all();
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
    public function show($esimProduct, $country)
    {
        $price = $this->pricing->firstWhere('Region', $country);
        $country = $this->countries->firstWhere('country_name', $country);

        $products = $this->products->filter(function($product) use ($esimProduct){
            return $product['uid'] === $esimProduct;
        })->values();

        return $this->checkPrice($products, $price, $country);
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
    public function removeFromCart($esimProduct){
        $cart = session()->get('cart');
        $cart['products'] = collect($cart['products'])->filter(function ($product) use ($esimProduct) {
            return $product[0]['uid'] !== $esimProduct;
        })->values()->all();
        session()->put('cart', $cart);
        $totalPrice = $this->cartTotal($cart);
        //display cart on view
        return view('pages/cart', compact('cart', 'totalPrice'));
    }

    public function removeFromCartIcon($esimProduct){
        $cart = session()->get('cart');
        $cart['products'] = collect($cart['products'])->filter(function ($product) use ($esimProduct) {
            return $product[0]['uid'] !== $esimProduct;
        })->values()->all();
        session()->put('cart', $cart);
        $totalPrice = $this->cartTotal($cart);
        //display cart on view
        return back();
    }

    public function addToCart($country, $esimProduct){
        $cart = session()->get('cart');
        $cart['products'][]= $this->show($esimProduct, $country);
        session()->put('cart', $cart);
        $totalPrice = $this->cartTotal(($cart));
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
        if($this->geolocation->getlocation()['country'] == "NG"){
            $showPayStackNigeria = true;
        }else{
            $showPayStackNigeria = false;
        }
        return view('pages/checkout', compact('cart', 'totalPrice', 'showPayStackNigeria'));
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
        if($data['payment_gateway'] == "Paystack"){
            if($this->geolocation->getlocation()['country'] == "NG"){
                $rates = Rates::where('gateway', $data['payment_gateway'])->first()->rates;
                $data['amount'] = $this->cartTotal(session()->get('cart')) * $rates;
                $data['currency'] = "NGN"; //don't forget to change the secret key
            }else{
                $data['amount'] = $this->cartTotal(session()->get('cart'));
                $data['currency'] = "USD";
            }
        }else{
            $data['amount'] = $this->cartTotal(session()->get('cart'));
            $data['currency'] = "USD";
        }
        $data['transaction_id'] = "TRC".strtotime('now');
        $data['description'] = $this->productDescription(session()->get('cart'));
        $data['redirect_url'] = route('confirmPayment', ['transactionId'=> $data['transaction_id'], 'gateway' => $data['payment_gateway'], 'email'=>$data['email']]);
        return $this->paymentProcessor->checkHandler($data['payment_gateway'])->initialize($data);
    }

    public function webhook(Request $request){
        if ($request->getMethod() !== 'POST' || !$request->hasHeader('X-Paystack-Signature')) {
            abort(403, 'Invalid request');
        }


        $input = file_get_contents("php://input");
        
        define('PAYSTACK_SECRET_KEY',config('payment.paystack.paystack_secret_key'));

        if ($request->header('X-Paystack-Signature') !== hash_hmac('sha512', $input, PAYSTACK_SECRET_KEY)) {
            abort(403, 'Invalid Paystack signature');
        }
        http_response_code(200);

        $event = json_decode($input);
        if($event && isset($event->event)){
            $email = $event->data->customer->email;
            if($event->event === "charge.success"){
                $filename = "paystack_payment_success".time().'.txt';
                $details = "payment successful". PHP_EOL;

                foreach($event as $key=>$value){
                    if(is_object($value) ||  is_array($value)){
                        $value = json_encode($value, JSON_PRETTY_PRINT);
                    }
                    $details .= "$key : $value".PHP_EOL; 
                }
                file_put_contents($filename, $details);
            }
        }
    }

    public function transactionCloudWebook(Request $request){
        return $this->paymentProcessor->checkHandler("TransactionCloud")->webhook($request);
    }

    public function verifyEmail(Request $request){
        // Generate otp
        $otp = rand(100000, 999999);
        $sentMail = $this->mailService->sendEmailVerification( $request->email, $otp);
        if($sentMail == true){
            return ['message' => 'success', 'otp' => $otp];
        }else{
            return false;
        }
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
        }else{
            $data =  User::create($request->all());
        }
        $data['payment_gateway'] = $request['payment_gateway'];
        return redirect()->to($this->makeTransaction($data));
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

                    $currentDate = date('Y-m-d');
                    $numberOfDays = $prod[0]['validity_days'];
                    $newDate = date('Y-m-d', strtotime($currentDate . ' + ' . $numberOfDays . ' days'));
                    $createdSim = $this->esimService->createEsim($prod[0]['country_iso2']);
                    $esims[] = [
                        'eSimCountryIso2' => $prod[0]['country_iso2'],
                        'eSimCountryIso3' => $prod[0]['country_iso3'],
                        'eSimCountryName' => $prod[0]['country_name'],
                        'esimIccid' => $createdSim['esim']['iccid'],
                        "eSimState"=>  $createdSim['esim']['state'],
                        "eSimManualCode"=> $createdSim['esim']['manual_code'],
                        "eSimDateAssigned"=> $createdSim['esim']['date_assigned'],
                        "eSimNetworkStatus"=> $createdSim['esim']['network_status'],
                        "eSimActivationCode"=> $createdSim['esim']['activation_code'],
                        "user_id"=> $user['id']
                       ];
                    $esimOrders[] = [
                        'esimIccid'=>$createdSim['esim']['iccid'],
                        'transactionId'=>$transactionId,
                        'eSimProductId'=>$prod[0]['uid'],
                        'eSimPlanName'=>$prod[0]['name'],
                        'unlimitedData'=>false,
                        'planType'=>false,
                        'price'=>$prod[0]['price_usd'],
                        'currrency'=>"USD",
                        'countries_enabled'=>implode(',', $prod[0]['countries_enabled']),
                        'planId' => $prod[0]['uid'],
                        'purchasedData' => $prod[0]['data_quota_bytes'],
                        'dataStartTime' => $currentDate,
                        'dataEndTime'=>$newDate,
                        'network_status' => "not active",
                        'paymentChannel'=>$gateway,
                        'status'=> TransactionStatus::DELIVERED,
                        'user_id'=>$user->id
                    ];
                    $prod[0]['country'] = $prod[0]['country_name'];
                    $prod[0]['iccid'] = $createdSim['esim']['iccid'];
                    $prod[0]['start_time'] = $currentDate;
                    $prod[0]['end_time'] = $newDate;
                    $prod[0]['network_status'] = "not active";

                    $createdSimPlans[] = $prod[0];
                    // generate qrCode file name
                   $qrFIleName =  $user['firstName']. $user['lastName'].$key;

                    // generate the qrCodes
                   $createdProfile[] = $this->generateCodeMessage(
                    $this->qrCode->generateCode(
                        $createdSim['esim']['activation_code']), $qrFIleName);
            }
            Esim::insert($esims);
            EsimOrders::insert($esimOrders);
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
