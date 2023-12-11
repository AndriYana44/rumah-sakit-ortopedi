@extends('compro.layouts.app')
@section('content') 
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.css">
 <style>
  section .card:hover{
  background-color: blue;
  border-radius: 5px;
  box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
  text-decoration: none;
  cursor: pointer;
  color: whitesmoke;
  }
 
.tarkikComandSlider {
  width: 1100px;
  height: auto;
  margin-left: auto;
  margin-right: auto;
  padding-left: 50px;
  padding-right: 50px;
  position: relative;
}

.slick-dots {
  position: absolute;
  bottom: -45px;
  display: block;
  width: 100%;
  padding-bottom: 10px;
  list-style: none;
  text-align: center;
  /* margin-bottom: -5px; */
}
.slick-dots li {
  position: relative;
  display: inline-block;
  width: 6px;
  height: 6px;
  margin: 0 5px;
  padding: 0;
  cursor: pointer;
}
.slick-dots li button {
  display: none;
}
.slick-dots li:before {
  top: 1px;
  transition: all 0.5s;
  content: "";
  width: 6px;
  height: 6px;
  background-color: #999;
  position: absolute;
  
}
.slick-dots li.slick-active:before {
  top: 0;
  width: 8px;
  height: 8px;
  margin-left: -2px;
  background-color: #2A4988;
}

.slick-prev {
  left: -10px;
  transform: rotate(180deg);

}

.slick-next {
  right: -10px;
   

}

