<?php

namespace App\Http\Controllers;

use App\Models\ProfilDesa;
use Illuminate\Http\Request;

class ProfilDesaController extends Controller
{
    public function index() {
        $profilsdesa = ProfilDesa::all(); //1.1 untuk baca semua data
        return view('profildesa.index', compact('profilsdesa')); // 1.2 untuk menampilkan halaman dari data
    }
     public function create(){
        return view('profildesa.create-profildesa');
    }

    public function  store(Request $request) {
        $validated = $request -> validate ([
            'sambutan_bendesa'=> 'required',
            'sejarah_desa'=> 'required',
            'visi_desa'=> 'required',
            'misi_desa'=> 'required',
            'image'=> 'image|mimes:jpg,jpeg,png', // 2.3 mengubah ukuran image jadi 10k
        ]);
        if($request->hasFile('image')){
            $originalName = time().'_'.$request->file('image')->getClientOriginalName();
            $path = $request->file('image')->storeAs('profil_images', $originalName, 'public');
            $validated['image'] = $path;
        }else {
            $validated['image'] = 'profil_images/default.png';
        }

        // 2.4 ada di profil.index
        ProfilDesa::create($validated);
        return redirect()->route('profil.index')->with('success', 'Data Berhasil Disimpan!'); //1.3 
}
}
