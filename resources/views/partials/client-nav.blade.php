<nav
            class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
            id="layout-navbar">
            <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
              <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                <i class="bx bx-menu bx-sm"></i>
              </a>
            </div>

            <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
           

              <ul class="navbar-nav flex-row align-items-center ms-auto">

                <!-- User -->
                <li class="nav-item navbar-dropdown dropdown-user dropdown">
                  <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                    <div class="avatar avatar-online">
                      <i class='bx bxs-user-circle fs-1'></i>
                      {{-- <img src={{asset("assets/images/avatars/1.png")}} alt class="w-px-40 h-auto rounded-circle" /> --}}
                    </div>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                      <a class="dropdown-item" href="#">
                        <div class="d-flex">
                          <div class="flex-shrink-0 me-3">
                            <div class="avatar avatar-online">
                              <i class='bx bxs-user-circle fs-1'></i>
                            </div>
                          </div>
                          <div class="flex-grow-1">
                            <span class="fw-medium d-block">{{auth()->user()->firstName}} {{auth()->user()->lastName}}</span>
                          </div>
                        </div>
                      </a>
                    </li>
                    <li>
                      <div class="dropdown-divider"></div>
                    </li>
                    <li>
                      <a class="dropdown-item text-tripcel" href="{{route('client.profile')}}">
                        <i class="bx bx-user me-2"></i>
                        <span class="align-middle">My Profile</span>
                      </a>
                    </li>
                    <li>
                      <a class="dropdown-item text-tripcel" href="{{route('client.cart')}}">
                        <span class="d-flex align-items-center align-middle">
                          <i class="flex-shrink-0 bx bx-cart me-2"></i>
                          <span class="flex-grow-1 align-middle ms-1">Cart</span>
                          <span class="flex-shrink-0 badge badge-center rounded-pill bg-danger w-px-20 h-px-20">
                            @if(session()->has('cart'))
                              {{count(session()->get('cart')['products'])}}
                            @else
                            0
                            @endif
                            </span>
                        </span>
                      </a>
                    </li>
                    <li>
                      <div class="dropdown-divider"></div>
                    </li>
                    <li>
                        <a type="button" class="dropdown-item" onclick="document.getElementById('logout-form').submit()">Logout <i class="bx bx-power-off me-2"></i></a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST">
                          @csrf
                      </form>
                    </li>
                  </ul>
                </li>
                <!--/ User -->
              </ul>
            </div>
          </nav>