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
                <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-1726856243851504"
     crossorigin="anonymous"></script>
<!-- Iklan Testing -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-1726856243851504"
     data-ad-slot="7571034847"
     data-ad-format="auto"
     data-full-width-responsive="true"></ins>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({});
</script>
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
                            <article id="post-{{ $berita->id }}">
                                <div class="desc-berita-full">
                                    <p>
                                        {!! $berita->konten !!}
                                    </p>
                                </div>
                            </article>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> 
@endsection