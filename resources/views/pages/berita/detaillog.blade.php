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
        <h6 class="card-title">{{$log->user_name}} {{$log->action}} {{$log->model}} on {{$log->created_at}}</h6>
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
            <p class="text-muted">Judul : {{ isset($logData2->judul) ? $logData2->judul : 'N/A'}}</p>
            <p class="text-muted">Konten : {{isset($logData2->konten) ? $logData2->konten : 'N/A'}}</p>
            <p class="text-muted">Gambar : {{isset($logData2->gambar) ? $logData2->gambar : 'N/A'}}</p>
        </div>
        <div class="mb-3">
            <label for="exampleInputNumber1" class="form-label">Data Baru</label>
            <p class="text-muted">Judul : {{ isset($logData->judul) ? $logData->judul : 'N/A'}}</p>
            <p class="text-muted">Konten : {{isset($logData->konten) ? $logData->konten : 'N/A'}}</p>
            <p class="text-muted">Gambar : {{isset($logData->gambar) ? $logData->gambar : 'N/A'}}</p>
        </div>
        <a href="{{ route('berita.index')}}" class="btn btn-primary">Kembali</a>
      </div>
    </div>
  </div>
</div>
@endsection
