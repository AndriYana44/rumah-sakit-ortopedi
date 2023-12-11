<?php

namespace App\Http\Controllers\Compro;

use App\Http\Controllers\Controller;
use App\Models\Admin\Dokter;
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
}
