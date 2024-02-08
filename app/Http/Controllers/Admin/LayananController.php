<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LayananUnggulan;
use Illuminate\Http\Request;
use Yajra\DataTables\Contracts\DataTable;

class LayananController extends Controller
{
    public function index()
    {
        return view('admin.layanan.index');
    }

    public function create()
    {
        return view('admin.layanan.form-add-layanan');
    }

    public function store(Request $request)
    {
        if($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $extension = $file->getClientOriginalExtension();
            $file_name = 'layanan_'.time().'.'.$extension;
            $file->move(upload_path('files/gambar_layanan/'), $file_name);
        } else {
            $file_name = null;
        }

        $layanan = new LayananUnggulan();
        $layanan->layanan = $request->layanan;
        $layanan->gambar = $file_name;
        $layanan->konten = $request->konten;
        $layanan->save();

        return redirect('layanan')->with([
            'success' => true,
            'message' => 'Data layanan berhasil ditambahkan!'
        ]);
    }

    public function getLayanan()
    {
        $layanan = LayananUnggulan::all();
        $count = LayananUnggulan::count();
        print json_encode([
            "data" => $layanan,
            "recordsTotal" => $count,
            "recordsFiltered" => $count,
        ]);
    }
}
