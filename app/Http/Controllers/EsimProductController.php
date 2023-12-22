<?php

namespace App\Http\Controllers;

use App\Models\Esim;
use Illuminate\Http\Request;
use App\Services\ESimProductService;
use App\Services\EsimService;
use App\Services\MailService;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreEsimBuyerRequest;
use App\Models\User;
use App\Payments\PaymentProcessor;
use App\Http\Controllers\QrCodeController;
use SimpleSoftwareIO\QrCode\Facades\QrCode;


class EsimProductController extends Controller
{
    private $esimProduct;
    private $delimiter;
    private $paymentProcessor;
    private $mailService;
    private $esimService;
    private $qrCode;
    private $manager;

    public function __construct(ESimProductService $esimProduct, PaymentProcessor $paymentProcessor, MailService $mailService, EsimService $esimService, QrCodeController $qrcode) {
        $this->esimProduct = $esimProduct;
        $this->esimService = $esimService;
        $this->delimiter ='-';
        $this->paymentProcessor = $paymentProcessor;
        $this->mailService = $mailService;
        $this->qrCode = $qrcode;
    }
    
    public function getProducts(){
        $products = collect($this->esimProduct->getAllProducts());
        session()->put(['products'=>$products]);
        return session()->get('products');
    }

    public function checkProducts(){
        if(session()->has('products')){
            return  session()->get('products');
        }
        return collect($this->getProducts());
    }

    public function getAllCountries($products){
        return $countries = $products->unique(function ($item) {
             return $item['country_iso2'].$item['country_iso3'].$item['country_name'];
         })->map(function ($item) {
             return [
                 "country_iso2" => $item['country_iso2'],
                 "country_iso3" => $item['country_iso3'],
                 "country_name" => $item['country_name'],
             ];
         })->values()->all();
     }
    public function index()
    { 
        $products = collect($this->checkProducts()['products']);
        $countries = $this->getAllCountries($products);
        return view('pages/index', compact('products', 'countries'));
    }

    public function getCountries(){
       $products = collect($this->checkProducts()['products']);
       $countries = $this->getAllCountries($products);
       return view('pages/countries', compact('countries'));
    }

    public function getRegionProducts($region){
        $products = collect($this->checkProducts()['products']);
        $countries = collect($this->getAllCountries($products));
        $country = $countries->where('country_iso3', $region)->first();
        $fiveDaysProduct = $this->getProductDays($products, $country['country_name'], "- 5 days");
        $tenDaysProduct = $this->getProductDays($products, $country['country_name'], "- 10 days");
        $fifteenDaysProduct = $this->getProductDays($products, $country['country_name'], "- 15 days");
        $thirtyDaysProduct = $this->getProductDays($products, $country['country_name'], "- 30 days");
        $unlimitedLiteDaysProduct = $this->getProductDays($products, $country['country_name'], "- 5 days", true, 'Unlimited LITE');
        $unlimitedStandardDaysProduct = $this->getProductDays($products, $country['country_name'], "- 5 days", true, 'Unlimited STANDARD');
        $unlimitedMaxDaysProduct = $this->getProductDays($products, $country['country_name'], "- 5 days", true, 'Unlimited MA');
        return view('pages.regions', compact('countries', 'country', 'fiveDaysProduct', 'tenDaysProduct', 'fifteenDaysProduct', 'thirtyDaysProduct', 'unlimitedLiteDaysProduct', 'unlimitedStandardDaysProduct', 'unlimitedMaxDaysProduct'));
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
       $products = collect($this->checkProducts()['products']);
       $countries = collect($this->getAllCountries($products));
       $country = $countries->where('country_name', $country)->first();
       $fiveDaysProduct = $this->getProductDays($products, $country['country_name'], "- 5 days");
       $tenDaysProduct = $this->getProductDays($products, $country['country_name'], "- 10 days");
       $fifteenDaysProduct = $this->getProductDays($products, $country['country_name'], "- 15 days");
       $thirtyDaysProduct = $this->getProductDays($products, $country['country_name'], "- 30 days");
       $unlimitedLiteDaysProduct = $this->getProductDays($products, $country['country_name'], "- 5 days", true, 'Unlimited LITE');
       $unlimitedStandardDaysProduct = $this->getProductDays($products, $country['country_name'], "- 5 days", true, 'Unlimited STANDARD');
       $unlimitedMaxDaysProduct = $this->getProductDays($products, $country['country_name'], "- 5 days", true, 'Unlimited MA');
    
       return view('pages.country', compact('countries', 'country', 'fiveDaysProduct', 'tenDaysProduct', 'fifteenDaysProduct', 'thirtyDaysProduct', 'unlimitedLiteDaysProduct', 'unlimitedStandardDaysProduct', 'unlimitedMaxDaysProduct'));
    }

