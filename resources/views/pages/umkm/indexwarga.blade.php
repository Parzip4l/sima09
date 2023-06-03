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
<div class="buttoncreate">
    <div class="container">
        <a href="{{ route('umkm.create') }}" class="btn btn-lg btn-primary w-100 mt-4 nb-2">Daftarkan UMKM</a>
    </div>
</div>
<div class="container mt-2">
    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    @if (session('success'))
        <div class="alert alert-success text-center">
            {{ session('success') }}
        </div>
    @endif
</div>
<div class="iuran-wrap">
    <div class="container">
        <div class="d-md-block col-md-12 col-xl-12 mt-3">
            <div class="umkm-card-wrap">
            @foreach ($data as $d)
                <div class="tokoumkm mb-3">
                    <div class="card rounded">
                        <div class="card-header text-center">
                            <h5>{{ $d->namatoko }}</h5>
                        </div>
                        <div class="card-body">
                            <div class="namapemilik mb-2">
                                <label for="" class="form-label">Nama Pemilik :</label>
                                <h5>{{ $d->namapemilik }}</h5>
                            </div>

                            <div class="namapemilik mb-2">
                                <label for="" class="form-label">Kategori Toko :</label>
                                <h5>{{ $d->jenistoko }}</h5>
                            </div>

                            <div class="alamattoko mb-2">
                                <label for="" class="form-label">Alamat Toko :</label>
                                <h5>{{ $d->alamattoko }}</h5>
                            </div>

                            <div class="nomorhp mb-2">
                                <label for="" class="form-label">Nomor Telepon :</label>
                                <h5>0{{ $d->nomorhp }}</h5>
                            </div>
                            <hr>
                            <a href="https://api.whatsapp.com/send?phone=62{{ $d->nomorhp }}" class="btn btn-sm btn-success w-100 mb-2">Chat Whatsapp</a>
                            <a href="{{ route('umkm.show', $d->id) }}" class="btn btn-sm btn-primary w-100">Lihat Detail</a>
                        </div>
                    </div>
                </div>
            @endforeach
            </div>
            @if ($count == 0)
            <div class="image-data mx-auto text-center">
                <img src="{{ asset('assets/icons/datanotfound.svg') }}" alt="" class="w-50">
            </div>
            <h6 class="text-center mt-4">Data tidak tersedia untuk saat ini!</h6>
            @endif
        </div>
    </div>
</div>
@endsection