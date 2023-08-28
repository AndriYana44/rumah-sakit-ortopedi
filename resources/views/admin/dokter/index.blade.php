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
                <th>Foto</th>
                <th>Nama</th>
                <th>NIP</th>
                <th>Spesialis</th>
                <th>No.Tlp</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $key => $item)   
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>
                        @if ($item->foto == null)
                            <img class="rounded" src="{{ asset('') }}files/foto-dokter/default.jpg" alt="pict" width="50">
                        @else
                            <img class="rounded" src="{{ asset('') }}files/foto-dokter/{{ $item->foto }}" alt="pict" width="50">
                        @endif
                    </td>
                    <td>{{ $item->nama_dokter }}</td>
                    <td>{{ $item->nip }}</td>
                    <td>{{ $item->spesialis }}</td>
                    <td>{{ $item->no_telp }}</td>
                    <td>
                        <form action="{{ route('dokter.delete', ['id' => $item->id]) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm dokter-delete">Delete</button>
                        </form>
                        <a href="{{ route('dokter.edit', ['id' => $item->id]) }}" class="btn btn-sm btn-warning">Edit</a>
                        <a href="#" class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#detailDokter{{ $item->id }}">Detail</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Modal -->
    @foreach ($data as $item)
    <div class="modal fade" id="detailDokter{{ $item->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="detailDokterLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="detailDokterLabel">Detail Dokter</h5>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-4">
                                <div class="d-flex justify-content-center align-center flex-column">
                                    @if ($item->foto == null)
                                        <img class="mt-3" src="{{ asset('') }}files/foto-dokter/default.jpg" alt="" width="130">
                                    @else
                                        <img class="mt-3" src="{{ asset('') }}files/foto-dokter/{{ $item->foto }}" alt="" width="130">
                                    @endif
                                    <strong class="text-center mt-2">{{ strtoupper($item->nama_dokter) }}</strong>
                                </div>
                            </div>
                            <div class="col-8">
                                <table class="table">
                                    <tr>
                                        <td>NIP</td>
                                        <td>:</td>
                                        <td>{{ $item->nip }}</td>
                                    </tr>
                                    <tr>
                                        <td>Spesialis</td>
                                        <td>:</td>
                                        <td>{{ $item->spesialis }}</td>
                                    </tr>
                                    <tr>
                                        <td>No. Telp</td>
                                        <td>:</td>
                                        <td>{{ $item->no_telp }}</td>
                                    </tr>
                                </table>
                            </div>
                            <hr class="mt-3">
                            <strong class="my-2">Jam Kerja</strong>
                            <div class="col-6">
                                <table>
                                    <tr>
                                        <td>Senin&emsp;</td>
                                        <td>:</td>
                                        <td>&emsp;08.00 - 13.00</td>
                                    </tr>
                                    <tr>
                                        <td>Selasa&emsp;</td>
                                        <td>:</td>
                                        <td>&emsp;-</td>
                                    </tr>
                                    <tr>
                                        <td>Rabu&emsp;</td>
                                        <td>:</td>
                                        <td>&emsp;08.00 - 13.00</td>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-6">
                                <table>
                                    <tr>
                                        <td>Kamis&emsp;</td>
                                        <td>:</td>
                                        <td>&emsp;08.00 - 13.00</td>
                                    </tr>
                                    <tr>
                                        <td>Jumat&emsp;</td>
                                        <td>:</td>
                                        <td>&emsp;09.00 - 14.00</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Oke</button>
                </div>
            </div>
        </div>
    </div>
    @endforeach
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $('#table-dokter').DataTable();

            // confirm delete with sweetalert
            $('.dokter-delete').click(function (e) { 
                e.preventDefault();
                const form = $(this).closest('form');
                Swal.fire({
                    title: 'Apakah anda yakin?',
                    text: "Data yang dihapus tidak dapat dikembalikan!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#6c757d',
                    confirmButtonText: 'Ya, hapus!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });

            // get flash message with sweetalert
            @if (session('success') != null)
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil',
                    text: '{{ session('success') }}'
                });
            @endif
        });
    </script>
@endsection