@extends('layout.master')

@push('plugin-styles')
  <link href="{{ asset('assets/plugins/datatables-net-bs5/dataTables.bootstrap5.css') }}" rel="stylesheet" />
@endpush

@section('content')
<nav class="page-breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Master Data</a></li>
    <li class="breadcrumb-item active" aria-current="page">Data Warga</li>
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
        <h6 class="card-title">Catatan Kelahiran Margalaksana 09</h6>
        <a class="btn btn-primary mb-3" href="{{ route('catatan-kelahiran.create') }}" role="button">Tambah Data</a>
        <div class="table-responsive">
          <table id="dataTableExample" class="table">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Tanggal Lahir</th>
                <th>Tempat Lahir</th>
                <th>Alamat</th>
                <th>Jenis Kelamin</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
            @php
                $nomor = 1;
            @endphp
            @foreach ($lahir as $data)
              <tr>
                <td>{{ $nomor++}}</td>
                <td>{{ $data->nama}}</td>
                <td>{{ $data->tanggallahir}}</td>
                <td>{{ $data->tempatlahir}}</td>
                <td>{{ $data->alamat}}</td>
                <td>{{ $data->jk}}</td>
                <td>
                  <div class="dropdown">
                    <button class="btn btn-link p-0" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                      <a class="dropdown-item d-flex align-items-center" href="{{ route('catatan-kematian.edit', $data->id) }}"><i data-feather="git-branch" class="icon-sm me-2"></i> <span class="">Edit</span></a>
                      <a class="dropdown-item d-flex align-items-center" href="{{ route('kelahiran.generate', $data->id)}}"><i data-feather="printer" class="icon-sm me-2"></i> <span class="">Download PDF</span></a>
                      <a class="dropdown-item d-flex align-items-center" href="{{ route('catatan-kelahiran.show', $data->id) }}"><i data-feather="eye" class="icon-sm me-2"></i> <span class="">View Detail</span></a>
                      <form action="{{ route('catatan-kematian.destroy', $data->id) }}" method="POST" id="delete_warga">
                      @csrf
                      @method('DELETE')
                        <a class="dropdown-item d-flex align-items-center" href="#" onClick="hapusForm()"><i data-feather="trash" class="icon-sm me-2"></i> <span class="">Delete</span></a>
                      </form>
                      
                    </div>
                  </div>
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
        <h6 class="card-title">Log Kelahiran</h6>
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
  <script>
    function hapusForm() {
      document.getElementById("delete_warga").submit();
    }
  </script>
@endpush