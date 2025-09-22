<?php

namespace App\Http\Controllers;

use App\Models\JenisSurat;
use Illuminate\Http\Request;
Use Illuminate\Support\Facades\Storage;

class JenisSuratController extends Controller
{
    public function index() {
        $jenissurat = JenisSurat::all(); //1.1 untuk baca semua data
        return view('jenissurat.index', compact('jenissurat')); // 1.2 untuk menampilkan halaman dari data
    }

    public function create(){
        return view('jenissurat.create-jenissurat');
    }

    public function edit($id){
        $jenissurat = JenisSurat::findOrFail($id);
        return view('jenissurat.edit-jenissurat', compact('jenissurat'));
    }

    public function update(Request $request, $id){
        $jenissurat = JenisSurat::findOrFail($id);
        $validated = $request->validate([
            'jenis'=>'required|max:100',
        ]);

        $jenissurat->update($validated);

        return redirect()->route('jenissurat.index');
    }

    public function store(Request $request) {
        $validated = $request->validate ([
            'jenis'=> 'required',
        ]);

    // 2.4 ada di profil.index
        JenisSurat::create($validated); 
        return redirect()->route('jenissurat.index')->with('success', 'Data Berhasil Disimpan!'); //1.3 
    }

    public function delete($id) {
        $jenis=JenisSurat::findOrFail($id);
        $jenis->delete();
        return redirect()->route('jenissurat.index')->with('success', 'Data Berhasil Dihapus!');
    }
        
}
