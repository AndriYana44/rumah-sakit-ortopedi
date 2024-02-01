@extends('layouts.app')
@section('title', 'Dashboard')

@section('breadcrumb')
{{ Breadcrumbs::render('dashboard_dokter_edit') }}
@endsection

@section('content')
    <h3>Edit Dokter</h3>
    <hr>
    <form action="{{ route('dokter.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        @foreach($data as $item)
        <input type="hidden" name="id" value="{{ $item->id }}">
        <div class="row">
            <div class="col-6">
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control" name="nama" value="{{ $item->nama_dokter }}">
                </div>
            </div>
            <div class="col-6">
                <div class="mb-3">
                    <label for="spesialis" class="form-label">Spesialis</label>
                    <input type="text" class="form-control" name="spesialis" value="{{ $item->spesialis }}">
                </div>
            </div>

            @if($item->dokterDetail->first() != null)
            @foreach ($item->dokterDetail as $key => $detail)  
            @if ($key > 0)
            <div class="cloned-parent-element">
            @else
            <div class="pendidikan-wrapper">
            @endif
                <div class="row">
                    <div class="col-2">
                        <div class="mb-3">
                            <label for="pendidikan" class="form-label">Pendidikan</label>
                            <select name="pendidikan[]" id="pendidikan" class="form-control">
                                <option value=""></option>
                                <option {{ $detail->pendidikan == 's1' ? 'selected="selected"' : '' }} value="s1">S1</option>
                                <option {{ $detail->pendidikan == 's2' ? 'selected="selected"' : '' }} value="s2">S2</option>
                                <option {{ $detail->pendidikan == 's3' ? 'selected="selected"' : '' }} value="s3">S3</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="mb-3">
                            <label for="jurusan" class="form-label">Fakultas/Jurusan</label>
                            <input type="text" name="jurusan[]" value="{{ $detail->jurusan }}" id="jurusan" class="form-control">
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="mb-3">
                            <label for="univ" class="form-label">Universitas</label>
                            <input type="text" name="univ[]" value="{{ $detail->nama_kampus }}" id="univ" class="form-control">
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="mb-3">
                            <label for="lulus" class="form-label">Tahun Lulus</label>
                            <select name="lulus[]" id="lulus" class="form-control">
                                <option value=""></option>
                                @php $currentYear = date("Y"); @endphp
                                @for ($year = $currentYear; $year >= $currentYear - 50; $year--) 
                                    <option {{ $detail->tahun_lulus == $year ? 'selected="selected"' : '' }} value="{{ $year }}">{{ $year }}</option>
                                @endfor
                            </select>
                        </div>
                    </div>
                    <div class="col-1 d-flex align-items-center">
                    @if ($key > 0)    
                    <button type="button" class="btn btn-danger mt-3 d-flex align-items-center remove-clone">x</button>
                    @else
                    <button id="clone-pendidikan" type="button" class="btn btn-primary mt-3 d-flex align-items-center">+</button>
                    @endif
                    </div>
                </div>
            </div>
            @endforeach
            @else
            <div class="pendidikan-wrapper">
                <div class="row">
                    <div class="col-2">
                        <div class="mb-3">
                            <label for="pendidikan" class="form-label">Pendidikan</label>
                            <select name="pendidikan[]" id="pendidikan" class="form-control">
                                <option value=""></option>
                                <option value="s1">S1</option>
                                <option value="s2">S2</option>
                                <option value="s3">S3</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="mb-3">
                            <label for="jurusan" class="form-label">Fakultas/Jurusan</label>
                            <input type="text" name="jurusan[]" id="jurusan" class="form-control">
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="mb-3">
                            <label for="univ" class="form-label">Universitas</label>
                            <input type="text" name="univ[]" id="univ" class="form-control">
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="mb-3">
                            <label for="lulus" class="form-label">Tahun Lulus</label>
                            <select name="lulus[]" id="lulus" class="form-control">
                                <option value=""></option>
                                @php $currentYear = date("Y"); @endphp
                                @for ($year = $currentYear; $year >= $currentYear - 50; $year--) 
                                    <option value="{{ $year }}">{{ $year }}</option>
                                @endfor
                            </select>
                        </div>
                    </div>
                    <div class="col-1 d-flex align-items-center">
                        <button id="clone-pendidikan" type="button" class="btn btn-primary mt-3 d-flex align-items-center">+</button>
                    </div>
                </div>
            </div>
            @endif

            <div class="clone-paste"></div>

            <div class="col-12">
                <div class="mb-3">
                    <label for="keterangan" class="form-label">Keterangan</label>
                    <textarea class="form-control" name="keterangan" id="keterangan">{{ $item->keterangan }}</textarea>
                </div>
            </div>
            <div class="col-6">
                <div class="mb-3">
                    <label for="tlp" class="form-label">No. Telepon</label>
                    <input type="text" class="form-control" name="tlp" value="{{ $item->no_telp }}">
                </div>
            </div>
            <div class="col-6">
                <label for="foto" class="form-label">Foto</label>
                <input class="form-control" type="file" name="foto">
            </div>
            <div class="col-6">
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" class="form-control" name="email" value="{{ $item->email }}">
                </div>
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <textarea class="form-control" name="alamat">{{ $item->alamat }}</textarea>
            </div>
        </div>
        <div class="d-grid gap-2 d-md-flex justify-content-md-start mt-4">
            <button type="submit" class="btn btn-primary">Submit</button>
            <button type="button" onclick="history.back()" class="btn btn-dark">Cancel</button>
        </div>
        @endforeach
    </form>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            var cloneClick = 0;
            $('#clone-pendidikan').on('click', function() {
                cloneClick += 1;
                var elClone = $('.pendidikan-wrapper').clone();
                // Remove the existing selectize instance (if any)
                elClone.find('.selectized').removeClass('selectized').removeAttr('data-selectize');
                
                // change id
                elClone.find('button').removeAttr('id');
                elClone.find('button').addClass('remove-clone');
                
                // change class
                elClone.removeClass('pendidikan-wrapper');
                elClone.addClass('cloned-parent-element');
                elClone.find('button').removeClass('btn-primary');
                elClone.find('button').addClass('btn-danger');

                // clean form
                elClone.find('input').val('');
                elClone.find('select').val(null);

                elClone.find('button').text('x');
                $('.clone-paste').append(elClone);
            });

            $(document).on('click', '.remove-clone', function(e) {
                e.target.closest('.cloned-parent-element').remove();
            });
        });
    </script>
@endsection