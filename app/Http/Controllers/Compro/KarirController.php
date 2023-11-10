<?php

namespace App\Http\Controllers\Compro;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KarirController extends Controller
{
    public function index()
    {
        return view('compro.karir');
    }
}
