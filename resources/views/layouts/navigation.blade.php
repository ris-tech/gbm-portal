<nav class="navbar navbar-dark bg-dark">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

      <a class="navbar-brand mr-auto" href="#">
        <img src="{{ asset('assets/img/logo_brand.png') }}" height="60px;"> GBM Portal
    </a>
    <button class="js-toggle-fullscreen-btn toggle-fullscreen-btn" aria-label="Enter fullscreen mode" hidden>
        <svg class="toggle-fullscreen-svg" width="28" height="28" viewBox="-2 -2 28 28">
            <g class="icon-fullscreen-enter">
                <path d="M 2 9 v -7 h 7" />
                <path d="M 22 9 v -7 h -7" />
                <path d="M 22 15 v 7 h -7" />
                <path d="M 2 15 v 7 h 7" />
            </g>

            <g class="icon-fullscreen-leave">
                <path d="M 24 17 h -7 v 7" />
                <path d="M 0 17 h 7 v 7" />
                <path d="M 0 7 h 7 v -7" />
                <path d="M 24 7 h -7 v -7" />
            </g>
        </svg>
    </button>
      <div class="offcanvas offcanvas-start text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
        <div class="offcanvas-header">
          <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">GBM Portal</h5>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
          <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
            @guest
                @if (Route::has('login'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                @endif

                @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                @endif
            @else
                <li><a class="nav-link" href="{{ route('index') }}"><i class="bi bi-person-badge me-2" style="width:20px;"></i> Početna</a></li>
               <li><a class="nav-link" href="{{ route('customers.index') }}"><i class="bi bi-person-badge me-2" style="width:20px;"></i> Musterije</a></li>
               <li><a class="nav-link" href="{{ route('customers.create') }}"><i class="bi bi-person-add me-2" style="width:20px;"></i> Nova mušterija</a></li>
                <li class="nav-item dropdown">
                    <a id="podesavanja" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        <i class="bi bi-gear-fill me-2" style="width:20px;"></i> Podešavanja
                    </a>
                    <div class="dropdown-menu dropdown-menu-dark" aria-labelledby="podesavanja">
                        <a class="dropdown-item" href="{{ route('services.index') }}">Deltanosti</a>

                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a id="profil" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        <i class="bi bi-person-circle me-2" style="width:20px;"></i> {{ Auth::user()->name }}
                    </a>

                    <div class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('profile.edit') }}">{{ __('Profile') }}</a>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
            @endguest
          </ul>
        </div>
      </div>
    </div>
</nav>
