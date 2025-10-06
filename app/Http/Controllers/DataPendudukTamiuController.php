<?php

namespace App\Http\Controllers;

use App\Models\DataPendudukTamiu;
use Illuminate\Http\Request;

class DataPendudukTamiuController extends Controller
{
    public function index() {
        $datapenduduk = DataPendudukTamiu::all(); //1.1 untuk baca semua data
        // dd($datapenduduk);
        return view('datapenduduk.index', compact('datapenduduk')); // 1.2 untuk menampilkan halaman dari data
    }

     public function edit($id){
        $datapenduduk = DataPendudukTamiu::findOrFail($id);
        return view('datapenduduk.edit-datapenduduk', compact('datapenduduk'));
    }

    public function update(Request $request, $id){
        $datapenduduk = DataPendudukTamiu::findOrFail($id);
        $validated = $request->validate([
             'penduduk'=> 'required',
            'laki-laki'=> 'required',
            'perempuan'=> 'required',
            'mutasi_penduduk'=> 'required', 
        ]);

        $datapenduduk->update($validated);

        return redirect()->route('datapenduduk.index');
    }

     public function create(){
        return view('datapenduduk.create-datapenduduk');
    }

    public function  store(Request $request) {
        $validated = $request -> validate ([
            'penduduk'=> 'required',
            'laki-laki'=> 'required',
            'perempuan'=> 'required',
            'mutasi_penduduk'=> 'required', 
        ]);


        // 2.4 ada di datapenduduk.index
        DataPendudukTamiu::create($validated); 
        return redirect()->route('datapenduduk.index')->with('success', 'Data Berhasil Disimpan!'); //1.3 
    }
}
