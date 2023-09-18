<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div>
      <div class="brand-logo d-flex align-items-center justify-content-between">
        <div class="logo-wrapper d-flex flex-column justify-content-center align-items-center">
            <img src="{{ asset('assets/images/logos/favicon.png') }}" width="80" alt="logos">
            <img src="{{ asset('assets/images/logos/logo-name.png') }}" width="200" alt="logos">
          </div>
          <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer mt-3" id="sidebarCollapse">
            <i class="ti ti-x fs-8"></i>
          </div>
      </div>
      <!-- Sidebar navigation-->
      <nav class="sidebar-nav scroll-sidebar pb-5" data-simplebar="">
        <ul id="sidebarnav">
            <li class="nav-small-cap">
                <i class="ti ti-dots nav-small-cap-icon"></i>
                <span class="hide-menu">HOME</span>
            </li>
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
            <a class="sidebar-link" href="{{ route('postingan') }}" aria-expanded="false">
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
                <span class="hide-menu">Display</span>
            </li>
            <li class="sidebar-item has-submenu">
                <a class="sidebar-link" href="#">
                    <span><i class="fa fa-desktop"></i></span>
                    <span>Tampilan Compro</span>
                    <i class="fa fa-caret-down"></i>
                </a>
                <ul class="submenu collapse">
                    <li><a class="sidebar-link" href="#">
                        <i class="fa fa-hashtag"></i>
                        Banner
                    </a></li>
                    <li><a class="sidebar-link" href="#">
                        <i class="fa fa-hashtag"></i>
                        Paragraf
                    </a></li>
                </ul>
            </li>
            
            <li class="nav-small-cap">
                <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                <span class="hide-menu">USER PERMISSION</span>
            </li>
            <li class="sidebar-item">
            <a class="sidebar-link" href="{{ route('user') }}" aria-expanded="false">
                <span>
                    <i class="fa fa-user"></i>
                </span>
                <span class="hide-menu">User</span>
            </a>
            </li>
            <li class="sidebar-item">
            <a class="sidebar-link" href="#" aria-expanded="false">
                <span>
                    <i class="fa fa-user-plus"></i>
                </span>
                <span class="hide-menu">User Akses</span>
            </a>
            </li>

            <li class="nav-small-cap">
                <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                <span class="hide-menu">MENU MANAGEMENT</span>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="#" aria-expanded="false">
                    <span>
                        <i class="fa fa-bars"></i>
                    </span>
                    <span class="hide-menu">Menu</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="#" aria-expanded="false">
                    <span>
                        <i class="fa fa-bars"></i>
                    </span>
                    <span class="hide-menu">Menu Management</span>
                </a>
            </li>
        </ul>
        <!-- <div class="unlimited-access hide-menu bg-light-primary position-relative mb-7 mt-5 rounded">
          <div class="d-flex">
            <div class="unlimited-access-title me-3">
              <h6 class="fw-semibold fs-4 mb-6 text-dark w-85">Upgrade to pro</h6>
              <a href="https://adminmart.com/product/modernize-bootstrap-5-admin-template/" target="_blank" class="btn btn-primary fs-2 fw-semibold lh-sm">Buy Pro</a>
            </div>
            <div class="unlimited-access-img">
              <img src="../assets/images/backgrounds/rocket.png" alt="" class="img-fluid">
            </div>
          </div>
        </div> -->
      </nav>
      <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
  </aside>