@extends('layouts.app')
@section('title', 'Dashboard')

@section('breadcrumb')
{{ Breadcrumbs::render('dashboard_dokter') }}
@endsection

@section('content')
    <h3>Dokter Aktif</h3>
    <hr>
    <a href="{{ route('dokter.create') }}" class="btn btn-primary my-2">+ Tambah Dokter</a>
    <table id="table-dokter" class="table table-bordered">
        <thead>
            <tr>
                <th>No.</th>
                <th>Nama</th>
                <th>NIP</th>
                <th>Spesialis</th>
                <th>No.Tlp</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>Andri Yana</td>
                <td>065116164</td>
                <td>Tulang</td>
                <td>0895612206018</td>
                <td>
                    <a href="#" class="btn btn-sm btn-danger">Delete</a>
                    <a href="#" class="btn btn-sm btn-warning">Edit</a>
                    <a href="#" class="btn btn-sm btn-info">Detail</a>
                </td>
            </tr>
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