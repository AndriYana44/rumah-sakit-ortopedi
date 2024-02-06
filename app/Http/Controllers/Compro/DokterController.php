<?php

namespace App\Http\Controllers\Compro;

use App\Http\Controllers\Controller;
use App\Models\Admin\Dokter;
use App\Models\Admin\DokterJadwal;
use App\Models\Admin\Hari;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DokterController extends Controller
{
    public function index ($filterDay = null)
    {
        $filter = is_null($filterDay) ? Carbon::now()->locale('id')->dayName : $filterDay;
        // dd($filter);
        $dokter = Dokter::all();
        $spesialis = DB::select('select distinct spesialis, id from m_dokter');
        $hari = Hari::all();
        $data = Hari::with([
                'jadwalDokter.dokter', 'jadwalDokter.jamMulai', 'jadwalDokter.jamSelesai'
            ])->where('hari', $filter)->get();
        
        return view ('compro.doctors', [
            'data'=> $data->first(),
            'dokter' => $dokter,
            'spesialis' => $spesialis,
            'hari_active' => $filter,
            'hari' => $hari
        ]);
    }

    public function profile(Request $request)
    {
        $dokterAll = Dokter::all();
        $data = Dokter::with(['hari', 'jamMulai', 'jamSelesai'])->paginate(6);
        $spesialis = DB::select('select distinct spesialis from m_dokter');

        if(request()->isMethod('post')) {
            $data = Dokter::with(['hari', 'jamMulai', 'jamSelesai'])
                        ->where('spesialis', $request->spesialis)
                        ->orWhere('id', $request->dokter)
                        ->paginate(6);
        }

        return view('compro.doctors-profile', [
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