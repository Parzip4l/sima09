<?php

namespace App\Http\Controllers;

use App\Warga;
use App\User;
use App\Mustahiq;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class MustahiqController extends Controller
{
    public function index()
    {
        if($user = Auth::user()){
            if($user->level == '1'){
                $mustahiq = Mustahiq::all();

            //render view with posts
            return view('pages.zakat.mustahiq', compact('mustahiq'));
            }else{
                return view('pages.auth.login')->intended('login');
            }
        }
    }

    public function laporan()
    {
        if($user = Auth::user()){
            if($user->level == '1'){
            $jumlah_data = Zakat::count();
            $beras = Zakat::where('jenis', 'beras')->count();
            $uang = Zakat::where('jenis', 'uang')->count();
            //render view with posts
            return view('pages.zakat.laporan');
            }else{
                return redirect('pages.auth.login')->intended('login');
            }
        }
    }

    public function create()
    {
        return view('pages.zakat.createmustahiq');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'jenis' => 'required',
            'alamat' => 'required',
            'tanggal_diberikan' => 'required',
            'jumlah_zakat' => 'required'
        ]);

        Mustahiq::create([
            'uuid' => $request->uuid,
            'nama' => $request->nama,
            'jenis' => $request->jenis,
            'alamat' => $request->alamat,
            'telepon' => $request->telepon,
            'tanggal_diberikan' => $request->tanggal_diberikan,
            'jumlah_zakat' => $request->jumlah_zakat,
            'keterangan' => $request->keterangan
        ]);

        return redirect()->route('mustahiq.index')->with('success', 'Zakat berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $zakat = Zakat::find($id);
        return view('pages.zakat.edit', compact('zakat'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_pembayar' => 'required',
            'tanggal_pembayaran' => 'required',
            'jumlah_zakat' => 'required'
        ]);

        $zakat = Zakat::find($id);
        $zakat->nama_pembayar = $request->nama_pembayar;
        $zakat->tanggal_pembayaran = $request->tanggal_pembayaran;
        $zakat->jenis = $request->jenis;
        $zakat->jumlah_zakat = $request->jumlah_zakat;
        $zakat->keterangan = $request->keterangan;
        $zakat->save();

        return redirect()->route('pages.zakat.index')->with('success', 'Zakat berhasil diupdate.');
    }

    public function destroy($id)
    {
        $zakat = Zakat::find($id);
        $zakat->delete();

        return redirect()->route('pages.zakat.index')->with('success', 'Zakat berhasil dihapus.');
    }

    public function show($id)
    {
        $mustahiq = Mustahiq::find($id);

        if (!$mustahiq) {
            return abort(404);
        }

        return view('pages.zakat.mustahiqshow', compact('mustahiq'));
    }

    public function search(Request $request)
{
    $nama_warga = $request->get('nama');

    $data = DB::table('wargas')
        ->where('nama', 'like', '%'.$nama.'%')
        ->select('id', 'nama')
        ->get();

    return response()->json($data);
}
}
