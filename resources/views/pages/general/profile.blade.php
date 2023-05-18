@extends('layout.master')

@section('content')
@if(Auth::check())
<div class="row">
  <div class="col-12 grid-margin">
    <div class="card">
      <div class="position-relative">
        <figure class="overflow-hidden mb-0 d-flex justify-content-center">
          <img src="{{ url('https://rinablecreative.com/wp-content/uploads/2023/03/Group-15.svg') }}"class="rounded-top" alt="profile cover">
        </figure>
        <div class="d-flex justify-content-between align-items-center position-absolute top-90 w-100 px-2 px-md-4 mt-n4">
          <div>
            <img class="wd-70 rounded-circle" src="{{ url('https://rinablecreative.com/wp-content/uploads/2023/03/user-1909-879837.png') }}" alt="profile">
            <span class="h4 ms-3 text-white">{{ Auth::user()->nama }}</span>
          </div>
          <div class="d-none d-md-block">
            <!-- <button class="btn btn-primary btn-icon-text">
              <i data-feather="edit" class="btn-icon-prepend"></i> Edit profile
            </button> -->
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="row profile-body">
  <!-- left wrapper start -->
  <div class="d-md-block col-md-12 col-xl-12 left-wrapper">
    <div class="card rounded">
      <div class="card-body">
        <div class="d-flex align-items-center justify-content-between mb-2">
          <h6 class="card-title mb-0">About</h6>
          <div class="dropdown">
            <button class="btn btn-link p-0" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
              <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="edit-2" class="icon-sm me-2"></i> <span class="">Edit</span></a>
              <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="git-branch" class="icon-sm me-2"></i> <span class="">Update</span></a>
              <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="eye" class="icon-sm me-2"></i> <span class="">View all</span></a>
            </div>
          </div>
        </div>
        <p>Hi! I'm Sobirin the Senior Web Developer. We hope you enjoy the design and quality of Social.</p>
        <div class="mt-3">
          <label class="tx-11 fw-bolder mb-0 text-uppercase">Nama :</label>
          <p class="text-muted">{{ Auth::user()->nama }}</p>
        </div>
        <div class="mt-3">
          <label class="tx-11 fw-bolder mb-0 text-uppercase">Tempat Lahir :</label>
          <p class="text-muted">{{ Auth::user()->tempatlahir }}</p>
        </div>
        <div class="mt-3">
          <label class="tx-11 fw-bolder mb-0 text-uppercase">Tanggal Lahir :</label>
          <p class="text-muted">{{ Auth::user()->tanggallahir }}</p>
        </div>
        <div class="mt-3">
          <label class="tx-11 fw-bolder mb-0 text-uppercase">RW :</label>
          <p class="text-muted">00{{ Auth::user()->rw }}</p>
        </div>
        <div class="mt-3">
          <label class="tx-11 fw-bolder mb-0 text-uppercase">RT :</label>
          <p class="text-muted">00{{ Auth::user()->rt }}</p>
        </div>
        <div class="mt-3">
          <label class="tx-11 fw-bolder mb-0 text-uppercase">Joined :</label>
          <p class="text-muted">Maret 17, 2023</p>
        </div>
        <div class="mt-3">
          <label class="tx-11 fw-bolder mb-0 text-uppercase">Lives :</label>
          <p class="text-muted">Jakarta, INDONESIA</p>
        </div>
        <div class="mt-3">
          <label class="tx-11 fw-bolder mb-0 text-uppercase">Email :</label>
          <p class="text-muted">{{ Auth::user()->email }}</p>
        </div>
        <div class="mt-3">
          <label class="tx-11 fw-bolder mb-0 text-uppercase">Website :</label>
          <p class="text-muted">www.rinablecreative.com</p>
        </div>
      </div>
    </div>
  </div>
  <!-- left wrapper end -->
</div>
@endif
@endsection