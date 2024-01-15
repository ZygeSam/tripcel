@extends('layouts.purchase')
@section('content')
@if($errors->any())
    <div class="alert alert-danger my-4">
        @foreach($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
@endif
<form name="checkout" method="post" class="checkout woocommerce-checkout" action="{{route('checkout')}}" novalidate="novalidate">
    @csrf
    <div class="row gutter_30px">
      @guest
         <div class="col-lg-6">
               <div class="woocommerce-billing-fields">
                  <h3>Your Tripcel Mobile Account</h3>
                  <div class="woocommerce-billing-fields__field-wrapper">
                     <p class="form-row form-row-first validate-required" id="billing_first_name_field">
                        <label>First name&nbsp;<abbr class="required" title="required">*</abbr></label>
                     
                           <input type="text" class="input-text" name="firstName" id="billing_first_name" placeholder="" value="">
                  
                     </p>
                     <p class="form-row form-row-last validate-required" id="billing_last_name_field">
                        <label>Last name&nbsp;<abbr class="required" title="required">*</abbr></label>
                     
                           <input type="text" class="input-text" name="lastName" id="billing_last_name" placeholder="" value="">
               
                     </p>
                     <p class="form-row form-row-last validate-required" id="billing_last_name_field">
                     <label>Address&nbsp;<abbr class="required" title="required">*</abbr></label>
                     
                        <input type="text" class="input-text" name="address" id="billing_last_name" placeholder="" value="">
            
                  </p>
                     <p class="form-row form-row-first validate-required" id="billing_first_name_field">
                     <label>Email&nbsp;<abbr class="required" title="required">*</abbr></label>
                     
                        <input type="email" class="input-text" name="email" id="billing_first_name" placeholder="" value="">
                  
                  </p>
                  <p class="form-row form-row-last validate-required" id="billing_last_name_field">
                     <label>Password&nbsp;<abbr class="required" title="required">*</abbr></label>
                     
                        <input type="password" class="input-text" name="password" id="billing_last_name" placeholder="" value="">
            
                  </p>
                  <p class="form-row form-row-last validate-required" id="billing_last_name_field">
                     <label>Confirm Password&nbsp;<abbr class="required" title="required">*</abbr></label>
                     
                        <input type="password" class="input-text" name="confirmPassword" id="billing_last_name" placeholder="" value="">
            
                  </p>
                     <p class="form-row form-row-wide validate-required validate-phone" id="billing_phone_field">
                        <label>Phone&nbsp;<abbr class="required" title="required">*</abbr></label>
            
                           <input type="tel" class="input-text " name="phone" id="billing_phone" placeholder="" value="" autocomplete="tel">
                     
                     </p>
                  </div>
               </div>
         </div>
      @endguest
       <div class="@guest col-lg-6 @endguest @auth('web') col-lg-12 @endauth">
          <div id="order_review" class="woocommerce-checkout-review-order">
             <h3 id="order_review_heading">Your order</h3>
             <div class="your_order_box">
                <table class="shop_table woocommerce-checkout-review-order-table">
                   <thead>
                      <tr>
                         <th class="product-name">Product</th>
                         <th class="product-total">Subtotal</th>
                      </tr>
                   </thead>
                   <tbody>
                        @forelse($cart['products'] as $product)
                            <tr class="woocommerce-cart-form__cart-item cart_item p-5">
                                <td class="product-name" data-title="Product">
                                <p>Package : {{$product[0]['name']}}</p>
                                <p>Starting Date: @php  echo date("Y-m-d", strtotime("now"));  @endphp </p> 
                                <p> Daily Data: {{$product[0]['data_gb']}}GB</p>
                                <p>Throttle: 1Mbps</p>					
                                </td>
                                <td class="product-price" data-title="Price">
                                <span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol"></span>${{$product[0]['price_usd']}}</bdi></span>						
                                </td>
                            </tr>
                            @empty
                            <p>No Products</p>
                        @endforelse
                   </tbody>
                   <tfoot>
                      <tr class="cart-subtotal">
                          <th>Service fee</th>
                          <td>
                             <span class="woocommerce-Price-amount amount">
                                <bdi><span class="woocommerce-Price-currencySymbol">$</span>0.00</bdi>
                             </span>
                          </td>
                       </tr>
                       <tr class="cart-subtotal">
                          <th>Tax</th>
                          <td>
                             <span class="woocommerce-Price-amount amount">
                                <bdi><span class="woocommerce-Price-currencySymbol">$</span>0.00</bdi>
                             </span>
                          </td>
                       </tr>
                      <tr class="order-total">
                         <th>Total</th>
                         <td>
                            <strong><span class="woocommerce-Price-amount amount">
                               <bdi><span class="woocommerce-Price-currencySymbol">$</span>{{$totalPrice}}</bdi></span>
                            </strong>
                         </td>
                      </tr>
                   </tfoot>
                </table>
             </div>
          </div>
       </div>
    </div>
    <div class="row">
      <p>Choose a way to pay</p>
     <p><input type="radio" name="payment_gateway" value="Paystack" id=""> <img src="./assets/images/payment.png" width="150" height="80" alt=""></p> 
  </div>
    <div class="col-lg-6 col-md-12 col-sm-12 column mt-4">
      <div class="field-input message-btn">
          <button type="submit" class="theme-btn two">Make Payment</button>
      </div>
  </div>
 </form>
@endsection