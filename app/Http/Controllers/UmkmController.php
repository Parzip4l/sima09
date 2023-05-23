<?php

namespace App\Http\Controllers;

use App\Warga;
use App\User;
use App\Umkm;
use App\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UmkmController extends Controller
{
    public function index()
    {
        if($user = Auth::user()){
            if($user->level == '1'){
                $data = Umkm::all();
                return view ('pages.umkm.index', compact('data'));
            }else{
                return redirect('login.index');
            }
        }
        
    }

    public function create()
    {
        if($user = Auth::user()){
            if($user->level == '1'){

            //render view with posts
            return view('pages.umkm.create');
            }else{
                return redirect('pages.auth.login')->intended('login');
            }
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'namatoko' => 'required',
            'namapemilik' => 'required'
        ]);
        
        $umkm = new Umkm();
        $umkm->namatoko = $request->input('namatoko');
        $umkm->namapemilik = $request->input('namapemilik');
        $umkm->nomorhp = $request->input('nomorhp');
        $umkm->alamattoko = $request->input('alamattoko');
        $umkm->deskripsi = $request->input('deskripsi');
        $umkm->jenistoko = $request->input('jenistoko');
        $umkm->website = $request->input('website');
        $umkm->instagram = $request->input('instagram');
        $umkm->facebook = $request->input('facebook');
        $umkm->twitter = $request->input('twitter');
        $umkm->gojek = $request->input('gojek');
        $umkm->shopee = $request->input('shopee');
        $umkm->grab = $request->input('grab');
        $umkm->whatsapp = $request->input('whatsapp');
        $umkm->save();

        $new_value = $umkm->attributesToArray();  

        $namauser = Auth::user()->nama;
        Log::create([
            'action' => 'Create',
            'model' => 'umkm',
            'user_id' => auth()->id(),
            'user_name' => $namauser,
            'new_values' => json_encode($new_value)
        ]);
        
        return redirect()->route('umkm.index')->with('success','UMKM berhasil ditambahkan.');
    }

    public function edit()
    {

    }

    public function update()
    {

    }

    public function destroy($id)
    {
        $umkm = Umkm::find($id);
        $old_value = $umkm->attributesToArray();
        $umkm->delete();
        $namauser = Auth::user()->nama;
        Log::create([
            'action' => 'Delete',
            'model' => 'umkm',
            'user_id' => auth()->id(),
            'user_name' => $namauser,
            'old_values' => json_encode($old_value)
        ]);

        return redirect()->route('umkm.index')->with('success', 'Data berhasil dihapus.');
    }
}
