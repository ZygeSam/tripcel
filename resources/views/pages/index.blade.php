
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
                          <h2><a href="#" class="color_white">Data Plans</a></h2>
                       </div>
                       <p class="color_white">Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                          Voluptatum nisi ducimus officiis veniam consectetur error dolorum voluptatem eius 
                          tempore voluptatibus. Quos accusamus nisi ipsa explicabo sit quidem maxime quasi veniam?</p>
                    </div>
                 </div>
              </div>
              <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12 pd_zero  bg_light_1">
                 <div
                    class="process_box style_two dark_color pd_top_50 pd_left_50 pd_right_50 pd_bottom_50 bg_op_1"
                    style="background-image: url(assets/images/banner-bgs-10-1.html);">
                    <div class="process_box_outer_two">
                       <div class="content_box clearfix">
                          <div class="icon">
                             <div class="img">
                                <img src="assets/images/process-icon-im-1.png" class="img-fluid svg_image"
                                   alt="icon png" />
                             </div>
                          </div>
                          <h2><a href="#"> SMS Plans </a></h2>
                       </div>
                       <p class="text-dark">Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                          Voluptatum nisi ducimus officiis veniam consectetur error dolorum voluptatem eius 
                          tempore voluptatibus. Quos accusamus nisi ipsa explicabo sit quidem maxime quasi veniam?</p>
                    </div>
                 </div>
              </div>
              <div
                 class="col-lg-4 col-md-6 col-sm-12 col-xs-12 rounded_bottom_right_30 pd_top_50 pd_left_50 pd_right_50 pd_bottom_50 bg_dark_2">
                 <div class="process_box style_two">
                    <div class="process_box_outer_two">
                       <div class="content_box clearfix">
                          <div class="icon">
                             <div class="img">
                                <img src="assets/images/service-ico-n-2.png" class="img-fluid svg_image"
                                   alt="icon png" />
                             </div>
                          </div>
                          <h2><a href="#" class="color_white">Swift Network</a></h2>
                       </div>
                       <p class="color_white">Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                          Voluptatum nisi ducimus officiis veniam consectetur error dolorum voluptatem eius 
                          tempore voluptatibus. Quos accusamus nisi ipsa explicabo sit quidem maxime quasi veniam?</p>
                    </div>
                 </div>
              </div>
           </div>
        </div>
     </section>
     
@endsection
@section('unlimitedplans')
<section class="price-section">
   <div class="row">
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
                              <a class="nav_link" href="#" target="&quot;_blank&quot;" rel="&quot;nofollow&quot;">
                                 4G/5G </a>
                           </small></li>
                        <li class="list_items pd_bottom_10">
                           <small class="d-flex align-items-center">
                              <span class="icon_bx">
                                 <i class=" icon-checked"></i>
                              </span>
                              <a class="nav_link" href="#" target="&quot;_blank&quot;" rel="&quot;nofollow&quot;">
                                 Data Plans</a>
                           </small></li>
                        <li class="list_items pd_bottom_10">
                           <small class="d-flex align-items-center">
                              <span class="icon_bx">
                                 <i class=" icon-checked"></i>
                              </span>
                              <a class="nav_link" href="#" target="&quot;_blank&quot;" rel="&quot;nofollow&quot;">
                                 SMS Plans </a>
                           </small></li>
                     </ul>
                  </div>
               </div>
               <div class="bottom">
                  <a href="{{route('regions', ['region' => 'EUR'])}}" target="_blank" rel="nofollow" class="theme-btn two">
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
                              <a class="nav_link" href="#" target="&quot;_blank&quot;" rel="&quot;nofollow&quot;">
                                 4G/5G </a>
                           </small></li>
                        <li class="list_items pd_bottom_10">
                           <small class="d-flex align-items-center">
                              <span class="icon_bx">
                                 <i class=" icon-checked"></i>
                              </span>
                              <a class="nav_link" href="#" target="&quot;_blank&quot;" rel="&quot;nofollow&quot;">
                                 Data Plans</a>
                           </small></li>
                        <li class="list_items pd_bottom_10">
                           <small class="d-flex align-items-center">
                              <span class="icon_bx">
                                 <i class=" icon-checked"></i>
                              </span>
                              <a class="nav_link" href="#" target="&quot;_blank&quot;" rel="&quot;nofollow&quot;">
                                 SMS Plans </a>
                           </small></li>
                     </ul>
                  </div>
               </div>
               <div class="bottom">
                  <a href="{{route('regions', ['region' => 'USA'])}}" target="_blank" rel="nofollow" class="theme-btn two">
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
                              <a class="nav_link" href="#" target="&quot;_blank&quot;" rel="&quot;nofollow&quot;">
                                 4G/5G </a>
                           </small></li>
                        <li class="list_items pd_bottom_10">
                           <small class="d-flex align-items-center">
                              <span class="icon_bx">
                                 <i class=" icon-checked"></i>
                              </span>
                              <a class="nav_link" href="#" target="&quot;_blank&quot;" rel="&quot;nofollow&quot;">
                                 Data Plans</a>
                           </small></li>
                        <li class="list_items pd_bottom_10">
                           <small class="d-flex align-items-center">
                              <span class="icon_bx">
                                 <i class=" icon-checked"></i>
                              </span>
                              <a class="nav_link" href="#" target="&quot;_blank&quot;" rel="&quot;nofollow&quot;">
                                 SMS Plans </a>
                           </small></li>
                     </ul>
                  </div>
               </div>
               <div class="bottom">
                  <a href="{{route('regions', ['region' => 'APC'])}}" target="_blank" rel="nofollow" class="theme-btn two">
                     See pricing plans
                     </a>
               </div>
            </div>
         </div>
      </div>
   </div>
   <h3 class="text-center my-5"><a href="{{route('countries')}}">See all 194 countries</a></h3 class="text-center my-5">
</section>
@endsection