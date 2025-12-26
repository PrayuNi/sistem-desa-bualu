<?php

namespace App\Http\Controllers;

use App\Models\PengajuanSurat;
use App\Models\JenisSurat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class PengajuanSuratController extends Controller
{
    public function index() {
    $jenis = JenisSurat::all();
    $user = Auth::user();

    if ($user->role == 0) {
        // Admin: tampilkan semua pengajuan
        $pengajuansurat = PengajuanSurat::all();
    } elseif (in_array($user->role, [1,2])) {
        // User biasa: tampilkan pengajuan sesuai NIK
        $pengajuansurat = PengajuanSurat::where('nik', $user->nik)->get();
    } else {
        $pengajuansurat = collect(); // kosong jika role lain
    }

    return view('pengajuansurat.index', compact('pengajuansurat', 'jenis'));
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
            'tanggal_lahir' =>'required',
            'jenis_kelamin'=>'required|max:100',
            'alamat'=>'required|max:200',
            'nik'=>'required|max:20',
            'jenis_surat' =>'required|max:100',
            'no_whatsapp' =>'required|max:20',
            'tanggal_pengajuan' =>'required',
            'image'=>'nullable |mimes:jpg,jpeg,png,pdf',
            // 'print_able'=>'required|max:200',
            'status' => 'nullable | max:20',
        ]);

        if ($request->hasFile('image')){
            if($pengajuansurat->image && $pengajuansurat->image !== 'ktp_images/default.png'){
                Storage::disk('public')->delete($pengajuansurat->image);
            }

            $originalName = time(). '_' .$request->file('image')->getClientOriginalName();
            $path = $request->file('image')->storeAs('ktp_images', $originalName, 'public');
            $validated['image']=$path;
        } else {
            $validated['image'] = $pengajuansurat->image;
        }
    
        $pengajuansurat->update($validated);

        return redirect()->route('pengajuansurat.index')->with('success', 'Data Berhasil Disimpan!');
        }

    public function  store(Request $request) {
        $data =[
            'name' => $request-> name,
            'tanggal_lahir' =>$request-> tanggal_lahir,
            'jenis_kelamin'=>$request-> jenis_kelamin,
            'alamat'=> $request-> alamat,
            'nik' => Auth::user()->nik,
            'jenis_surat'=> $request-> jenis_surat,
            'no_whatsapp'=> $request-> no_whatsapp ,
            'tanggal_pengajuan'=> $request-> tanggal_pengajuan ,
            'image'=> $request-> image,
            'print_able'=> JenisSurat::all()->where('jenis', $request-> jenis_surat)->first()->print_able,
            'status' => $request-> status,
        ];
      
        if($request->hasFile('image')){
            $pdfName = time().'_'.$request->file('image')->getClientOriginalName();
            $pathPdf = $request->file('image')->storeAs('ktp_images', $pdfName, 'public');
            $validated['image'] = $pathPdf;
        }
        PengajuanSurat::create($data);

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

    public function print($id)
{
        $data = PengajuanSurat::findOrFail($id);
        $data_jenis = JenisSurat::all()->where('jenis', $data->jenis_surat)->first();

        $pdf = \PDF::loadView('pengajuansurat.surat-pdf', compact('data', 'data_jenis'))
            ->setPaper('A4', 'potrait');

        return $pdf->stream('surat-'.$data->name.'.pdf');
        }
}
