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

        $data = DokterJadwal::with(['dokter', 'jamMulai', 'jamSelesai', 'hari'])->whereHas('hari', function($query) use ($filter) {
            $query->where('hari', $filter);
        })->get();
        
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

        foreach($data as $d) {
            if(!empty($d->dokter)) {
                foreach($dataMap as $key => $value) {
                    if(strtolower($d->dokter->spesialis) == strtolower($key)) {
                        $data_dokter = [
                            'nama' => $d->dokter->nama_dokter,
                            'jam_mulai' => $d->jamMulai->jam,
                            'jam_selesai' => $d->jamSelesai->jam,
                            'foto' => $d->dokter->foto
                        ];
    
                        array_push($dataMap[$key], $data_dokter);
                        usort($dataMap[$key], array($this, 'compareJamMulai'));
                    }
                }
            }
        }

        $dataMap = array_filter($dataMap, function($value) {
            return !empty($value);
        });
        
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