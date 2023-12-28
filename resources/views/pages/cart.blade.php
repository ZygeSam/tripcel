@extends('layouts.purchase')
@section('content')
<li class="py-2" style="list-style-type: none;"><a href="#">My Cart</a></li>
<form class="woocommerce-cart-form" action="" method="post">
    <table class="shop_table shop_table_responsive cart woocommerce-cart-form__contents" cellspacing="0">
       <thead>
          <tr>
             <th class="product-remove"><span class="screen-reader-text">Remove item</span></th>
             <th class="product-name">Product</th>
             <th class="product-price">Price</th>
             <!-- <th class="product-quantity">Quantity</th> -->
          </tr>
       </thead>
       <tbody>
            @forelse($cart['products'] as $product)
                <tr class="woocommerce-cart-form__cart-item cart_item p-5">
                  
                  <td class="product-remove">
                    <a href="{{route('cart.remove', $product[0]['id'])}}" class="remove" aria-label="Remove this item" data-product_id="2650" data-product_sku="">×</a>						
                    </td>
                    <td class="product-name" data-title="Product">
                    <p>Package : {{$product[0]['name']}}</p>
                    <p>Starting Date:@php echo date("Y-m-d", strtotime("now"));  @endphp</p> 
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
    </table>
 </form>
 <div class="cart-collaterals">
    <div class="cart_totals ">
       <h2>Cart totals</h2>
       <table cellspacing="0" class="shop_table shop_table_responsive">
          <tbody>
             <tr class="cart-subtotal">
                <th>Subtotal</th>
                <td data-title="Subtotal"><span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol">$</span>{{$totalPrice}}</bdi></span></td>
             </tr>
             <tr class="cart-subtotal">
              <th>Service fee</th>
              <td data-title="Subtotal"><span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol">$</span>0.00</bdi></span></td>
           </tr>
             <tr class="order-total">
                <th>Total</th>
                <td data-title="Total"><strong><span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol">$</span>{{$totalPrice}}</bdi></span></strong> </td>
             </tr>
          </tbody>
       </table>
       <div class="wc-proceed-to-checkout">
          <a href="{{route('checkout')}}" class="btn btn-success checkout-button button alt wc-forward wp-element-button">
          Proceed to checkout</a>
       </div>
    </div>
 </div>
@endsection