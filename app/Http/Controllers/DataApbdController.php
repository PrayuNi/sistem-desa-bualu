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
        $pendapatan = Financial::all() //1.1 untuk baca semua data
        ->pluck('income');

        $belanja = Financial::all() //1.1 untuk baca semua data
        ->pluck('spending');

        $year = Financial::all() //1.1 untuk baca semua data
        ->pluck('years');

        $yearinc = Financial::where('years', '2024')
        ->first();

        $yearspend = Financial::where( 'years', '2024')
        ->first();


        $yearincome = $yearinc->income;

        $yearspending = $yearspend->spending;

        $surplus = ($yearincome - $yearspending);


        $adat = Population::where('type', 'adat') //1.1 untuk baca semua data
        ->orderBy('years', 'asc')
        ->pluck('total');

        $pendatang = Population::where('type', 'pendatang') //1.1 untuk baca semua data
        ->orderBy('years', 'asc')
        ->pluck('total');


        return view('dataapbd.index', compact('pendapatan', 'belanja', 'year', 'adat', 'pendatang', 'yearinc', 'yearspend', 'surplus')); // 1.2 untuk menampilkan halaman dari data
    }
    public function create(){
        return view('dataapbd.create-dataapbd');
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
