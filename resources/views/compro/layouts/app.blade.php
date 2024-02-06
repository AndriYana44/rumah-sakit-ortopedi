<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>RS Orthopedi SIAGA RAYA</title>

  <link rel="stylesheet" href="{{asset('assets-compro/assets')}}/css/maicons.css">

  <link rel="stylesheet" href="{{asset('assets-compro/assets')}}/css/bootstrap.css">

  <link rel="stylesheet" href="{{asset('assets-compro/assets')}}/vendor/owl-carousel/css/owl.carousel.css">

  <link rel="stylesheet" href="{{asset('assets-compro/assets')}}/vendor/animate/animate.css">

  <link rel="stylesheet" href="{{asset('assets-compro/assets')}}/css/theme.css">
  <link rel="stylesheet" href="{{asset('assets')}}/css/home.css">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css" />

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css" rel="stylesheet" />
  <link href="{{ asset('assets/DataTables/datatables.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/css/select-option.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.15.2/css/selectize.default.min.css"/>
  <style>
    .whatsap-wrapper {
      transition: .5s;
      position: fixed;
      z-index: 9999;
      bottom: 10px;
      right: 15px;
      cursor: pointer;
    }
    .whatsap-wrapper img {
      transition: .3s;
      width: 70px;
    }
    .whatsap-wrapper img:hover {
      width: 80px;
    }
  </style>
</head>
<body>

    <!-- Back to top button -->
    <div class="whatsap-wrapper wow zoomIn" id="whatsap-wrapper">
      <img src="{{ asset('assets/images/logos/whatsapp_icon.png') }}" alt="whatsapp icon">
    </div>
    <div class="back-to-top wow zoomIn"></div>
    
    @include('compro.layouts.header')
    @yield('content')
    @include('compro.layouts.footer')

{{-- jquery --}}
<script src="{{ asset('assets/libs/jquery/dist/jquery.min.js') }}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>

<script src="{{asset('assets-compro/assets')}}/js/bootstrap.bundle.min.js"></script>

<script src="{{asset('assets-compro/assets')}}/vendor/owl-carousel/js/owl.carousel.min.js"></script>

<script src="{{asset('assets-compro/assets')}}/vendor/wow/wow.min.js"></script>

<script src="{{asset('assets-compro/assets')}}/js/theme.js"></script>

<script src="{{asset('assets-compro/assets')}}/js/google-maps.js"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAIA_zqjFMsJM_sxP9-6Pde5vVCTyJmUHM&callback=initMap"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
<script src="https://unpkg.com/validator.tool/dist/validator.min.js"></script>
<script src="{{ asset('assets/DataTables/datatables.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.15.2/js/selectize.min.js"></script>
<script>
  // toggle menu active
  $(document).ready(function () {
    // Set CSRF Token for every AJAX request
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('input').attr('autocomplete', 'off');

    var url = window.location;
    $('ul.navbar-nav a[href="' + url + '"]').parent().addClass('active');
    $('ul.navbar-nav a').filter(function () {
      return this.href == url;
    }).parent().addClass('active');

    $(document).on("scroll", function() {
      var scrollHeight = $(this).scrollTop();
      if(scrollHeight >= 470) {
        $('#whatsap-wrapper').css({"bottom": "75px"});
      }else{
        $('#whatsap-wrapper').css({"bottom": "10px"});
      }
    });

    $('#whatsap-wrapper').on('click', function() {
      let newWindow = window.open("", "_blank");
      if(newWindow) {
        newWindow.location.href = 'https://api.whatsapp.com/send?phone=+628118996581&text=Halo,%20saya%20dapat%20info%20tentang%20RS%20Orthopedi%20Siaga%20Raya%20dari%20website%20www.rsorthopedisiagaraya.co.id.%20Bisa%20minta%20info%20lebih%20lanjut%3F';
      }
    });

    var dokterDropdown = $(".dokter-dropdown");
    // Menanggapi mouse masuk ke nav-link-dokter
    $("#nav-link-dokter, .dokter-dropdown").mouseenter(function() {
        dokterDropdown.show();
    });

    // Menanggapi mouse keluar dari dokter-dropdown atau nav-link-dokter
    $("#nav-link-dokter, .dokter-dropdown").mouseleave(function() {
        dokterDropdown.hide();
    });

  });
</script>
@yield('script')
</body>
</html>