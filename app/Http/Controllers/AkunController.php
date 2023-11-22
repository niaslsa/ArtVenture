<?php

namespace App\Http\Controllers;

use App\Models\Akun;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AkunController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Akun $akun)
    {
        return view('login.login');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function login(Akun $akun, Request $request)
    {
        $validatedData = $request->validate(
            [
                'username' => 'required',
                'password' => 'required',
            ],
            [
                'username.required' => 'Username wajib diisi',
                'password.required' => 'Password wajib diisi',
            ],
        );

        $credentials = [
            'username' => $validatedData['username'],
            'password' => $validatedData['password'],
        ];

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            if ($user->role == 'staff_sarana') {
                Session::regenerate();
                return redirect('/lahan');
            } else {
                return redirect('/default-route')->with('_token', Session::token());
            }
        }

        return redirect('/login')->with('error', 'Invalid credentials');
    }

    function logout()
    {
        Auth::logout();
        Session::regenerateToken();
        return redirect('/');
    }
}
