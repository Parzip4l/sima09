@extends('layout.master')

@push('plugin-styles')
  <link href="{{ asset('assets/plugins/datatables-net-bs5/dataTables.bootstrap5.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/plugins/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" />
@endpush

@section('content')
<nav class="page-breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Master Data</a></li>
    <li class="breadcrumb-item active" aria-current="page">UMKM</li>
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
        <h6 class="card-title">Data UMKM Warga Margalaksana</h6>
        <a class="btn btn-primary mb-3" href="{{ route('umkm.create') }}" role="button">Tambah Data</a>
        <div class="table-responsive">
          <table id="dataTableExample" class="table">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama Toko</th>
                <th>Nama Pemilik</th>
                <th>Status</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
            @php
                $nomor = 1;
            @endphp
            @foreach ($data as $data)
              <tr>
                <td>{{ $nomor++}}</td>
                <td>{{ $data->namatoko}}</td>
                <td>{{ $data->namapemilik}}</td>
                <td><span class="{{ $data->verifikasi == 'Belum Terverifikasi' ? 'text-danger' : 'text-success' }}">{{ $data->verifikasi}}</span></td>
                <td>
                  <div class="d-flex">
                  <a href="{{ route('umkm.show', $data->id) }}" class="btn btn-primary me-1">Lihat Detail</a>
                  <a href="{{ route('umkm.edit', $data->id) }}" class="btn btn-warning me-1 text-white">Edit Data</a>
                    <form action="{{ route('umkm.destroy', $data->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                      <button class="btn btn-success btn-sm btn-update mx-1 {{ $data->verifikasi == 'Belum Terverifikasi' ? 'd-blok' : 'd-none' }}" data-umkm-id="{{ $data->id }}">Verifikasi</button>
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
<script>
    $(document).ready(function() {
      var csrfToken = $('meta[name="csrf-token"]').attr('content');
        // Menggunakan class .btn-update untuk menangani klik tombol Update
        $('.btn-update').on('click', function() {
            var umkmId = $(this).data('umkm-id');
            
            // Mengirim permintaan AJAX ke server
            $.ajax({
                url: '/umkm/update-status/' + umkmId,
                type: 'PUT',
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': csrfToken
                },
                success: function(response) {
                    // Mengupdate status pada tampilan DataTable setelah berhasil memperbarui data
                    if (response.success) {
                        // Misalnya, mengubah teks status menjadi "Verifikasi"
                        var statusCell = $(this).closest('tr').find('td:nth-child(3)');
                        statusCell.text('Terverifikasi');
                        location.reload();
                    }
                },
                error: function(xhr, status, error) {
                    // Menangani error jika terjadi
                    console.log(xhr.responseText);
                }
            });
        });
    });
</script>
@endpush