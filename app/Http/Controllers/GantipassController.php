<?php

namespace App\Http\Controllers;

use App\Warga;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class GantipassController extends Controller
{
    public function edit($id)
    {
        if($user = Auth::user()){
            if($user->level == '1'){
                $user = User::find($id);
                return view('wargas.edit', compact('user'));
            }else {
                $user = User::find($id);
                return view('clients.changepass', compact('user'));
            }
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'nik' => 'required|unique:wargas'
            ]);
    
            $user = User::find($id);
            $user->password = Hash::make($request->password);
            $user->save();
    
            return redirect('/')->with('success', 'Password Berhasil Diganti, Silahkan Login Dengan Password Baru.');
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->errors());
        }
    }
}
