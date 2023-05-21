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
                        <div class="d-flex align-items-center text-center justify-content-center">
                            <a href="/datasaya/{{ Auth::user()->id }}/edit" class="btn btn-sm btn-primary mt-2 mx-1">Edit Profile</a>
                            <a href="/changepass/{{ Auth::user()->id }}/edit" class="btn btn-sm btn-primary mt-2 mx-1">Edit Password</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> 

<div class="profile-detail">
    <div class="container">
        @if(session('success'))
            <div class="alert alert-info text-center mt-2 mx-2">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        <div class="accordion" id="accordionExample">
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                   IDENTITAS DIRI
                </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <div class="item-profile py-2">
                            <p class="text-abu title-profile">NIK</p>
                            <h6>{{ Auth::user()->nik }}</h6>
                        </div>
                        <div class="item-profile py-2">
                            <p class="text-abu title-profile">Nama Lengkap</p>
                            <h6>{{ Auth::user()->nama }}</h6>
                        </div>
                        <div class="item-profile py-2">
                            <p class="text-abu title-profile">Tempat, Tanggal Lahir</p>
                            <h6>{{ Auth::user()->tempatlahir }}, {{ Auth::user()->tanggallahir }}</h6>
                        </div>
                        <div class="item-profile py-2">
                            <p class="text-abu title-profile">Jenis Kelamin</p>
                            <h6>{{ Auth::user()->jk }}</h6>
                        </div>
                        <div class="item-profile py-2">
                            <p class="text-abu title-profile">Status Dalam Keluarga</p>
                            <h6>{{ Auth::user()->hubungankk }}</h6>
                        </div>
                        <div class="item-profile py-2">
                            <p class="text-abu title-profile">Pendidikan</p>
                            <h6>{{ Auth::user()->pendidikan }}</h6>
                        </div>
                        <div class="item-profile py-2">
                            <p class="text-abu title-profile">Pekerjaan</p>
                            <h6>{{ Auth::user()->pekerjaan }}</h6>
                        </div>
                        <div class="item-profile py-2">
                            <p class="text-abu title-profile">Status Perkawinan</p>
                            <h6>{{ Auth::user()->statusperkawinan }}</h6>
                        </div>
                        <div class="item-profile py-2">
                            <p class="text-abu title-profile">Nama Ayah</p>
                            <h6>{{ Auth::user()->nama_ayah }}</h6>
                        </div>
                        <div class="item-profile py-2">
                            <p class="text-abu title-profile">Nama Ibu</p>
                            <h6>{{ Auth::user()->nama_ibu }}</h6>
                        </div>
                        <div class="item-profile py-2">
                            <p class="text-abu title-profile">Penghasilan per Bulan</p>
                            <h6>{{ Auth::user()->penghasilanperbulan }}</h6>
                        </div>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingTwo">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    INFORMASI AKUN
                </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <div class="item-profile py-2">
                            <p class="text-abu title-profile">Alamat Email</p>
                            <h6>{{ Auth::user()->email }}</h6>
                        </div>
                        <div class="item-profile py-2">
                            <p class="text-abu title-profile">Tipe Akun</p>
                            <h6>Warga</h6>
                        </div>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingThree">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                    ALAMAT 
                </button>
                </h2>
                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <div class="item-profile py-2">
                            <p class="text-abu title-profile">Kota/Kabupaten</p>
                            <h6>Sumedang</h6>
                        </div>
                        <div class="item-profile py-2">
                            <p class="text-abu title-profile">Kecamatan</p>
                            <h6>Jatinangor</h6>
                        </div>
                        <div class="item-profile py-2">
                            <p class="text-abu title-profile">Desa/Kelurahan</p>
                            <h6>Hegarmanah</h6>
                        </div>
                        <div class="item-profile py-2">
                            <p class="text-abu title-profile">RT/RW</p>
                            <h6>00{{ Auth::user()->rt }}/00{{ Auth::user()->rw }}</h6>
                        </div>
                        <div class="item-profile py-2">
                            <p class="text-abu title-profile">Kode Pos</p>
                            <h6>45363</h6>
                        </div>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="heading5">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse5" aria-expanded="false" aria-controls="collapseThree">
                    LAINNYA 
                </button>
                </h2>
                <div id="collapse5" class="accordion-collapse collapse" aria-labelledby="heading5" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <div class="item-profile py-2">
                            <p class="text-abu title-profile">App Version</p>
                            <h6>2.4.0</h6>
                        </div>
                        <div class="item-profile py-2">
                            <a href="{{ url('/termsandconditions') }}"><p class="text-abu title-profile">Terms and Conditions</p></a>
                        </div>
                        <div class="item-profile py-2">
                            <a href="{{ url('/privacyandsafety') }}"><p class="text-abu title-profile">Safety & Privacy</p></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-success logout">LOGOUT</button>
        </form>
    </div>
</div>
@endsection