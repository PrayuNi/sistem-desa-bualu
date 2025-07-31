<?php

namespace App\Http\Controllers;

use App\Models\Structure;
use Illuminate\Http\Request;


class StructureController extends Controller
{
    public function create(){
        return view('structure.create-structure');
    }

    public function  store(Request $request) {
        $validate = $request -> validate ([
            'name'=> 'required|max:20',
            'position'=> 'required|max:20',
            'image'=> 'max:225',
        ]);

        Structure::create ($validate);
}
}
