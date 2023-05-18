@extends('layout.master2')

@section('content')
<div class="page-content bg-wrap-login d-flex align-items-center justify-content-center">

  <div class="row w-100 mx-0 auth-page">
    <div class="col-md-3 col-xl-3">
      <div class="card">
        <div class="row">
          <div class="col-md-12 ps-md-0">
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
            <div class="auth-form-wrapper px-4 py-5">
              <a href="#" class="noble-ui-logo d-block mb-2 text-center" style="font-size:42px;">SI<span>MA09</span></a>
              <h5 class="text-mobile text-mute fw-normal mb-4 text-center">Selamat Datang Di Sistem Informasi Margalaksana 09 !</h5>
              <form class="forms-sample" action="{{url('login/proses')}}" method="POST">
                @csrf
                <div class="mb-3">
                  <label for="userEmail" class="form-label text-mobile">NIK</label>
                  <input autofocus type="number" class="form-control 
                  @error('nik')
                    is-invalid
                  @enderror
                  " id="userEmail" placeholder="321115XXXXXX" name="nik">
                </div>

                @error('username')
                <div class="invalid-feedback">
                      {{$message}}
                </div>
                @enderror
                <div class="mb-3">
                  <div class="form-group">
                    <label for="userPassword" class="form-label text-mobile">Password</label>
                    <input type="password" class="form-control
                    @error('password')
                      is-invalid
                    @enderror
                    " id="userPassword" name="password" autocomplete="current-password" placeholder="Password">
                  </div>
                </div>
                @error('password')
                <div class="invalid-feedback">
                      {{$message}}
                </div>
                @enderror
                <!-- <div class="form-check mb-3">
                  <input type="checkbox" class="form-check-input" id="authCheck">
                  <label class="form-check-label" for="authCheck">
                    Remember me
                  </label>
                </div> -->
                <div>
                  <button type="submit" class="btn btn-primary me-2 mb-2 mb-md-0 w-100 btn-icon-text">
                    <i class="btn-icon-prepend" data-feather="log-in"></i>
                    Login
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>
@endsection

<style>
  .bg-wrap-login {
    background-image: url('{{ asset('assets/images/bg-login.png') }}'); background-size:cover;
  }

  @media (max-width:680px){
    .bg-wrap-login {
      background-image: url('{{ asset('assets/images/bg-login-mobile.png') }}'); background-size:cover;
    }

    .card {
      background: rgba(255, 255, 255, 0.3)!important;
    }

    .noble-ui-logo {
      text-shadow: 0px 2px 10px rgb(0 0 0 / 15%);
    }

    .text-mobile {
      color : #fff!important;
    }
  }
</style>