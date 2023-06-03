@extends('layout.client') @push('plugin-styles')
<link href="{{ asset('css/style.css') }}" rel="stylesheet" /> 
@endpush 
@section('content') 
<div class="backwrap bg-white p-4">
    <div class="button d-flex">
        <a href="{{url('/umkm')}}" class="text-black">
            <i class="link-icon" data-feather="chevron-left"></i>
            Kembali
        </a>
    </div>
</div>
<div class="container mt-3">
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
            <div class="card-body">
            <h6 class="card-title">Buat UMKM </h6>
                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
        <form action="{{ route('umkm.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
          <div class="mb-3">
            <label for="exampleInputNumber1" class="form-label">Nama Toko</label>
            <input type="text" class="form-control" name="namatoko" placeholder="Toko ABC" required>
          </div>

          <div class="mb-3">
            <label for="exampleInputNumber1" class="form-label">Nama Pemilik</label>
            <input type="text" class="form-control" name="namapemilik" placeholder="Fulan" value="{{ Auth::user()->nama }}" required>
          </div>

          <div class="mb-3">
            <label for="exampleInputNumber1" class="form-label">Nomor HP</label>
            <input type="number" class="form-control" name="nomorhp" required>
          </div>

          <div class="mb-3">
            <label for="exampleInputNumber1" class="form-label">Alamat Toko</label>
            <input type="text" class="form-control" name="alamattoko" placeholder="Samping Kantor RW" required>
          </div>

          <div class="mb-3">
            <label for="exampleInputNumber1" class="form-label">Deskripsi</label>
            <input type="text" class="form-control" name="deskripsi" placeholder="Menjual Segala Kebutuhan Anda" required>
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
            <input type="text" class="form-control" name="website" placeholder="www.namawebsite.com">
          </div>

          <div class="mb-3">
            <label for="exampleInputNumber1" class="form-label">Instagram</label>
            <input type="text" class="form-control" name="instagram" placeholder="www.instagram.com/namainstagram">
          </div>

          <div class="mb-3">
            <label for="exampleInputNumber1" class="form-label">Facebook</label>
            <input type="url" class="form-control" name="facebook" placeholder="www.facebook.com/namafacebook">
          </div>

          <div class="mb-3">
            <label for="exampleInputNumber1" class="form-label">Twitter</label>
            <input type="text" class="form-control" name="twitter" placeholder="www.twitter.com/namatwitter">
          </div>

          <div class="mb-3">
            <label for="exampleInputNumber1" class="form-label">Gojek</label>
            <input type="text" class="form-control" name="gojek" placeholder="url gofood">
          </div>

          <div class="mb-3">
            <label for="exampleInputNumber1" class="form-label">Grab</label>
            <input type="text" class="form-control" name="grab" placeholder="url grabfood">
          </div>

          <div class="mb-3">
            <label for="exampleInputNumber1" class="form-label">Shopee</label>
            <input type="text" class="form-control" name="shopee" placeholder="url shopee Food">
          </div>

          <div class="mb-3">
            <label for="exampleInputNumber1" class="form-label">Whatsapp</label>
            <input type="number" class="form-control" name="whatsapp" required>
          </div>

          <div class="mb-3">
            <input type="hidden" class="form-control" name="verifikasi" value="Belum Terverifikasi" required>
          </div>

          <button class="btn btn-primary" type="submit">Simpan Data</button>
          <button class="btn btn-danger" type="reset">Reset Data</button>
        </form>
        </div>
    </div>
</div>
@endsection