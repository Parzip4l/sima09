<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Warga;
use App\User;
use App\KasRW;
use App\KasDkm;
use App\KasDamar;
use App\KasKarta;
use App\CatatanKematian;
use App\Kelahiran;
use Carbon\Carbon;
use Illuminate\Support\Collection;

class Dashboard extends Controller
{
    public function index(){
        $jumlah_data = User::count();
        $kasrw = KasRW::latest('saldo')->first();
        $kaskarta = KasKarta::latest('saldo')->first();
        $kasdkm = KasDkm::latest('saldo')->first();
        $kasdamar = KasDamar::latest('saldo')->first();
        $saldoupdate = KasRW::latest('tanggal')->first();
        $saldoupdate1 = KasKarta::latest('tanggal')->first();
        $saldoupdate2 = KasDkm::latest('tanggal')->first();
        $saldoupdate3 = KasDamar::latest('tanggal')->first();
        $laki = User::where('jk', 'LAKI-LAKI')->count();
        $perempuan = User::where('jk', 'PEREMPUAN')->count();
        $kk = User::where('hubungankk', 'Kepala Keluarga')->count();
        $rt1 = User::where('rt', '1')->count();
        $rt2 = User::where('rt', '2')->count();
        $rt3 = User::where('rt', '3')->count();
        $rt4 = User::where('rt', '4')->count();
        $kawin = User::where('statusperkawinan', 'Kawin')->count();
        $belumkawin = User::where('statusperkawinan', 'Belum Kawin')->count();
        $ceraihidup = User::where('statusperkawinan', 'Cerai Hidup')->count();
        $ceraimati = User::where('statusperkawinan', 'Cerai Mati')->count();
        $sd = User::where('pendidikan', 'Tamat SD/Sederajat')->count();
        $smp = User::where('pendidikan', 'Tamat SLTP/Sedejerat')->count();
        $sma = User::where('pendidikan', 'Tamat SLTA/Sederajat')->count();
        $perguruantinggi = User::where('pendidikan', 'Tamat PT/Akademi')->count();

        // Total Kas
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

        // Pekerjaan
        $tidakbekerja = User::where('pekerjaan', 'Tidak/Belum Bekerja')->count();
        $petani = User::where('pekerjaan', 'Petani')->count();
        $nelayan = User::where('pekerjaan', 'Nelayan')->count();
        $pedagang = User::where('pekerjaan', 'Pedagang')->count();
        $pejabat = User::where('pekerjaan', 'Pejabat')->count();
        $pns = User::where('pekerjaan', 'PNS/TNI/POLRI')->count();
        $swasta = User::where('pekerjaan', 'Pegawai Swasta')->count();
        $wiraswasta = User::where('pekerjaan', 'Wiraswasta')->count();
        $pensiunan = User::where('pekerjaan', 'Pensiunan')->count();
        $pekerjalepas = User::where('pekerjaan', 'Pekerja Lepas')->count();

        $dataasli = $jumlah_data - 5;

        // Query Usia
        $warga = User::all();

        // Menghitung usia warga dan mengelompokkan usia ke dalam kategori yang sesuai
        $balita = 0;
        $anak = 0;
        $remaja = 0;
        $dewasa = 0;
        $lansia = 0;
        $manula = 0;

        foreach ($warga as $data) {
            // Menghitung selisih antara tanggal lahir dan tanggal saat ini
            $tanggal = Carbon::createFromFormat('Y-m-d', $data->tanggallahir);
            $tanggal_formatted = $tanggal->format('d M Y');
            $usia = Carbon::parse($tanggal_formatted)->diff(Carbon::now())->y;

            // Mengelompokkan usia ke dalam kelompok usia yang sesuai
            if ($usia >= 0 && $usia <= 5) {
                $balita++;
            } elseif ($usia >= 5 && $usia <= 11) {
                $anak++;
            } elseif ($usia >= 17 && $usia <= 25) {
                $remaja++;
            } elseif ($usia >= 26 && $usia <= 45) {
                $dewasa++;
            } elseif ($usia >= 46 && $usia <= 65) {
                $lansia++;
            } else {
                $manula++;
            }
        }
        // End Usia

        // Persentase Kematian
        $currentYear = date('Y');
        $totalKematian = CatatanKematian::whereYear('tanggalmeninggal', '=', $currentYear)->count();

        $totalPenduduk = User::count();

        $persentaseKematian = $totalKematian / $totalPenduduk * 100;
        $formattedPersentase = number_format($persentaseKematian, 2);
        // End Persentase Kematian

        // Persentase Kelahiran
        $totalKelahiran = Kelahiran::whereYear('tanggallahir', '=', $currentYear)->count();

        $persentaseKelahiran = $totalKelahiran / $totalPenduduk * 100;
        $persentasereal = number_format($persentaseKelahiran, 2);
        // End Kelahiran

        $data = [
            'labels' => ['Laki-laki', 'Perempuan'],
            'datasets' => [
                [
                    'label' => 'Jenis Kelamin',
                    'backgroundColor' => ['#ff6384', '#36a2eb'],
                    'data' => [$laki, $perempuan],
                ]
            ]
        ];

        $datart = [
            'labels' => ['RT 01', 'RT 02', 'RT 03', 'RT 04'],
            'datasets' => [
                [
                    'label' => 'RT',
                    'backgroundColor' => ['#277BC0', '#FFB200', '#FFCB42', '#FFF4CF'],
                    'data' => [$rt1, $rt2, $rt3, $rt4],
                ]
            ]
        ];

        $datakawin = [
            'labels' => ['KAWIN', 'BELUM KAWIN', 'CERAI HIDUP', 'CERAI MATI'],
            'datasets' => [
                [
                    'label' => 'STATUS KAWIN',
                    'backgroundColor' => ['#0081C9', '#5BC0F8', '#86E5FF', '#FFC93C'],
                    'data' => [$kawin, $belumkawin, $ceraihidup, $ceraimati],
                ]
            ]
        ];

        $datapendidikan = [
            'labels' => ['SD', 'SMP', 'SMA/Sederajat', 'Perguruan Tinggi'],
            'datasets' => [
                [
                    'label' => 'DATA PENDIDIKAN',
                    'backgroundColor' => ['#0081C9', '#5BC0F8', '#86E5FF', '#FFC93C'],
                    'data' => [$sd, $smp, $sma, $perguruantinggi],
                ]
            ]
        ];

        $datapekerjaan = [
            'labels' => ['Tidak Bekerja', 'Petani', 'Nelayan', 'Pedagang', 'Pejabat Negara', 'PNS/TNI/POLRI', 'Pegawai Swasta', 'Wiraswasta', 'Pensiunan', 'Pekerjalepas'],
            'datasets' => [
                [
                    'label' => 'DATA PEKERJAAN',
                    'backgroundColor' => ['#0081C9', '#5BC0F8', '#86E5FF', '#FFC93C','#0081C9', '#5BC0F8', '#86E5FF', '#FFC93C','#36a2eb', '#ff6384'],
                    'data' => [$tidakbekerja, $petani, $nelayan, $pedagang, $pejabat, $pns, $swasta, $wiraswasta, $pensiunan, $pekerjalepas],
                ]
            ]
        ];

        $datausia = [
            'labels' => ['Balita', 'Anak', 'Remaja', 'Dewasa', 'Lansia', 'Manula'],
            'datasets' => [
                [
                    'label' => 'DATA USIA',
                    'backgroundColor' => ['#0081C9', '#5BC0F8', '#86E5FF', '#FFC93C','#0081C9'],
                    'data' => [$balita, $anak, $remaja, $dewasa, $lansia, $manula],
                ]
            ]
        ];


        
        return view('dashboard', compact(
            'dataasli',
            'laki',
            'perempuan',
            'kk',
            'kasrw',
            'kasdkm',
            'kasdamar',
            'kaskarta',
            'saldoupdate',
            'saldoupdate1',
            'saldoupdate2',
            'saldoupdate3',
            'data', 
            'datart',
            'datakawin',
            'datapendidikan',
            'datapekerjaan',
            'datausia',
            'totalKematian',
            'formattedPersentase',
            'totalKelahiran',
            'persentasereal',
            'currentYear',
            'totalsaldodamar',
            'totalsaldodkm',
            'totalsaldokarta',
            'totalsaldorw'
        ));
    }
}
