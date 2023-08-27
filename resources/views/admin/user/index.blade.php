@extends('layouts.app')
@section('title', 'Dashboard')

@section('breadcrumb')
{{ Breadcrumbs::render('dashboard_user') }}
@endsection

@section('content')
    <h3>Data User</h3>
    <hr>
    <a href="{{ route('user.create') }}" class="btn btn-primary my-2">+ Tambah User</a>
    <table id="table-dokter" class="table table-bordered">
        <thead>
            <tr>
                <th>No.</th>
                <th>Nama</th>
                <th>NIP</th>
                <th>Jabatan</th>
                <th>Role</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $key => $user)    
            <tr>
                <td>{{ $key+1 }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->nip }}</td>
                <td>{{ $user->jabatan }}</td>
                <td>{{ ($user->role == 1 ? 'Admin' : $user->role == 2) ? 'Super Admin' : 'Pengguna' }}</td>
                <td>
                    <a href="#" class="btn btn-sm btn-danger">Delete</a>
                    <a href="#" class="btn btn-sm btn-warning">Edit</a>
                    <a href="#" class="btn btn-sm btn-info">Detail</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $('#table-dokter').DataTable();
        });
    </script>
@endsection