@extends('compro.layouts.app')
@section('content')
  <div class="page-banner overlay-dark bg-image" style="background-image: url({{ asset('') }}assets-compro/assets/img/banner/banner-1.jpg);">
    <div class="banner-section">
      <div class="container text-center wow fadeInUp">
        <nav aria-label="Breadcrumb">
          <ol class="breadcrumb breadcrumb-dark bg-transparent justify-content-center py-0 mb-2">
            <li class="breadcrumb-item"><a href="index.html" class="text-success">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Dokter</li>
          </ol>
        </nav>
        <h1 class="font-weight-normal">Dokter Kami</h1>
        <button type="button" class="btn btn-primary btn-jadwal mt-5">Jadwal praktek hari ini</button>
      </div> <!-- .container -->
    </div> <!-- .banner-section -->
  </div> <!-- .page-banner -->

  <div class="page-section bg-light">
    <div class="container">
      <div class="row justify-content-center">

        <div class="col-lg-12">
          <div class="row">
            {{-- @dd($data->first()) --}}
            <div class="col-sm-3">
              <div class="card my-3 shadow">
                <div class="card-header">
                    <span>Cari Dokter</span>
                </div>
                <div class="card-body">
                  <form id="form-karir-filter">
                      <div class="form-group">
                        <input type="text" class="form-control" placeholder="Cari Dokter" name="dokter">
                      </div>
                      @csrf
                      <div class="form-group">
                          <label for="kategori">Pilih Hari</label>
                          <select name="kategori" id="kategori_list" class="form-control">
                              <option value="">Pilih Hari</option>
                              
                          </select>
                      </div>
                      <div class="form-group d-flex flex-column">
                          <span class="mb-2">Pilih Spesialis</span>
                          <select name="spesialis" id="spesialis">
                            <option value="">Pilih Spesialis</option>
                          </select>
                      </div>
                      <div class="form-group d-flex flex-column">
                        <span class="mb-2">Jenjang Pendidikan</span>
                        <label for="smk"><input name="jk[]" value="SMK" class="mr-2" id="smk" type="checkbox">SMK/SMA</label>
                        <label for="d1"><input name="jk[]" value="L" class="mr-2" id="L" type="checkbox">Laki-laki</label>
                        <label for="d3"><input name="jk[]" value="P" class="mr-2" id="P" type="checkbox">Perempuan</label>
                      </div>
                      <button type="submit" class="btn btn-primary btn-sm mb-2"><i class="fa fa-search"></i> Cari</button>
                      <a href="{{ route('doctors') }}" class="btn btn-info btn-sm"><i class="fa fa-refresh" aria-hidden="true"></i> Reset Filter</a>
                  </form>
                </div>
              </div>
            </div>
            <div class="col-sm-9">
              <div class="row">
                @foreach($data as $key => $dt)
                <div class="col-sm-4 py-3 wow zoomIn">
                  <div class="card-doctor">
                    <div class="header">
                      @if ($dt->foto == null || file_exists('files/foto-dokter/'.$dt->foto) == false)
                        <img class="rounded" src="{{ asset('') }}files/foto-dokter/default.jpg" alt="pict" width="30">
                      @else
                        <img class="rounded" src="{{ asset('') }}files/foto-dokter/{{ $dt->foto }}" alt="pict" width="30">
                      @endif
                      <div class="meta d-flex align-items-center justify-content-center" style="width: 100%;">
                        <a href="#"><span class="mai-logo-whatsapp"></span></a>
                        <span class="ml-2 text-white" style="text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);">
                          <strong>Buat Janji</strong>
                        </span>
                        {{-- <a href="#"><span class="mai-logo-whatsapp"></span></a> --}}
                      </div>
                    </div>
                    <div class="body">
                      <p class="text-xl mb-0">{{ $dt->nama_dokter }}</p>
                      <span class="text-sm text-grey">{{ $dt->spesialis }}</span>
                    </div>
                  </div>
                </div>
                @endforeach
              </div>
            </div>
            <div style="width: 100%; display:flex; justify-content:center; align-items:center;">
              {{-- {{ $data->links('pagination::bootstrap-4') }} --}}
            </div>
          </div>
        </div>
      </div>
    </div> <!-- .container -->
  </div> <!-- .page-section -->
@endsection

@section('script')
<script>
  $(document).ready(function() {
    const getDayName = function() {
      var today = new Date();
      var dd = String(today.getDate()).padStart(2, '0');
      var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
      var yyyy = today.getFullYear();

      today = mm + '/' + dd + '/' + yyyy;

      var days = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
      var d = new Date(today);
      var dayName = days[d.getDay()];

      return dayName;
    }

    $('.btn-jadwal').click(function(e) {
      var dayName = getDayName();
      var url = "{{ url('') }}/dokter/jadwal/hari-ini/" + dayName;
      window.location.href = url;
    });
  });
</script>
@endsection