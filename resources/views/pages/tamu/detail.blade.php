@extends('layout.master')

@section('content')
<nav class="page-breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Buku Tamu</a></li>
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
            <p class="text-center">TPU Damar, Cikuda dan Margalaksana, Desa Hegarmanah</p>
          </div>
        </div>
        <div class="container-fluid mt-5 w-100">
          <div class="row">
            <div class="col-md-12 ms-auto">
                <div class="table-responsive">
                  <table class="table">
                      <tbody>
                        <tr>
                          <td>Nama Lengkap</td>
                          <td class="text-end">{{ $tamus->nama}}</td>
                        </tr>
                        <tr>
                          <td>Nomor Hp</td>
                          <td class="text-end">{{ $tamus->nohp}}</td>
                        </tr>
                        <tr>
                          <td class="text-bold-800">Alamat</td>
                          <td class="text-bold-800 text-end">{{$tamus->alamat}}</td>
                        </tr>
                        <tr>
                          <td>Tujuan</td>
                          <td class="text-success text-end">{{$tamus->tujuan}}</td>
                        </tr>
                        <tr class="bg-light">
                          <td class="text-bold-800">Tanggal / Jam Berkunjung</td>
                          <td class="text-bold-800 text-end">{{$tamus->created_at}}</td>
                        </tr>
                      </tbody>
                  </table>
                </div>
            </div>
          </div>
        </div>
        <div class="container-fluid w-100">
          <a href="javascript:;" class="btn btn-outline-primary float-end mt-4"><i data-feather="printer" class="me-2 icon-md"></i>Print</a>
          <a href="{{url('/tamu')}}" class="btn btn-primary float-end mt-4 me-2"><i data-feather="arrow-left" class="me-3 icon-md"></i>Kembali</a>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection