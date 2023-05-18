<?php

namespace App\Http\Controllers;

use App\Warga;
use App\User;
use App\Voting;
use App\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Torann\GeoIP\Facades\GeoIP;

class WargadashboardController extends Controller
{
    public function index(){
        if($user = Auth::user()){
            if($user->level == '2'){
                $wargas = User::all();
                $votingdata = Voting::all()->take(10);
                $banner = Banner::all()->where('end_date', '>=', now());
                $count = count($votingdata);
                $pengumumans = DB::table('pengumuman')->limit(5)->get();
                $beritas = DB::table('beritas')
                ->limit(5)
                ->orderBy('id', 'desc')
                ->get();
                date_default_timezone_set('Asia/Jakarta'); // Set timezone sesuai dengan lokasi Anda
                $hour = date('H'); // Ambil jam saat ini

                if ($hour >= 5 && $hour < 12) {
                    $greeting = 'Selamat pagi';
                    $image = 'bgwarga.svg';
                    $icon = 'day.svg';
                } else if ($hour >= 12 && $hour < 18) {
                    $greeting = 'Selamat siang';
                    $image = 'bgwarga.svg';
                    $icon = 'day.svg';
                } else {
                    $greeting = 'Selamat malam';
                    $image = 'evening.svg';
                    $icon = 'night.svg';
                }

                if ($user = Auth::user()){
                    if($user->jk == 'LAKI-LAKI'){
                        $profile = 'profile.png';
                    }else if($user->jk = 'PEREMPUAN'){
                        $profile = 'profile2.png';
                    }
                }

            //render view with posts
            return view('clients.index', compact('pengumumans','beritas','greeting','image','icon','wargas','votingdata','count', 'banner','profile'));
            }else{
                return redirect('pages.auth.login')->intended('login');
            }
        }
    }
}
