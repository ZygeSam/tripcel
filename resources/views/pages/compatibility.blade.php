@extends('layouts.purchase')
@section('pageTitle', 'Phone Compatibility')
@section('previousPageTitle', 'Home')
@section('presentPageTitle', 'Phone Compatibility')
@section('content')
<div id="content" class="site-content ">
   <div class="container">
      <div class="row default_row">
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
                                    <a class="s_tab_btn nav-link active" data-tab="#tabtabone">01.INSTALLATION &amp; ACTIVATION</a>
                                 </li>
                                 <li class="nav-item">
                                    <a class="s_tab_btn nav-link" data-tab="#tabtabtwo">02. Compatibility &amp; Plan</a>
                                 </li>
                                 <li class="nav-item">
                                    <a class="s_tab_btn nav-link" data-tab="#tabtabtwothree">03. HOTSPOT &amp; SPEED</a>
                                 </li>
                                 <li class="nav-item">
                                    <a class="s_tab_btn nav-link" data-tab="#tabtabtwofour">04. NETWORK &amp; COVERAGE</a>
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
                                                <img src={{asset("assets/images/App-installation-bro.png")}} alt="img">
                                             </div>
                                          </div>
                                          <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                             <div class="content_bx p-1 fs-5">
                                                <h3>Installation</h3>
                                                <p>
                                                  <li><b> Method:</b> <br>QR code or manual installation </li><br>
                                                   <li><b>Ease of Setup:</b><br> Quick and user-friendly process</li><br>
                                                   <li><b>Instructions:</b><br>Provided in the email upon purchase</li>
                                                </p>
                                                <h3>Activation</h3>
                                                <p>
                                                   <li>
                                                      <b>Activation Method:</b><br>Upon arrival at the destination, turn on your Tripcel eSIM's data roaming.
                                                   </li><br>
                                                   <li>
                                                      <b>Instant Connectivity:</b><br>There is no need to connect to the internet for activation.</b>
                                                   </li>
                                                </p>
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
                                                <img src={{asset("assets/images/developer-activation.png")}} alt="img">
                                             </div>
                                          </div>
                                          <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                             <div class="content_bx p-5 fs-5">
                                                <h3>Compatibility</h3>
                                                <p>
                                                   <li><b>Device Compatibility:</b><br> Compatible with all smartphones featuring eSIM technology. <br><br></li>
                                                   <li><b>Smartwatches and Tablets:</b><br> Compatibility is not guaranteed. Check here for the list of supported devices.</li>
                                                </p>
                                                <h3>Plan details</h3>
                                                <p>
                                                   <li><b>Plan Duration:</b><br> Customizable based on your travel needs. <br><br></li>
                                                   <li><b>Delivery Time:</b><br> Compatibility is not guaranteed. Check here for the list of supported devices.</li>
                                                   <li><b>Plan Type:</b><br> Unlimited data for uninterrupted connectivity.</li>
                                                </p>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="s_tab fade" id="tabtabtwothree">
                                    <div class="tab_content one">
                                       <div class="row fs-5">
                                          <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12 mb-5 mb-lg-0 mb-xl-0">
                                             <div class="image">
                                                <img src={{asset("assets/images/speed-test.png")}} alt="img">
                                             </div>
                                          </div>
                                          <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                             <div class="content_bx p-1 fs-5">
                                                <h3>Speed</h3>
                                                <p>
                                                   <li><b> Network Speeds:</b> <br>3G/4G/LTE/5G for high-speed data access.</li><br>
                                                   <li><b>Speed Reduction:</b><br> may occur if necessary. Some carriers reserve the right to apply a Fair Usage Policy.
                                                   </li><br>
                                                </p>
                                                <h3>Hotspot</h3>
                                                <p>
                                                   <li>
                                                      <b>Hotspot Feature:</b><br>Not included in the eSIM plan.
                                                   </li><br>
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
                                                <img src={{asset("assets/images/networkServer.png")}} alt="img">
                                             </div>
                                          </div>
                                          <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                             <div class="content_bx p-1 fs-5">
                                                <h3>Coverage</h3>
                                                <p>
                                                   <li><b> Expectations:</b> <br>Exceptional coverage and high-speed internet in major cities.</li><br>
                                                   <li><b>Note:</b><br>Coverage may become unstable in remote areas. Check the coverage map for details.
                                                   </li><br>
                                                </p>
                                                <h3>Networks</h3>
                                                <p>
                                                   <li>
                                                      <b>Supported Networks:</b><br>Avea / Turkcell
                                                   </li><br>
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
      </div>
   </div>
   <section class="call-to-action-section">
      <div class="call_to_action style_one">
         <div class="image">
            <img src="../assets/images/sliders/slider-1-2.jpg" class="img-fluid" alt="image">
         </div>
         <div class="auto-container">
            <div class="row">
               <div class="col-lg-12">
                  <div class="left_content">
                     <div class="main_content">
                        <h6>Need Some Help?</h6>
                        <h1>Stay connected seamlessly with Tripcel eSIM</h1>
                        <p>
                           We are offering reliable connectivity with customizable plans and quick activation upon arrival. Enjoy unlimited data with high-speed internet access in major cities, ensuring you stay connected wherever your journey takes you
                        </p>
                        <div class="bottom_content">
                           <div class="button_content">
                              <a href="#" target="_blank" rel="nofollow" class="theme-btn three">CHECK DEVICE COMPATIBILITY<i class="icon-right-arrow-long"></i></a>
                           </div>
                           <div class="button_content">
                              <a href="#" target="_blank" rel="nofollow" class="theme-btn three">EXPLORE PLANS<i class="icon-right-arrow-long"></i></a>
                           </div>
                           <div class="button_content">
                              <a href="#" target="_blank" rel="nofollow" class="theme-btn three">GET YOUR TRIPCEL eSIM NOW<i class="icon-right-arrow-long"></i></a>
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
@endsection