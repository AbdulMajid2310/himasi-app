<?php

namespace App\Http\Controllers;

use App\Jobs\VerifikasiEmail;
use App\Models\Student;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register.index', [
            'active' => '',
            'title' => 'register'
        ]);
    }
    public function store(Request $request)
    {

        // validasi input dari front
        $validated = $request->validate([
            'name' => 'required|max:255',
            'nim' => 'required|min:8|max:10|unique:users',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required_with:confirm-password|same:confirm-password',
        ]);

        // hashing password
        $validated['password'] = Hash::make($validated['password']);

        // generate username
        $validated['username'] = $this->generateUsername($request->name);

        // create user
        $user = User::create($validated);

        // create student
        Student::create($validated);

        // login
        Auth::login($user);

        // mnegirim email dengan antrian
        VerifikasiEmail::dispatch($user);

        //
        return redirect('/email/verify')->with(['success' => 'Registrasi Berhasil']);
    }

    public function generateUsername($name)
    {
        // Menghilangkan karakter non-alfanumerik dari nama dan mengubahnya menjadi huruf kecil
        $cleanName = preg_replace('/[^a-zA-Z0-9]/', '', strtolower($name));

        // Mencari tahu berapa banyak pengguna dengan username yang sama atau mirip
        $count = User::count();

        // Jika ada pengguna dengan username yang sama, tambahkan nomor di belakang
        $username = $count ? $cleanName . $count : $cleanName;
        return $username;
    }

    public function complitePersonalData()
    {
        // dd(auth()->user()->student->updated_at);
        // dd(auth()->user()->student->created_at);
        if (auth()->user()->student->updated_at != auth()->user()->student->created_at) {
            return redirect('/');
        }

        // return auth()->user()->name;
        return view('register.lengkapi', [
            'active' => '',
            'title' => 'register',
            'user' => auth()->user()
        ]);
    }

    public function storePersonalData(Request $request, Student $student)
    {

        $validatedData = $request->validate([

            'name' => 'required',
            'nim' => 'required',
            'semester' => 'required|max:2',
            'prodi' => 'required',
            'asal_kampus' => 'required',
            'no_tlp' => 'required|min:10|numeric',
        ]);
        Student::where('nim', $student->nim)->update($validatedData);
        return redirect('/mahasiswa');
    }
}
