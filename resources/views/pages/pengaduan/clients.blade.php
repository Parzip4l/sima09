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
<div class="container">
    <div class="button-tambah-baru mt-4">
        <a class="btn btn-primary mb-2 w-100" href="{{ url('/buatpengaduan') }}" role="button">Buat Pengaduan Baru</a>
    </div>
</div>

<div class="container mt-3">
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card"> 
                <div class="card-header ">
                    <h6 class="text-center">Data Pengaduan / Saran Saya</h6>
                </div>
                <div class="card-body">
                    <div class="content-wrap">
                        @php
                            $nomor = 1;
                        @endphp
                        @foreach ($pengaduans as $data)
                        <div class="judul">
                            <h6>{{$nomor++}}. {{ $data->judul }}</h6>
                        </div>
                        <div class="status-wrap mt-2" style="padding-bottom: 10px;border-bottom:1px solid#eee;">
                            <div class="@if($data->jenis == 'Pengaduan') badge bg-danger @else badge bg-success @endif">
                                {{ $data->jenis }}
                            </div>
                            <div class="@if($data->status == 'Ditolak') badge bg-danger @elseif($data->status == 'Disetujui') badge bg-success @else badge bg-warning @endif">
                                {{ $data->status }}
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('plugin-scripts')
  <script src="{{ asset('assets/plugins/datatables-net/jquery.dataTables.js') }}"></script>
  <script src="{{ asset('assets/plugins/datatables-net-bs5/dataTables.bootstrap5.js') }}"></script>
@endpush

@push('custom-scripts')
  <script src="{{ asset('assets/js/data-table.js') }}"></script>
@endpush