<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Karir;
use App\Models\Admin\Kategori;
use Illuminate\Http\Request;

class KarirController extends Controller
{
    public function index()
    {
        $data = Karir::with('kategori')->get();
        return view('admin.karir.index', compact('data'));
    }

    public function create()
    {
        $kategori = Kategori::getAll('karir');
        return view('admin.karir.form_karir_create', $data = [
            'kategori' => $kategori
        ]);
    }

    public function store(Request $request)
    {
        $karir = new Karir();
        $karir->kategori_id = $request->kategori;
        $karir->pendidikan = $request->pendidikan;
        $karir->pengalaman = $request->pengalaman;
        $karir->bidang_pengalaman = $request->bidang_pengalaman;
        $karir->kriteria = $request->kriteria;
        $karir->jobdesk = $request->jobdesk;
        $karir['informasi'] = $request->informasi ?? null;

        $store = $karir->save();

        if ($store) {
            return redirect()->route('karir.admin')
                ->with([
                    'success' => true, 
                    'message' => 'Data berhasil ditambahkan'
                ]);
        } else {
            return redirect()->route('karir.admin')
                ->with([
                    'success' => false,
                    'message' => 'Data gagal ditambahkan'
                ]);
        }
    }
}
