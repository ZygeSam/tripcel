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
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lipis/flag-icons@7.0.0/css/flag-icons.min.css"/>
   <link rel='stylesheet' id="creote-color-switcher-css" href='assets/css/scss/elements/color-switcher/color.css' type='text/css' media='all' />
   <!-- Style-->
   <!----woocommerce---->
   <link rel='stylesheet' href={{asset('assets/css/woocommerce-layout.css')}} type='text/css' media='all' />
   <link rel='stylesheet' href={{asset('assets/css/woocommerce.css')}} type='text/css' media='all' />
   <!----woocommerce---->
   
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
         <!--===============PAGE CONTENT==============-->
         <!--===============PAGE CONTENT==============-->
         <div id="content" class="site-content ">

            <!--- slider-->
            <section class="container-fluid image-layer" style="background-image:url({{asset('assets/images/sliders/slider-12-1.jpg')}})">
               <div class="row">

                  <div class="slide-item-content">
                     <div class="slide-item content_left pt-5 mt-5">
                        <div class="image-layer" style="background-image:url({{asset('assets/images/sliders/slider-12-1.jpg')}})">
                        </div>
                        <div class="container-fluid">
                           <div class="row align-items-center">
                              <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                 <div class="slider_content p-5">
                                    <h1 class="animate_up">@yield('banner-heading', 'Connect Beyond ') <br>
                                       @yield('banner-sub-heading', 'Borders ')<br>
                                       </h1> <br>
                                       <h4 class="text-light">@yield('banner-content','Experience seamless communication in over 200 countries with our Travel eSIM. Simple, secure, and made for the global explorer.')</h4>
                                       <div class="animate_down theme_btn_all color_two my-4">
                                          <a href="{{route('countries')}}" class="theme-btn one">Get Your Travel eSim Plan</a>  
                                       </div>
                                 </div>
                              </div>
                              <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 p-0 m-0">
                                 <div class="animate_right p-0 m-0">
                                    @section('image')
                                          @include('partials.default-image')
                                    @show
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </section>
            <!---slider-end--->
            @yield('content')
            <!--about-->
<section class="about-section">
   <!--===============spacing==============-->
   <div class="pd_top_90"></div>
   <!--===============spacing==============-->
   <div class="auto-container">
    <div class="row">
       <div class="col-lg-10 m-auto">
          <div class="title_all_box style_one text-center dark_color">
             <div class="title_sections">
                <div class="before_title">Select a Country
                  <form action="{{route('showCountries')}}" class="my-3" method="post">
                     @csrf
                     <select name="country" id="" class="p-3">
                        @if(count($countries) > 0)
                           @foreach($countries as $country)
                              <option class="p-4"value="{{route('country', ['country'=>$country['country_name']])}}">{{$country['country_name']}}</option>
                           @endforeach
                        @else
                           <p>No country available</p>
                        @endif
                     </select>
                     <button type="submit">Give it a try</button>
                  </form>
                </div>
                <div class="title">Get Your Travel e-Sim in 5 Minutes</div>
             </div>
             <!--===============spacing==============-->
             <div class="pd_bottom_40"></div>
             <!--===============spacing==============-->
          </div>
       </div>
    </div>
    <div class="row">
       <div class="col-xl-6 col-lg-6 col-md-12">
          <div class="image_boxes style_two">
             <img src={{asset("assets/images/shape-1.png")}} class="background_image" alt="image">
             <div class="image one">
                <img src={{asset("assets/images/about/about-6.png")}} class="img-fluid" alt="image">
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
       <div class="col-xl-6 col-lg-6 col-md-12 pd_left_60 md_pd_left_15">
          <div class="title_all_box style_one  dark_color">
             <div class="title_sections left">
                <h5 class="title font_20">Enable one of our Unlimited or Prepaid eSIM plans
                   using your phone’s built-in eSIM chip, in addition to your current phone plan.</h5>
             </div>
          </div>
          <div class="pd_bottom_10"></div>
          <div class="description_box">
            <p>Tripcel provides data connectivity service, fast and secure to all fun and business -minded individual. Through
               a unique combination of on demand technologies.</p>
         </div>
          <!--===============spacing==============-->
          <div class="list_item_box style_two style_list p-4 mt-3">
             <ul class="list-inline">
                <li class="list_items pd_bottom_10">
                   <small class="d-flex align-items-center">
                      <span class="icon_bx">
                         <i class="bx bx-qr fs-1"></i>
                      </span>
                      <a class="nav_link" href="#" target="&quot;_blank&quot;" rel="&quot;nofollow&quot;">
                        Receive a QR code in your email </a>
                   </small></li>
                <li class="list_items pd_bottom_10">
                   <small class="d-flex align-items-center">
                      <span class="icon_bx fs-1">
                         <i class=" bx bx-run fs-1"></i>
                      </span>
                      <a class="nav_link" href="#" target="&quot;_blank&quot;" rel="&quot;nofollow&quot;">
                        Quick and effortless installation </a>
                   </small></li>
                <li class="list_items pd_bottom_10">
                   <small class="d-flex align-items-center">
                      <span class="icon_bx">
                         <i class=" bx bx-signal-5 fs-1"></i>
                      </span>
                      <a class="nav_link" href="#" target="&quot;_blank&quot;" rel="&quot;nofollow&quot;">
                        Automatically connect to mobile internet</a>
                   </small></li>
                {{-- <li class="list_items pd_bottom_10">
                   <small class="d-flex align-items-center">
                      <span class="icon_bx">
                         <i class="bx bx-sort-up fs-1"></i>
                      </span>
                      <a class="nav_link" href="#" target="&quot;_blank&quot;" rel="&quot;nofollow&quot;">
                         Enjoy your browsing with your data plan with 4G/5G networks </a>
                   </small>
               </li> --}}
             </ul>
          </div>
          <!--===============spacing==============-->
          <div class="pd_bottom_15"></div>
          <!--===============spacing==============-->
          <div class="theme_btn_all color_one">
             <a href="{{route('howitworks')}}" class="theme-btn one">See How It Works</a>
          </div>
       </div>
    </div>
 </div>
   <!--===============spacing==============-->
   <div class="pd_bottom_90"></div>
   <!--===============spacing==============-->
