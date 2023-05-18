@extends('layout.master')

@push('plugin-styles')
  <link href="{{ asset('assets/plugins/datatables-net-bs5/dataTables.bootstrap5.css') }}" rel="stylesheet" />
@endpush

@section('content')
<nav class="page-breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Master Data</a></li>
    <li class="breadcrumb-item active" aria-current="page">Zakat</li>
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
        <h6 class="card-title">Data Zakat 2023</h6>
        <a class="btn btn-primary mb-3" href="{{ route('zakat.create') }}" role="button">Tambah Data</a>
        <div class="table-responsive">
          <table id="dataTableExample" class="table">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama Muzzaki</th>
                <th>Tanggal Pembayaran</th>
                <th>Jenis Yang Dibayarkan</th>
                <th>Jumlah Zakat</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
            @php
                $nomor = 1;
            @endphp
            @foreach ($zakat as $data)
              <tr>
                <td>{{ $nomor++}}</td>
                <td>{{ $data->nama_pembayar}}</td>
                <td>{{ $data->tanggal_pembayaran}}</td>
                <td>{{ $data->jenis}}</td>
                <td>{{ $data->jumlah_zakat}}</td>
                <td>
                    <a href="{{ route('zakat.show', $data->id) }}" class="btn btn-primary">Lihat Detail</a>
                    <a href="{{ route('zakat.edit', $data->id) }}" class="btn btn-warning">Edit Data</a>
                    <form action="{{ route('zakat.destroy', $data->id) }}" method="POST">
                      @csrf
                      @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this data?')">Delete</button>
                    </form>
                </td>
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
  <script src="{{ asset('assets/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
@endpush

@push('custom-scripts')
  <script src="{{ asset('assets/js/data-table.js') }}"></script>
  <script src="{{ asset('assets/js/sweet-alert.js') }}"></script>
@endpush