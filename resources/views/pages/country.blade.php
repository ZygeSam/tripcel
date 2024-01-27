@extends('layouts.app')
@section('banner')
                           <div class="container-fluid m-0">
                              <div class="row align-items-center m-0">
                                 <div class="col-md-6">
                                    <div class="slider_content ">
                                       <p class="display-3 text-white fs-1 fw-bold lh-base" >Explore Seamless Connectivity</p> 
                                       <p class="lh-sm text-white" style="font-size: 50px">with <b>Tripcel eSIM in {{ $country['country_name']}}</b></p><br>
                                          <p class="lh-base text-light fs-4"><b>With Tripcel eSIM,</b> travel connectivity is easier than ever! Enjoy unlimited <br>data in <b>{{ $country['country_name']}}</b> without SIM card hassles.</p><br>
                                          <p class="lh-base text-light fs-4"> Whether you are a tourist exploring the rich history, a business traveler attending meetings, or simply enjoying the vibrant culture, Tripcel eSIM ensures you stay connected effortlessly.</p>
                                          <div class="animate_down theme_btn_all color_two my-4">
                                             <a href="{{route('countries')}}" class="theme-btn three px-5 text-white" style="background-color: rgb(219, 165, 66); font-size:0.7em">Get Your Travel eSIM Plan</a>  
                                          </div>
                                    </div>
                                 </div>
                                 <div class="col-md-6 px-0">
                                    <div class="animate_right p-0 m-0">
                                       @section('image')
                                          <x-image :image="asset('assets/images/tripcelBanner.png')"></x-image>
                                       @show
                                    </div>
                                 </div>
                              </div>
                           </div>
@endsection

