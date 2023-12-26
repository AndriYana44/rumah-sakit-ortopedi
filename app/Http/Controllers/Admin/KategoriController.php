<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KategoriController extends Controller
{
    public function index()
    {
        // get data
        $kategori = Kategori::all();
        $data = [
            "kategori" => $kategori,
        ];
        return view('admin.kategori.index', $data);
    }

    public function getAllData(Request $request)
    {
        $query = DB::table('m_kategori');
        if(!is_null($request->post('kategori'))) {
            $query->where('kategori', $request->post('kategori'));
        }

        if(!is_null($request->post('terkait'))) {
            $query->where('terkait', $request->post('terkait'));
        }

        $query->orderBy('created_at', 'desc');

        $data = $query->get();
        $count = $query->count();

        print json_encode([
            "data" => $data,
            "recordsTotal" => $count,
            "recordsFiltered" => $count,
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->all();

        Kategori::create($data);

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil disimpan',
        ]);
    }
}
