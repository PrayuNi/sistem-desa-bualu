<?php

namespace App\Http\Controllers;

use App\Models\Structure;
use Illuminate\Http\Request;
Use Illuminate\Support\Facades\Storage;


class StructureController extends Controller
{
    public function index() {
        $structures = Structure::whereIn('position_id',[
            '0', //Kepala Desa
            '1', //Wakil Kepala Desa
            '2', //Sekretaris Desa
            '3', //Bendahara 1
            '5', //Baga Parahyangan
            '6', //Baga Parahyangan
            '9', //Baga Palemahan
            '10', //Baga Palemahan
            '13', //Baga Pawongan
            '14', //Baga Pawongan
        ])
        ->orderByRaw ("FIELD(position_id, '0',  '1', '2', '3','4')")
        ->get()
        ->keyBy('position_id'); 
         //1.1 untuk baca semua data

        foreach ($structures as $structure){
            if (!$structure->image || !Storage::disk('public')->exists($structure->image)) {
                $structure->image = 'structureprejuru_images/default.png';
            }
        }
        return view('structure.index', compact('structures')); // 1.2 untuk menampilkan halaman dari data
    }

    public function tabelStructure()
    {
        $structures = Structure::whereIn('position_id', [
            '0','1','2','3','5',
            '9','10','13','14'
        ])
        ->orderBy('position_id')
        ->get();

        $structures = Structure::all();

        foreach ($structures as $structure){
            if (!$structure->image || !Storage::disk('public')->exists($structure->image)) {
                $structure->image = 'structureprejuru_images/default.png';
            }
        }
        return view('structure.tabel-structure', compact('structures'));
    }
    
    public function edit($id){
        $structure = Structure::findOrFail($id);
        return view('structure.edit-structure', compact('structure'));
    }

    public function update(Request $request, $id){
        $structure = Structure::findOrFail($id);
        $validated = $request->validate([
            'name'=>'required',
            'position'=>'required',
            'image'=>'nullable|max:1000|image|mimes:jpg,jpeg,png',
        ]);

        if ($request->hasFile('image')){
            if($structure->image && $structure->image !== 'structureprejuru_images/default.png'){
                Storage::disk('public')->delete($structure->image);
            }

            $originalName = time(). '_' .$request->file('image')->getClientOriginalName();
            $path = $request->file('image')->storeAs('structureprejuru_images', $originalName, 'public');
            $validated['image']=$path;
        } else {
            $validated['image'] = $structure->image;
        }

        $structure->update($validated);

        return redirect()->route('structure.index')->with('success', 'Data Berhasil Disimpan!');
    }

    public function store(Request $request) {
        $validated = $request -> validate ([
            'name'=> 'required',
            'position'=> 'required',
            'position_id'=> 'required',
            'image'=> 'max:10000|image|mimes:jpg,jpeg,png', // 2.3 mengubah ukuran image jadi 10k
        ]);
        if($request->hasFile('image')){
            $originalName = time().'_'.$request->file('image')->getClientOriginalName();
            $path = $request->file('image')->storeAs('structureprejuru_images', $originalName, 'public');
            $validated['image'] = $path;
        }else {
            $validated['image'] = 'structureprejuru_images/default.png';
        }
    }
}