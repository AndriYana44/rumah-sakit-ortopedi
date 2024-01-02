@extends('compro.layouts.app')
@section('content') 
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.css">
 <style>

  
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
          @auth
          <button class="btn btn-primary" data-toggle="modal" data-target="#berobat">Daftar Berobat</button>
          @else
          <a class="btn btn-primary" href="{{ route('login') }}">Daftar Berobat</a>
          @endauth
      </div>
    </div>
  </div>

  <div class="content" id="content">

    <div class="search-wrapper">
      <div class="card search-card">
        <div class="card-body">
          <h3 class="text-primary">Temukan Dokter yang tepat</h3>
          <span class="mb-4" style="color: #999;">Cari dan temukan dokter yang tepat untuk kebutuhan medis Anda, dan buat janji dengan langkah mudah</span>
          <form action="" class="mt-4">
            <div class="row">
              <div class="col-sm-4">
                <div class="form-group">
                  <input type="text" name="dokter" class="form-control" placeholder="Nama Dokter">
                </div>
              </div>
              <div class="col-sm-4">
                <div class="form-group">
                  <select name="spesialis" id="spesialis" class="form-control">
                    <option value="Jantung" style="padding: 10px;">Jantung</option>
                    <option value="Gigi">Gigi</option>
                    <option value="Umum">Umum</option>
                  </select>
                </div>
              </div>
              <div class="col-sm-4 d-grid gap-2">
                <button type="button" class="btn btn-primary btn-block">Cari <i class="fa fa-search"></i></button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>

    <div class="berita-wrapper">
      <span class="text-primary"><strong>Berita & Acara</strong></span>
      <h3>Kabar Terbaru Orthopedi</h3>
      <div class="container">
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
            <a href="blog.html" class="btn btn-primary">
              Lihat Berita Lainya &emsp;
              <i class="fa fa-chevron-circle-right" aria-hidden="true"></i>
            </a>
          </div>
  
        </div>
      </div>
   </div>

  </div>
  
  <!-- .page-section -->
  <div class="page-section bg-light mt-4 dokter-home-wrapper">
    <div class="container">
      <span class="text-center text-primary"><strong>Dokter Kami</strong></span>
      <h3 class="text-center mb-5 wow fadeInUp">Temukan Dokter Berpengalaman di Orthopedi</h3>

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
  
  <section class="mx-auto mb-4 pt-4 pb-4 mt-4 fitur-unggulan-home">
    <div class="container">
      <div class="mt-4 fitur-unggulan-wrapper">
        <span class="text-center text-primary"><strong>Fitur Unggulan</strong></span>
        <h3 class="text-center mb-5 wow fadeInUp">Layanan Unggulan Rumah Sakit Orthopedi</h3>
      </div>
      <div class="slick-wrapper">
       
        <div>
          <div class="col-sm card-fitur-unggulan">
            <div class="card py-9">
              <div class="card-body d-flex flex-column">
                <h1 class="card-title">01</h1>
                <p class="card-text"><strong>Excelent Center</strong></p>
                <span style="color: #999;">Layanan Orthopedi & Traumatologi Terbaik dari RS Orthopedi Siaga Raya</span>
                <a href="#" class="text-info mt-3"><strong>Lihat Selengkapnya</strong></a>
              </div>
            </div>
          </div>
        </div>

        <div>
          <div class="col-sm card-fitur-unggulan">
            <div class="card">
              <div class="card-body d-flex flex-column">
                <h1 class="card-title">02</h1>
                <p class="card-text"><strong>Fisioterapi</strong></p>
                <span style="color: #999;">Layanan Fisioterapi Terbaik  dari RS Orthopedi Siaga Raya</span>
                <a href="#" class="text-info mt-3"><strong>Lihat Selengkapnya</strong></a>
              </div>
            </div>
          </div>
        </div>

        <div>
          <div class="col-sm card-fitur-unggulan">
            <div class="card">
              <div class="card-body d-flex flex-column">
                <h1 class="card-title">03</h1>
                <p class="card-text"><strong>MRI Open Bore</strong></p>
                <span style="color: #999;">Layanan MRI Open Bore Terbaik  dari RS Orthopedi Siaga Raya</span>
                <a href="#" class="text-info mt-3"><strong>Lihat Selengkapnya</strong></a>
              </div>
            </div>
          </div>
        </div>

        <div>
          <div class="col-sm card-fitur-unggulan">
            <div class="card">
              <div class="card-body d-flex flex-column">
                <h1 class="card-title">04</h1>
                <p class="card-text"><strong>Orthotik & Prostetik</strong></p>
                <span style="color: #999;">Layanan Orthotik & Prostetik Terbaik  dari RS Orthopedi Siaga Raya</span>
                <a href="#" class="text-info mt-3"><strong>Lihat Selengkapnya</strong></a>
              </div>
            </div>
          </div>
        </div>

         <div>
          <div class="col-sm card-fitur-unggulan">
            <div class="card">
              <div class="card-body d-flex flex-column">
                <h1 class="card-title">05</h1>
                <p class="card-text"><strong>Spine Endoscopy</strong></p>
                <span style="color: #999;">Layanan Spine Endoscopy Terbaik  dari RS Orthopedi Siaga Raya</span>
                <a href="#" class="text-info mt-3"><strong>Lihat Selengkapnya</strong></a>
              </div>
            </div>
          </div>
        </div>
        
         <div>
          <div class="col-sm card-fitur-unggulan">
            <div class="card">
              <div class="card-body d-flex flex-column">
                <h1 class="card-title">06</h1>
                <p class="card-text"><strong>Arthroscopy</strong></p>
                <span style="color: #999;">Layanan Arthroscopy Terbaik  dari RS Orthopedi Siaga Raya</span>
                <a href="#" class="text-info mt-3"><strong>Lihat Selengkapnya</strong></a>
              </div>
            </div>
          </div>
        </div>

         <div>
          <div class="col-sm card-fitur-unggulan">
            <div class="card">
              <div class="card-body d-flex flex-column">
                <h1 class="card-title">06</h1>
                <p class="card-text"><strong>Arthroplasty</strong></p>
                <span style="color: #999;">Layanan Arthroplasty Terbaik  dari RS Orthopedi Siaga Raya</span>
                <a href="#" class="text-info mt-3"><strong>Lihat Selengkapnya</strong></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="fun-facts-area ptb-100 sdm-home" style="position: relative; background-color: #303b38; margin-bottom: 50px;">
    <div class="container py-4">
      <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-6">
          <div class="single-fun-facts text-white text-center">
            <i class="fa fa-user-md" style="font-size: 36px;" aria-hidden="true"></i>
            <div class="dokter-ahli">
              <h3>3,365+</h3>
              <small class="text-white">Dokter Ahli</small>
            </div>
          </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-6">
          <div class="single-fun-facts text-white text-center">
            <i class="fa fa-user" style="font-size: 36px;" aria-hidden="true"></i>
            <h3>3,365,899+</h3>
            <small class="text-white">Pasien</small>
          </div>
        </div>
      </div>
    </div>
  </section>

  {{-- {{ dd($dokter) }} --}}
  <!-- Modal -->
  <div class="modal fade" id="berobat" tabindex="-1" role="dialog" aria-labelledby="berobatLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <form action="" id="daftarBerobat">
          <div class="modal-header">
            <h5 class="modal-title" id="berobatLabel">Form Pendaftaran Berobat</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col-12">
                <div class="form-group">
                  <label for="pembayaran" class="mt-2">Metode Pembayaran</label>
                  <select name="pembayaran" id="pembayaran" class="select2">
                    <option value=""></option>
                    <option value="umum / cash">Umum/Cash</option>
                    <option value="jaminan perusahaan">Jaminan Perusahaan</option>
                    <option value="asuransi">Asuransi</option>
                  </select>
                </div>
                <div class="form-group mb-2">
                  <label for="dokter">Dokter</label>
                  <select name="dokter" id="dokter" class="form-control select2">
                    <option value=""></option>
                    @foreach ($dokter as $item)
                      @if($item->hari->first() != null)
                        <option value="{{ $item->id }}">{{ $item->nama_dokter }}</option>
                      @endif
                    @endforeach
                  </select>
                </div>
                <div class="jadwal_praktek"></div>
                <div class="form-group mt-3">
                  <label for="tgl_periksa" class="mt-2">Tanggal Periksa</label>
                  <input type="text" id="tgl_periksa" name="tgl_periksa" class="form-control" disabled>
                  <div class="validate_hari"></div>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary daftar">Daftar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  
