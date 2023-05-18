@extends('layout.master')

@section('content')
<nav class="page-breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Catatan Kematian</a></li>
    <li class="breadcrumb-item active" aria-current="page">Details</li>
  </ol>
</nav>

<div class="row">
  <div class="col-md-6 mx-auto">
    <div class="card">
      <div class="card-body">
        <div class="container-fluid d-flex justify-content-between">
          <div class="col-lg-12 ps-0">
            <a href="#" class="noble-ui-logo d-block mt-3 text-center">SIMA<span>09</span></a>
            <h4 class="fw-bold text-uppercase mt-1 mb-2 text-center">Surat Kematian</h4>
            <h6 class="pb-4 text-center">No 29/474.3/DS/IC/2023</h6>
            <h5 class="mt-2 mb-2 text-muted text-center">Telah Meninggal Dunia Pada Tanggal {{$catatankematian->tanggalmeninggal}} <br> yang Bernama : <br><b class="mt-1 mb-1">{{ $catatankematian->nama }}</b></h5>
            <hr>
            <p class="mb-2">NIK : <br><span class="text-muted"> {{ $catatankematian->nik }}</span></p>
            <p class="mb-2">No Kartu Keluarga : <br><span class="text-muted"> {{ $catatankematian->nokk }}</span></p>
            <p class="mb-2">Jenis Kelamin : <br><span class="text-muted"> {{ $catatankematian->jk }}</span></p>
            <p class="mb-2">Tanggal Lahir : <br><span class="text-muted"> {{ $catatankematian->tanggallahir }}</span></p>
            <p class="mb-2">Agama : <br><span class="text-muted"> {{ $catatankematian->agama }}</span></p>
            <p class="mb-2">RT : <br><span class="text-muted"> {{ $catatankematian->rt }}</span></p>
            <p class="mb-2">RW : <br><span class="text-muted"> {{ $catatankematian->rw }}</span></p>
            <p class="mb-2">Desa : <br><span class="text-muted"> Hegarmanah</span></p>
            <p class="mb-2">Kecamatan : <br><span class="text-muted"> Jatinangor</span></p>
            <p class="mb-2">Kabupaten : <br><span class="text-muted"> Sumedang</span></p>
            <p class="mb-2">Provinsi : <br><span class="text-muted"> Jawa Barat</span></p>
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