</section>
<!--about end-->
<section class="service-section bg_op_3" style="background: url({{asset('assets/images/home-12-service-bg.jpg')}});">
   <!--===============spacing==============-->
   <div class="pd_top_85"></div>
   <!--===============spacing==============-->
      <div class="container">
         <div class="row">
            <div class="col-lg-12">
               <div class="title_all_box style_one text-center light_color">
                  <div class="title_sections">
                     <div class="title">Discover the Benefits</div>
                  </div>
                  <!--===============spacing==============-->
                  <div class="pd_bottom_20"></div>
                  <!--===============spacing==============-->
               </div>
            </div>
         </div>
      </div>

      <div class="container">
         <div class="row">
                  <div class="col-md-6 col-lg-4 " >
                     <div class="service_post style_three">
                        <div class="image_box">
                           <img loading="lazy" width="500" height="500" src={{asset("assets/images/service/service-image-6.jpg")}} alt="img">
                        </div>
                        <div class="text_box">
                           <div class="text_box_inner">
                              <span class="icon icon-thumbs-up icon"></span>
                              <h2 class="title_service"><a href="index.html/service/talent-management/index.html" rel="bookmark">Unlimited Data Access</a></h2>
                              <p class="short_desc">OEnjoy the freedom of unlimited data, which allows you to navigate, share, and stay connected without worrying about data limitations. Stream, browse, and explore Turkey at your own pace.
                              </p>
                              <div class="bg_icon">
                                 <span class="icon icon-thumbs-up icon"></span>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-6 col-lg-4 " >
                     <div class="service_post style_three">
                        <div class="image_box">
                           <img width="500" height="500" src={{asset("assets/images/fastint.jpeg")}} alt="img" loading="lazy">
                        </div>
                        <div class="text_box">
                           <div class="text_box_inner">
                              <span class="icon icon-thumbs-up icon"></span>
                              <h2 class="title_service"><a href="index.html/service/health-care-benefits/index.html" rel="bookmark">Fast and Reliable Connection</a></h2>
                              <p class="short_desc">Tripcel eSIM provides a fast and reliable internet connection, ensuring you have a seamless online experience wherever your journey takes you in Turkey.</p>
                              <div class="bg_icon">
                                 <span class="icon icon-thumbs-up icon"></span>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-6 col-lg-4 " >
                     <div class="service_post style_three">
                        <div class="image_box">
                           <img width="500" height="500" src={{asset("assets/images/activation.jpeg")}} alt="img" loading="lazy">
                        </div>
                        <div class="text_box">
                           <div class="text_box_inner">
                              <span class="icon icon-thumbs-up icon"></span>
                              <h2 class="title_service"><a href="index.html/service/risk-management/index.html" rel="bookmark">Easy Activation</a></h2>
                              <p class="short_desc">No need to visit a local store or wait in long queues. Activate your eSIM with just a few clicks, allowing you to start using data right away</p>
                              <div class="bg_icon">
                                 <span class="icon icon-thumbs-up icon"></span>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-6 col-lg-4  border border-2 rounded-3">
                     <div class="service_post style_three">
                        <div class="image_box">
                           <img width="500" height="500" src={{asset("assets/images/compatible.jpeg")}} alt="img" loading="lazy">
                        </div>
                        <div class="text_box">
                           <div class="text_box_inner">
                              <span class="icon icon-thumbs-up icon"></span>
                              <h2 class="title_service">Compatibility with Your Device</a></h2>
                              <p class="short_desc">Tripcel eSIM is compatible with unlocked iPhones and Android devices, offering flexibility for a wide range of smartphones.</p>
                              <div class="bg_icon">
                                 <span class="icon icon-thumbs-up icon"></span>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-6 col-lg-4  border border-2 rounded-3">
                     <div class="service_post style_three">
                        <div class="image_box">
                           <img width="500" height="500" src={{asset("assets/images/privacy.jpg")}} alt="img" loading="lazy">
                        </div>
                        <div class="text_box">
                           <div class="text_box_inner">
                              <span class="icon icon-thumbs-up icon"></span>
                              <h2 class="title_service">Privacy and Security</a></h2>
                              <p class="short_desc">We take your privacy seriously. Tripcel eSIM plans come with end-to-end encryption, providing a secure connection for all your mobile device traffic..</p>
                              <div class="bg_icon">
                                 <span class="icon icon-thumbs-up icon"></span>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
         </div>
      </div>
   
   <!--===============spacing==============-->
   <div class="pd_bottom_65"></div>
   <!--===============spacing==============-->
