@extends('layout.master')

@section('content')
<nav class="page-breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Master Data</a></li>
    <li class="breadcrumb-item"><a href="#">Mustahiq</a></li>
    <li class="breadcrumb-item active" aria-current="page">Tambah Data</li>
  </ol>
</nav>

<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h6 class="card-title">Input Data Mustahiq</h6>
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        <form action="{{ route('mustahiq.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
          <div class="mb-3">
            <label for="exampleInputNumber1" class="form-label">Nama</label>
            <input type="text" class="form-control" name="nama" require id="namamustahiq">
          </div>

          <div class="mb-3">
            <label for="exampleInputNumber1" class="form-label">Jenis Mustahiq</label>
            <select name="jenis" class="form-control" id="">
                <option value="Faqir">Faqir</option>
                <option value="Miskin">Miskin</option>
                <option value="Riqab">Riqab</option>
                <option value="Gharim">Gharim</option>
                <option value="Mualaf">Mualaf</option>
                <option value="Fisabilillah">Fisabilillah</option>
                <option value="Ibnu Sabil">Ibnu Sabil</option>
                <option value="Amil Zakat">Amil Zakat</option>
            </select>
          </div>

          <div class="mb-3">
            <label for="exampleInputNumber1" class="form-label">Alamat RT</label>
            <input type="text" class="form-control" name="alamat" id="alamat_mustahiq" require>
          </div>

          <div class="mb-3">
            <label for="exampleInputNumber1" class="form-label">Tanggal Diberikan</label>
            <input type="date" class="form-control" name="tanggal_diberikan" require>
          </div>

          <div class="mb-3">
            <label for="exampleInputNumber1" class="form-label">Jumlah Zakat</label>
            <input type="text" class="form-control" name="jumlah_zakat" require>
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