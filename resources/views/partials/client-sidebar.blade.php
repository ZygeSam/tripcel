<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
      <a href="{{route('home')}}" target="_blank" class="app-brand-link">
        <span class="app-brand-logo demo">
          <img src={{asset("assets/images/FI.png")}} class="w-50" alt="Tripcel logo">
        </span>
      </a>

      <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
        <i class="bx bx-chevron-left bx-sm align-middle"></i>
      </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
      <!-- Homepage / Esim Nav -->
      <li class="menu-item @if (request()->fullUrl() == route('client.index')) active open @endif">
        <a href="{{route('client.index')}}" class="menu-link">
          <i class="menu-icon tf-icons bx bx-home-circle"></i>
          <div data-i18n="Dashboards">Dashboard</div>
        </a>
      </li>
      <li class="menu-item @if (request()->fullUrl() == route('esim.index',['userId'=> auth()->user()->id])) active open @endif">
        <a href="{{route('esim.index',['userId'=> auth()->user()->id])}}" class="menu-link">
          <i class="menu-icon tf-icons bx bx-home-circle"></i>
          <div data-i18n="Dashboards">My eSim</div>
        </a>
      </li>
      <!-- Profile Nav -->
      <li class="menu-item @if (request()->fullUrl() == route('client.profile')) active open @endif">
        <a href="#" class="menu-link menu-toggle">
          <i class="menu-icon tf-icons bx bx-dock-top"></i>
          <div data-i18n="Account Settings">Account Settings</div>
        </a>
        <ul class="menu-sub">
          <li class="menu-item @if (request()->fullUrl() == route('client.profile')) active open @endif">
            <a href="{{route('client.profile')}}" class="menu-link">
              <div data-i18n="Account">My Profile</div>
            </a>
          </li>
        </ul>
      </li>
    </ul>
  </aside>