<?php

namespace App\Http\Controllers;

use App\KasRW;
use App\User;
use App\Log;
use App\KasKarta;
use App\KasDkm;
use App\KasDamar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class KasRWController extends Controller
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
                $data = KasRW::latest()->get();
                $datalog = Log::where('model', 'Kas Rw')->latest()->take(5)->get();
                return view('pages.kas.index', compact('data','datalog'));
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
        return view('pages.kas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $date = Carbon::now('Asia/Jakarta');
        $request->validate([
            'tanggal' => 'required',
            'keterangan' => 'required',
            'jumlah_masuk' => 'required|numeric',
            'jumlah_keluar' => 'required|numeric',
        ]);

        $lastSaldo = KasRW::orderBy('created_at', 'desc')->value('saldo');

        $jumlah_masuk = $request->jumlah_masuk ?? 0;
        $jumlah_keluar = $request->jumlah_keluar ?? 0;

        $saldo = $lastSaldo + $jumlah_masuk - $jumlah_keluar;
    
        $data = new KasRW();
        $data->tanggal = $request->tanggal;
        $data->keterangan = $request->keterangan;
        $data->jumlah_masuk = $request->jumlah_masuk;
        $data->jumlah_keluar = $request->jumlah_keluar;
        $data->saldo = $saldo;
        $data->created_at = $date;
        $data->save();
        
        $new_value = $data->attributesToArray();  

        $namauser = Auth::user()->nama;
        Log::create([
            'action' => 'Create',
            'model' => 'Kas Rw',
            'user_id' => auth()->id(),
            'user_name' => $namauser,
            'new_values' => json_encode($new_value)
        ]);

    
        return redirect()->route('kas.index')->with('success', 'Data berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if($user = Auth::user()){
            if($user->level == '1'){
            $data = KasRW::find($id);
            return view('pages.kas.show', compact('data'));
            }else{
                return view('pages.auth.login');
            }
        }
    }

    public function detaillog($id)
    {
        if($user = Auth::user()){
            if($user->level == '1'){
                $log = Log::where('id', $id)->firstOrFail();
                return view('pages.kas.detaillog', compact('log'));
            }else{
                return view('pages.auth.login');
            }    
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = KasRW::find($id);
        return view('pages.kas.edit', compact('data'));
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
        try {
            $lastSaldo = KasRW::orderBy('created_at', 'desc')->value('saldo');

            $jumlah_masuk = $request->jumlah_masuk ?? 0;
            $jumlah_keluar = $request->jumlah_keluar ?? 0;

            $saldo = $lastSaldo + $jumlah_masuk - $jumlah_keluar;
            
            $data = KasRW::find($id);
            $data->judul = $request->judul;
            $data->tanggal = $request->tanggal;
            $data->keterangan = $request->keterangan;
            $data->jumlah_masuk = $request->jumlah_masuk;
            $data->jumlah_keluar = $request->jumlah_keluar;
            $data->saldo = $saldo;
            $data->created_at = $date;
            $old_value = $data->attributesToArray();
            $data->save();
            $new_value = $data->attributesToArray();  

            $namauser = Auth::user()->nama;
            Log::create([
                'action' => 'Update',
                'model' => 'Kas RW',
                'user_id' => auth()->id(),
                'user_name' => $namauser,
                'old_values' => json_encode($old_value),
                'new_values' => json_encode($new_value)
            ]);
    
            return redirect()->route('kas.index')->with('success', 'Data Berita Berhasil Diupdate.');
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->errors());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = KasRW::find($id);
        $old_value = $data->attributesToArray();
        $data->delete();
        $namauser = Auth::user()->nama;
        Log::create([
            'action' => 'Delete',
            'model' => 'Kas Rw',
            'user_id' => auth()->id(),
            'user_name' => $namauser,
            'old_values' => json_encode($old_value)
        ]);

        return redirect()->route('kas.index')->with('success', 'Data berhasil dihapus.');
    }

    public function clients()
    {
        $data = KasRW::latest()->take(5)->get();
        $datakarta = KasKarta::latest()->take(5)->get();
        $datadkm = KasDkm::latest()->take(5)->get();
        $datadamar = KasDamar::latest()->take(5)->get();
        $kasrw = KasRW::latest('saldo')->first();
        $kaskarta = KasKarta::latest('saldo')->first();
        $kasdkm = KasDkm::latest('saldo')->first();
        $kasdamar = KasDamar::latest('saldo')->first();
        $incomerw = KasRW::sum('jumlah_masuk');
        $expanserw = KasRW::sum('jumlah_keluar');
        $incomekarta = KasKarta::sum('jumlah_masuk');
        $expansekarta = KasKarta::sum('jumlah_keluar');
        $incomedkm = KasDkm::sum('jumlah_masuk');
        $expansedkm = KasDkm::sum('jumlah_keluar');
        $incomedamar = KasDamar::sum('jumlah_masuk');
        $expansedamar = KasDamar::sum('jumlah_keluar');
        $totalsaldodamar = $incomedamar - $expansedamar;
        $totalsaldorw = $incomerw - $expanserw;
        $totalsaldokarta = $incomekarta - $expansekarta;
        $totalsaldodkm = $incomedkm - $expansedkm;
        return view('pages.kas.clients', 
        compact(
            'data','datakarta','datadkm','datadamar','kasrw','kaskarta','kasdkm','kasdamar','incomerw', 'expanserw', 'incomekarta', 'expansekarta', 'incomedkm', 'expansedkm','incomedamar', 'expansedamar','totalsaldorw','totalsaldodamar','totalsaldodkm', 'totalsaldokarta'
        ));
    }
}
