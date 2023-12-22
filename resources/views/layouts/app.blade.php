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
         <!----preloader----->
         <div class="preloader-wrap">
            <div class="preloader" style="background-image:url({{asset('assets/images/preloader.gif')}})">
            </div>
            <div class="overlay"></div>
         </div>
         <!----preloader end----->
         <!----header----->
         <div class="header_area " id="header_contents">
            <div class="position-relative">
               <header class="header header_default style_nine  head_absolute transparent-bg get_sticky_header">
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
            <section class="slider style_page_twelve nav_position_one">
               <div class="banner_carousel owl-carousel owl_nav_block owl_dots_none theme_carousel owl-theme"
               data-options='{"loop": true, "margin": 0, "autoheight":true, "lazyload":true, "nav": true, "dots": true, "autoplay": true, "autoplayTimeout": 7000, "smartSpeed": 1800, "responsive":{ "0" :{ "items": "1" }, "768" :{ "items" : "1" } , "1000":{ "items" : "1" }}}'>

                  <div class="slide-item-content">
                     <div class="slide-item content_left">
                        <div class="image-layer" style="background-image:url({{asset('assets/images/sliders/slider-12-1.jpg')}})">
                        </div>
                        <div class="medium-container">
                           <div class="row align-items-center">
                              <div class="col-lg-7 col-md-12 col-sm-12 col-xs-12">
                                 <div class="slider_content">
                                    <h1 class="animate_up">@yield('banner-heading', 'Get Connected') <br>
                                       @yield('banner-sub-heading', 'Fast and secure ')<br>
                                       </h1>
                                       <h4>Get mobile data and sms plans anywhere with our prepaid and unlimited eSIM plans for international travel -- it's quick and easy.</h4>
                                       <div class="animate_down theme_btn_all color_two my-4">
                                          <a href="#" class="theme-btn one">Get Started</a>  
                                       </div>
                                 </div>
                              </div>
                              <div class="col-lg-5 col-md-12 col-sm-12 col-xs-12">
                                 <div class="slider_image animate_left">
                                    <img src= "{{asset('assets/images/esim.jpg')}}" class="img-fluid" alt="img" />
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="slide-item-content">
                     <div class="slide-item content_left">
                        <div class="image-layer" style="background-image:url({{asset('assets/images/sliders/slider-12-1.jpg')}})">
                        </div>
                        <div class="medium-container">
                           <div class="row align-items-center">
                              <div class="col-lg-7 col-md-12 col-sm-12 col-xs-12">
                                 <div class="slider_content">
                                    <h1 class="animate_up">@yield('banner-heading', 'Get Connected  ')<br>
                                       @yield('banner-sub-heading', 'Fast and secure ')<br>
                                       </h1>
                                       <h4>Get mobile data and sms plans anywhere with our prepaid and unlimited eSIM plans for international travel -- it's quick and easy.</h4>
                                       <div class="animate_down theme_btn_all color_two">
                                          <a href="#" class="theme-btn one">Get Started</a>  
                                       </div>
                                 </div>
                              </div>
                              <div class="col-lg-5 col-md-12 col-sm-12 col-xs-12">
                                 <div class="slider_image animate_right">
                                    <img src= "{{asset('assets/images/esimworld.png')}}" class="img-fluid" alt="img" />
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="slide-item-content">
                     <div class="slide-item content_left">
                        <div class="image-layer" style="background-image:url({{asset('assets/images/sliders/slider-12-1.jpg')}})">
                        </div>
                        <div class="medium-container">
                           <div class="row align-items-center">
                              <div class="col-lg-7 col-md-12 col-sm-12 col-xs-12">
                                 <div class="slider_content">
                                    <h1 class="animate_up">@yield('banner-heading', 'Get Connected  ')<br>
                                       @yield('banner-sub-heading', 'Fast and secure ')<br>
                                       </h1>
                                       <h4>Get mobile data and sms plans anywhere with our prepaid and unlimited eSIM plans for international travel -- it's quick and easy.</h4>
                                       <div class="animate_down theme_btn_all color_two my-4">
                                          <a href="#" class="theme-btn one">Get Started</a>  
                                       </div>
                                 </div>
                              </div>
                              <div class="col-lg-5 col-md-12 col-sm-12 col-xs-12">
                                 <div class="slider_image animate_right">
                                    <img src= "{{asset('assets/images/esimMobile.png')}}" class="img-fluid" alt="img" />
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="slide-item-content">
                     <div class="slide-item content_left">
                        <div class="image-layer" style="background-image:url({{asset('assets/images/sliders/slider-12-1.jpg')}})">
                        </div>
                        <div class="medium-container">
                           <div class="row align-items-center">
                              <div class="col-lg-7 col-md-12 col-sm-12 col-xs-12">
                                 <div class="slider_content">
                                    <h1 class="animate_up">@yield('banner-heading', 'Get Connected  ')<br>
                                       @yield('banner-sub-heading', 'Fast and secure ')<br>
                                       </h1>
                                       <h4>Get mobile data and sms plans anywhere with our prepaid and unlimited eSIM plans for international travel -- it's quick and easy.</h4>
                                       <div class="animate_down theme_btn_all color_two my-4">
                                          <a href="#" class="theme-btn one">Get Started</a>  
                                       </div>
                                 </div>
                              </div>
                              <div class="col-lg-5 col-md-12 col-sm-12 col-xs-12">
                                 <div class="slider_image animate_right">
                                    <img src= {{asset("assets/images/esimphoneconnect.png")}} class="img-fluid" alt="img" />
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
                <div class="before_title">Give it a try</div>
                <div class="title">Activate Your Travel SIM & Features in 5 Minutes</div>
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
                <h5 class="title font_20">We took the time to develop a strong eSim profile
                   with assurance of good interent connection and 4G/5g speed.</h5>
             </div>
          </div>
          <!--===============spacing==============-->
          <div class="list_item_box style_two style_list p-4 mt-3">
             <ul class="list-inline">
                <li class="list_items pd_bottom_10">
                   <small class="d-flex align-items-center">
                      <span class="icon_bx">
                         <i class="bx bx-qr"></i>
                      </span>
                      <a class="nav_link" href="#" target="&quot;_blank&quot;" rel="&quot;nofollow&quot;">
                         Get a QR Code delivered to your mail </a>
                   </small></li>
                <li class="list_items pd_bottom_10">
                   <small class="d-flex align-items-center">
                      <span class="icon_bx">
                         <i class=" bx bx-run "></i>
                      </span>
                      <a class="nav_link" href="#" target="&quot;_blank&quot;" rel="&quot;nofollow&quot;">
                          Get Rocket Speed of your eSim application </a>
                   </small></li>
                <li class="list_items pd_bottom_10">
                   <small class="d-flex align-items-center">
                      <span class="icon_bx">
                         <i class=" bx bx-signal-5"></i>
                      </span>
                      <a class="nav_link" href="#" target="&quot;_blank&quot;" rel="&quot;nofollow&quot;">
                         Get Connected to good mobile internet automatically </a>
                   </small></li>
                <li class="list_items pd_bottom_10">
                   <small class="d-flex align-items-center">
                      <span class="icon_bx">
                         <i class="bx bx-sort-up"></i>
                      </span>
                      <a class="nav_link" href="#" target="&quot;_blank&quot;" rel="&quot;nofollow&quot;">
                         Enjoy your browsing with your data plan with 4G/5G networks </a>
                   </small></li>
             </ul>
          </div>
          <!--===============spacing==============-->
          <div class="pd_bottom_15"></div>
          <!--===============spacing==============-->
          <div class="theme_btn_all color_one">
             <a href="#" class="theme-btn one">Get Started</a>
          </div>
       </div>
    </div>
 </div>
   <!--===============spacing==============-->
   <div class="pd_bottom_90"></div>
   <!--===============spacing==============-->
