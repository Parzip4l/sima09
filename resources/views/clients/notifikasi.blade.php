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
                        <h5 class="card-title mb-0 text-center">Tidak Ada Notifikasi Terbaru</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> 
@endsection