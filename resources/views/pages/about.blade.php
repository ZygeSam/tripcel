@extends('layouts.purchase')
@section('pageTitle', 'About Us')
@section('previousPageTitle', 'Home')
@section('presentPageTitle', 'About Us')
@section('content')
<div id="content" class="site-content ">
   <!---about--->
   <section class="about-section">
      <!--===============spacing==============-->
      <div class="pd_top_90"></div>
      <!--===============spacing==============-->
      <div class="container">
         <div class="row">
            <div class="col-xl-6 col-lg-12 ">
               <div class="about_content position-relative z_99">
                  <div class="title_all_box style_one text-left  dark_color">
                     <div class="title_sections">
                        <div class="before_title">We are Leaders</div>
                        <h2> in Digital Telecommunication</h2>
                     </div>
                  </div>
                  <!--===============spacing==============-->
                  <div class="pd_bottom_15"></div>
                  <!--===============spacing==============-->
                  <div class="extra_content image_with_content dark_color">
                     <div class="simple_image">
                        <img src="assets/images/FII.png" alt="img">
                        <h2> Since 2002, <br> Operating in Ontario.</h2>
                     </div>
                  </div>
                  <!--===============spacing==============-->
                  <div class="pd_bottom_20"></div>
                  <!--===============spacing==============-->
                  <div class="description_box">
                     <p>Tripcel eSIM provides unlimited travel connectivity! Think of a world where you can travel the world without worrying about staying connected. 

                        As avid travellers, we have experienced the frustrations of being without internet in unfamiliar places—juggling SIM cards and paying exorbitant roaming fees. So, Tripcel was created with the goal of changing the way you connect while you are traveling.
                        
                        Our mission is to provide a simple, affordable travel data plan without connectivity issues. We believe travel should be free, exploratory, and culturally diverse, not restricted or expensive. 
                        
                        Tripcel is a revolutionary solution that connects your eSIM-compatible smartphone, tablet, or PC to over 200+ countries in under 2 minutes. No more SIM cards or SIM swapping—our technology ensures easy connectivity regardless of your location.
                        
                        Tripcel is more than a connection—it is a personal journey. We have created a boutique experience to meet your specific needs as a traveler. 
                        
                        From the moment you become a part of our Tripcel family, you'll sense the personal touch and attention to detail that set us apart.
                        
                        Enjoy uninterrupted connectivity on your next adventure. Make Tripcel your travel companion to share memories, navigate easily, and stay in touch with loved ones. 
                        
                        Welcome to a world where travel knows no boundaries and connectivity is as effortless as breathing. 
                     </p>
                     <h3 class="pt-3">Welcome to Tripcel</h3>
                  </div>
                  <!--===============spacing==============-->
                  <div class="pd_bottom_25"></div>
                  <div class="theme_btn_all color_one">
                     <a href="{{route('contact')}}" rel="nofollow" class="theme-btn five">Contact us<i class="icon-right-arrow"></i></a>
                  </div>
                  <!--===============spacing==============-->
                  <div class="row gutter_15px">
                     <div class="col-lg-6 col-md-12">
                        <div class="icon_box_all  style_two">
                           <!--===============spacing==============-->
                           <div class="pd_bottom_25"></div>
                           <!--===============spacing==============-->
                        </div>
                     </div>
                  </div>

                  
               </div>
            </div>
            <div class="col-xl-6 col-lg-12">
               <div class="image_boxes style_two">
                  <img src="assets/images/shape-1.png" class="background_image" alt="image">
                  <div class="image one">
                     <img src="assets/images/about/about-6.png" class="img-fluid" alt="image">
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
         </div>
      </div>
      <!--===============spacing==============-->
      <div class="pd_bottom_70"></div>
      <!--===============spacing==============-->
   </section>
   <!---about end--->
   <!---service--->
   <section class="service-icon-section bg_light_1">
   <!--===============spacing==============-->
   <div class="pd_top_90"></div>
   <!--===============spacing==============-->
      <div class="container">
         <div class="row">
            <div class="col-lg-12">
               <div class="title_all_box style_one text-center dark_color">
                  <div class="title_sections">
                     <div class="before_title">Our Business</div>
                     <h2 class="title">Stand Out From The Rest</h2>
                  </div>
                  <!--===============spacing==============-->
                  <div class="pd_bottom_20"></div>
                  <!--===============spacing==============-->
               </div>
            </div>
         </div>
         <div class="row">
            <div class="col-xl-4 col-lg-6 col-md-12 col-sm-12 col-xs-12">
               <div class="simple_image_boxes parallax_cover height_264px">
                     <img src="assets/images/icon-img-ab-1.jpg" class="simp_img cover-parallax" alt="image">
               </div>
               <!--===============spacing==============-->
               <div class="pd_bottom_20"></div>
               <!--===============spacing==============-->
               <div class="icon_box_all style_three">
                  <div class="icon_content ">
                     <div class="icon">
                        <span class=" icon-bow-and-arrow"></span>
                     </div>
                     <div class="txt_content">
                        <h3><a href="#" target="_blank" rel="nofollow">Our Mission</a></h3>
                        <p>Our mission is to redefine travel by providing seamless connectivity to travelers worldwide with a simple, affordable travel data plan. 

                           We aim to remove communication barriers so every traveler can explore the world. Through cutting-edge technology and personalized services, we empower people to travel freely and create unforgettable memories.
                           
                           </p>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-xl-4 col-lg-6 col-md-12 col-sm-12 col-xs-12 mt-4 mt-lg-0 mt-xl-0">
               <div class="icon_box_all style_three">
                  <div class="icon_content ">
                     <div class="icon">
                        <span class=" icon-growth"></span>
                     </div>
                     <div class="txt_content">
                        <h3><a href="#" target="_blank" rel="nofollow">Our Core Values</a></h3>
                        <p>We pride ourselves in these values and we make sure every of our staff exhibit them</p>
                        <ul>
                           <li><b>Innovation:</b>
                              Our passion for innovation drives us to find new ways to improve travel connectivity. We use technology to stay ahead of the competition and offer cutting-edge services.
                              </li>
                           <li><b>Customer-centricity:</b>
                              Our customers are at the heart of everything we do. We tailor experiences to each traveler's needs and exceed expectations.
                           </li>
                           <li><b>Reliability:</b>
                              Trust is the foundation of our brand. Tripcel provides reliable and consistent connectivity solutions worldwide, ensuring customer trust.

                           </li>
                           <li><b>Freedom:</b>
                              We believe in the freedom to explore without boundaries. Our services remove connectivity barriers so travelers can fully experience diverse cultures and experiences.
                           </li>
                           <li><b>Integrity: </b>
                              Honesty and transparency are the pillars of our interactions. We respect customers, partners, and colleagues and conduct business ethically.
                           </li>
                           <li>
                              <b>Adaptability:</b>
                              Travel and technology are dynamic, so we adapt. We adapt our services to meet customer and travel industry needs by being agile and responsive.
                           </li>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-xl-4 col-lg-6 col-md-12 col-sm-12 col-xs-12 mt-4 mt-lg-4 mt-xl-0">
               <div class="icon_box_all style_three">
                  <div class="icon_content ">
                     <div class="icon">
                        <span class=" icon-binoculars"></span>
                     </div>
                     <div class="txt_content">
                        <h3><a href="#" target="_blank" rel="nofollow">Our Vision</a></h3>
                        <p>Tripcel aims to lead the world in innovative travel connectivity solutions. We want to make connectivity easy so travelers can connect with people, cultures, and experiences. 

                           We push boundaries and embrace advancements to set new standards in the travel industry, making Tripcel the top choice for travelers seeking unmatched connectivity.
                           </p>
                     </div>
                  </div>
               </div>
               <!--===============spacing==============-->
               <div class="pd_bottom_20"></div>
               <!--===============spacing==============-->
               <div class="simple_image_boxes  height_264px">
                  <img src="assets/images/icon-img-ab-2.jpg" class="simp_img img-fluid" alt="image">
               </div>
            </div>
         </div>
      </div>
   <!--===============spacing==============-->
   <div class="pd_top_90"></div>
   <!--===============spacing==============-->
   </section>
   <!---service end--->
   <!---tab---->
      <section class="tab-section bg_op_1" style="background-image:url(assets/images/tab-sec-bg.jpg);">
         <!--===============spacing==============-->
             <div class="pd_top_100"></div>
         <!--===============spacing==============-->
            <div class="container">
               <div class="row">
                  <div class="tabs_all_box  tabs_all_box_start type_one">
                     <div class="tab_over_all_box">
                        <div class="tabs_header clearfix">
                           <ul class="showcase_tabs_btns nav-pills nav   clearfix">
                              <li class="nav-item">
                                 <a class="s_tab_btn nav-link active" data-tab="#tabtabone">Seamless Connectivity Everywhere</a>
                              </li>
                              <li class="nav-item">
                                 <a class="s_tab_btn nav-link" data-tab="#tabtabtwo">Innovative eSIM Technology</a>
                              </li>
                              <li class="nav-item">
                                 <a class="s_tab_btn nav-link" data-tab="#tabtabthree">Affordable Travel Data Plans</a>
                              </li>
                              <li class="nav-item">
                                 <a class="s_tab_btn nav-link" data-tab="#tabtabfour">Freedom to Explore Without Restrictions</a>
                              </li>
                              <li class="nav-item">
                                 <a class="s_tab_btn nav-link" data-tab="#tabtabfive">Personalized Boutique Experience</a>
                              </li>
                              <li class="nav-item">
                                 <a class="s_tab_btn nav-link" data-tab="#tabtabsix">Reliable and Consistent Service</a>
                              </li>
                           </ul>
                           {{-- <div class="toll_free">
                              <a href="tel:180667586677"> <i class="icon-phone-call"></i>Call For Free
                                 Consultation</a>
                           </div> --}}
                        </div>
                        <div class="s_tab_wrapper">
                           <div class="s_tabs_content">
                              <div class="s_tab fade active-tab show" id="tabtabone">
                                 <div class="tab_content one" style="background-image:url(assets/images/tab-image.jpg)">
                                    <div class="content_image">
                                       <h6>Why Tripcel</h6>

                                       <p>In over 200 countries, Tripcel provides unmatched connectivity, allowing you to stay connected anywhere. Travel without searching for local SIM cards or dealing with connectivity issues.</p>

                                    </div>
                                 </div>
                              </div>
                              <div class="s_tab fade" id="tabtabtwo">
                                 <div class="tab_content one" style="background-image:url(assets/images/blog/blog-image-8.jpg)">
                                    <div class="content_image">
                                       <h6>Why Tripcel</h6>

                                       <p>Tripcel's eSIM technology advances travel connectivity. Our innovative solution lets you connect in under 2 minutes with your eSIM-compatible smartphone, tablet, or PC without SIM cards.</p>
                                    </div>
                                 </div>
                              </div>
                              <div class="s_tab fade" id="tabtabthree">
                                 <div class="tab_content one" style="background-image:url(assets/images/banner-five-bg.jpg)">
                                    <div class="content_image">
                                       <h6>Why Tripcel</h6>

                                       <p>We know how important budgeting is when traveling. Instead of expensive roaming charges, Tripcel offers affordable travel data plans. You can enjoy seamless connectivity without breaking the bank.</p>

                                    </div>
                                 </div>
                              </div>
                              <div class="s_tab fade" id="tabtabfour">
                                 <div class="tab_content one" style="background-image:url(assets/images/service-sidebar-contact-bg.jpg)">
                                    <div class="content_image">
                                       <h6>Why Tripcel</h6>

                                       <p>Travel should be about freedom and exploration, not about limitations. With Tripcel, bypass connectivity issues and fully experience new cultures. Helping you travel freely is our goal.</p>

                                    </div>
                                 </div>
                              </div>
                              <div class="s_tab fade" id="tabtabfive">
                                 <div class="tab_content one" style="background-image:url(assets/images/page-header-default.jpg)">
                                    <div class="content_image">
                                       <h6>Why Tripcel</h6>

                                       <p>Tripcel values personalized travel. We personalize your boutique experience. Join our Tripcel family and experience our meticulousness.
                                       </p>

                                    </div>
                                 </div>
                              </div>
                              <div class="s_tab fade" id="tabtabsix">
                                 <div class="tab_content one" style="background-image:url(assets/images/page-header-default.jpg)">
                                    <div class="content_image">
                                       <h6>Why Tripcel</h6>

                                       <p>Trust is key to connectivity. Tripcel provides reliable, consistent services. Our service lets you share your travel memories and stay in touch with loved ones.
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
            <div class="pd_bottom_90"></div>
         <!--===============spacing==============-->
      </section>
      <!---tab-end--->
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