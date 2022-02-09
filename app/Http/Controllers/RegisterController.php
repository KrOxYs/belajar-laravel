<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index ()
    {
        return view('register.index',[
            "tittle" => "Register"
        ]);
    }

    public function store(Request $request)
    {
        // tangkap semua data dan tampilakn dulu isinya melalui method request 
        // apapun request nya di kirim 
         $validatedData = $request->validate([
            // gunakan | (pip) untuk rule / aturan berikutnya 
            // bisa juga menggunakan array 
            'name'=> 'required|max:255',
            'username' => ['required','min:3','max:255','unique:users'],
            'email' => 'required|email:dns|max:255|unique:users',
            'password' => 'required|min:5|max:255'
        ]);

        // lakukan enkripsi pada password 
        // cara ke 1 
        // $validatedData['password'] = bcrypt($validatedData['password']);

        // cara ke 2 
        $validatedData['password'] = Hash::make($validatedData['password']);

        // insert to database 
        User::create($validatedData);

        // membuat flash message ketika berhasil insert ke database 
        // ada 2 paramenter yatu namanya dan pesannya 
        // $request->session()->flash('succes','Registrasi Berhasil');

        return redirect('/login')->with('succes','Registrasi Berhasil,Silahkan Login');
    }
}
