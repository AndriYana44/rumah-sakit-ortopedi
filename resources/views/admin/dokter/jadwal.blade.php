@extends('layouts.app')
@section('title', 'Dashboard')

@section('breadcrumb')
{{ Breadcrumbs::render('dashboard_dokter_jadwal') }}
@endsection

@section('content')
    <h3>Jadwal Dokter</h3>
    <hr>
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
            @foreach ($data as $key => $item) 
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ strtoupper($item->nama_dokter) }}</td>
                    <td>
                        <ul>
                            @foreach ($item->hari as $hari)
                                <li>{{ $hari->hari }}</li>
                            @endforeach
                        </ul>
                    </td>
                    <td>
                        <ul>
                            @foreach ($item->jamMulai as $jam)
                                <li>{{ $jam->jam }}</li>
                            @endforeach
                        </ul>
                    </td>
                    <td>
                        <ul>
                            @foreach ($item->jamSelesai as $jam)
                                <li>{{ $jam->jam }}</li>
                            @endforeach
                        </ul>
                    </td>
                    <td>
                        <div class="btn-wrapper d-flex flex-column">
                            <div class="aksi-wrapper">
                                <a href="#" class="btn btn-sm btn-danger">Delete</a>
                                <a href="#" class="btn btn-sm btn-warning">Edit</a>
                                <a href="#" class="btn btn-sm btn-info detail" data-dokter-id="{{ $item->id }}" data-bs-toggle="modal" data-bs-target="#detailDokter{{ $item->id }}">Detail</a>
                            </div>
                            <div class="set-jadwal mt-2">
                                <a href="{{ route('dokter.jadwal.edit', ['id' => $item->id]) }}" class="btn btn-sm btn-primary">Tetapkan Jadwal</a>
                            </div>
                        </div>
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
                            <div class="col-12">
                                <table class="table table-striped table-sm table-jadwal-detail">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Hari</th>
                                            <th class="text-center">Jam Kerja</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
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
            $('#table-jadwal-dokter').DataTable();

            // get flash message with sweetalert
            @if (session('success') != null)
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil',
                    text: '{{ session('success') }}'
                });
            @endif

            // ajax get jadwal
            $('.detail').click(function (e) { 
                e.preventDefault();
                const dokter_id = $(this).data('dokter-id');
                $.ajax({
                    type: "POST",
                    url: `{{ route('api.dokter.jadwal') }}`,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        dokter_id: dokter_id
                    },
                    dataType: "JSON",
                    success: function (response) {
                        // clear table-jadwal-detail
                        $('.table-jadwal-detail tbody').empty();
                        // add jadwal table left
                        $.each(response.hari, function (idx, val) { 
                            $('.table-jadwal-detail tbody').append(`
                                <tr>
                                    <td class="text-center">${val.hari}</td>
                                    <td class="text-center">${response.jam_mulai[idx].jam} - ${response.jam_selesai[idx].jam}</td>
                                </tr>
                            `);
                        });
                    }
                });
            });
        });
    </script>
@endsection