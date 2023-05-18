<?php

namespace App\Http\Controllers;

use App\Kelahiran;
use App\User;
use App\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use PDF;

class KelahiranController extends Controller
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
                $lahir = Kelahiran::all()->take(10);
                $datalog = Log::where('model', 'kelahiran')->take(5)->get();
            //render view with posts
            return view('pages.kelahiran.index', compact('lahir','datalog'));
            }else if($user->level == '2') {
                $lahir = Kelahiran::all()->take(10);
                $count = count($lahir);
                return view('pages.kelahiran.indexwarga', compact('lahir','count'));
            }
        }else{
            return view('pages.auth.login');
        }
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
            return view('pages.kelahiran.create');
            } else if($user->level == '2') {
                return view('pages.kelahiran.createwarga');
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
                    //create post
                    Kelahiran::create([
                        'nama'     => $request->nama,
                        'tanggallahir'   => $request->tanggallahir,
                        'jk'     => $request->jk,
                        'tempatlahir'   => $request->tempatlahir,
                        'berat'     => $request->berat,
                        'panjang'   => $request->panjang,
                        'ayah'     => $request->ayah,
                        'ibu'   => $request->ibu,
                        'alamat'   => $request->alamat,
                        'nomortelepon'   => $request->nomortelepon,
                        'namapelapor'   => $request->namapelapor,
                        'tanggallaporan'   => $request->tanggallaporan,
                    ]);
            
                    //redirect to index
                    return redirect()->route('catatan-kelahiran.index')->with(['success' => 'Data Berhasil Disimpan!']);
                    }catch (ValidationException $exception) {
                        $errorMessage = $exception->validator->errors()->first(); // ambil pesan error pertama dari validator
                        redirect()->route('catatan-kelahiran')->with('error', 'Gagal menyimpan data. ' . $errorMessage); // tambahkan alert error
                    }
            }else{
                try{
                    //validate form
                    
                    //create post
                    Kelahiran::create([
                        'nama'     => $request->nama,
                        'tanggallahir'   => $request->tanggallahir,
                        'jk'     => $request->jk,
                        'tempatlahir'   => $request->tempatlahir,
                        'berat'     => $request->berat,
                        'panjang'   => $request->panjang,
                        'ayah'     => $request->ayah,
                        'ibu'   => $request->ibu,
                        'alamat'   => $request->alamat,
                        'nomortelepon'   => $request->nomortelepon,
                        'namapelapor'   => $request->namapelapor,
                        'tanggallaporan'   => $request->tanggallaporan,
                    ]);
            
                    //redirect to index
                    return redirect()->route('catatan-kelahiran.index')->with(['success' => 'Data Berhasil Disimpan!']);
                    }catch (ValidationException $exception) {
                        $errorMessage = $exception->validator->errors()->first(); // ambil pesan error pertama dari validator
                        redirect()->route('catatan-kelahiran')->with('error', 'Gagal menyimpan data. ' . $errorMessage); // tambahkan alert error
                    }
            }
        }
    }

    public function generatePdf($id)
    {
        $kelahiran = Kelahiran::find($id);
        $pdf = PDF::loadView('pages.kelahiran.viewpdf', compact('kelahiran'));
        return $pdf->download('birth-report-' . $id . '.pdf');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {
        $kelahiran = Kelahiran::find($id);

        if (!$kelahiran) {
            return abort(404);
        }

        return view('pages.kelahiran.show', compact('kelahiran'));
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