</section>
<!--about end-->
<!--service-->
<section class="service-section bg_op_3" style="background: url(assets/images/home-12-service-bg.jpg);">
   <!--===============spacing==============-->
   <div class="pd_top_85"></div>
   <!--===============spacing==============-->
   <div class="container">
      <div class="row">
         <div class="col-lg-12">
            <div class="title_all_box style_one text-center light_color">
               <div class="title_sections">
                  <!-- <div class="before_title">Leading</div> -->
                  <div class="title">France Unlimited eSIM Plans</div>
                  <p>We will work with you to provide the adequate and best experience for your eSim</p>
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
<!--content-->
<section class="content-section">
   <div class="container">
      <div class="row align-items-center">
         <div class="col-xl-6 col-lg-12 col-md-12 mb-sm-5 mb-md-5 mb-lg-5 mb-xl-0">
            <div class="title_all_box style_one dark_color">
               <div class="title_sections">
                  <div class="before_title">Get in Charge</div>
                  <div class="title">Try Our Services</div>
                  
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
      <div class="col-xl-5 col-lg-5 col-md-12 pd_zero bg_op_1"  style="background: url(assets/images/banner-four-bg.jpg);">
           <!--===============spacing==============-->
           <div class="pd_top_210"></div>
           <!--===============spacing==============-->
         <div class="video_btn_all text-center">
            <div class="video_box">
               <!-- <a href="#" class="lightbox-image"><i
                     class="icon-play"></i></a> -->
            </div>
         </div>
          <!--===============spacing==============-->
          <div class="pd_top_210"></div>
          <!--===============spacing==============-->
      </div>
      <div class="col-xl-7 col-lg-7 col-md-12 bg_op_1"
         style="background-image: url(assets/images/home-12-testi.jpg);">
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
                           <img width="750" height="420" src="assets/images/blog/blog-image-14.jpg"
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
      <div class="footer_area  footer_twelve bg_dark_2" id="footer_contents">
         <div class="footer_widgets_wrap">
            <!--===============spacing==============-->
            <div class="pd_top_80"></div>
            <!--===============spacing==============-->
            <div class="auto-container">
               <div class="row">
                  <div class="col-lg-4 col-md-6 col-sm-12">
                     <div class="row">
                        <div class="col-md-6 col-sm-12">
                           <div class="footer_widgets wid_tit style_two">
                              <div class="fo_wid_title">
                                 <h2>Informations</h2>
                              </div>
                           </div>
                        </div>
                        <div class="col-md-6 col-sm-12">

                        </div>
                     </div>
                     <div class="row">
                        <div class="col-md-6 col-sm-12">
                           <div class="footer_widgets clearfix navigation_foo light_color style_four">
                              <div class="navigation_foo_box">
                                 <div class="navigation_foo_inner">

                                    <ul>
                                       <li><a href="#" class="color_white"><i class="fa fa-circle-o"></i> Careers</a></li>
                                       <li><a href="#" class="color_white"><i class="fa fa-circle-o"></i> Infrastructure</a></li>
                                       <li><a href="#" class="color_white"><i class="fa fa-circle-o"></i> Client Support</a></li>
                                       <li><a href="#" class="color_white"><i class="fa fa-circle-o"></i> Privacy Policy</a></li>
                                       <li><a href="#" class="color_white"><i class="fa fa-circle-o"></i> Terms of Use</a></li>
                                       <li><a href="#" class="color_white"><i class="fa fa-circle-o"></i> Sitemap</a></li>
                                       <li><a href="#" class="color_white"><i class="fa fa-circle-o"></i> Contact</a></li>
                                    </ul>


                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                           <div class="footer_widgets clearfix navigation_foo light_color style_four">
                              <div class="navigation_foo_box">
                                 <div class="navigation_foo_inner">


                                    <ul>
                                       <li><a href="#" class="color_white"><i class="fa fa-circle-o"></i> How it’s Work</a></li>
                                       <li><a href="#" class="color_white"><i class="fa fa-circle-o"></i> Testimonials</a></li>
                                       <li><a href="#" class="color_white"><i class="fa fa-circle-o"></i> Case Studies</a></li>
                                       <li><a href="#" class="color_white"><i class="fa fa-circle-o"></i> Partners</a></li>
                                       <li><a href="#" class="color_white"><i class="fa fa-circle-o"></i> Key Areas</a></li>
                                       <li><a href="#" class="color_white"><i class="fa fa-circle-o"></i> Pricing</a></li>
                                    </ul>
                                 </div>


                              </div>
                           </div>
                        </div>
                     </div>

                  </div>
                  <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                     <div class="footer_widgets wid_tit style_two">
                        <div class="fo_wid_title">
                           <h2>Get In Touch</h2>
                        </div>
                     </div>
                     <div class="footer_widgets foo_subscribe light_color style_one">
                        <div class="item_subscribe with_text">
                           <p class="color_white">Subscribe Us &amp; Recive Our Offers and Updates i Your Inbox Directly.</p>
                           <div class="shortcodes">

                              <form class="mc4wp-form" method="post" data-name="Subscibe">
                                 <div class="mc4wp-form-fields">
                                    <input type="email" name="EMAIL" placeholder="Your email address" required="">
                                    <input type="submit" value="Sign up">
                                 </div>
                              </form>

                           </div>
                           <p class="color_white">* We do not share your email id</p>
                        </div>
                     </div>
                     <div class="social_media_v_one style_two">
                        <ul>
                           <li>
                              <a href="#"> <span class="fa fa-facebook"></span>
                                 <small>facebook</small>
                              </a>
                           </li>
                           <li>
                              <a href="#"> <span class="fa fa-twitter"></span>
                                 <small>twitter</small>
                              </a>
                           </li>
                           <li>
                              <a href="#"> <span class="fa fa-skype"></span>
                                 <small>skype</small>
                              </a>
                           </li>
                           <li>
                              <a href="#"> <span class="fa fa-instagram"></span>
                                 <small>instagram</small>
                              </a>
                           </li>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
            <!--===============spacing==============-->
            <div class="pd_bottom_60"></div>
            <!--===============spacing==============-->
         </div>
   
            <div class="auto-container">
               <div class="footer-copyright text-center bg_dark_1 rounded_top_left_30 rounded_top_right_30">
                  <!--===============spacing==============-->
                  <div class="pd_top_25"></div>
                  <!--===============spacing==============-->
                  <div class="row">
                     <div class="col-lg-12">
                        <p class="color_white">© 2023 Tripcel</a> All Rights Reserved.</p>
                     </div>
                  </div>
                   <!--===============spacing==============-->
                   <div class="pd_bottom_5"></div>
                   <!--===============spacing==============-->
            </div>
         </div>
      </div>
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
<script type='text/javascript' src={{asset('assets/js/bootstrap.min.js')}}></script>
<script type='text/javascript' src={{asset('assets/js/jquery.fancybox.js')}}></script>
<script type='text/javascript' src={{asset('assets/js/jQuery.style.switcher.min.js')}}></script>
<script type='text/javascript' src={{asset('assets/js/jquery.flexslider-min.js')}}></script>
<script type='text/javascript' src={{asset('assets/js/color-scheme.js')}}></script>
<script type='text/javascript' src={{asset('assets/js/owl.js')}}></script>
<script type='text/javascript' src={{asset('assets/js/swiper.min.js')}}></script>
<script type='text/javascript' src={{asset('assets/js/isotope.min.js')}}></script>
<script type='text/javascript' src={{asset('assets/js/countdown.js')}}></script>
<script type='text/javascript' src={{asset('assets/js/simpleParallax.min.js')}}></script>
<script type='text/javascript' src={{asset('assets/js/appear.js')}}></script>
<script type='text/javascript' src={{asset('assets/js/jquery.countTo.js')}}></script>
<script type='text/javascript' src={{asset('assets/js/sharer.js')}}></script>
<script type='text/javascript' src={{asset('assets/js/validation.js')}}></script>
<!-- map script -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA-CE0deH3Jhj6GN4YvdCFZS7DpbXexzGU"></script>
<script src={{asset("assets/js/gmaps.js")}}></script>
<script src={{asset("assets/js/map-helper.js")}}></script>
<!-- main-js -->
<script type='text/javascript' src={{asset('assets/js/creote-extension.js')}}></script>
<!---========================== javascript ==========================-->
</body>
</html>