    /**
     * Display the specified resource.
     */
    public function show($esimProduct)
    {
        return $this->esimProduct->getAProduct($esimProduct);
    }
    public function showCart(){
        $products = collect($this->checkProducts()['products']);
        $countries = collect($this->getAllCountries($products));
        $cart = session()->get('cart');
        if(is_null($cart)){
            $cart['products']= [];
        }
        //display cart on view
        $totalPrice = $this->cartTotal($cart);
        return view('pages/cart', compact('cart', 'countries',  'totalPrice'));
    }
    public function removeFromCart($request){
        $products = collect($this->checkProducts()['products']);
        $countries = collect($this->getAllCountries($products));
        $cart = session()->get('cart');
        $cart['products'] = collect($cart['products'])->filter(function ($product) use ($request) {
            return $product[0]['id'] !== $request;
        })->values()->all();
        session()->put('cart', $cart);
        $totalPrice = $this->cartTotal($cart);
        //display cart on view
        return view('pages/cart', compact('cart', 'countries',  'totalPrice'));
    }

    public function removeFromCartIcon($request){
        $products = collect($this->checkProducts()['products']);
        $countries = collect($this->getAllCountries($products));
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
        $products = collect($this->checkProducts()['products']);
        $countries = collect($this->getAllCountries($products));

        if(session()->has('cart')){
            $cart = session()->get('cart');
            if (!isset($cart['products'])) {
                $cart['products'] = [];
            }
        }else{
            session()->put('cart', []);
        }
        $cart['products'][]= $this->show($esimProduct)['product'];
        session()->put('cart', $cart);
        $totalPrice = $this->cartTotal($cart);
        //display cart on view
        return view('pages/cart', compact('cart', 'countries',  'totalPrice'));
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
        $products = collect($this->checkProducts()['products']);
        $countries = collect($this->getAllCountries($products));
        if(session()->has('cart')){
            $cart = session()->get('cart');
            if (!isset($cart['products'])) {
                $cart['products'] = [];
            }
        }else{
            return redirect()->back();
        }
        $totalPrice = $this->cartTotal($cart);
        return view('pages/checkout', compact('countries', 'cart', 'totalPrice'));
    }

    public function buyProduct(StoreEsimBuyerRequest $request){
        $request->validated();
        $user = User::where('email', $request['email'])->first();
        if(!$user){
            $user =  User::create($request->all());
        }
        $request['amount'] =$this->cartTotal(session()->get('cart'));
        $request['currency'] ="NGN";
        $request['transaction_id'] ="TRC".now();
        $request['description'] ="Purchase of esim";
        $request['redirect_url'] = route('confirmPayment', ['email'=> $user->email, 'gateway' => $request['payment_gateway']]);
        $response = $this->paymentProcessor->checkHandler($request['payment_gateway'])->initialize($request);
        return redirect()->to($response);
    }
    public function confirmPayment($gateway, $email){
        $cartedProducts = session()->get('cart');
        $products = collect($this->checkProducts()['products']);
        $countries = collect($this->getAllCountries($products));
        $response = $this->paymentProcessor->checkHandler($gateway)->verify_transaction();
        if($response['status'] == true){
            $user = User::where('email', $email)->first();
            if($user){
                $createdProfile=[];
                foreach($cartedProducts['products'] as $key=> $prod){
                   $qrFIleName = $user['firstName'].$user['lastName'].$key;
                   $createdProfile[] = $this->generateCodeMessage(
                        $this->qrCode->generateCode(
                            $this->esimService->createEsim($prod[0]['country_iso2'])['esim']['activation_code']), $qrFIleName);
                }
                if($this->mailService->sendPurchaseInfo($user, 'Thank you for your Purchase, Activate Your ESim', $createdProfile)){
                    $message = "Payment Success";
                }
            }
        }else{
            $message = "Payment Failed";
        }
        return view('pages/confirmPayment', compact('message', 'countries', 'products'));
        
    }

    public function generateCodeMessage($qrCode, $qrFIleName){
            $file_path = "public/img/$qrFIleName.png";
            
            $filePath = Storage::put($file_path, $qrCode);
            $qrCodePath = Storage::url($file_path);
            return $qrCodePath;
    }
    
    

}
