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
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $userRole = Auth::user()->role;

            if ($userRole == 'super_admin') {
                return redirect()->to('/dashboard');
            } elseif ($userRole == 'mitra') {
                return redirect()->to('/mitra');
            } elseif ($userRole == 'jurnalis') {
                return redirect()->to('/berita');
            } elseif ($userRole == 'staff_ticketing') {
                return redirect()->to('/stafftiketing');
            } elseif ($userRole == 'staff_sarana') {
                return redirect()->to('/lahan');
            }
        }
        
    }
    function logout()
        {
            Auth::logout();
            Session::regenerateToken();
            return redirect('/login');
        }
    }
