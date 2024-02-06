@extends('compro.layouts.app')
@section('content')
    <div class="page-banner overlay-dark bg-image" style="background-image: url({{ asset('') }}assets-compro/assets/img/banner/banner-1.jpg);">
        <div class="banner-section">
            <div class="container text-center wow fadeInUp">
                <nav aria-label="Breadcrumb">
                    <ol class="breadcrumb breadcrumb-dark bg-transparent justify-content-center py-0 mb-2">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-success">Beranda</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('doctorsProfile') }}" class="text-success">Dokter</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Profile</li>
                    </ol>
                </nav>
                <h1 class="font-weight-normal">Profile Dokter</h1>
            </div> <!-- .container -->
        </div> <!-- .banner-section -->
    </div> <!-- .page-banner -->
    
    <div class="content">
        <style>
            .content {
                position: relative;
                min-height: 400px;
            }
            .profile-dokter {
                height: 400px;
                width: 70%;
                box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
                position: absolute;
                left: 0;
                right: 0;
                top: -120px;
                z-index: 999;
                background-color: #FFF;
                margin: 50px auto;
                display: flex;
            }
            .profile-dokter .image-wrapper {
                margin: 20px;
                height: 350px;
                width: 250px;
                box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
                display: flex;
                flex-direction: column;
                align-items: center;
                position: relative;
            }
            .image-wrapper img {
                margin-top: 20px;
                width: 85%;
            }
            .data-diri-wrapper {
                display: flex;
                flex-direction: column;
                margin-top: 10px;
                width: 85%;
                font-size: 14px; 
            }
            .data-diri-wrapper span:first-child {
                color: #333;
            }
            .data-diri-wrapper span {
                margin-top: 10px;
                color: #777;
            }
            .data-diri-wrapper span i {
                color: #46579f;
            }
            .informasi-dokter {
                margin: 20px;
                color: #555;
            }
            .informasi-dokter i {
                font-size: 24px;
                color: #46579f;
            }
            .informasi-dokter span {
                display: flex;
                flex-direction: column;
                font-size: 14px;
            }
            @media only screen and (max-width: 768px) {
                .profile-dokter {
                    flex-direction: column;
                    width: 80%;
                    border-radius: 8px;                
                    overflow: scroll;
                }
            }
        </style>

        @foreach ($data as $item)
        <div class="profile-dokter">
            <div class="image-wrapper">
                @if ($item->foto == null)
                    <img style="width: 100px; height: 110px;" src="{{ asset('files\foto-dokter\default.jpg') }}" alt="dokter">  
                @else
                    <img style="width: 100px; height: 110px;" src="{{ asset('') }}files/foto-dokter/{{ $item->foto }}" alt="doktor">
                @endif
                <div class="data-diri-wrapper">
                    <span><strong>{{ $item->nama_dokter }}</strong></span>
                    <span><i class="fa fa-stethoscope" aria-hidden="true"></i> {{ $item->spesialis }}</span>
                    <span><i class="fa fa-location-arrow" aria-hidden="true"></i> RS. Orthopedi Siaga Raya</span>
                </div>
            </div>

            <div class="informasi-dokter">
                <span class="graduation">
                    <i class="fa fa-graduation-cap" aria-hidden="true"></i>
                    <span class="mb-2"><strong>Riwayat Pendidikan</strong></span>
                    @foreach ($item->dokterDetail as $dd)  
                        <span>{{ strtoupper($dd->pendidikan) }}: {{ $dd->jurusan }} {{ $dd->nama_kampus }} {{ $dd->tahun_lulus }}</span>
                    @endforeach
                </span>
                <span class="sertifikat mt-5">
                    <i class="fa fa-certificate" aria-hidden="true"></i>
                    <span class="mb-2"><strong>Seminar / Course</strong></span>
                    <span>Tumbuh Kembang</span>
                </span>
                <span class="award mt-5">
                    <i class="fa fa-trophy" aria-hidden="true"></i>
                    <span class="mb-2"><strong>Prestasi & Penghargaan</strong></span>
                    <span>-</span>
                </span>
            </div>
        </div>
        @endforeach
    </div>
@endsection