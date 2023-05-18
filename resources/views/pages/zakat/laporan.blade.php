@extends('layout.master')
<?php 
    $rupiah = $totaluang;
    $formatted_rupiah = "Rp " . number_format($rupiah, 0, ",", ".");
?>

@section('content')
<nav class="page-breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Laporan</a></li>
    <li class="breadcrumb-item active" aria-current="page">Zakat</li>
  </ol>
</nav>

<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-body">
        <div class="container-fluid d-flex justify-content-between">
          <div class="col-lg-5 ps-0">
            <a href="#" class="noble-ui-logo d-block mt-3">SI<span>MA09</span></a>
            <p>Dusun Margalaksana RW 09<br> Desa Hegarmanah, Kecamatan Jatinangor.</p>
          </div>
          <div class="col-lg-5 pe-0">
            <h4 class="fw-bold text-uppercase text-end mt-4 mb-2">Laporan Zakat Fitrah Ramadan 1444H</h4>
          </div>
        </div>
        <div class="container-fluid mt-5 d-flex justify-content-center w-100">
          <div class="table-responsive w-100">
              <table class="table table-bordered">
                <thead>
                  <tr>
                      <th>#</th>
                      <th>Jenis Zakat Yang Dibayarkan</th>
                      <th class="text-end">Jumlah Muzzaki</th>
                      <th class="text-end">Jumlah per Pembayaran</th>
                      <th class="text-end">Total</th>
                    </tr>
                </thead>
                <tbody>
                  <tr class="text-end">
                    <td class="text-start">1</td>
                    <td class="text-start">Beras</td>
                    <?php foreach ($zakatByType as $zakat) { ?>
                      <?php $muzaqiberas = $zakat->total?>
                      <td id="jumlahberas1">{{ $muzaqiberas }}</td>
                      <?php $totalberas1 = $muzaqiberas * 2.5 ?>
                    <?php } ?>
                    <td id="jumlahberas2">2.5 Kg</td>
                    <td id="totalberas">{{ $totalberas1 }} Kg</td>
                  </tr>
                  <tr class="text-end">
                    <td class="text-start">2</td>
                    <td class="text-start">Uang Tunai</td>
                    <?php foreach ($zakatByuang as $zakatuang) { ?>
                      <?php $muzaqiuang = $zakatuang->total; ?>
                    <td>{{ $muzaqiuang }}</td>
                    <?php $totaluang1 = $muzaqiuang * 32500 ?>
                    <?php $formatted_rupiah2 = "Rp " . number_format($totaluang1, 0, ",", "."); ?>
                    <?php } ?>
                    <td>Rp. 32.500</td>
                    <td>{{ $formatted_rupiah2 }}</td>
                  </tr>
                </tbody>
              </table>
            </div>
        </div>
        <div class="container-fluid mt-5 w-100">
          <div class="row">
            <div class="col-md-6 ms-auto">
                <div class="table-responsive">
                  <table class="table">
                      <tbody>
                        <tr class="bg-light">
                          <td class="text-bold-800">Total Muzzaki</td>
                          <?php $totalmuzaqi = $muzaqiuang + $muzaqiberas; ?>
                          <td class="text-bold-800 text-end">{{$totalmuzaqi}} Jiwa</td>
                        </tr>
                      </tbody>
                  </table>
                </div>
            </div>
          </div>
        </div>

        <div class="container-fluid mt-5 d-flex justify-content-center w-100">
          <div class="table-responsive w-100">
              <table class="table table-bordered">
                <thead>
                  <tr>
                      <th>#</th>
                      <th>Jenis Mustahiq</th>
                      <th class="text-end">RT 01</th>
                      <th class="text-end">RT 02</th>
                      <th class="text-end">RT 03</th>
                      <th class="text-end">RT 04</th>
                      <th class="text-end">Jumlah Mustahiq</th>
                    </tr>
                </thead>
                <tbody>
                  <tr class="text-end">
                    <td class="text-start">1</td>
                    <td class="text-start">Fakir</td>
                    <?php foreach ($totalMustahiq as $mustahiqrt1) { ?>
                      <?php $penerima1 = $mustahiqrt1->total ?>
                    <td>{{$penerima1}}</td>
                    <?php } ?>
                    <?php foreach ($totalMustahiq1 as $mustahiqrt2) { ?>
                      <?php $penerima2 = $mustahiqrt2->total ?>
                    <td>{{$penerima2}}</td>
                    <?php } ?>
                    <?php foreach ($totalMustahiq2 as $mustahiqrt3) { ?>
                      <?php $penerima3 = $mustahiqrt3->total ?>
                    <td>{{$penerima3}}</td>
                    <?php } ?>
                    <?php foreach ($totalMustahiq3 as $mustahiqrt4) { ?>
                      <?php $penerima4 = $mustahiqrt4->total ?>
                    <td>{{$penerima4}}</td>
                    <?php } ?>
                    <td>{{$fakir}}</td>
                  </tr>
                  <tr class="text-end">
                    <td class="text-start">2</td>
                    <td class="text-start">Miskin</td>
                    <?php foreach ($totalmiskin as $miskinrt1) { ?>
                      <?php $miskin1 = $miskinrt1->total ?>
                    <td>{{$miskin1}}</td>
                    <?php } ?>
                    <?php foreach ($totalmiskin1 as $miskinrt2) { ?>
                      <?php $miskin2 = $miskinrt2->total ?>
                    <td>{{$miskin2}}</td>
                    <?php } ?>
                    <?php foreach ($totalmiskin2 as $miskinrt3) { ?>
                      <?php $miskin3 = $miskinrt3->total ?>
                    <td>{{$miskin3}}</td>
                    <?php } ?>
                    <?php foreach ($totalmiskin3 as $miskinrt4) { ?>
                      <?php $miskin4 = $miskinrt4->total ?>
                    <td>{{$miskin4}}</td>
                    <?php } ?>
                    <td>{{$miskin}}</td>
                  </tr>
                  <tr class="text-end">
                    <td class="text-start">3</td>
                    <td class="text-start">Riqab</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>{{$riqab}}</td>
                  </tr>
                  <tr class="text-end">
                    <td class="text-start">4</td>
                    <td class="text-start">Gharim</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>{{$gharim}}</td>
                  </tr>
                  <tr class="text-end">
                    <td class="text-start">5</td>
                    <td class="text-start">Mualaf</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>{{$mualaf}}</td>
                  </tr>
                  <tr class="text-end">
                    <td class="text-start">6</td>
                    <td class="text-start">Fisabilillah</td>
                    <?php foreach ($totalfisabil as $totalfisabilrt1) { ?>
                      <?php $fisabil1 = $totalfisabilrt1->total ?>
                    <td>{{$fisabil1}}</td>
                    <?php } ?>
                    <?php foreach ($totalfisabil1 as $totalfisabilrt2) { ?>
                      <?php $fisabil2 = $totalfisabilrt2->total ?>
                    <td>{{$fisabil2}}</td>
                    <?php } ?>
                    <?php foreach ($totalfisabil2 as $totalfisabilrt3) { ?>
                      <?php $fisabil3 = $totalfisabilrt3->total ?>
                    <td>{{$fisabil3}}</td>
                    <?php } ?>
                    <?php foreach ($totalfisabil3 as $totalfisabilrt4) { ?>
                      <?php $fisabil4 = $totalfisabilrt4->total ?>
                    <td>{{$fisabil4}}</td>
                    <?php } ?>
                    <td>{{$fisabil}}</td>
                  </tr>
                  <tr class="text-end">
                    <td class="text-start">7</td>
                    <td class="text-start">Ibnu Sabil</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>{{$ibnu}}</td>
                  </tr>
                  <tr class="text-end">
                    <td class="text-start">8</td>
                    <td class="text-start">Amil Zakat</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>{{$amil}}</td>  
                  </tr>
                </tbody>
              </table>
            </div>
        </div>
        <div class="container-fluid mt-5 w-100">
          <div class="row">
            <div class="col-md-6 ms-auto">
                <div class="table-responsive">
                  <table class="table">
                      <tbody>
                        <tr class="bg-light">
                          <td class="text-bold-800">Total Mustahiq</td>
                          <td class="text-bold-800 text-end">{{$mustahiq_total}} Jiwa</td>
                        </tr>
                      </tbody>
                  </table>
                </div>
            </div>
          </div>
        </div>
        <div class="container-fluid w-100">
          <a href="javascript:;" class="btn btn-outline-primary float-end mt-4"><i data-feather="printer" class="me-2 icon-md"></i>Print</a>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection