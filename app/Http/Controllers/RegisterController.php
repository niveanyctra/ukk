<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index()
    {
        return view('pages.register');
    }

    public function register(Request $request)
    {
        $request->validate(
            [
                'username' => 'required|max:255|unique:users,username',
                'password' => 'required|max:255',
                'email' => 'required|email|unique:users,email',
                'nama' => 'required|max:255',
                'alamat' => 'required',
            ],
            [
                'username.required' => 'Username harus diisi',
                'password.required' => 'Password harus diisi',
                'email.required' => 'Email harus diisi',
                'nama.required' => 'Nama harus diisi',
                'alamat.required' => 'Alamat harus diisi',
                'username.max' => 'Username hanya boleh diisi 225 karakter',
                'password.max' => 'Password hanya boleh diisi 225 karakter',
                'nama.max' => 'Nama hanya boleh diisi 225 karakter',
                'username.unique' => 'Username sudah dipakai',
                'email.unique' => 'Email sudah dipakai',
            ]
        );

        User::create([
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'nama' => $request->nama,
            'email' => $request->email,
            'alamat' => $request->alamat,
        ]);

        return redirect()->route('login')->withSuccess('Pengguna berhasil ditambahkan!');
    }
}
