<?php

namespace App\Http\Controllers;

use App\Models\DataPendudukTamiu;
use Illuminate\Http\Request;

class DataPendudukTamiuController extends Controller
{
    public function index() {
        $datapenduduktamiu = DataPendudukTamiu::all(); //1.1 untuk baca semua data
        // dd($datapenduduk);
        return view('datapenduduktamiu.index', compact('datapenduduktamiu')); // 1.2 untuk menampilkan halaman dari data
    }

     public function edit($id){
        $datapenduduktamiu = DataPendudukTamiu::findOrFail($id);
        return view('datapenduduktamiu.edit-datapenduduktamiu', compact('datapenduduktamiu'));
    }

    public function update(Request $request, $id){
        $datapenduduktamiu = DataPendudukTamiu::findOrFail($id);
        $validated = $request->validate([
            'penduduk'=> 'required',
            'laki_laki'=> 'required',
            'perempuan'=> 'required',
            'mutasi_penduduk'=> 'required', 
        ]);

        $datapenduduktamiu->update($validated);

        return redirect()->route('datapenduduktamiu.index')->with('success', 'Data Berhasil Disimpan!');
    }

    public function  store(Request $request) {
        $validated = $request -> validate ([
            'penduduk'=> 'required',
            'laki_laki'=> 'required',
            'perempuan'=> 'required',
            'mutasi_penduduk'=> 'required', 
        ]);
    }
}
