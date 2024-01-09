<?php

namespace App\Http\Controllers\Compro;

use App\Http\Controllers\Controller;
use App\Models\Admin\Dokter;
use Illuminate\Http\Request;

class DokterController extends Controller
{
    public function index (Request $request){
        $data = Dokter::paginate(6);
        if($request->method() == "POST"){
            $data = Dokter::where(function($query) use ($request) {
                $query->orWhere("nama_dokter", $request->dokter)
                      ->orWhere("spesialis", $request->spesialis);
            })->paginate(6);
        }
        
        return view ('compro.doctors', [
            'data'=> $data
        ]);
    }
}