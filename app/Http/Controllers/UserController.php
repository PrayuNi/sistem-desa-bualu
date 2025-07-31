<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\View\View;

class UserController extends Controller
{
    public function create(){
        return view('user.create-user');
    }

    public function store(Request $request){
        $validated = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|string|max:100',
            'password' => 'required|min:5',
        ]);

        User::create($validated);

        // return redirect()->route('user.index')->with('success', 'Berhasil disimpan');
    }
}
