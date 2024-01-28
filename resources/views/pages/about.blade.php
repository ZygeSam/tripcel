<!DOCTYPE html>
<html lang="en-US">

<head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
   <title>Tripcel</title>
   <!-- Fav Icon -->
   <link rel="icon" href={{asset("assets/images/FII.png")}} type="image/x-icon">
   <!-- Fav Icon -->
   <!-- Google Fonts -->
   <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Spartan%3A400%2C500%2C600%2C700%2C800%2C900%7CInter%3A300%2C400%2C500%2C600%2C700%2C800%2C900&amp;subset=latin%2Clatin-ext' type='text/css' media='all' />
   <!-- Google Fonts -->
   <!-- Style -->
   <link rel='stylesheet' href={{asset('assets/css/bootstrap.min.css')}} type='text/css' media='all' />
   <link rel='stylesheet' href={{asset('assets/css/owl.css')}} type='text/css' media='all' />
   <link rel='stylesheet' href={{asset('assets/css/swiper.min.css')}} type='text/css' media='all' />
   <link rel='stylesheet' href={{asset('assets/css/jquery.fancybox.min.css')}} type='text/css' media='all' />
   <link rel='stylesheet' href={{asset('assets/css/icomoon.css')}} type='text/css' media='all' />
   <link rel='stylesheet' href={{asset('assets/css/flexslider.css')}} type='text/css' media='all' />
   <link rel='stylesheet' href={{asset('assets/css/font-awesome.min.css')}} type='text/css' media='all' />
   <link rel='stylesheet' href={{asset('assets/css/style.css')}} type='text/css' media='all' />
   <link rel='stylesheet' href={{asset('assets/css/scss/elements/theme-css.css')}} type='text/css' media='all' />
   <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
   <link
  rel="stylesheet"
  href="https://cdn.jsdelivr.net/gh/lipis/flag-icons@7.0.0/css/flag-icons.min.css"
/>
   <!-- Style-->
   <!----woocommerce---->
   <link rel='stylesheet' href={{asset('assets/css/woocommerce-layout.css')}} type='text/css' media='all' />
   <link rel='stylesheet' href={{asset('assets/css/woocommerce.css')}} type='text/css' media='all' />
   <!----woocommerce---->
   <script type='text/javascript' src={{asset('assets/js/jquery-3.6.0.min.js')}}></script>
</head>
<body class="home theme-creote page-home-default-one">
   <div id="page" class="page_wapper hfeed site">
      <div id="wrapper_full" class="content_all_warpper">
         <!----page-header----->
         <div class="mini_cart_togglers fixed_cart">
            <div class="mini-cart-count">
               @if(is_null(session()->get('cart')))
                  0
               @else
                  {{count(session()->get('cart')['products'])}}
               @endif
            </div>
            <i class="icon-shopping-cart"></i>
         </div>
         <!----header----->
         <div class="header_area " id="header_contents">
            <div class="position-relative">
               <header class="header header_default style_nine  head_absolute  get_sticky_header">
                  @include('partials.nav')
               </header>
            </div>
            <!-- end of the loop -->
         </div>
         <!----header end----->
         <!----header end----->
         {{-- <div class="page_header_default style_one">
            <div class="parallax_cover">
               <div class="simpleParallax"><img src={{asset("assets/images/esimMobile.png")}} style="background:cover;" alt="bg_image" class="cover-parallax"></div>
            </div>
         </div> --}}
<div id="content" class="site-content py-5 my-5">
   <!---about--->
   <div class="container-fluid my-5">
      <div class="row px-2">
         <div class="p-5 col-md-5">
            <div class="title_all_box style_one dark_color ">
                  <p class="fw-bold fs-1 lh-base" style=" color: #058687"> Experience Unlimited 
                     Internet Connectivity with
                     Tripcel eSIM.</p><br>
                  <p class="fs-3 lh-base">
                     Tripcel eSIM provides unlimited travel connectivity! Think of a world where you can travel the world without worrying about staying connected. As avid
                     travellers, we have experienced the frustrations of being without internet in unfamiliar places—juggling SIM cards and paying exorbitant roaming fees.
                  </p>
                  <p class="fs-3 lh-base">
                     So, Tripcel was created with the goal of changing the way you connect while you are traveling. Our mission is to provide a simple, affordable travel data plan
                     without connectivity issues. We believe travel should be free, exploratory, and culturally diverse, not restricted or expensive.
                  </p>
                  <p class="fs-3 lh-base">
                     Tripcel is a revolutionary solution that connects your eSIM-compatible smartphone, tablet, or PC to over 200+ countries in under 2 minutes. No more SIM
                     cards or SIM swapping—our technology ensures easy connectivity regardless of your location.
                  </p>
                  <p class="fs-3 lh-base">
                     Make Tripcel your travel companion to share memories, navigate easily, and stay in touch with loved ones.
                  </p>
                  <a href="{{route('countries')}}" class="theme-btn three px-5 text-white" style="background-color: #ff8f47; font-size:0.7em">Get Your Travel eSIM Plan</a>  
            </div>
            <!--===============spacing==============-->
            <div class="pd_bottom_10"></div>
            <!--===============spacing==============-->
         </div>
         <div class="col-md-7 m-0 p-0" >
            <div class=" h-full w-full"  style="width:100%; height:100%; background: url('{{asset('assets/images/HowItWorks1.png')}}'); background-repeat: no-repeat;background-position: center;background-size: cover;border-radius: 20px;">
            </div>
         </div>
      </div>
      <div class="row">
         <div class="col-12 my-5 mx-auto"style="width:75%;">
            <h1 class="text-center text-muted">Welcome to a world where travel knows
               no boundaries and connectivity is as
               effortless as breathing
               </h1>
         </div>
      </div>
   </div>
   <!---about end--->
   <!---service--->
   
   <!--===============spacing==============-->
   <section class="tab-section ">
      <!--===============spacing==============-->
          <div class="pd_top_100"></div>
      <!--===============spacing==============-->
         <div class="container">
            <div class="row text-center py-2" >
               <p class="fs-4">Unlock Seamless Connectivity with Tripcel eSIM</p>
               <p class="fs-1 fw-bold lh-base" style=" color: #058687">Why Tripcel?</p>
               <div class="tabs_all_box  tabs_all_box_start type_one">
                  <div class="tab_over_all_box">
                     <div class="tabs_header clearfix">
                        <ul class="showcase_tabs_btns nav-pills nav clearfix">
                           <li class="nav-item">
                              <a class="s_tab_btn nav-link active" data-tab="#tabtabone">Seamless Connectivity Everywhere</a>
                           </li>
                           <li class="nav-item">
                              <a class="s_tab_btn nav-link" data-tab="#tabtabtwo">Innovative eSIM Technology</a>
                           </li>
                           <li class="nav-item">
                              <a class="s_tab_btn nav-link" data-tab="#tabtabthree">Affordable Travel Data Plans</a>
                           </li>
                           <li class="nav-item">
                              <a class="s_tab_btn nav-link" data-tab="#tabtabfour">Freedom to Explore Without Restrictions</a>
                           </li>
                           <li class="nav-item">
                              <a class="s_tab_btn nav-link" data-tab="#tabtabfive">Personalized Boutique Experience</a>
                           </li>
                           <li class="nav-item">
                              <a class="s_tab_btn nav-link" data-tab="#tabtabsix">Reliable and Consistent Service</a>
                           </li>
                        </ul>

                     </div>
                     <div class="s_tab_wrapper">
                        <div class="s_tabs_content">
                           <div class="s_tab fade active-tab show" id="tabtabone">
                              <div class="tab_content one" style="background-image:url(assets/images/tab-image.jpg)">
                                 <div class="content_image">
                                    <h6>Why Tripcel</h6>

                                    <p class="fs-4 lh-base">In over 200 countries, Tripcel provides unmatched connectivity, allowing you to stay connected anywhere. Travel without searching for local SIM cards or dealing with connectivity issues.</p>

                                 </div>
                              </div>
                           </div>
                           <div class="s_tab fade" id="tabtabtwo">
                              <div class="tab_content one" style="background-image:url(assets/images/blog/blog-image-8.jpg)">
                                 <div class="content_image">
                                    <h6>Why Tripcel</h6>

                                    <p class="fs-4 lh-base">Tripcel's eSIM technology advances travel connectivity. Our innovative solution lets you connect in under 2 minutes with your eSIM-compatible smartphone, tablet, or PC without SIM cards.</p>
                                 </div>
                              </div>
                           </div>
                           <div class="s_tab fade" id="tabtabthree">
                              <div class="tab_content one" style="background-image:url(assets/images/banner-five-bg.jpg)">
                                 <div class="content_image">
                                    <h6>Why Tripcel</h6>

                                    <p class="fs-4 lh-base">We know how important budgeting is when traveling. Instead of expensive roaming charges, Tripcel offers affordable travel data plans. You can enjoy seamless connectivity without breaking the bank.</p>

                                 </div>
                              </div>
                           </div>
                           <div class="s_tab fade" id="tabtabfour">
                              <div class="tab_content one" style="background-image:url(assets/images/service-sidebar-contact-bg.jpg)">
                                 <div class="content_image">
                                    <h6>Why Tripcel</h6>

                                    <p class="fs-4 lh-base">Travel should be about freedom and exploration, not about limitations. With Tripcel, bypass connectivity issues and fully experience new cultures. Helping you travel freely is our goal.</p>

                                 </div>
                              </div>
                           </div>
                           <div class="s_tab fade" id="tabtabfive">
                              <div class="tab_content one" style="background-image:url(assets/images/page-header-default.jpg)">
                                 <div class="content_image">
                                    <h6>Why Tripcel</h6>

                                    <p class="fs-4 lh-base">Tripcel values personalized travel. We personalize your boutique experience. Join our Tripcel family and experience our meticulousness.
                                    </p>

                                 </div>
                              </div>
                           </div>
                           <div class="s_tab fade" id="tabtabsix">
                              <div class="tab_content one" style="background-image:url(assets/images/page-header-default.jpg)">
                                 <div class="content_image">
                                    <h6>Why Tripcel</h6>

                                    <p class="fs-4 lh-base">Trust is key to connectivity. Tripcel provides reliable, consistent services. Our service lets you share your travel memories and stay in touch with loved ones.
                                    </p>

                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      <!--===============spacing==============-->
         <div class="pd_bottom_90"></div>
      <!--===============spacing==============-->
   </section>

