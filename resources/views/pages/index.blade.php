
@extends('layouts.app')
@section('content')
    <!--process-->
    <section class="process-section mr_top_minus_100 position-relative z_99">  
        <div class="container">
           <div class="row">
              <div
                 class="col-lg-4 col-md-6 col-sm-12 col-xs-12 rounded_top_left_30 pd_top_50 pd_left_50 pd_right_50 pd_bottom_50 bg_dark_1 border_light_color">
                 <div class="process_box style_two">
                    <div class="process_box_outer_two">
                       <div class="content_box clearfix">
                          <div class="icon">
                             <div class="img">
                                <img src="assets/images/service-ico-n-1.png" class="img-fluid svg_image"
                                   alt="icon png">
                             </div>
                          </div>
                          <h2><a href="#" class="color_white">Travel Smarter, Travel Wider with e-Sim</a></h2>
                       </div>
                       <p class="color_white">Experience Speed Beyond Borders. Enjoy lightning-fast 4G/LTE and 5G
                         mobile data on top-tier networks, accessible in each corner of the globe</p>
                    </div>
                 </div>
              </div>
              <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12 pd_zero  bg_light_1">
                 <div
                    class="process_box style_two dark_color pd_top_50 pd_left_50 pd_right_50 pd_bottom_50 "
                    style="background-image: url(assets/images/banner-bgs-10-1.html);">
                    <div class="process_box_outer_two">
                       <div class="content_box clearfix">
                          <div class="icon">
                             <div class="img">
                                <img src="assets/images/process-icon-im-1.png" class="img-fluid svg_image"
                                   alt="icon png" />
                             </div>
                          </div>
                          <h2><a href="#">Dual Sim Functionality</a></h2>
                       </div>
                       <p class="text-dark">Maintain your existing SIM for incoming calls, while leveraging our eSIM
                         data plans for internet and app usage. Keep your number, enhance your connectivity.
                     </p>
                    </div>
                 </div>
              </div>
              <div
                 class="col-lg-4 col-md-6 col-sm-12 col-xs-12 rounded_bottom_right_30 pd_top_50 pd_left_50 pd_right_50 pd_bottom_50 bg_op_1" style="background: #FF8F47">
                 <div class="process_box style_two">
                    <div class="process_box_outer_two">
                       <div class="content_box clearfix">
                          <div class="icon">
                             <div class="img">
                                <img src="assets/images/service-ico-n-2.png" class="img-fluid svg_image"
                                   alt="icon png" />
                             </div>
                          </div>
                          <h2><a href="#" class="color_white">Activation in seconds</a></h2>
                       </div>
                       <p class="color_white">Activate on any eSIM compatible device in less than 5 minutes, 
                        no physical SIM card required. Instant connectivity at your fingertips.</p>
                    </div>
                 </div>
              </div>
           </div>
        </div>
     </section>
     <div class="bg-dark mt-2 mb-0" style="height: 20px"></div>
