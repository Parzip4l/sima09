@extends('layout.client') @push('plugin-styles')
<link href="{{ asset('css/style.css') }}" rel="stylesheet" /> 
@endpush 

@section('content')

<div class="profile-body warga-profile">
    <div class="container">
        <div class="d-md-block col-md-12 col-xl-12 left-wrapper">
            <div class="card rounded">
                <div class="image-profile-bg" style="background-image: url('{{ asset('assets/images/bgwarga.svg') }}'); background-size:contain;">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="d-flex justify-content-center align-items-center" style="margin-top:60px">
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

@if ($voting->end_date && \Carbon\Carbon::now()->gt($voting->end_date))
<div class="container mt-4">
    <div class="card p-4">
        <div class="closed-vote mx-auto">
            <img src="{{ asset('assets/icons/voteclosed.svg') }}" alt="" class="w-100 text-center">
            <h6 class="text-center">Voting sudah ditutup.</h6>
        </div>
    </div>
</div>
@else
    <!-- Display the voting result -->
    <div class="profile-body warga-profile">
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3>{{ $voting->title }}</h3>
            </div>
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif
            
            <form method="post" action="{{ route('voting.vote', $voting->id) }}" class="p-4">
                @csrf
                <input type="hidden" class="form-control" id="nik" name="nik" value="{{ Auth::user()->nik }}" required>
                <div class="mb-3">
                    <label for="option" class="form-label">Pilihan</label>
                    <select class="form-select" id="option" name="option" required>
                        @foreach ($voting->options as $option)
                        <option value="{{ $option }}">{{ $option }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="button-wrap d-flex">
                    <button type="submit" class="btn btn-primary me-1">Vote</button>
                    <a href="{{ url('/voting')}}" class="btn btn-outline-primary">Kembali</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endif

@endsection