@include('partials.otherpagesfooter')
<!---==============mobile menu =================-->
<div class="crt_mobile_menu">
 <div class="menu-backdrop"></div>
 <nav class="menu-box">
    <div class="close-btn"><i class="icon-close"></i></div>
    <form role="search" method="get" action="#">
       <input type="search" class="search" placeholder="Search..." value="" name="s" title="Search" />
       <button type="submit" class="sch_btn"> <i class="icon-search"></i></button>
    </form>
    <div class="menu-outer">
       <!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header-->
    </div>
 </nav>
</div>
<!---==============mobile menu end =================-->
<!---==============search popup =================-->
<div id="search-popup" class="search-popup">
 <div class="close-search"><i class="fa fa-times"></i></div>
 <div class="popup-inner">
    <div class="overlay-layer"></div>
    <div class="search-form">
       <fieldset>
          <form role="search" method="get" action="#">
             <input type="search" class="search" placeholder="Search..." value="" name="s" title="Search" />
             <button type="submit" class="sch_btn"> <i class="icon-search"></i></button>
          </form>
       </fieldset>
    </div>
 </div>
</div>
<!---==============search popup end =================-->
<!---==============modal popup =================-->
<div class="modal_popup one">
 <div class="modal-popup-inner">
    <div class="close-modal"><i class="fa fa-times"></i></div>
    <div class="modal_box">
       <div class="row">
          <div class="col-lg-5 col-md-12 form_inner">
             <div class="form_content">
          
                    
                   <form class="contact-form" method="post" action="">
                      <p>
                         <label> Your name<br />
                           <input type="text" name="name" value="" size="40"   aria-required="true" aria-invalid="false" placeholder="Enter Your Name" /> 
                           <br />
                            <i class="fa fa-user"></i><br />
                         </label>
                      </p>
                      <p><label> Your email<br />
                          <input type="email" name="email" value="" size="40" aria-required="true" aria-invalid="false"  placeholder="Enter Your Email" />
                          <br />
                         <i class="fa fa-envelope"></i><br />
                         </label>
                      </p>
                      <p>
                         <label> Subject<br />
                           <input type="text" name="subject" value="" size="40" aria-required="true" aria-invalid="false"  placeholder="Enter Your Subject" /> 
                           <br />
                            <i class="fa fa-folder"></i><br />
                         </label>
                      </p>
                      <p>
                         <label> Your message (optional)<br />
                            <textarea name="message"  cols="40" rows="10" class="wpcf7-form-control wpcf7-textarea"  aria-invalid="false" placeholder="Enter Your Message"></textarea> 
                            <br />
                            <i class="fa fa-comments"></i><br />
                         </label>
                      </p>
                      <p><input type="submit" value="Submit" /></p>
                   
                   </form>
            
             </div>
          </div>
          <div class="col-lg-7 col-md-12 about_company_inner">
             <div class="abt_content">
                <div class="logo">
                   <img src= "{{asset('assets/images/logo-default.png')}}" alt="img" class="company_logo_modal">
                </div>
                <div class="text">
                   <p> The great explorer of the truth, the master-builder of human happiness no one rejects
                      dislikes avoids pleasure itself because it is pleasure but because know who do not those
                      how to pursue pleasures rationally encounter consequences that are extremely painful
                      desires to obtain.</p>
                   <a href="#">Read More</a>
                </div>
                <div class="post_contet_modal">
                   <h2> Latest News</h2>
                   <div class="post_enable">
                      <div class="modal_post_grid">
                         <a href="#">
                            <img width="852" height="812" src="{{asset('assets/images/blog/blog-image-9.jpg')}}"
                               class="main_img wp-post-image" alt="img" />
                         </a>
                      </div>
                      <div class="modal_post_grid">
                         <a href="#">
                            <img width="852" height="812" src="{{asset('assets/images/blog/blog-image-8.jpg')}}"
                               class="main_img wp-post-image" alt="img" />
                         </a>
                      </div>
                      <div class="modal_post_grid">
                         <a href="#">
                            <img width="852" height="812" src="{{asset('assets/images/blog/blog-image-7.jpg')}}"
                               class="main_img wp-post-image" alt="img" />
                         </a>
                      </div>
                      <div class="modal_post_grid">
                         <a href="#">
                            <img width="852" height="812" src="{{('assets/images/blog/blog-image-6.jpg')}}"
                               class="main_img wp-post-image" alt="img" />
                         </a>
                      </div>
                      <div class="modal_post_grid">
                         <a href="#">
                            <img width="852" height="812" src="{{('assets/images/blog/blog-image-5.jpg')}}"
                               class="main_img wp-post-image" alt="img" />
                         </a>
                      </div>
                   </div>
                </div>
                <div class="copright">
                   © 2023 Creote. All Rights Reserved.
                </div>
             </div>
          </div>
       </div>
    </div>
 </div>
