<?php

namespace App\Http\Controllers;

use App\Warga;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;

class WargaUpdateController extends Controller
{
    public function edit($id)
    {
        if($user = Auth::user()){
            if($user->level == '2'){
                $user = User::find($id);
                return view('clients.edit', compact('user'));
            }else {
                return redirect('login.index')->intended('login');
            }
        }
    }

    /**
     * Update the user's profile information.
     */
    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'nik' => 'required|unique:wargas'
            ]);
    
            $user = User::find($id);
            $user->nik = $request->nik;
            $user->nokk = $request->nokk;
            $user->rt = $request->rt;
            $user->rw = $request->rw;
            $user->nama = $request->nama;
            $user->level = $request->level;
            $user->jk = $request->jk;
            $user->hubungankk = $request->hubungankk;
            $user->agama = $request->agama;
            $user->pendidikan = $request->pendidikan;
            $user->pekerjaan = $request->pekerjaan;
            $user->tanggallahir = $request->tanggallahir;
            $user->tempatlahir = $request->tempatlahir;
            $user->statusperkawinan = $request->statusperkawinan;
            $user->email = $request->email;
            $user->save();
    
            return redirect()->route('myprofile.index')->with('success', 'Data Anda Berhasil Diupdate.');
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->errors());
        }
        
    }
}
