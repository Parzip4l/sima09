@extends('layout.client') @push('plugin-styles')
<link href="{{ asset('css/style.css') }}" rel="stylesheet" />
@endpush 
@section('content')
<div class="profile-body warga" style="top:15px;">
    <div class="container">
        <div class="d-md-block col-md-12 col-xl-12 left-wrapper">
            <div class="card rounded">
                <div class="card-header">
                    <div class="">
                        <h5 class="card-title mb-0 mx-1 text-center">Semua Layanan</h6>
                    </div>
                </div>
                <div class="card-body">
                    <div class="fitur-warga d-flex justify-content-between">
                        <div class="warga-menu disabled">
                            <a href="#">
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
                            <a href="{{ url('/voting')}}">
                                <div class="image-fitur">
                                    <img src="{{ asset('assets/icons/fitur_6.svg') }}" alt="">
                                </div>
                            </a>
                            <p>Pemilihan Online</p>
                        </div>
                        <div class="warga-menu">
                            <a href="{{ url('/writer')}}">
                                <div class="image-fitur">
                                    <img src="{{ asset('assets/icons/service-11.svg') }}" alt="">
                                </div>
                            </a>
                            <p>Tanya AI SIMA09</p>
                        </div>
                        <div class="warga-menu">
                            <a href="{{ url('/cekzakat') }}">
                                <div class="image-fitur">
                                    <img src="{{ asset('assets/icons/service-10.svg') }}" alt="">
                                </div>
                            </a>
                            <p>Laporan <br>Zakat</p>
                        </div>
                    </div>
                    <div class="fitur-warga d-flex justify-content-between">
                        <div class="warga-menu disabled">
                            <a href="#">
                                <div class="image-fitur">
                                    <img src="{{ asset('assets/icons/umkm.svg') }}" alt="">
                                </div>
                            </a>
                            <p>UMKM</p>
                        </div>
                        <div class="warga-menu disabled">
                            <a href="#">
                                <div class="image-fitur">
                                    <img src="{{ asset('assets/icons/wargadatang.svg') }}" alt="">
                                </div>
                            </a>
                            <p>Warga Pendatang</p>
                        </div>
                        <div class="warga-menu disabled">
                            <a href="#">
                                <div class="image-fitur">
                                    <img src="{{ asset('assets/icons/wargapindah.svg') }}" alt="">
                                </div>
                            </a>
                            <p>Warga Pindah</p>
                        </div>
                    </div>
                    <div class="fitur-warga d-flex justify-content-between">
                        <div class="warga-menu disabled">
                            <a href="#">
                                <div class="image-fitur">
                                    <img src="{{ asset('assets/icons/bansos.svg') }}" alt="">
                                </div>
                            </a>
                            <p>Bantuan Sosial</p>
                        </div>
                        <div class="warga-menu disabled">
                            <a href="#">
                                <div class="image-fitur">
                                    <img src="{{ asset('assets/icons/fitur_2.svg') }}" alt="">
                                </div>
                            </a>
                            <p>Kendaraan Saya</p>
                        </div>
                        <div class="warga-menu disabled">
                            <a href="#">
                                <div class="image-fitur">
                                    <img src="{{ asset('assets/icons/surat_pengantar.svg') }}" alt="">
                                </div>
                            </a>
                            <p>Surat Pengantar</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> 
@endsection
