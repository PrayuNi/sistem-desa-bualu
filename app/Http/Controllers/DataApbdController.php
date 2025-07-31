<?php

namespace App\Http\Controllers;

use App\Models\DataApbd;
use Illuminate\Http\Request;

class DataApbdController extends Controller
{
    public function index() {
        $dataapbd = DataApbd::all(); //1.1 untuk baca semua data
        return view('dataapbd.index', compact('dataapbd')); // 1.2 untuk menampilkan halaman dari data
    }
     public function create(){
        return view('dataapbd.create-dataapbd');
    }

    public function  store(Request $request) {
        $validated = $request -> validate ([
            'file_apbd'=> 'required',
            'pendapatan'=> 'required',
            'pengeluaran'=> 'required',
            'belanja'=> 'required',
            'surplus_defisit'=> 'required', 
        ]);
        if ($request->hasFile('file')) {
        $path = $request->file('file')->store('file_apbd', 'public');
        return "File stored at: " . $path;
    }   


        // 2.4 ada di profil.index
        DataApbd::create($validated); 
        return redirect()->route('dataapbd.index')->with('success', 'Data Berhasil Disimpan!'); //1.3 
}
}
