<?php

namespace App\Http\Controllers;

use App\User;
use App\Pengumuman;
use Ladumor\OneSignal\Facades\OneSignal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;


class PengumumanController extends Controller
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
                $pengumumans = Pengumuman::all();

            //render view with posts
            return view('pages.pengumuman.index', compact('pengumumans'));
            }else{
                return redirect('pages.auth.login')->intended('login');
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
        return view('pages.pengumuman.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required',
            'isi' => 'required',
            'lampiran' => 'nullable|file|max:4096', // maksimum 1MB
        ]);

        $pengumuman = Pengumuman::create([
            'judul' => $validated['judul'],
            'isi' => $validated['isi'],
        ]);

        if ($request->hasFile('lampiran')) {
            $path = $request->file('lampiran')->store('public/files');
            $pengumuman->lampiran = $path;
            $pengumuman->save();
        }

        return redirect()->route('pengumuman.index')->with(['success' => 'Pengumuman Berhasil Dibuat!']);
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
                $data = Pengumuman::find($id);
                return view('pages.pengumuman.show', compact('data'));
            }else{
                return redirect('pages.auth.login')->intended('login');
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
        if($user = Auth::user()){
            if($user->level == '1'){
                $data = Pengumuman::find($id);
                return view('pages.pengumuman.edit', compact('data'));
            }else{
                return redirect('pages.auth.login')->intended('login');
            }
        }
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
            $pengumuman = Pengumuman::find($id);
            $pengumuman->judul = $request->judul;
            $pengumuman->isi = $request->isi;
            if ($request->hasFile('lampiran')) {
                Storage::delete('public/files/'.$pengumuman->lampiran);
                $path = $request->file('lampiran')->store('public/files');
                $pengumuman->lampiran = $path;
                $pengumuman->save();
            }
    
            return redirect()->route('pengumuman.index')->with('success', 'Data Berita Berhasil Diupdate.');
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
        $pengumuman = Pengumuman::find($id);
        $pengumuman->delete();

        return redirect()->route('pengumuman.index')->with('success', 'Data berhasil dihapus.');
    }

    public function download($id)
    {
        $pengumuman = Pengumuman::findOrFail($id);

        $file_path = storage_path('app/' .$pengumuman->lampiran);

        return response()->download($file_path);
    }
}
