<?php

namespace App\Http\Controllers;

use App\Warga;
use App\User;
use App\LayananDarurat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;

class LayananDaruratController extends Controller
{
    public function index()
    {
        if($user = Auth::user()){
            if($user->level =='1'){
                $data = LayananDarurat::all();
                return view('pages.layanandarurat.index', compact('data'));
            }elseif($user->level =='2'){
                $data = LayananDarurat::all();
                return view('pages.layanandarurat.indexwarga', compact('data'));
            }else{
                return view('pages.auth.login')->intended('login');
            }
        }
    }

    public function create()
    {
        if($user = Auth::user()){
            if($user->level == '1'){
                return view('pages.layanandarurat.create');
            }else{
                return view('pages.auth.login');
            }
        }
    }

    public function store(Request $request)
    {
        if($user = Auth::user()){
            if($user->level == '1'){
                $validatedData = $request->validate([
                    'namalayanan' => 'required|string',
                    'nomorlayanan' => 'required|string',
                ]);

                $layanan = new LayananDarurat;
                $layanan->namalayanan = $request['namalayanan'];
                $layanan->nomorlayanan = $request['nomorlayanan'];
                $layanan->save();

                return redirect()->route('layanan-darurat.index')->with(['success' => 'Layanan Darurat Berhasil Dibuat!']);
            }else{
                return view('pages.auth.login');
            }
        }
    }

    public function edit($id)
    {
        if($user = Auth::user()){
            if($user->level = '1'){
                $layanan = LayananDarurat::find($id);
                return view('pages.layanandarurat.edit',compact('layanan'));
            }else{
                return view('pages.auth.login')->intended('login');
            }
        }
    }

    public function update(Request $request, $id)
    {
        try {
            if($user = Auth::user()){
                if($user->level == '1'){
                    $layanan = LayananDarurat::find($id);
                    $layanan->namalayanan = $request->namalayanan;
                    $layanan->nomorlayanan = $request->nomorlayanan;
                    $layanan->save();

                    return redirect()->route('layanan-darurat.index')->with('success', 'Data Berita Berhasil Diupdate.');
                }else{
                    return redirect('pages.auth.login')->intended('login');
                }
            }
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->errors());
        }
    }

    public function destroy($id)
    {
        if($user = Auth::user()){
            if($user->level == '1'){
                $layanan = LayananDarurat::find($id);
                $layanan->delete();

                return redirect()->route('layanan-darurat.index')->with('success', 'Data berhasil dihapus.');
            }else{
                return redirect('pages.auth.login')->intended('login');
            }
        }
    }
}
