<?php

namespace App\Http\Controllers;

use App\Models\PengajuanSurat;
use App\Models\JenisSurat;
use Illuminate\Http\Request;
Use Illuminate\Support\Facades\Storage;

class PengajuanSuratController extends Controller
{
    public function index() {
        $pengajuansurat = PengajuanSurat::all(); //1.1 untuk baca semua data
        return view('pengajuansurat.index', compact('pengajuansurat')); // 1.2 untuk menampilkan halaman dari data
    }
     public function create(){
        $jenis = JenisSurat::all();

        return view('pengajuansurat.create-pengajuansurat', compact('jenis'));
    }

    public function edit($id){
        $pengajuansurat = PengajuanSurat::findOrFail($id);
        return view('pengajuansurat.edit-pengajuansurat', compact('pengajuansurat'));
    }

    public function update(Request $request, $id){
        $pengajuansurat = PengajuanSurat::findOrFail($id);
        $validated = $request->validate([
            'name'=>'required|max:100',
            'nik'=>'required|max:20',
            'jenis_surat' =>'required|max:100',
            'no_whatsapp' =>'required|max:20',
            'tanggal_pengajuan' =>'required',
            'image'=>'nullable|image|mimes:jpg,jpeg,png,pdf',
            'status' => 'nullable | max:20',
        ]);

        if ($request->hasFile('image')){
            if($pengajuansurat->image && $pengajuansurat->image !== 'structure_images/default.png'){
                Storage::disk('public')->delete($pengajuansurat->image);
            }

            $originalName = time(). '_' .$request->file('image')->getClientOriginalName();
            $path = $request->file('image')->storeAs('structure_images', $originalName, 'public');
            $validated['image']=$path;
        } else {
            $validated['image'] = $pengajuansurat->image;
        }

        $pengajuansurat->update($validated);

        return redirect()->route('pengajuansurat.index');
    }

    public function  store(Request $request) {
        $validated = $request -> validate ([
            'name'=> 'required',
            'nik'=> 'required',
            'jenis_surat'=> 'required',
            'no_whatsapp'=> 'required',
            'tanggal_pengajuan'=> 'required',
            'image'=> 'nullable|mimes:jpg,jpeg,png,pdf',
            'status' => 'nullable|max:20',
        ]);
        if($request->hasFile('image')){
            $pdfName = time().'_'.$request->file('image')->getClientOriginalName();
            $pathPdf = $request->file('image')->storeAs('file_ktp', $pdfName, 'public');
            $validated['image'] = $pathPdf;
        }


        // 2.4 ada di profil.index
        PengajuanSurat::create($validated); 
        return redirect()->route('pengajuansurat.index')->with('success', 'Data Berhasil Disimpan!'); //1.3 
}
        public function delete ($id) {
        $pengajuansurat = PengajuanSurat::findOrFail($id);

        if ($pengajuansurat->image && $pengajuansurat->image !== 'image'){
            Storage::disk('public')->delete($pengajuansurat->image);
        }

        $pengajuansurat->delete();
        return redirect()->route('pengajuansurat.index')->with('success', 'Data Berhasil Dihapus!');
    }
}
