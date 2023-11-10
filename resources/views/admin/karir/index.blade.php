@extends('layouts.app')
@section('title', 'Dashboard')

@section('breadcrumb')
{{ Breadcrumbs::render('dashboard_karir') }}
@endsection

@section('content')

<h3>Data Postingan Karir</h3>
<hr>
<a href="{{ route('karir.admin.create') }}" class="btn btn-primary my-2">+ Tambah Postingan Karir</a>
<table class="table table-bordered __datatables" style="width:100%">
    <thead>
        <tr>
            <th>Kategori</th>
            <th>Pendidikan</th>
            <th>Pengalaman</th>
            <th>Keriteria</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody> 
    </tbody>
</table>

@endsection

@section('script')
<script>
    $(document).ready(function () {
        
    });
</script>
@endsection