</section>
<!--service-->
<section class="service-section bg_op_3" style="background: url({{asset("assets/images/home-12-service-bg.jpg")}});">
   <!--===============spacing==============-->
   <div class="pd_top_85"></div>
   <!--===============spacing==============-->
   <div class="container">
      <div class="row">
         <div class="col-lg-12">
            <div class="title_all_box style_one text-center light_color">
               <div class="title_sections">
                  <div class="title">Select Your Destination</div>
                  <p>Your Travel eSIM Includes:</p>
                  <ul class=" d-md-flex  text-white list-unstyled text-center align-items-center justify-content-center">
                     <li class="mx-2"> <i class="fs-3 mx-2 bx bx-wifi"></i>Wi-Fi Hotspot</li>
                     <li class="mx-2"><i class="fs-3 mx-2 bx bx-timer"></i>Immediate Activation</li>
                     <li class="mx-2"> <i class="fs-3 mx-2 bx bx-transfer"></i>4G/5G Data</li>
                     <li class="mx-2"><i class="fs-3 mx-2 bx bx-check"></i>Optional Auto-Renewal</li>
                  </ul>
                  <p>Stay Connected to family and friends</p>
               </div>
               <!--===============spacing==============-->
               <div class="pd_bottom_20"></div>
               <!--===============spacing==============-->
            </div>
         </div>
      </div>
   </div>

   @yield('unlimitedplans')
   <!--===============spacing==============-->
   <div class="pd_bottom_65"></div>
   <!--===============spacing==============-->
</section>
<!--service end-->

