<?php

namespace App\Http\Controllers;

use App\Models\Structure;
use Illuminate\Http\Request;


class StructureController extends Controller
{
    public function index() {
        $structures = Structure ::all(); //1.1 untuk baca semua data
        return view('structure.index', compact('structures')); // 1.2 untuk menampilkan halaman dari data
    }
    public function create(){
        return view('structure.create-structure');
    }

    public function store(Request $request) {
        $validated = $request -> validate ([
            'name'=> 'required|max:20',
            'position'=> 'required|max:20',
            'image'=> 'max:10000|image|mimes:jpg,jpeg,png', // 2.3 mengubah ukuran image jadi 10k
        ]);
        if($request->hasFile('image')){
            $originalName = time().'_'.$request->file('image')->getClientOriginalName();
            $path = $request->file('image')->storeAs('structure_images', $originalName, 'public');
            $validated['image'] = $path;
        }else {
            $validated['image'] = 'structure_images/default.png';
        }

        // 2.4 ada di stucture.index
        Structure::create($validated);
        return redirect()->route('structure.index')->with('success', 'Data Berhasil Disimpan!'); //1.3 
}
}
