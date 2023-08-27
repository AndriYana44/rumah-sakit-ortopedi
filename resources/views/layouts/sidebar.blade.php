<!-- Sidebar Start -->
<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div>
      <div class="brand-logo d-flex align-items-center justify-content-center mt-4">
        <img src="{{ asset('assets/images/logos/logo.png') }}" width="230" alt="logos">
      </div>
      <hr>
      <!-- Sidebar navigation-->
      <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
        <ul id="sidebarnav">
          <li class="sidebar-item">
            <a class="sidebar-link" href="{{ route('dashboard') }}" aria-expanded="false">
              <span>
                <i class="ti ti-layout-dashboard"></i>
              </span>
              <span class="hide-menu">Dashboard</span>
            </a>
          </li>
          <li class="nav-small-cap">
            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
            <span class="hide-menu">MASTER</span>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link" href="{{ route('dokter') }}" aria-expanded="false">
              <span>
                <i class="fa fa-user-md"></i>
              </span>
              <span class="hide-menu">Dokter</span>
            </a>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link" href="{{ route('dokter.jadwal') }}" aria-expanded="false">
              <span>
                <i class="fa fa-calendar"></i>
              </span>
              <span class="hide-menu">Jadwal Dokter</span>
            </a>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link" href="#" aria-expanded="false">
              <span>
                <i class="fa fa-address-card"></i>
              </span>
              <span class="hide-menu">Postingan</span>
            </a>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link" href="#" aria-expanded="false">
              <span>
                <i class="fa fa-list"></i>
              </span>
              <span class="hide-menu">Kategori</span>
            </a>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link" href="#" aria-expanded="false">
              <span>
                <i class="fa fa-tags"></i>
              </span>
              <span class="hide-menu">Tags</span>
            </a>
          </li>
          
          <li class="nav-small-cap">
            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
            <span class="hide-menu">USER PERMISSION</span>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link" href="{{ route('user') }}" aria-expanded="false">
              <span>
                <i class="ti ti-user"></i>
              </span>
              <span class="hide-menu">User</span>
            </a>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link" href="./authentication-register.html" aria-expanded="false">
              <span>
                <i class="ti ti-user-plus"></i>
              </span>
              <span class="hide-menu">User Akses</span>
            </a>
          </li>
          
        </ul>
      </nav>
      <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
  </aside>
  <!--  Sidebar End -->