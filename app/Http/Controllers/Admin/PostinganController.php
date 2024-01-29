<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Kategori;
use App\Models\Admin\Postingan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostinganController extends Controller
{
    public function index()
    {
        $data = Postingan::getAll();
        return view('admin.postingan.index', [
            'data' => $data
        ]);
    }

    // create
    public function create()
    {
        $kategori = Kategori::where('terkait', 'berita')->get();
        return view('admin.postingan.form_postingan_create', [
            'kategori' => $kategori
        ]);
    }

    // upload
    public function upload(Request $request)
    {
        if($request->hasFile('upload')) {
            $extension = $request->file('upload')->getClientOriginalExtension();
            $filename = 'post_'.time().'.'.$extension;

            $request->file('upload')->move(upload_path('files/gambar_postingan'), $filename);
 
            $url = asset('files/gambar_postingan/'.$filename);
            return response()->json(['filename' => $filename, 'uploaded' => 1, 'url' => $url]);
        }
    }

    public function store(Request $request)
    {
        // get gambar
        if($request->hasFile('gambar_postingan')) {
            $file = $request->file('gambar_postingan');
            $extension = $file->getClientOriginalExtension();
            $file_name = 'post_banner_'.time().'.'.$extension;
            $file->move(upload_path('files/gambar_postingan/banner'), $file_name);
        } else {
            $file_name = null;
        }

        $data = new Postingan();
        $data->kategori_id = $request->kategori;
        $data->judul = $request->judul;
        $data->slug = $request->slug;
        $data->konten = $request->konten;
        $data->gambar = $file_name;
        $data->status = 'Draft';
        $data->created_by = Auth::user()->id;
        $data->updated_by = Auth::user()->id;
        $data->save();

        return redirect()->route('postingan')->with('success', 'Data berhasil ditambahkan');
    }

    // edit
    public function edit($id)
    {
        $data = Postingan::find($id);
        return view('admin.postingan.form_postingan_edit', [
            'data' => $data
        ]);
    }

    // update
    public function update(Request $request)
    {
        $id = $request->id;
        // get data by id
        $data = Postingan::getById($id);
        // get gambar
        if($request->hasFile('gambar_postingan')) {
            // delete gambar lama 
            $old_pict = $data->gambar;
            if(file_exists(upload_path('files/gambar_postingan/banner/'.$old_pict))) {
                unlink(upload_path('files/gambar_postingan/banner/'.$old_pict));
            }

            // upload gambar baru
            $file = $request->file('gambar_postingan');
            $extension = $file->getClientOriginalExtension();
            $file_name = 'post_banner_'.time().'.'.$extension;
            $file->move(upload_path('files/gambar_postingan/banner'), $file_name);
        } else {
            $file_name = $data->gambar;
        }

        $data->judul = $request->judul;
        $data->slug = $request->slug;
        $data->konten = $request->konten;
        $data->gambar = $file_name;
        $data->status = 'Draft';
        $data->updated_by = Auth::user()->id;
        $data->save();

        return redirect()->route('postingan')->with('success', 'Data berhasil diubah');
    }

    // delete
    public function delete($id)
    {
        $data = Postingan::find($id);
        $data->delete();

        return redirect()->route('postingan')->with('success', 'Data berhasil dihapus');
    }
}
