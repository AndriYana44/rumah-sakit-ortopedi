<style>
  .line-h {
    width: .5px;
    height: 30px;
    background-color: #c0c0c0;
  }
</style>

<header>
    <div class="topbar">
      <div class="container">
        <div class="row">
          <div class="col-sm-8 text-sm">
            <div class="site-info">
              <a href="#"><span class="mai-call text-primary"></span> +00 123 4455 6666</a>
              <span class="divider">|</span>
              <a href="#"><span class="mai-mail text-primary"></span> mail@example.com</a>
            </div>
          </div>
          <div class="col-sm-4 text-right text-sm">
            <div class="social-mini-button">
              <a href="#"><span class="mai-logo-facebook-f"></span></a>
              <a href="#"><span class="mai-logo-twitter"></span></a>
              <a href="#"><span class="mai-logo-dribbble"></span></a>
              <a href="#"><span class="mai-logo-instagram"></span></a>
            </div>
          </div>
        </div> <!-- .row -->
      </div> <!-- .container -->
    </div> <!-- .topbar -->

    <nav class="navbar navbar-expand-lg navbar-light shadow-sm">
      <div class="container">
        {{-- <a class="navbar-brand" href="#"><span class="text-primary">One</span>-Health</a> --}}
        <div class="logo-wrapper d-flex flex-column justify-content-center align-items-center py-2">
          <img src="{{ asset('assets/images/logos/logo.png') }}" width="250" alt="logos">
        </div>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupport" aria-controls="navbarSupport" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupport">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="{{ route('home') }}">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('about') }}">About Us</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('doctors') }}">Doctors</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('blog') }}">News</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('karir') }}">Karir</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('contact') }}">Contact</a>
            </li>
            @guest
                <li class="nav-item">
                    <a class="nav-link ml-lg-3 text-primary" href="{{ route('login') }}">
                      <b>Login</b>
                    </a>
                </li>
                <div class="line-h"></div>
                <li class="nav-item">
                    <a class="nav-link text-primary" href="{{ route('register') }}">
                      <b>Daftar</b>
                    </a>
                </li>
            @else
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle ml-lg-3" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{ Auth::user()->name }}
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        @if(Auth::user()->role === 1)
                            <a class="dropdown-item" href="{{ route('dashboard') }}">Dashboard</a>
                        @endif
                        <a class="dropdown-item" href="{{ route('signout') }}">Logout</a>
                    </div>
                </li>
            @endguest
          </ul>
        </div> <!-- .navbar-collapse -->
      </div> <!-- .container -->
    </nav>
  </header>