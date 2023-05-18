@extends('layout.master')
<?php 
    
?>
@push('plugin-styles')
  <link href="{{ asset('assets/plugins/datatables-net-bs5/dataTables.bootstrap5.css') }}" rel="stylesheet" />
@endpush

@section('content')
<nav class="page-breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Master Data</a></li>
    <li class="breadcrumb-item active" aria-current="page">Iuran Warga</li>
  </ol>
</nav>
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
  @endif

  @if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif
<div class="row">
  <div class="col-md-8 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h6 class="card-title">Rekap Iuran Warga</h6>
        <a class="btn btn-primary mb-3" href="{{ route('iuran.create') }}" role="button">Tambah Data</a>
        <!-- <form>
          <div class="row">
              <div class="col-md-4">
                  <label>Tanggal Mulai</label>
                  <input type="date" class="form-control" id="start_date" name="start_date">
              </div>
              <div class="col-md-4">
                  <label>Tanggal Selesai</label>
                  <input type="date" class="form-control" id="end_date" name="end_date">
              </div>
              <div class="col-md-4">
                  <button type="submit" class="btn btn-primary" style="margin-top: 31px;">Filter</button>
                  <button type="button" class="btn btn-secondary" style="margin-top: 31px;" id="reset">Reset</button>
              </div>
          </div>
      </form> -->
        <div class="table-responsive">
          <table id="dataTableExample" class="table">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama Warga</th>
                <th>Jumlah</th>
                <th>Tanggal Pembayaran</th>
                <th>Status Pembayaran</th>
              </tr>
            </thead>
            <tbody>
            @php
                $nomor = 1;
            @endphp
            @foreach ($data as $iuran)
              <tr>
                <td>{{$nomor++}}</td>
                <td>{{ $iuran->nama}}</td>
                <td>Rp {{ number_format($iuran->jumlah, 0, ',', '.') }}</td>
                <td>{{ $iuran->tanggal}}/{{ $iuran->bulan}}/{{ $iuran->tahun}}</td>
                <td>
                  <div class="{{ $iuran->status_pembayaran == 'Lunas' ? 'badge bg-success' : 'badge bg-danger' }}">
                    {{ $iuran->status_pembayaran }}
                  </div>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-4">
    <div class="card">
      <div class="card-body">
        <h6 class="card-title">Log Iuran Warga</h6>
        <div id="content">
        @foreach ($datalog as $dl)
          <div class="log-berita mb-1">
            <h6 class="{{ $dl->action == 'Delete' ? 'text-danger' : 'text-success' }} d-flex mb-2">{{ $dl->action }} Data -&nbsp;<p class="text-muted"> {{ $dl->user_name }}</p></h6>
            <p class="text-muted">{{ $dl->created_at }}</p>
            <a href="{{ route('detaillog.show', $dl->id) }}" class="text-primary">Detail Log</a>  
            <hr>
          </div>
          @endforeach
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