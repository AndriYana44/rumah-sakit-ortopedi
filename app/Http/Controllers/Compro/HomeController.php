<?php

namespace App\Http\Controllers\Compro;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //

    public function index (){
        return view ('compro.index');
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
