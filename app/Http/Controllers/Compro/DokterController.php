<?php

namespace App\Http\Controllers\Compro;

use App\Http\Controllers\Controller;
use App\Models\Admin\Dokter;
use App\Models\Admin\Hari;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DokterController extends Controller
{
    public function index (Request $request){
        $dokter = Dokter::all();
        $spesialis = DB::select('select distinct spesialis, id from m_dokter');
        $hari = Hari::all();
        $data = Dokter::paginate(6);
        if($request->method() == "POST"){
            $data = Dokter::where(function($query) use ($request) {
                $query->orWhere("nama_dokter", $request->dokter)
                      ->orWhere("spesialis", $request->spesialis);
            })->paginate(6);
        }
        
        return view ('compro.doctors', [
            'data'=> $data,
            'dokter' => $dokter,
            'spesialis' => $spesialis,
            'hari' => $hari
        ]);
    }
}