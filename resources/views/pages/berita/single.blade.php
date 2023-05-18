@extends('layout.client') @push('plugin-styles')
<link href="{{ asset('css/style.css') }}" rel="stylesheet" /> 
@endpush 
@section('content') 
<div class="header-single-wrap">
    <div class="back-button">
        <a href=""></a>
    </div>
</div>
<div class="notifikasi-body warga">
    <div class="container">
        <div class="d-md-block col-md-12 col-xl-12 left-wrapper">
            <div class="card rounded mb-5">
                <div class="card-body">
                    <div class="align-items-center justify-content-between mb-2">
                        <div class="berita-konten-wrap">
                            <div class="featured-image-single">
                                <img src="{{ asset('images/' .$berita->gambar) }}" alt="">
                            </div>
                            <div class="body-berita justify-content-between py-2">
                                <div class="category-berita">
                                    Umum
                                </div>
                                <h6 class="title-pengumuman"><a href="" class="judul-single">{{ $berita->judul }}</a></h6>
                            </div>
                            <div class="desc-berita-full">
                                <p>
                                    {{$berita->konten}}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> 
@endsection