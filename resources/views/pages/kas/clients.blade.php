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
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> 

<div class="container mt-3">
  <div class="row">
    <div class="col-md-12 mb-3">
      <div class="card">
        <div class="card-header bg-success">
          <h6 class="text-center text-white">Catatan Keuangan RW</h6>
        </div>
        <div class="card-body text-center">
            <h6 class="text-center mb-1">Saldo Total</h6>
            <h2>Rp. {{ number_format($totalsaldorw, 0, ',', '.') }}</h2>
            <hr>
            <div class="total-saldo d-flex justify-content-between">
                <div class="income">
                    <p class="text-muted">Pemasukan</p>
                    <h6 class="text-success">Rp. {{ number_format($incomerw, 0, ',', '.') }}</h6>
                </div>
                <div class="expanse">
                    <p class="text-muted">Pengeluaran</p>
                    <h6 class="text-danger">Rp. {{ number_format($expanserw, 0, ',', '.') }}</h6>
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="container">
  <div class="row">
    <div class="col-md-12 mb-3">
      <div class="card">
        <div class="card-header">
          <h6 class="text-center">Catatan Transaksi RW</h6>
        </div>
        <div class="card-body text-center">
            <div class="catatan-transaksi-wrap">
              @foreach ($data as $d)
              <div class="item d-flex justify-content-between">
                <div class="left-item align-self-center">
                  <h6 class="text-start text-capitalize">{{ $d->keterangan }}</h6>
                  <p class="text-muted">{{$d->tanggal}}</p>
                </div>
                <div class="right-item text-end">
                  <p class="text-success">Rp. {{ number_format($d->jumlah_masuk, 0, ',', '.') }}</p>
                  <p class="text-danger">Rp. {{ number_format($d->jumlah_keluar, 0, ',', '.') }}</p>
                </div>
              </div>
              <hr>
              @endforeach
            </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="container mt-3">
  <div class="row">
    <div class="col-md-12 mb-3">
      <div class="card">
        <div class="card-header bg-warning">
          <h6 class="text-center text-white">Catatan Keuangan Karang Taruna</h6>
        </div>
        <div class="card-body text-center">
            <h6 class="text-center mb-1">Saldo Total</h6>
            <h2>Rp. {{ number_format($totalsaldokarta, 0, ',', '.') }}</h2>
            <hr>
            <div class="total-saldo d-flex justify-content-between">
                <div class="income">
                    <p class="text-muted">Pemasukan</p>
                    <h6 class="text-success">Rp. {{ number_format($incomekarta, 0, ',', '.') }}</h6>
                </div>
                <div class="expanse">
                    <p class="text-muted">Pengeluaran</p>
                    <h6 class="text-danger">Rp. {{ number_format($expansekarta, 0, ',', '.') }}</h6>
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="container">
  <div class="row">
    <div class="col-md-12 mb-3">
      <div class="card">
        <div class="card-header">
          <h6 class="text-center">Catatan Transaksi Karang Taruna</h6>
        </div>
        <div class="card-body text-center">
            <div class="catatan-transaksi-wrap">
              @foreach ($datakarta as $d)
              <div class="item d-flex justify-content-between">
                <div class="left-item align-self-center">
                  <h6 class="text-start text-capitalize">{{ $d->keterangan }}</h6>
                  <p class="text-muted">{{$d->tanggal}}</p>
                </div>
                <div class="right-item text-end">
                  <p class="text-success">Rp. {{ number_format($d->jumlah_masuk, 0, ',', '.') }}</p>
                  <p class="text-danger">Rp. {{ number_format($d->jumlah_keluar, 0, ',', '.') }}</p>
                </div>
              </div>
              <hr>
              @endforeach
            </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="container mt-3">
  <div class="row">
    <div class="col-md-12 mb-3">
      <div class="card">
        <div class="card-header bg-info">
          <h6 class="text-center text-white">Catatan Keuangan DKM Al-Amin</h6>
        </div>
        <div class="card-body text-center">
            <h6 class="text-center mb-1">Saldo Total</h6>
            <h2>Rp. {{ number_format($totalsaldodkm, 0, ',', '.') }}</h2>
            <hr>
            <div class="total-saldo d-flex justify-content-between">
                <div class="income">
                    <p class="text-muted">Pemasukan</p>
                    <h6 class="text-success">Rp. {{ number_format($incomedkm, 0, ',', '.') }}</h6>
                </div>
                <div class="expanse">
                    <p class="text-muted">Pengeluaran</p>
                    <h6 class="text-danger">Rp. {{ number_format($expansedkm, 0, ',', '.') }}</h6>
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="container">
  <div class="row">
    <div class="col-md-12 mb-3">
      <div class="card">
        <div class="card-header">
          <h6 class="text-center">Catatan Transaksi DKM Al-Amin</h6>
        </div>
        <div class="card-body text-center">
            <div class="catatan-transaksi-wrap">
              @foreach ($datakarta as $d)
              <div class="item d-flex justify-content-between">
                <div class="left-item align-self-center">
                  <h6 class="text-start text-capitalize">{{ $d->keterangan }}</h6>
                  <p class="text-muted">{{$d->tanggal}}</p>
                </div>
                <div class="right-item text-end">
                  <p class="text-success">Rp. {{ number_format($d->jumlah_masuk, 0, ',', '.') }}</p>
                  <p class="text-danger">Rp. {{ number_format($d->jumlah_keluar, 0, ',', '.') }}</p>
                </div>
              </div>
              <hr>
              @endforeach
            </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="container mt-3">
  <div class="row">
    <div class="col-md-12 mb-3">
      <div class="card">
        <div class="card-header bg-primary">
          <h6 class="text-center text-white">Catatan Keuangan TPU Damar</h6>
        </div>
        <div class="card-body text-center">
            <h6 class="text-center mb-1">Saldo Total</h6>
            <h2>Rp. {{ number_format($totalsaldodamar, 0, ',', '.') }}</h2>
            <hr>
            <div class="total-saldo d-flex justify-content-between">
                <div class="income">
                    <p class="text-muted">Pemasukan</p>
                    <h6 class="text-success">Rp. {{ number_format($incomedamar, 0, ',', '.') }}</h6>
                </div>
                <div class="expanse">
                    <p class="text-muted">Pengeluaran</p>
                    <h6 class="text-danger">Rp. {{ number_format($expansedamar, 0, ',', '.') }}</h6>
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="container">
  <div class="row">
    <div class="col-md-12 mb-3">
      <div class="card">
        <div class="card-header">
          <h6 class="text-center">Catatan Transaksi TPU Damar</h6>
        </div>
        <div class="card-body text-center">
            <div class="catatan-transaksi-wrap">
              @foreach ($datadamar as $d)
              <div class="item d-flex justify-content-between">
                <div class="left-item align-self-center">
                  <h6 class="text-start text-capitalize">{{ $d->keterangan }}</h6>
                  <p class="text-muted text-start">{{$d->tanggal}}</p>
                </div>
                <div class="right-item text-end">
                  <p class="text-success">Rp. {{ number_format($d->jumlah_masuk, 0, ',', '.') }}</p>
                  <p class="text-danger">Rp. {{ number_format($d->jumlah_keluar, 0, ',', '.') }}</p>
                </div>
              </div>
              <hr>
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