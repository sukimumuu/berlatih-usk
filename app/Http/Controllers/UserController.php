<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(){
        $data = User::all();
        return view('user.user-index',compact('data'), [
            'title' => 'Toko Komputer - Data User'
        ]);
    }

    public function create(){
        return view('user.user-create', [
            'title' => 'Toko Komputer - Buat User'
        ]);
    }

    public function store(Request $req){
        $validatedData = $req->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required',
        ]);

        // Membuat user baru
        User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'level' => $req->level,
            'password' => Hash::make($validatedData['password']),
        ]);

        // dd($user);
        return redirect()->route('user-index')->with('success', 'Akun berhasil dibuat ! ');

    }

    public function edit($id){
        $data = User::find($id);
        return view('user.user-edit', compact('data'), [
            'title' => 'Toko Komputer - Buat User'
        ]);
    }

    public function update(Request $req, $id){
       $data = [
            'name' => $req->name,
            'email' => $req->email,
            'password' => Hash::make($req->password),
            'level' => $req->level,
       ];
        $user = User::find($id);
        $user->update($data);
        return redirect()->route('user-index')->with('success', 'Akun berhasil diedit ! ');

    }

    public function destroy($id){
        User::find($id)->delete();
        return redirect()->route('user-index');
    }

}