@section('content')
<section class="price_plan_with_tab price_tb_style_one">
    <div class="row">
        <div  class="text-center mt-5 py-3">
            <h1>{{$country['country_name']}} eSIM Plans & Pricing</h1>
        <p class="mx-auto px-4 d-block">Pick your plan duration, go Prepaid or Unlimited, and get ready to connect!</p>
        </div>
        
       <div class="col-lg-12 ml-auto">
          <div class="tab_pricing_list">
             <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                   <button class="nav-link active" id="five-tab" data-bs-toggle="tab" data-bs-target="#five" type="button" role="tab" aria-controls="five" aria-selected="true">
                   5 Days</button>
                </li>
                <li class="nav-item" role="presentation">
                   <button class="nav-link" id="ten-tab" data-bs-toggle="tab" data-bs-target="#ten" type="button" role="tab" aria-controls="ten" aria-selected="false">
                   10 Days</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="fifteen-tab" data-bs-toggle="tab" data-bs-target="#fifteen" type="button" role="tab" aria-controls="fifteen" aria-selected="true">
                    15 Days</button>
                 </li>
                 <li class="nav-item" role="presentation">
                    <button class="nav-link" id="thirty-tab" data-bs-toggle="tab" data-bs-target="#thirty" type="button" role="tab" aria-controls="thirty" aria-selected="false">
                    30 Days</button>
                 </li>
             </ul>
          </div>
       </div>
    </div>
    
    <div class="container-fluid px-4 mx-auto">
        <div class="tab-content price_tab_content mx-lg-5 px-lg-5" id="myTabContent">
            <div class="tab-pane fade show active" id="five" role="tabpanel" aria-labelledby="five-tab">
               <div class="row justify-content-center">
                  @forelse ($fiveDaysProduct as $product)
                     <div class="my-3 col-xl-3 col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <div class="price_plan_box style_one  border border-dark">
                           <div class="tag">@convertToGig($product['data_quota_mb']) GB</div>
                           <div class="inner_box">
                              <div class="top">
                                 <h2>{{$country['country_name']}} eSIM</h2>
                              </div>
                              <div class="mid">
                                 <h4>${{$product['price_usd']}}</h4>
                                 <div class="list_item_box style_two style_list">
                                    <ul class="list-inline">
                                       <li class="list_items pd_bottom_10">
                                          <small class="d-flex align-items-center">
                                             <span class="icon_bx">
                                                <i class=" icon-checked"></i>
                                             </span>
                                             <a class="nav_link" href="#" rel="&quot;nofollow&quot;">
                                             {{$product['validity_days']}} Days Data Pass </a>
                                          </small></li>
                                       <li class="list_items pd_bottom_10">
                                          <small class="d-flex align-items-center">
                                             <span class="icon_bx">
                                                <i class=" icon-checked"></i>
                                             </span>
                                             <a class="nav_link" href="#" rel="&quot;nofollow&quot;">
                                                {{$product['data_quota_mb']}} Gigabytes</a>
                                          </small></li>
                                    </ul>
                                 </div>
                              </div>
                              <div class="bottom">
                              <a href="{{route('cart',['country' => $country['country_name'], 'esimProduct' => $product['uid']])}}"  rel="nofollow" class="border border-success p-3 rounded-4">
                                 Activate Now
                                 </a>
                           </div>
                           </div>
                        </div>
                     </div>
                     @empty
                        <p>No Products</p>
                  @endforelse
               </div>
            </div>
            <div class="tab-pane fade" id="ten" role="tabpanel" aria-labelledby="ten-tab">
                <div class="row justify-content-center">
                  @forelse ($tenDaysProduct as $product)
                     <div class="my-3 col-xl-3 col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <div class="price_plan_box style_one  border border-dark">
                           <div class="tag">{{$product['data_quota_mb']}} GB</div>
                           <div class="inner_box">
                              <div class="top">
                                 <h2>{{$country['country_name']}} eSIM</h2>
                                 
                              </div>
                              <div class="mid">
                                 <h4>${{$product['price_usd']}}</h4>
                                 <div class="list_item_box style_two style_list">
                                    <ul class="list-inline">
                                       <li class="list_items pd_bottom_10">
                                          <small class="d-flex align-items-center">
                                             <span class="icon_bx">
                                                <i class=" icon-checked"></i>
                                             </span>
                                             <a class="nav_link" href="#" rel="&quot;nofollow&quot;">
                                                {{$product['validity_days']}} Days Data Pass </a>
                                          </small></li>
                                       <li class="list_items pd_bottom_10">
                                          <small class="d-flex align-items-center">
                                             <span class="icon_bx">
                                                <i class=" icon-checked"></i>
                                             </span>
                                             <a class="nav_link" href="#" rel="&quot;nofollow&quot;">
                                                {{$product['data_quota_mb']}} Gigabytes</a>
                                          </small></li>
                                    </ul>
                                 </div>
                              </div>
                              <div class="bottom">
                              <a href="{{route('cart',['country' => $country['country_name'], 'esimProduct' => $product['uid']])}}"  rel="nofollow" class="border border-success p-3 rounded-4">
                                 Activate Now
                                 </a>
                           </div>
                           </div>
                        </div>
                     </div>
                     @empty
                        <p>No Products</p>
                  @endforelse
                  </div>
            </div>
            <div class="tab-pane fade" id="fifteen" role="tabpanel" aria-labelledby="fifteen-tab">
                <div class="row justify-content-center">
                  @forelse ($fifteenDaysProduct as $product)
                     <div class="my-3 col-xl-3 col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <div class="price_plan_box style_one  border border-dark">
                           <div class="tag">{{$product['data_quota_mb']}} GB</div>
                           <div class="inner_box">
                              <div class="top">
                                 <h2>{{$country['country_name']}} eSIM</h2>
                                 
                              </div>
                              <div class="mid">
                                 <h4>${{$product['price_usd']}}</h4>
                                 <div class="list_item_box style_two style_list">
                                    <ul class="list-inline">
                                       <li class="list_items pd_bottom_10">
                                          <small class="d-flex align-items-center">
                                             <span class="icon_bx">
                                                <i class=" icon-checked"></i>
                                             </span>
                                             <a class="nav_link" href="#" rel="&quot;nofollow&quot;">
                                                {{$product['validity_days']}} Days Data Pass </a>
                                          </small></li>
                                       <li class="list_items pd_bottom_10">
                                          <small class="d-flex align-items-center">
                                             <span class="icon_bx">
                                                <i class=" icon-checked"></i>
                                             </span>
                                             <a class="nav_link" href="#" rel="&quot;nofollow&quot;">
                                                {{$product['data_quota_mb']}} Gigabytes</a>
                                          </small></li>
                                    </ul>
                                 </div>
                              </div>
                              <div class="bottom">
                              <a href="{{route('cart',['country' => $country['country_name'], 'esimProduct' => $product['uid']])}}"  rel="nofollow" class="border border-success p-3 rounded-4">
                                 Activate Now
                                 </a>
                           </div>
                           </div>
                        </div>
                     </div>
                     @empty
                        <p>No Products</p>
                  @endforelse
                  </div>
             </div>
             <div class="tab-pane fade" id="thirty" role="tabpanel" aria-labelledby="thirty-tab">
               <div class="row justify-content-center">
                 @forelse ($thirtyDaysProduct as $product)
                    <div class="my-3 col-xl-3 col-lg-6 col-md-6 col-sm-12 col-xs-12">
                       <div class="price_plan_box style_one  border border-dark">
                          <div class="tag">{{$product['data_quota_mb']}} GB</div>
                          <div class="inner_box">
                             <div class="top">
                                <h2>{{$country['country_name']}} eSIM</h2>
                                
                             </div>
                             <div class="mid">
                                <h4>${{$product['price_usd']}}</h4>
                                <div class="list_item_box style_two style_list">
                                   <ul class="list-inline">
                                      <li class="list_items pd_bottom_10">
                                         <small class="d-flex align-items-center">
                                            <span class="icon_bx">
                                               <i class=" icon-checked"></i>
                                            </span>
                                            <a class="nav_link" href="#" rel="&quot;nofollow&quot;">
                                             {{$product['validity_days']}} Days Data Pass </a>
                                         </small></li>
                                      <li class="list_items pd_bottom_10">
                                         <small class="d-flex align-items-center">
                                            <span class="icon_bx">
                                               <i class=" icon-checked"></i>
                                            </span>
                                            <a class="nav_link" href="#" rel="&quot;nofollow&quot;">
                                               {{$product['data_quota_mb']}} Gigabytes</a>
                                         </small></li>
                                   </ul>
                                </div>
                             </div>
                             <div class="bottom">
                             <a href="{{route('cart',['country' => $country['country_name'], 'esimProduct' => $product['uid']])}}"  rel="nofollow" class="border border-success p-3 rounded-4">
                                Activate Now
                                </a>
                          </div>
                          </div>
                       </div>
                    </div>
                    @empty
                       <p>No Products</p>
                 @endforelse
                 </div>
            </div>
             <div class="tab-pane fade" id="thirty" role="tabpanel" aria-labelledby="thirty-tab">
                 <div class="row justify-content-center">
                     @forelse ($thirtyDaysProduct as $product)
                        <div class="my-3 col-xl-4 col-lg-6 col-md-6 col-sm-12 col-xs-12">
                           <div class="price_plan_box style_one  border border-dark">
                              <div class="tag">{{$product['data_quota_mb']}} GB</div>
                              <div class="inner_box">
                                 <div class="top">
                                    <h2>{{$country['country_name']}} eSIM</h2>
                                    
                                 </div>
                                 <div class="mid">
                                    <h4>${{$product['price_usd']}}</h4>
                                    <div class="list_item_box style_two style_list">
                                       <ul class="list-inline">
                                          <li class="list_items pd_bottom_10">
                                             <small class="d-flex align-items-center">
                                                <span class="icon_bx">
                                                   <i class=" icon-checked"></i>
                                                </span>
                                                <a class="nav_link" href="#" rel="&quot;nofollow&quot;">
                                                   {{$product['validity_days']}} Days Data Pass </a>
                                             </small></li>
                                          <li class="list_items pd_bottom_10">
                                             <small class="d-flex align-items-center">
                                                <span class="icon_bx">
                                                   <i class=" icon-checked"></i>
                                                </span>
                                                <a class="nav_link" href="#" rel="&quot;nofollow&quot;">
                                                   {{$product['data_quota_mb']}} Gigabytes</a>
                                             </small></li>
                                       </ul>
                                    </div>
                                 </div>
                                 <div class="bottom">
                                 <a href="{{route('cart',['country' => $country['country_name'], 'esimProduct' => $product['uid']])}}"  rel="nofollow" class="border border-success p-3 rounded-4">
                                    Activate Now
                                    </a>
                              </div>
                              </div>
                           </div>
                        </div>
                        @empty
                           <p>No Products</p>
                     @endforelse
               </div>
             </div>
         </div>
    </div>
    @section('searchCountry')
    @endsection
 </section>

