<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\View\View;

class UserController extends Controller
{
    public function index() {
        $user = User::all(); //1.1 untuk baca semua data
        return view('user.index', compact('user')); // 1.2 untuk menampilkan halaman dari data
    }
    public function create(){
        return view('user.create-user');
    }

    public function store(Request $request){
        $validated = $request->validate([
            'name' => 'required|max:255',
            'tempat_tanggallahir' => 'required|max:255',
            'alamat' => 'required|max:255',
            'password' => 'required|min:5',
            'email' => 'required|string|max:100',
        ]);

        User::create($validated);

        return redirect()->route('user.index')->with('success', 'Berhasil disimpan');
    }
        public function delete ($id) {
        $user = User::findOrFail ($id);

        $user->delete();
        return redirect()->route('user.index')->with('success', 'Data Berhasil Dihapus!');
}
}
