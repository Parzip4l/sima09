@extends('layout.client') @push('plugin-styles')
<link href="{{ asset('css/style.css') }}" rel="stylesheet" /> 
@endpush 
@section('content') 
<div class="notifikasi-body warga">
    <div class="container">
        <div class="d-md-block col-md-12 col-xl-12 left-wrapper">
            <div class="card rounded">
                <div class="card-body">
                    <div class="align-items-center justify-content-between mb-2">
                        <h6 class="mb-2 text-center {{$css}} ">{{$cekbayar}}</h6>
                        <div class="image-status-zakat">
                            <img src="{{ asset('assets/images/'. $gambarzakat) }}" alt="">
                        </div>
                        <div class="button-cek-laporan text-center mt-2">
                            <a href="{{ url('/laporanzakatwarga') }}" class="btn btn-success">Cek Laporan Zakat</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> 
@endsection