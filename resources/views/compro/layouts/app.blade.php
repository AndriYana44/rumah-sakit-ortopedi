<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <title>RS Orthopedi SIAGA RAYA</title>

  <link rel="stylesheet" href="{{asset('assets-compro/assets')}}/css/maicons.css">

  <link rel="stylesheet" href="{{asset('assets-compro/assets')}}/css/bootstrap.css">

  <link rel="stylesheet" href="{{asset('assets-compro/assets')}}/vendor/owl-carousel/css/owl.carousel.css">

  <link rel="stylesheet" href="{{asset('assets-compro/assets')}}/vendor/animate/animate.css">

  <link rel="stylesheet" href="{{asset('assets-compro/assets')}}/css/theme.css">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css" />

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>
<body>

    <!-- Back to top button -->
    <div class="back-to-top"></div>
    
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

<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAIA_zqjFMsJM_sxP9-6Pde5vVCTyJmUHM&callback=initMap"></script>
  
<script>
  // toggle menu active
  $(document).ready(function () {
    var url = window.location;
    $('ul.navbar-nav a[href="' + url + '"]').parent().addClass('active');
    $('ul.navbar-nav a').filter(function () {
      return this.href == url;
    }).parent().addClass('active');
  });
</script>
@yield('script')
</body>
</html>