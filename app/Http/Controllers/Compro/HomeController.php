<?php

namespace App\Http\Controllers\Compro;

use App\Http\Controllers\Controller;
use App\Models\Admin\Dokter;
use App\Models\TempDaftarBerobat;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //

    public function index (){
        // dokter with relation
        $dokter = Dokter::getAllWithJadwal();
        return view ('compro.index', [
            'dokter' => $dokter
        ]);
    }

    public function about (){
        return view ('compro.about');
    }

    public function doctors (){
        return view ('compro.doctors');
    }

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
