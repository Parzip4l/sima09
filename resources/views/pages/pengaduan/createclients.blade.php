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
                        <div class="col-md-6">
                            <div class="d-flex justify-content-center align-items-center" style="margin-top:60px">
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
                    <div class="align-items-center justify-content-between mb-2">
                        <h5 class="card-title mb-0 text-center">Buat Pengaduan</h6>
                    </div>
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('pengaduan.store') }}">
                            @csrf

                            <input type="hidden" name="nik" value="{{ Auth::user()->nik }}">
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nama Lengkap') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="nama" value="{{ Auth::user()->nama }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Alamat Email') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Nomor Telepon') }}</label>

                                <div class="col-md-6">
                                    <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="nomor_telepon" value="{{ old('phone') }}" required autocomplete="phone">

                                    @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="complaint" class="col-md-4 col-form-label text-md-right">{{ __('Jenis') }}</label>

                                <div class="col-md-6">
                                    <select name="jenis" class="form-control" id="">
                                        <option value="Saran">Saran</option>
                                        <option value="Pengaduan">Pengaduan</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="judul" class="col-md-4 col-form-label text-md-right">{{ __('Judul') }}</label>
                                <div class="col-md-6">
                                    <input id="judul" type="text" class="form-control @error('judul') is-invalid @enderror" name="judul" value="{{ old('judul') }}" required autocomplete="judul">

                                    @error('judul')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $judul }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <input type="hidden" name="status" value="Menunggu">

                            <div class="form-group row">
                                <label for="complaint" class="col-md-4 col-form-label text-md-right">{{ __('Isi') }}</label>

                                <div class="col-md-6">
                                    <textarea id="complaint" class="form-control @error('complaint') is-invalid @enderror" name="pesan" rows="5" required autocomplete="complaint">{{ old('complaint') }}</textarea>

                                    @error('complaint')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4 mt-3">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Kirim Pengaduan') }}
                                    </button>
                                    <a href="{{url('/pengaduanwarga')}}" class="ms-2">Kembali</a>
                                </div>
                            </div>
                        </form>
                </div>
            </div>
        </div>
    </div>
</div> 
@endsection

@push('plugin-scripts')
  <script src="{{ asset('assets/plugins/datatables-net/jquery.dataTables.js') }}"></script>
  <script src="{{ asset('assets/plugins/datatables-net-bs5/dataTables.bootstrap5.js') }}"></script>
@endpush

@push('custom-scripts')
  <script src="{{ asset('assets/js/data-table.js') }}"></script>
@endpush