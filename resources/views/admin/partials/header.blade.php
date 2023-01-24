<nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm text-white">
  <div class="container-fluid">
    <a class="navbar-brand d-flex align-items-center" href="{{ url('/') }}">
      <div class="text-white">
        Portfolio
      </div>
      {{-- config('app.name', 'Laravel') --}}
    </a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <!-- Left Side Of Navbar -->
      <ul class="navbar-nav me-auto">
        <li class="nav-item">
          <a class="nav-link text-white" href="{{ url('/') }}"><i class="fa-solid fa-globe me-1"></i>Show
            website</a>
        </li>
      </ul>

      <!-- Right Side Of Navbar -->
      <ul class="navbar-nav ml-auto">
        <!-- Authentication Links -->
        @guest
          <li class="nav-item">
            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
          </li>
          @if (Route::has('register'))
            <li class="nav-item">
              <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
            </li>
          @endif
        @else
          <form class="d-flex" role="search" action="{{ route('admin.projects.index') }}" method="GET">
            @csrf
            <input class="form-control me-2" name="search" type="text" placeholder="Search project name">
            <button class="btn btn-outline-light me-5" type="submit">Search</button>
          </form>

          <li class="nav-item">
            <span></span>

          </li>


          <li class="nav-item align-items-center ms-2 navbar-text">
            <a class="dropdown-item" href="{{ route('logout') }}"
              onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
              {{ __('Logout') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
              @csrf
            </form>
          </li>
        @endguest
      </ul>
    </div>
  </div>
</nav>
