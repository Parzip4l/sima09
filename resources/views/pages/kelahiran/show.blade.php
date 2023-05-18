@extends('layout.master')

@section('content')
<nav class="page-breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Catatan Kelahiran</a></li>
    <li class="breadcrumb-item active" aria-current="page">Detail</li>
  </ol>
</nav>

<div class="row">
  <div class="col-md-8 mx-auto">
    <div class="card">
      <div class="card-body">
        <div class="container-fluid d-flex justify-content-between">
          <div class="col-lg-12  ps-0">
            <a href="#" class="noble-ui-logo d-block mt-3 text-center">SIMA<span>09</span></a>
            <p class="text-center">Catatan Kelahiran Warga Dusun Margalaksana, Desa Hegarmanah, Kecamatan Jatinangor</p>
          </div>
        </div>
        <div class="container-fluid mt-5 w-100">
          <div class="row">
            <div class="col-md-12 ms-auto">
                <div class="table-responsive">
                  <table class="table">
                    <thead>
                        <h6>Telah Lahir Bayi dengan Detail Sebagai Berikut :</h6>
                        <hr>
                    </thead>
                      <tbody>
                        <tr>
                          <td>Nama Lengkap</td>
                          <td class="text-end">{{ $kelahiran->nama}}</td>
                        </tr>
                        <tr>
                          <td>Tanggal Lahir</td>
                          <td class="text-end">{{ $kelahiran->tanggallahir}}</td>
                        </tr>
                        <tr>
                        <tr>
                          <td>Jenis Kelamin</td>
                          <td class="text-end">{{ $kelahiran->jk}}</td>
                        </tr>
                        <tr>
                          <td>Tempat Lahir</td>
                          <td class="text-end">{{ $kelahiran->tempatlahir}}</td>
                        </tr>
                        <tr>
                          <td>Berat Lahir</td>
                          <td class="text-end">{{ $kelahiran->berat}} Kg</td>
                        </tr>
                        <tr>
                          <td>Panjang Lahir</td>
                          <td class="text-end">{{ $kelahiran->panjang}} Cm</td>
                        </tr>
                        <tr>
                          <td>Nama Ayah</td>
                          <td class="text-end">{{ $kelahiran->ayah}}</td>
                        </tr>
                        <tr>
                          <td>Nama Ibu</td>
                          <td class="text-end">{{ $kelahiran->ibu}}</td>
                        </tr>
                      </tbody>
                  </table>
                </div>
                <div class="table-responsive">
                  <table class="table">
                    <thead>
                        <h6 class="mt-3">Data Pelapor Kelahiran :</h6>
                        <hr>
                    </thead>
                      <tbody>
                        <tr>
                          <td>Nama Lengkap</td>
                          <td class="text-end">{{ $kelahiran->namapelapor}}</td>
                        </tr>
                        <tr>
                          <td>Nomor Hp</td>
                          <td class="text-end">{{ $kelahiran->nomortelepon}}</td>
                        </tr>
                        <tr>
                        <tr>
                          <td>Tanggal Laporan</td>
                          <td class="text-end">{{ $kelahiran->tanggallaporan}}</td>
                        </tr>
                        <tr>
                          <td>Alamat</td>
                          <td class="text-end">{{ $kelahiran->alamat}}</td>
                        </tr>
                      </tbody>
                  </table>
                </div>
            </div>
          </div>
        </div>
        <div class="container-fluid w-100">
          <a href="{{ route('kelahiran.generate', $kelahiran->id) }}" class="btn btn-outline-primary float-end mt-4"><i data-feather="file" class="me-2 icon-md"></i>Generate PDF</a>
          <a href="{{url('/tamu')}}" class="btn btn-primary float-end mt-4 me-2"><i data-feather="arrow-left" class="me-3 icon-md"></i>Kembali</a>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection