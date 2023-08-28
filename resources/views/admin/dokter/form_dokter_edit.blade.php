@extends('layouts.app')
@section('title', 'Dashboard')

@section('breadcrumb')
{{ Breadcrumbs::render('dashboard_dokter_create') }}
@endsection

@section('content')
    <h3>Tambah Dokter Aktif</h3>
    <hr>
    <form action="{{ route('dokter.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <input type="hidden" name="id" value="{{ $data->id }}">
        <div class="row">
            <div class="col-6">
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control" name="nama" value="{{ $data->nama_dokter }}">
                </div>
            </div>
            <div class="col-6">
                <div class="mb-3">
                    <label for="nip" class="form-label">NIP</label>
                    <input type="text" class="form-control" name="nip" value="{{ $data->nip }}">
                </div>
            </div>
            <div class="col-6">
                <div class="mb-3">
                    <label for="spesialis" class="form-label">Spesialis</label>
                    <input type="text" class="form-control" name="spesialis" value="{{ $data->spesialis }}">
                </div>
            </div>
            <div class="col-6">
                <div class="mb-3">
                    <label for="tlp" class="form-label">No. Telepon</label>
                    <input type="text" class="form-control" name="tlp" value="{{ $data->no_telp }}">
                </div>
            </div>
            <div class="col-6">
                <label for="foto" class="form-label">Foto</label>
                <input class="form-control" type="file" name="foto">
            </div>
            <div class="col-6">
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" class="form-control" name="email" value="{{ $data->email }}">
                </div>
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <textarea class="form-control" name="alamat">{{ $data->alamat }}</textarea>
            </div>
        </div>
        <div class="d-grid gap-2 d-md-flex justify-content-md-start mt-4">
            <button type="submit" class="btn btn-primary">Submit</button>
            <button type="button" onclick="history.back()" class="btn btn-dark">Cancel</button>
        </div>
    </form>
@endsection