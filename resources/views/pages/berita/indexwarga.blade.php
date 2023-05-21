@extends('layout.client') @push('plugin-styles')
<link href="{{ asset('css/style.css') }}" rel="stylesheet" /> 
<link href="{{ asset('assets/plugins/owl-carousel/assets/owl.carousel.min.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/plugins/owl-carousel/assets/owl.theme.default.min.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/plugins/animate-css/animate.min.css') }}" rel="stylesheet" />
@endpush 
@section('content')

<div class="news-body warga">
    <div class="container">
        <div class="d-md-block col-md-12 col-xl-12 left-wrapper">
        @foreach ($beritas as $data)
            <div class="card rounded mb-3">
                <div class="card-body">
                    <div class="list-berita-wrap">
                        <div class="berita-item justify-content-between py-2">
                            <div class="berita-konten-wrap" style="padding-bottom:10px;">
                                <div class="featured-image">
                                    <img src="{{ asset('images/' .$data->gambar) }}" alt="{{$data->judul}}" style="padding:0; border-radius:5px;">
                                </div>
                                <div class="body-berita justify-content-between py-2">
                                    <div class="head-category d-flex justify-content-between">
                                        <div class="category-berita">
                                            Umum
                                        </div>
                                        <div class="tanggal-berita align-self-center text-success">
                                            {{ $data->created_at->format('d M Y') }}
                                        </div>
                                    </div>
                                    <h6 class="title-pengumuman"><a href="{{ route('berita.show', $data->judul) }}">{{ $data->judul }}</a></h6>
                                </div>
                                <div class="desc-berita">
                                    <p>{!! $data->konten !!}</p>
                                </div>
                            </div>
                        
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
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

            slideSpeed : 300,
            paginationSpeed : 400,

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