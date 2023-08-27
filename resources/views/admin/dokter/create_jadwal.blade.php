@extends('layouts.app')
@section('title', 'Dashboard')

@section('breadcrumb')
{{ Breadcrumbs::render('dashboard_dokter_jadwal_create') }}
@endsection

@section('content')
    <h3>Tambah Dokter Aktif</h3>
    <hr>
    <form action="">
        <div class="row">
            <div class="col-6">
                <div class="mb-3">
                    <div class="form-group">
                        <label for="nama" class="form-label">Dokter</label>
                        <select name="dokter" id="dokter" class="form-control">
                            <option value=""></option>
                            <option value="1">Andri Yana (Spesialis Tulang)</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <div class="mb-3">
                    <div class="form-group">
                        <label for="hari" >Hari Kerja</label>
                        <select id="hari" class="form-control" name="hari" multiple="multiple">
                            <option value="1" data-code="AO">Senin</option>
                            <option value="2" data-code="AR">Selasa</option>
                            <option value="3" data-code="AU">Rabu</option>
                            <option value="4" data-code="BI">Kamis</option>
                            <option value="5" data-code="BJ">Jumat</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <div class="mb-3">
                    <label for="spesialis" class="form-label">Jam Mulai</label>
                    <select name="jam_mulai" id="jam_mulai" class="form-control">
                        <option value=""></option>
                        @for ($i = 0; $i < 24; $i++)
                            <option value="{{ $i < 10 ? '0'.$i : $i }}">{{ $i < 10 ? '0'.$i : $i }}.00</option>
                        @endfor
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <div class="mb-3">
                    <label for="spesialis" class="form-label">Jam Selesai</label>
                    <select name="jam_selesai" id="jam_selesai" class="form-control">
                        <option value=""></option>
                        @for ($i = 0; $i < 24; $i++)
                            <option value="{{ $i < 10 ? '0'.$i : $i }}">{{ $i < 10 ? '0'.$i : $i }}.00</option>
                        @endfor
                    </select>
                </div>
            </div>
        </div>
        <div class="d-grid gap-2 d-md-flex justify-content-md-start mt-4">
            <button type="submit" class="btn btn-primary">Submit</button>
            <button type="button" class="btn btn-dark">Cancel</button>
        </div>
    </form>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $('#dokter').select2({
                placeholder: "Pilih Dokter"
            });
            $('#jam_mulai').select2({
                placeholder: "Pilih Jam Mulai"
            });
            $('#jam_selesai').select2({
                placeholder: "Pilih Jam Selesai"
            });
            $('#hari').select2({
                placeholder: "Pilih Hari"
            });
        });
    </script>
@endsection