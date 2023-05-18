@extends('layout.master')

@section('content')
@if(Auth::check())
<div class="row profile-body">
  <!-- left wrapper start -->
  <div class="d-md-block col-md-12 col-xl-12 left-wrapper">
    <div class="card rounded">
      <div class="card-body">
        <div class="d-flex align-items-center justify-content-between mb-2">
            <div>
                <img class="wd-70 rounded-circle" src="{{ url('https://rinablecreative.com/wp-content/uploads/2023/03/user-1909-879837.png') }}" alt="profile">
                <span class="h5 ms-3">{{ $warga->nama }}</span>
            </div>
         </div>
        <div class="mt-3">
          <label class="tx-11 fw-bolder mb-0 text-uppercase">Nama Lengkap :</label>
          <p class="text-muted">{{ $warga->nama }}</p>
        </div>
        <div class="mt-3">
          <label class="tx-11 fw-bolder mb-0 text-uppercase">Tempat Lahir :</label>
          <p class="text-muted">{{ $warga->tempatlahir }}</p>
        </div>
        <div class="mt-3">
          <label class="tx-11 fw-bolder mb-0 text-uppercase">Tanggal Lahir :</label>
          <p class="text-muted">{{ $warga->tanggallahir }}</p>
        </div>
        <div class="mt-3">
          <label class="tx-11 fw-bolder mb-0 text-uppercase">Jenis Kelamin :</label>
          <p class="text-muted">{{ $warga->jk }}</p>
        </div>
        <div class="mt-3">
          <label class="tx-11 fw-bolder mb-0 text-uppercase">Hubungan KK :</label>
          <p class="text-muted">{{ $warga->hubungankk }}</p>
        </div>
        <div class="mt-3">
          <label class="tx-11 fw-bolder mb-0 text-uppercase">RT / RW :</label>
          <p class="text-muted">00{{ $warga->rt }} / 00{{ $warga->rw }}</p>
        </div>
        <div class="mt-3">
          <label class="tx-11 fw-bolder mb-0 text-uppercase">Agama :</label>
          <p class="text-muted">{{ $warga->agama }}</p>
        </div>
        <div class="mt-3">
          <label class="tx-11 fw-bolder mb-0 text-uppercase">Pendidikan :</label>
          <p class="text-muted">{{ $warga->pendidikan }}</p>
        </div>
        <div class="mt-3">
          <label class="tx-11 fw-bolder mb-0 text-uppercase">Pekerjaan :</label>
          <p class="text-muted">{{ $warga->pekerjaan }}</p>
        </div>
        <div class="mt-3">
          <label class="tx-11 fw-bolder mb-0 text-uppercase">Status Perkawinan :</label>
          <p class="text-muted">{{ $warga->statusperkawinan }}</p>
        </div>

        <a href="{{ url('/wargas')}}" class="btn btn-primary btn-icon-text mt-2">
            <i class="btn-icon-prepend" data-feather="arrow-left"></i>
            Kembali
        </a>
      </div>
    </div>
  </div>
  <!-- left wrapper end -->
</div>
@endif
@endsection