<div class="medium-container">
    <div class="row align-items-center">
       <div class="col-lg-2 col-md-9 col-sm-9 col-xs-9 logo_column">
          <div class="header_logo_box">
             <a href="{{route('home')}}" class="logo navbar-brand">
                <img style="background-color: white; width: 6em; padding: 5px;" src={{asset("assets/images/FI.png")}} alt="Tripcel" class="logo_default">
             </a>
          </div>
       </div>
       <div class="col-lg-10 col-md-3 col-sm-3 col-xs-3 menu_column">
          <div class="navbar_togglers hamburger_menu">
             <span class="line"></span>
             <span class="line"></span>
             <span class="line"></span>
          </div>
          <div class="header_content_collapse">
             <div class="header_menu_box">
                <div class="navigation_menu">
                   <ul id="myNavbar" class="navbar_nav">
                      <li
                         class="menu-item  menu-item-has-children dropdown active dropdown_full position-static mega_menu nav-item">
                         <a href="" class="dropdown-toggle nav-link">
                            <span class="text-info">Travel Esim</span>
                         </a>
                         <ul class="dropdown-menu width_65_percentage">
                            <li>
                               <div class="row">
                                  <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                                     
                                     <div class="list_item_box style_one">
                                        <h4>Regional ESim Plans</h4>
                                        <ul>
                                           <li>
                                              <small class="d-flex align-items-center">
                                                 <i class="fi fi-us p-2 mx-1"></i>
                                                 <a class="nav_link" href="{{route('regions', ['region'=>'USA'])}}">USA+</a>
                                                 <span>5G</span>
                                              </small>
                                           </li>
                                           <li>
                                              <small class="d-flex align-items-center">
                                                 <i class="fi fi-eu p-2 mx-1"></i>
                                                 <a class="nav_link" href="{{route('regions', ['region'=>'EUR'])}}">Europe</a>
                                                 <span>5G</span>
                                              </small>
                                           </li>
                                           <li>
                                              <small class="d-flex align-items-center">
                                                 <i class="fi fi-as p-2 mx-1"></i>
                                                 <a class="nav_link" href="{{route('regions', ['region'=>'APC'])}}">Asia+</a>
                                                 <span>5G</span>
                                              </small>
                                           </li>
                                           <li>
                                              <small class="d-flex align-items-center">
                                                 <i class="fi fi-sa p-2 mx-1"></i>
                                                 <a class="nav_link" href="{{route('regions', ['region'=>'LAT'])}}">South America+</a>
                                                 <span>5G</span>
                                              </small>
                                           </li>
                                           <li>
                                              <small class="d-flex align-items-center">
                                                 <i class="fi fi-cr p-2 mx-1"></i>
                                                 <a class="nav_link" href="{{route('regions', ['region'=>'CRB'])}}">Carribean</a>
                                                 <span>5G</span>
                                              </small>
                                           </li>

                                        </ul>
                                     </div>
                                  </div>
                                  <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                                     <div class="list_item_box style_one">
                                        <ul>
                                          @for($i=0; $i<5; $i++)
                                          <li>
                                             <small class="d-flex align-items-center">
                                               <i class="fi fi-{{$countries[$i]['country_iso2']}} p-2 mx-1"></i>
                                                <a class="nav_link" href="{{route('country', ['country'=>$countries[$i]['country_name']])}}">{{$countries[$i]['country_name']}}</a>
                                             </small>
                                          </li>
                                          @endfor
                                        </ul>
                                     </div>
                                  </div>
                                  <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                                     <div class="list_item_box style_one">
                                        <ul>
                                          @for($i=20; $i<25; $i++)
                                          <li>
                                             <small class="d-flex align-items-center">
                                               <i class="fi fi-{{$countries[$i]['country_iso2']}} p-2 mx-1"></i>
                                                <a class="nav_link" href="{{route('country', ['country'=>$countries[$i]['country_name']])}}">{{$countries[$i]['country_name']}}</a>
                                             </small>
                                          </li>
                                          @endfor
                                        </ul>
                                        <u>
                                           <a class="nav_link" href="{{route('countries')}}">Get 194 Destinations</a>
                                        </u>
                                        
                                     </div>
                                  </div>
                                  <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                                     <div class="list_item_box style_one">
                                        <ul>
                                          @for($i=40; $i<45; $i++)
                                          <li>
                                             <small class="d-flex align-items-center">
                                               <i class="fi fi-{{$countries[$i]['country_iso2']}} p-2 mx-1"></i>
                                                <a class="nav_link" href="{{route('country', ['country'=>$countries[$i]['country_name']])}}">{{$countries[$i]['country_name']}}</a>
                                             </small>
                                          </li>
                                          @endfor
                                        </ul>
                                     </div>
                                     <h6>Popular ESim Destinations</h6>
                                  </div>
                                  
                               </div>
                               
                            </li>
                         </ul>
                      </li>
                      <li class="menu-item menu-item-has-children nav-item">
                        <a href="#" class="dropdown-toggle nav-link">
                           <span>Affiliate</span>
                        </a>
                     </li>
                      <li class="menu-item menu-item-has-children nav-item">
                         <a href="#" class="dropdown-toggle nav-link">
                            <span>About</span>
                         </a>
                      </li>
                      <li class="menu-item menu-item-has-children nav-item">
                        <a href="#"
                           class="dropdown-toggle nav-link"><span>FAQ</span></a>
                     </li>
                      <li class="menu-item menu-item-has-children nav-item">
                         <a href="#"
                            class="dropdown-toggle nav-link"><span>How it Works</span></a>
                      </li>
                      <li class="menu-item menu-item-has-children nav-item">
                         <a href="#"
                            class="dropdown-toggle nav-link"><span>Contact Us</span></a>
                      </li>
                      <li class="menu-item  menu-item-has-children nav-item">
                        <a href="{{route('showCart')}}" class="nav-link">
                            <span>Cart</span> <i class="bx bx-cart-alt" style="color: #fff; font-size: 22px;"></i>
                         </a>
                      </li>
                   </ul>
                </div>
             </div>
             <div class="header_right_content">
                <ul>
                   <li class="header-button">
                      <a href="{{route('login')}}" target="_blank" rel="" class="theme-btn one color_white_1"> Login <i style="color: #078586; font-size: 22px;" class=" mr-2 bx p-1 bx bx-log-in"></i></a>
                   </li>
                   <li class="header-button">
                      <a href="{{route('register')}}" target="_blank" rel="" class="theme-btn one color_white_1"> Sign up<i class='bx bx-user-plus p-1 mr-2' style="color: #078586; font-size: 22px;"></i> </a>
                   </li>
                </ul>
             </div>
          </div>
       </div>
    </div>
 </div>