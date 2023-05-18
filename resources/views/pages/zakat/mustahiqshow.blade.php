@extends('layout.master')

@section('content')
<nav class="page-breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Zakat</a></li>
    <li class="breadcrumb-item"><a href="{{ url('/zakat') }}">Data Mustahiq</a></li>
    <li class="breadcrumb-item active" aria-current="page">Detail Mustahiq</li>
  </ol>
</nav>

<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h6 class="card-title">Detail Mustahiq {{ $mustahiq->nama }}</h6>
        <p class="text-muted mb-2">Tanggal Diberikan: {{ $mustahiq->tanggal_diberikan}}</p>
        <hr>
          <div class="mb-3">
            <label for="exampleInputNumber1" class="form-label">Nama Lengkap</label>
            <input type="text" class="form-control" name="judul" value="{{ $mustahiq->nama }}" readonly>
          </div>

          <div class="mb-3">
            <label for="exampleInputNumber1" class="form-label">Jenis Mustahiq</label>
            <input type="text" class="form-control" name="judul" value="{{ $mustahiq->jenis }}" readonly>
          </div>

          <div class="mb-3">
            <label for="exampleInputNumber1" class="form-label">Alamat RT</label>
            <input type="text" class="form-control" name="judul" value="{{ $mustahiq->alamat }}" readonly>
          </div>

          <div class="mb-3">
            <label for="exampleInputNumber1" class="form-label">Jumlah Zakat Uang Yang Diberikan</label>
            <input type="text" class="form-control" name="judul" value="{{ $mustahiq->jumlah_zakat }}" readonly>
          </div>

          <div class="mb-3">
            <label for="exampleInputNumber1" class="form-label">Keterangan</label>
            <input type="text" class="form-control" name="judul" value="{{ $mustahiq->keterangan }}" readonly>
          </div>
          

          <div class="mb-3">
            <a href="{{ url('/mustahiq') }}" class="btn btn-primary">Kembali</a>
          </div>

      </div>
    </div>
  </div>
</div>
@endsection
