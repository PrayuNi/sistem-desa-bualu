<?php

namespace App\Http\Controllers;

use App\Models\Financial;
use App\Models\Population;
use Illuminate\Http\Request;
Use Illuminate\Support\Facades\Storage;

class DashboardController extends Controller
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


        return view('dashboard', compact('pendapatan', 'belanja', 'year', 'adat', 'pendatang', 'yearinc', 'yearspend', 'surplus')); // 1.2 untuk menampilkan halaman dari data
    }
    public function listpopulation(){
        $datapopulations = Population::all();
        return view('population.index', compact('datapopulations'));
    }

    public function editpopulation($id){
        $item = Population::findOrFail($id);
        return view('population.edit', compact('item'));
    }

    public function updatepopulation(Request $request, $id){
        $item = Population::findOrFail($id);
        $validated = $request->validate([
            'type'=>'required|max:20',
            'years'=>'required|max:20',
            'total'=>'required|max:20',
        
        ]);
        $item->update($validated);
        return redirect()->route('population.index');
    }

    // Data Financial
        public function listfinancial(){
        $datafinancials = Financial::all();
        return view('financial.index', compact('datafinancials'));
    }

    public function editfinancial($id){
        $item = Financial::findOrFail($id);
        return view('financial.edit', compact('item'));
    }

    public function updatefinancial(Request $request, $id){
        $item = Financial::findOrFail($id);
        $validated = $request->validate([
            'type'=>'required|max:20',
            'years'=>'required|max:20',
            'nominal'=>'required|max:20',
        
        ]);
        $item->update($validated);
        return redirect()->route('financial.index');
    }
}
   
