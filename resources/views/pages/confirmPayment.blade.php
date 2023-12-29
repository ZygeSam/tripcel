@extends('layouts.purchase')
@section('content')
<section class="about-section">
    <!--===============spacing==============-->
    <div class="pd_top_90"></div>
    <!--===============spacing==============-->
    <div class="auto-container">
       <div class="row">
          <div class="col-lg-10 m-auto">
             <div class="title_all_box style_one text-center dark_color">
                <div class="title_sections">
                   <div class="before_title">Payment Confirmation</div>
                   <div class="title">
                    @if(isset($message))
                        {{ $message }}
                    @endif
                    @if(session()->has('cart'))
                    <p>Please check your mail for a confirmation message</p>
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
                                   @forelse(session()->get('cart')['products'] as $product)
                                       <tr class="woocommerce-cart-form__cart-item cart_item p-5">
                                           <td class="product-name" data-title="Product">
                                           <p>Package : {{$product[0]['name']}}</p>
                                           <p>Starting Date: @php  echo date("Y-m-d", strtotime("now"));  @endphp </p> 
                                           <p> Daily Data: {{$product[0]['data_gb']}}GB</p>
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
                    @endif
                   </div>
                </div>
                <!--===============spacing==============-->
                <div class="pd_bottom_40"></div>
                <!--===============spacing==============-->
             </div>
          </div>
       </div>
    </div>
    <!--===============spacing==============-->
    <div class="pd_bottom_90"></div>
    <!--===============spacing==============-->
 </section>
@endsection