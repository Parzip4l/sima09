<?php

namespace App\Http\Controllers;

use App\User;
use App\Pengaduan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class PengaduanController extends Controller
{
    public function store(Request $request)
    {
        // Validasi data input
        $validatedData = $request->validate([
            'nik' => 'required|string',
            'nama' => 'required|string',
            'email' => 'required|email',
            'nomor_telepon' => 'required|string',
            'jenis' => 'required|string',
            'judul' => 'required|string',
            'pesan' => 'required|string',
        ]);

        // Buat pengaduan baru
        $pengaduan = new Pengaduan();
        $pengaduan->nik = $validatedData['nik'];
        $pengaduan->nama = $validatedData['nama'];
        $pengaduan->email = $validatedData['email'];
        $pengaduan->nomor_telepon = $validatedData['nomor_telepon'];
        $pengaduan->jenis = $validatedData['jenis'];
        $pengaduan->judul = $validatedData['judul'];
        $pengaduan->pesan = $validatedData['pesan'];
        $pengaduan->status = $request->status;
        $pengaduan->save();

        return redirect()->back()->with('success', 'Pengaduan berhasil dikirim');
    }

    public function index()
    {
        if($user = Auth::user()){
            if($user->level == '1'){
                $pengaduans = Pengaduan::all();

            //render view with posts
            return view('pages.pengaduan.index', compact('pengaduans'));
            }else{
                return redirect('pages.auth.login')->intended('login');
            }
        }
    }

    public function show($id)
    {
        $pengaduan = Pengaduan::find($id);

        if (!$pengaduan) {
            return abort(404);
        }

        return view('pages.pengaduan.show', compact('pengaduan'));
    }

    public function edit($id)
    {
        if($user = Auth::user()){
            if($user->level == '1'){
                $pengaduan = Pengaduan::find($id);
                return view('pages.pengaduan.edit',compact('pengaduan'));
            }else{
                return redirect('pages.auth.login')->intended('login');
            }
        }
    }

    public function update(Request $request, $id)
    {
        try {
            if($user = Auth::user()){
                if($user->level == '1'){
                    $pengaduan = Pengaduan::find($id);
                    $pengaduan->status = $request->status;
                    $pengaduan->save();

                    return redirect()->route('pengaduan.index')->with('success', 'Data Berita Berhasil Diupdate.');
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
                $Pengaduan = Pengaduan::find($id);
                $Pengaduan->delete();

                return redirect()->route('pengaduan.index')->with('success', 'Data berhasil dihapus.');
            }else{
                return redirect('pages.auth.login')->intended('login');
            }
        }
    }
}
