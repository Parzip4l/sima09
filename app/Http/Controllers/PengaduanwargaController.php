<?php

namespace App\Http\Controllers;

use App\User;
use App\Pengaduan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class PengaduanwargaController extends Controller
{
    public function index()
    {
        if($user = Auth::user()){
            if($user->level == '2'){
                $pengaduans = Pengaduan::where('nik', $user->nik)->get();

                return view('pages.pengaduan.clients', compact('pengaduans'));
            }else{
                return redirect('pages.auth.login')->intended('login');
            }
        }   
    }
}
