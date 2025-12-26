<?php

namespace App\Http\Controllers;

use App\Models\ProfilDesa;
use Illuminate\Http\Request;
Use Illuminate\Support\Facades\Storage;

class ProfilDesaController extends Controller
{
    public function index() {
        $profilsdesa = ProfilDesa::all(); //1.1 untuk baca semua data
        return view('profildesa.index', compact('profilsdesa')); // 1.2 untuk menampilkan halaman dari data
    }

    public function edit($id){
        $profilsdesa = ProfilDesa::findOrFail($id);
        return view('profildesa.edit-profildesa', compact('profilsdesa'));
    }

    public function update(Request $request, $id){
        $profilsdesa = ProfilDesa::findOrFail($id);
        $validated = $request->validate([
             'name' => 'sometimes|max:100',
             'sambutan_bendesa' => 'sometimes|max:5000',
             'sejarah_desa'=> 'sometimes|max:5000',
             'visi_desa' => 'sometimes|max:1000',
             'misi_desa'=> 'sometimes|max:1000',
             'image' => 'nullable|max:10000|image|mimes:jpg,jpeg,png', 
        ]);

        if ($request->hasFile('image')){
            if($profilsdesa->image && $profilsdesa->image !== 'profil_images/default.png'){
                Storage::disk('public')->delete($profilsdesa->image);
            }
            $originalName = time(). '_' .$request->file('image')->getClientOriginalName();
            $path = $request->file('image')->storeAs('profil_images', $originalName, 'public');
            $validated['image']=$path;
        } else {
            $validated['image'] = $profilsdesa->image;
        }

        $profilsdesa->update($validated);

        return redirect()->route('profil.index')->with('success', 'Data Berhasil Disimpan!');
    }

    public function  store(Request $request) {
        $validated = $request -> validate ([
            'name'=> 'required',
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

    }

    public function delete ($id) {
        $profilsdesa = ProfilDesa::findOrFail ($id);
            if ($profilsdesa->image && $profilsdesa->image !== 'profil_images/default.png'){
                Storage::disk('public')->delete($profilsdesa->image);
            }

        $profilsdesa->delete();
        return redirect()->route('profil.index')->with('success', 'Data Berhasil Dihapus!');
    }

}