{{-- Testimonial start --}}
<div class="container my-5 py-5">
   <div class="row">
      <div class="col-lg-7 m-auto">
         <div class="title_all_box style_six text-center dark_color">
            <div class="title_sections">
               <div class="title">Words From Our Customers</div>
            </div>
         </div>
      </div>

   </div>
   <section class="testimonial-section bg_op_1" style="background-image: url(../assets/images/testi-home-9.jpg);">
      <!--===============spacing==============-->
      <div class="pd_top_90"></div>
      <!--===============spacing==============-->
         <div class="container">
            <div class="row">
               <div class="col-lg-12">
                  <div class="title_all_box style_one text-center light_color">
                     <div class="title_sections">
                        <div class="before_title color_white">Customer Reviews</div>
                        <h6 class="title color_white">See What Our Clients Speak</h6>
                     </div>
                     <!--===============spacing==============-->
                     <div class="pd_top_20"></div>
                     <!--===============spacing==============-->
                  </div>
               </div>
            </div>

            <div class="row">
               <div class="col-lg-9 m-auto">
                  <div class="testimonial_sec style_v2_two">
                     <div class="swiper-container swiper-initialized swiper-horizontal swiper-backface-hidden" data-swiper="{
                        &quot;autoplay&quot;: {
                          &quot;delay&quot;: 6000
                        },
                        &quot;freeMode&quot;: false,
                        &quot;loop&quot;: true,
                        &quot;speed&quot;: 1000,
                        &quot;centeredSlides&quot;: false,
                        &quot;slidesPerView&quot;: 1,
                        &quot;spaceBetween&quot;: 30,
                        &quot;pagination&quot;: {
                          &quot;el&quot;: &quot;.swiper-pagination&quot;,
                          &quot;clickable&quot;: true
                        },
                        &quot;navigation&quot;: {
                           &quot;nextEl&quot;: &quot;.next-single-one&quot;,
                           &quot;prevEl&quot;: &quot;.prev-single-one&quot;
                         },
                        &quot;breakpoints&quot;: {
                           &quot;1200&quot;: {
                              &quot;slidesPerView&quot;: 1
                           },
                           &quot;1024&quot;: {
                            &quot;slidesPerView&quot;: 1
                           },
                          &quot;768&quot;: {
                            &quot;slidesPerView&quot;: 1
                          },
                          &quot;576&quot;: {
                            &quot;slidesPerView&quot;: 1 
                          },
                          &quot;0&quot;: {
                            &quot;slidesPerView&quot;: 1 
                          }
                        }
                      }">
                        <div class="swiper-wrapper" id="swiper-wrapper-4c8e8afbb1cfd3c1" aria-live="off" style="transition-duration: 0ms; transform: translate3d(-2088px, 0px, 0px);">
                           
                           
                           
                           
                        <div class="swiper-slide swiper-slide-next" role="group" aria-label="4 / 4" data-swiper-slide-index="3" style="width: 666px; margin-right: 30px;">
                              <div class="testimonial_box clearfix">
                                 <div class="authour_details">
                                    <div class="comment">
                                       The eSIM is an absolute must for those looking for a reliable internet companion on their global adventures.
                                    </div>
                                    <div class="details clearfix">
                                       <div class="c_content">
                                          <div class="content_in">
                                             <h2>Oliver Campbell</h2>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div><div class="swiper-slide" role="group" aria-label="1 / 4" data-swiper-slide-index="0" style="width: 666px; margin-right: 30px;">
                              <div class="testimonial_box clearfix">
                                 <div class="authour_details">
                                    <div class="comment">
                                       The Travel eSIM was an absolute lifesaver during my trip to France. Its activation was quick and effortless, providing fast, reliable data right from the get-go. Despite traveling across different cities, the connection remained consistent and strong, allowing me to share my journey in real-time. A must-have for travelers seeking seamless global connectivity.
                                    </div>
                                    <div class="details clearfix">
                                       <div class="c_content">
                                          <div class="content_in">
                                             <h2>Kunle Okunola</h2>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div><div class="swiper-slide swiper-slide-prev" role="group" aria-label="2 / 4" data-swiper-slide-index="1" style="width: 666px; margin-right: 30px;">
                              <div class="testimonial_box clearfix">
                                 <div class="authour_details">
                                    <div class="comment">
                                       The Travel eSIM was my perfect companion during my coast-to-coast adventure in the USA. Its instant activation and fast data speeds were exceptional, making road navigation and spontaneous video calls a breeze.
                                    </div>
                                    <div class="details clearfix">
                                       <div class="c_content">
                                          <div class="content_in">
                                             <h2>Miranda Devon</h2>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           
                        </div>
                     <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span></div>
                     <div class="arrows">
                        <div class="prev-single-one" tabindex="0" role="button" aria-label="Previous slide" aria-controls="swiper-wrapper-4c8e8afbb1cfd3c1"></div>
                        <div class="next-single-one" tabindex="0" role="button" aria-label="Next slide" aria-controls="swiper-wrapper-4c8e8afbb1cfd3c1"></div>
                     </div>
                  </div>
            </div>
            </div>
         </div>
      <!--===============spacing==============-->
      <div class="pd_bottom_80"></div>
      <!--===============spacing==============-->
      </section>
