@extends('layout.client')
@push('plugin-styles')
<link href="{{ asset('css/style.css') }}" rel="stylesheet" /> 
@endpush 
@section('content')
<div class="profile-body warga-profile">
    <div class="container">
        <div class="d-md-block col-md-12 col-xl-12 left-wrapper">
            <div class="card rounded">
                <div class="image-profile-bg" style="background-image: url('{{ asset('assets/images/bgwarga.svg') }}'); background-size:contain;">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="d-flex justify-content-center align-items-center mt-5 mx-center">
                                <div>
                                    <img class="wd-70 rounded-circle profile" src="{{ asset('assets/images/profile.png') }}" alt="profile">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body profile">
                    <div class="d-block align-items-center text-center mb-2">
                        <h5 class="card-title mb-0 te">{{ Auth::user()->nama }}</h6>
                        <p>Warga Dusun Margalaksana RW 00{{ Auth::user()->rw }} RT 00{{ Auth::user()->rt }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> 
<div class="profile-body warga-profile p-3 mt-0">
<div class="row chat-wrapper">
  <div class="col-md-12">
    <div class="card">
        <div class="card-header">
          <h6>Chat With SIMA09 AI</h6>
        </div>
        <div class="card-body">
        @if($content)
            <div class="d-flex align-items-center justify-content-between flex-wrap px-3 py-2 border-bottom">
              <div class="d-flex align-items-center">
                <div class="me-2">
                  <img src="{{ url('https://www.nobleui.com/laravel/template/demo1-ds/assets/images/faces/face5.jpg') }}" alt="Avatar" class="rounded-circle img-xs">
                </div>
                <div class="d-flex align-items-center">
                  <p class="text-body">SIMA09 Bot</p>
                </div>
              </div>
            </div>
          <div class="p-4 border-bottom"><p>{{ $content }}</p></div>
        @endif
        <form action="/writer/generate" method="post" class="mt-2">
          @csrf
          <input required name="title" class="form-control" value="{{ $title }}" placeholder="Tuliskan Apapun" />
          <button class="btn btn-primary mt-2">Kirim</button>
        </form>
        </div>
    </div>
  </div>
</div>
</div>
@endsection