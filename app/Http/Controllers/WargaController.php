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

class WargaController extends Controller
{
    public function index()
    {
        if($user = Auth::user()){
            if($user->level == '1'){
                $wargas = User::all();
            //render view with posts
            return view('wargas.index', compact('wargas'));
            }else{
                return view('pages.auth.login');
            }
        }
        
    }

    public function create()
    {
        if($user = Auth::user()){
            if($user->level == '1'){

            //render view with posts
            return view('wargas.create');
            }else{
                return redirect('pages.auth.login')->intended('login');
            }
        }
    }

    /**
     * store
     *
     * @param Request $request
     * @return void
     */
    public function store(Request $request)
    {
        try{

        
        //validate form
        $this->validate($request, [
            'nik'     => 'required|unique:wargas',
            'nokk'     => 'required|max:16'
        ]);

        //create post
        User::create([
            'nik'     => $request->nik,
            'nokk'   => $request->nokk,
            'rt'     => $request->rt,
            'rw'   => $request->rw,
            'nama'     => $request->nama,
            'jk'   => $request->jk,
            'hubungankk'   => $request->hubungankk,
            'agama'     => $request->agama,
            'pendidikan'   => $request->pendidikan,
            'pekerjaan'     => $request->pekerjaan,
            'tanggallahir'   => $request->tanggallahir,
            'tempatlahir'     => $request->tempatlahir,
            'statusperkawinan'   => $request->statusperkawinan,
            'email'     => $request->email,
            'level'     => $request->level,
            'password' => Hash::make($request->password)
        ]);
        
        //redirect to index
        return redirect()->route('wargas.index')->with(['success' => 'Data Berhasil Disimpan!']);
        }catch (ValidationException $exception) {
            $errorMessage = $exception->validator->errors()->first(); // ambil pesan error pertama dari validator
            redirect()->route('wargas.index')->with('error', 'Gagal menyimpan data. ' . $errorMessage); // tambahkan alert error
        }
    }   

    public function autocomplete(Request $request)
    {
        $term = $request->input('term');
        $users = User::where('nama', 'LIKE', '%'.$term.'%')->get();
        $data = array();
        foreach ($users as $user) {
            $data[] = array('value' => $user->nama, 'id' => $user->id);
        }
        return response()->json($data);
    }

    public function edit($id)
    {
        if($user = Auth::user()){
            if($user->level == '1'){
                $user = User::find($id);
                return view('wargas.edit', compact('user'));
            }else {
                $user = User::find($id);
                return view('clients.edit', compact('user'));
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
            $user->password = Hash::make($request->password);
            $user->save();
    
            return redirect()->route('wargas.index')->with('success', 'Data Warga Berhasil Diupdate.');
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->errors());
        }
        
    }

    public function updateWarga(Request $request, $id)
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
    
            return redirect()->route('wargas.index')->with('success', 'Data Warga Berhasil Diupdate.');
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->errors());
        }
        
    }

    public function changePassword(Request $request, $id)
    {
        try {
            $request->validate([
                'nik' => 'required|unique:wargas'
            ]);
    
            $user = User::find($id);
            $user->password = Hash::make($request->password);
            $user->save();
    
            return redirect()->route('login')->with('success', 'Data Warga Berhasil Diupdate.');
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->errors());
        }
    }

    public function show($id)
    {
        $warga = User::find($id);

        if (!$warga) {
            return abort(404);
        }

        return view('wargas.show', compact('warga'));
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect()->route('wargas.index')->with('success', 'Data berhasil dihapus.');
    }
    
    /**
     * logout
     *
     * @param  mixed $request
     * @return void
     */
    public function logout(Request $request)
    {
        $removeToken = $request->user()->tokens()->delete();

        if($removeToken) {
            return response()->json([
                'success' => true,
                'message' => 'Logout Success!',  
            ]);
        }
    }

    public function exportExcel()
    {
        return Excel::download(new WargaExport, 'warga.xlsx');
    }
}