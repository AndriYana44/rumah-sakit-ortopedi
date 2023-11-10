<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KarirController extends Controller
{
    public function index()
    {
        return view('admin.karir.index');
    }

    public function create()
    {
        return view('admin.karir.form_karir_create');
    }
}
