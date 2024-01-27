@extends('layouts.app')
@section('banner')
                           <div class="container-fluid m-0">
                              <div class="row align-items-center m-0">
                                 <div class="col-md-6">
                                    <div class="slider_content ">
                                       <p class="display-3 text-white " >International eSIMs</p> 
                                          <p class="lh-base text-light fs-4"><b>With Tripcel eSIM,</b> travel connectivity is easier than ever! Enjoy unlimited <br>data in <b>any country</b> without SIM card hassles.</p><br>
                                          <p class="lh-base text-light fs-4"> Whether you are a tourist exploring the rich history, a business traveler attending meetings, or simply enjoying the vibrant culture, Tripcel eSIM ensures you stay connected effortlessly.</p>
                                          <div class="animate_down theme_btn_all color_two my-4">
                                             <a href="{{route('countries')}}" class="theme-btn three px-5 fs-5 text-white" style="background-color: rgb(219, 165, 66); font-size:0.7em">Get Your Travel eSim Plan</a>  
                                          </div>
                                    </div>
                                 </div>
                                 <div class="col-md-6 px-0">
                                    <div class="animate_right p-0 m-0">
                                       @section('image')
                                          <x-image :image="asset('assets/images/tripcelBanner.png')"></x-image>
                                       @show
                                    </div>
                                 </div>
                              </div>
                           </div>
@endsection
@section('content')
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