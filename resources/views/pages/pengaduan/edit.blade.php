@extends('layout.master')

@section('content')
<nav class="page-breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Additional Information</a></li>
    <li class="breadcrumb-item"><a href="#">Pengaduan</a></li>
    <li class="breadcrumb-item active" aria-current="page">Edit Pengaduan</li>
  </ol>
</nav>

<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h6 class="card-title">Detail Pengaduan</h6>
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        <form action="{{ route('pengaduan.update', $pengaduan->id) }}" method="POST">
        @csrf
        @method('PUT')
          <div class="mb-3">
            <label for="exampleInputNumber1" class="form-label">Nama Lengkap</label>
            <input type="text" class="form-control" name="nama" value="{{$pengaduan->nama}}" required disabled>
            <input type="hidden" value="{{$pengaduan->nik}}">
          </div>

          <div class="mb-3">
            <label for="exampleInputNumber1" class="form-label">Email</label>
            <input type="text" class="form-control" name="email" value="{{$pengaduan->email}}" required disabled>
          </div>

          <div class="mb-3">
            <label for="exampleInputNumber1" class="form-label">Nomor Telepon</label>
            <input type="text" class="form-control" name="nomor_telepon" value="{{$pengaduan->nomor_telepon}}" required disabled>
          </div>

          <div class="mb-3">
            <label for="exampleInputNumber1" class="form-label">Judul Pengaduan</label>
            <input type="text" class="form-control" name="judul" value="{{$pengaduan->judul}}" required disabled>
          </div>

          <div class="mb-3">
            <label for="exampleInputNumber1" class="form-label">Jenis</label>
            <input type="text" class="form-control" name="jenis" value="{{$pengaduan->jenis}}" required disabled>
          </div>

          <div class="mb-3">
            <label for="exampleInputNumber1" class="form-label">Isi Pengaduan/Saran</label>
            <textarea name="isi" id="" cols="30" rows="10" class="form-control" disabled>{{$pengaduan->pesan}}</textarea>
          </div>

          <div class="mb-3">
            <label for="exampleInputNumber1" class="form-label">Status Pengaduan</label>
            <select name="status" id="" class="form-control">
                <option value="Menunggu" {{ $pengaduan->status == 'Menunggu' ? 'selected' : '' }}>Menunggu</option>
                <option value="Disetujui" {{ $pengaduan->status == 'Disetujui' ? 'selected' : '' }}>Disetujui</option>
                <option value="Ditolak" {{ $pengaduan->status == 'Ditolak' ? 'selected' : '' }}>Ditolak</option>
            </select>
          </div>

          <button class="btn btn-primary" type="submit">Edit Data</button>
          <a href="{{url('/pengumuman')}}" class="btn btn-outline-primary">Kembali</a>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
