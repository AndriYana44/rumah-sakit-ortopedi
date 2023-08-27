@extends('layouts.app')
@section('title', 'Dashboard')

@section('breadcrumb')
{{ Breadcrumbs::render('dashboard_dokter_jadwal') }}
@endsection

@section('content')
    <h3>Jadwal Dokter</h3>
    <hr>
    <a href="{{ route('dokter.jadwal.create') }}" class="btn btn-primary my-2">+ Tambah Jadwal</a>
    <table id="table-jadwal-dokter" class="table table-bordered">
        <thead>
            <tr>
                <th>No.</th>
                <th>Nama</th>
                <th>Hari Kerja</th>
                <th>Jam Mulai</th>
                <th>Jam Selesai</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>Andri Yana</td>
                <td>Rabu - jumat</td>
                <td>10.00</td>
                <td>16.00</td>
                <td>
                    <a href="#" class="btn btn-sm btn-danger">Delete</a>
                    <a href="#" class="btn btn-sm btn-warning">Edit</a>
                </td>
            </tr>
        </tbody>
    </table>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $('#table-jadwal-dokter').DataTable();
        });
    </script>
@endsection