</div>
<!---==============modal popup end=================-->
<!---==============cart=================-->
<div class="side_bar_cart" id="mini_cart">
 <div class="cart_overlay"></div>
 <div class="cart_right_conten">
    <div class="close">
       <div class="close_btn_mini"><i class="icon-close"></i></div>
    </div>
    <div class="cart_content_box">
       <div class="contnet_cart_box">
          <div class="widget_shopping_cart_content" >
             @if(!is_null(session()->get('cart')))
                @forelse(session()->get('cart')['products'] as $product)
                   <tr class="woocommerce-cart-form__cart-item cart_item p-5">
                      <td class="product-remove" style="background-color: #078586; color: white" >
                         <a href="{{route('cartIcon.remove', $product[0]['uid'])}}" style="background-color: #078586; color: white"  class="py-2 mb-2 btn remove" aria-label="Remove this item" data-product_id="2650" data-product_sku="">×</a>						
                      </td>
                      <td class="product-name" data-title="Product">
                      <p>Package : {{$product[0]['name']}}</p>
                      <p>Starting Date:@php echo date("Y-m-d", strtotime("now"));  @endphp</p> 
                      <p> Daily Data: {{$product[0]['data_quota_mb']}}GB</p>
                      <p>Throttle: 1Mbps</p>					
                      </td>
                      <td class="product-price" data-title="Price">
                      <span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol"></span>${{$product[0]['price_usd']}}</bdi></span>						
                      </td>
                   </tr>
                   <hr>
                   <br>
                   @empty
                   <p class="woocommerce-mini-cart__empty-message">No products in the cart.</p>
                @endforelse
                @if(count(session()->get('cart')['products']) > 0)
                   <div class="wc-proceed-to-checkout text-center" >
                      <a href="{{route('checkout')}}" style="background-color: #078586; color: white" class=" p-4 checkout-button button alt wc-forward wp-element-button">
                      Checkout</a>
                   </div>
                @endif
                
             @else
             <p class="woocommerce-mini-cart__empty-message">There are no products in the cart.</p>
             @endif
          </div>
       </div>
    </div>
 </div>
</div>
<!---==============cart=================-->

</div>
<!-- Back to top with progress indicator-->
<div class="prgoress_indicator">
<svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
 <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
</svg>
</div>
<!---========================== javascript ==========================-->
<script type='text/javascript' src={{asset('assets/js/bootstrap.min.js')}} defer></script>
<script type='text/javascript' src={{asset('assets/js/jquery.fancybox.js')}} defer></script>
<script type='text/javascript' src={{asset('assets/js/jQuery.style.switcher.min.js')}} defer></script>
<script type='text/javascript' src={{asset('assets/js/jquery.flexslider-min.js')}} defer></script>
<script type='text/javascript' src={{asset('assets/js/owl.js')}} defer></script>
<script type='text/javascript' src={{asset('assets/js/swiper.min.js')}} defer></script>
<script type='text/javascript' src={{asset('assets/js/isotope.min.js')}} defer></script>
<script type='text/javascript' src={{asset('assets/js/simpleParallax.min.js')}} defer></script>
<!-- main-js -->
<script type='text/javascript' src={{asset('assets/js/creote-extension.js')}}></script>
<!---========================== javascript ==========================-->
<script>
 $(document).ready(function() {
  $.ajax({
      url: "{{ route('getCountries') }}",
      type: "GET",
      dataType: "json",
      success: function(data) {
       var countriesList1 = $("#countries-list1");
          var countriesList2 = $("#countries-list2");
          var countriesList3 = $("#countries-list3");
          for (var i = 0; i < 5; i++) {
              var listItem = $("<li>");
              var link = $("<a>").attr("href", "{{ route('country', ['country' => ':country']) }}".replace(':country', data[i].country_name)).text(data[i].country_name);
              var icon = $("<i>").addClass("fi fi-" + data[i].country_iso2 + " p-2 mx-1");
              var small = $("<small>").addClass("d-flex align-items-center").append(icon).append(link);
              listItem.append(small);
              countriesList1.append(listItem);
          }
          for (var i = 20; i < 25; i++) {
              var listItem = $("<li>");
              var link = $("<a>").attr("href", "{{ route('country', ['country' => ':country']) }}".replace(':country', data[i].country_name)).text(data[i].country_name);
              var icon = $("<i>").addClass("fi fi-" + data[i].country_iso2 + " p-2 mx-1");
              var small = $("<small>").addClass("d-flex align-items-center").append(icon).append(link);
              listItem.append(small);
              countriesList2.append(listItem);
          }
          for (var i = 40; i < 45; i++) {
              var listItem = $("<li>");
              var link = $("<a>").attr("href", "{{ route('country', ['country' => ':country']) }}".replace(':country', data[i].country_name)).text(data[i].country_name);
              var icon = $("<i>").addClass("fi fi-" + data[i].country_iso2 + " p-2 mx-1");
              var small = $("<small>").addClass("d-flex align-items-center").append(icon).append(link);
              listItem.append(small);
              countriesList3.append(listItem);
          }
          var link = $("<a>").addClass("nav_link").attr("href", "{{ route('countries') }}").text("Get 194 Destinations");
          var u = $("<u>").append(link);
          countriesList2.after(u);

          countriesList3.after('<h6>Popular ESim Destinations</h6>');
  }
 });
 });