</div>
{{-- Tesimonial end --}}

<!--content-->
<section class="content-section">
   <div class="container">
      <div class="row align-items-center">
         <div class="col-xl-6 col-lg-12 col-md-12 mb-sm-5 mb-md-5 mb-lg-5 mb-xl-0">
            <div class="title_all_box style_one dark_color">
               <div class="title_sections">
                  <div class="before_title">Get in Charge</div>
                  <div class="title">Try Our Services</div>
                  <div class="description_box">
                     <p>Our power of choice is untrammelled and when nothing prevents being able to do what
                        we like best every pleasure.</p>
                  </div>
               </div>
            </div>
            <!--===============spacing==============-->
            <div class="pd_bottom_15"></div>
            <!--===============spacing==============-->
            <div class="progress_bar style_two">
               <div class="progress_new">
                  <div class="ProgressBar ProgressBar--animateText" data-progress="70">
                     <svg class="ProgressBar-contentCircle" height="170" width="170">
                        <circle class="ProgressBar-background" cx="85" cy="85" r="75"></circle>
                        <circle transform="rotate(-90, 85, 85)" class="ProgressBar-circle" cx="85" cy="85"
                           r="75"></circle>
                     </svg>
                  </div>
                  <div class="progress-value">
                     <div>
                        <h6>Data Plans</h6>
                        <h6>SMS Plans</h6>
                     </div>
                  </div>
               </div>
               <div class="content_box">
                  <h2>100%</h2>
                  <h3>Guaranteed </h3>
                  <p>We make it easy for you to access the world</p>
                  <p>Install an eSIM now and get online in 5 minutes, or reserve your data plan for any future date. We'll activate it automatically.</p>
               </div>
            </div>
            <!--===============spacing==============-->
            <div class="pd_bottom_15"></div>
            <!--===============spacing==============-->
            <div class="tabs_all_box tabs_all_box_start type_three">
               <div class="tab_over_all_box">
                  <div class="tabs_header clearfix">
                     <ul class="showcase_tabs_btns nav-pills nav   clearfix">
                        <li class="nav-item">
                           <a class="s_tab_btn nav-link active" data-tab="#tabtabone">Mission</a>
                        </li>
                     </ul>
                  </div>
                  <div class="s_tab_wrapper">
                     <div class="s_tabs_content">
                        <div class="s_tab fade active-tab show" id="tabtabone">
                           <div class="tab_content one">
                              <div class="content_bx">
                                 <p>Tripcel makes it easy to stay in charge of your Life Style with access to data and SMS.

                                    Activate any of our Unlimited or Prepaid eSIM plans with your phone's onboard eSIM chip, alongside your existing phone plan with the steps below.
                                 </p>
                              </div>
                           </div>
                        </div>
                        <div class="s_tab fade " id="tabtabtwo">
                           <div class="tab_content one">
                              <div class="content_bx">
                                 <p>Must explain too you how all this mistaken idea of denouncing pleasures
                                    praising pain was born and we will give you complete account of the
                                    system
                                    the actual teachings of the great explorer.
                                 </p>
                              </div>
                           </div>
                        </div>
                        <div class="s_tab fade " id="tabtabthree">
                           <div class="tab_content one">
                              <div class="content_bx">
                                 <p>Must explain too you how all this mistaken idea of denouncing pleasures
                                    praising pain was born and we will give you complete account of the
                                    system
                                    the actual teachings of the great explorer.
                                 </p>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-xl-6 col-lg-12 col-md-12">
            <div class="simple_image_boxes style_two bg_op_1"
               style="background-image: url(assets/images/banner-bgs-10-1.html);">
               <div class="parallax_cover">
                  <img src={{asset("assets/images/about/about-12.jpg")}} class="img-fluid" alt="about">
               </div>
            </div>
         </div>
      </div>
   </div>
   <!--===============spacing==============-->
   <div class="pd_bottom_85"></div>
   <!--===============spacing==============-->
