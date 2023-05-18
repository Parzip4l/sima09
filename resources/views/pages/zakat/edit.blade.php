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
          <form action="{{ route('zakat.update', $zakat->id ) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="exampleInputNumber1" class="form-label">Nama Lengkap</label>
                <input type="hidden" name="id" value="{{ $zakat->id }}">
                <input type="text" class="form-control" name="nama_pembayar" value="{{ $zakat->nama_pembayar }}">
            </div>

            <div class="mb-3">
                <label for="exampleInputNumber1" class="form-label">No KK</label>
                <input type="text" class="form-control" name="nokk" value="{{ $zakat->nokk }}">
            </div>

            <div class="mb-3">
                <label for="exampleInputNumber1" class="form-label">Tanggal Pembayaran</label>
                <input type="date" class="form-control" name="tanggal_pembayaran" value="{{ $zakat->tanggal_pembayaran }}">
            </div>

            <div class="mb-3">
                <label for="exampleInputNumber1" class="form-label">Jenis Zakat Yang Dibayarkan</label>
                <input type="text" class="form-control" name="jenis" value="{{ $zakat->jenis }}">
            </div>

            <div class="mb-3">
                <label for="exampleInputNumber1" class="form-label">Jumlah Anggota Keluarga</label>
                <input type="text" class="form-control" name="jumlah_zakat" value="{{ $zakat->jumlah_zakat }}">
            </div>
            <button class="btn btn-primary" type="submit">Update Data</button>
          </form>
      </div>
    </div>
  </div>
</div>
@endsection
