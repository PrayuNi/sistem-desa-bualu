<?php

namespace App\Http\Controllers;

use App\Models\JenisSurat;
use Illuminate\Http\Request;
Use Illuminate\Support\Facades\Storage;

class JenisSuratController extends Controller
{
    public function index() {
        $jenissurats = JenisSurat::all(); //1.1 untuk baca semua data
        return view('jenissurat.index', compact('jenissurats')); // 1.2 untuk menampilkan halaman dari data
    }

    public function create(){
        return view('jenissurat.create-jenissurat');
    }

    public function edit($id){
    $jenissurats = JenisSurat::findOrFail($id);
        return view('jenissurat.edit-jenissurat', compact('jenissurats'));
    }
    public function update(Request $request, $id){
        // dd($request->all());
    $jenissurats = JenisSurat::findOrFail($id);

    $validated = $request->validate([
        'jenis' => 'required|max:100|unique:jenis_surat,jenis,' . $id . ',id',
        'print_able'   => 'required|max:100',
        'judul'        => 'required',
        'pendahuluan'  => 'required',
        'penutup'      => 'required',
    ]);

    $jenissurats->update($validated);

    return redirect()->route('jenissurat.index')->with('success', 'Data berhasil disimpan!');
}

    public function store(Request $request) {
        $validated = $request->validate ([
            'jenis'=> 'required',
            'print_able'=>'required',
            'judul'=>'required',
            'pendahuluan'=>'required',
            'penutup'=>'required',
        ]);

    // 2.4 ada di profil.index
        JenisSurat::create($validated); 
        return redirect()->route('jenissurat.index')->with('success', 'Data Berhasil Ditambah!'); //1.3 
    }

    public function delete($id) {
        $jenis=JenisSurat::findOrFail($id);
        $jenis->delete();
        return redirect()->route('jenissurat.index')->with('success', 'Data Berhasil Dihapus!');
    }    
}
