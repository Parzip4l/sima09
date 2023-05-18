@extends('layout.master')

@section('content')
<nav class="page-breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Additional Information</a></li>
    <li class="breadcrumb-item"><a href="#">Pengumuman</a></li>
    <li class="breadcrumb-item active" aria-current="page">Detail Pengumuman</li>
  </ol>
</nav>

<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h6 class="card-title">Detail Pengumuman</h6>
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        <form action="{{ route('pengumuman.update', $data->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
          <div class="mb-3">
            <label for="exampleInputNumber1" class="form-label">Judul Pengumuman</label>
            <input type="text" class="form-control" name="judul" value="{{$data->judul}}" required>
          </div>

          <div class="mb-3">
            <label for="exampleInputNumber1" class="form-label">Deskripsi Pengumuman</label>
            <input type="text" class="form-control" name="isi" value="{{$data->isi}}" required>
          </div>

          <div class="mb-3">
            <label for="exampleInputNumber1" class="form-label">File Pengumuman</label>
            <input type="file" class="form-control" name="lampiran" value="{{$data->lampiran}}" required>
            <p>{{ $data->lampiran }}</p>
          </div>

          <button class="btn btn-primary" type="submit">Edit Data</button>
          <a href="{{url('/pengumuman')}}" class="btn btn-outline-primary">Kembali</a>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
