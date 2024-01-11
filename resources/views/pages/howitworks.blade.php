@extends('layouts.purchase')
@section('pageTitle', 'How it works')
@section('previousPageTitle', 'Home')
@section('presentPageTitle', 'How it works')
@section('content')
<div id="content" class="site-content ">
   <!---about--->
   <div class="container">
      <div class="row">
         <div class="col-xl-6 col-lg-12 col-md-12 mb-sm-5 mb-md-5 mb-lg-5 mb-xl-0">
            <div class="title_all_box style_one dark_color">
               <div class="title_sections left">
                  <div class="before_title"> How Tripcel Works: </div>
                  <h2 class="title">  Unleashing the Power of eSIM Connectivity</h2>
                  <p>With Tripcel cutting-edge eSIM technology, you can say goodbye to physical SIM cards and hello to the next generation of mobile connectivity. It is quick, adaptable, and enables future connections to last.</p>
               </div>
            </div>
            <!--===============spacing==============-->
            <div class="pd_bottom_10"></div>
            <!--===============spacing==============-->
            <div class="row gutter_15px">
               <div class="col-lg-4 col-md-12">
                  <div class="theme_btn_all color_one">
                     <a href="{{route('contact')}}"  rel="nofollow" class="theme-btn three">Contact Us</a>
                  </div>
               </div>
               <!--===============spacing==============-->
               <div class="pd_bottom_20"></div>
               <!--===============spacing==============-->
            </div>
         </div>
         <div class="col-xl-6 col-lg-10 col-md-12">
            <div class="image_boxes style_five">
               <div class="image_box one">
                  <img src="assets/images/about/about-11.jpg" class="img-fluid" alt="img">
               </div>
               <div class="image_box two">
                  <img src="assets/images/about/about-2.jpg" class="img-fluid two" alt="img">
               </div>
            </div>
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
      <div class="container">
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
                           <a class="s_tab_btn nav-link" data-tab="#tabtabtwofour">03. CONNECT</a>
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
                                       <img src="assets/images/tab-ser-img.png" alt="img">
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
                                       <img src="assets/images/tab-ser-img.png" alt="img">
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
                                       <img src="assets/images/tab-ser-img.png" alt="img">
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
                                       <img src="assets/images/tab-ser-img.png" alt="img">
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
            </section>
         </div>
      </div>
      <!--===============spacing==============-->
      <div class="pd_bottom_80"></div>
      <!--===============spacing==============-->
   </section>
   <!--===============spacing==============-->
   <div class="pd_top_90"></div>
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
                     <h2>For USing Tripcel</h2>
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
@endsection