<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Promo;
use Illuminate\Http\Request;

class PromoController extends Controller
{
    public function promotion($slug)
    {
        $data = Promo::where("slug", $slug)->first();
        $all_promotions = Promo::all();
        return view('compro.post.promotion', [
            'data'=> $data, 
            'all_promo' => $all_promotions
        ]);
    }
    public function list()
    {
        $promo = Promo::all();
        return view("admin.promotion.index", [
            'data' => $promo,
        ]);
    }

    public function create()
    {
        return view('admin.promotion.form_promo_create');
    }

    public function store(Request $request)
    {
        if($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $extension = $file->getClientOriginalExtension();
            $file_name = 'promo_'.time().'.'.$extension;
            $file->move(public_path('files/gambar_promo/'), $file_name);
        } else {
            $file_name = null;
        }

        $promo = new Promo();
        $promo->judul = $request->promo;
        $promo->slug = $request->slug;
        $promo->gambar = $file_name;
        $promo->konten = $request->konten;
        $promo->deadline = $request->deadline;

        $store = $promo->save();

        if ($store) {
            return redirect()->route('listPromo')
                ->with([
                    'success' => true, 
                    'message' => 'Data berhasil ditambahkan'
                ]);
        } else {
            return redirect()->route('listPromo')
                ->with([
                    'success' => false,
                    'message' => 'Data gagal ditambahkan'
                ]);
        }
    }
}
