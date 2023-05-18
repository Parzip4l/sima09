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
<div class="button-wrap">
    <div class="container">
        <a href="{{ route('catatan-kelahiran.create') }}" class="btn btn-primary w-100 mt-3">Buat Laporan Kelahiran</a>
    </div>
</div>
<div class="iuran-wrap">
    <div class="container">
        <div class="d-md-block col-md-12 col-xl-12 mt-3">
            <div class="card rounded">
                <div class="card-header">
                    <h6 class="text-center">Data Kelahiran Tahun {{ date('Y')}}</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Tanggal Lahir</th>
                                    <th scope="col">Jenis Kelamin</th>
                                    <th scope="col">Nama Ayah</th>
                                    <th scope="col">Nama Ibu</th>
                                </tr>
                            </thead>
                            @php
                                $nomor = 1;
                            @endphp
                            @foreach ($lahir as $d)
                            <tbody>
                                <tr>
                                    <td>{{$nomor++}}</td>
                                    <td>{{ $d->nama}}</td>
                                    <td>{{ $d->tanggallahir}}</td>
                                    <td>{{ $d->jk}}</td>
                                    <td>{{ $d->ayah}}</td>
                                    <td>{{ $d->ibu}}</td>
                                </tr>
                            </tbody>
                            @endforeach
                        </table>
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
    </div>
</div>
@endsection