@endsection
@section('unlimitedplans')
<section class="price-section mx-4">
   <div class="row mb-5 justify-content-space-evenly">
      <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-xs-12">
         <div class="price_plan_box style_one  border border-dark">
            <div class="tag">Recommended</div>
            <div class="inner_box">
               <div class="top">
                  <h2>Europe</h2>
                  <p>Pricing plan  starting from</p>
               </div>
               <div class="mid">
                  <h4>$149</h4>
                  <div class="list_item_box style_two style_list">
                     <ul class="list-inline">
                        <li class="list_items pd_bottom_10">
                           <small class="d-flex align-items-center">
                              <span class="icon_bx">
                                 <i class=" icon-checked"></i>
                              </span>
                              <a class="nav_link" href="#"  rel="&quot;nofollow&quot;">
                                 4G/5G </a>
                           </small></li>
                        <li class="list_items pd_bottom_10">
                           <small class="d-flex align-items-center">
                              <span class="icon_bx">
                                 <i class=" icon-checked"></i>
                              </span>
                              <a class="nav_link" href="#"  rel="&quot;nofollow&quot;">
                                 Data Plans</a>
                           </small></li>
                        <li class="list_items pd_bottom_10">
                           <small class="d-flex align-items-center">
                              <span class="icon_bx">
                                 <i class=" icon-checked"></i>
                              </span>
                              <a class="nav_link" href="#"  rel="&quot;nofollow&quot;">
                                 SMS Plans </a>
                           </small></li>
                     </ul>
                  </div>
               </div>
               <div class="bottom">
                  <a href="{{route('regions', ['region' => 'EUR'])}}" rel="nofollow" class="theme-btn two">
                     See pricing plans
                  </a>
               </div>
            </div>
         </div>
      </div>
      <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-xs-12">
         <div class="price_plan_box style_one tag_enables  border border-dark">
            <div class="tag">Recommended</div>
            <div class="inner_box">
               <div class="top">
                  <h2>America +</h2>
                  <p>Pricing plan starting from</p>
               </div>
               <div class="mid">
                  <h4>$249</h4>
                  <div class="list_item_box style_two style_list">
                     <ul class="list-inline">
                        <li class="list_items pd_bottom_10">
                           <small class="d-flex align-items-center">
                              <span class="icon_bx">
                                 <i class=" icon-checked"></i>
                              </span>
                              <a class="nav_link" href="#"  rel="&quot;nofollow&quot;">
                                 4G/5G </a>
                           </small></li>
                        <li class="list_items pd_bottom_10">
                           <small class="d-flex align-items-center">
                              <span class="icon_bx">
                                 <i class=" icon-checked"></i>
                              </span>
                              <a class="nav_link" href="#"  rel="&quot;nofollow&quot;">
                                 Data Plans</a>
                           </small></li>
                        <li class="list_items pd_bottom_10">
                           <small class="d-flex align-items-center">
                              <span class="icon_bx">
                                 <i class=" icon-checked"></i>
                              </span>
                              <a class="nav_link" href="#"  rel="&quot;nofollow&quot;">
                                 SMS Plans </a>
                           </small></li>
                     </ul>
                  </div>
               </div>
               <div class="bottom">
                  <a href="{{route('regions', ['region' => 'USA'])}}" rel="nofollow" class="theme-btn two">
                     See pricing plans
                     </a>
               </div>
            </div>
         </div>
      </div>
      <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-xs-12">
         <div class="price_plan_box style_one  border border-dark">
            <div class="tag">Recommended</div>
            <div class="inner_box">
               <div class="top">
                  <h2>Asia</h2>
                  <p>Pricing plan  starting from</p>
               </div>
               <div class="mid">
                  <h4>$349</h4>
                  <div class="list_item_box style_two style_list">
                     <ul class="list-inline">
                        <li class="list_items pd_bottom_10">
                           <small class="d-flex align-items-center">
                              <span class="icon_bx">
                                 <i class=" icon-checked"></i>
                              </span>
                              <a class="nav_link" href="#"  rel="&quot;nofollow&quot;">
                                 4G/5G </a>
                           </small></li>
                        <li class="list_items pd_bottom_10">
                           <small class="d-flex align-items-center">
                              <span class="icon_bx">
                                 <i class=" icon-checked"></i>
                              </span>
                              <a class="nav_link" href="#"  rel="&quot;nofollow&quot;">
                                 Data Plans</a>
                           </small></li>
                        <li class="list_items pd_bottom_10">
                           <small class="d-flex align-items-center">
                              <span class="icon_bx">
                                 <i class=" icon-checked"></i>
                              </span>
                              <a class="nav_link" href="#"  rel="&quot;nofollow&quot;">
                                 SMS Plans </a>
                           </small></li>
                     </ul>
                  </div>
               </div>
               <div class="bottom">
                  <a href="{{route('regions', ['region' => 'APC'])}}" rel="nofollow" class="theme-btn two">
                     See pricing plans
                     </a>
               </div>
            </div>
         </div>
      </div>
   </div>
   <center>
      <a href="{{route('countries')}}" 
         class="theme-btn three mx-5 px-5" 
         style="background: rgb(219, 165, 66); font-size:0.7em">
            See all 194 countries
      </a>
   </center>
   
</section>
<div class="bg-dark mt-2 mb-0" style="height: 20px"></div>
@endsection