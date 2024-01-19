<div class="medium-container">
    <div class="row align-items-center" style="z-index: 1100;">
       <div class="col-lg-2 col-md-9 col-sm-9 col-xs-9 logo_column">
          <div class="header_logo_box d-flex">
             <a href="{{route('home')}}" class="logo navbar-brand">
                <img src={{asset("assets/images/FI.png")}} alt="Tripcel" class="logo_default">
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
                                                 <a class="nav_link" href="{{route('country', ['country'=>'USA'])}}">USA+</a>
                                                 <span>5G</span>
                                              </small>
                                           </li>
                                           <li>
                                              <small class="d-flex align-items-center">
                                                 <i class="fi fi-eu p-2 mx-1"></i>
                                                 <a class="nav_link" href="{{route('regions', ['region'=>'Europe'])}}">Europe</a>
                                                 <span>5G</span>
                                              </small>
                                           </li>
                                           <li>
                                              <small class="d-flex align-items-center">
                                                 <i class="fi fi-as p-2 mx-1"></i>
                                                 <a class="nav_link" href="{{route('regions', ['region'=>'Asia'])}}">Asia+</a>
                                                 <span>5G</span>
                                              </small>
                                           </li>
                                           <li>
                                              <small class="d-flex align-items-center">
                                                 <i class="fi fi-sa p-2 mx-1"></i>
                                                 <a class="nav_link" href="{{route('regions', ['region'=>'South America'])}}">South America+</a>
                                                 <span>5G</span>
                                              </small>
                                           </li>
                                           <li>
                                              <small class="d-flex align-items-center">
                                                 <i class="fi fi-cr p-2 mx-1"></i>
                                                 <a class="nav_link" href="{{route('regions', ['region'=>'Caribbean'])}}">Carribean</a>
                                                 <span>5G</span>
                                              </small>
                                           </li>

                                        </ul>
                                     </div>
                                  </div>
                                  <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                                    <div class="list_item_box style_one">
                                        <ul id="countries-list1"></ul>
                                    </div>
                                 </div>
                                 <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                                       <div class="list_item_box style_one">
                                          <ul id="countries-list2"></ul>
                                       </div>
                                 </div>
                                 <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                                    <div class="list_item_box style_one">
                                       <ul id="countries-list3"></ul>
                                    </div>
                                 </div>
                               </div>
                               
                            </li>
                         </ul>
                      </li>
                      <li class="menu-item menu-item-has-children nav-item">
                        <a href="{{route('countryCoverage')}}" class="dropdown-toggle nav-link">
                           <span class="text-secondary">Network Coverage</span>
                        </a>
                     </li>
                      <li class="menu-item menu-item-has-children nav-item">
                         <a href="{{route('about')}}" class="dropdown-toggle nav-link">
                            <span class="text-secondary">About</span>
                         </a>
                      </li>
                      <li class="menu-item menu-item-has-children nav-item">
                        <a href="{{route('faq')}}"
                           class="dropdown-toggle nav-link"><span class="text-secondary">FAQ</span></a>
                     </li>
                      <li class="menu-item menu-item-has-children nav-item">
                         <a href="{{route('howitworks')}}"
                            class="dropdown-toggle nav-link"><span class="text-secondary">How it Works</span></a>
                      </li>
                      <li class="menu-item menu-item-has-children nav-item">
                         <a href="{{route('contact')}}"
                            class="dropdown-toggle nav-link"><span class="text-secondary">Contact Us</span></a>
                      </li>
                      <li class="menu-item  menu-item-has-children nav-item">
                        <a href="{{route('showCart')}}" class="nav-link">
                            <span class="text-secondary">Cart</span> <i class="bx bx-cart-alt" style="color: #fff; font-size: 22px;"></i>
                         </a>
                      </li>
                      @guest
                        <li class="d-xs-block d-sm-block d-md-block d-lg-block d-xl-none">
                           <a href="{{route('login')}}" target="_blank" rel="" class=""> Login <i style="color: #078586; font-size: 22px;" class=" mr-2 bx p-1 bx bx-log-in"></i></a>
                        </li>
                      @endguest
                      @auth('web')
                        <li class="menu-item  menu-item-has-children nav-item">
                           <a href="{{route('client.index')}}" class="nav-link">
                              <span class="text-secondary">Dashboard</span> <i class="bx bx-home-heart" style="color: #078586; font-size: 22px;"></i>
                           </a>
                        </li>
                        <li class="d-xs-block d-sm-block d-md-block d-lg-block d-xl-none">
                           <a type="button" onclick="document.getElementById('logout-form').submit()">Logout<i style="color: #078586; font-size: 22px;" class=" mr-2 bx p-1 bx bx-log-out-circle"></i></a>
                           <form id="logout-form" action="{{ route('logout') }}" method="POST">
                              @csrf
                           </form>
                        </li>
                      @endauth
                   </ul>
                </div>
             </div>
             <div class="header_right_content">
                <ul>
                  @guest
                      <li class="header-button">
                        <a href="{{route('login')}}" target="_blank" rel="" class="theme-btn one color_white_1"> Login <i style="color: #078586; font-size: 22px;" class=" mr-2 bx p-1 bx bx-log-in"></i></a>
                     </li>
                  @endguest
                  @auth('web')
                  
                  <form id="logout-form" action="{{ route('logout') }}" method="POST">
                     @csrf
                  </form>
                     <li class="header-button">
                        <a type="button" onclick="document.getElementById('logout-form').submit()" class="theme-btn one color_white_1">Logout<i style="color: #078586; font-size: 22px;" class=" mr-2 bx p-1 bx bx-log-out-circle"></i></a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST">
                           @csrf
                        </form>
                     </li>
                  @endauth
                </ul>
             </div>
          </div>
       </div>
    </div>
 </div>