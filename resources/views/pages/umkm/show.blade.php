@extends('layout.master')

@section('content')
<nav class="page-breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Master Data</a></li>
    <li class="breadcrumb-item"><a href="#">UMKM</a></li>
    <li class="breadcrumb-item"><a href="#">Detail UMKM</a></li>
    <li class="breadcrumb-item active" aria-current="page">{{ $data->namatoko }}</li>
  </ol>
</nav>

<div class="row">
  <div class="col-md-8 mx-auto">
    <div class="card">
      <div class="card-body">
        <div class="container-fluid d-flex justify-content-between">
          <div class="col-lg-12  ps-0">
            <a href="#" class="noble-ui-logo d-block mt-3 text-center">SIMA09<span> UMKM</span></a>
            <h5 class="text-center">Toko - {{ $data->namatoko }}</h5>
          </div>
        </div>
        <hr>
        <div class="container-fluid mt-5 w-100">
          <div class="row">
            <div class="col-md-12 ms-auto">
                <div class="table-responsive">
                  <table class="table">
                      <tbody>
                        <tr>
                          <td>Nama Pemilik</td>
                          <td class="text-end">{{ $data->namapemilik}}</td>
                        </tr>
                        <tr>
                          <td>Nomor Hp</td>
                          <td class="text-end">0{{ $data->nomorhp}}</td>
                        </tr>
                        <tr>
                          <td class="text-bold-800">Alamat Toko</td>
                          <td class="text-bold-800 text-end">{{$data->alamattoko}}</td>
                        </tr>
                        <tr>
                          <td>Jenis Toko</td>
                          <td class="text-success text-end">{{$data->jenistoko}}</td>
                        </tr>
                        <tr>
                          <td>Deskripsi</td>
                          <td class="text-end">{{$data->deskripsi}}</td>
                        </tr>
                        <tr>
                          <td>Website</td>
                          <td class="text-end"><a href="{{$data->website}}">{{$data->website}}</a></td>
                        </tr>
                        <tr>
                          <td>Instagram</td>
                          <td class="text-end"><a href="{{$data->instagram}}">{{$data->instagram}}</a></td>
                        </tr>
                        <tr>
                          <td>Facebook</td>
                          <td class="text-end"><a href="{{$data->facebook}}">{{$data->facebook}}</a></td>
                        </tr>
                        <tr>
                          <td>Twitter</td>
                          <td class="text-end"><a href="{{$data->twitter}}">{{$data->twitter}}</a></td>
                        </tr>
                        <tr>
                          <td>Gojek</td>
                          <td class="text-end"><a href="{{$data->gojek}}">{{$data->gojek}}</a></td>
                        </tr>
                        <tr>
                          <td>Grab</td>
                          <td class="text-end"><a href="{{$data->grab}}">{{$data->grab}}</a></td>
                        </tr>
                        <tr>
                          <td>Shopee</td>
                          <td class="text-end"><a href="{{$data->shopee}}">{{$data->shopee}}</a></td>
                        </tr>
                      </tbody>
                  </table>
                </div>
            </div>
          </div>
        </div>
        <div class="container-fluid w-100">
          <a href="javascript:;" class="btn btn-outline-primary float-end mt-4"><i data-feather="printer" class="me-2 icon-md"></i>Print</a>
          <a href="{{url('/umkm')}}" class="btn btn-primary float-end mt-4 me-2"><i data-feather="arrow-left" class="me-3 icon-md"></i>Kembali</a>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection