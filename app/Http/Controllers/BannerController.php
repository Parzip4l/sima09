<?php

namespace App\Http\Controllers;

use App\User;
Use App\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class BannerController extends Controller
{
    public function index()
    {
        if($user = Auth::user()){
            if($user->level == '1'){
                $banner = Banner::all();  
            //render view with posts
            return view('pages.banner.index', compact('banner'));
            }else{
                return redirect('pages.auth.login')->intended('login');
            }
        }
    }

    public function create()
    {
        if($user = Auth::user()){
            if($user->level == '1'){
                 return view('pages.banner.create');
            }else{
                return redirect('pages.auth.login')->intended('login');
            }
        }
    }

    public function store(Request $request)
    {
        if($user = Auth::user()){
            if($user->level == '1'){
                $request->validate([
                    'judul' => 'required',
                    'gambar' => 'image|mimes:jpeg,png,jpg,gif|max:5024',
                    'end_date' => 'required|date|after_or_equal:now',
                ]);
                
                $banner = new Banner();
                $banner->judul = $request->input('judul');
                $banner->deskripsi = $request->input('deskripsi');
                if ($request->hasFile('gambar')) {
                    $image = $request->file('gambar');
                    $filename = time() . '.' . $image->getClientOriginalExtension();
                    $destinationPath = public_path('/images');
                    $image->move($destinationPath, $filename);
                    $banner->gambar = $filename;
                }
                $banner->end_date = $request->input('end_date');
                
                
                $banner->save();
                return redirect()->route('bannersetting.index')->with('success','Banner berhasil ditambahkan.');
            }else{
                return redirect('pages.auth.login')->intended('login');
            }
        }
    }

    public function destroy($id)
    {
        if($user = Auth::user()){
            if($user->level = '1'){
                $banner = Banner::find($id);
                $banner->delete();
                return redirect()->route('bannersetting.index')->with('success', 'Data berhasil dihapus.');
            }else{
                return redirect('pages.auth.login')->intended('login');
            }
        }
    }
}
