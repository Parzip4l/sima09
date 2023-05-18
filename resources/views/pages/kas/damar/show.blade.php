@extends('layout.master')

@section('content')
<nav class="page-breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Master Data</a></li>
    <li class="breadcrumb-item"><a href="#">Kas TPU Damar</a></li>
    <li class="breadcrumb-item active" aria-current="page">{{$data->tanggal}}</li>
  </ol>
</nav>

<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h6 class="card-title">Detail Kas TPU Damar Tanggal {{$data->tanggal}}</h6>
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
          <div class="mb-3">
            <label for="exampleInputNumber1" class="form-label">Tanggal</label>
            <input type="date" class="form-control" name="tanggal" value="{{ $data->tanggal }}" require disabled>
          </div>

          <div class="mb-3">
            <label for="exampleInputNumber1" class="form-label">Keterangan</label>
            <input type="text" class="form-control" name="keterangan" value="{{ $data->keterangan }}" require disabled >
          </div>

          <div class="mb-3">
            <label for="exampleInputNumber1" class="form-label">Jumlah Masuk</label>
            <input type="text" class="form-control" name="jumlah_masuk" value="{{ $data->jumlah_masuk }}" require disabled>
          </div>

          <div class="mb-3">
            <label for="exampleInputNumber1" class="form-label">Jumlah Keluar</label>
            <input type="text" class="form-control" name="jumlah_keluar" value="{{ $data->jumlah_keluar }}" require disabled>  
          </div>

          <div class="mb-3">
            <input type="hidden" class="form-control" name="saldo" value="{{ $data->saldo }}" require disabled>
          </div>

          <a href="{{ url('/kasdamar')}}" class="btn btn-primary">Kembali</a>
      </div>
    </div>
  </div>
</div>
@endsection
