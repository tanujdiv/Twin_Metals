<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm sticky-top">
  <div class="container">
    <a class="navbar-brand fw-bold" href="#">ShopX</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navmenu">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navmenu">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item"><a class="nav-link active" href="#">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="#products">Products</a></li>
        <li class="nav-item"><a class="nav-link" href="#about">About</a></li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
            aria-expanded="false">
            Dropdown
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>

      </ul>

      <form class="d-flex me-3" role="search">
        <input id="searchInput" class="form-control me-2" type="search" placeholder="Search products...">
        <button class="btn btn-outline-secondary" type="submit"><i class="bi bi-search"></i></button>
      </form>

      <div class="d-flex align-items-center position-relative">
        <form action="{{ url('viewcart') }}" method="get">
          @csrf
        <button class="btn btn-outline-primary me-2">
          <i class="bi bi-cart"><span style="color: red">{{ $cartCount > 0 ? '(' . $cartCount . ')' : '' }}</span> </i>
          
        </button>
        </form>
        @if (Auth::check())
          <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="btn btn-primary">Log out ({{strtok(Auth::user()->name, ' ') }})</button>
          </form>
        @elseif (!Auth::check())
          <a href="{{ route('login') }}"><button class="btn btn-primary">Sign in</button></a>
        @endif
      </div>
    </div>
  </div>
</nav>