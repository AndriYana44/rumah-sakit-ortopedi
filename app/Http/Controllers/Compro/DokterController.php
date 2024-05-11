<?php

namespace App\Http\Controllers\Compro;

use App\Http\Controllers\Controller;
use App\Models\Admin\Dokter;
use App\Models\Admin\DokterJadwal;
use App\Models\Admin\Hari;
use App\Models\Spesialis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use stdClass;

class DokterController extends Controller
{
    public function compareJamMulai($a, $b) {
        return $a['jam_mulai'] - $b['jam_mulai'];
    }

    public function index ($filterDay = null)
    {
        $filter = is_null($filterDay) ? Carbon::now()->locale('id')->dayName : $filterDay;
        $dokter = Dokter::all();
        $spesialis = DB::select('select distinct spesialis, id from m_dokter');
        $hari = Hari::all();

        $data = Hari::with([
                'jadwalDokter.dokter', 'jadwalDokter.jamMulai', 'jadwalDokter.jamSelesai'
            ])->where('hari', $filter)
            ->get();

        $dataMap['Orthopaedi Dan Traumatologi'] = [];
        $dataMap['Kedokteran Olahraga'] = [];
        $dataMap['Okupasi'] = [];
        $dataMap['Kebidanan & Kandungan'] = [];
        $dataMap['Penyakit Dalam'] = [];
        $dataMap['Bedah Umum'] = [];
        $dataMap['Akupuntur Medik'] = [];
        $dataMap['Anak'] = [];
        $dataMap['Kulit & Kelamin'] = [];
        $dataMap['Jantung'] = [];
        $dataMap['Kedokteran Jiwa'] = [];
        $dataMap['Paru'] = [];
        $dataMap['Saraf'] = [];
        $dataMap['Urologi'] = [];
        $dataMap['Umum'] = [];
        $dataMap['Gigi'] = [];

        // dd($data);
        foreach($data->first()->jadwalDokter as $jadwal) {
            if(!empty($jadwal->dokter->spesialis)) {
                if($jadwal->dokter->spesialis == 'Orthopaedi Dan Traumatologi') {
                    $nama = $jadwal->dokter->nama_dokter;
                    $jam_mulai = $jadwal->jamMulai->jam;
                    $jam_selesai = $jadwal->jamSelesai->jam;
                    $foto = $jadwal->dokter->foto;

                    $data_dokter = [
                        'nama' => $nama,
                        'jam_mulai' => $jam_mulai,
                        'jam_selesai' => $jam_selesai,
                        'foto' => $foto
                    ];

                    array_push($dataMap['Orthopaedi Dan Traumatologi'], $data_dokter);
                    usort($dataMap['Orthopaedi Dan Traumatologi'], array($this, 'compareJamMulai'));
                }else if($jadwal->dokter->spesialis == 'Kedokteran Olahraga') {
                    $nama = $jadwal->dokter->nama_dokter;
                    $jam_mulai = $jadwal->jamMulai->jam;
                    $jam_selesai = $jadwal->jamSelesai->jam;
                    $foto = $jadwal->dokter->foto;

                    $data_dokter = [
                        'nama' => $nama,
                        'jam_mulai' => $jam_mulai,
                        'jam_selesai' => $jam_selesai,
                        'foto' => $foto
                    ];

                    array_push($dataMap['Kedokteran Olahraga'], $data_dokter);
                    usort($dataMap['Kedokteran Olahraga'], array($this, 'compareJamMulai'));
                }else if($jadwal->dokter->spesialis == 'Okupasi') {
                    $nama = $jadwal->dokter->nama_dokter;
                    $jam_mulai = $jadwal->jamMulai->jam;
                    $jam_selesai = $jadwal->jamSelesai->jam;
                    $foto = $jadwal->dokter->foto;

                    $data_dokter = [
                        'nama' => $nama,
                        'jam_mulai' => $jam_mulai,
                        'jam_selesai' => $jam_selesai,
                        'foto' => $foto
                    ];

                    array_push($dataMap['Okupasi'], $data_dokter);
                    usort($dataMap['Okupasi'], array($this, 'compareJamMulai'));
                }else if($jadwal->dokter->spesialis == 'Kebidanan & Kandungan') {
                    $nama = $jadwal->dokter->nama_dokter;
                    $jam_mulai = $jadwal->jamMulai->jam;
                    $jam_selesai = $jadwal->jamSelesai->jam;
                    $foto = $jadwal->dokter->foto;

                    $data_dokter = [
                        'nama' => $nama,
                        'jam_mulai' => $jam_mulai,
                        'jam_selesai' => $jam_selesai,
                        'foto' => $foto
                    ];

                    array_push($dataMap['Kebidanan & Kandungan'], $data_dokter);
                    usort($dataMap['Kebidanan & Kandungan'], array($this, 'compareJamMulai'));
                }else if($jadwal->dokter->spesialis == 'Penyakit Dalam') {
                    $nama = $jadwal->dokter->nama_dokter;
                    $jam_mulai = $jadwal->jamMulai->jam;
                    $jam_selesai = $jadwal->jamSelesai->jam;
                    $foto = $jadwal->dokter->foto;

                    $data_dokter = [
                        'nama' => $nama,
                        'jam_mulai' => $jam_mulai,
                        'jam_selesai' => $jam_selesai,
                        'foto' => $foto
                    ];

                    array_push($dataMap['Penyakit Dalam'], $data_dokter);
                    usort($dataMap['Penyakit Dalam'], array($this, 'compareJamMulai'));
                }else if($jadwal->dokter->spesialis == 'Bedah Umum') {
                    $nama = $jadwal->dokter->nama_dokter;
                    $jam_mulai = $jadwal->jamMulai->jam;
                    $jam_selesai = $jadwal->jamSelesai->jam;
                    $foto = $jadwal->dokter->foto;

                    $data_dokter = [
                        'nama' => $nama,
                        'jam_mulai' => $jam_mulai,
                        'jam_selesai' => $jam_selesai,
                        'foto' => $foto
                    ];

                    array_push($dataMap['Bedah Umum'], $data_dokter);
                    usort($dataMap['Bedah Umum'], array($this, 'compareJamMulai'));
                }else if($jadwal->dokter->spesialis == 'Akupuntur Medik') {
                    $nama = $jadwal->dokter->nama_dokter;
                    $jam_mulai = $jadwal->jamMulai->jam;
                    $jam_selesai = $jadwal->jamSelesai->jam;
                    $foto = $jadwal->dokter->foto;

                    $data_dokter = [
                        'nama' => $nama,
                        'jam_mulai' => $jam_mulai,
                        'jam_selesai' => $jam_selesai,
                        'foto' => $foto
                    ];

                    array_push($dataMap['Akupuntur Medik'], $data_dokter);
                    usort($dataMap['Akupuntur Medik'], array($this, 'compareJamMulai'));
                }else if($jadwal->dokter->spesialis == 'Anak') {
                    $nama = $jadwal->dokter->nama_dokter;
                    $jam_mulai = $jadwal->jamMulai->jam;
                    $jam_selesai = $jadwal->jamSelesai->jam;
                    $foto = $jadwal->dokter->foto;

                    $data_dokter = [
                        'nama' => $nama,
                        'jam_mulai' => $jam_mulai,
                        'jam_selesai' => $jam_selesai,
                        'foto' => $foto
                    ];

                    array_push($dataMap['Anak'], $data_dokter);
                    usort($dataMap['Anak'], array($this, 'compareJamMulai'));
                }else if($jadwal->dokter->spesialis == 'Kulit & Kelamin') {
                    $nama = $jadwal->dokter->nama_dokter;
                    $jam_mulai = $jadwal->jamMulai->jam;
                    $jam_selesai = $jadwal->jamSelesai->jam;
                    $foto = $jadwal->dokter->foto;

                    $data_dokter = [
                        'nama' => $nama,
                        'jam_mulai' => $jam_mulai,
                        'jam_selesai' => $jam_selesai,
                        'foto' => $foto
                    ];

                    array_push($dataMap['Kulit & Kelamin'], $data_dokter);
                    usort($dataMap['Kulit & Kelamin'], array($this, 'compareJamMulai'));
                }else if($jadwal->dokter->spesialis == 'Jantung') {
                    $nama = $jadwal->dokter->nama_dokter;
                    $jam_mulai = $jadwal->jamMulai->jam;
                    $jam_selesai = $jadwal->jamSelesai->jam;
                    $foto = $jadwal->dokter->foto;

                    $data_dokter = [
                        'nama' => $nama,
                        'jam_mulai' => $jam_mulai,
                        'jam_selesai' => $jam_selesai,
                        'foto' => $foto
                    ];

                    array_push($dataMap['Jantung'], $data_dokter);
                    usort($dataMap['Jantung'], array($this, 'compareJamMulai'));
                }else if($jadwal->dokter->spesialis == 'Kedokteran Jiwa') {
                    $nama = $jadwal->dokter->nama_dokter;
                    $jam_mulai = $jadwal->jamMulai->jam;
                    $jam_selesai = $jadwal->jamSelesai->jam;
                    $foto = $jadwal->dokter->foto;

                    $data_dokter = [
                        'nama' => $nama,
                        'jam_mulai' => $jam_mulai,
                        'jam_selesai' => $jam_selesai,
                        'foto' => $foto
                    ];

                    array_push($dataMap['Kedokteran Jiwa'], $data_dokter);
                    usort($dataMap['Kedokteran Jiwa'], array($this, 'compareJamMulai'));
                }else if($jadwal->dokter->spesialis == 'Paru') {
                    $nama = $jadwal->dokter->nama_dokter;
                    $jam_mulai = $jadwal->jamMulai->jam;
                    $jam_selesai = $jadwal->jamSelesai->jam;
                    $foto = $jadwal->dokter->foto;

                    $data_dokter = [
                        'nama' => $nama,
                        'jam_mulai' => $jam_mulai,
                        'jam_selesai' => $jam_selesai,
                        'foto' => $foto
                    ];

                    array_push($dataMap['Paru'], $data_dokter);
                    usort($dataMap['Paru'], array($this, 'compareJamMulai'));
                }else if($jadwal->dokter->spesialis == 'Saraf') {
                    $nama = $jadwal->dokter->nama_dokter;
                    $jam_mulai = $jadwal->jamMulai->jam;
                    $jam_selesai = $jadwal->jamSelesai->jam;
                    $foto = $jadwal->dokter->foto;

                    $data_dokter = [
                        'nama' => $nama,
                        'jam_mulai' => $jam_mulai,
                        'jam_selesai' => $jam_selesai,
                        'foto' => $foto
                    ];

                    array_push($dataMap['Saraf'], $data_dokter);
                    usort($dataMap['Saraf'], array($this, 'compareJamMulai'));
                }else if($jadwal->dokter->spesialis == 'Urologi') {
                    $nama = $jadwal->dokter->nama_dokter;
                    $jam_mulai = $jadwal->jamMulai->jam;
                    $jam_selesai = $jadwal->jamSelesai->jam;
                    $foto = $jadwal->dokter->foto;

                    $data_dokter = [
                        'nama' => $nama,
                        'jam_mulai' => $jam_mulai,
                        'jam_selesai' => $jam_selesai,
                        'foto' => $foto
                    ];

                    array_push($dataMap['Urologi'], $data_dokter);
                    usort($dataMap['Urologi'], array($this, 'compareJamMulai'));
                }else if($jadwal->dokter->spesialis == 'Umum') {
                    $nama = $jadwal->dokter->nama_dokter;
                    $jam_mulai = $jadwal->jamMulai->jam;
                    $jam_selesai = $jadwal->jamSelesai->jam;
                    $foto = $jadwal->dokter->foto;

                    $data_dokter = [
                        'nama' => $nama,
                        'jam_mulai' => $jam_mulai,
                        'jam_selesai' => $jam_selesai,
                        'foto' => $foto
                    ];

                    array_push($dataMap['Umum'], $data_dokter);
                    usort($dataMap['Umum'], array($this, 'compareJamMulai'));
                }else if($jadwal->dokter->spesialis == 'Gigi') {
                    $nama = $jadwal->dokter->nama_dokter;
                    $jam_mulai = $jadwal->jamMulai->jam;
                    $jam_selesai = $jadwal->jamSelesai->jam;
                    $foto = $jadwal->dokter->foto;

                    $data_dokter = [
                        'nama' => $nama,
                        'jam_mulai' => $jam_mulai,
                        'jam_selesai' => $jam_selesai,
                        'foto' => $foto
                    ];

                    array_push($dataMap['Gigi'], $data_dokter);
                    usort($dataMap['Gigi'], array($this, 'compareJamMulai'));
                }
            }
        }
        
        return view ('compro.doctors', [
            'data'=> $data->first(),
            'dataMap' => $dataMap,
            'dokter' => $dokter,
            'spesialis' => $spesialis,
            'hari_active' => $filter,
            'hari' => $hari
        ]);
    }

    public function createSpesialis(Request $request)
    {
        $data = new Spesialis();
        $data->spesialis = $request->spesialis;
        $data->save();

        return redirect()->back()->with(['success' => 'Spesialis berhasil ditambahkan']);
    }

    public function profile(Request $request)
    {
        $dokterAll = Dokter::all();
        $data = Dokter::with(['hari', 'jamMulai', 'jamSelesai']);
        $spesialis = DB::select('select distinct spesialis from m_dokter');
        
        if(request()->isMethod('post')) {
            if(isset($request->spesialis)) {
                $data = $data->where('spesialis', $request->spesialis);
            }
            
            if(isset($request->dokter)) {
                $data = $data->where('nama_dokter', 'like', '%' . $request->dokter . '%');
            }
        }
        
        $data = $data->paginate(6);

        return view('compro.doctors-profile', [
            'search' => isset($request->dokter) ? $request->dokter : null,
            'data' => $data,
            'spesialis' => $spesialis,
            'dokter_all' => $dokterAll,
        ]); 
    }

    public function personal($id)
    {
        $data = Dokter::with(['hari', 'jamMulai', 'jamSelesai', 'dokterDetail'])->where('id', $id)->get();
        return view('compro.doctor-profile', [
            'data' => $data
        ]);
    }
}