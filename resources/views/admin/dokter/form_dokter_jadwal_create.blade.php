@extends('layouts.app')
@section('title', 'Dashboard')

@section('content')
{{-- {{ dd($data->hari) }} --}}
    <h3>Tambah Dokter Aktif</h3>
    <hr>
    <form action="{{ route('dokter.jadwal.update') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-6">
                <div class="mb-3">
                    <div class="form-group">
                        <label for="nama" class="form-label">Dokter</label>
                        <input type="hidden" value="{{ $dokter->id }}" name="dokter">
                        <input class="form-control" type="text" value="{{ strtoupper($dokter->nama_dokter) }}" disabled>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <div class="mb-3">
                    <div class="form-group mb-3">
                        <label for="hari" class="form-label">Hari Kerja</label>
                        <select id="select-hari" class="form-control" name="hari[]" multiple="multiple">
                            @if ($data != null)
                                @foreach ($hari as $item)
                                    <option {{ in_array($item->id, $jadwalHariDokter) ? 'selected' : '' }} value="{{ $item->id }}" data-code="BJ">{{ $item->hari }}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="row" {{ $data == null ? 'hidden' : '' }}>
            <div class="col-6">
                <strong class="mt-3">Jam Kerja</strong>
                <hr>
                <div class="row card-wrapper">
                    @if ($data != null)
                        @foreach ($jadwalHariDokter as $key => $item)
                            <div class="col-6">
                                <div class="card">
                                    <div class="card-header">
                                        <span><i class="ti ti-calendar"></i>&emsp;{{ $hari->where('id', $item)->first()->hari }}</span>
                                    </div>
                                    <div class="card-body">
                                        <div class="mb-3">
                                            <label for="spesialis" class="form-label">Mulai</label>
                                            <select name="jam_mulai[]" class="form-control jam_mulai">
                                                <option value=""></option>
                                                @foreach ($jam as $jamItem)
                                                    <option {{ $jadwalHariDokter[$key] == $jamItem->id ? 'selected' : '' }} value="{{ $jamItem->id }}">{{ $jamItem->jam }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="spesialis" class="form-label">Selesai</label>
                                            <select name="jam_selesai[]" class="form-control jam_selesai">
                                                <option value=""></option>
                                                @foreach ($jam as $jamItem)
                                                    <option {{ $jadwalHariDokter[$key] == $jamItem->id ? 'selected' : '' }} value="{{ $jamItem->id }}">{{ $jamItem->jam }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
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
            $('#dokter').select2({
                placeholder: "Pilih Dokter"
            });
            $('#select-hari').select2({
                placeholder: "Pilih Hari"
            });

            $('#select-hari').on('change', function () {
                const hari_val = [];
                // clear card-wrapper
                $('.card-wrapper').empty();
                // get value from select
                $(":selected", this).each(function() {
                    hari_val.push($(this).val());
                });

                // remove hidden
                if (hari_val.length > 0) {
                    $('.row').removeAttr('hidden');
                } else {
                    $('.row').attr('hidden', true);
                }

                // add element
                hari_val.forEach(element => {
                    let hari = $('#select-hari option[value="'+element+'"]').text();
                    $('.card-wrapper').append(`
                        <div class="col-6">
                            <div class="card">
                                <div class="card-header">
                                    <span><i class="ti ti-calendar"></i>&emsp;${hari}</span>
                                </div>
                                <div class="card-body">
                                    <div class="mb-3">
                                        <label for="spesialis" class="form-label">Mulai</label>
                                        <select name="jam_mulai[]" class="form-control jam_mulai">
                                            <option value=""></option>
                                            @foreach ($jam as $item)
                                                <option value="{{ $item->id }}">{{ $item->jam }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="spesialis" class="form-label">Selesai</label>
                                        <select name="jam_selesai[]" class="form-control jam_selesai">
                                            <option value=""></option>
                                            @foreach ($jam as $item)
                                                <option value="{{ $item->id }}">{{ $item->jam }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    `);
                });

                $('.jam_mulai').select2({placeholder: "Jam Mulai"});
                $('.jam_selesai').select2({placeholder: "Jam Selesai"});
            });
        });
    </script>
@endsection