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
            @foreach ($data as $d)
                <div class="tokoumkm mb-3">
                    <div class="card rounded">
                        <div class="card-header text-center">
                            <h5>Layanan Darurat {{ $d->namalayanan }}</h5>
                        </div>
                        <div class="card-body">
                            <div class="namapemilik mb-2">
                                <label for="" class="form-label">Nama Layanan :</label>
                                <h5>{{ $d->namalayanan }}</h5>
                            </div>

                            <div class="namapemilik mb-2">
                                <label for="" class="form-label">Nomor Telepon :</label>
                                <h5>{{ $d->nomorlayanan }}</h5>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            </div>
        </div>
    </div>
</div>
@endsection