</section>
<!--content end-->
<section class="video-section">
   <div class="row">
      <div class="col-xl-5 col-lg-5 col-md-12 pd_zero bg_op_1"  style="background: url({{asset("assets/images/banner-four-bg.jpg")}});">
           <!--===============spacing==============-->
           <div class="pd_top_210"></div>
           <!--===============spacing==============-->
          <!--===============spacing==============-->
          <div class="pd_top_210"></div>
          <!--===============spacing==============-->
      </div>
      <div class="col-xl-7 col-lg-7 col-md-12 bg_op_1"
         style="background-image: url({{asset("assets/images/home-12-testi.jpg")}});">
         <!--===============spacing==============-->
         <div class="pd_top_80"></div>
         <!--===============spacing==============-->
         <div class="row">
            <div class="col-lg-1"></div>
            <div class="col-lg-9 col-md-12">
               <div class="client-brand-wrapper">
                  <div class="title_all_box style_one light_color">
                     <div class="title_sections left">
                        <h2>Tripcel Partners </h2>
                        <p>Over 10 years of experience we’ll ensure you always get the best services.We help
                           our clients set new standards of excellence.</p>
                     </div>
                  </div>
                  <!--===============spacing==============-->
                  <div class="pd_bottom_15"></div>
                  <!--===============spacing==============-->
                  <div class="client_logo_carousel type_two">
                     <div class="swiper-container" data-swiper='{
                        "autoplay": {
                          "delay": 6000
                        },
                        "freeMode": true,
                        "loop": true,
                        "speed": 1000,
                        "centeredSlides": false,
                        "slidesPerView": 4,
                        "spaceBetween": 30,
                        "pagination": {
                          "el": ".swiper-pagination",
                          "clickable": true
                        },
                         
                        "breakpoints": {
                           "1200": {
                              "slidesPerView": 4
                           },
                           "1024": {
                            "slidesPerView": 3
                           },
                          "768": {
                            "slidesPerView": 3
                          },
                          "576": {
                            "slidesPerView": 2
                          },
                          "250": {
                           "slidesPerView": 2 
                         },
                          "0": {
                            "slidesPerView": 1 
                          }
                        }
                      }'>
                        <div class="swiper-wrapper">
                           <div class="swiper-slide">
                              <div class="image text-start">
                                 <img src={{asset("assets/images/CLIENT-logo-w.png")}} alt="clients-logo" class="img-fluid">
                              </div>
                           </div>
                           <div class="swiper-slide">
                              <div class="image text-start">
                                 <img src={{asset("assets/images/CLIENT-logo-3-w.png")}} alt="clients-logo" class="img-fluid">
                              </div>
                           </div>
                           <div class="swiper-slide">
                              <div class="image text-start">
                                 <img src={{asset("assets/images/CLIENT-logo-2-w.png")}} alt="clients-logo" class="img-fluid">
                              </div>
                           </div>
                           <div class="swiper-slide">
                              <div class="image text-start">
                                 <img src={{asset("assets/images/CLIENT-logo-1-w.png")}} alt="clients-logo" class="img-fluid">
                              </div>
                           </div>
                        </div>
                      
                     </div>
                  </div>
                  <!--===============spacing==============-->
                  <div class="pd_bottom_40"></div>
                  <!--===============spacing==============-->
                  <div class="row gutter_20px">
                     <div class="col-lg-5 col-md-12">
                        <div class="contact_box_content style_two">
                           <div class="contact_box_inner color_two">
                              <div class="icon_bx">
                                 <span class="fa fa-whatsapp"></span>
                              </div>
                              <div class="text ">
                                 <h3>What’s App Chat</h3>
                                 <p>(01)456 - 7890 - 12354</p>
                              </div>
                           </div>
                        </div>
                          <!--===============spacing==============-->
                  <div class="pd_bottom_30"></div>
                  <!--===============spacing==============-->
                     </div>
                     <div class="col-lg-5 col-md-12">
                        <div class="contact_box_content  style_two">
                           <div class="contact_box_inner color_two">
                              <div class="icon_bx">
                                 <span class="fa fa-skype"></span>
                              </div>
                              <div class="text ">
                                 <h3>Skype Meet</h3>
                                 <p>tripcelsupport@gmail.com</p>
                              </div>
                           </div>
                        </div>
                      
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-lg-2"></div>
         </div>
         <!--===============spacing==============-->
         <div class="pd_bottom_60"></div>
         <!--===============spacing==============-->
      </div>
   </div>
