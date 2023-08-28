<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Dokter;
use Illuminate\Http\Request;
use App\Models\Admin\Hari;
use App\Models\Admin\Jam;

class DokterController extends Controller
{
    public function index()
    {
        $data = Dokter::getAll();
        return view('admin.dokter.index', [
            'data' => $data,
        ]);
    }

    // jadwal dokter
    public function jadwal()
    {
        return view('admin.dokter.jadwal');
    }

    // create
    public function create()
    {
        return view('admin.dokter.form_dokter_create');
    }

    // edit
    public function edit($id)
    {
        $data = Dokter::find($id);
        return view('admin.dokter.form_dokter_edit', [
            'data' => $data
        ]);
    }

    // store
    public function store(Request $request)
    {
        $file_name = null;
        if($request->hasFile('foto')){
            // get file upload
            $file = $request->file('foto');
            // get extension file
            $extension = $file->getClientOriginalExtension();
            // set nama file
            $file_name = time() . "_file_dokter_profile." . $extension;
            // set path file
            $path = public_path('files/foto-dokter');
            // upload file
            $file->move($path, $file_name);
        }

        $data = new Dokter();
        $data->nama_dokter = $request->nama;
        $data->nip = $request->nip;
        $data->spesialis = $request->spesialis;
        $data->alamat = $request->alamat;
        $data->no_telp = $request->tlp;
        $data->email = $request->email;
        $data->foto = is_null($file_name) ? $data->foto : $file_name;
        $data->save();

        return redirect()->route('dokter')
            ->with('success', 'Data berhasil ditambahkan');
    }

    // update
    public function update(Request $request)
    {
        $id = $request->id;
        $file_name = null;
        // get data by id
        $data = Dokter::getById($id);
        // update foto
        if ($request->hasFile('foto')) {
            $old_pict = $data->foto;
            // check file exists
            if (file_exists(public_path('files/foto-dokter/' . $old_pict))) {
                // delete file
                unlink(public_path('files/foto-dokter/' . $old_pict));
            }
            // get file upload
            $file = $request->file('foto');
            // get extension file
            $extension = $file->getClientOriginalExtension();
            // set nama file
            $file_name = time() . "_file_dokter_profile." . $extension;
            // set path file
            $path = public_path('files/foto-dokter');
            // upload file
            $file->move($path, $file_name);
        }

        $data = Dokter::find($id);
        $data->nama_dokter = $request->nama;
        $data->nip = $request->nip;
        $data->spesialis = $request->spesialis;
        $data->alamat = $request->alamat;
        $data->no_telp = $request->tlp;
        $data->foto = is_null($file_name) ? $data->foto : $file_name;
        $data->email = $request->email;
        $data->save();

        return redirect()->route('dokter')
            ->with('success', 'Data berhasil diupdate');
    }

    // delete data
    public function destroy($id)
    {
        $data = Dokter::find($id);
        $data->delete();

        return redirect()->route('dokter')
            ->with('success', 'Data berhasil dihapus');
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
