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
        <form action="{{ route('wargas.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')
          <div class="mb-3">
            <label for="exampleInputNumber1" class="form-label">NIK</label>
            <input type="hidden" value="{{$user->id}}" name="id">
            <input type="number" class="form-control" name="nik" value="{{ $user->nik }}" require>
          </div>

          <div class="mb-3">
            <label for="exampleInputNumber1" class="form-label">No KK</label>
            <input type="number" class="form-control" name="nokk" value="{{ $user->nokk }}" require>
          </div>

          <div class="mb-3">
            <label for="exampleInputNumber1" class="form-label">RW</label>
            <input type="number" class="form-control" name="rw" require value="09" readonly>
          </div>

          <div class="mb-3">
            <label for="exampleInputNumber1" class="form-label">RT</label>
            <select name="rt" class="form-control">
                <option value="01" {{ $user->rt == '01' ? 'selected' : '' }}>01</option>
                <option value="02" {{ $user->rt == '02' ? 'selected' : '' }}>02</option>
                <option value="03" {{ $user->rt == '03' ? 'selected' : '' }}>03</option>
                <option value="04" {{ $user->rt == '04' ? 'selected' : '' }}>04</option>
            </select>
          </div>

          <div class="mb-3">
            <label for="exampleInputText1" class="form-label">Nama Lengkap</label>
            <input type="text" class="form-control" name="nama" value="{{ $user->nama }}" placeholder="Nama Lengkap" require>
          </div>

          <div class="mb-3">
            <label for="exampleInputEmail3" class="form-label">Jenis Kelamin</label>
            <select name="jk" class="form-control">
                <option value="LAKI-LAKI" {{ $user->jk == 'LAKI-LAKI' ? 'selected' : '' }}>LAKI-LAKI</option>
                <option value="PEREMPUAN" {{ $user->jk == 'PEREMPUAN' ? 'selected' : '' }}>PEREMPUAN</option>
            </select>
          </div>

          <div class="mb-3">
            <label for="exampleInputEmail3" class="form-label">Hubungan Dengan Kepala Keluarga</label>
            <select name="hubungankk" class="form-control">
                <option value="Kepala Keluarga" {{ $user->hubungankk == 'Kepala Keluarga' ? 'selected' : '' }}>Kepala Keluarga</option>
                <option value="Istri" {{ $user->hubungankk == 'Istri' ? 'selected' : '' }}>Istri</option>
                <option value="Anak" {{ $user->hubungankk == 'Anak' ? 'selected' : '' }}>Anak</option>
                <option value="Lainnya" {{ $user->hubungankk == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
            </select>
          </div>

          <div class="mb-3">
            <label for="exampleInputEmail3" class="form-label">Agama</label>
            <select name="agama" class="form-control">
                <option value="ISLAM" {{ $user->agama == 'ISLAM' ? 'selected' : '' }}>ISLAM</option>
                <option value="KRISTEN" {{ $user->agama == 'KRISTEN' ? 'selected' : '' }}>KRISTEN</option>
                <option value="PROTESTAN" {{ $user->agama == 'PROTESTAN' ? 'selected' : '' }}>PROTESTAN</option>
                <option value="KATHOLIK" {{ $user->agama == 'KATHOLIK' ? 'selected' : '' }}> >KATHOLIK</option>
                <option value="HINDU" {{ $user->agama == 'HINDU' ? 'selected' : '' }}>HINDU</option>
                <option value="BUDHA" {{ $user->agama == 'BUDHA' ? 'selected' : '' }}>BUDHA</option>
                <option value="KHONGHUCU" {{ $user->agama == 'KHONGHUCU' ? 'selected' : '' }}>KHONGHUCU</option>
                <option value="PENGHAYAT KEPERCAYAAN" {{ $user->agama == 'PENGHAYAT KEPERCAYAAN' ? 'selected' : '' }}>PENGHAYAT KEPERCAYAAN</option>
            </select>
          </div>
          <input type="hidden" name="level" value="2">
          <div class="mb-3">
            <label for="exampleInputEmail3" class="form-label">Pendidikan</label>
            <select name="pendidikan" class="form-control">
                <option value="Tidak/Belum Sekolah" {{ $user->pendidikan == 'Tidak/Belum Sekolah' ? 'selected' : '' }}>Tidak/Belum Sekolah</option>
                <option value="Tidak Tamat SD/Sederajat" {{ $user->pendidikan == 'Tidak Tamat SD/Sederajat' ? 'selected' : '' }}>Tidak Tamat SD/Sederajat</option>
                <option value="Masih SD/Sederajat" {{ $user->pendidikan == 'Masih SD/Sederajat' ? 'selected' : '' }}>Masih SD/Sederajat</option>
                <option value="Tamat SD/Sederajat" {{ $user->pendidikan == 'Tamat SD/Sederajat' ? 'selected' : '' }}>Tamat SD/Sederajat</option>
                <option value="Masih SLTP/Sederajat" {{ $user->pendidikan == 'Masih SLTP/Sederajat' ? 'selected' : '' }}>Masih SLTP/Sederajat</option>
                <option value="Tamat SLTP/Sedejerat" {{ $user->pendidikan == 'Tamat SLTP/Sedejerat' ? 'selected' : '' }}>Tamat SLTP/Sedejerat</option>
                <option value="Masih SLTA/Sederajat" {{ $user->pendidikan == 'Masih SLTA/Sederajat' ? 'selected' : '' }}>Masih SLTA/Sederajat</option>
                <option value="Tamat SLTA/Sederajat" {{ $user->pendidikan == 'Tamat SLTA/Sederajat' ? 'selected' : '' }}>Tamat SLTA/Sederajat</option>
                <option value="Masih PT/Akademi" {{ $user->pendidikan == 'Masih PT/Akademi' ? 'selected' : '' }}>Masih PT/Akademi</option>
                <option value="Tamat PT/Akademi" {{ $user->pendidikan == 'Tamat PT/Akademi' ? 'selected' : '' }}>Tamat PT/Akademi</option>
            </select>
          </div>

          <div class="mb-3">
            <label for="exampleInputEmail3" class="form-label">Pekerjaan</label>
            <select name="pekerjaan" class="form-control">
                <option value="Tidak/Belum Bekerja" {{ $user->pekerjaan == 'Tidak/Belum Bekerja' ? 'selected' : '' }}>Tidak/Belum Bekerja</option>
                <option value="Petani" {{ $user->pekerjaan == 'Petani' ? 'selected' : '' }}>Petani</option>
                <option value="Nelayan" {{ $user->pekerjaan == 'Nelayan' ? 'selected' : '' }}>Nelayan</option>
                <option value="Pedagang" {{ $user->pekerjaan == 'Pedagang' ? 'selected' : '' }}>Pedagang</option>
                <option value="Pejabat Negara" {{ $user->pekerjaan == 'Pejabat Negara' ? 'selected' : '' }}>Pejabat Negara</option>
                <option value="PNS/TNI/POLRI" {{ $user->pekerjaan == 'PNS/TNI/POLRI' ? 'selected' : '' }}>PNS/TNI/POLRI</option>
                <option value="Pegawai Swasta" {{ $user->pekerjaan == 'Pegawai Swasta' ? 'selected' : '' }}>Pegawai Swasta</option>
                <option value="Wiraswasta" {{ $user->pekerjaan == 'Wiraswasta' ? 'selected' : '' }}>Wiraswasta</option>
                <option value="Pensiunan" {{ $user->pekerjaan == 'Pensiunan' ? 'selected' : '' }}>Pensiunan</option>
                <option value="Pekerja Lepas" {{ $user->pekerjaan == 'Pekerja Lepas' ? 'selected' : '' }}>Pekerja Lepas</option>
            </select>
          </div>

          <div class="mb-3">
            <label for="exampleInputDisabled1" class="form-label">Tanggal Lahir</label>
            <input type="date" class="form-control" name="tanggallahir" value="{{ $user->tanggallahir}}" require>
          </div>

          <div class="mb-3">
            <label for="exampleInputPlaceholder" class="form-label">Tempat Lahir</label>
            <input type="text" class="form-control" name="tempatlahir" value="{{ $user->tempatlahir }}" require>
          </div>

          <div class="mb-3">
            <label for="exampleInputEmail3" class="form-label">Status Perkawinan</label>
            <select name="statusperkawinan" class="form-control">
                <option value="Kawin" {{ $user->statusperkawinan == 'Kawin' ? 'selected' : '' }} >Kawin</option>
                <option value="Belum Kawin" {{ $user->statusperkawinan == 'Belum Kawin' ? 'selected' : '' }}>Belum Kawin</option>
                <option value="Cerai Hidup" {{ $user->statusperkawinan == 'Cerai Hidup' ? 'selected' : '' }}>Cerai Hidup</option>
                <option value="Cerai Mati" {{ $user->statusperkawinan == 'Cerai Mati' ? 'selected' : '' }}>Cerai Mati</option>
            </select>
          </div>

          <div class="mb-3">
            <label for="exampleInputReadonly1" class="form-label">Email</label>
            <input type="email" class="form-control" id="exampleInputReadonly1" value="{{ $user->email }}" name="email" require>
          </div>

          <div class="mb-3">
            <label for="exampleInputReadonly" class="form-label">Password</label>
            <input type="password" class="form-control" id="exampleInputReadonly" value="" name="password" require>
          </div>

          <button class="btn btn-primary" type="submit">Update Data</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