.slick-arrow {
  top: 50%;
  height: 26px;
  width: 14px;
  margin-top: -13px;
  position: absolute;
  font-size: 0;
  cursor: pointer;
  background-color: transparent;
  border: none;
  background-repeat: no-repeat;
}
 </style>
 <div class="page-hero bg-image overlay-dark" style="background-image: url(../assets-compro/assets/img/bg_image_1.jpg);">
    <div class="hero-section">
      <div class="container text-center wow zoomIn">
        <!-- <span class="subhead">Let's make your life happier</span> -->
        <h1 class="display-4">
          SELAMAT DATANG 
          <br>
            DI RS ORTHOPEDI SIAGA RAYA
      
          </h1>
          <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Daftar Berobat</button>
      </div>
    </div>
  </div>

     <!-- .page-section -->
   
    <div class="page-section pb-0">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-6 py-3 wow fadeInUp elementor-widget-container">
            <h1 class="elementor-heading-title elementor-size-default">Kesembuhan Anda Adalah Kebahagiaan Bagi Kami</h1>
            <p class="text-grey mb-2">Pelayanan Kesehatan Unggulan di RS. Orthopedi Siaga Raya
              <br>RS. Orthopedi Siaga Raya berkomitmen untuk memberikan layanan kesehatan terbaik bagi Anda dan keluarga. Dengan tenaga medis yang berpengalaman dan fasilitas terkini, kami siap membantu Anda mencapai kesehatan optimal.</p>
              <p class="text-grey mb-4">Sebagai rumah sakit yang mengkhususkan diri dalam perawatan tulang, RS. Orthopedi Siaga Raya menawarkan keunggulan dalam diagnosis, pengobatan, dan pemulihan. Dengan tim medis ahli kami, kami siap membantu pasien dengan berbagai kondisi tulang dan muskuloskeletal.</p>
          </div>
          <div class="col-lg-6 wow fadeInRight" data-wow-delay="400ms">
            <div class="img-place custom-img-1">
              <img src="../assets-compro/assets/img/bg-doctor.png" alt="">
            </div>
          </div>
        </div>
      </div>
    </div> <!-- .bg-light -->
  </div> <!-- .bg-light -->

   
  <section class="bg-light mx-auto mb-4 pt-4 pb-4">
    <div class="container">
      
      <div class="slick-wrapper">
       
        <div>
          <div class="col-sm">
            <div class="card py-9">
              <div class="card-body">
                <h5 class="card-title">Special title treatment</h5>
                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
              </div>
            </div>
          </div>
        </div>

        <div>
          <div class="col-sm">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Special title treatment</h5>
                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
              </div>
            </div>
          </div>
        </div>

        <div>
          <div class="col-sm">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Special title treatment</h5>
                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
              </div>
            </div>
          </div>
        </div>

        <div>
          <div class="col-sm">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Special title treatment</h5>
                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
              </div>
            </div>
          </div>
        </div>

         <div>
          <div class="col-sm">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Special title treatment</h5>
                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
              </div>
            </div>
          </div>
        </div>
        
         <div>
          <div class="col-sm">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Special title treatment</h5>
                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
              </div>
            </div>
          </div>
        </div>

         <div>
          <div class="col-sm">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Special title treatment</h5>
                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <div class="page-section">
    <div class="container">
      <h1 class="text-center mb-5 wow fadeInUp">Our Doctors</h1>

      <div class="owl-carousel wow fadeInUp" id="doctorSlideshow">
        <div class="item">
          <div class="card-doctor">
            <div class="header">
              <img src="../assets-compro/assets/img/doctors/doctor_1.jpg" alt="">
              <div class="meta">
                <a href="#"><span class="mai-call"></span></a>
                <a href="#"><span class="mai-logo-whatsapp"></span></a>
              </div>
            </div>
            <div class="body">
              <p class="text-xl mb-0">Dr. Stein Albert</p>
              <span class="text-sm text-grey">Cardiology</span>
            </div>
          </div>
        </div>
        <div class="item">
          <div class="card-doctor">
            <div class="header">
              <img src="../assets-compro/assets/img/doctors/doctor_2.jpg" alt="">
              <div class="meta">
                <a href="#"><span class="mai-call"></span></a>
                <a href="#"><span class="mai-logo-whatsapp"></span></a>
              </div>
            </div>
            <div class="body">
              <p class="text-xl mb-0">Dr. Alexa Melvin</p>
              <span class="text-sm text-grey">Dental</span>
            </div>
          </div>
        </div>
        <div class="item">
          <div class="card-doctor">
            <div class="header">
              <img src="../assets-compro/assets/img/doctors/doctor_3.jpg" alt="">
              <div class="meta">
                <a href="#"><span class="mai-call"></span></a>
                <a href="#"><span class="mai-logo-whatsapp"></span></a>
              </div>
            </div>
            <div class="body">
              <p class="text-xl mb-0">Dr. Rebecca Steffany</p>
              <span class="text-sm text-grey">General Health</span>
            </div>
          </div>
        </div>
        <div class="item">
          <div class="card-doctor">
            <div class="header">
              <img src="../assets-compro/assets/img/doctors/doctor_3.jpg" alt="">
              <div class="meta">
                <a href="#"><span class="mai-call"></span></a>
                <a href="#"><span class="mai-logo-whatsapp"></span></a>
              </div>
            </div>
            <div class="body">
              <p class="text-xl mb-0">Dr. Rebecca Steffany</p>
              <span class="text-sm text-grey">General Health</span>
            </div>
          </div>
        </div>
        <div class="item">
          <div class="card-doctor">
            <div class="header">
              <img src="../assets-compro/assets/img/doctors/doctor_3.jpg" alt="">
              <div class="meta">
                <a href="#"><span class="mai-call"></span></a>
                <a href="#"><span class="mai-logo-whatsapp"></span></a>
              </div>
            </div>
            <div class="body">
              <p class="text-xl mb-0">Dr. Rebecca Steffany</p>
              <span class="text-sm text-grey">General Health</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="page-section bg-light">
    <div class="container">
      <h1 class="text-center wow fadeInUp">Latest News</h1>
      <div class="row mt-5">
        <div class="col-lg-4 py-2 wow zoomIn">
          <div class="card-blog">
            <div class="header">
              <div class="post-category">
                <a href="#">Covid19</a>
              </div>
              <a href="blog-details.html" class="post-thumb">
                <img src="../assets-compro/assets/img/blog/blog_1.jpg" alt="">
              </a>
            </div>
            <div class="body">
              <h5 class="post-title"><a href="blog-details.html">List of Countries without Coronavirus case</a></h5>
              <div class="site-info">
                <div class="avatar mr-2">
                  <div class="avatar-img">
                    <img src="../assets-compro/assets/img/person/person_1.jpg" alt="">
                  </div>
                  <span>Roger Adams</span>
                </div>
                <span class="mai-time"></span> 1 week ago
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 py-2 wow zoomIn">
          <div class="card-blog">
            <div class="header">
              <div class="post-category">
                <a href="#">Covid19</a>
              </div>
              <a href="blog-details.html" class="post-thumb">
                <img src="../assets-compro/assets/img/blog/blog_2.jpg" alt="">
              </a>
            </div>
            <div class="body">
              <h5 class="post-title"><a href="blog-details.html">Recovery Room: News beyond the pandemic</a></h5>
              <div class="site-info">
                <div class="avatar mr-2">
                  <div class="avatar-img">
                    <img src="../assets-compro/assets/img/person/person_1.jpg" alt="">
                  </div>
                  <span>Roger Adams</span>
                </div>
                <span class="mai-time"></span> 4 weeks ago
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 py-2 wow zoomIn">
          <div class="card-blog">
            <div class="header">
              <div class="post-category">
                <a href="#">Covid19</a>
              </div>
              <a href="blog-details.html" class="post-thumb">
                <img src="../assets-compro/assets/img/blog/blog_3.jpg" alt="">
              </a>
            </div>
            <div class="body">
              <h5 class="post-title"><a href="blog-details.html">What is the impact of eating too much sugar?</a></h5>
              <div class="site-info">
                <div class="avatar mr-2">
                  <div class="avatar-img">
                    <img src="../assets-compro/assets/img/person/person_2.jpg" alt="">
                  </div>
                  <span>Diego Simmons</span>
                </div>
                <span class="mai-time"></span> 2 months ago
              </div>
            </div>
          </div>
        </div>

        <div class="col-12 text-center mt-4 wow zoomIn">
          <a href="blog.html" class="btn btn-primary">Read More</a>
        </div>

      </div>
    </div>
  </div> <!-- .page-section -->

  <div class="page-section">
    <div class="container">
      <h1 class="text-center wow fadeInUp">Make an Appointment</h1>

      <form class="main-form">
        <div class="row mt-5 ">
          <div class="col-12 col-sm-6 py-2 wow fadeInLeft">
            <input type="text" class="form-control" placeholder="Full name">
          </div>
          <div class="col-12 col-sm-6 py-2 wow fadeInRight">
            <input type="text" class="form-control" placeholder="Email address..">
          </div>
          <div class="col-12 col-sm-6 py-2 wow fadeInLeft" data-wow-delay="300ms">
            <input type="date" class="form-control">
          </div>
          <div class="col-12 col-sm-6 py-2 wow fadeInRight" data-wow-delay="300ms">
            <select name="departement" id="departement" class="custom-select">
              <option value="general">General Health</option>
              <option value="cardiology">Cardiology</option>
              <option value="dental">Dental</option>
              <option value="neurology">Neurology</option>
              <option value="orthopaedics">Orthopaedics</option>
            </select>
          </div>
          <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
            <input type="text" class="form-control" placeholder="Number..">
          </div>
          <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
            <textarea name="message" id="message" class="form-control" rows="6" placeholder="Enter message.."></textarea>
          </div>
        </div>

        <button type="submit" class="btn btn-primary mt-3 wow zoomIn">Submit Request</button>
      </form>
    </div>
  </div> <!-- .page-section -->
  {{-- {{ dd($dokter) }} --}}
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Form Pendaftaran Berobat</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-12">
              <div class="row">
                <div class="col-6">
                  <div class="form-group rekmed-wrapper">
                    <label for="rekmed">No. Rekam Medis</label>
                    <input type="number" id="rekmed" name="rekmed" class="form-control mb-2">
                    <div class="checkbox-rekmed d-flex align-items-center justify-center">
                      <input type="checkbox" id="rekmed-status" class="mr-2">
                      <label for="rekmed-status" class="form-check-label text-grey" style="font-size: 12px">Tidak Punya No. Rekam Medis</label>
                    </div>
                  </div>
                </div>
              </div>
              <hr>
            </div>
            <div class="col-6">
              <div class="form-group">
                <label for="asuransi">Nama Asuransi</label>
                <input type="text" id="asuransi" name="asuransi" class="form-control">
              </div>
              <div class="form-group">
                <label for="asuransi">Nomor Kartu</label>
                <input type="text" id="asuransi" name="asuransi" class="form-control">
              </div>
              <div class="form-group">
                <label for="asuransi">Nama Peserta</label>
                <input type="text" id="asuransi" name="asuransi" class="form-control">
              </div>
            </div>
            <div class="col-6">
              <div class="form-group mb-4">
                <label for="dokter">Dokter</label>
                <select name="dokter" id="dokter" class="form-control">
                  <option value=""></option>
                  @foreach ($dokter as $item)
                    <option value="{{ $item->id }}">{{ $item->nama_dokter }}</option>
                  @endforeach
                </select>
              </div>
              <div class="form-group">
                <label for="tgl_periksa" class="mt-2">Tanggal Periksa</label>
                <input type="text" name="tgl_periksa" class="form-control">
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary">Daftar</button>
        </div>
      </div>
    </div>
  </div>
  
@endsection

@section('script')
<script>
  $(document).ready(function(){
    $('#dokter').select2({
      placeholder: "Pilih Dokter",
      allowClear: true,
      width: '100%'
    });
    $('#rekmed-status').click(function(){
      if($(this).is(':checked')){
        $('#rekmed').attr('disabled', true);
      }else{
        $('#rekmed').attr('disabled', false);
      }
    });
  });

    $('.slick-wrapper').slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 2000,
        dots:true,
      });
  </script>
  @endsection


