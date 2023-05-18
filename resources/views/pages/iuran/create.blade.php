@extends('layout.master')

@section('content')
<nav class="page-breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Master Data</a></li>
    <li class="breadcrumb-item"><a href="#">Iuran Warga</a></li>
    <li class="breadcrumb-item active" aria-current="page">Tambah Data</li>
  </ol>
</nav>

<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h6 class="card-title">Input Iuran Warga</h6>
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        <form action="{{ route('iuran.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
          <div class="mb-3">
            <label for="exampleInputNumber1" class="form-label">Nama</label>
            <input type="text" class="form-control" name="nama" id="nama" required>
          </div>

          <div class="mb-3">
            <label for="exampleInputNumber2" class="form-label">NIK</label>
            <input type="number" class="form-control" name="nik" id="nik" required>
          </div>

          <div class="mb-3">
            <label for="exampleInputNumber3" class="form-label">RT</label>
            <input type="number" class="form-control" name="rt" id="rt" required>
          </div>

          <div class="mb-3">
            <label for="exampleInputNumber4" class="form-label">Jumlah Bayar</label>
            <input type="number" class="form-control" name="jumlah" id="jumlah" required>
          </div>

          <div class="mb-3">
            <label for="exampleInputNumber5" class="form-label">Tanggal Pembayaran</label>
            <select name="tanggal" id="tanggal" class="form-control">
            @for ($i = 1; $i <= 31; $i++)
                <option value="{{ $i }}">{{ $i }}</option>
            @endfor
            </select>
          </div>

          <div class="mb-3">
            <label for="exampleInputNumber5" class="form-label">Bulan</label>
            <select name="bulan" id="bulan" class="form-control">
                <option value="Januari">Januari</option>
                <option value="Februari">Februari</option>
                <option value="Maret">Maret</option>
                <option value="April">April</option>
                <option value="Mei">Mei</option>
                <option value="Juni">Juni</option>
                <option value="Juli">Juli</option>
                <option value="Agustus">Agustus</option>
                <option value="September">September</option>
                <option value="Oktober">Oktober</option>
                <option value="November">November</option>
                <option value="Desember">Desember</option>
            </select>
          </div>

          <div class="mb-3">
            <label for="exampleInputNumber5" class="form-label">Tahun</label>
            <select name="tahun" id="tahun" class="form-control">
            @for ($tahun = 2023; $tahun <= 2050; $tahun++)
                <option value="{{ $tahun }}">{{ $tahun }}</option>
            @endfor
            </select>
          </div>

          <div class="mb-3">
            <label for="exampleInputNumber6" class="form-label">Status Pembayaran</label>
            <select name="status_pembayaran" id="status_pembayaran" class="form-control">
                <option value="Lunas">Lunas</option>
                <option value="Belum Lunas">Belum Lunas</option>
            </select>
          </div>

          <button class="btn btn-primary" type="submit">Simpan Data</button>
          <button class="btn btn-danger" type="reset">Reset Data</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection

@push('plugin-scripts')
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="//code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<script>
  $('#nama').autocomplete({
        minLength: 1,
        source: function(request, response){
            $.ajax({
                url: "{{ route('iuran.autocomplete') }}",
                dataType: "json",
                data: {
                    term: request.term
                },
                success: function(data){
                    response($.map(data, function(item){
                        return {
                            id: item.id,
                            value: item.value,
                            nik: item.nik,
                            rt: item.rt
                        }
                    }));
                }
            });
        },
        select: function(event, ui){
            $('#nama').val(ui.item.value);
            $('#nik').val(ui.item.nik);
            $('#rt').val(ui.item.rt);
            return false;
        }
    });
</script>
@endpush