@extends('layout.client') @push('plugin-styles')
<link href="{{ asset('css/style.css') }}" rel="stylesheet" /> 
@endpush 
@section('content') 
<div class="backwrap bg-white p-4">
    <div class="button d-flex">
        <a href="{{url('/umkm')}}" class="text-black">
            <i class="link-icon" data-feather="chevron-left"></i>
            Kembali
        </a>
    </div>
</div>
<div class="iuran-wrap">
    <div class="container">
        <div class="d-md-block col-md-12 col-xl-12 mt-3">
            <div class="umkm-card-wrap">
                <div class="tokoumkm mb-3">
                    <div class="card rounded">
                        <div class="card-header text-center">
                            <h5>Informasi Toko</h5>
                        </div>
                        <div class="card-body">
                            <div class="namapemilik mb-2">
                                <label for="" class="form-label">Nama Toko :</label>
                                <h5>{{ $data->namatoko }}</h5>
                            </div>

                            <div class="namapemilik mb-2">
                                <label for="" class="form-label">Kategori Toko :</label>
                                <h5>{{ $data->jenistoko }}</h5>
                            </div>

                            <div class="alamattoko mb-2">
                                <label for="" class="form-label">Alamat Toko :</label>
                                <h5>{{ $data->alamattoko }}</h5>
                            </div>

                            <div class="nomorhp mb-2">
                                <label for="" class="form-label">Nomor Telepon :</label>
                                <h5>0{{ $data->nomorhp }}</h5>
                            </div>
                        </div>
                    </div>

                    <div class="card rounded mt-3">
                        <div class="card-header text-center">
                            <h5>Informasi Pemilik</h5>
                        </div>
                        <div class="card-body">
                            <div class="namapemilik mb-2">
                                <label for="" class="form-label">Nama Pemilik :</label>
                                <h5>{{ $data->namapemilik }}</h5>
                            </div>

                            <div class="namapemilik mb-2">
                                <label for="" class="form-label">Nomor Whatsapp :</label>
                                <h5>0{{ $data->nomorhp }}</h5>
                            </div>

                            <div class="alamattoko mb-2">
                                <label for="" class="form-label">Email :</label>
                                <h5>-</h5>
                            </div>

                            <div class="namapemilik mb-2">
                                <label for="" class="form-label">Alamat :</label>
                                <h5>Margalaksana</h5>
                            </div>
                        </div>
                    </div>

                    <div class="card rounded mt-3">
                        <div class="card-header text-center">
                            <h5>Informasi Bisnis</h5>
                        </div>
                        <div class="card-body">
                            <div class="namapemilik mb-2">
                                <label for="" class="form-label">Website :</label>
                                <h5><a class="text-dark" href="{{ $data->website }}">{{ $data->website }}</a></h5>
                            </div>

                            <div class="namapemilik mb-2">
                                <label for="" class="form-label">Instagram :</label>
                                <h5><a class="text-dark" href="{{ $data->instagram }}">{{ $data->instagram }}</a></h5>
                            </div>

                            <div class="alamattoko mb-2">
                            <label for="" class="form-label">Facebook :</label>
                                <h5><a class="text-dark" href="{{ $data->facebook }}">{{ $data->facebook }}</a></h5>
                            </div>

                            <div class="alamattoko mb-2">
                            <label for="" class="form-label">Twitter :</label>
                                <h5><a class="text-dark" href="{{ $data->twitter }}">{{ $data->facebook }}</a></h5>
                            </div>
                        </div>
                    </div>

                    <div class="card rounded mt-3">
                        <div class="card-header text-center">
                            <h5>E-Commerce</h5>
                        </div>
                        <div class="card-body">
                            <div class="namapemilik mb-2">
                                <a href="{{ $data->gofood }}" class="btn btn-sm btn-success w-100">Go Food</a>
                            </div>

                            <div class="namapemilik mb-2">
                                <a href="{{ $data->shopee }}" class="btn btn-sm btn-warning text-white w-100">Shopee</a>
                            </div>

                            <div class="namapemilik mb-2">
                                <a href="{{ $data->grab }}" class="btn btn-sm btn-success w-100">Grab Food</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection