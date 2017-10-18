<header class="header">
    <nav class="navbar">
      <!-- Search Box-->
      <div class="search-box">
        <button class="dismiss"><i class="fa fa-times" aria-hidden="true"></i></button>
        <form id="searchForm" action="#" role="search">
          <input style="background-color: #2f333e; color: #FFF" type="search" placeholder="Search for albums, users, tags,..." class="form-control">
        </form>
      </div>
      <div class="container-fluid">
        <div class="navbar-holder d-flex align-items-center justify-content-between">
          <!-- Navbar Header-->
          <div class="navbar-header">
            <!-- Navbar Brand -->
            <a href="#" class="navbar-brand">
              <div class="brand-text brand-big hidden-lg-down">
                <strong>UETGRAM</strong>
              </div>
              <div class="brand-text brand-small">
                <strong>UG</strong>
              </div>
            </a>
            <!-- Toggle Button-->
            <a id="toggle-btn" href="#" class="menu-btn active">
              <span></span>
              <span></span>
              <span></span>
            </a>
          </div>
          <!-- Navbar Menu -->
          <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center" style="padding-right: 0">

            <!-- Search-->
            <li class="nav-item d-flex align-items-center">
              <a id="search" href="#"><i class="fa fa-search" aria-hidden="true"></i></span></a>
            </li>
            @if (Auth::guest())
            <li class="nav-item"><a href="{{ route('login') }}">Login <i class="fa fa-sign-in" aria-hidden="true"></i></a></li>
            <li class="nav-item"><a href="{{ route('register') }}"> Signup <i class="fa fa-user-plus" aria-hidden="true"></i></a></li>
            @else
            <li class="nav-item">
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                     Logout <i class="fa fa-sign-out" aria-hidden="true"></i>
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </li>
            @endif
          </ul>
        </div>
      </div>
    </nav>
  </header>