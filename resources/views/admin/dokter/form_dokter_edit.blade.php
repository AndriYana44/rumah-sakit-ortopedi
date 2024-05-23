@extends('layouts.app')
@section('title', 'Dashboard')

@section('breadcrumb')
{{ Breadcrumbs::render('dashboard_dokter_edit') }}
@endsection

@section('content')
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
        Tambah Spesialis
    </button>
    <hr>
    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form action="{{ route('createSpesialis') }}" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Tambah Spesialis</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="text" class="form-control" name="spesialis" placeholder="Spesialis...">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <h3>Edit Dokter</h3>
    <hr>
    <form action="{{ route('dokter.update') }}" id="form-dokter-edit" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        @foreach($data as $item)
        <input type="hidden" name="id" value="{{ $item->id }}">
        {{-- {{ dd($spesialis) }} --}}
        <div class="row">
            <div class="col-6">
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="nama" name="nama" value="{{ $item->nama_dokter }}">
                    <small class="error text-danger" id="nama-error"></small>
                </div>
            </div>
            <div class="col-6">
                <div class="mb-3">
                    <label for="spesialis" class="form-label">Spesialis <span class="text-danger">*</span></label>
                    <select name="spesialis" id="spesialis" class="select2">
                        <option value=""></option>
                        @foreach ($spesialis as $spesialis)
                            <option value="{{ $spesialis->spesialis }}" {{ $item->spesialis == $spesialis->spesialis ? 'selected="selected"' : '' }}>{{ $spesialis->spesialis }}</option>
                        @endforeach
                    </select>
                    <small class="error text-danger" id="spesialis-error"></small>
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
                            <label for="pendidikan" class="form-label">Pendidikan <span class="text-danger">*</span></label>
                            <select name="pendidikan[]" class="form-control pendidikan">
                                <option value=""></option>
                                <option {{ $detail->pendidikan == 's1' ? 'selected="selected"' : '' }} value="s1">S1</option>
                                <option {{ $detail->pendidikan == 's2' ? 'selected="selected"' : '' }} value="s2">S2</option>
                                <option {{ $detail->pendidikan == 's3' ? 'selected="selected"' : '' }} value="s3">S3</option>
                            </select>
                            <small class="error text-danger pendidikan-error"></small>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="mb-3">
                            <label for="jurusan" class="form-label">Fakultas/Jurusan <span class="text-danger">*</span></label>
                            <input type="text" name="jurusan[]" value="{{ $detail->jurusan }}" class="form-control jurusan">
                            <small class="error text-danger jurusan-error"></small>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="mb-3">
                            <label for="univ" class="form-label">Universitas <span class="text-danger">*</span></label>
                            <input type="text" name="univ[]" value="{{ $detail->nama_kampus }}" class="form-control univ">
                            <small class="error text-danger univ-error"></small>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="mb-3">
                            <label for="lulus" class="form-label">Tahun Lulus <span class="text-danger">*</span></label>
                            <select name="lulus[]" class="form-control lulus">
                                <option value=""></option>
                                @php $currentYear = date("Y"); @endphp
                                @for ($year = $currentYear; $year >= $currentYear - 50; $year--) 
                                    <option {{ $detail->tahun_lulus == $year ? 'selected="selected"' : '' }} value="{{ $year }}">{{ $year }}</option>
                                @endfor
                            </select>
                            <small class="error text-danger lulus-error"></small>
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
                            <label for="pendidikan" class="form-label">Pendidikan <span class="text-danger">*</span></label>
                            <select name="pendidikan[]" class="form-control pendidikan" required>
                                <option value=""></option>
                                <option value="s1">S1</option>
                                <option value="s2">S2</option>
                                <option value="s3">S3</option>
                            </select>
                            <small class="error text-danger pendidikan-error"></small>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="mb-3">
                            <label for="jurusan" class="form-label">Fakultas/Jurusan <span class="text-danger">*</span></label>
                            <input type="text" name="jurusan[]" class="form-control jurusan" required>
                            <small class="error text-danger jurusan-error"></small>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="mb-3">
                            <label for="univ" class="form-label">Universitas <span class="text-danger">*</span></label>
                            <input type="text" name="univ[]" class="form-control univ" required>
                            <small class="error text-danger univ-error"></small>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="mb-3">
                            <label for="lulus" class="form-label">Tahun Lulus <span class="text-danger">*</span></label>
                            <select name="lulus[]" class="form-control lulus" required>
                                <option value=""></option>
                                @php $currentYear = date("Y"); @endphp
                                @for ($year = $currentYear; $year >= $currentYear - 50; $year--) 
                                    <option value="{{ $year }}">{{ $year }}</option>
                                @endfor
                            </select>
                            <small class="error text-danger lulus-error"></small>
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
                    <label for="keterangan" class="form-label">Riwayat Spesialis <span class="text-danger">*</span></label>
                    <textarea class="form-control" name="keterangan" id="keterangan" required>{{ $item->keterangan }}</textarea>
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
                    <input type="text" class="form-control" id="email" name="email" value="{{ $item->email }}">
                    <small class="error text-danger" id="email-error"></small>
                </div>
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <textarea class="form-control" id="alamat" name="alamat">{{ $item->alamat }}</textarea>
                <small class="error text-danger" id="alamat-error"></small>
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
            // select2
            $('.select2').select2({
                placeholder: 'Pilih Spesialis',
                width: '100%'
            });

            // sweet alert
            @if (session('success'))
                Swal.fire(
                    'Success!',
                    '{{ session('success') }}',
                    'success'
                );
            @endif

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

            function validateMulti(classEl) {
                var formDataMulti = {};
                var constraintsMulti = {};
                $('.' + classEl).each(function(index, element) {
                    var pendidikan = $(this).attr('name');
                    pendidikan = pendidikan.replace('[]', '');
                    formDataMulti[pendidikan] = $(this).val();

                    constraintsMulti[pendidikan] = {
                        presence: {
                            allowEmpty: false,
                            message: "tidak boleh kosong!"
                        }
                    };
                    var errorsMulti = validate(formDataMulti, constraintsMulti);
                    if(errorsMulti) {
                        $.each(errorsMulti, function (key, val) { 
                            $(element).next().text(val[0]);
                        });
                    }else{
                        $(element).next().text('');
                    }
                });
            }

            $('#form-dokter-edit').submit(function(e) {
                e.preventDefault();
                $('.error').text('');
                var formData = {
                    nama: $('#nama').val(),
                    spesialis: $('#spesialis').val()
                }

                var constraints = {
                    nama: {
                        presence: {
                            allowEmpty: false,
                            message: 'tidak boleh kosong!'
                        }
                    },
                    spesialis: {
                        presence: {
                            allowEmpty: false,
                            message: 'tidak boleh kosong!'
                        }
                    }
                }
                
                validateMulti('pendidikan');
                validateMulti('jurusan');
                validateMulti('univ');
                validateMulti('lulus');

                var errors = validate(formData, constraints);

                if(errors) {
                    $.each(errors, function (key, val) {
                        $('#' + key + '-error').text(val[0]);
                    });
                }else{
                    $('#form-dokter-edit').off('submit').submit();
                }
            });
        });
    </script>
@endsection