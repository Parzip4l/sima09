@extends('layout.master')

@section('content')
<nav class="page-breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Additional Information</a></li>
    <li class="breadcrumb-item"><a href="{{ url('/pengaduan') }}">Pengaduan</a></li>
    <li class="breadcrumb-item active" aria-current="page">Detail Pengaduan</li>
  </ol>
</nav>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
  @endif

<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h6 class="card-title">Detail Pengaduan {{ $pengaduan->nama }} Dibuat Tanggal {{ $pengaduan->created_at }} </h6>
          <div class="mb-3">
            <label for="exampleInputNumber1" class="form-label">Nama Lengkap</label>
            <input type="text" class="form-control" name="judul" require value="{{ $pengaduan->nama }}">
          </div>

          <div class="mb-3">
            <label for="exampleInputNumber1" class="form-label">Email</label>
            <input type="text" class="form-control" name="isi" require value="{{ $pengaduan->email }}">
          </div>

          <div class="mb-3">
            <label for="exampleInputNumber1" class="form-label">Nomor Telepon</label>
            <input type="text" class="form-control" name="lampiran" require value="{{ $pengaduan->nomor_telepon }}">
          </div>

          <div class="mb-3">
            <label for="exampleInputNumber1" class="form-label">Jenis</label>
            <input type="text" class="form-control" name="jenis" require value="{{ $pengaduan->jenis }}">
          </div>

          <div class="mb-3">
            <label for="exampleInputNumber1" class="form-label">Pesan</label>
            <textarea class="form-control" cols="50" rows="20" name="lampiran" require value="">{{ $pengaduan->pesan }}</textarea>
          </div>

          <div class="mb-3">
            <label for="exampleInputNumber1" class="form-label">Status</label>
            <input type="text" class="form-control" name="status" require value="{{ $pengaduan->status }}">
          </div>
      </div>
    </div>
  </div>
</div>
@endsection
