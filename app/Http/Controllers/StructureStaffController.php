<?php

namespace App\Http\Controllers;

use App\Models\StructureStaff;
use Illuminate\Http\Request;

class StructureStaffController extends Controller
{
     public function create(){
        return view('structurestaff.create-structurestaff');
    }

    public function  store(Request $request) {
        $validate = $request -> validate ([
            'name'=> 'required|max:20',
            'position'=> 'required|max:20',
            'image'=> 'max:225',
        ]);

        StructureStaff::create ($validate);
}
}
