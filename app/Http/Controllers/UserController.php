<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\View\View;
use Illuminate\Support\Facades\Hash;

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
            'nik' => 'required|max:255',
            'password' => 'required|min:8',
            'email' => 'required|email|max:100',
        ]);

        User::create($validated);

        return redirect()->route('user.index')->with('success', 'Berhasil disimpan');
    }

        public function edit($id){
            $user = User::findOrFail($id);
            return view('user.edit-user', compact('user'));
        }

        public function update(Request $request, $id){
            $user = User::findOrFail($id);
            $validated = $request->validate([
                'name' => 'required|max:255',
                'nik' => 'required|max:255',
                'password' => 'required|min:8',
                'email' => 'required|email|max:100',
            ]);

            $userdata = User::create ([
                'name' => $request->name,
                'nik' => $request->nik,
                'password' => Hash::make($request->password),
                'email' => $request->email,
                'role' => 2
            ]);

            dd($userdata);

        $user->update($userdata);

        return redirect()->route('user.index')->with('success', 'Data Berhasil Disimpan!');
    }

        public function delete ($id) {
        $user = User::findOrFail ($id);

        $user->delete();
        return redirect()->route('user.index')->with('success', 'Data Berhasil Dihapus!');
}
}
