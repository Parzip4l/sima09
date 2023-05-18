@extends('layout.master')

@section('content')
<nav class="page-breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Additional Information</a></li>
    <li class="breadcrumb-item active" aria-current="page">Tambah Data</li>
  </ol>
</nav>

<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h6 class="card-title">Buat Berita</h6>
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        <form action="{{ route('berita.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
          <div class="mb-3">
            <label for="exampleInputNumber1" class="form-label">Judul Berita</label>
            <input type="text" class="form-control" name="judul" require>
          </div>

          <div class="mb-3">
            <label for="exampleInputNumber1" class="form-label">Konten</label>
            <textarea name="konten" id="" cols="30" rows="10" class="form-control"></textarea>
          </div>

          <div class="mb-3">
            <label for="exampleInputNumber1" class="form-label">Featured Images</label>
            <input type="file" class="form-control" name="gambar" require>
          </div>

          <button class="btn btn-primary" type="submit">Simpan Data</button>
          <button class="btn btn-danger" type="reset">Reset Data</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
