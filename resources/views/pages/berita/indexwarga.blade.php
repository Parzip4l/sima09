@extends('layout.client') @push('plugin-styles')
<link href="{{ asset('css/style.css') }}" rel="stylesheet" /> 
<link href="{{ asset('assets/plugins/owl-carousel/assets/owl.carousel.min.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/plugins/owl-carousel/assets/owl.theme.default.min.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/plugins/animate-css/animate.min.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/plugins/prismjs/prism.css') }}" rel="stylesheet" />
<style>
    .flex.justify-between.flex-1.sm\:hidden {
        display : none;
    }

    svg.w-5.h-5 {
        width: 20px;
    }

    .hidden.sm\:flex-1.sm\:flex.sm\:items-center.sm\:justify-between {
        margin-bottom: 50px;
    }

    p.text-sm.text-gray-700.leading-5 {
        position: relative;
        top: 55px;
    }

    a.relative.inline-flex.items-center.px-2.py-2.text-sm.font-medium.text-gray-500.bg-white.border.border-gray-300.rounded-l-md.leading-5.hover\:text-gray-400.focus\:z-10.focus\:outline-none.focus\:ring.ring-gray-300.focus\:border-blue-300.active\:bg-gray-100.active\:text-gray-500.transition.ease-in-out.duration-150 {
        margin-right: 5px;
    }

    @media (max-width : 678px){
        nav.flex.items-center.justify-between {
            text-align : center;
        }
    }
</style>
@endpush 
@section('content')
<div class="backwrap bg-white p-4">
    <div class="button d-flex">
        <a href="{{url('/wargadashboard')}}" class="text-black">
            <i class="link-icon" data-feather="chevron-left"></i>
            Kembali
        </a>
    </div>
</div>

<div class="container">
    <form action="{{ route('berita.search') }}" method="POST" class="mt-4 mb-4">
    @csrf
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Cari berita..." required>
            <button type="submit" class="btn btn-primary">Cari</button>
        </div>
    </form>
    @if (isset($searchTerm))
        <p class="text-center">Hasil pencarian untuk: <strong>{{ $searchTerm }}</strong></p>
    @endif
</div>
<div class="news-body warga">
    <div class="container">
    @if ($beritas->count() > 0)
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
                                            {{ $data->kategori }}
                                        </div>
                                        <div class="tanggal-berita align-self-center text-success">
                                            {{ $data->created_at->format('d M Y') }}
                                        </div>
                                    </div>
                                    <h6 class="title-pengumuman"><a href="{{ route('berita.show', $data->judul) }}">{{ $data->judul }}</a></h6>
                                </div>
                                <div class="desc-berita">
                                    <p>{{ $data->excerpt }}</p>
                                </div>
                            </div>
                        
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @else
            <p class="text-center">Tidak ada hasil yang ditemukan.</p>
        @endif
        {{ $beritas->links() }}
    </div>
</div> 
@endsection
 @push('plugin-scripts')
  <script src="{{ asset('assets/plugins/prismjs/prism.js') }}"></script>
  <script src="{{ asset('assets/plugins/clipboard/clipboard.min.js') }}"></script>
@endpush