<?php

namespace App\Http\Controllers;

use App\Warga;
use App\User;
use App\Zakat;
use App\Mustahiq;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;
use PDF;
use Spatie\Browsershot\Browsershot;

class LaporanzakatController extends Controller
{
    public function index()
    {
        if($user = Auth::user()){
            if($user->level == '2'){
                $cekzakat = Zakat::where('nokk', $user->nokk)->get();
                if ($cekzakat->count() > 0) {
                    $cekbayar = 'Terimakasih Anda Telah Membayar Zakat';
                    $gambarzakat = 'zakatpay.png';
                    $css = 'sudahbayar';
                } else {
                    $cekbayar = 'Anda Belum Membayar Zakat, Segera Melakukan Pembayaran Zakat Sebelum 1 Syawal';
                    $gambarzakat = 'zakatpay.png';
                    $css = 'belumbayar';
                }
            //render view with posts
                return view('pages.zakat.status', compact('cekbayar','gambarzakat','css'));
            }else{
                return view('pages.error.500');
            }
        }
    }

    public function indexwarga()
    {
        if($user = Auth::user()){
            if($user->level == '2'){
                $jumlah_data = Zakat::count();
                $mustahiq_total = Mustahiq::count();
                $beras = Zakat::where('jenis', 'beras')->count();
                $uang = Zakat::where('jenis', 'uang')->count();
                $fakir = Mustahiq::where('jenis', 'Faqir')->count();
                $miskin = Mustahiq::where('jenis', 'Miskin')->count();
                $riqab = Mustahiq::where('jenis', 'Riqab')->count();
                $gharim = Mustahiq::where('jenis', 'Gharim')->count();
                $mualaf = Mustahiq::where('jenis', 'Mualaf')->count();
                $fisabil = Mustahiq::where('jenis', 'Fisabilillah')->count();
                $ibnu = Mustahiq::where('jenis', 'Ibnu Sabil')->count();
                $amil = Mustahiq::where('jenis', 'Amil Zakat')->count();
                $totalMustahiq = DB::table('mustahiq')
                ->select(DB::raw('COUNT(*) as total'))
                ->where('alamat', '1')
                ->where('jenis', 'Faqir')
                ->get();
                $totaluang = $uang * 32500;
                $totalberas = $beras * 2.5;
                $zakatByType = DB::table('zakat')
                ->select(DB::raw('SUM(jumlah_zakat) as total'))
                ->whereIn('jenis', ['beras'])
                ->groupBy('jenis')
                ->get();
                $zakatByuang = DB::table('zakat')
                ->select(DB::raw('SUM(jumlah_zakat) as total'))
                ->whereIn('jenis', ['uang'])
                ->groupBy('jenis')
                ->get();

                $totalMustahiq = DB::table('mustahiq')
                ->select(DB::raw('COUNT(*) as total'))
                ->where('alamat', '1')
                ->where('jenis', 'Faqir')
                ->get();

                $totalMustahiq1 = DB::table('mustahiq')
                ->select(DB::raw('COUNT(*) as total'))
                ->where('alamat', '2')
                ->where('jenis', 'Faqir')
                ->get();

                $totalMustahiq2 = DB::table('mustahiq')
                ->select(DB::raw('COUNT(*) as total'))
                ->where('alamat', '3')
                ->where('jenis', 'Faqir')
                ->get();

                $totalMustahiq3 = DB::table('mustahiq')
                ->select(DB::raw('COUNT(*) as total'))
                ->where('alamat', '4')
                ->where('jenis', 'Faqir')
                ->get();

                $totalmiskin = DB::table('mustahiq')
                ->select(DB::raw('COUNT(*) as total'))
                ->where('alamat', '1')
                ->where('jenis', 'Miskin')
                ->get();

                $totalmiskin1 = DB::table('mustahiq')
                ->select(DB::raw('COUNT(*) as total'))
                ->where('alamat', '2')
                ->where('jenis', 'Miskin')
                ->get();

                $totalmiskin2 = DB::table('mustahiq')
                ->select(DB::raw('COUNT(*) as total'))
                ->where('alamat', '3')
                ->where('jenis', 'Miskin')
                ->get();

                $totalmiskin3 = DB::table('mustahiq')
                ->select(DB::raw('COUNT(*) as total'))
                ->where('alamat', '4')
                ->where('jenis', 'Miskin')
                ->get();


                $totalfisabil = DB::table('mustahiq')
                ->select(DB::raw('COUNT(*) as total'))
                ->where('alamat', '1')
                ->where('jenis', 'Fisabilillah')
                ->get();

                $totalfisabil1 = DB::table('mustahiq')
                ->select(DB::raw('COUNT(*) as total'))
                ->where('alamat', '2')
                ->where('jenis', 'Fisabilillah')
                ->get();

                $totalfisabil2 = DB::table('mustahiq')
                ->select(DB::raw('COUNT(*) as total'))
                ->where('alamat', '3')
                ->where('jenis', 'Fisabilillah')
                ->get();

                $totalfisabil3 = DB::table('mustahiq')
                ->select(DB::raw('COUNT(*) as total'))
                ->where('alamat', '4')
                ->where('jenis', 'Fisabilillah')
                ->get();


                return view('pages.zakat.clients', compact(
                'jumlah_data',
                'beras',
                'uang',
                'totalberas',
                'totalmiskin',
                'totalmiskin1',
                'totalmiskin2',
                'totalmiskin3',
                'totalfisabil',
                'totalfisabil1',
                'totalfisabil2',
                'totalfisabil3',
                'totaluang','fakir','miskin','riqab','gharim','mualaf', 'fisabil', 'ibnu', 'amil', 'mustahiq_total','zakatByType','zakatByuang','totalMustahiq','totalMustahiq1','totalMustahiq2','totalMustahiq3'));
            }else{
                return view('pages.error.500');
            }
        } 
    }

