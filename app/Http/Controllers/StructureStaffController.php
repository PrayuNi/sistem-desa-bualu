<?php

namespace App\Http\Controllers;

use App\Models\StructureStaff;
use Illuminate\Http\Request;
Use Illuminate\Support\Facades\Storage;

class StructureStaffController extends Controller
{
    public function index() {
        $structuresstaff = StructureStaff::whereIn('position',[
            'Staff Admin 1',
            'Staff Admin 2',
            'Staff Admin 3',
            'Staff Admin 4',
        ])
        ->orderByRaw("FIELD(position, 'Staff Admin 1',  'Staff Admin 2', 'Staff Admin 3', 'Staff Admin 4')")
        ->get()
        ->keyBy('position'); 
         //1.1 untuk baca semua data

        foreach ($structuresstaff as $structurestaff){
            if (!$structurestaff->image || !Storage::disk('public')->exists($structurestaff->image)) {
                $structurestaff->image = 'structure_images/default.png';
            }
        }
        return view('structurestaff.index', compact('structuresstaff')); // 1.2 untuk menampilkan halaman dari data
    }

     public function edit($id){
        $structuresstaff = StructureStaff::findOrFail($id);
        return view('structurestaff.edit-structurestaff', compact('structuresstaff'));
    }

    public function update(Request $request, $id){
        $structuresstaff = StructureStaff::findOrFail($id);
        $validated = $request->validate([
            'name'=>'required|max:20',
            'position'=>'required|max:20',
            'image'=>'nullable|max:10000|image|mimes:jpg,jpeg,png',
        ]);

        if ($request->hasFile('image')){
            if($structuresstaff->image && $structuresstaff->image !== 'structure_images/default.png'){
                Storage::disk('public')->delete($structuresstaff->image);
            }

            $originalName = time(). '_' .$request->file('image')->getClientOriginalName();
            $path = $request->file('image')->storeAs('structure_images', $originalName, 'public');
            $validated['image']=$path;
        } else {
            $validated['image'] = $structuresstaff->image;
        }

        $structuresstaff->update($validated);

        return redirect()->route('staff.index');
    }

     public function create(){
        return view('structurestaff.create-structurestaff');
    }

    public function  store(Request $request) {
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
        StructureStaff::create($validated);
        return redirect()->route('staff.index')->with('success', 'Data Berhasil Disimpan!'); //1.3 
    }
    public function delete ($id) {
        $staff = StructureStaff::findOrFail ($id);
        if ($staff->image && $staff->image !== 'structure_images/default.png'){
            Storage::disk('public')->delete($staff->image);
        }

        $staff->delete();
        return redirect()->route('staff.index')->with('success', 'Data Berhasil Dihapus!');
    }
}
