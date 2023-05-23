@extends('layout.master')

@section('content')
<nav class="page-breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Master Data</a></li>
    <li class="breadcrumb-item"><a href="#">UMKM</a></li>
    <li class="breadcrumb-item"><a href="#">Update Data</a></li>
    <li class="breadcrumb-item active" aria-current="page">{{ $data->namatoko }}</li>
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
        <form action="{{ route('umkm.update', $data->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
          <div class="mb-3">
            <label for="exampleInputNumber1" class="form-label">Nama Toko</label>
            <input type="text" class="form-control" name="namatoko" value="{{ $data->namatoko }}" required>
          </div>

          <div class="mb-3">
            <label for="exampleInputNumber1" class="form-label">Nama Pemilik</label>
            <input type="text" class="form-control" name="namapemilik" value="{{ $data->namapemilik }}" required>
          </div>

          <div class="mb-3">
            <label for="exampleInputNumber1" class="form-label">Nomor HP</label>
            <input type="number" class="form-control" name="nomorhp" value="{{ $data->nomorhp }}" required>
          </div>

          <div class="mb-3">
            <label for="exampleInputNumber1" class="form-label">Alamat Toko</label>
            <input type="text" class="form-control" name="alamattoko" value="{{ $data->alamattoko }}" required>
          </div>

          <div class="mb-3">
            <label for="exampleInputNumber1" class="form-label">Deskripsi</label>
            <input type="text" class="form-control" name="deskripsi" value="{{ $data->deskripsi }}" required>
          </div>

          <div class="mb-3">
            <label for="exampleInputNumber1" class="form-label">Jenis Toko</label>
            <select name="jenistoko" id="" class="form-control">
                <option value="Kuliner" {{ $data->jenistoko == 'Kuliner' ? 'selected' : '' }}>Kuliner</option>
                <option value="Toko Kelontong" {{ $data->jenistoko == 'Toko Kelontong' ? 'selected' : '' }}>Toko Kelontong</option>
                <option value="Busana" {{ $data->jenistoko == 'Busana' ? 'selected' : '' }}>Busana</option>
                <option value="Kerajinan" {{ $data->jenistoko == 'Kerajinan' ? 'selected' : '' }}>Kerajinan</option>
                <option value="Agrobisnis" {{ $data->jenistoko == 'Agrobisnis' ? 'selected' : '' }}>Agrobisnis</option>
                <option value="Jasa Penatu" {{ $data->jenistoko == 'Jasa Penatu' ? 'selected' : '' }}>Jasa Penatu</option>
                <option value="Otomotif" {{ $data->jenistoko == 'Otomotif' ? 'selected' : '' }}>Otomotif</option>
            </select>
          </div>

          <div class="mb-3">
            <label for="exampleInputNumber1" class="form-label">Website</label>
            <input type="text" class="form-control" name="website" value="{{ $data->website }}" placeholder="www.namawebsite.com">
          </div>

          <div class="mb-3">
            <label for="exampleInputNumber1" class="form-label">Instagram</label>
            <input type="text" class="form-control" name="instagram" value="{{ $data->instagram }}" placeholder="www.instagram.com/namainstagram">
          </div>

          <div class="mb-3">
            <label for="exampleInputNumber1" class="form-label">Facebook</label>
            <input type="url" class="form-control" name="facebook" value="{{ $data->facebook }}" placeholder="www.facebook.com/namafacebook">
          </div>

          <div class="mb-3">
            <label for="exampleInputNumber1" class="form-label">Twitter</label>
            <input type="text" class="form-control" name="twitter" value="{{ $data->twitter }}" placeholder="www.twitter.com/namatwitter">
          </div>

          <div class="mb-3">
            <label for="exampleInputNumber1" class="form-label">Gojek</label>
            <input type="text" class="form-control" name="gojek" value="{{ $data->gojek }}" placeholder="Url Gojek">
          </div>

          <div class="mb-3">
            <label for="exampleInputNumber1" class="form-label">Grab</label>
            <input type="text" class="form-control" name="grab" value="{{ $data->grab }}" placeholder="Url Grab">
          </div>

          <div class="mb-3">
            <label for="exampleInputNumber1" class="form-label">Shopee</label>
            <input type="text" class="form-control" name="shopee" value="{{ $data->shopee }}" placeholder="Url Shopee Food">
          </div>

          <div class="mb-3">
            <label for="exampleInputNumber1" class="form-label">Whatsapp</label>
            <input type="number" class="form-control" name="whatsapp" value="{{ $data->whatsapp }}" required>
          </div>

          <button class="btn btn-primary" type="submit">Update Data</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
