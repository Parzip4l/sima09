@extends('layout.master')

@section('content')
<nav class="page-breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Additional Information</a></li>
    <li class="breadcrumb-item"><a href="#">Layanan Darurat</a></li>
    <li class="breadcrumb-item"><a href="#">Edit Data</a></li>
    <li class="breadcrumb-item active" aria-current="page">{{ $layanan->namalayanan }}</li>
  </ol>
</nav>

<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h6 class="card-title">Buat Layanan Darurat</h6>
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        <form action="{{ route('layanan-darurat.update', $layanan->id) }}" method="POST">
        @csrf
        @method('PUT')
          <div class="mb-3">
            <label for="exampleInputNumber1" class="form-label">Nama Layanan</label>
            <input type="text" class="form-control" name="namalayanan" value="{{$layanan->namalayanan}}" required>
          </div>

          <div class="mb-3">
            <label for="exampleInputNumber1" class="form-label">Nomor Layanan</label>
            <input type="text" class="form-control" name="nomorlayanan" value="{{$layanan->nomorlayanan}}" required>
          </div>

          <button class="btn btn-primary" type="submit">Update Data</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
