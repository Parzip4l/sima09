@extends('layout.publik') @push('plugin-styles')
<link href="{{ asset('css/style.css') }}" rel="stylesheet" /> 
@endpush 
@section('content') 
<div class="profile-body warga-profile">
    <div class="container">
        <div class="d-md-block col-md-12 col-xl-12 left-wrapper">
            <div class="card rounded">
                <div class="image-profile-bg2" style="background-image: url('{{ asset('assets/images/cametery.png') }}'); background-size:cover; height:100px;">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="d-flex justify-content-center align-items-center" style="margin-top:60px">
                                <!-- <div>
                                    <img class="wd-70 rounded-circle profile" src="{{ asset('assets/images/profile.png') }}" alt="profile">
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body profile">
                    <div class="d-block align-items-center text-center mb-2">
                        <h5 class="card-title mb-0 te">Buku Tamu TPU DAMAR</h6>
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
                    <form action="{{ route('tamu.store') }}" method="POST" class="mb-5">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleInputNumber1" class="form-label">Nama Lengkap<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="nama" required>
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputNumber1" class="form-label">No Handphone<span class="text-danger">*</span></label>
                        <input type="number" class="form-control" name="nohp" required>
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputNumber1" class="form-label">Alamat</label>
                        <textarea name="alamat" id="alamat" cols="30" rows="10" class="form-control"></textarea>
                    </div>
                    
                    <div class="mb-3">
                        <label for="exampleInputNumber1" class="form-label">Makam Yang Dituju<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="tujuan" placeholder="Makam Fulan/Fulanah" required>
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputNumber1" class="form-label">Saran</label>
                        <textarea name="saran" id="" cols="30" rows="10" class="form-control"></textarea>
                    </div>

                    <button class="btn btn-primary" type="submit">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> 

@endsection

<style>
    .required-form {
        color : red;
    }
</style>