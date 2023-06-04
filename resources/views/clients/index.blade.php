@extends('layout.client') @push('plugin-styles')
<link href="{{ asset('css/style.css') }}" rel="stylesheet" /> 
<link href="{{ asset('assets/plugins/owl-carousel/assets/owl.carousel.min.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/plugins/owl-carousel/assets/owl.theme.default.min.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/plugins/animate-css/animate.min.css') }}" rel="stylesheet" />
@endpush 
@section('content')
<section class="bgwrap" style="background-image: url('{{ asset('assets/images/'. $image) }}'); background-size:contain;">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="d-flex align-items-center">
                    <div>
                        <img class="wd-70 rounded-circle profile" src="{{ asset('assets/images/' .$profile) }}" alt="profile">
                    </div>
                    <div class="text-nama">
                        <p class="text-white" style="letter-spacing:0;">Hai, {{ $greeting }} <img src="{{ asset('assets/icons/'. $icon) }}" alt=""></p>
                        <span class="h30 text-white">{{ Auth::user()->nama }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="banner-carousel-wrap">
    <div class="container">
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="owl-carousel owl-theme owl-basic" id="slider-home">
                @foreach ($banner as $bn)
                    @if ($bn->end_time && \Carbon\Carbon::now()->gt($bn->end_time))
                        @continue
                    @endif
                    <div class="item">
                        <img src="{{ asset('images/' .$bn->gambar) }}" alt="{{$bn->judul}}">
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<div class="profile-body warga">
    <div class="container">
        <div class="d-md-block col-md-12 col-xl-12 left-wrapper">
            <div class="card rounded">
                <div class="card-header">
                    <div class="d-flex align-items-center align-self-center mb-0">
                        <i data-feather="users"></i>
                        <h5 class="card-title mb-0 mx-1">Layanan Publik</h6>
                    </div>
                </div>
                <div class="card-body">
                    <div class="fitur-warga d-flex justify-content-between">
                        <div class="warga-menu">
                            <a href="https://api.whatsapp.com/send?phone=6281120000999">
                                <div class="image-fitur">
                                    <img src="{{ asset('assets/icons/wa.svg') }}" alt="">
                                </div>
                            </a>
                            <p>WA Kepo Hegarmanah</p>
                        </div>
                        <div class="warga-menu">
                            <a href="{{ url('/iuransaya') }}">
                                <div class="image-fitur">
                                <img src="{{ asset('assets/icons/fitur_10.svg') }}" alt="">
                                </div>
                            </a>
                            <p>Catatan Iuran Saya</p>
                        </div>
                        <div class="warga-menu">
                            <a href="{{ url('/pengaduanwarga') }}">
                                <div class="image-fitur">
                                    <img src="{{ asset('assets/icons/fitur_3.svg') }}" alt="">
                                </div>
                            </a>
                            <p>Layanan Pengaduan</p>
                        </div>
                    </div>
                    <div class="fitur-warga d-flex justify-content-between">
                        <div class="warga-menu">
                            <a href="{{ url('/laporankeuangan')}}">
                                <div class="image-fitur">
                                    <img src="{{ asset('assets/icons/fitur_4.svg') }}" alt="">
                                </div>
                            </a>
                            <p>Laporan Keuangan</p>
                        </div>
                        <div class="warga-menu">
                            <a href="{{ url('/catatan-kelahiran')}}">
                                <div class="image-fitur">
                                    <img src="{{ asset('assets/icons/fitur_8.svg') }}" alt="">
                                </div>
                            </a>
                            <p>Catatan Kelahiran</p>
                        </div>
                        <div class="warga-menu">
                            <a href="{{ url('/kematian-catatan')}}">
                                <div class="image-fitur">
                                    <img src="{{ asset('assets/icons/fitur_7.svg') }}" alt="">
                                </div>
                            </a>
                            <p>Catatan Kematian</p>
                        </div>
                    </div>
                    <div class="fitur-warga d-flex justify-content-between">
                        <div class="warga-menu">
                            <a href="{{ url('/umkm') }}">
                                <div class="image-fitur">
                                    <img src="{{ asset('assets/icons/umkm.svg') }}" alt="">
                                </div>
                            </a>
                            <p>UMKM</p>
                        </div>
                        <div class="warga-menu">
                            <a href="{{ url('/coomingsoon')}}">
                                <div class="image-fitur">
                                    <img src="{{ asset('assets/icons/service-11.svg') }}" alt="">
                                </div>
                            </a>
                            <p>Tanya SIMA09 AI</p>
                        </div>
                        <div class="warga-menu">
                            <a href="{{ url('/allfeatures') }}">
                                <div class="image-fitur">
                                    <img src="{{ asset('assets/icons/fitur_5.svg') }}" alt="">
                                </div>
                            </a>
                            <p>Semua <br>Fitur</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> 

<div class="pengumuman-body warga">
    <div class="container">
        <div class="d-md-block col-md-12 col-xl-12 left-wrapper">
            <div class="card rounded">
                <div class="card-header">
                    <div class="d-flex align-items-center align-self-center mb-0">
                        <i data-feather="file-text"></i>
                        <h5 class="card-title mb-0 mx-1">Pengumuman</h6>
                    </div>
                </div>
                <div class="card-body">
                    <div class="list-pengumuman-wrap">
                    @foreach ($pengumumans as $data)
                        <div class="pengumuman-item d-flex justify-content-between py-2">
                            <h6 class="title-pengumuman">{{ $data->judul}}</h6>
                            <a href="{{ route('pengumuman.download', $data->id) }}">Download File</a>
                        </div>
                    @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> 

<div class="pengumuman-body warga mt-4">
    <div class="container">
        <div class="d-md-block col-md-12 col-xl-12 left-wrapper">
            <div class="card rounded">
                <div class="card-header">
                    <div class="d-flex align-items-center align-self-center">
                        <i data-feather="file-text"></i>
                        <h5 class="card-title mb-0 mx-1">E-Voting</h6>
                    </div>
                </div>
                <div class="card-body">
                    <div class="list-pengumuman-wrap">
                    <div class="table-responsive w-100">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Judul</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            @foreach ($votingdata as $data)
                            <tbody>
                                <tr>
                                    <td><a href="{{ route('voting.show', $data->id) }}" class="text-primary">{{ $data->title }}</a></td>
                                    <td>
                                        <div class="{{ $data->end_date && \Carbon\Carbon::now()->gt($data->end_date) ? 'badge bg-danger disabled' : 'badge bg-success' }}">
                                            {{ $data->end_date && \Carbon\Carbon::now()->gt($data->end_date) ? 'Kadaluwarsa' : 'Aktif' }}
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @if ($count == 0)
                    <div class="image-data mx-auto text-center">
                        <img src="{{ asset('assets/icons/datanotfound.svg') }}" alt="" class="w-50">
                    </div>
                    <h6 class="text-center mt-4">Tidak Ada Voting untuk Saat Ini!</h6>
                    @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> 


<div class="news-body warga">
    <div class="container">
        <div class="d-md-block col-md-12 col-xl-12 left-wrapper">
            <div class="card rounded">
                <div class="card-header">
                    <div class="d-flex align-items-center align-self-center mb-0">
                        <i data-feather="airplay"></i>
                        <h5 class="card-title mb-0 mx-1">Berita Terbaru</h6>
                    </div>
                </div>
                <div class="card-body">
                    <div class="list-berita-wrap">
                        <div class="berita-item justify-content-between py-2 row">
                        @foreach ($beritas as $data)
                            <div class="berita-konten-wrap col-md-4 col-sm-12">
                                <div class="featured-image">
                                    <img src="{{ asset('images/' .$data->gambar) }}" alt="{{$data->judul}}">
                                </div>
                                <div class="body-berita justify-content-between py-2">
                                    <div class="category-berita">
                                        {{ $data->kategori }}
                                    </div>
                                    <h6 class="title-pengumuman"><a href="{{ route('berita.show', $data->judul) }}">{{ $data->judul }}</a></h6>
                                </div>
                                <div class="desc-berita">
                                    <p>{{ $data->excerpt }}</p>
                                </div>
                            </div>
                        @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> 
@endsection

@push('plugin-scripts')
  <script src="{{ asset('assets/plugins/owl-carousel/owl.carousel.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/jquery-mousewheel/jquery.mousewheel.js') }}"></script>
@endpush

@push('custom-scripts')
<script>
    $(document).ready(function() {
 
        $("#slider-home").owlCarousel({

            navigation : true, // Show next and prev buttons
            autoplay : true,
            slideSpeed : 300,
            paginationSpeed : 400,
            loop : true,

            items : 1, 
            itemsDesktop : false,
            itemsDesktopSmall : false,
            itemsTablet: false,
            itemsMobile : false

        });
    });
  </script>
  <script src="{{ asset('assets/js/carousel.js') }}"></script>
@endpush