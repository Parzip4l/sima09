<!DOCTYPE html>
<html>
<head>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
  <link href="{{ asset('css/fonts.css')}}" rel="stylesheet">
  <link href="{{ asset('assets/fonts/feather-font/css/iconfont.css') }}" rel="stylesheet" />
  <link href="{{ asset('css/app.css') }}" rel="stylesheet" />
  <style>
    body {
        font-family : "Roboto", Helvetica, sans-serif;
    }

    .main-wrapper {
        background-color : #fff!important;
    }

    .f400 {
        font-weight : 300;
        font-size : 16px;
    }

    .mb-1 {
        margin-bottom : 20px!important;
    }

    td {
        font-size : 14px!important;
        margin-bottom : 10px!important;
    }
  </style>
</head>
<body>
        <div class="row">
            <div class="col-md-8 mx-auto">
                <div class="card">
                <div class="card-body">
                    <div class="container-fluid d-flex justify-content-between">
                    <div class="col-lg-12  ps-0">
                        <a href="#" class="noble-ui-logo d-block mt-3 text-center" style="text-align:center; font-size:42px;">SIMA<span>09</span></a>
                        <p class="text-center" style="font-weight:300;">Catatan Kelahiran Warga Dusun Margalaksana, Desa Hegarmanah, Kecamatan Jatinangor</p>
                    </div>
                    </div>
                    <div class="container-fluid mt-5 w-100">
                    <div class="row">
                        <div class="col-md-12 ms-auto">
                            <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <h5 style="margin-bottom:10px;">Telah Lahir Bayi dengan Detail Sebagai Berikut :</h5>
                                </thead>
                                <tbody>
                                    <tr class="f400 mb-1" style="margin-bottom:10px;">
                                        <td>Nama Lengkap</td>
                                        <td class="text-end">{{ $kelahiran->nama}}</td>
                                    </tr>
                                    <tr class="f400 mb-1" style="margin-bottom:10px;">
                                        <td>Tanggal Lahir</td>
                                        <td class="text-end">{{ $kelahiran->tanggallahir}}</td>
                                    </tr>
                                    <tr class="f400 mb-1" style="margin-bottom:10px;">
                                        <td>Jenis Kelamin</td>
                                        <td class="text-end">{{ $kelahiran->jk}}</td>
                                    </tr>
                                    <tr class="f400 mb-1" style="margin-bottom:10px;">
                                        <td>Tempat Lahir</td>
                                        <td class="text-end">{{ $kelahiran->tempatlahir}}</td>
                                    </tr>
                                    <tr class="f400 mb-1" style="margin-bottom:10px;">
                                        <td>Berat Lahir</td>
                                        <td class="text-end">{{ $kelahiran->berat}} Kg</td>
                                    </tr>
                                    <tr class="f400 mb-1" style="margin-bottom:10px;">
                                        <td>Panjang Lahir</td>
                                        <td class="text-end">{{ $kelahiran->panjang}} Cm</td>
                                    </tr>
                                    <tr class="f400 mb-1" style="margin-bottom:10px;">
                                        <td>Nama Ayah</td>
                                        <td class="text-end">{{ $kelahiran->ayah}}</td>
                                    </tr>
                                    <tr class="f400 mb-1" style="margin-bottom:10px;">
                                        <td>Nama Ibu</td>
                                        <td class="text-end">{{ $kelahiran->ibu}}</td>
                                    </tr>
                                </tbody>
                            </table>
                            </div>
                            <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <h5 class="mt-3">Data Pelapor Kelahiran :</h5>
                                </thead>
                                <tbody>
                                    <tr class="f400 mb-1" style="margin-bottom:10px;">
                                        <td>Nama Lengkap</td>
                                        <td class="text-end">{{ $kelahiran->namapelapor}}</td>
                                    </tr>
                                    <tr class="f400 mb-1" style="margin-bottom:10px;">
                                        <td>Nomor Hp</td>
                                        <td class="text-end">{{ $kelahiran->nomortelepon}}</td>
                                    </tr>
                                    <tr class="f400 mb-1" style="margin-bottom:10px;">
                                        <td>Tanggal Laporan</td>
                                        <td class="text-end">{{ $kelahiran->tanggallaporan}}</td>
                                    </tr>
                                    <tr class="f400 mb-1" style="margin-bottom:10px;">
                                        <td>Alamat</td>
                                        <td class="text-end">{{ $kelahiran->alamat}}</td>
                                    </tr>
                                </tbody>
                            </table>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('assets/plugins/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('assets/js/template.js') }}"></script>
</body>
</html>