<?php

namespace App\Http\Controllers;

use App\User;
use App\Tamu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class TamuController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'nohp' => 'required',
            'alamat' => 'required',
            'tujuan' => 'required'
        ]);

        Tamu::create([
            'nama' => $request->nama,
            'nohp' => $request->nohp,
            'alamat' => $request->alamat,
            'tujuan' => $request->tujuan
        ]);

        return view('pages.tamu.sukses');
    }

    public function index()
    {
        if($user = Auth::user()){
            if($user->level == '1'){
                $tamus = Tamu::all();

            //render view with posts
            return view('pages.tamu.index', compact('tamus'));
            }else{
                return redirect('pages.auth.login')->intended('login');
            }
        }
    }

    public function show($id)
    {
        $tamus = Tamu::find($id);

        if (!$tamus) {
            return abort(404);
        }

        return view('pages.tamu.detail', compact('tamus'));
    }

    public function destroy($id)
    {
        $zakat = Tamu::find($id);
        $zakat->delete();

        return redirect()->route('tamu.index')->with('success', 'Data Kunjungan Berhasil Dihapus.');
    }
}
