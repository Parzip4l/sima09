@extends('layout.master')

@section('content')
<nav class="page-breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Data Kelahiran</a></li>
    <li class="breadcrumb-item active" aria-current="page">Tambah Data</li>
  </ol>
</nav>



<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h6 class="card-title">Tambah Data Kelahiran</h6>
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        <form action="{{ route('catatan-kelahiran.store') }}" method="POST">
        @csrf
          <div class="form-group mb-3">
              <label for="nama" class="form-label">Nama</label>
              <input type="text" name="nama" class="form-control" id="nama" placeholder="Masukkan nama bayi" required>
          </div>
          <div class="form-group mb-3">
              <label for="Tanggal Lahir" class="form-label">Tanggal Lahir</label>
              <input type="date" name="tanggallahir" class="form-control" id="tanggallahir" placeholder="Tanggal Lahir" required>
          </div>
          <div class="form-group mb-3">
              <label for="jk" class="form-label">Jenis Kelamin</label>
              <select name="jk" id="jk" class="form-control" required>
                  <option value="LAKI-LAKI">Laki-laki</option>
                  <option value="PEREMPUAN">Perempuan</option>
              </select>
          </div>
          <div class="form-group mb-3">
              <label for="tempatlahir" class="form-label">Tempat Lahir</label>
              <input type="text" name="tempatlahir" class="form-control" id="tempatlahir" placeholder="Sumedang" required>
          </div>
          <div class="form-group mb-3">
              <label for="berat" class="form-label">Berat Bayi</label>
              <input type="number" name="berat" class="form-control" id="berat" placeholder="2" required>
          </div>
          <div class="form-group mb-3">
              <label for="panjang" class="form-label">Panjang Bayi</label>
              <input type="text" name="panjang" class="form-control" id="panjang" placeholder="40" required>
          </div>
          <div class="form-group mb-3">
              <label for="ayah" class="form-label">Ayah</label>
              <input type="text" name="ayah" class="form-control" id="ayah" placeholder="Ayah" required>
          </div>
          <div class="form-group mb-3">
              <label for="ibu" class="form-label">Ibu</label>
              <input type="text" name="ibu" class="form-control" id="ibu" placeholder="Ibu" required>
          </div>
          <label for="alamat" class="form-label mt-2">Data Pelapor</label>
          <hr>
          <div class="form-group mb-3">
              <label for="nama" class="form-label">Nama Pelapor</label>
              <input type="text" name="namapelapor" class="form-control" id="namapelapor" placeholder="Nama Pelapor" required>
          </div>
          <div class="form-group mb-3">
              <label for="berat" class="form-label">Nomor Telepon</label>
              <input type="number" name="nomortelepon" class="form-control" id="nomortelepon" placeholder="2" required>
          </div>
          <div class="form-group mb-3">
              <label for="alamat" class="form-label">Alamat</label>
              <textarea name="alamat" id="alamat" class="form-control" cols="30" rows="10" required></textarea>
          </div>
          <div class="form-group mb-3">
              <label for="nama" class="form-label">Tanggal Laporan</label>
              <input type="date" name="tanggallaporan" class="form-control" id="tanggallaporan" placeholder="Nama Pelapor" required>
          </div>
          <button type="submit" class="btn btn-primary">Simpan Data</button>
          <button class="btn btn-danger" type="reset">Reset Data</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
@push('plugin-scripts')
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="//code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
  <script src="{{ asset('assets/plugins/datatables-net/jquery.dataTables.js') }}"></script>
  <script src="{{ asset('assets/plugins/datatables-net-bs5/dataTables.bootstrap5.js') }}"></script>
  <script src="{{ asset('assets/js/data-table.js') }}"></script>
@endpush