</section>

<section class="blog-section bg_light_1">
   <!--===============spacing==============-->
   <div class="pd_top_70"></div>
   <!--===============spacing==============-->
   <div class="container">
      <div class="row">
         <div class="col-lg-12">
            <div class="title_all_box style_one text-center dark_color">
               <div class="title_sections">
                  <div class="before_title">Find Out Our</div>
                  <div class="title">News, Adverts & Announcements</div>
                  <p>Visit our blog and get the latest news and information on how to make you travel, call and data experience sweet and safer</p>
               </div>
               <!--===============spacing==============-->
               <div class="pd_bottom_20"></div>
               <!--===============spacing==============-->
            </div>
         </div>

         <div class="col-lg-12">
            <div class="blog_post_section three_column style_ten">
               <div class="grid_show_case grid_layout clearfix">

                  <div class="grid_box _card">
                     <div class="news_box style_ten">
                        <div class="image_box">
                           <img loading="lazy" width="750" height="420"
                              src={{asset("assets/images/blog/blog-image-12.jpg")}} class="img-fluid" alt="img">
                        </div>
                        <h2 class="title"><a href="#" rel="bookmark">Travelling a san Adventure</a></h2>
                     </div>
                  </div>
                  <div class="grid_box _card">
                     <div class="news_box style_ten">
                        <div class="image_box">
                           <img width="750" height="420" src={{asset("assets/images/blog/blog-image-13.jpg")}}
                              class="img-fluid" alt="img" loading="lazy">
                        </div>
                        <h2 class="title"><a href="#" rel="bookmark">Shining a New Light on
                              E Services</a></h2>
                     </div>
                  </div>
                  <div class="grid_box _card">
                     <div class="news_box style_ten">
                        <div class="image_box">
                           <img width="750" height="420" src={{asset("assets/images/blog/blog-image-14.jpg")}}
                              class="img-fluid" alt="img" loading="lazy">
                        </div>
                        <h2 class="title"><a href="#" rel="bookmark">Places to visit this summer</a></h2>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!--===============spacing==============-->
   <div class="pd_bottom_70"></div>
   <!--===============spacing==============-->
</section> 
         </div>
         <!--===============PAGE CONTENT==============-->
         <!--===============PAGE CONTENT==============-->
      </div>
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
            
                      
                     <form class="contact-form" method="post" action="https://themepanthers.com/html/creote-html/sendemail.php">
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
                     © 2023 Tripcel. All Rights Reserved.
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
                           <a href="{{route('cartIcon.remove', $product[0]['id'])}}" style="background-color: #078586; color: white"  class="py-2 mb-2 btn remove" aria-label="Remove this item" data-product_id="2650" data-product_sku="">×</a>						
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
<script type='text/javascript' src={{asset('assets/js/jquery-3.6.0.min.js')}}></script>
<script type='text/javascript' src={{asset('assets/js/bootstrap.min.js')}} defer></script>
<script type='text/javascript' src={{asset('assets/js/jquery.fancybox.js')}} defer></script>
<script type='text/javascript' src={{asset('assets/js/jQuery.style.switcher.min.js')}} defer></script>
<script type='text/javascript' src={{asset('assets/js/jquery.flexslider-min.js')}} defer></script>
<script type='text/javascript' src={{asset('assets/js/owl.js')}} defer></script>
<script type='text/javascript' src={{asset('assets/js/swiper.min.js')}} defer></script>
<script type='text/javascript' src={{asset('assets/js/isotope.min.js')}} defer></script>
<script type='text/javascript' src={{asset('assets/js/simpleParallax.min.js')}} defer></script>
<!-- main-js -->
<script type='text/javascript' src={{asset('assets/js/creote-extension.js')}} defer></script>
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
</html>