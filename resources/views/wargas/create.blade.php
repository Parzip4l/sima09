@extends('layout.master')

@section('content')
<nav class="page-breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Data Warga</a></li>
    <li class="breadcrumb-item active" aria-current="page">Tambah Data</li>
  </ol>
</nav>



<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h6 class="card-title">Tambah Data Warga</h6>
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        <form action="{{ route('wargas.store') }}" method="POST">
        @csrf
          <div class="mb-3">
            <label for="exampleInputNumber1" class="form-label">NIK</label>
            <input type="number" class="form-control" name="nik" require>
          </div>

          <div class="mb-3">
            <label for="exampleInputNumber1" class="form-label">No KK</label>
            <input type="number" class="form-control" name="nokk" require>
          </div>

          <div class="mb-3">
            <label for="exampleInputNumber1" class="form-label">RW</label>
            <input type="number" class="form-control" name="rw" require value="09" readonly>
          </div>

          <div class="mb-3">
            <label for="exampleInputNumber1" class="form-label">RT</label>
            <select name="rt" class="form-control">
                <option value="01">01</option>
                <option value="02">02</option>
                <option value="03">03</option>
                <option value="04">04</option>
            </select>
          </div>

          <div class="mb-3">
            <label for="exampleInputText1" class="form-label">Nama Lengkap</label>
            <input type="text" class="form-control" name="nama" placeholder="Nama Lengkap" require>
          </div>

          <div class="mb-3">
            <label for="exampleInputEmail3" class="form-label">Jenis Kelamin</label>
            <select name="jk" class="form-control">
                <option value="LAKI-LAKI">LAKI-LAKI</option>
                <option value="PEREMPUAN">PEREMPUAN</option>
            </select>
          </div>

          <div class="mb-3">
            <label for="exampleInputEmail3" class="form-label">Hubungan Dengan Kepala Keluarga</label>
            <select name="hubungankk" class="form-control">
                <option value="Kepala Keluarga">Kepala Keluarga</option>
                <option value="Istri">Istri</option>
                <option value="Anak">Anak</option>
                <option value="Lainnya">Lainnya</option>
            </select>
          </div>

          <div class="mb-3">
            <label for="exampleInputEmail3" class="form-label">Agama</label>
            <select name="agama" class="form-control">
                <option value="ISLAM">ISLAM</option>
                <option value="KRISTEN">KRISTEN</option>
                <option value="KRISTEN">KRISTEN</option>
                <option value="KATHOLIK">KATHOLIK</option>
                <option value="HINDU">HINDU</option>
                <option value="BUDHA">BUDHA</option>
                <option value="KHONGHUCU">KHONGHUCU</option>
                <option value="PENGHAYAT KEPERCAYAAN">PENGHAYAT KEPERCAYAAN</option>
            </select>
          </div>
          <input type="hidden" name="level" value="2">

          <div class="mb-3">
            <label for="exampleInputEmail3" class="form-label">Pendidikan</label>
            <select name="pendidikan" class="form-control">
                <option value="Tidak/Belum Sekolah">Tidak/Belum Sekolah</option>
                <option value="Tidak Tamat SD/Sederajat">Tidak Tamat SD/Sederajat</option>
                <option value="Masih SD/Sederajat">Masih SD/Sederajat</option>
                <option value="Tamat SD/Sederajat">Tamat SD/Sederajat</option>
                <option value="Masih SLTP/Sederajat">Masih SLTP/Sederajat</option>
                <option value="Tamat SLTP/Sedejerat">Tamat SLTP/Sedejerat</option>
                <option value="Masih SLTA/Sederajat">Masih SLTA/Sederajat</option>
                <option value="Tamat SLTA/Sederajat">Tamat SLTA/Sederajat</option>
                <option value="Masih PT/Akademi">Masih PT/Akademi</option>
                <option value="Tamat PT/Akademi">Tamat PT/Akademi</option>
            </select>
          </div>

          <div class="mb-3">
            <label for="exampleInputEmail3" class="form-label">Pekerjaan</label>
            <select name="pekerjaan" class="form-control">
                <option value="Tidak/Belum Bekerja">Tidak/Belum Bekerja</option>
                <option value="Petani">Petani</option>
                <option value="Nelayan">Nelayan</option>
                <option value="Pedagang">Pedagang</option>
                <option value="Pejabat Negara">Pejabat Negara</option>
                <option value="PNS/TNI/POLRI">PNS/TNI/POLRI</option>
                <option value="Pegawai Swasta">Pegawai Swasta</option>
                <option value="Wiraswasta">Wiraswasta</option>
                <option value="Pensiunan">Pensiunan</option>
                <option value="Pekerja Lepas">Pekerja Lepas</option>
            </select>
          </div>

          <div class="mb-3">
            <label for="exampleInputDisabled1" class="form-label">Tanggal Lahir</label>
            <input type="date" class="form-control" name="tanggallahir" require>
          </div>

          <div class="mb-3">
            <label for="exampleInputPlaceholder" class="form-label">Tempat Lahir</label>
            <input type="text" class="form-control" name="tempatlahir" require>
          </div>

          <div class="mb-3">
            <label for="exampleInputEmail3" class="form-label">Status Perkawinan</label>
            <select name="statusperkawinan" class="form-control">
                <option value="Kawin">Kawin</option>
                <option value="Belum Kawin">Belum Kawin</option>
                <option value="Cerai Hidup">Cerai Hidup</option>
                <option value="Cerai Mati">Cerai Mati</option>
            </select>
          </div>

          <div class="mb-3">
            <label for="exampleInputReadonly" class="form-label">Email</label>
            <input type="email" class="form-control" id="exampleInputReadonly" name="email" require>
          </div>

          <div class="mb-3">
            <label for="exampleInputReadonly" class="form-label">Password</label>
            <input type="password" class="form-control" id="exampleInputReadonly" name="password" require>
          </div>

          <button class="btn btn-primary" type="submit">Simpan Data</button>
          <button class="btn btn-danger" type="reset">Reset Data</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
