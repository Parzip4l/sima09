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
                <h6 class="card-title">GANTI PASSWORD</h6>
                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
                <form action="{{ route('pass.update', $user->id ) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <input type="hidden" class="form-control" name="nik" value="{{ $user->nik }}" readonly>
                </div>

                <div class="mb-3">
                    <label for="exampleInputReadonly" class="form-label">Password Baru</label>
                    <input type="password" class="form-control" id="exampleInputReadonly" name="password" require>
                </div>

                <button class="btn btn-primary" type="submit">Ganti Password</button>
                </form>
            </div>
            </div>
        </div>
    </div>
</div> 

@endsection