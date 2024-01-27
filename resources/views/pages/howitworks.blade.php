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
      <div class="row px-5">
         <div class="p-5 col-md-6">
            <div class="title_all_box style_one dark_color ">
                  <h1> How Tripcel Works: </h1>
                  <p class="fs-4 lh-base">With Tripcel cutting-edge eSIM technology, you can say goodbye to physical SIM cards and hello to the next generation of mobile connectivity.</p>
                  <p class="fs-4 lh-base"> It is quick, adaptable, and enables future connections to last.</p>
            </div>
            <!--===============spacing==============-->
            <div class="pd_bottom_10"></div>
            <!--===============spacing==============-->
         </div>
         <div class="col-md-6">
            <img src="{{asset('assets/images/howitworks2.png')}}" alt="">
         </div>
      </div>
      <div class="row">
         <div class="col-12 p-4 my-5 ">
            <h1 class="text-center text-muted" style="margin:0px 100px">Experience seamless communication in over
               200 countries with our Travel eSIM. Simple,
               secure, and made for the global explorer.
               </h1>
         </div>
      </div>
   </div>
   <!---about end--->
   <!---service--->
   <section class="service-icon-section bg_light_1">
   <!--===============spacing==============-->
   <div class="pd_top_90"></div>
   <!--===============spacing==============-->
   <section class="tab-section">
      <div class="container-fluid" style="width:100%">
         <div class="row">
            <section class="tabs_all_box tabs_all_box_start type_two">
               <div class="tab_over_all_box">
                  <div class="tabs_header clearfix">
                     <ul class="showcase_tabs_btns nav-pills nav clearfix">
                        <li class="nav-item">
                           <a class="s_tab_btn nav-link active" data-tab="#tabtabone">01.COMPATIBILITY</a>
                        </li>
                        <li class="nav-item">
                           <a class="s_tab_btn nav-link" data-tab="#tabtabtwo">02. CHOOSE PLAN</a>
                        </li>
                        <li class="nav-item">
                           <a class="s_tab_btn nav-link" data-tab="#tabtabtwothree">03. SCAN CODE</a>
                        </li>
                        <li class="nav-item">
                           <a class="s_tab_btn nav-link" data-tab="#tabtabtwofour">04. CONNECT & ENJOY</a>
                        </li>
                     </ul>
                  </div>
                  <div class="s_tab_wrapper">
                     <div class="s_tabs_content">
                        <div class="s_tab fade active-tab show" id="tabtabone">
                           <div class="tab_content one">
                              <div class="row">
                                 <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12 mb-5 mb-lg-0 mb-xl-0">
                                    <div class="image">
                                       <img src={{asset("assets/images/checkout-rafiki.png")}} alt="img">
                                    </div>
                                 </div>
                                 <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                    <div class="content_bx p-5">
                                       <h6>Always</h6>
                                       <h2>Check compatibility and purchase</h2>
                                       <p>Make sure your device works with eSIM before you buy a data plan. Activating our plans is instant on unlocked iPhones and Androids with built-in eSIM chips. For confirmation, look at the eSIM Device List.</p>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="s_tab fade" id="tabtabtwo">
                           <div class="tab_content one">
                              <div class="row">
                                 <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12 mb-5 mb-lg-0 mb-xl-0">
                                    <div class="image">
                                       <img src={{asset("assets/images/Selectplan.png")}} alt="img">
                                    </div>
                                 </div>
                                 <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                    <div class="content_bx p-5">
                                       <h2>Choose a plan</h2>
                                       <p>Choose either a monthly or a prepaid data plan that will work for you in the area you are going to. See our eSIM Plans & Pricing page for more options.

                                       </p>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="s_tab fade" id="tabtabtwothree">
                           <div class="tab_content one">
                              <div class="row">
                                 <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12 mb-5 mb-lg-0 mb-xl-0">
                                    <div class="image">
                                       <img src={{asset("assets/images/QRCode.png")}} alt="img">
                                    </div>
                                 </div>
                                 <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                    <div class="content_bx p-5">
                                       <h2>Scan QR Code</h2>
                                       <p>Use your smartphone or another eSIM-compatible device to scan the QR code sent via email.
                                       </p>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="s_tab fade" id="tabtabtwofour">
                           <div class="tab_content one">
                              <div class="row">
                                 <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12 mb-5 mb-lg-0 mb-xl-0">
                                    <div class="image">
                                       <img src={{asset("assets/images/Online-bro.png")}} alt="img">
                                    </div>
                                 </div>
                                 <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                    <div class="content_bx p-5">
                                       <h2>Connect to 4G or 5G/LTE</h2>
                                       <p>Simply follow the on-screen instructions to add your new international data plan. It is really that easy! As soon as you land, go online because your phone will connect to the internet network automatically. Experience how easy and quick Tricep's eSIM connectivity is.
                                       </p>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="justify-content-center align-items-center text-center">
                  <button class="theme-btn three mx-5 text-center"  style="background-color: #FF8F47">Check your phone compatibility</button>
               </div>
            </section>
         </div>
      </div>
      <!--===============spacing==============-->
      <div class="pd_bottom_80"></div>
      <!--===============spacing==============-->
   </section>
   <div class=" bg-dark" style="height: 10px"></div>
   
   <!--===============spacing==============-->
   {{-- <div class="pd_top_90"></div>
   </section>
   <!---service end--->
   <section class="price-section bg_light_1">
      <!--===============spacing==============-->
      <div class="pd_top_90"></div>
      <!--===============spacing==============-->

      <div class="container bg-light">
         <div class="row">
            <div class="col-lg-12">
               <div class="title_all_box style_one text-center dark_color">
                  <div class="title_sections mt-4">
                     <div class="before_title"> WHAT YOU GET</div>
                     <h2>For Using Tripcel</h2>
                  </div>
               </div>
            </div>
         </div>
         <!--===============spacing==============-->
         <div class="pd_bottom_20"></div>
         <!--===============spacing==============-->
         <div class="price_plan_with_tab price_tb_style_one">
            <div class="tab-content price_tab_content" id="myTabContent">
               <div class="tab-pane fade active show" id="home" role="tabpanel" aria-labelledby="home-tab">
                  <div class="row">
                     <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <div class="price_plan_box style_one">
                           <div class="inner_box">
                              <div class="top">
                                 <h2>Instant Activation</h2>
                              </div>
                              <div class="mid">
                                 <p>Unlock your iPhone or Android to activate Tripcel plans instantly. No physical SIM cards. Simply check our eSIM Device List for compatibility and you are ready.
                                 </p>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <div class="price_plan_box style_one">
                           <div class="inner_box">
                              <div class="top">
                                 <h2>VPN Ready</h2>
                              </div>
                              <div class="mid">
                                 <p>With Tripcel, you can connect to a VPN, which makes your mobile experience even safer.
                                 </p>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <div class="price_plan_box style_one  ">
                           <div class="inner_box">
                              <div class="top">
                                 <h2>Speed and Privacy</h2>
                              </div>
                              <div class="mid">
                                 <p>Protecting privacy is very important. The safest way to send and receive data on your phone is with Tricep's eSIM plans, which use end-to-end encryption. Connecting quickly and safely does not put your data at risk on the Internet or other devices.
                                 </p>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <div class="price_plan_box style_one">
                           <div class="inner_box">
                              <div class="top">
                                 <h2>International roaming</h2>
                                 <h6>Changing the Way Data Roams</h6>
                              </div>
                              <div class="mid">
                                 <p>It is easy to connect to the world's best networks. Tripcel connects you to more than 400 networks around the world so that you can always get the best price and quality. Your phone will connect to the best network automatically when you put in an eSIM.
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
      <div class="pd_bottom_70"></div>
      <!--===============spacing==============-->
   </section>
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
                              <a href="#"  rel="nofollow" class="theme-btn one"> 
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
                              <a href="#"  rel="nofollow" class="theme-btn one"> 
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
   <!---team-end---> --}}
   <!--===============spacing==============-->
   <div class="pd_bottom_40"></div>
   <!--===============spacing==============-->
