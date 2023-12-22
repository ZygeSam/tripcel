<!DOCTYPE html>
<html lang="en-US">

<head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
   <title>Tripcel</title>
   <!-- Fav Icon -->
   <link rel="icon" href={{asset("assets/images/favicon.ico")}} type="image/x-icon">
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
               0
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
         <!----header end----->
         <div class="page_header_default style_one">
            <div class="parallax_cover">
               <div class="simpleParallax"><img src={{asset("assets/images/esimMobile.png")}} style="background:cover;" alt="bg_image" class="cover-parallax"></div>
            </div>
            <div class="page_header_content">
               <div class="auto-container">
                  <div class="row">
                     <div class="col-md-12 pt-4 mt-5">
                        <div class="banner_title_inner">
                           <div class="title_page">
                              Purchase ESIms
                           </div>
                        </div>
                     </div>
                     <div class="col-lg-12">
                        <div class="breadcrumbs creote">
                           <ul class="breadcrumb m-auto">
                              <li><a href="/">ESIm Data Plans</a></li>
                              <li class="active">REVIEW AND PAY</li>
                           </ul>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!----header----->
         <!----page-CONTENT----->
         <div id="content" class="site-content ">
            <div class="auto-container">
               <div class="row default_row">
                  <div class="full_width_box">
                      <!--===============spacing==============-->
                      <div class="pd_top_90"></div>
                      <!--===============spacing==============-->
                      
                        @yield('content')
                      <!--===============spacing==============-->
                      <div class="pd_bottom_90"></div>
                      <!--===============spacing==============-->
                  </div>
               </div>
            </div>
             <!---newsteller--->
         <section class="newsteller style_one bg_dark_1">
            <!--===============spacing==============-->
            <div class="pd_top_40"></div>
            <!--===============spacing==============-->
            <div class="auto-container">
               <div class="row align-items-center">
                  <div class="col-lg-6 col-md-12">
                     <div class="content">
                        <h2>Join Our Mailing List</h2>
                        <p>For receiving our news and updates in your inbox directly. </p>
                     </div>
                  </div>
                  <div class="col-lg-6 col-md-12">
                     <div class="item_scubscribe">
                        <div class="input_group">
                           <form class="mc4wp-form" method="post" data-name="Subscibe">
                              <div class="mc4wp-form-fields">
                                 <input type="email" name="EMAIL" placeholder="Your email address" required="">
                                 <input type="submit" value="Sign up">
                              </div>
                           </form>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <!--===============spacing==============-->
            <div class="pd_bottom_40"></div>
            <!--===============spacing==============-->
         </section>
         <!---newsteller end--->
         </div>

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
            <div class="widget_shopping_cart_content">
               <p class="woocommerce-mini-cart__empty-message">No products in the cart.</p>
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

<!-- Mirrored from themepanthers.com/html/creote-html/home-12.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 14 Dec 2023 22:57:02 GMT -->
</html>