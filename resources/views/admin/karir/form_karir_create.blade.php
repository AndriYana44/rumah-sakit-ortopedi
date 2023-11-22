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
    <form action="{{ route('karir.admin.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-sm-6">
                <div class="mb-4 form-group d-flex flex-column">
                    <label for="judul" class="form-label">Kategori</label>
                    <select name="kategori" id="kategori">
                        <option value=""></option>
                        @foreach ($kategori as $k)
                            <option value="{{ $k->id }}">{{ $k->kategori }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="pengalaman" class="form-label">Min. Lama Pengalaman (tahun)</label>
                    <input type="number" class="form-control" id="pengalaman" name="pengalaman">
                </div>
            </div>
            <div class="col-sm-6">
                <div class="mb-3">
                    <label for="pendidikan" class="form-label">Min. Pendidikan</label>
                    <input type="text" class="form-control" id="pendidikan" name="pendidikan">
                </div>
                <div class="mb-3">
                    <label for="bidang_pengalaman" class="form-label">Bidang Pengalaman</label>
                    <input type="text" class="form-control" id="bidang_pengalaman" name="bidang_pengalaman">
                </div>
            </div>
            <div class="col-sm-12">
                <div class="mb-3">
                    <label for="kriteria" class="form-label">Kriteria</label>
                    <textarea type="text" class="form-control" id="kriteria" name="kriteria"></textarea>
                </div>
                <div class="mb-3">
                    <label for="jobdesk" class="form-label">Jobdesk</label>
                    <textarea id="jobdesk" class="form-control" name="jobdesk"></textarea>
                </div>
                <div class="mb-3">
                    <label for="informasi" class="form-label">Informasi Tambahan</label>
                    <textarea id="informasi" class="form-control" name="informasi"></textarea>
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
        $('#kategori').select2({
            placeholder: "Pilih Kategori"
        });
    });
</script>
@endsection