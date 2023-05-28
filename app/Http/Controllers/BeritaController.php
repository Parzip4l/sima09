<?php

namespace App\Http\Controllers;

use App\User;
use App\Berita;
use App\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class BeritaController extends Controller
{
    public function index()
    {
        if($user = Auth::user()){
            if($user->level == '1'){
                $beritas = Berita::all();
                $datalog = Log::where('model', 'berita')->take(5)->get();    
            //render view with posts
            return view('pages.berita.index', compact('beritas','datalog'));
            }else if($user->level == '2'){
                $beritas = Berita::orderByDesc('created_at')->take(15)->get();
                $datalog = Log::where('model', 'berita')->take(5)->get(); 
                return view('pages.berita.indexwarga', compact('beritas','datalog'));
            }
        }else{
            return redirect('pages.auth.login')->intended('login');
        }
    }

    public function create()
    {
        return view('pages.berita.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'konten' => 'required',
            'gambar' => 'image|mimes:jpeg,png,jpg,gif|max:1024'
        ]);
        
        $berita = new Berita();
        $berita->judul = $request->input('judul');
        $berita->excerpt = $request->input('excerpt');
        $berita->kategori = $request->input('kategori');
        $berita->tags = $request->input('tags');
        $berita->konten = $request->input('konten');
        
        if ($request->hasFile('gambar')) {
            $image = $request->file('gambar');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $filename);
            $berita->gambar = $filename;
        }
        $berita->save();
        $new_value = $berita->attributesToArray();  

        $namauser = Auth::user()->nama;
        Log::create([
            'action' => 'Create',
            'model' => 'berita',
            'user_id' => auth()->id(),
            'user_name' => $namauser,
            'new_values' => json_encode($new_value)
        ]);
        
        return redirect()->route('berita.index')->with('success','Berita berhasil ditambahkan.');
    }

    public function show($judul)
    {   
        $berita = Berita::where('judul', $judul)->firstOrFail();
        return view('pages.berita.single', compact('berita'));
        if($user = Auth::user()){
            if($user->level == '2'){
                $berita = Berita::where('judul', $judul)->firstOrFail();
                return view('pages.berita.single', compact('berita'));
            }else{
                $berita = Berita::where('judul', $judul)->firstOrFail();
                return view('pages.berita.show', compact('berita'));
            }
        }
    }

    public function detaillog($id)
    {
        if($user = Auth::user()){
            if($user->level == '1'){
                $log = Log::where('id', $id)->firstOrFail();
                return view('pages.berita.detaillog', compact('log'));
            }else{
                return view('pages.auth.login');
            }    
        }
    }

    public function destroy($id)
    {
        $berita = Berita::find($id);
        $old_value = $berita->attributesToArray();
        $berita->delete();
        $namauser = Auth::user()->nama;
        Log::create([
            'action' => 'Delete',
            'model' => 'berita',
            'user_id' => auth()->id(),
            'user_name' => $namauser,
            'old_values' => json_encode($old_value)
        ]);

        return redirect()->route('berita.index')->with('success', 'Data berhasil dihapus.');
    }

    public function edit($id)
    {
        $berita = Berita::find($id);
        return view('pages.berita.edit', compact('berita'));
    }

    public function update(Request $request, $id)
    {
        try {
            $berita = Berita::find($id);
            $berita->judul = $request->judul;
            $berita->excerpt = $request->excerpt;
            $berita->kategori = $request->kategori;
            $berita->tags = $request->tags;
            $berita->konten = $request->konten;
            if ($request->hasFile('gambar')) {
                $image = $request->file('gambar');
                $filename = time() . '.' . $image->getClientOriginalExtension();
                $destinationPath = public_path('/images');
                $image->move($destinationPath, $filename);
                $berita->gambar = $filename;
            }
            $old_value = $berita->attributesToArray();
            $berita->save();
            $new_value = $berita->attributesToArray();  

            $namauser = Auth::user()->nama;
            Log::create([
                'action' => 'Update',
                'model' => 'berita',
                'user_id' => auth()->id(),
                'user_name' => $namauser,
                'old_values' => json_encode($old_value),
                'new_values' => json_encode($new_value)
            ]);
    
            return redirect()->route('berita.index')->with('success', 'Data Berita Berhasil Diupdate.');
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->errors());
        }
        
    }
}