@endsection

{{-- @section('unlimitedplans')
   <section class="price-section">
      <div class="row">
         @if(isset($unlimitedLiteDaysProduct) && count($unlimitedLiteDaysProduct) > 0)
            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-xs-12">
               <div class="price_plan_box style_two  tag_enables border border-success">
                  <div class="tag">LITE <i class="bx bx-signal-5"></i></div>
                  <div class="inner_box">
                     <div class="top">
                        <h2>Unlimited</h2>
                        
                        <p> Best for Solo Travel</p>
                     </div>
                     <div class="mid">
                        <h4>${{$unlimitedLiteDaysProduct[0]['price_usd']}}</h4>
                     </div>
                     <p  class=" px-5"><em>{{$unlimitedLiteDaysProduct[0]['speed_policy']}}</em>
                  </p>
                  <p></p>
                     <div class="bottom">
                        <ul>
                           <li>
                              <span> Coverage in {{count($unlimitedLiteDaysProduct[0]['countries_supported'])}} Country(ies)</span>
                              <i class="fi fi-{{$country['country_iso2']}} "></i>
                           </li>
                           <li>
                              <span> Wi-Fi Hotspot Not Included</span>
                              <i class='bx bx-wifi-off' style="color: #078586; font-size: 22px;"></i>
                           </li>
                           <li>
                              <span> {{$product['validity_days']}} Days Validity </span>
                              <i class="fa fa-check" style="color: #078586;""></i>
                           </li>
                           <li>
                           <span> 100% Money Back Guarantee</span>
                           <i class="fa fa-check" style="color: #078586;""></i>
                        </li>
                        <a href="#">View eSIM Tech Specks</a>
                        </ul>
                        <a href="{{route('cart',['country' => $country['country_name'], 'esimProduct' => $unlimitedLiteDaysProduct[0]['uid']])}}" rel="&quot;nofollow&quot;" class="theme-btn two">
                        Activate 
                        </a>
                     </div>
                  </div>
               </div>
            </div>
         @endif
         @if(isset($unlimitedStandardDaysProduct) && count($unlimitedStandardDaysProduct) > 0)
            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-xs-12">
               <div class="price_plan_box style_two  tag_enables  border border-success">
                  <div class="tag">STANDARD <i class="bx bx-wifi"></i></div>
                  <div class="inner_box">
                     <div class="top">
                        <h2>Unlimited</h2>
                        <p>Best for Wi-Fi Sharing</p>
                     </div>
                     <div class="mid">
                        <h4>${{$unlimitedStandardDaysProduct[0]['price_usd']}}</h4>
                     </div>
                     <p  class=" px-5"><em>{{$unlimitedStandardDaysProduct[0]['speed_policy']}}</em>
                  </p>
                  <p></p>
                     <div class="bottom">
                        <ul>
                           <li>
                              <span> Coverage in {{count($unlimitedStandardDaysProduct[0]['countries_supported'])}}  Country(ies)</span>
                              <i class="fi fi-{{$country['country_iso2']}} "></i>
                           </li>
                           <li>
                              <span> Wifi Hotspot included</span>
                              <i class='bx bx-wifi' style="color: #078586; font-size: 22px;"></i>
                           </li>
                           <li>
                              <span> {{$product['validity_days']}} Days Validity</span>
                              <i class="fa fa-check" style="color: #078586;""></i>
                           </li>
                           <li>
                           <span> 100% Money Back Guarantee</span>
                           <i class="fa fa-check" style="color: #078586;""></i>
                        </li>
                        <a href="#">View eSIM Tech Specks</a>
                        </ul>
                        <a href="{{route('cart',['country' => $country['country_name'], 'esimProduct' => $unlimitedStandardDaysProduct[0]['uid']])}}" rel="&quot;nofollow&quot;" class="theme-btn two">
                        Activate 
                        </a>
                     </div>
                  </div>
               </div>
            </div>
         @endif
         @if(isset($unlimitedMaxDaysProduct) && count($unlimitedMaxDaysProduct) > 0)
            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-xs-12">
               <div class="price_plan_box style_two  tag_enables  border border-success">
                  <div class="tag">MAX <i class="bx bx-sort-up"></i></div>
                  <div class="inner_box">
                     <div class="top">
                        <h2>Unlimited</h2>
                        <p>Best for Groups</p>
                     </div>
                     <div class="mid">
                        <h4>${{$unlimitedMaxDaysProduct[0]['price_usd']}}</h4>
                     </div>
                     <p  class=" px-5"><em>{{$unlimitedMaxDaysProduct[0]['speed_policy']}}</em>
                  </p>
                  <p></p>
                     <div class="bottom">
                        <ul>
                           <li>
                              <span> Coverage in {{count($unlimitedMaxDaysProduct[0]['countries_supported'])}}  Country(ies)</span>
                              <i class="fi fi-{{$country['country_iso2']}} "></i>
                           </li>
                           <li>
                              <span> Wifi Hotspot included</span>
                              <i class='bx bx-wifi' style="color: #078586; font-size: 22px;"></i>
                           </li>
                           <li>
                              <span> {{$product['validity_days']}} Days Validity</span>
                              <i class="fa fa-check" style="color: #078586;""></i>
                           </li>
                           <li>
                           <span> 100% Money Back Guarantee</span>
                           <i class="fa fa-check" style="color: #078586;""></i>
                        </li>
                        <a href="#">View eSIM Tech Specks</a>
                        </ul>
                        <a href="{{route('cart',['country' => $country['country_name'], 'esimProduct' => $unlimitedMaxDaysProduct[0]['uid']])}}" rel="&quot;nofollow&quot;" class="theme-btn two">
                        Activate 
                        </a>
                     </div>
                  </div>
               </div>
            </div>
         @endif
      </div>
   </section>
@endsection --}}