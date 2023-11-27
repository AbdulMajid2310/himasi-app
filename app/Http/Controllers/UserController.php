<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function profile()
    {
        // return User::where('nim', auth()->user()->nim)->first();

        // return auth()->user()->student->name;
        // return Student::where('username', auth()->user()->username)->first();
        return view('user.index', [
            'title' => "Profile",
            'active' => "profile",
            'user' =>  User::where('nim', auth()->user()->nim)->first()
        ]);
    }
}