@endsection

@section('script')
<script>
  var validator = new Validator({
    form: document.getElementById('daftarBerobat'),
    rules: {
      email: {
        validate: (val) => val ? '' : 'Required!',
      },
      password1: {
        // validate: (val) => val < 5 || val > 15 ? '字数大于5，小于15' : ''
      },
      password2: {
        validate: (val) => !val ? 'Required!' : '',
      },
    }
  });

  validator.form.onsubmit = (evn) => {
    const values = validator.getValues();
    const form = document.getElementById('daftarBerobat')
    const elements = form.elements;

    const existingSmallElements = document.querySelectorAll('small');
    existingSmallElements.forEach(element => {
      element.remove();
    });

    const emptyElements = [];
    for (let i = 0; i < elements.length; i++) {
      const element = elements[i];
      const elName = elements[i].dataset.name;
      var smallElement = document.createElement('small');
      // Periksa jika elemen memiliki nilai kosong
      if (element.value.trim() === '') {
        evn.preventDefault();
        // Menambahkan teks ke dalam elemen <small>
        var smallText = document.createTextNode(`${elName} tidak boleh kosong!`);
        smallElement.appendChild(smallText);
        smallElement.style.color = 'red';
        smallElement.style.fontSize = '11px';
        if (element.tagName === 'INPUT' && !element.hasAttribute('disabled')) {
          element.after(smallElement);
          emptyElements.push(element);
        } else if(element.tagName === 'SELECT') {
          element.nextElementSibling.after(smallElement);
          emptyElements.push(element);
        }
      }
    }
    
    if(emptyElements.length <= 0) {
      $('#berobat').modal('hide');
      var data = {
        _token: '{{ csrf_token() }}',
        pembayaran: $('#pembayaran').val(),
        dokter: $('#dokter').val(),
        tgl_periksa: $('#tgl_periksa').val()
      }
  
      $.ajax({
        url: `{{ route('daftarBerobat') }}`,
        type: 'POST',
        data: data,
        success: function(res) {
          if(res.success == true) {
            Swal.fire({
              icon: 'success',
              title: 'Berhasil',
              text: 'Terimakasih, data anda akan segera kami proses.'
            });
          }
        }
      })
    }
  }

  $(document).ready(function(){
    function getDay(dateString) {
      let dataObject = new Date(dateString);
      let daysOfWeek = ['minggu', 'senin', 'selasa', 'rabu', 'kamis', 'jumat', 'sabtu'];
      let dayOfWeek = daysOfWeek[dataObject.getDay()];

      return dayOfWeek;
    }

    $('#tgl_periksa').datepicker({
      dateFormat: 'yy-mm-dd',
      changeYear: true,
      changeMonth: true,
      yearRange: '-0:+1'
    })

    $('.select2').select2({
      placeholder: "Pilih Salahsatu",
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

    $('#dokter').on('change', function() {
      $.ajax({
        type: 'POST',
        url: `{{ route('api.dokter.jadwal') }}`,
        data: { 
          _token: '{{ csrf_token() }}',
          dokter_id: $(this).val()
        },
        success: function (res) {  
          let days = [];
          let day = null;
          $('.validate_hari').html('');
          $('#tgl_periksa').removeAttr('disabled');
          if($('#tgl_periksa').val() != '') {
            day = getDay($('#tgl_periksa').val());
          }

          $('.jadwal_praktek').html('');
          $.each(res.hari, function(i,v) {
            days.push(v.hari.toLowerCase());
          })
          $('.jadwal_praktek').append(
            `<span style="font-size: 12px;">Dokter bersedia pada hari:</span> <br>
            <span>${days}</span>`
          )
          
          if(day != null) {
            let dayExist = days.includes(day);
            if(!dayExist) {
              $('.validate_hari').append(`<span style="color: red; font-size: 12px;">Dokter tidak ada jadwal hari ${day}</span>`);
              $('.daftar').attr('disabled', 'disabled');
              $('.daftar').css('cursor', 'not-allowed');
            }else{
              $('.daftar').removeAttr('disabled');
              $('.daftar').css('cursor', 'pointer');
            }
          }
        }
      })
    });

    $('#tgl_periksa').change(function() {
      let dayOfWeek = getDay($(this).val());
      $.ajax({
        type: 'POST',
        url: `{{ route('api.dokter.jadwal') }}`,
        data: { 
          _token: '{{ csrf_token() }}',
          dokter_id: $('#dokter').val()
        },
        success: function (res) {  
          let hari = [];
          $('.validate_hari').html('');
          $.each(res.hari, function(i,v) {
            hari.push(v.hari.toLowerCase());
          });

          let dayExist = hari.includes(dayOfWeek)
          if(!dayExist) {
            $('.validate_hari').append(`<small style="color: red">Dokter tidak ada jadwal hari ${dayOfWeek}</small>`);
            $('.daftar').attr('disabled', 'disabled');
            $('.daftar').css('cursor', 'not-allowed');
          }else{
            $('.daftar').removeAttr('disabled');
            $('.daftar').css('cursor', 'pointer');
          }
        }
      })
    });

    // $('.daftar').click(function() {
    //   $('#berobat').modal('hide');
    //   var data = {
    //     _token: '{{ csrf_token() }}',
    //     pembayaran: $('#pembayaran').val(),
    //     dokter: $('#dokter').val(),
    //     tgl_periksa: $('#tgl_periksa').val()
    //   }

    //   $.ajax({
    //     url: `{{ route('daftarBerobat') }}`,
    //     type: 'POST',
    //     data: data,
    //     success: function(res) {
    //       if(res.success == true) {
    //         Swal.fire({
    //           icon: 'success',
    //           title: 'Berhasil',
    //           text: 'Terimakasih, data anda akan segera kami proses.'
    //         });
    //       }
    //     }
    //   })
    // });
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