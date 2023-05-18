@extends('layout.master')

@section('content')
<nav class="page-breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Log Activity</a></li>
    <li class="breadcrumb-item active" aria-current="page">Detail Log</li>
  </ol>
</nav>

<div class="row">
  <div class="col-md-5 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h6 class="card-title">{{$log->user_name}} <span class="{{ $log->action == 'Delete' ? 'text-danger' : 'text-success' }}">{{$log->action}}</span> {{$log->model}} on {{$log->created_at}}</h6>
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        
        @php 
            $logData = json_decode($log->new_values);
            $logData2 = json_decode($log->old_values);
        @endphp

        <div class="mb-3">
            <label for="exampleInputNumber1" class="form-label">Data Lama</label>
            <p class="text-muted">Keterangan : {{ isset($logData2->keterangan) ? $logData2->keterangan : 'N/A'}}</p>
            <p class="text-muted">Jumlah Masuk : {{isset($logData2->jumlah_masuk) ? $logData2->jumlah_masuk : 'N/A'}}</p>
            <p class="text-muted">Jumlah Keluar : {{isset($logData2->jumlah_keluar) ? $logData2->jumlah_keluar : 'N/A'}}</p>
            <p class="text-muted">Total Saldo : {{isset($logData2->saldo) ? $logData2->saldo : 'N/A'}}</p>
        </div>
        <div class="mb-3">
            <label for="exampleInputNumber1" class="form-label">Data Baru</label>
            <p class="text-muted">Keterangan : {{ isset($logData->keterangan) ? $logData->keterangan : 'N/A'}}</p>
            <p class="text-muted">Jumlah Masuk : {{isset($logData->jumlah_masuk) ? $logData->jumlah_masuk : 'N/A'}}</p>
            <p class="text-muted">Jumlah Keluar : {{isset($logData->jumlah_keluar) ? $logData->jumlah_keluar : 'N/A'}}</p>
            <p class="text-muted">Total Saldo : {{isset($logData->saldo) ? $logData->saldo : 'N/A'}}</p>
        </div>
        <a href="{{ route('kasdamar.index')}}" class="btn btn-primary">Kembali</a>
      </div>
    </div>
  </div>
</div>
@endsection
