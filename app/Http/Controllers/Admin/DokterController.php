<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Hari;
use App\Models\Admin\Jam;

class DokterController extends Controller
{
    public function index()
    {
        return view('admin.dokter.index');
    }

    // jadwal dokter
    public function jadwal()
    {
        return view('admin.dokter.jadwal');
    }

    // create
    public function create()
    {
        return view('admin.dokter.create');
    }

    // create jadwal
    public function createJadwal()
    {
        $hari = Hari::getAll();
        $jam = Jam::getAll();
        return view('admin.dokter.create_jadwal', [
            'hari' => $hari,
            'jam' => $jam
        ]);
    }
}
