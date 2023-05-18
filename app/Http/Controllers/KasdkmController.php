<?php

namespace App\Http\Controllers;

use App\KasDkm;
use App\User;
use App\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class KasdkmController extends Controller
{
    public function index()
    {
        if($user = Auth::user()){
            if($user->level == '1'){
                $data = KasDkm::latest()->get();
                $datalog = Log::where('model', 'Kas Dkm')->latest()->take(5)->get();
                return view('pages.kas.dkm.index', compact('data','datalog'));
            }else{
                return view('pages.auth.login');
            }
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.kas.dkm.create');
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
                $request->validate([
                    'tanggal' => 'required',
                    'keterangan' => 'required',
                    'jumlah_masuk' => 'required|numeric',
                    'jumlah_keluar' => 'required|numeric',
                ]);
        
                $lastSaldo = KasDkm::orderBy('created_at', 'desc')->value('saldo');
        
                $jumlah_masuk = $request->jumlah_masuk ?? 0;
                $jumlah_keluar = $request->jumlah_keluar ?? 0;
        
                $saldo = $lastSaldo + $jumlah_masuk - $jumlah_keluar;
            
                $data = new KasDkm();
                $data->tanggal = $request->tanggal;
                $data->keterangan = $request->keterangan;
                $data->jumlah_masuk = $request->jumlah_masuk;
                $data->jumlah_keluar = $request->jumlah_keluar;
                $data->saldo = $saldo;
                $data->save();
                $new_value = $data->attributesToArray(); 
                $namauser = Auth::user()->nama;
                Log::create([
                    'action' => 'Create',
                    'model' => 'Kas Dkm',
                    'user_id' => auth()->id(),
                    'user_name' => $namauser,
                    'new_values' => json_encode($new_value)
                ]);
                return redirect()->route('kasdkm.index')->with('success', 'Data berhasil ditambahkan.');
            }else{
                return view('pages.auth.login');
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
        $data = KasDkm::find($id);
        return view('pages.kas.dkm.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = KasDkm::find($id);
        return view('pages.kas.dkm.edit', compact('data'));
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
        $data = KasDkm::find($id);
        $old_value = $data->attributesToArray();
        $data->delete();
        $namauser = Auth::user()->nama;
        Log::create([
            'action' => 'Delete',
            'model' => 'Kas Dkm',
            'user_id' => auth()->id(),
            'user_name' => $namauser,
            'old_values' => json_encode($old_value)
        ]);

        return redirect()->route('kasdkm.index')->with('success', 'Data berhasil dihapus.');
    }

    public function clients()
    {
        $data = KasDkm::latest()->get();
        return view('pages.kas.clients', compact('data'));
    }

    public function detaillog($id)
    {
        if($user = Auth::user()){
            if($user->level == '1'){
                $log = Log::where('id', $id)->firstOrFail();
                $datalog = Log::where('model', 'Kas Dkm')->take(5)->get();
                return view('pages.kas.dkm.detaillog', compact('log'));
            }else{
                return view('pages.auth.login');
            }    
        }
    }
}
