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
        <h6 class="card-title">Buat Pengumuman</h6>
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        <form action="{{ route('umkm.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
          <div class="mb-3">
            <label for="exampleInputNumber1" class="form-label">Nama Toko</label>
            <input type="text" class="form-control" name="namatoko" required>
          </div>

          <div class="mb-3">
            <label for="exampleInputNumber1" class="form-label">Nama Pemilik</label>
            <input type="text" class="form-control" name="namapemilik" required>
          </div>

          <div class="mb-3">
            <label for="exampleInputNumber1" class="form-label">Nomor HP</label>
            <input type="text" class="form-control" name="nomorhp" required>
          </div>

          <div class="mb-3">
            <label for="exampleInputNumber1" class="form-label">Alamat Toko</label>
            <input type="text" class="form-control" name="alamattoko" required>
          </div>

          <div class="mb-3">
            <label for="exampleInputNumber1" class="form-label">Deskripsi</label>
            <input type="text" class="form-control" name="deskripsi" required>
          </div>

          <div class="mb-3">
            <label for="exampleInputNumber1" class="form-label">Jenis Toko</label>
            <select name="jenistoko" id="" class="form-control">
                <option value="Kuliner">Kuliner</option>
                <option value="Toko Kelontong">Toko Kelontong</option>
                <option value="Busana">Busana</option>
                <option value="Kerajinan">Kerajinan</option>
                <option value="Agrobisnis">Agrobisnis</option>
                <option value="Jasa Penatu">Jasa Penatu</option>
                <option value="Otomotif">Otomotif</option>
            </select>
          </div>

          <div class="mb-3">
            <label for="exampleInputNumber1" class="form-label">Website</label>
            <input type="text" class="form-control" name="website">
          </div>

          <div class="mb-3">
            <label for="exampleInputNumber1" class="form-label">Instagram</label>
            <input type="text" class="form-control" name="instagram">
          </div>

          <div class="mb-3">
            <label for="exampleInputNumber1" class="form-label">Facebook</label>
            <input type="url" class="form-control" name="facebook">
          </div>

          <div class="mb-3">
            <label for="exampleInputNumber1" class="form-label">Twitter</label>
            <input type="text" class="form-control" name="twitter">
          </div>

          <div class="mb-3">
            <label for="exampleInputNumber1" class="form-label">Gojek</label>
            <input type="text" class="form-control" name="gojek">
          </div>

          <div class="mb-3">
            <label for="exampleInputNumber1" class="form-label">Grab</label>
            <input type="text" class="form-control" name="grab">
          </div>

          <div class="mb-3">
            <label for="exampleInputNumber1" class="form-label">Shopee</label>
            <input type="text" class="form-control" name="shopee">
          </div>

          <div class="mb-3">
            <label for="exampleInputNumber1" class="form-label">Whatsapp</label>
            <input type="text" class="form-control" name="whatsapp" required>
          </div>

          <button class="btn btn-primary" type="submit">Simpan Data</button>
          <button class="btn btn-danger" type="reset">Reset Data</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