    public function indexadmin()
    {
        if($user = Auth::user()){
            if($user->level == '1'){
                $jumlah_data = Zakat::count();
                $mustahiq_total = Mustahiq::count();
                $beras = Zakat::where('jenis', 'beras')->count();
                $uang = Zakat::where('jenis', 'uang')->count();
                $fakir = Mustahiq::where('jenis', 'Faqir')->count();
                $miskin = Mustahiq::where('jenis', 'Miskin')->count();
                $riqab = Mustahiq::where('jenis', 'Riqab')->count();
                $gharim = Mustahiq::where('jenis', 'Gharim')->count();
                $mualaf = Mustahiq::where('jenis', 'Mualaf')->count();
                $fisabil = Mustahiq::where('jenis', 'Fisabilillah')->count();
                $ibnu = Mustahiq::where('jenis', 'Ibnu Sabil')->count();
                $amil = Mustahiq::where('jenis', 'Amil Zakat')->count();
                $zakatByType = DB::table('zakat')
                ->select(DB::raw('SUM(jumlah_zakat) as total'))
                ->whereIn('jenis', ['beras'])
                ->groupBy('jenis')
                ->get();
                $zakatByuang = DB::table('zakat')
                ->select(DB::raw('SUM(jumlah_zakat) as total'))
                ->whereIn('jenis', ['uang'])
                ->groupBy('jenis')
                ->get();



                $totalMustahiq = DB::table('mustahiq')
                ->select(DB::raw('COUNT(*) as total'))
                ->where('alamat', '1')
                ->where('jenis', 'Faqir')
                ->get();

                $totalMustahiq1 = DB::table('mustahiq')
                ->select(DB::raw('COUNT(*) as total'))
                ->where('alamat', '2')
                ->where('jenis', 'Faqir')
                ->get();

                $totalMustahiq2 = DB::table('mustahiq')
                ->select(DB::raw('COUNT(*) as total'))
                ->where('alamat', '3')
                ->where('jenis', 'Faqir')
                ->get();

                $totalMustahiq3 = DB::table('mustahiq')
                ->select(DB::raw('COUNT(*) as total'))
                ->where('alamat', '4')
                ->where('jenis', 'Faqir')
                ->get();

                $totalmiskin = DB::table('mustahiq')
                ->select(DB::raw('COUNT(*) as total'))
                ->where('alamat', '1')
                ->where('jenis', 'Miskin')
                ->get();

                $totalmiskin1 = DB::table('mustahiq')
                ->select(DB::raw('COUNT(*) as total'))
                ->where('alamat', '2')
                ->where('jenis', 'Miskin')
                ->get();

                $totalmiskin2 = DB::table('mustahiq')
                ->select(DB::raw('COUNT(*) as total'))
                ->where('alamat', '3')
                ->where('jenis', 'Miskin')
                ->get();

                $totalmiskin3 = DB::table('mustahiq')
                ->select(DB::raw('COUNT(*) as total'))
                ->where('alamat', '4')
                ->where('jenis', 'Miskin')
                ->get();


                $totalfisabil = DB::table('mustahiq')
                ->select(DB::raw('COUNT(*) as total'))
                ->where('alamat', '1')
                ->where('jenis', 'Fisabilillah')
                ->get();

                $totalfisabil1 = DB::table('mustahiq')
                ->select(DB::raw('COUNT(*) as total'))
                ->where('alamat', '2')
                ->where('jenis', 'Fisabilillah')
                ->get();

                $totalfisabil2 = DB::table('mustahiq')
                ->select(DB::raw('COUNT(*) as total'))
                ->where('alamat', '3')
                ->where('jenis', 'Fisabilillah')
                ->get();

                $totalfisabil3 = DB::table('mustahiq')
                ->select(DB::raw('COUNT(*) as total'))
                ->where('alamat', '4')
                ->where('jenis', 'Fisabilillah')
                ->get();



                $totaluang = $uang * 32500;
                $totalberas = $beras * 2.5;
                return view('pages.zakat.laporan', 
                compact(
                'jumlah_data',
                'beras',
                'uang',
                'totalberas',
                'totalmiskin',
                'totalmiskin1',
                'totalmiskin2',
                'totalmiskin3',
                'totalfisabil',
                'totalfisabil1',
                'totalfisabil2',
                'totalfisabil3',
                'totaluang','fakir','miskin','riqab','gharim','mualaf', 'fisabil', 'ibnu', 'amil', 'mustahiq_total','zakatByType','zakatByuang','totalMustahiq','totalMustahiq1','totalMustahiq2','totalMustahiq3'));
            }else{
                return view('pages.error.500');
            }
        } 
    }
}
