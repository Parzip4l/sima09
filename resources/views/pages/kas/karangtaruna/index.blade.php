@extends('layout.master')
@push('plugin-styles')
  <link href="{{ asset('assets/plugins/datatables-net-bs5/dataTables.bootstrap5.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/plugins/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" />
@endpush

@section('content')
<nav class="page-breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Master Data</a></li>
    <li class="breadcrumb-item active" aria-current="page">Kas RW</li>
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
        <h6 class="card-title">Rekap KAS Karang Taruna</h6>
        <a class="btn btn-primary mb-3" href="{{ route('kaskarta.create') }}" role="button">Tambah Data</a>
        <div class="table-responsive">
          <table id="dataTableExample" class="table">
            <thead>
              <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Keterangan</th>
                <th>Uang Masuk</th>
                <th>Uang Keluar</th>
                <th>Saldo</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
            @php
                $nomor = 1;
            @endphp
            @foreach ($data as $kas)
              <tr>
                <td>{{ $nomor++}}</td>
                <td>{{ $kas->tanggal}}</td>
                <td>{{ $kas->keterangan}}</td>
                <td>Rp {{ number_format($kas->jumlah_masuk, 0, ',', '.') }}</td>
                <td>Rp {{ number_format($kas->jumlah_keluar, 0, ',', '.') }}</td>
                <td>Rp {{ number_format($kas->saldo, 0, ',', '.') }}</td>
                <td>
                  <div class="dropdown">
                    <button class="btn btn-link p-0" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                      <a class="dropdown-item d-flex align-items-center" href="{{ route('kaskarta.edit', $kas->id) }}"><i data-feather="git-branch" class="icon-sm me-2"></i> <span class="">Edit</span></a>
                      <a class="dropdown-item d-flex align-items-center" href="{{ route('kaskarta.show', $kas->id) }}"><i data-feather="eye" class="icon-sm me-2"></i> <span class="">View Detail</span></a>
                      <form action="{{ route('kaskarta.destroy', $kas->id) }}" method="POST" id="delete_warga">
                      @csrf
                      @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger"><i data-feather="trash" class="icon-sm me-2"></i> <span class="">Delete</span></button>
                      </form>
                    </div>
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
        <h6 class="card-title">Log Kas Karang Taruna</h6>
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
  <script src="{{ asset('assets/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
@endpush

@push('custom-scripts')
  <script src="{{ asset('assets/js/data-table.js') }}"></script>
  <script src="{{ asset('assets/js/sweet-alert.js') }}"></script>
  <script>
    $('form').submit(function(e) {
        e.preventDefault();
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: "Anda tidak dapat mengembalikan tindakan ini!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, hapus saja!'
        }).then((result) => {
            if (result.isConfirmed) {
                $(this).unbind('submit').submit();
            }
        });
    });
</script>
@endpush