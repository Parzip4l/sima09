@extends('layout.master')

@section('content')
<nav class="page-breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Additional Information</a></li>
    <li class="breadcrumb-item"><a href="#">Banner Information</a></li>
    <li class="breadcrumb-item active" aria-current="page">Tambah Data</li>
  </ol>
</nav>

<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h6 class="card-title">Buat Banner Baru</h6>
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        <form action="{{ route('bannersetting.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
          <div class="mb-3">
            <label for="exampleInputNumber1" class="form-label">Judul Banner</label>
            <input type="text" class="form-control" name="judul" required>
          </div>

          <div class="mb-3">
            <label for="exampleInputNumber1" class="form-label">Deskripsi</label>
            <textarea name="deskripsi" id="" cols="30" rows="10" class="form-control"></textarea>
          </div>

          <div class="mb-3">
            <label for="exampleInputNumber1" class="form-label">Tanggal Berakhir Display</label>
            <input type="date" class="form-control" name="end_date" required>
          </div>

          <div class="mb-3">
            <label for="exampleInputNumber1" class="form-label">Featured Images</label>
            <input type="file" class="form-control" name="gambar" required>
            <p class="text-danger">* Ukuran Gambar 1024 x 450</p>
          </div>

          <button class="btn btn-primary" type="submit">Simpan Data</button>
          <button class="btn btn-danger" type="reset">Reset Data</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
