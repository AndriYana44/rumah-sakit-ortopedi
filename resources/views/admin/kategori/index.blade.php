@extends('layouts.app')
@section('title', 'Dashboard')

@section('breadcrumb')
{{ Breadcrumbs::render('dashboard_postingan') }}
@endsection

@section('content')
    <h3>Data Kategori</h3>
    <hr>
    <div class="d-flex justify-content-between">
        <a id="addKategori" class="btn btn-primary my-2" data-bs-toggle="modal" data-bs-target="#createKategori">+ Tambah Kategori</a>
        <button type="button" class="btn btn-primary btn-sm my-2" data-bs-toggle="modal" data-bs-target="#filterKategoriModal">
            <i class="fa fa-filter"></i> Filter
        </button>
    </div>
    <table class="table table-bordered __datatables" id="kategori-table" style="width:100%">
        <thead>
            <tr>
                <th>Terkait</th>
                <th>Nama Kategori</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody> 
            
        </tbody>
    </table>

    <!-- Modal Add -->
    <div class="modal fade" id="createKategori" tabindex="-1" aria-labelledby="createKategoriLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createKategoriLabel">Form Tambah Kategori</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="form-add-kategori">
                <div class="modal-body">
                    <div class="form-group mb-3">
                        <label for="berita" class="mx-3">
                            <input type="radio" value="berita" id="berita" name="terkait">
                            Berita
                        </label>
                        <label for="karir">
                            <input type="radio" value="karir" id="karir" name="terkait">
                            Karir
                        </label>
                    </div>
                    <div class="form-group mb-2">
                        <input type="text" class="form-control" name="kategori" placeholder="Nama Kategori.." required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
        </div>
    </div>

    <!-- Modal Filter -->
    <div class="modal fade" id="filterKategoriModal" tabindex="-1" aria-labelledby="filterKategoriModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="filterKategoriModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="form-filter-kategori">
                    <div class="modal-body">
                        <div class="form-group mb-3">
                            <label for="filterBerita" class="mx-3">
                                <input type="radio" value="berita" id="filterBerita" name="terkait">
                                Berita
                            </label>
                            <label for="filterKarir">
                                <input type="radio" value="karir" id="filterKarir" name="terkait">
                                Karir
                            </label>
                        </div>
                        <div class="form-group mb-2">
                            <input type="text" class="form-control" id="kategori" name="kategori" placeholder="Nama Kategori..">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Filter</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('script')
<script>
    $(document).ready(function() {

        // filter kategori
        $('#form-filter-kategori').submit(function (e) { 
            e.preventDefault();
            // get value terkait
            var data = $(this).serialize();
            data += "&_token={{ csrf_token() }}";
            $('#kategori-table').DataTable().ajax.reload(null, false).draw({
                data: data,
                method: 'POST'
            });

            $('#filterKategoriModal').modal('hide');
        });

        const form = '#form-filter-kategori';
        //set datatables
        $('#kategori-table').DataTable({
            processing: true,
            serverSide: true,
            searching: false,
            ajax: {
                data: function (d) {  
                    d.kategori = $(form + " #kategori").val();
                    d.terkait = $(form + " input[name=terkait]:checked").val();
                    d._token = "{{ csrf_token() }}";  
                },
                url: "{{ route('kategori.getAllData') }}",
                type: 'POST'
            },
            columns: [
                {
                    data: 'terkait', 
                    name: 'terkait',
                    width: '30%',
                },
                {
                    data: 'kategori', 
                    name: 'kategori',
                    width: '50%',
                },
                {
                    data: 'action', 
                    name: 'action',
                    width: '20%',
                },
            ],
            columnDefs: [{
                    "sorting": true,
                    "orderable": true,
                    "type": "html",
                    "targets": 0,
                    // "data": id,
                    "render": function(data, type, row) {
                        return row.terkait;
                    }
                },
                {
                    "sorting": true,
                    "orderable": true,
                    "type": "html",
                    "targets": 1,
                    // "data": id,
                    "render": function(data, type, row) {
                        return row.kategori;
                    }
                },
                {
                    "sorting": false,
                    "orderable": false,
                    "type": "html",
                    "targets": 2,
                    // "data": id,
                    "render": function(data, type, row) {
                        return `
                            <button class="btn btn-sm btn-danger" data-id="${row.id}">Delete</button>
                            <button class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#editKategori" data-id="${row.id}" data-terkait="${row.terkait}" data-kategori="${row.nama_kategori}">Edit</button>
                        `;
                    }
                },
            ],
        });

        $('#form-add-kategori').submit(function (e) { 
            e.preventDefault();
            
            var data = $(this).serialize();
            // csrf token
            data += "&_token={{ csrf_token() }}";
            console.log(data);
            $.ajax({
                type: "post",
                url: "{{ route('kategori.store') }}",
                data: data,
                dataType: "json",
                success: function (response) {
                    if(response.success) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil',
                            text: response.message,
                        });
                        $('#createKategori').modal('hide');
                        $('#form-add-kategori').trigger('reset');
                        $('#kategori-table').DataTable().ajax.reload();
                    }
                }
            });
        });
    });
</script>
@endsection