@extends('layout.master')

@push('plugin-styles')
  <link href="{{ asset('assets/plugins/datatables-net-bs5/dataTables.bootstrap5.css') }}" rel="stylesheet" />
@endpush

@section('content')
<nav class="page-breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Master Data</a></li>
    <li class="breadcrumb-item"><a href="#">Zakat</a></li>
    <li class="breadcrumb-item active" aria-current="page">Mustahiq</li>
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
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h6 class="card-title">Data Mustahiq 2023</h6>
        <a class="btn btn-primary mb-3" href="{{ route('mustahiq.create') }}" role="button">Tambah Data</a>
        <div class="table-responsive">
          <table id="dataTableExample" class="table">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama Mustahiq</th>
                <th>Jenis Mustahiq</th>
                <th>Alamat</th>
                <th>Tanggal Diberikan</th>
                <th>Jumlah Zakat</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
            @php
                $nomor = 1;
            @endphp
            @foreach ($mustahiq as $data)
              <tr>
                <td>{{ $nomor++}}</td>
                <td>{{ $data->nama}}</td>
                <td>{{ $data->jenis}}</td>
                <td>{{ $data->alamat}}</td>
                <td>{{ $data->tanggal_diberikan}}</td>
                <td>{{ $data->jumlah_zakat}}</td>
                <td><a href="{{ route('mustahiq.show', $data->id) }}" class="btn btn-primary">Lihat Detail</a></td>
              </tr>
              @endforeach
            </tbody>
          </table>
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