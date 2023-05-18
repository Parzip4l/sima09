@extends('layout.master')

@push('plugin-styles')
  <link href="{{ asset('assets/plugins/flatpickr/flatpickr.min.css') }}" rel="stylesheet" />
@endpush

@section('content')
<div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
  <div>
    <h4 class="mb-3 mb-md-0">Wilayah Setting</h4>
  </div>
</div>

<div class="row">
  <div class="col-12 col-xl-12 stretch-card">
    <div class="row flex-grow-1">
      <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <div class="d-blok text-center">
              <h3 class="card-title mb-0 text-center">Struktur Organisasi RW</h3>
            </div>
            <div class="row mx-auto justify-content-center pt-2">
              <div class="col-12 col-md-12 col-xl-5 pt-2">
                <div class="card text-white bg-danger text-center">
                    <div class="card-header">Penasihat</div>
                    <div class="card-body">
                        <h5 class="card-title">Seluruh Element Masyarakat</h5>
                    </div>
                </div>
              </div>
            </div>
            <div class="row mx-auto justify-content-center pt-2">
              <div class="col-12 col-md-12 col-xl-5 pt-2">
                <div class="card text-white bg-primary text-center">
                    <div class="card-header">Ketua RW 09</div>
                    <div class="card-body">
                        <h5 class="card-title">Yoni Juhaeri</h5>
                    </div>
                </div>
              </div>
            </div>
            <div class="row mx-auto justify-content-center pt-2">
                <div class="col-6 col-md-12 col-xl-5 pt-2">
                    <div class="card text-white bg-success text-center">
                        <div class="card-header">Bendahara</div>
                        <div class="card-body">
                            <h5 class="card-title">Ade Prana</h5>
                        </div>
                    </div>
                </div>
              <div class="col-6 col-md-12 col-xl-5 pt-2">
                <div class="card text-white bg-success text-center">
                    <div class="card-header">Sekretaris</div>
                    <div class="card-body">
                        <h5 class="card-title">Wiwin Sumiati</h5>
                    </div>
                </div>
              </div>
            </div>
            <div class="row mx-auto justify-content-center pt-2">
              <div class="col-md-12 col-xl-5 pt-2">
                <div class="card text-white bg-info text-center">
                    <div class="card-header">Seksi Kerohanian</div>
                    <div class="card-body">
                        <h5 class="card-title">1.Miftahul Ula<br>2.Toto <br> 3.Erdy</h5>
                    </div>
                </div>
              </div>
              <div class="col-md-12 col-xl-5 pt-2">
                <div class="card text-white bg-info text-center">
                    <div class="card-header">Seksi Humas</div>
                    <div class="card-body">
                        <h5 class="card-title">1.Sumpena<br>2.Wahyudin</h5>
                    </div>
                </div>
              </div>
              <div class="col-md-12 col-xl-5 pt-2">
                <div class="card text-white bg-info text-center">
                    <div class="card-header">Seksi Pembangunan</div>
                    <div class="card-body">
                        <h5 class="card-title">1.Dede<br>2.Dudin <br> 3.Niko</h5>
                    </div>
                </div>
              </div>
              <div class="col-md-12 col-xl-5 pt-2">
                <div class="card text-white bg-info text-center">
                    <div class="card-header">Seksi Pemuda dan Olahraga</div>
                    <div class="card-body">
                        <h5 class="card-title">1.Tahya<br>2.Agus <br> 3.Cucun</h5>
                    </div>
                </div>
              </div>
            </div>
            <div class="row mx-auto justify-content-center pt-2">
              <div class="col-md-12 col-xl-5 pt-2">
                <div class="card text-white bg-warning text-center">
                    <div class="card-header">Ketua RT 01</div>
                    <div class="card-body">
                        <h5 class="card-title">Ujang Rahmat</h5>
                    </div>
                </div>
              </div>
              <div class="col-md-12 col-xl-5 pt-2">
                <div class="card text-white bg-warning text-center">
                    <div class="card-header">Ketua RT 02</div>
                    <div class="card-body">
                        <h5 class="card-title">Yustari</h5>
                    </div>
                </div>
              </div>
              <div class="col-md-12 col-xl-5 pt-2">
                <div class="card text-white bg-warning text-center">
                    <div class="card-header">Ketua RT 03</div>
                    <div class="card-body">
                        <h5 class="card-title">Adi</h5>
                    </div>
                </div>
              </div>
              <div class="col-md-12 col-xl-5 pt-2">
                <div class="card text-white bg-warning text-center">
                    <div class="card-header">Ketua RT 04</div>
                    <div class="card-body">
                        <h5 class="card-title">Gunawan</h5>
                    </div>
                </div>
              </div>
            </div>
            <div class="row">
  <div class="col-md-4">
    <ul class="list-group">
      <li class="list-group-item active">RW 1</li>
      <li class="list-group-item">RT 1</li>
      <li class="list-group-item">RT 2</li>
      <li class="list-group-item">RT 3</li>
    </ul>
  </div>
  <div class="col-md-4">
    <ul class="list-group">
      <li class="list-group-item active">RW 2</li>
      <li class="list-group-item">RT 4</li>
      <li class="list-group-item">RT 5</li>
    </ul>
  </div>
  <div class="col-md-4">
    <ul class="list-group">
      <li class="list-group-item active">RW 3</li>
      <li class="list-group-item">RT 6</li>
      <li class="list-group-item">RT 7</li>
      <li class="list-group-item">RT 8</li>
      <li class="list-group-item">RT 9</li>
    </ul>
  </div>
</div>
          </div>
        </div>
      </div>
      <div class="col-md-3 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <div class="d-flex justify-content-between align-items-baseline">
              <h6 class="card-title mb-0">Struktur Organisasi Karang Taruna</h6>
              <div class="dropdown mb-2">
                <button class="btn btn-link p-0" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="eye" class="icon-sm me-2"></i> <span class="">View</span></a>
                  <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="printer" class="icon-sm me-2"></i> <span class="">Print</span></a>
                  <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="download" class="icon-sm me-2"></i> <span class="">Download</span></a>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-6 col-md-12 col-xl-5">
                <h3 class="mb-2"></h3>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-3 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <div class="d-flex justify-content-between align-items-baseline">
              <h6 class="card-title mb-0">Struktur Organisasi DKM</h6>
              <div class="dropdown mb-2">
                <button class="btn btn-link p-0" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                  <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="eye" class="icon-sm me-2"></i> <span class="">View</span></a>
                  <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="printer" class="icon-sm me-2"></i> <span class="">Print</span></a>
                  <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="download" class="icon-sm me-2"></i> <span class="">Download</span></a>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-6 col-md-12 col-xl-5">
                <h3 class="mb-2"></h3>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-3 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <div class="d-flex justify-content-between align-items-baseline">
              <h6 class="card-title mb-0">Struktur Organisasi TPU Damar</h6>
              <div class="dropdown mb-2">
                <button class="btn btn-link p-0" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton2">
                  <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="eye" class="icon-sm me-2"></i> <span class="">View</span></a>
                  <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="printer" class="icon-sm me-2"></i> <span class="">Print</span></a>
                  <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="download" class="icon-sm me-2"></i> <span class="">Download</span></a>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-6 col-md-12 col-xl-5">
                <h3 class="mb-2"></h3>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div> <!-- row -->

@endsection
