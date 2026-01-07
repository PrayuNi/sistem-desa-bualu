<?php

namespace App\Http\Controllers;

use App\Models\PengajuanSurat;
use App\Models\JenisSurat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;

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

        if (Auth::user()->role != 0) {
            $validated['nik'] = Auth::user()->nik;
        }

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
        //Validasi form terlebih dahulu
        $request->validate([
            'name' => 'required',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'nik' => 'required',
            'jenis_surat' => 'required',
            'no_whatsapp' => 'required',
            'tanggal_pengajuan' => 'required|date',
            'image' => 'required|image|max:2048',
        ], [
            'name.required' => 'Nama wajib diisi!',
            'tanggal_lahir.required' => 'Tanggal lahir wajib diisi!',
            'jenis_kelamin.required' => 'Jenis kelamin wajib dipilih!',
            'alamat.required' => 'Alamat wajib diisi!',
            'nik.required' => 'NIK wajib diisi!',
            'jenis_surat.required' => 'Jenis surat harus dipilih!',
            'no_whatsapp.required' => 'Nomor WhatsApp wajib diisi!',
            'tanggal_pengajuan.required' => 'Tanggal pengajuan wajib diisi!',
            'image.required' => 'Foto KTP wajib diisi!',
        ]);

        // Ambil print_able dengan aman
        $jenis = JenisSurat::whereRaw('LOWER(jenis) = ?', [strtolower($request->jenis_surat)])->first();

        if (!$jenis) {
            return redirect()->back()->withErrors(['jenis_surat' => 'Jenis surat tidak valid!'])->withInput();
        }

        $data = [
            'name' => $request->name,
            'tanggal_lahir' => $request->tanggal_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat' => $request->alamat,
            // 'nik' => Auth::user()->nik,
            'nik' => $request->nik,
            'jenis_surat' => $request->jenis_surat,
            'no_whatsapp' => $request->no_whatsapp,
            'tanggal_pengajuan' => $request->tanggal_pengajuan,
            'image' => $request->image,
            'print_able' => $jenis->print_able, // aman, pasti ada
            'status' => $request->status ?? 'pending',
        ];

        if (Auth::user()->role != 0) {
            $data['nik'] = Auth::user()->nik;
        }

        if($request->hasFile('image')){
            $imageName = time().'_'.$request->file('image')->getClientOriginalName();
            $pathImage = $request->file('image')->storeAs('ktp_images', $imageName, 'public');
            $data['image'] = $pathImage; // pastikan simpan ke $data
        } else {
            $data['image'] = null; // atau default.png
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

    public function print($id) {
        $data = PengajuanSurat::findOrFail($id);
        $data_jenis = JenisSurat::where('jenis', $data->jenis_surat)->first();

        $pdf = Pdf::loadView('pengajuansurat.surat-pdf', compact('data', 'data_jenis'))
            ->setPaper('A4', 'portrait');

        return $pdf->stream('surat-'.$data->name.'.pdf');
    }

}
