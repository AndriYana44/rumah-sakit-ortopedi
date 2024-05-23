@php $partner = getPartner() @endphp

@if (!$partner->isEmpty())  
<div class="partner py-5" style="background-color: #fff;">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 text-center">
                <h4 class="text-primary">Partner & Asuransi</h4>
                <hr>
            </div>
            @foreach($partner as $item)
            <div class="col-sm-2">
              <a href="{{ $item->link_partner }}" class="post-thumb">
                <img src="{{ asset('') }}files/logo-partner/{{ $item->logo_partner }}" alt="logo-partner" style="width: 100%;">
              </a>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endif
<footer class="page-footer">
  <div class="container">
      <div class="row px-md-3">
        <div class="col-sm-6 col-lg-4 py-3 d-flex flex-column align-items-center">
          <ul class="footer-menu">
            <div class="logo-wrapper">
              <img src="{{ asset('assets/images/logos/logo-white.png') }}" alt="logo" width="250">
            </div>
            <li class="mt-3"><span>SOSIAL MEDIA</span></li>
            <div class="social-mini-button mt-2">
              <a target="_blank" href="https://www.facebook.com/rumahsakitorthopedisiagaraya?mibextid=LQQJ4d"><span class="mai-logo-facebook-f"></span></a>
              <!-- <a href="#"><span class="mai-logo-twitter"></span></a> -->
              <a class="ml-2" target="_blank" href="https://www.instagram.com/rssiagaraya?igsh=MXIwc2g2MjY1Nm5udQ%3D%3D&utm_source=qr"><span class="mai-logo-instagram"></span></a>
            </div>
          </ul>
        </div>
        <div class="col-sm-6 col-lg-4 py-3 d-flex flex-column align-items-center">
          <ul class="footer-menu">
            <li><h5>LAINNYA</h5></li>
            <li><a href="{{ route('karir') }}">Karir</a></li>
            <li><a href="{{ route('contact') }}">Kontak Kami</a></li>
          </ul>
        </div>
        <div class="col-sm-6 col-lg-4 py-3 d-flex flex-column align-items-center">
          <ul class="footer-menu">
            <li><h5>KONTAK</h5></li>
            <li><a href="#">Jl. Siaga Raya No.4-8, RT.14/RW.3, Pejaten Bar., Ps. Minggu, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12510</a></li>
            <li><a href="#">+62 811 899 6581</a></li>
            <li><span>Copyright &copy; 2024 RS Orthopedi Siaga Raya</span></li>
          </ul>
        </div>
      </div>
    </div>
  </footer>