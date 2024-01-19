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

    public function __construct(ESimProductService $esimProducts, EsimPlanTypeService $esimPlanType,PaymentProcessor $paymentProcessor, EsimService $esimService, EsimPlanService $esimPlan, QrCodeController $qrcode, MailService $mailService) {
        $this->paymentProcessor = $paymentProcessor;
        $this->esimPlanType = $esimPlanType;
        $this->esimProducts = $esimProducts;
        $this->esimService = $esimService;
        $this->mailService = $mailService;
        $this->esimPlan = $esimPlan;
        $this->qrCode = $qrcode;
        $this->products = $this->getProducts();
        $this->countries = $this->getAllCountries();
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

    public function getAllCountries(){
        return collect($this->readApi("data/countries.json"));
     }

     public function readApi($filepath){
        $jsonString = file_get_contents($filepath, true);
        return  collect(json_decode($jsonString, true));
    }

    public function getAllProducts($isocode){
        return $this->products->filter(function($product) use ($isocode){
            return $product['country_iso2'] == $isocode;
        });
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
        $esimPlans = $this->esimService->getEsimPlans($selectedEsim->esimIccid)['plans'];
        if($selectedEsim->eSimCountryIso2 == "0"){
            switch ($selectedEsim->eSimCountryName) {
                case 'Europe':
                    $isoCode = "europe";
                    break;
                case 'Asia':
                    $isoCode = "apac";
                    break;
                case 'South America':
                    $isoCode = "latam";
                    break;
                default:
                    # code...
                    break;
            }
            // $products = $this->esimProducts->getAllRegionProducts($isoCode)['products'];
            $products = $this->getAllRegionProducts($isoCode);
        }else{
            $isoCode = $selectedEsim->eSimCountryIso2;
            // $products = $this->esimProducts->getAllProducts($isoCode)['products'];
            $products = $this->getAllProducts($isoCode);
        }
        return view('dashboards.client.eSimTopUp', compact('selectedEsim', 'products', 'esimPlans'));
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
            return $product[0]['id'] !== $request->query('product_id');
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
        $request['currency'] ="NGN";
        $request['transaction_id'] ="TRC".strtotime("now");
        $request['description'] = "Purchase Esim";
        $request['payment_gateway'] = "Paystack";
        $request['redirect_url'] = route('esim.confirmPay', ['transactionId'=> $request['transaction_id'], 'gateway' => "Paystack"]);
        // save transaction to database
        $response = $this->paymentProcessor->checkHandler("Paystack")->initialize($request);
        return redirect()->to($response);
    }

    public function confirmPay($gateway, $transactionId){
        $cartedProducts = session()->get('cart');
        $createdSimPlans = [];
        $response = $this->paymentProcessor->checkHandler($gateway)->verify_transaction();
        if($response['status'] == true){
            $user = auth()->user();
                foreach($cartedProducts['products'] as $key=> $prod){
                        $esim = Esim::where('esimCountryName', $prod[0]['country_name'])->first();
                        $createdSimPlan = $this->esimPlan->createEsimPlan($esim->esimIccid, $prod[0]['id']);
                        $esimOrders[] = [
                            'esimIccid'=>$esim->esimIccid,
                            'transactionId'=>$transactionId,
                            'eSimProductId'=>$prod[0]['id'],
                            'eSimPlanName'=>$prod[0]['name'],
                            'unlimitedData'=>$prod[0]['unlimited_data'],
                            'planType'=>$prod[0]['plan_type'],
                            'price'=>$prod[0]['price_usd'],
                            'currrency'=>$prod[0]['currency'],
                            'countries_enabled'=>implode(',', $createdSimPlan['plan']['countries_enabled']),
                            'planId' => $createdSimPlan['plan']['id'],
                            'purchasedData' => $createdSimPlan['plan']['data_quota_bytes'],
                            'dataStartTime' => $createdSimPlan['plan']['start_time'],
                            'dataEndTime'=>$createdSimPlan['plan']['end_time'],
                            'network_status' => $createdSimPlan['plan']['network_status'],
                            'paymentChannel'=>$gateway,
                            'status'=> TransactionStatus::DELIVERED,
                            'user_id'=>$user->id
                        ];
                        $createdSimPlan['country'] = $prod[0]['country_name'];
                        $createdSimPlans[] = $createdSimPlan;
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
