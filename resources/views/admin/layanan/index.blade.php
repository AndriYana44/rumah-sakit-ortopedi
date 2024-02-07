@extends('layouts.app')
@section('title', 'Dashboard')

@section('breadcrumb')
{{ Breadcrumbs::render('dashboard_postingan') }}
@endsection

@section('content')
    <div class="loader-wrapper">
        <div class="loader-window"></div>
    </div>
    <h3>Layanan Unggulan</h3>
    <hr>
    <div class="d-flex justify-content-between">
        <a id="addKategori" href="{{ route('layananCreate') }}" class="btn btn-primary my-2">+ Tambah Layanan</a>
        
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $('.loader-button').hide();
            $('.loader-wrapper').hide();
        });
    </script>
@endsection