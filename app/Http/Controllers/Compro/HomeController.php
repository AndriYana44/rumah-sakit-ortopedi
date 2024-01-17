<?php

namespace App\Http\Controllers\Compro;

use App\Http\Controllers\Controller;
use App\Models\Admin\Dokter;
use App\Models\Promo;
use App\Models\TempDaftarBerobat;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //

    public function index (){
        // dokter with relation
        $spesialis = Dokter::select("spesialis")->distinct()->get();
        $promo = Promo::all();
        // dd($spesialis);
        $dokter = Dokter::getAllWithJadwal();
        return view ('compro.index', [
            'dokter' => $dokter,
            'spesialis' => $spesialis,
            'promo' => $promo
        ]);
    }

    public function about (){
        return view ('compro.about');
    }

    // public function doctors (){
    //     $data = Dokter::paginate(6);
    //     return view ('compro.doctors', [
    //         'data'=> $data
    //     ]);
    // }

    public function blog (){
        return view ('compro.blog');
    }

    public function blogDetails (){
        return view ('compro.blog-details');
    }

    public function contact (){
        return view ('compro.contact');
    }

    public function daftarBerobat(Request $request)
    {
        $daftarBerobat = new TempDaftarBerobat();
        $daftarBerobat->user_id = auth()->user()->id;
        $daftarBerobat->dokter_id = $request->dokter;
        $daftarBerobat->metode_pembayaran = $request->pembayaran;
        $daftarBerobat->tanggal_periksa = $request->tgl_periksa;
        $daftarBerobat->save();

        return response()->json(['success' => true]);
    }
}
