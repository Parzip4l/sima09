@extends('layout.master')

@section('content')
<nav class="page-breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Master Data</a></li>
    <li class="breadcrumb-item"><a href="#">Kas RW</a></li>
    <li class="breadcrumb-item active" aria-current="page">Tambah Data</li>
  </ol>
</nav>

<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h6 class="card-title">Input Data KAS</h6>
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        <form action="{{ route('kaskarta.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
          <div class="mb-3">
            <label for="exampleInputNumber1" class="form-label">Tanggal</label>
            <input type="date" class="form-control" name="tanggal" require>
          </div>

          <div class="mb-3">
            <label for="exampleInputNumber1" class="form-label">Keterangan</label>
            <input type="text" class="form-control" name="keterangan" require>
          </div>

          <div class="mb-3">
            <label for="exampleInputNumber1" class="form-label">Jumlah Masuk</label>
            <input type="text" class="form-control" name="jumlah_masuk" require>
          </div>

          <div class="mb-3">
            <label for="exampleInputNumber1" class="form-label">Jumlah Keluar</label>
            <input type="text" class="form-control" name="jumlah_keluar" require>
          </div>

          <div class="mb-3">
            <input type="hidden" class="form-control" name="saldo" require>
          </div>

          <button class="btn btn-primary" type="submit">Simpan Data</button>
          <button class="btn btn-danger" type="reset">Reset Data</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
