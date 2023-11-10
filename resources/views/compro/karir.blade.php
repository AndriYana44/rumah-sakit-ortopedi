@extends('compro.layouts.app')
@section('content')

<style>
    .limited-text {
        display: -webkit-box;
        -webkit-line-clamp: 2; /* Maksimal dua baris */
        -webkit-box-orient: vertical;
        overflow: hidden;
        color: #999;
    }
</style>

<div class="container mt-4">
    <div class="row">
        <div class="col-3">
            <div class="card my-3">
                <div class="card-header">
                    <span>Pilih Kriteria</span>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="kategori">Pilih Kategori</label>
                        <select name="kategori" id="kategori" class="form-control">
                            <option value=""></option>
                            <option value="1">Management Building</option>
                            <option value="2">Pembangunan</option>
                            <option value="3">Manager RS</option>
                        </select>
                    </div>
                    <div class="form-group d-flex flex-column">
                        <span>Jenjang Pendidikan</span>
                        <label for="smk"><input class="mr-2" id="smk" type="checkbox">SMK/SMA</label>
                        <label for="d1"><input class="mr-2" id="d1" type="checkbox">D1</label>
                        <label for="d3"><input class="mr-2" id="d3" type="checkbox">D3</label>
                        <label for="s1"><input class="mr-2" id="s1" type="checkbox">S1</label>
                        <label for="s2"><input class="mr-2" id="s2" type="checkbox">S2</label>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-8">
            <div class="card my-3">
                <div class="card-body">
                    <div class="row">
                        <div class="col-9">
                            <div class="job d-flex flex-column">
                                <span><strong>Rekam Medis</strong></span>
                                <span class="d-flex mt-3">
                                    <div class="location-wrapper">
                                        <i class="fa fa-map-marker text-success" aria-hidden="true"></i>
                                        <small>Rs. Orthopedi Siaga Raya, Jakarta Pasar Minggu</small>
                                    </div>
                                    <div class="graduation-wrapper ml-4">
                                        <i class="fa fa-graduation-cap text-success" aria-hidden="true"></i>
                                        <small>S1</small>
                                    </div>
                                </span>
                                <div class="requirement mt-2 limited-text">
                                    Pengalaman Kerja:

Pengalaman kerja di bidang rekam medis atau administrasi kesehatan.
Kemampuan dalam mengelola data pasien, mengelola catatan medis, atau bekerja dengan sistem rekam medis elektronik.
Pengetahuan Teknis:

Pemahaman mendalam tentang kebijakan dan prosedur yang berkaitan dengan rekam medis.
Kemampuan menggunakan perangkat lunak rekam medis dan sistem manajemen informasi kesehatan (HIMS).
Kemampuan Administratif:

Keahlian dalam manajemen administrasi, termasuk pengelolaan dokumen, penjadwalan, dan penerbitan laporan.
Kemampuan menggunakan perangkat lunak perkantoran seperti Microsoft Office.
Keterampilan Komunikasi:

Kemampuan berkomunikasi dengan baik dengan staf kesehatan, pasien, dan pihak lain yang terlibat.
Kemampuan menulis laporan dan dokumen medis dengan jelas dan akurat.
Ketelitian dan Keterampilan Analitis:

Keterampilan analitis yang baik dalam memeriksa dan memverifikasi informasi medis.
Kemampuan bekerja dengan tingkat ketelitian tinggi dan memahami pentingnya akurasi dalam rekam medis.
Etika dan Keamanan Informasi:

Memahami dan mematuhi standar etika profesi kesehatan.
Menjaga keamanan informasi pasien dan mengikuti kebijakan privasi data.
Kemampuan Manajemen Waktu:

Kemampuan manajemen waktu yang baik untuk mengatasi beban kerja yang besar dan berbagai tugas sekaligus.
Pemahaman tentang Hukum Kesehatan:

Pemahaman tentang regulasi dan kebijakan hukum terkait dengan rekam medis dan privasi pasien.
Kemampuan Beradaptasi:

Kemampuan untuk beradaptasi dengan perubahan teknologi dan kebijakan di bidang rekam medis.
                                </div>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="d-flex flex-column align-items-center justify-content-center">
                                <button class="btn btn-primary btn-sm">Apply Now</button>
                                <small class="mt-2">Deadline: 20-12-2023</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('script')
<script>
    $(document).ready(function() {
        
    });
</script>
@endsection