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
}