</script>
</body>

<!-- Mirrored from themepanthers.com/html/creote-html/home-12.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 14 Dec 2023 22:57:02 GMT -->
</html>

{{-- @extends('layouts.purchase')
@section('pageTitle', 'About Us')
@section('previousPageTitle', 'Home')
@section('presentPageTitle', 'About Us')
@section('content')
<div id="content" class="site-content ">
   <!---about--->
   <section class="about-section">
      <!--===============spacing==============-->
      <div class="pd_top_90"></div>
      <!--===============spacing==============-->
      <div class="container">
         <div class="row">
            <div class="col-xl-6 col-lg-12 ">
               <div class="about_content position-relative z_99">
                  <div class="title_all_box style_one text-left  dark_color">
                     <div class="title_sections">
                        <div class="before_title">We are Leaders</div>
                        <h2> in Digital Telecommunication</h2>
                     </div>
                  </div>
                  <!--===============spacing==============-->
                  <div class="pd_bottom_15"></div>
                  <!--===============spacing==============-->
                  <!--===============spacing==============-->
                  <div class="pd_bottom_20"></div>
                  <!--===============spacing==============-->
                  <div class="description_box">
                     <p>Tripcel eSIM provides unlimited travel connectivity! Think of a world where you can travel the world without worrying about staying connected. 

                        As avid travellers, we have experienced the frustrations of being without internet in unfamiliar places—juggling SIM cards and paying exorbitant roaming fees. So, Tripcel was created with the goal of changing the way you connect while you are traveling.
                        
                        Our mission is to provide a simple, affordable travel data plan without connectivity issues. We believe travel should be free, exploratory, and culturally diverse, not restricted or expensive. 
                        
                        Tripcel is a revolutionary solution that connects your eSIM-compatible smartphone, tablet, or PC to over 200+ countries in under 2 minutes. No more SIM cards or SIM swapping—our technology ensures easy connectivity regardless of your location.
                        
                        Tripcel is more than a connection—it is a personal journey. We have created a boutique experience to meet your specific needs as a traveler. 
                        
                        From the moment you become a part of our Tripcel family, you'll sense the personal touch and attention to detail that set us apart.
                        
                        Enjoy uninterrupted connectivity on your next adventure. Make Tripcel your travel companion to share memories, navigate easily, and stay in touch with loved ones. 
                        
                        Welcome to a world where travel knows no boundaries and connectivity is as effortless as breathing. 
                     </p>
                     <h3 class="pt-3">Welcome to Tripcel</h3>
                  </div>
                  <!--===============spacing==============-->
                  <div class="pd_bottom_25"></div>
                  <div class="theme_btn_all color_one">
                     <a href="{{route('contact')}}" rel="nofollow" class="theme-btn five">Contact us<i class="icon-right-arrow"></i></a>
                  </div>
                  <!--===============spacing==============-->
                  <div class="row gutter_15px">
                     <div class="col-lg-6 col-md-12">
                        <div class="icon_box_all  style_two">
                           <!--===============spacing==============-->
                           <div class="pd_bottom_25"></div>
                           <!--===============spacing==============-->
                        </div>
                     </div>
                  </div>

                  
               </div>
            </div>
            <div class="col-xl-6 col-lg-12">
               <div class="image_boxes style_two">
                  <img src="assets/images/shape-1.png" class="background_image" alt="image">
                  <div class="image one">
                     <img src="assets/images/about/about-6.png" class="img-fluid" alt="image">
                  </div>
                  <div class="image two">
                     <img src={{asset("assets/images/esmdisplay.jpg")}} class="img-fluid" alt="image">                     
                  </div>
                  <div class="authour_quotes">
                     <i class="icon-quote"></i>
                     <h6>Redefining connectivity</h6>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!--===============spacing==============-->
      <div class="pd_bottom_70"></div>
      <!--===============spacing==============-->
   </section>
   <!---about end--->
   <!---service--->
   <section class="service-icon-section bg_light_1">
   <!--===============spacing==============-->
   <div class="pd_top_90"></div>
   <!--===============spacing==============-->
      <div class="container">
         <div class="row">
            <div class="col-lg-12">
               <div class="title_all_box style_one text-center dark_color">
                  <div class="title_sections">
                     <div class="before_title">Our Business</div>
                     <h2 class="title">Stand Out From The Rest</h2>
                  </div>
                  <!--===============spacing==============-->
                  <div class="pd_bottom_20"></div>
                  <!--===============spacing==============-->
               </div>
            </div>
         </div>
         <div class="row">
            <div class="col-xl-4 col-lg-6 col-md-12 col-sm-12 col-xs-12">
               <div class="simple_image_boxes parallax_cover height_264px">
                     <img src="assets/images/icon-img-ab-1.jpg" class="simp_img cover-parallax" alt="image">
               </div>
               <!--===============spacing==============-->
               <div class="pd_bottom_20"></div>
               <!--===============spacing==============-->
               <div class="icon_box_all style_three">
                  <div class="icon_content ">
                     <div class="icon">
                        <span class=" icon-bow-and-arrow"></span>
                     </div>
                     <div class="txt_content">
                        <h3><a href="#" target="_blank" rel="nofollow">Our Mission</a></h3>
                        <p>Our mission is to redefine travel by providing seamless connectivity to travelers worldwide with a simple, affordable travel data plan. 

                           We aim to remove communication barriers so every traveler can explore the world. Through cutting-edge technology and personalized services, we empower people to travel freely and create unforgettable memories.
                           
                           </p>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-xl-4 col-lg-6 col-md-12 col-sm-12 col-xs-12 mt-4 mt-lg-0 mt-xl-0">
               <div class="icon_box_all style_three">
                  <div class="icon_content ">
                     <div class="icon">
                        <span class=" icon-growth"></span>
                     </div>
                     <div class="txt_content">
                        <h3><a href="#" target="_blank" rel="nofollow">Our Core Values</a></h3>
                        <p>We pride ourselves in these values and we make sure every of our staff exhibit them</p>
                        <ul>
                           <li><b>Innovation:</b>
                              Our passion for innovation drives us to find new ways to improve travel connectivity. We use technology to stay ahead of the competition and offer cutting-edge services.
                              </li>
                           <li><b>Customer-centricity:</b>
                              Our customers are at the heart of everything we do. We tailor experiences to each traveler's needs and exceed expectations.
                           </li>
                           <li><b>Reliability:</b>
                              Trust is the foundation of our brand. Tripcel provides reliable and consistent connectivity solutions worldwide, ensuring customer trust.

                           </li>
                           <li><b>Freedom:</b>
                              We believe in the freedom to explore without boundaries. Our services remove connectivity barriers so travelers can fully experience diverse cultures and experiences.
                           </li>
                           <li><b>Integrity: </b>
                              Honesty and transparency are the pillars of our interactions. We respect customers, partners, and colleagues and conduct business ethically.
                           </li>
                           <li>
                              <b>Adaptability:</b>
                              Travel and technology are dynamic, so we adapt. We adapt our services to meet customer and travel industry needs by being agile and responsive.
                           </li>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-xl-4 col-lg-6 col-md-12 col-sm-12 col-xs-12 mt-4 mt-lg-4 mt-xl-0">
               <div class="icon_box_all style_three">
                  <div class="icon_content ">
                     <div class="icon">
                        <span class=" icon-binoculars"></span>
                     </div>
                     <div class="txt_content">
                        <h3><a href="#" target="_blank" rel="nofollow">Our Vision</a></h3>
                        <p>Tripcel aims to lead the world in innovative travel connectivity solutions. We want to make connectivity easy so travelers can connect with people, cultures, and experiences. 

                           We push boundaries and embrace advancements to set new standards in the travel industry, making Tripcel the top choice for travelers seeking unmatched connectivity.
                           </p>
                     </div>
                  </div>
               </div>
               <!--===============spacing==============-->
               <div class="pd_bottom_20"></div>
               <!--===============spacing==============-->
               <div class="simple_image_boxes  height_264px">
                  <img src="assets/images/icon-img-ab-2.jpg" class="simp_img img-fluid" alt="image">
               </div>
            </div>
         </div>
      </div>
   <!--===============spacing==============-->
   <div class="pd_top_90"></div>
   <!--===============spacing==============-->
   </section>
   <!---service end--->
   <!---tab---->
   <section class="tabs_all_box  tabs_all_box_start type_three my-5 py-5">
      <div class="tab_over_all_box">
         <div class="tabs_header clearfix">
            <ul class="showcase_tabs_btns nav-pills nav   clearfix">
               <li class="nav-item"><a class="s_tab_btn nav-link active" data-tab="#thereetabtabone">Inclusive Global Coverage</a></li>
               <li class="nav-item"><a class="s_tab_btn nav-link" data-tab="#thereetabtabtwo">Tech-Driven Innovation</a></li>
               <li class="nav-item"><a class="s_tab_btn nav-link" data-tab="#thereetabtabthree">Integrity and Transparency</a></li>
               <li class="nav-item"><a class="s_tab_btn nav-link" data-tab="#thereetabtabfour">Confidence in Uninterrupted Connectivity</a></li>
            </ul>
         </div>
         <div class="s_tab_wrapper">
            <div class="s_tabs_content">
               <div class="s_tab fade active-tab show" id="thereetabtabone">
                  <div class="tab_content one">
                     <div class="image">
                        <img decoding="async" src="../assets/images/cal-to-action.jpg" alt="img">  
                     </div>
                     <div class="content_bx">
                        <h4 class="lh-base">Why Tricel?</h4>
                        <p class="fs-4 lh-base">Tripcel provides global coverage for popular and off-the-beaten-path destinations. Throughout your adventures, we want to keep you connected.
                        </p>
                     </div>
                  </div>
               </div>
               <div class="s_tab fade" id="thereetabtabtwo">
                  <div class="tab_content one">
                     <div class="image">
                        <img decoding="async" src="../assets/images/cal-to-action-2.jpg" alt="img">  
                     </div>
                     <div class="content_bx">
                        <h4 class="lh-base">Why Tripcel ?</h6>
                        <p class="fs-4 lh-base">Tripcel thrives on innovation. Our tech-driven approach gives you the latest travel connectivity advances. Our innovative solutions keep you ahead.
                        </p>
                     </div>
                  </div>
               </div>
               <div class="s_tab fade" id="thereetabtabthree">
                  <div class="tab_content one">
                     <div class="image">
                        <img decoding="async" src="../assets/images/expertise-bg-1.jpg" alt="img">  
                     </div>
                     <div class="content_bx">
                        <h4 class=" lh-base">Why Tripcel?</h4>
                        <p class="fs-5 lh-base">Tripcel conducts business with integrity and transparency. We value honesty with customers, partners, and colleagues. Tripcel provides trustworthy travel connectivity.
                        </p>
                     </div>
                  </div>
               </div>
               <div class="s_tab fade" id="thereetabtabfour">
                  <div class="tab_content one">
                     <div class="image">
                        <img decoding="async" src="../assets/images/expertise-bg-1.jpg" alt="img">  
                     </div>
                     <div class="content_bx">
                        <h4 class=" lh-base">Why Tripcel?</h4>
                        <p class="fs-5 lh-base">Go on your next adventure knowing Tripcel will provide uninterrupted connectivity. Stay in touch with loved ones, share your travel memories, and navigate easily. Tripcel ensures connectivity-free travel. 
                        </p>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>   
   <section class="tab-section bg_op_1" style="background-image:url({{asset('assets/images/tab-sec-bg.jpg')}});">
      <!--===============spacing==============-->
          <div class="pd_top_100"></div>
      <!--===============spacing==============-->
         <div class="container">
            <div class="row">
               <div class="tabs_all_box  tabs_all_box_start type_one">
                  <div class="tab_over_all_box">
                     <div class="tabs_header clearfix">
                        <ul class="showcase_tabs_btns nav-pills nav   clearfix">
                           <li class="nav-item">
                              <a class="s_tab_btn nav-link active" data-tab="#tabtabone">Seamless Connectivity Everywhere</a>
                           </li>
                           <li class="nav-item">
                              <a class="s_tab_btn nav-link" data-tab="#tabtabtwo">Innovative eSIM Technology</a>
                           </li>
                           <li class="nav-item">
                              <a class="s_tab_btn nav-link" data-tab="#tabtabthree">Affordable Travel Data Plans</a>
                           </li>
                           <li class="nav-item">
                              <a class="s_tab_btn nav-link" data-tab="#tabtabfour">Freedom to Explore Without Restrictions</a>
                           </li>
                           <li class="nav-item">
                              <a class="s_tab_btn nav-link" data-tab="#tabtabfive">Personalized Boutique Experience</a>
                           </li>
                           <li class="nav-item">
                              <a class="s_tab_btn nav-link" data-tab="#tabtabsix">Reliable and Consistent Service</a>
                           </li>
                        </ul>

                     </div>
                     <div class="s_tab_wrapper">
                        <div class="s_tabs_content">
                           <div class="s_tab fade active-tab show" id="tabtabone">
                              <div class="tab_content one" style="background-image:url(assets/images/tab-image.jpg)">
                                 <div class="content_image">
                                    <h6>Why Tripcel</h6>

                                    <p class="fs-4 lh-base">In over 200 countries, Tripcel provides unmatched connectivity, allowing you to stay connected anywhere. Travel without searching for local SIM cards or dealing with connectivity issues.</p>

                                 </div>
                              </div>
                           </div>
                           <div class="s_tab fade" id="tabtabtwo">
                              <div class="tab_content one" style="background-image:url(assets/images/blog/blog-image-8.jpg)">
                                 <div class="content_image">
                                    <h6>Why Tripcel</h6>

                                    <p class="fs-4 lh-base">Tripcel's eSIM technology advances travel connectivity. Our innovative solution lets you connect in under 2 minutes with your eSIM-compatible smartphone, tablet, or PC without SIM cards.</p>
                                 </div>
                              </div>
                           </div>
                           <div class="s_tab fade" id="tabtabthree">
                              <div class="tab_content one" style="background-image:url(assets/images/banner-five-bg.jpg)">
                                 <div class="content_image">
                                    <h6>Why Tripcel</h6>

                                    <p class="fs-4 lh-base">We know how important budgeting is when traveling. Instead of expensive roaming charges, Tripcel offers affordable travel data plans. You can enjoy seamless connectivity without breaking the bank.</p>

                                 </div>
                              </div>
                           </div>
                           <div class="s_tab fade" id="tabtabfour">
                              <div class="tab_content one" style="background-image:url(assets/images/service-sidebar-contact-bg.jpg)">
                                 <div class="content_image">
                                    <h6>Why Tripcel</h6>

                                    <p class="fs-4 lh-base">Travel should be about freedom and exploration, not about limitations. With Tripcel, bypass connectivity issues and fully experience new cultures. Helping you travel freely is our goal.</p>

                                 </div>
                              </div>
                           </div>
                           <div class="s_tab fade" id="tabtabfive">
                              <div class="tab_content one" style="background-image:url(assets/images/page-header-default.jpg)">
                                 <div class="content_image">
                                    <h6>Why Tripcel</h6>

                                    <p class="fs-4 lh-base">Tripcel values personalized travel. We personalize your boutique experience. Join our Tripcel family and experience our meticulousness.
                                    </p>

                                 </div>
                              </div>
                           </div>
                           <div class="s_tab fade" id="tabtabsix">
                              <div class="tab_content one" style="background-image:url(assets/images/page-header-default.jpg)">
                                 <div class="content_image">
                                    <h6>Why Tripcel</h6>

                                    <p class="fs-4 lh-base">Trust is key to connectivity. Tripcel provides reliable, consistent services. Our service lets you share your travel memories and stay in touch with loved ones.
                                    </p>

                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      <!--===============spacing==============-->
         <div class="pd_bottom_90"></div>
      <!--===============spacing==============-->
   </section>
   <!---tab-end--->
     <!---team--->
     <section class="team-section">
      <!--===============spacing==============-->
      <div class="pd_top_80"></div>
      <!--===============spacing==============-->
      <div class="container">
         <div class="row align-items-end">
            <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-xs-12">
               <div class="title_all_box style_one  dark_color">
                  <div class="title_sections">
                     <div class="before_title"> Meet the Team</div>
                     <h2>Professional Individuals</h2>
                  </div>
               </div>
            </div>
            <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-xs-12">
               <div class="description_box">
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quasi placeat voluptates autem! Laborum explicabo totam, praesentium soluta provident modi non.</p>
                  <!--===============spacing==============-->
                  <div class="mr_bottom_20"></div>
                  <!--===============spacing==============-->
               </div>
            </div>
            <!--===============spacing==============-->
            <div class="mr_bottom_30"></div>
            <!--===============spacing==============-->
         </div>
         <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
               <div class="team_box style_one">
                  <div class="team_box_outer">
                     <div class="member_image">
                        <img src="assets/images/team/team-1.jpg" alt="team image">
                     </div>
                     <div class="about_member">
                        <div class="authour_details">
                           <div class="button_view">
                                 <a class="theme-btn one text-light">
                                 Amelia Margaret
                              </a>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <!--===============spacing==============-->
               <div class="mr_bottom_30"></div>
               <!--===============spacing==============-->
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
               <div class="team_box style_one">
                  <div class="team_box_outer">
                     <div class="member_image">
                        <img src="assets/images/team/team-2.jpg" alt="team image">
                     </div>
                     <div class="about_member">
                        <div class="authour_details">
                           <div class="button_view">
                              <a href="#" target="_blank" rel="nofollow" class="theme-btn one"> 
                                 Andrew Cameron
                              </a>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <!--===============spacing==============-->
               <div class="mr_bottom_30"></div>
               <!--===============spacing==============-->
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
               <div class="team_box style_one">
                  <div class="team_box_outer">
                     <div class="member_image">
                        <img src="assets/images/team/team-3.png" alt="team image">
                     </div>
                     <div class="about_member">
                        <div class="authour_details">
                           <div class="button_view">
                              <a href="#" target="_blank" rel="nofollow" class="theme-btn one"> 
                                 Sofia Charlotte
                              </a>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <!--===============spacing==============-->
               <div class="mr_bottom_30"></div>
               <!--===============spacing==============-->
            </div>
         </div>
      </div>
      <!--===============spacing==============-->
      <div class="pd_bottom_60"></div>
      <!--===============spacing==============-->
     </section>
   <!---team-end--->
   <!--===============spacing==============-->
   <div class="pd_bottom_40"></div>
   <!--===============spacing==============-->
</section>
<!---newsteller end--->
</div>
@endsection --}}