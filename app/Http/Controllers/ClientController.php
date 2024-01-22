<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Esim;
use App\Models\EsimOrders;
use App\Models\SupportTicket;
use App\Services\MailService;
use App\Services\EsimService;
use App\Services\EsimPlanService;
use App\Services\ESimProductService;
use App\Services\EsimPlanTypeService;
use App\Payments\PaymentProcessor;
use App\Enums\TransactionStatus;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\PasswordRequest;
use App\Http\Requests\SupportTicketRequest;
use App\Http\Requests\ClientProfileRequest;
use App\Http\Controllers\QrCodeController;
use App\Http\Controllers\SupportTicketController;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Http\Middleware\AuthenticateClient;

class ClientController extends Controller
{
    protected $esimPlanType;
    protected $esimProducts;
    protected $mailService;
    protected $paymentProcessor;
    protected $esimPlan;
    protected $qrCode;
    protected $products;
    protected $countries;
    private $pricing;

    public function __construct(ESimProductService $esimProducts, EsimPlanTypeService $esimPlanType,PaymentProcessor $paymentProcessor, EsimService $esimService, EsimPlanService $esimPlan, QrCodeController $qrcode, MailService $mailService) {
        $this->paymentProcessor = $paymentProcessor;
        $this->esimPlanType = $esimPlanType;
        $this->esimProducts = $esimProducts;
        $this->esimService = $esimService;
        $this->mailService = $mailService;
        $this->esimPlan = $esimPlan;
        $this->qrCode = $qrcode;
        $this->products = collect($this->getProducts());
        $this->pricing = collect($this->getProductsPrice());
        $this->countries = collect($this->getAllCountries());
        $this->middleware(AuthenticateClient::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        $userEsims = Esim::with('transactions')->where('user_id', auth()->user()->id)->orderBy('id', 'desc')->latest()->get();
        $esimTransactions = EsimOrders::with('esim')->where('user_id', auth()->user()->id)->orderBy('id', 'desc')->latest()->get();
        $totalEsims = $userEsims->count();
        
        return view('dashboards.client.index', compact('totalEsims', 'userEsims', 'esimTransactions'));
    }


    public function esim( Request $request)
    {
        $countries = $this->countries;
        $userEsims = Esim::with('transactions') ->where('user_id', auth()->user()->id)->orderBy('id', 'desc')->get();
        if(count($userEsims) == 0 ){
            $esimPlans = [];
            return view('dashboards.client.esim', compact('countries', 'userEsims', 'esimPlans'));
        }
        $selectedEsim = Esim::with('transactions')->where('eSimCountryName', $request->query('country', $userEsims[0]['eSimCountryName']))->first();
        $esimPlans = $this->esimService->getEsimPlans($selectedEsim->esimIccid)['plans'];
        
        return view('dashboards.client.esim', compact('countries', 'userEsims', 'selectedEsim', 'esimPlans'));
    }

    public function sms(Request $request){
        $sentSms = $this->esimService->sendSms($request);
        if($sentSms){
            session()->flash('message', 'SMS Successfully Sent');
            return redirect()->route('esim.index', ['userId' => $request['userId']]);
       }
    }

    public function getProducts(){
        return collect($this->readApi("data/products.json"));
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

     public function readApi($filepath){
        $jsonString = file_get_contents($filepath, true);
        return  collect(json_decode($jsonString, true));
    }

    public function getAllProducts($isocode){
        $price = $this->pricing->firstWhere('ISO3', $isocode);

        return $this->products->filter(function ($product) use ($isocode) {
                return in_array($isocode, $product['countries_enabled']);
        })->map(function($product) use($price){
            $product['price_usd'] = round(($price['PricePerMB']*$product['data_quota_mb']) + ($product['validity_days']*$price['CommPerDay']) + $price['FlatComm']);
            $product['data_quota_mb']=round($product['data_quota_mb']/1024);
            return $product;
        })->sortBy('data_quota_mb')->values()->all();
    }

    public function getAllRegionProducts($isocode){
        return $this->products->filter(function($product) use ($isocode){
            return $product['country_iso2'] == $isocode;
        });
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = $this->countries;
        return view('dashboards.client.addEsim', compact('countries'));
    }

    public function topUp(Request $request)
    {
        $selectedEsim = Esim::with('transactions')->where('eSimCountryName', $request->query('country'))->first();
        return $this->getAllProducts($selectedEsim->eSimCountryIso3);
    }

    public function showCart(){
        $products = $this->products;
        $countries = $this->countries;
        $cart = session()->get('cart');
        if(is_null($cart)){
            $cart['products']= [];
        }
        //display cart on view
        $totalPrice = $this->cartTotal($cart);
        return view('dashboards.client.cart', compact('cart', 'totalPrice'));
    }
    
    public function putInCart(){
        if(session()->has('cart')){
            $cart = session()->get('cart');
            if (!isset($cart['products'])) {
                $cart['products'] = [];
            }
        }else{
            session()->put('cart', []);
        }
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

    public function show($esimProduct, $country)
    {
        $price = $this->pricing->firstWhere('Region', $country);
        $country = $this->countries->firstWhere('country_name', $country);
        $products = $this->products->filter(function($product) use ($esimProduct){
            return $product['uid'] === $esimProduct;
        })->values();

        return $product = $this->checkPrice($products, $price, $country);
    }

    public function addToCartModal(Request $request){
        $cart = session()->get('cart');
        $cart['products'][]= $this->show($request->query('esimProduct'), $request->query('country'));
        session()->put('cart', $cart);
        $totalPrice = $this->cartTotal(($cart));
        return true;
    }
    public function addToCart(Request $request){
        if(session()->has('cart')){
            $cart = session()->get('cart');
            if (!isset($cart['products'])) {
                $cart['products'] = [];
            }
        }else{
            session()->put('cart', []);
        }
        $product = $this->esimProducts->getAProduct($request["esimProduct"])['product'];
        $cart['products'][] = collect([$product, 'esimIccid'=>$request["esimIccid"]])->flatten(1);
        session()->put('cart', $cart);
        $totalPrice = $this->cartTotal($cart);
        return view('dashboards.client.cart', compact('cart','totalPrice'));
    }

    public function removeFromCart(Request $request){
        $products = $this->products;
        $countries = $this->countries;
        $cart = session()->get('cart');
        $cart['products'] = collect($cart['products'])->filter(function ($product) use ($request) {
            return $product[0]['uid'] !== $request->query('product_id');
        })->values()->all();
        session()->put('cart', $cart);
        $totalPrice = $this->cartTotal($cart);
        //display cart on view
        return view('dashboards.client.cart', compact('cart','totalPrice'));
    }

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
    
    public function checkout(Request $request){
        $cart = session()->get('cart');
        $totalPrice = $this->cartTotal($cart);
        return view('dashboards.client.checkout', compact('cart', 'totalPrice'));
    }

    public function pay(Request $request){
        $user = auth()->user();
        //set request parameters
        $request['email'] = $user['email'];
        $request['payment_gateway'] ="Paystack";
        $request['amount'] =$this->cartTotal(session()->get('cart'));
        $request['currency'] ="USD";
        $request['transaction_id'] ="TRC".strtotime("now");
        $request['description'] = "Purchase Esim";
        $request['payment_gateway'] = "Paystack";
        $request['redirect_url'] = route('esim.confirmPay', ['transactionId'=> $request['transaction_id'], 'gateway' => "Paystack"]);
        // save transaction to database
        $response = $this->paymentProcessor->checkHandler($request['payment_gateway'])->initialize($request);
        return redirect()->to($response);
    }

    public function checkCountry($isoCode){
        $country = $this->countries->filter(function($country){
            return in_array($isocode, $product['countries_enabled']);
        });
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

    public function confirmPay($gateway, $transactionId){
        $cartedProducts = session()->get('cart');
        $response = $this->paymentProcessor->checkHandler($gateway)->verify_transaction();
        if($response['status'] == true){
            $user = auth()->user();
            // return $cartedProducts;
                foreach($cartedProducts['products'] as $key=> $prod){
                        // return $prod;

                        $currentDate = date('Y-m-d');
                        $numberOfDays = $prod[0]['validity_days'];
                        $newDate = date('Y-m-d', strtotime($currentDate . ' + ' . $numberOfDays . ' days'));

                        $esim = Esim::where('esimCountryIso3', $prod[0]['country_iso3'])->first();
                        $esimOrders[] = [
                            'esimIccid'=>$esim->esimIccid,
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
                        $prod[0]['country'] = $esim->eSimCountryName;
                        $prod[0]['iccid'] = $esim->esimIccid;
                        $prod[0]['start_time'] = $currentDate;
                        $prod[0]['end_time'] = $newDate;
                        $prod[0]['network_status'] = "not active";
                        $createdSimPlans[] = $prod[0];
                }
                $esimOrders = EsimOrders::insert($esimOrders);
                    // send user an email
                if($esimOrders){
                    $sentMail = $this->mailService->sendDataPurchaseInfo( $user['email'], 'Thank you for your Purchase', $createdSimPlans);
                    if($sentMail){
                        session()->flash('message', 'Esim Plans Purchase Successful');
                        return redirect()->route('esim.index', ['userId' => $user->id]);
                    }
                }
                session()->forget('cart');
        return view('pages/confirmPayment', compact('message'));
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $countries = $this->countries->where('country_iso2', $request['esimProduct'])->first();
        $createdSim=$this->esimService->createEsim($request['esimProduct']);
        $user = auth()->user();
        $createdEsim = Esim::create([
            'eSimCountryIso2' => $countries['country_iso2'],
            'eSimCountryIso3' =>$countries['country_iso2'],
            'eSimCountryName' => $countries['country_name'],
            'esimIccid' => $createdSim['esim']['iccid'],
            "eSimState"=>  $createdSim['esim']['state'],
            "eSimManualCode"=> $createdSim['esim']['manual_code'],
            "eSimDateAssigned"=> $createdSim['esim']['date_assigned'],
            "eSimNetworkStatus"=> $createdSim['esim']['network_status'],
            "eSimActivationCode"=> $createdSim['esim']['activation_code'],
            "user_id"=> $user->id
           ]);
           if($createdEsim){
            $qrFIleName =  $user['firstName']. $user['lastName'].mt_rand(100000, 999999);
            $createdProfile[] = $this->generateCodeMessage(
                $this->qrCode->generateCode(
                    $createdSim['esim']['activation_code']), $qrFIleName);
            $this->mailService->sendPurchaseInfo( $user['email'], 'Thank you for your Purchase, Activate your ESim', $createdProfile);
                session()->flash('message', 'ESim Created Successfully');
                return redirect()->route('esim.index', ['userId' => $request['userId']]);
           }
    }

    public function generateCodeMessage($qrCode, $qrFIleName){
        $file_path = "public/img/$qrFIleName.png";
        
        $filePath = Storage::put($file_path, $qrCode);
        $qrCodePath = Storage::url($file_path);
        return $qrCodePath;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function changePassword(PasswordRequest $request)
    {
        $validated = $request->validated();
        $user = auth()->user();
        $user->password = $request->password;
        $user->save();
        session()->flash('message', 'Password Updated Successfully');
        return redirect()->route('client.password');
    }

    public function password()
    {
        $user = auth()->user();
        return view('dashboards.client.password', compact('user'));
    }

    public function support(){
        $tickets = SupportTicket::where('user_id', auth()->user()->id)->latest()->get();
        return view('dashboards.client.support', compact('tickets'));
    }

    public function getSupportTicket($id){
        return $tickets = SupportTicket::where('user_id', auth()->user()->id)
                    ->where('id', $id)
                    ->first();
    }

    public function supportTicket(SupportTicketRequest $request){
        $validatedData = $request->validated();
        if($request->user_id !== null){
            $sendTicket = SupportTicket::create($validatedData);
            if($sendTicket){
                return redirect()->back()->with('message', 'Message sent Successfully');
            }
        }
        return redirect()->back()->with('message', 'User must be authenticated');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function profile()
    {
        $user = User::where('id', auth()->user()->id)->first();
        return view('dashboards.client.profile', compact('user'));
    }

    public function saveProfile(ClientProfileRequest $request){
        $validated = $request->validated();
        $user = auth()->user();
        $user->firstName = $request->firstName;
        $user->lastName = $request->lastName;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->save();
        session()->flash('message', 'Profile Updated Successfully');
        return redirect()->route('client.profile');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function cart()
    {
        //
    }
}
