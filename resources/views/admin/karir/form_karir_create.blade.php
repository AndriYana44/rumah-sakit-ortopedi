@extends('layouts.app')
@section('title', 'Dashboard')

@section('breadcrumb')
{{ Breadcrumbs::render('dashboard_karir_create') }}
@endsection

@section('content')
    <style>
        .ck-editor__editable_inline {
            min-height: 200px;
        }
    </style>
    <h3>Tambah Postingan</h3>
    <hr>
    <form action="{{ route('postingan.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-sm-6">
                <div class="mb-3">
                    <label for="judul" class="form-label">Judul</label>
                    <input type="text" class="form-control" name="judul" id="judul" placeholder="...">
                </div>
                <div class="mb-3">
                    <label for="nip" class="form-label">Slug</label>
                    <input type="text" class="form-control slug" disabled>
                    <input type="hidden" name="slug" class="slug">
                </div>
                <div class="mb-3">
                    <label for="nip" class="form-label">Gambar Utama</label>
                    <input type="file" class="form-control" name="gambar_postingan">
                </div>
            </div>
            <div class="col-12">
                <div class="mb-3">
                    <label for="jabatan" class="form-label">Isi Konten</label>
                    <textarea id="editor" name="konten"></textarea>
                </div>
            </div>
        </div>
        <div class="d-grid gap-2 d-md-flex justify-content-md-start mt-4">
            <button type="submit" class="btn btn-primary">Submit</button>
            <button type="button" onclick="history.back()" class="btn btn-dark">Cancel</button>
        </div>
    </form>
@endsection

@section('script')
<script>
    $(document).ready(function() {
        
    });
</script>
@endsection