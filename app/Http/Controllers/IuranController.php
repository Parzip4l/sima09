<?php

namespace App\Http\Controllers;

use App\User;
use App\Log;
use App\Iuran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class IuranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if($user = Auth::user()){
            if($user->level == '1') {
                $data = Iuran::latest()->get();
                $datalog = Log::where('model', 'Iuran Warga')->take(5)->get();
                return view('pages.iuran.index', compact('data','datalog'));
            }else{
                return view('pages.auth.login');
            }
        }
    }

    public function iuranwargapage()
    {
        if($user = Auth::user()){
            if($user->level == '2'){
                $userdata = User::all();
                $cekiuran = Iuran::where('nik', $user->nik)->get();
                $count = count($cekiuran);
                // Get logs for the month

            //render view with posts
            return view('pages.iuran.indexwarga', compact('userdata','cekiuran','count'));
            }else{
                return redirect('login.index')->intended('login');
            }
        }
    }

    public function filter(Request $request)
    {
        $bulan = $request->input('bulan');
        $tahun = $request->input('tahun');

        $iuran = Iuran::query()
            ->when($bulan, function ($query, $bulan) {
                return $query->whereMonth('tanggal', $bulan);
            })
            ->when($tahun, function ($query, $tahun) {
                return $query->whereYear('tanggal', $tahun);
            })
            ->get();

        return view('pages.iuran.index', compact('iuran'));
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
                return view('pages.iuran.create');
            }else{
                return view('pages.auth.login');
            }
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
            if($user->level =='1'){
                $request->validate([
                    'nama' => 'required',
                    'nik' => 'required',
                ]);
            
                $data = new Iuran();
                $data->nik = $request->nik;
                $data->nama = $request->nama;
                $data->rt = $request->rt;
                $data->jumlah = $request->jumlah;
                $data->tanggal = $request->tanggal;
                $data->bulan = $request->bulan;
                $data->tahun = $request->tahun;
                $data->status_pembayaran = $request->status_pembayaran;
                $data->save(); 
                $new_value = $data->attributesToArray(); 
                $namauser = Auth::user()->nama;
                Log::create([
                    'action' => 'Create',
                    'model' => 'Iuran Warga',
                    'user_id' => auth()->id(),
                    'user_name' => $namauser,
                    'new_values' => json_encode($new_value)
                ]);
            
                return redirect()->route('iuran.index')->with('success', 'Iuran berhasil ditambahkan.');
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
    public function autocomplete(Request $request)
    {
        $term = $request->input('term');
        $users = User::select('nama', 'nik')
            ->where('nama', 'LIKE', '%' . $term . '%')
            ->get();
        
        $response = array();
        foreach($users as $user){
            $response[] = array(
                'id' => $user->id,
                'value' => $user->nama,
                'nik' => $user->nik,
                'rt' => $user->rt,
            );
        }
        
        return response()->json($response); 
    }
    
    public function show($id)
    {
        //
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
        //
    }
}
