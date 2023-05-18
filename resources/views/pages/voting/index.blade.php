@extends('layout.master')

@push('plugin-styles')
  <link href="{{ asset('assets/plugins/datatables-net-bs5/dataTables.bootstrap5.css') }}" rel="stylesheet" />
@endpush

@section('content')
<nav class="page-breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Master Data</a></li>
    <li class="breadcrumb-item active" aria-current="page">Polling</li>
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
        <h6 class="card-title">List E-Vote Aktif </h6>
        <a class="btn btn-primary mb-3" href="{{ route('voting.create') }}" role="button">Buat Vote</a>
        
        <div class="table-responsive">
          <table id="dataTableExample" class="table">
            <thead>
              <tr>
                <th>No</th>
                <th>Judul</th>
                <th>Deskripsi</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
            @php
                $nomor = 1;
            @endphp
            @foreach ($votingdata as $voting)
            @if ($voting->end_date && \Carbon\Carbon::now()->gt($voting->end_date))
                <!-- Skip voting that has already ended -->
                @continue
            @endif
              <tr>
                <td>{{ $nomor++}}</td>
                <td>{{ $voting->title}}</td>
                <td>{{ $voting->deskripsi}}</td>
                <td>
                    <div class="d-flex">
                        <a href="{{ route('voting.show', $voting->id) }}" class="btn btn-primary me-1">Lihat Detail</a>
                        <a href="{{ route('voting.edit', $voting->id) }}" class="btn btn-warning text-white me-1">Edit Data</a>
                        <form action="{{ route('voting.destroy', $voting->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this data?')">Delete</button>
                        </form>
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