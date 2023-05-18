<?php

namespace App\Http\Controllers;

use App\CatatanKematian;
use App\User;
use App\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class CatatanKematianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if($user = Auth::user()){
            if($user->level == '1'){
                $mati = CatatanKematian::all()->take(10);
            //render view with posts
            return view('pages.kematian.index', compact('mati'));
            }else{
                return view('pages.auth.login');
            }
        }
    }

    public function pindah(Request $request)
    {
        $warga_ids = $request->nik;

        foreach($warga_ids as $warga_id) {
            $warga = User::find($warga_id);

            $catatan_kematian = new CatatanKematian;
            $catatan_kematian->warga_id = $warga->nik;
            $catatan_kematian->warga_id = $warga->nokk;
            $catatan_kematian->warga_id = $warga->nama;
            $catatan_kematian->warga_id = $warga->tanggallahir;
            $catatan_kematian->warga_id = $warga->agama;
            $catatan_kematian->warga_id = $warga->jk;
            $catatan_kematian->warga_id = $warga->rt;
            $catatan_kematian->warga_id = $warga->rw;
            $catatan_kematian->tanggal_kematian = now()->format('Y-m-d');
            $catatan_kematian->save();
        }

        return response()->json(['message' => 'Data berhasil dipindahkan.']);
    }

    public function wargapage()
    {
        if($user = Auth::user()){
            if($user->level == '2'){
                $data = CatatanKematian::all();
                $count = count($data);
                //render view with posts
                return view('pages.kematian.indexwarga', compact('data','count'));
            }else{
                return redirect('login.index')->intended('login');
            }
        }
    }

    public function autocomplete(Request $request)
    {
        $term = $request->input('term');
        $users = User::select('id', 'nama', 'nik', 'nokk', 'jk', 'rt', 'rw', 'tanggallahir', 'agama')
            ->where('nama', 'LIKE', '%' . $term . '%')
            ->get();
        
        $response = array();
        foreach($users as $user){
            $response[] = array(
                'id' => $user->id,
                'value' => $user->nama,
                'nik' => $user->nik,
                'nokk' => $user->nokk,
                'jk' => $user->jk,
                'agama' => $user->agama,
                'rt' => $user->rt,
                'rw' => $user->rw,
                'tanggallahir' => $user->tanggallahir
            );
        }
        
        return response()->json($response);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if($user = Auth::user()){
            if($user->level == '1'){
            //render view with posts
            return view('pages.kematian.create');
            } else if($user->level == '2') {
                return view('pages.kematian.createwarga');
            }
        }else{
            return view('pages.auth.login');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($user = Auth::user()){
            if($user->level == '1'){
                try{
                    //validate form
                    $this->validate($request, [
                        'nik'     => 'required|unique:wargas',
                        'nokk'     => 'required|max:16'
                    ]);
                    
                    //create post
                    CatatanKematian::create([
                        'nik'     => $request->nik,
                        'nokk'   => $request->nokk,
                        'rt'     => $request->rt,
                        'rw'   => $request->rw,
                        'nama'     => $request->nama,
                        'jk'   => $request->jk,
                        'agama'     => $request->agama,
                        'tanggallahir'   => $request->tanggallahir,
                        'tanggalmeninggal'   => $request->tanggalmeninggal,
                    ]);
        
                    User::where('nik', $request->nik)->delete();
            
                    //redirect to index
                    return redirect()->route('catatan-kematian.index')->with(['success' => 'Data Berhasil Disimpan!']);
                    }catch (ValidationException $exception) {
                        $errorMessage = $exception->validator->errors()->first(); // ambil pesan error pertama dari validator
                        redirect()->route('catatan-kematian')->with('error', 'Gagal menyimpan data. ' . $errorMessage); // tambahkan alert error
                    }
            }else{
                try{
                    //validate form
                    $this->validate($request, [
                        'nik'     => 'required|unique:wargas',
                        'nokk'     => 'required|max:16'
                    ]);
                    
                    //create post
                    CatatanKematian::create([
                        'nik'     => $request->nik,
                        'nokk'   => $request->nokk,
                        'rt'     => $request->rt,
                        'rw'   => $request->rw,
                        'nama'     => $request->nama,
                        'jk'   => $request->jk,
                        'agama'     => $request->agama,
                        'tanggallahir'   => $request->tanggallahir,
                        'tanggalmeninggal'   => $request->tanggalmeninggal,
                    ]);
        
                    User::where('nik', $request->nik)->delete();
            
                    //redirect to index
                    return redirect()->route('kematian.warga')->with(['success' => 'Data Berhasil Disimpan!']);
                    }catch (ValidationException $exception) {
                        $errorMessage = $exception->validator->errors()->first(); // ambil pesan error pertama dari validator
                        redirect()->route('catatan-kematian')->with('error', 'Gagal menyimpan data. ' . $errorMessage); // tambahkan alert error
                    }
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $catatankematian = CatatanKematian::find($id);

        if (!$catatankematian) {
            return abort(404);
        }

        return view('pages.kematian.show', compact('catatankematian'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = CatatanKematian::find($id);
        $old_value = $data->attributesToArray();
        $data->delete();
        $namauser = Auth::user()->nama;
        Log::create([
            'action' => 'Delete',
            'model' => 'Catatan Kematian',
            'user_id' => auth()->id(),
            'user_name' => $namauser,
            'old_values' => json_encode($old_value)
        ]);

        return redirect()->route('catatan-kematian.index')->with('success', 'Data berhasil dihapus.');
    }
}
