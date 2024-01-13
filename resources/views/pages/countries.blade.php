@extends('layouts.app')
@section('banner-heading', 'International eSIMs')
@section('image')
    <!-- Your custom image or content goes here -->
    <x-image :image="asset('assets/images/banner.jpg')"></x-image>
@endsection
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
 <!---process end-->
 <!--about-->
 <section class="about-section">
    <!--===============spacing==============-->
    <div class="pd_top_90"></div>
    <div class="auto-container">
     <div class="row">
        <div class="col-lg-10 my-3">
           <div class="title_all_box style_one text-center dark_color">
              <div class="title_sections">
                 <div class="title">All International eSIMs</div>
              </div>
              <!--===============spacing==============-->
              <div class="pd_bottom_40"></div>
              <!--===============spacing==============-->
           </div>
        </div>
     </div>
     
     <div class="row">
         @forelse($countries as $country)
            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-xs-12 mb-4 mb-lg-0">
               <div class="content_box_cn style_one">
                  <div class="txt_content">
                  </i><h3><a href="{{route('country', ['country' => $country['country_name']])}}" rel="nofollow">{{$country['country_name']}}<i class="fi fi-{{$country['country_iso2']}} mx-3 mx-3"></i></a> </h3>
                  </div>
               </div>
               <!--===============spacing==============-->
               <div class="pd_bottom_20"></div>
               <!--===============spacing==============-->
            </div>
            @empty
            <p>No Countries</p>
         @endforelse
      </div>
  </div>
    <!--===============spacing==============-->
    
    <!--===============spacing==============-->
    <div class="pd_bottom_90"></div>
    <!--===============spacing==============-->
 </section>
 <!--about end-->

@endsection