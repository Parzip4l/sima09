@extends('layout.master')

@section('content')
<nav class="page-breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Master Data</a></li>
    <li class="breadcrumb-item"><a href="#">Zakat</a></li>
    <li class="breadcrumb-item active" aria-current="page">Tambah Data</li>
  </ol>
</nav>

<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h6 class="card-title">Input Data Zakat</h6>
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        <form action="{{ route('zakat.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
          <div class="mb-3">
            <label for="exampleInputNumber1" class="form-label">Nama</label>
            <input type="text" class="form-control" id="search-users" name="nama_pembayar" require autocomplete="off">
          </div>

          <div class="mb-3">
            <label for="exampleInputNumber1" class="form-label">Nomer KK</label>
            <input type="number" class="form-control" id="user-id" name="nokk" require>
          </div>

          <div class="mb-3">
            <label for="exampleInputNumber1" class="form-label">Tanggal Pembayaran</label>
            <input type="date" class="form-control" name="tanggal_pembayaran" require>
          </div>

          <div class="mb-3">
            <label for="exampleInputNumber1" class="form-label">Jenis</label>
            <select name="jenis" id="" class="form-control">
                <option value="beras">Beras</option>
                <option value="uang">Uang Tunai</option>
            </select>
          </div>

          <div class="mb-3">
            <label for="exampleInputNumber1" class="form-label">Jumlah Zakat</label>
            <input type="number" class="form-control" name="jumlah_zakat" require>
          </div>

          <div class="mb-3">
            <label for="exampleInputNumber1" class="form-label">Keterangan</label>
            <textarea name="keterangan" id="" cols="30" rows="10" class="form-control"></textarea>
          </div>

          <button class="btn btn-primary" type="submit">Simpan Data</button>
          <button class="btn btn-danger" type="reset">Reset Data</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection


<script>
    $(function() {
      jQuery('#search-users').autocomplete({
            source: '/users/search',
            minLength: 2,
            select: function(event, ui) {
                $('#search-users').val(ui.item.name);
                $('#user-id').val(ui.item.id);
                return false;
            }
        });
    });
</script>