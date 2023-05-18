<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Torann\GeoIP\Facades\GeoIP;

class LoginController extends Controller
{

    public function index() {
        if($warga = Auth::user()){
            if($warga->level == '1'){
                return redirect()->intended('dashboard');
            }elseif($warga->level == '2'){
                return redirect()->intended('warga');
            }
        }
        
        return view('pages.auth.login');
    }

    public function proses(Request $request)
    {
        $request->validate([
            'nik' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('nik', 'password');

        if (Auth::attempt($credentials)) {
           $request->session()->regenerate();
           $warga = Auth::user();
                if($warga->level == '1'){
                    return redirect()->intended('dashboard');
                }elseif($warga->level == '2'){
                    return redirect()->intended('wargadashboard');
                }
            return redirect()->intended('dashboard');    
        }

        return back()->withErrors([
            'nik' => 'nik Atau Password Salah'
        ])->onlyInput('nik');
    }

    public function logout(Request $request)
    {
        Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();

        return redirect('/');
    }
}