</section>

<!---newsteller end--->
</div>
<div class="container-fluid">
   <div class="row p-5">
      <div class="col-md-6 p-5 ">
         <h1 class="lh-lg">Is your phone eSIM ready?</h1>
         <p class="fs-3 text-muted"> Here's a quick guide!</p>
         <ol>
            <li class="fs-5"> <b>Unlocked is a must:</b> Your phone has to be free from its     carrier's lock to
               roam with eSIM. No commitment? Go explore a world of providers!
            </li><br>
            <li class="fs-5"> <b>Not all phones are created equal:</b> Sadly, some models haven't joined the
               eSIM party yet. Here's a quick heads-up:
               <br><br>
               <ul>
                  <li>
                     Samsung Galaxy S10: Nope, sorry.
                  </li>
                  <li>
                     iPhone 10: Same story here. The eSIM fun starts with iPhone XR and XS
(2018) onwards.
                  </li>
                  <li>
                     Huawei P40 Pro +: It's a no from Huawei, even though the regular P40
and P40 Pro are on board.Blame the fancy ceramic case!
                  </li>
                  <li>
                     Xiaomi 12T: Hold your horses, only the 12T Pro has embraced eSIM.
                  </li>
                  <li>
                     OnePlus: Good news! The OnePlus 11 is eSIM-friendly
                  </li>
               </ul>
            </li> <br>
            <li class="fs-5">
               <b>Still unsure? Just consult this handy guide,</b> click here to find out if your
phone is up for the eSIM adventure.
            </li>
         </ol>
         <br><br>
         <p class="fs-5">With eSIM, the world of connectivity is at your fingertips. Just make sure your
            phone is on the same page!
            </p>
            <button class="theme-btn three px-5" style="background-color: #FF8F47">Get your travel eSIM plan</button>
      </div>
      <div class="col-md-6">
         <img src="{{asset('assets/images/howitworks3.jpg')}}" alt="">
      </div>
   </div>
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