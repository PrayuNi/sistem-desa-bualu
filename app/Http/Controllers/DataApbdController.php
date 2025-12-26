<?php

namespace App\Http\Controllers;

use App\Models\Financial;
use App\Models\Population;
use App\Models\DataApbd;
use Illuminate\Http\Request;
Use Illuminate\Support\Facades\Storage;

class DataApbdController extends Controller
{
    public function index() {
        $datafinancials = Financial::all();

        $pendapatan = $datafinancials->pluck('income')->toArray(); //1.1 untuk baca semua data
        $belanja = $datafinancials ->pluck('spending')->toArray(); //1.1 untuk baca semua data
        $year =  $datafinancials ->pluck('years')->toArray(); //1.1 untuk baca semua data
        
        $financial2024 = $datafinancials->firstwhere('years', '2024');

        $yearincome = $financial2024 ?->income ?? 0; 
        $yearspending = $financial2024 ?->spending ?? 0;

        $surplus = $yearincome - $yearspending;
        // $pendapatan = Financial::all() //1.1 untuk baca semua data
        // ->pluck('income');

        // $belanja = Financial::all() //1.1 untuk baca semua data
        // ->pluck('spending');

        // $year = Financial::all() //1.1 untuk baca semua data
        // ->pluck('years');

        // $yearinc = Financial::where('years', '2024')
        // ->first();

        // $yearspend = Financial::where( 'years', '2024')
        // ->first();


        // $yearincome = $yearinc->income;

        // $yearspending = $yearspend->spending;

        // $surplus = ($yearincome - $yearspending);

        return view('dataapbd.index', compact('pendapatan', 'belanja', 'year', 'yearincome', 'yearspending', 'surplus')); // 1.2 untuk menampilkan halaman dari data
    }


    public function  store(Request $request) {
        $validated = $request -> validate ([
            'pendapatan'=> 'required',
            'pengeluaran'=> 'required',
            'belanja'=> 'required',
            'surplus_defisit'=> 'required', 
            'pdf'=> 'nullable|mimes:pdf',
        ]);
        if($request->hasFile('pdf')){
            $pdfName = time().'_'.$request->file('pdf')->getClientOriginalName();
            $pathPdf = $request->file('pdf')->storeAs('file_apbd', $pdfName, 'public');
            $validated['pdf'] = $pathPdf;
        }

        // 2.4 ada di profil.index
        DataApbd::create($validated); 
        return redirect()->route('dataapbd.index')->with('success', 'Data Berhasil Disimpan!'); //1.3 
}
        public function delete ($id) {
        $dataapbd = DataApbd::findOrFail ($id);

        if ($dataapbd->pdf && $dataapbd->pdf !== 'pdf'){
            Storage::disk('public')->delete($dataapbd->pdf);
        }

        $dataapbd->delete();
        return redirect()->route('dataapbd.index')->with('success', 'Data Berhasil Dihapus!');
    }
}
