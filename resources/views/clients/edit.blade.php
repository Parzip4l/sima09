@extends('layout.client') @push('plugin-styles')
<link href="{{ asset('css/style.css') }}" rel="stylesheet" /> 
@endpush 
@section('content') 
<div class="profile-body warga-profile">
    <div class="container">
        <div class="d-md-block col-md-12 col-xl-12 left-wrapper">
            <div class="card rounded">
                <div class="image-profile-bg" style="background-image: url('{{ asset('assets/images/bgwarga.svg') }}'); background-size:contain;">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="d-flex justify-content-center align-items-center mt-5 mx-center">
                                <div>
                                    <img class="wd-70 rounded-circle profile" src="{{ asset('assets/images/profile.png') }}" alt="profile">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body profile">
                    <div class="d-block align-items-center text-center mb-2">
                        <h5 class="card-title mb-0 te">{{ Auth::user()->nama }}</h6>
                        <p>Warga Dusun Margalaksana RW 00{{ Auth::user()->rw }} RT 00{{ Auth::user()->rt }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> 

<div class="notifikasi-body warga">
    <div class="container">
        <div class="d-md-block col-md-12 col-xl-12 left-wrapper">
            <div class="card rounded">
                <div class="card-body">
                <h6 class="card-title">Edit Profile</h6>
                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
                <form action="{{ route('datasaya.update', $user->id ) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="exampleInputNumber1" class="form-label">NIK</label>
                    <input type="number" class="form-control" name="nik" value="{{ $user->nik }}" readonly>
                </div>

                <div class="mb-3">
                    <label for="exampleInputNumber1" class="form-label">No KK</label>
                    <input type="number" class="form-control" name="nokk" value="{{ Auth::user()->nokk }}" readonly>
                </div>

                <div class="mb-3">
                    <label for="exampleInputNumber1" class="form-label">RW</label>
                    <input type="number" class="form-control" name="rw" require value="{{ Auth::user()->rw }}">
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
                    <input type="text" class="form-control" name="nama" placeholder="Nama Lengkap" value="{{ Auth::user()->nama }}" require>
                </div>

                <div class="mb-3">
                    <label for="exampleInputText1" class="form-label">Jenis Kelamin</label>
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
                    <label for="pekerjaan" class="form-label">Pekerjaan</label>
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
                    <input type="date" class="form-control" name="tanggallahir" require value="{{ Auth::user()->tanggallahir }}">
                </div>

                <div class="mb-3">
                    <label for="exampleInputPlaceholder" class="form-label">Tempat Lahir</label>
                    <input type="text" class="form-control" name="tempatlahir" require value="{{ Auth::user()->tempatlahir }}">
                </div>

                <div class="mb-3">
                    <label for="exampleInputPlaceholder" class="form-label">Nama Ayah</label>
                    <input type="text" class="form-control" name="nama_ayah" require value="{{ Auth::user()->nama_ayah }}">
                </div>

                <div class="mb-3">
                    <label for="exampleInputPlaceholder" class="form-label">Nama Ibu</label>
                    <input type="text" class="form-control" name="nama_ibu" require value="{{ Auth::user()->nama_ibu }}">
                </div>

                <div class="mb-3">
                    <label for="exampleInputEmail3" class="form-label">Penghasilan Per Bulan</label>
                    <select name="penghasilanperbulan" class="form-control">
                        <option value="< 500000" {{ $user->penghasilanperbulan == '< 500000' ? 'selected' : '' }} >< 500000</option>
                        <option value="500000 - 2500000" {{ $user->penghasilanperbulan == '500000 - 2500000' ? 'selected' : '' }}>500000 - 2500000</option>
                        <option value="2500000 - 5000000" {{ $user->penghasilanperbulan == '2500000 - 5000000' ? 'selected' : '' }}>2500000 - 5000000</option>
                        <option value="5000000 - 10000000" {{ $user->penghasilanperbulan == '5000000 - 10000000' ? 'selected' : '' }}>5000000 - 10000000</option>
                        <option value="10000000 >" {{ $user->penghasilanperbulan == '10000000 >' ? 'selected' : '' }}>10000000 ></option>
                    </select>
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
                    <label for="exampleInputReadonly" class="form-label">Email</label>
                    <input type="email" class="form-control" id="exampleInputReadonly" name="email" require value="{{ Auth::user()->email }}">
                </div>

                <button class="btn btn-primary" type="submit">Simpan Data</button>
                <button class="btn btn-danger" type="reset">Reset Data</button>
                </form>
            </div>
            </div>
        </div>
    </div>
</div> 

@endsection