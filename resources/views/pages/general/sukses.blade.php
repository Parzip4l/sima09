@extends('layout.publik') @push('plugin-styles')
<link href="{{ asset('css/style.css') }}" rel="stylesheet" /> 
@endpush 
@section('content') 
<div class="profile-body warga-profile">
    <div class="container">
        <div class="d-md-block col-md-12 col-xl-12 left-wrapper">
            <div class="card rounded">
                <div class="card-body profile">
                    <div class="d-block align-items-center text-center mb-2">
                        <img class="imageswidth" src="{{ asset('assets/images/sukses.png') }}" alt="Guest Book SIMA 09">
                        <h5 class="card-title mb-0 text-success">Terimakasih Telah Mengisi Buku Tamu</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> 

@endsection