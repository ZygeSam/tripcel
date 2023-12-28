@extends('layouts.dashboard')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 mb-4"><span class="text-muted fw-light"><a href="{{route('client.index')}}">Dashboard/</a></span> Esim</h4>
        <div class="card">
            <form class="woocommerce-cart-form" action="" method="post">
                <table class="table table-hover">
                    <thead>
                        <tr>
                        <th>Remove Item</th>
                        <th>Product</th>
                        <th>Price</th>
                        
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @forelse($cart['products'] as $product)
                            <tr class="woocommerce-cart-form__cart-item cart_item p-5">
                            
                            <td class="product-remove">
                                <a href="{{route('esim.removeFromCart', ['product_id' =>$product[0]['id']])}}" class="px-5 remove btn btn-outline-tripcel" aria-label="Remove this item" data-product_id="2650" data-product_sku="">×</a>						
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
                            <td></td>
                            <td><h3 class=" p-3">No Products</h3></td>
                            td
                        @endforelse
                    </tbody>
                </table>
            </form>
            <div class="cart-collaterals p-3 mx-5">
                <div class="cart_totals ">
                <h2>Cart totals</h2>
                <hr>
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
                @if(session()->has('cart'))
                    <div class="wc-proceed-to-checkout">
                        <a href="{{route('esim.checkout')}}" class="btn btn-outline-tripcel checkout-button button alt wc-forward wp-element-button">
                        Proceed To Checkout</a>
                    </div>
                @endif
                </div>
            </div>
        </div>
    </div>
@endsection