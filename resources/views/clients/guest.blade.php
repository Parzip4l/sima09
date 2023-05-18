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
                        <h5 class="card-title mb-0 te">Buku Tamu TPU Cikuda</h6>
                        <p>Silahkan isi data kunjungan dengan lengkap</p>
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
                    <form action="{{ route('wargas.update', $user->id ) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="exampleInputNumber1" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" name="nama" require>
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputNumber1" class="form-label">No Handphone</label>
                        <input type="number" class="form-control" name="nohp" require>
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputNumber1" class="form-label">Alamat</label>
                        <input type="text" class="form-control" name="alamat" require>
                    </div>
                    
                    <div class="mb-3">
                        <label for="exampleInputNumber1" class="form-label">Tujuan</label>
                        <input type="text" class="form-control" name="tujuan" require>
                    </div>

                    <button class="btn btn-primary" type="submit">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> 

@endsection