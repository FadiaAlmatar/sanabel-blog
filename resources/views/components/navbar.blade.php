{{-- <nav class="navbar" role="navigation" aria-label="main navigation">
    <div class="container">
      <div class="navbar-brand">
        <a class="navbar-item" href="https://www.facebook.com/Sanabel.ngo">
          <img src="/images/brand1.png" width="112" height="28">
        </a>
        <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
          <span aria-hidden="true"></span>
          <span aria-hidden="true"></span>
          <span aria-hidden="true"></span>
        </a>
      </div>
      <div id="navbarBasicExample" class="navbar-menu">
        <div class="navbar-start">
          <a class="navbar-item {{ Route::currentRouteName() == 'home' ? 'is-active' : '' }}">
            Home
          </a>
          <a class="navbar-item">
            Documentation
          </a>
          <div class="navbar-item has-dropdown is-hoverable">
            <a class="navbar-link">
              More
            </a>
            <div class="navbar-dropdown">
              <a class="navbar-item">
                About
              </a>
              <a class="navbar-item">
                Jobs
              </a>
              <a class="navbar-item">
                Contact
              </a>
              <hr class="navbar-divider">
              <a class="navbar-item">
                Report an issue
              </a>
            </div>
          </div>
        </div>
        <div class="navbar-end">
          <div class="navbar-item">
            <div class="buttons">
              <a class="button is-primary">
                <strong>Sign up</strong>
              </a>
              <a class="button is-light">
                Log in
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </nav> --}}
  <nav class="navbar navbar-expand-lg  navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand" href="https://www.facebook.com/Sanabel.ngo" style="color: #eb640a">SANABEL</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item ">
            <a class="nav-link active" aria-current="page" href="/" style="color: #eb640a">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="{{route('categories.index')}}" style="color: #eb640a">Categories</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="{{route('tags.index')}}" style="color: #eb640a">Tags</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: #eb640a">
              Account
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              @guest
              <li><a class="dropdown-item" href="{{route('login')}}"style="color: #eb640a">Log in</a></li>
              <li><a class="dropdown-item" href="{{route('register')}}" style="color: #eb640a">Sign in</a></li>
              <li><hr class="dropdown-divider"></li>
              @endguest
              @auth
              {{-- <li><a class="dropdown-item" href="{{route('logout')}}" style="color: #eb640a">Log out</a></li> --}}

              {{-- <div class="navbar-item">
                Hi {{ Auth::user()->name }}!!
              </div> --}}
              <li><form action="{{ route('logout') }}" method="post">
                @csrf
                <input type="submit" class="button is-light" value="Logout">
              </form></li>
              @endauth
            </ul>
          </li>

        </ul>
        <form class="d-flex">
          <input id="search"class="form-control me-2" type="search" placeholder="Search" aria-label="Search" style="border-color:#eb640a">
          <button class="btn btn-success" type="submit">Search</button>
        </form>
      </div>
    </div>
  </nav>

