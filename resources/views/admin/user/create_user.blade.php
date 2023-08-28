@extends('layouts.app')
@section('title', 'Dashboard')

@section('breadcrumb')
{{ Breadcrumbs::render('dashboard_user_create') }}
@endsection

@section('content')
    <h3>Tambah User</h3>
    <hr>
    <form action="">
        <div class="row">
            <div class="col-6">
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="nama" placeholder="...">
                </div>
            </div>
            <div class="col-6">
                <div class="mb-3">
                    <label for="nama" class="form-label">NIP</label>
                    <input type="text" class="form-control" id="nama" placeholder="...">
                </div>
            </div>
            <div class="col-6">
                <div class="mb-3">
                    <label for="nama" class="form-label">Jabatan</label>
                    <input type="text" class="form-control" id="nama" placeholder="...">
                </div>
            </div>
            <div class="col-6">
                <div class="mb-3">
                    <label for="nip" class="form-label">Username</label>
                    <input type="text" class="form-control" id="nip" placeholder="...">
                </div>
            </div>
            <div class="col-6">
                <div class="mb-3">
                    <label for="spesialis" class="form-label">Email</label>
                    <input type="text" class="form-control" id="spesialis" placeholder="...">
                </div>
            </div>
            <div class="col-6">
                <div class="mb-3">
                    <label for="tlp" class="form-label">Role</label>
                    <select name="role" id="role" class="form-control">
                        <option value=""></option>
                        <option value="1">Super Admin</option>
                        <option value="2">Admin</option>
                        <option value="0">Pengguna</option>
                    </select>
                </div>
            </div>
            <div class="col-6">
                <div class="mb-3">
                    <label for="formFile" class="form-label">Password</label>
                    <input type="text" class="form-control" id="password1"  placeholder="***">
                </div>
            </div>
            <div class="col-6">
                <div class="mb-3">
                    <label for="email" class="form-label">Konfirmasi Password</label>
                    <input type="text" class="form-control" id="password2" placeholder="***">
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
            $('#role').select2({
                placeholder: "Pilih Role"
            });
        });
    </script>
@endsection