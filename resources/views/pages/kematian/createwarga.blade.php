@extends('layout.client') @push('plugin-styles')
<link href="{{ asset('css/style.css') }}" rel="stylesheet" /> 
@endpush 
@section('content') 
<div class="profile-body warga-profile">
    <div class="container">
        <div class="d-md-block col-md-12 col-xl-12 left-wrapper">
            <div class="card rounded">
                <div class="image-profile-bg" style="background-image: url('{{ asset('assets/images/bgwarga.svg') }}'); background-size:contain;">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="d-flex justify-content-center align-items-center mt-5 mx-center">
                                <div>
                                    <img class="wd-70 rounded-circle profile" src="{{ asset('assets/images/profile.png') }}" alt="profile">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body profile">
                    <div class="d-block align-items-center text-center mb-2">
                        <h5 class="card-title mb-0 te">{{ Auth::user()->nama }}</h6>
                        <p>Warga Dusun Margalaksana RW 00{{ Auth::user()->rw }} RT 00{{ Auth::user()->rt }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container mt-3">
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
            <div class="card-body">
                <h6 class="card-title">Tambah Data Warga Meninggal</h6>
                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
                @if ($errors->has('nik'))
                    <div class="alert alert-danger">{{ $errors->first('nik') }}</div>
                @endif
                <form action="{{ route('catatan-kematian.store') }}" method="POST">
                @csrf
                <div class="form-group mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" name="nama" class="form-control" id="nama" placeholder="Masukkan nama">
                </div>
                <div class="form-group mb-3">
                    <label for="Tanggal Meninggal" class="form-label">Tanggal Meninggal</label>
                    <input type="date" name="tanggalmeninggal" class="form-control" id="tanggalmeninggal" placeholder="Tanggal Meninggal" required>
                </div>
                <div class="form-group mb-3">
                    <label for="nik" class="form-label">NIK</label>
                    <input type="text" name="nik" class="form-control" id="nik" placeholder="NIK" readonly>
                </div>
                <div class="form-group mb-3">
                    <label for="nokk" class="form-label">No. KK</label>
                    <input type="text" name="nokk" class="form-control" id="nokk" placeholder="No. KK" readonly>
                </div>
                <div class="form-group mb-3">
                    <label for="agama" class="form-label">Agama</label>
                    <input type="text" name="agama" class="form-control" id="agama" placeholder="Agama" readonly>
                </div>
                <div class="form-group mb-3">
                    <label for="RT" class="form-label">RT</label>
                    <input type="text" name="rt" class="form-control" id="rt" placeholder="RT" readonly>
                </div>
                <div class="form-group mb-3">
                    <label for="RW" class="form-label">RW</label>
                    <input type="text" name="rw" class="form-control" id="rw" placeholder="RW" readonly>
                </div>
                <div class="form-group mb-3">
                    <label for="jk" class="form-label">Jenis Kelamin</label>
                    <select name="jk" id="jk" class="form-control" readonly>
                        <option value="LAKI-LAKI">Laki-laki</option>
                        <option value="PEREMPUAN">Perempuan</option>
                    </select>
                </div>
                <div class="form-group mb-3">
                    <label for="Tanggal Lahir" class="form-label">Tanggal Lahir</label>
                    <input type="text" name="tanggallahir" class="form-control" id="tanggallahir" placeholder="Tanggal Lahir" readonly>
                </div>

                <button type="submit" class="btn btn-primary" onclick="return confirm('Anda yakin ingin menambahkan data kematian dan menghapus data pengguna ini?')">Tambahkan dan Hapus</button>
                <button class="btn btn-danger" type="reset">Reset Data</button>
                </form>
            </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('plugin-scripts')
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="//code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
  <script src="{{ asset('assets/plugins/datatables-net/jquery.dataTables.js') }}"></script>
  <script src="{{ asset('assets/plugins/datatables-net-bs5/dataTables.bootstrap5.js') }}"></script>
  <script src="{{ asset('assets/js/data-table.js') }}"></script>
    <script>
    $('#nama').autocomplete({
            minLength: 1,
            source: function(request, response){
                $.ajax({
                    url: "{{ route('wargas.autocomplete') }}",
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
                                nokk: item.nokk,
                                jk: item.jk,
                                agama: item.agama,
                                rt: item.rt,
                                rw: item.rw,
                                tanggallahir: item.tanggallahir
                            }
                        }));
                    }
                });
            },
            select: function(event, ui){
                $('#nama').val(ui.item.value);
                $('#nik').val(ui.item.nik);
                $('#nokk').val(ui.item.nokk);
                $('#jk').val(ui.item.jk);
                $('#rt').val(ui.item.rt);
                $('#rw').val(ui.item.rw);
                $('#agama').val(ui.item.agama);
                $('#tanggallahir').val(ui.item.tanggallahir);
                return false;
            }
        });
    </script>
@endpush