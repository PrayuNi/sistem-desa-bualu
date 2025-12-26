<?php

namespace App\Http\Controllers;

use App\Models\DataPenduduk;
use Illuminate\Http\Request;
Use Illuminate\Support\Facades\Storage;

class DataPendudukController extends Controller
{
    public function index() {
        $datapenduduk = DataPenduduk::all(); //1.1 untuk baca semua data
        return view('datapenduduk.index', compact('datapenduduk')); // 1.2 untuk menampilkan halaman dari data
    }

     public function edit($id){
        $datapenduduk = DataPenduduk::findOrFail($id);
        return view('datapenduduk.edit-datapenduduk', compact('datapenduduk'));
    }

    public function update(Request $request, $id){
        $datapenduduk = DataPenduduk::findOrFail($id);
        $validated = $request->validate([
            'penduduk'=> 'required',
            'laki_laki'=> 'required',
            'perempuan'=> 'required',
            'mutasi_penduduk'=> 'required', 
        ]);

        $datapenduduk->update($validated);

        return redirect()->route('datapenduduk.index')->with('success', 'Data Berhasil Disimpan!');
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
