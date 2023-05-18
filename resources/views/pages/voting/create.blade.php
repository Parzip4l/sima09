@extends('layout.master')

@section('content')
<nav class="page-breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Additional Info</a></li>
    <li class="breadcrumb-item"><a href="#">Voting</a></li>
    <li class="breadcrumb-item active" aria-current="page">Tambah Data</li>
  </ol>
</nav>

<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h6 class="card-title">Buat Voting Baru</h6>
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        <form action="{{ route('voting.store') }}" method="POST">
        @csrf
        <div class="form-group mb-2">
            <label for="title">Judul Voting</label>
            <input type="text" name="title" id="title" class="form-control" required>
        </div>

        <div class="form-group mb-2">
            <label for="title">Deskripsi Voting</label>
            <textarea name="deskripsi" id="" cols="30" rows="10" class="form-control" required></textarea>
        </div>

        <div class="form-group mb-2">
            <label for="title">Batas Akhir Voting</label>
            <input type="date" class="form-control" name="end_date" required>
        </div>
        <div class="form-group mb-2">
            <label for="options">Pilihan Voting</label>
            
            <div class="input-group">
                <input type="text" name="options[]" class="form-control" placeholder="Masukkan pilihan" required>
            </div>
            <div class="input-group-append">
                    <button type="button" class="btn btn-sm btn-danger mt-2 remove-option">Hapus</button>
                    <button type="button" class="btn btn-sm btn-success mt-2 float-right add-option">Tambah Pilihan</button>
            </div>
            <div id="option-container"></div>
        </div>
        <hr>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection


@push('custom-scripts')
<script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
    <script>
        $(function() {
            let container = $('#option-container');
            let addButton = $('.add-option');
            let removeButton = $('.remove-option');

            $(addButton).click(function() {
                let input = `
                    <div class="input-group mt-2">
                        <input type="text" name="options[]" class="form-control me-1" placeholder="Masukkan pilihan" required>
                        
                           <button type="button" class="btn btn-danger" onclick="hapusField(this)">Hapus</button>
                    </div>
            `;
            $(container).append(input);
        });

        $(removeButton).click(function() {
            let input = $(this).parents('.input-group');
            $(input).remove();
        });
    });
</script>

<script>
    function hapusField(button) {
        // Ambil parent dari button (yaitu div yang mengandung input dan button)
        var parent = button.parentElement;
        // Hapus parent (yaitu div) dari dokumen
        parent.remove();
    }
</script>
@endpush
