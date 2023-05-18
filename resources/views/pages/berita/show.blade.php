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
        <h6 class="card-title">Detail Berita</h6>
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        <form action="{{ route('berita.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
          <div class="mb-3">
            <label for="exampleInputNumber1" class="form-label">Judul Berita</label>
            <input type="text" class="form-control" name="judul" value="{{$berita->judul}}" require>
          </div>

          <div class="mb-3">
            <label for="exampleInputNumber1" class="form-label">Konten</label>
            <textarea name="konten" id="" cols="30" rows="10" class="form-control">{{$berita->konten}}</textarea>
          </div>

          <a href="{{ url('/berita') }}" class="btn btn-primary" type="submit">Kembali</a>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
