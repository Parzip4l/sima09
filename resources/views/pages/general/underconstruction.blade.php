@extends('layout.client') @push('plugin-styles')
<link href="{{ asset('css/style.css') }}" rel="stylesheet" /> 
@endpush 
@section('content') 
<div class="backwrap bg-white p-4">
    <div class="button d-flex">
        <a href="{{url('/allfeatures')}}" class="text-black">
            <i class="link-icon" data-feather="chevron-left"></i>
            Kembali
        </a>
    </div>
</div>
<div class="iuran-wrap">
    <div class="container">
        <div class="d-md-block col-md-12 col-xl-12 mt-3">
            <div class="umkm-card-wrap">
                <img src="{{ asset('assets/icons/underconstruction.svg') }}" alt="">
                <h3 class="text-primary text-center">Cooming Soon!</h3>
                <p class="text-center text-muted px-3">Layanan ini dalam tahap pengembangan, Layanan ini akan segera hadir di update berikutnya</p>
            </div>
        </div>
    </div>
</div>
@endsection