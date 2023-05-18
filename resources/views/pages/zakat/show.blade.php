@extends('layout.master')

@section('content')
<nav class="page-breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Zakat</a></li>
    <li class="breadcrumb-item"><a href="{{ url('/zakat') }}">Data Pembayaran</a></li>
    <li class="breadcrumb-item active" aria-current="page">Detail Zakat</li>
  </ol>
</nav>

<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h6 class="card-title">Detail Pembayaran Zakat {{ $zakat->nama_pembayar }}</h6>
          <div class="mb-3">
            <label for="exampleInputNumber1" class="form-label">Nama Lengkap</label>
            <input type="text" class="form-control" name="judul" value="{{ $zakat->nama_pembayar }}" readonly>
          </div>

          <div class="mb-3">
                <label for="exampleInputNumber1" class="form-label">No KK</label>
                <input type="text" class="form-control" name="nokk" value="{{ $zakat->nokk }}">
            </div>

          <div class="mb-3">
            <label for="exampleInputNumber1" class="form-label">Jenis Zakat Yang Dibayarkan</label>
            <input type="text" class="form-control" name="isi" value="{{ $zakat->jenis }}">
          </div>

          <div class="mb-3">
            <label for="exampleInputNumber1" class="form-label">Jumlah Anggota Keluarga</label>
            <input type="text" class="form-control" name="lampiran" value="{{ $zakat->jumlah_zakat }} Keluarga">
          </div>

          <div class="mb-3">
            <a href="{{ url('/zakat') }}" class="btn btn-primary">Kembali</a>
          </div>

      </div>
    </div>
  </div>
</div>
@endsection
