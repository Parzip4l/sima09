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

<div class="pengumuman-body warga mt-4">
    <div class="container">
        <div class="d-md-block col-md-12 col-xl-12 left-wrapper">
            <div class="card rounded">
                <div class="card-body">
                    <div class="d-flex align-items-center align-self-center mb-2">
                        <i data-feather="file-text"></i>
                        <h5 class="card-title mb-0 mx-1">E-Voting</h6>
                    </div>
                    <div class="list-pengumuman-wrap">
                    <div class="table-responsive w-100">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Judul</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            @php
                                $nomor = 1;
                            @endphp
                            @foreach ($votingdata as $data)
                            <tbody>
                                <tr>
                                    <td>{{ $nomor++ }}</td>
                                    <td><a href="{{ route('voting.show', $data->id) }}" class="text-primary" style="color: #000!important">{{ $data->title }}</a></td>
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