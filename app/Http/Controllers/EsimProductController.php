<?php

namespace App\Http\Controllers;

use App\Models\Esim;
use Illuminate\Http\Request;
use App\Services\ESimProductService;
use App\Traits\CurlableTrait;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Collection;
use App\Http\Requests\StoreEsimBuyerRequest;
use App\Models\User;
use App\Payments\Paystack;
use App\Payments\PaymentProcessor;

class EsimProductController extends Controller
{
    use CurlableTrait;

    private $esimProduct;
    private $delimiter;
    private $paymentProcessor;

    public function __construct(EsimProductService $esimProduct, PaymentProcessor $paymentProcessor) {
        $this->esimProduct = $esimProduct;
        $this->delimiter ='-';
        $this->paymentProcessor = $paymentProcessor;
    }
    
    public function getProducts(){
        $products = collect($this->esimProduct->getAllProducts());
        session()->put(['products'=>$products]);
        return session()->get('products');
    }

    public function checkProducts(){
        if(session()->has('products')){
            $products = session()->get('products');
        }else{
            $products = collect($this->getProducts());
        }
        return $products;
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
        // return back();
        //display cart on view
        return view('pages/cart', compact('cart', 'countries',  'totalPrice'));
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
        $request['redirect_url'] = route('confirmPayment', ['gateway' => $request['payment_gateway']]);
        $response = $this->paymentProcessor->checkHandler($request['payment_gateway'])->initialize($request);
        return redirect()->to($response);
    }
    public function confirmPayment($gateway){
        session()->forget('cart');
        $products = collect($this->checkProducts()['products']);
        $countries = collect($this->getAllCountries($products));
        $response = $this->paymentProcessor->checkHandler($gateway)->verify_transaction();
        if($response['status'] == true){
            $message = "Payment Successful";
            return view('pages/confirmPayment', compact('message', 'countries', 'products'));
        }else{
            $message = "Payment Failed";
            return view('pages/confirmPayment', compact('message', 'countries', 'products'));
        }
    }


}
